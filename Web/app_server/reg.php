<?php
header("Content-type:text/html; charset=GB2312");
$user_loginname=$_POST['user_loginname'];
$user_name=$_POST['user_name'];
$password=$_POST['password'];
$user_tel=$_POST['user_tel'];
$user_email=$_POST['user_email'];

include "conn.php";
$sql="select * from sp_member where username='{$user_loginname}'";
$sql=iconv("utf-8", "gb2312",$sql);
$rs=sqlsrv_query($conn,$sql);
if($row = sqlsrv_fetch_array($rs)) {
	//用户登录名已经存在
	echo 10;
	}
else{
	sqlsrv_free_stmt($rs);
	$sql="insert into sp_member(username,realname,password,user_tel,user_email) VALUES('{$user_loginname}','{$user_name}','{$password}','{$user_tel}','{$user_email}')";
	//$sql=iconv("utf-8", "gb2312",$sql);
	$rs=sqlsrv_query($conn,$sql);
	if($rs){
		echo 1;
		}
	else {
		//插入记录失败
		echo print_r(sqlsrv_errors());
	}
}
sqlsrv_close($conn);
?>

