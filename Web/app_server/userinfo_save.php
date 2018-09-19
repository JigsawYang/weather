<?php
$user_loginname=$_POST['user_loginname'];
$user_name=$_POST['user_name'];
$user_tel=$_POST['user_tel'];
$user_email=$_POST['user_email'];
header("Content-type:text/html; charset=utf-8");

include "conn.php";
$sql="update sp_member set realname='{$user_name}',user_tel='{$user_tel}',user_email='{$user_email}' where username='{$user_loginname}'";
//$sql=iconv("utf-8", "gb2312",$sql);
$rs=sqlsrv_query($conn,$sql);
if($rs) {
	echo 1;
	}
else{
	echo print_r(sqlsrv_errors());
	}
sqlsrv_free_stmt($rs);
sqlsrv_close($conn);
?>

