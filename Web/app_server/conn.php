<?php
error_reporting(E_ALL);
$conInfo=array('Database'=>'zhny', 'UID'=>'sa', 'PWD'=>'sasa');
$conn=sqlsrv_connect('localhost', $conInfo);
/*判断连接成功与否：*/
if( $conn == false )
{
    die( print_r( sqlsrv_errors(), true));
}
?>