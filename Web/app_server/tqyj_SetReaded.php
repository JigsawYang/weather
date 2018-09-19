<?php
$user_id=$_POST['user_id'];
$id=$_POST['id'];
header("Content-type:text/html; charset=utf-8");
include "conn.php";
if($id>0){
	//设置用户消息表为已读状态
	$sql="update t_usermessage set tag=0 where user_id={$user_id} and doc_id={$id}";
	if($rs=sqlsrv_query($conn,$sql)){
		//添加文档表中字段reader阅读用户id
		$sql="update sp_featuredisaster set reader=reader+'({$user_id})' where charindex('({$user_id})',reader)=0 and id={$id}";
		if($rs=sqlsrv_query($conn,$sql)){
			echo 1;
		}
		else{
			//添加阅读用户失败后，撤销用户消息表已读状态为未读
			$sql="update t_usermessage set tag=1 where user_id={$user_id} and doc_id={$id}";
			$rs=sqlsrv_query($conn,$sql);
			echo 0;
		}
	}
	else{
		echo 0;
	}
}
else{
	//设置用户消息表为已读状态
	$sql="update t_usermessage set tag=0 where user_id={$user_id} and doc_type='skyj' and tag=1";
	$rs=sqlsrv_query($conn,$sql);
	//添加文档表中字段reader阅读用户id
	$sql="update sp_featuredisaster set reader=reader+'({$user_id})' where charindex('({$user_id})',reader)=0";
	$rs=sqlsrv_query($conn,$sql);
	echo 1;
}
sqlsrv_free_stmt($rs);
sqlsrv_close($conn);
?>

