<?php
//获取用户未读的天气预警信息标题
$user_id=$_POST['user_id'];
header("Content-type:text/html; charset=GB2312");
include "conn.php";
$sql="select doc_title as title from t_usermessage where user_id={$user_id} and doc_type='skyj' and tag=1";
$i=1;
$titles='';
$rs=sqlsrv_query($conn,$sql);
while($row = sqlsrv_fetch_array($rs,SQLSRV_FETCH_ASSOC)) {
	$titles=$titles.$i.'.'.$row['title'].' ';
	$i++;
	}
echo $titles;
sqlsrv_free_stmt($rs);
sqlsrv_close($conn);
?>

