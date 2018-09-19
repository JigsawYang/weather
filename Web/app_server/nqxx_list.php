<?php
header("Content-type:text/json; charset=gb2312");
$pageNo=isset($_POST['pageNo'])?$_POST['pageNo']:1;
$pSize=isset($_POST['pageSize'])?$_POST['pageSize']:10;
$title_info=isset($_POST['title_info'])?$_POST['title_info']:'';
$user_id=$_POST['user_id'];
$type=isset($_POST['type'])?$_POST['type']:'ssny';
$orderby=' order by id desc';
$findstr=($title_info<>'')?" and title like '%{$title_info}%'":"";
if($findstr<>''){
	$findstr='where 1=1 '.$findstr;
	$findstr=iconv("utf-8", "gb2312",$findstr);
}
$findstr=$findstr.$orderby;
// echo $findstr;
// die();

$r1=($pageNo-1)*$pSize;
$r2=$r1+$pSize;

function arrayRecursive(&$array, $function, $apply_to_keys_also = false){
	static $recursive_counter = 0;
	if (++$recursive_counter > 1000) {
		die('possible deep recursion attack'); 
		}
	foreach ($array as $key => $value) { 
		if (is_array($value)) {
			arrayRecursive($array[$key], $function, $apply_to_keys_also);
			} 
		else {
			$array[$key] = $function($value);
			}    
		if ($apply_to_keys_also && is_string($key)) {
			$new_key = $function($key);
			if ($new_key != $key) {
				$array[$new_key] = $array[$key];
				unset($array[$key]);
				}
			}
		}
	$recursive_counter--;
}

function JSON($array) { 
	arrayRecursive($array, 'urlencode', true); 
	$json = json_encode($array); 
	return urldecode($json); 
} 

include "conn.php";
$arr=array();
$i=0;
if($type=='ssny'){
	$sql="select id,(case when len(title)>12 then substring(title,1,15)+'...' else title end) as title,link,convert(char(10),addtime,120) as dt,".
		"charindex('({$user_id})',reader) as tag from sp_stservice where id in(select top {$r2} id from sp_stservice {$findstr}) and id not ".
		"in(select top {$r1} id from sp_stservice {$findstr}) {$orderby}";	
}
elseif($type=='nyqx'){
	$sql="select id,(case when len(title)>12 then substring(title,1,15)+'...' else title end) as title,link,convert(char(10),addtime,120) as dt,".
		"charindex('({$user_id})',reader) as tag from sp_qxservice where id in(select top {$r2} id from sp_qxservice {$findstr}) and id not ".
		"in(select top {$r1} id from sp_qxservice {$findstr}) {$orderby}";
}
elseif($type=='zzkp'){
	$sql="select id,(case when len(title)>12 then substring(title,1,15)+'...' else title end) as title,author,convert(char(10),addtime,120) as dt,".
		"charindex('({$user_id})',reader) as tag from sp_knowledge where id in(select top {$r2} id from sp_knowledge {$findstr}) and id not ".
		"in(select top {$r1} id from sp_knowledge {$findstr}) {$orderby}";
}
else{
	echo '';
	die();
}
// echo $sql;
// die();
$rs=sqlsrv_query($conn,$sql);
while($row = sqlsrv_fetch_array($rs,SQLSRV_FETCH_ASSOC)){
	$arr[$i]=$row;
	$i++;
	}
//$arr[i]['title']=$sql;
sqlsrv_free_stmt($rs);
sqlsrv_close($conn);
echo JSON($arr); 
?>

