<?php
error_reporting(E_ALL);
$conInfo=array('Database'=>'zhny', 'UID'=>'sa', 'PWD'=>'SA123sa');
$conn=sqlsrv_connect('localhost', $conInfo);
/*�ж����ӳɹ����*/
if( $conn == false )
{
    die( print_r( sqlsrv_errors(), true));
}
?>