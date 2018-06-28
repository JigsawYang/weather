<?php 

$conInfo=array('Database'=>'fuck', 'UID'=>'sa', 'PWD'=>'2103189');

$conn=sqlsrv_connect('127.0.0.1', $conInfo);
// print_r($conn);

/*判断连接成功与否：*/

if( $conn == false )

{

    die( print_r( sqlsrv_errors(), true));

}

else

{

    echo("yes<br>");

}

$rs=sqlsrv_query($conn, "select * from gg");


if($rs == false)

{

    echo("false<br>");

}

else

{

    while($row = sqlsrv_fetch_array($rs))

    {

        print_r($row);

    }

    sqlsrv_free_stmt($rs);

    sqlsrv_close($conn);

}

 ?>