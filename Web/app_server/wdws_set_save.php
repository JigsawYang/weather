<?php
header("Content-type:text/json; charset=utf-8");
$user_id=$_POST['user_id'];
$user_ws_id=$_POST['user_ws_id'];

include "conn.php";
$user_ws_id=str_replace("'","''",$user_ws_id);
$sql="update sp_member set user_ws='{$user_ws_id}' where id='{$user_id}'";
$rs=sqlsrv_query($conn,$sql);
if($rs){
	echo 1;
}
else{
	echo 0;
}
sqlsrv_free_stmt($rs);
sqlsrv_close($conn);
?>

