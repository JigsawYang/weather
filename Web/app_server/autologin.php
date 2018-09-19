<?php
$user_loginname=$_POST['user_loginname'];
$user_token=$_POST['user_token'];
//$user_name='user';
//$user_token='f8e17c6ba06fa7e81000c6fed5209783';
header("Content-type:text/html; charset=GB2312");

include "conn.php";
$user_loginname=iconv("utf-8", "gb2312",$user_loginname);
$sql="select * from sp_member where username='{$user_loginname}'";
$rs=sqlsrv_query($conn,$sql);
if($row = sqlsrv_fetch_array($rs)) {
	if($user_token==md5($row['username'].$row['password'].$row['realname'])){
		//验证通过，允许登录
		$sql="update sp_member set user_loginnumber=user_loginnumber+1,user_lastlogindate=convert(char(19),getdate(),120) where username='{$user_loginname}'";
		$rs=sqlsrv_query($conn,$sql);
		//echo $sql;
		//die();
		echo 10;
		//print_r(sqlsrv_errors());
		}
	else {
		//用户信息已经更改，需要重新登录
		echo 0;
		}
	}
else{
	echo print_r(sqlsrv_errors());
	}
sqlsrv_free_stmt($rs);
sqlsrv_close($conn);
?>

