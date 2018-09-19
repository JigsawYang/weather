<?php
$user_loginname=$_POST['user_loginname'];
$password=$_POST['password'];
header("Content-type:text/html; charset=utf-8");

include "../conn.php";
$sql="update sp_member set password='{$password}' where username='{$user_loginname}'";
$sql=iconv("utf-8", "gb2312",$sql);
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

