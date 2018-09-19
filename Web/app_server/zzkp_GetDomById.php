<?php
//种植科普
$user_id=$_POST['user_id'];
$id=$_POST['id'];
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
$sql="select title,main,rtrim(author) as author,convert(char(19),addtime,120) as dt from sp_knowledge where id={$id}";
$rs=sqlsrv_query($conn,$sql);
if($row = sqlsrv_fetch_array($rs,SQLSRV_FETCH_ASSOC)){
	$row['main']= html_entity_decode($row['main']);
	$arr=$row;
	//添加文档表中字段reader阅读用户id
	$sql="update sp_knowledge set reader=reader+'({$user_id})' where charindex('({$user_id})',reader)=0 and id={$id}";
	if($rs=sqlsrv_query($conn,$sql)){
		//print_r(JSON($arr));
		echo join($arr,'|||||');
		// echo JSON($arr);
	}
	else{
		//添加阅读用户失败
		echo '';
	}
}
else{
	//构造错误信息json并返回
	echo '';
}
sqlsrv_free_stmt($rs);
sqlsrv_close($conn);
?>

