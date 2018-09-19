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
$ws1=array();
$ws2=array();
$arr=array();
$i=0;
//取用户选定的温室id
$sql="select user_ws from sp_member where id={$user_id}";
$rs=sqlsrv_query($conn,$sql);
$row = sqlsrv_fetch_array($rs);
//取用户选定的温室数据
// echo $sql;
// die();
if($row['user_ws']=='-'){
	$sql="select id,location,zdmc,jd,wd,describe from ghstation order by location,zdmc";
}
else{
	$sql="select id,location,zdmc,jd,wd,describe from ghstation where id in({$row['user_ws']}) order by location,zdmc";
}
$rs=sqlsrv_query($conn,$sql);
// echo $sql;
// die();
while($ws = sqlsrv_fetch_array($rs,SQLSRV_FETCH_ASSOC)){
	$ws1=$ws;
	//取某温室id的温室监测数据
	$sql="select top 1 CONVERT(char(19),time,120) AS dt,TA_CU/10 as TA_CU,TA_CD/10 as TA_CD,RH_C,TS_U/10 as TS_U,TS_M/10 as TS_M,TS_D/10 as TS_D,isnull(R_U,' ') as R_U,isnull(PAR_U,' ') as PAR_U,isnull(CO2_U,' ') as CO2_U,SH_U,SH_M,SH_D from tabtimedata where id='{$ws['id']}' order by time desc";
	$ws_rs=sqlsrv_query($conn,$sql);
	if($ws_data = sqlsrv_fetch_array($ws_rs,SQLSRV_FETCH_ASSOC)){
		$ws2=$ws_data;
		$arr[$i]=array_merge($ws1,$ws2);
		//echo JSON($arr[$i]);
		//die();
	}
	$i++;	
}
sqlsrv_free_stmt($rs);
sqlsrv_free_stmt($ws_rs);
sqlsrv_close($conn);
echo JSON($arr);
//print_r($arr);
?>

