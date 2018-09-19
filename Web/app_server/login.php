<?php
$user_loginname=$_POST['user_loginname'];
$password=$_POST['password'];
header("Content-type:text/json; charset=GB2312");
function arrayRecursive(&$array, $function, $apply_to_keys_also = false){
	static $recursive_counter = 0;
	if (++$recursive_counter > 1000) {
		die('possible deep recursion attack'); 
		}
	foreach ($array as $key => $value) { 
		if (is_array($value)) {
			arrayRecursive($array[$key], $function, $apply_to_keys_also);
			} 
		else {
			$array[$key] = $function($value);
			}    
		if ($apply_to_keys_also && is_string($key)) {
			$new_key = $function($key);
			if ($new_key != $key) {
				$array[$new_key] = $array[$key];
				unset($array[$key]);
				}
			}
		}
	$recursive_counter--;
}

function JSON($array) { 
	arrayRecursive($array, 'urlencode', true); 
	$json = json_encode($array); 
	return urldecode($json); 
} 

include "conn.php";
$arr=array();
$sql="select id,username,password,realname,user_headimg,user_sex,user_email,user_token,user_ws from sp_member where username='{$user_loginname}' and password='{$password}'";
$rs=sqlsrv_query($conn,$sql);
if($row = sqlsrv_fetch_array($rs,SQLSRV_FETCH_ASSOC)) {
	$arr[0]=$row;
	$arr[0]['user_token']=md5($user_loginname.$password.$arr[0]['realname']);
	$sql="update sp_member set user_token='{$arr[0]['user_token']}',user_loginnumber=user_loginnumber+1,user_lastlogindate=convert(char(19),getdate(),120) where username='{$user_loginname}'";
	//echo $sql;
	//die();
	$rs=sqlsrv_query($conn,$sql);
	}
	// echo $sql;
	// die();
sqlsrv_free_stmt($rs);
sqlsrv_close($conn);
echo JSON($arr);
// print_r($arr);
?>

