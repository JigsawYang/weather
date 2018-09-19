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
$sql="select user_ws from sp_member where id={$user_id}";
$rs=sqlsrv_query($conn,$sql);
$row = sqlsrv_fetch_array($rs);
//取用户选定的温室数据
if($row['user_ws']=='-'){
	$sql="select id,location,zdmc,describe from ghstation order by location,zdmc";
}
else{
	$sql="select id,location,zdmc,describe from ghstation where id in({$row['user_ws']}) order by location,zdmc";
}
$rs=sqlsrv_query($conn,$sql);
//echo $sql;
//die();
while($ws = sqlsrv_fetch_array($rs,SQLSRV_FETCH_ASSOC)){
	$arr[$i]=$ws;
	$i++;	
}
sqlsrv_free_stmt($rs);
sqlsrv_close($conn);
echo JSON($arr);
//print_r($arr);
?>

