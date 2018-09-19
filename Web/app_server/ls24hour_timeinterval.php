<?php
header("Content-type:text/json; charset=utf-8");
$zd_id=$_POST['zd_id'];
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
$sql="select max(dt) as maxdt,min(dt) as mindt from (select top 24 convert(char(19),time,120) as dt from tabtimedata where id='{$zd_id}' and substring(convert(char(19),time,120),15,2)='00' order by time desc) as tb";
//echo $sql;
$rs=sqlsrv_query($conn,$sql);
while($row = sqlsrv_fetch_array($rs)){
	$arr[$i]=$row;
	$i++;	
}
sqlsrv_free_stmt($rs);
sqlsrv_close($conn);
echo JSON($arr);
//print_r($arr);
?>

