<?php
header("Content-type:text/json; charset=GB2312");
$user_id=$_POST['user_id'];
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
$i=0;
//取用户选定的温室id
$sql="select user_ws from sp_member where id='{$user_id}'";
$rs=sqlsrv_query($conn,$sql);
$row = sqlsrv_fetch_array($rs);
$user_ws=$row['user_ws'];
//echo $sql;
//die();
//取温室数据，并标记用户选定的温室
$sql="select id,location,zdmc,describe from ghstation order by location,zdmc";
$rs=sqlsrv_query($conn,$sql);
while($ws = sqlsrv_fetch_array($rs,SQLSRV_FETCH_ASSOC)){
	$arr[$i]=$ws;
	//判断当前用户是否选择该温室
	$arr[$i]['tag']=(strpos($user_ws,$ws['id']))?true:false;
	$i++;
}
sqlsrv_free_stmt($rs);
sqlsrv_close($conn);
echo JSON($arr);
//print_r($arr);
?>

