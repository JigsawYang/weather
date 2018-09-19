<?php
//根据手机GPS经纬度数据，取临近站点天气信息数据
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
//计算最近的站点编号
$sql="select top 1 zd_code,sqrt(square(zd_jd-{$jd})+square(zd_wd-{$wd})) as zd_jl from t_zd where zd_ys>=6 and zd_tag=1 order by zd_jl";
// echo $sql;
// die();
$rs=sqlsrv_query($conn,$sql);
if($zd = sqlsrv_fetch_array($rs,SQLSRV_FETCH_ASSOC)) {
	//获取最近站点的气象信息
	$zdcode=$zd['zd_code'];
	$sql="select top 1 (bc/10) as bc,'晴天' as tkzk,convert(varchar(10),bd)+'%' as bd,dbo.GetFsGrade(af)+' '+dbo.GetFW(ae)+'风' as fsfx,'no.png' as bj_icon from H{$zdcode} order by tt desc";
	//$sql=iconv("utf-8", "utf-8",$sql);
	// echo $sql;
	// die();
	$rs1=sqlsrv_query($conn,$sql);
	if($qx = sqlsrv_fetch_array($rs1,SQLSRV_FETCH_ASSOC)) {
		$arr[0]=$qx;
		//获取实况天气警报图标
		// echo $zdcode;
		// die();
		$sql="select top 1 yj_tq_name,yj_tq_grade from t_yj where yj_zd_code='{$zdcode}' order by yj_tt desc";
		// echo $sql;
		// die();
		$rs2=sqlsrv_query($conn,$sql);
		if($bj = sqlsrv_fetch_array($rs2,SQLSRV_FETCH_ASSOC)) {
			//获取报警天气图标文件名称
			$sql="select icon=(case when (icon is NULL or icon='') then 'no.png' else icon end) from t_tq_type where tq_type_name='{$bj['yj_tq_name']}' and tq_grade={$bj['yj_tq_grade']}";
			$rs=sqlsrv_query($conn,$sql);
			$bj_icon = sqlsrv_fetch_array($rs,SQLSRV_FETCH_ASSOC);
			$arr[0]['bj_icon']=$bj_icon['icon'];
		}
	}
}
echo JSON($arr);
//print_r($arr);
//sqlsrv_free_stmt($rs);
sqlsrv_close($conn);
?>

