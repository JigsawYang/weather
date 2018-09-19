<?php
header("Content-type:text/json; charset=utf-8");
$pageNo=isset($_POST['pageNo'])?$_POST['pageNo']:1;
$pSize=isset($_POST['pageSize'])?$_POST['pageSize']:10;
$title_info=isset($_POST['title_info'])?$_POST['title_info']:'';
$user_id=$_POST['user_id'];
$findstr2='';
$findstr=($title_info<>'')?" and title like '%{$title_info}%'":"";
if($findstr<>''){
	$findstr2=$findstr;
	$findstr='where 1=1 '.$findstr;
}
$findstr1=$findstr.' order by id desc';
//echo $findstr1;
//die();

$r1=($pageNo-1)*$pSize;
$r2=$r1+$pSize;

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
$sql="select id,title,convert(char(10),addtime,120) as dt,charindex('({$user_id})',reader) as tag from sp_featuredisaster where id ".
	"in(select top {$r2} id from sp_featuredisaster {$findstr1}) and id not in(select top {$r1} id from sp_featuredisaster {$findstr1}) {$findstr2}".
	" order by id desc";
//echo $sql;
//die();
$rs=sqlsrv_query($conn,$sql);
while($row = sqlsrv_fetch_array($rs,SQLSRV_FETCH_ASSOC)){
	$arr[$i]=$row;
	$i++;
	}
sqlsrv_free_stmt($rs);
sqlsrv_close($conn);
echo JSON($arr); 
?>

