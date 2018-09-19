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
$arr1=array();
$i=0;
$sql="select top 24 substring(convert(char(19),time,120),12,2) as hh,TA_CU/10 as bc1,TA_CD/10 as bc2,TS_U/10 as tbc1,TS_M/10 as tbc2,TS_D/10 as tbc3,".
	"RH_C,SH_U,SH_M,SH_D,CO2_U,R_U,PAR_U from tabtimedata where id='{$zd_id}' and substring(convert(char(19),time,120),15,2)='00' order by time desc";
//echo $sql;
$rs=sqlsrv_query($conn,$sql);
while($row = sqlsrv_fetch_array($rs)){
	$arr1[$i]=$row;
	$i++;	
}
sqlsrv_free_stmt($rs);
sqlsrv_close($conn);
for($i=0;$i<24;$i++){
	for($j=0;$j<13;$j++){
		$arr[$j][$i]=$arr1[$i][$j];
	}
}
echo JSON($arr);
//print_r($arr);
?>

