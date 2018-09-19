<?php
//获取用户未读的天气预警信息标题
$user_id=$_POST['user_id'];
$id=$_POST['id'];
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
$sql="select title,main,rtrim(author) as author,convert(char(19),addtime,120) as dt from sp_featuredisaster where id={$id}";
//$sql="select title,main,rtrim(author) as author,convert(char(19),addtime,120) as dt from sp_knowledge where id=6";
$rs=sqlsrv_query($conn,$sql);
if($row = sqlsrv_fetch_array($rs,SQLSRV_FETCH_ASSOC)){
	//$row['main']= html_entity_decode($row['main']);
	$arr=$row;
	//设置用户消息表为已读状态
	$sql="update t_usermessage set tag=0 where user_id={$user_id} and doc_id={$id}";
	if($rs=sqlsrv_query($conn,$sql)){
		//添加文档表中字段reader阅读用户id
		$sql="update sp_featuredisaster set reader=reader+'({$user_id})' where charindex('({$user_id})',reader)=0 and id={$id}";
		if($rs=sqlsrv_query($conn,$sql)){
			echo JSON($arr);
		}
		else{
			//添加阅读用户失败后，撤销用户消息表已读状态为未读
			$sql="update t_usermessage set tag=1 where user_id={$user_id} and doc_id={$id}";
			$rs=sqlsrv_query($conn,$sql);
			echo '';
		}
	}
	else{
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

