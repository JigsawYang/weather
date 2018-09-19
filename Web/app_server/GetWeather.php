<?php
//临时取固定站点取数，后期进行地理位置定位优化气象数据
$city=$_POST['city'];
$district=$_POST['district'];
$jd=$_POST['jd'];
$wd=$_POST['wd'];
header("Content-type:text/json; charset=utf-8");
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
//查找所在地天气预报记录,如果没有则取包头市区的数据
$sql="select top 1 * from v_weather_forecast where substring(stationName,1,2)=substring('{$district}',1,2) order by qbsj desc";
//$sql=iconv("utf-8", "utf-8",$sql);
echo $sql;
die();
$rs=sqlsrv_query($conn,$sql);
if(!$row = sqlsrv_fetch_array($rs,SQLSRV_FETCH_ASSOC)) {
	$sql="select top 1 * from v_weather_forecast where stationname='包头市区' order by qbsj desc";
	//$sql=iconv("utf-8", "utf-8",$sql);
	$rs=sqlsrv_query($conn,$sql);
	if($row = sqlsrv_fetch_array($rs,SQLSRV_FETCH_ASSOC)){
		$arr[0]=$row;
	}
}
echo JSON($arr);
sqlsrv_free_stmt($rs);
sqlsrv_close($conn);
?>

