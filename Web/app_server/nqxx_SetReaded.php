<?php
$user_id=$_POST['user_id'];
$id=$_POST['id'];
$type=$_POST['type'];
header("Content-type:text/html; charset=GB2312");
include "conn.php";
$flag=0;
if($id>0){
	//添加文档表中字段reader阅读用户id
	if($type=='ssny'){
		//设施农业服务(生态农业)
		$sql="update sp_stservice set reader=reader+'({$user_id})' where charindex('({$user_id})',reader)=0 and id={$id}";
		$flag=1;
	}
	elseif($type=='nyqx'){
		//农业气象服务
		$sql="update sp_qxservice set reader=reader+'({$user_id})' where charindex('({$user_id})',reader)=0 and id={$id}";
		$flag=1;
	}
	elseif($type=='zzkp'){
		//农业气象服务
		$sql="update sp_knowledge set reader=reader+'({$user_id})' where charindex('({$user_id})',reader)=0 and id={$id}";
		$flag=1;
	}
	else{
		//未定义
		$flag=0;
		echo 0;
	}
	if($flag==1){
		if($rs=sqlsrv_query($conn,$sql)){
			//更新数据成功
			sqlsrv_free_stmt($rs);
			echo 1;
		}
		else{
			//更新数据不成功
			echo 0;
		}
	}
}
else{
	echo 0;
}
sqlsrv_close($conn);
?>

