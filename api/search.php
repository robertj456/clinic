<?php

include 'database.php';
$visit=$_GET['visitID'];
$visit=1;

$sql = "SELECT * from visit where Visit_ID = ?";
$visit = excuteQuery($sql, [$visit]);




$str='{';
$str =$str."\"visit\":{";
foreach($visit[0] as $key => $value){
$str =$str."\"$key\":\"$value\",";
}
$str=substr($str, 0, -1);
$str =$str.'}';



$str = $str.'}';
echo $str;

$sql = "SELECT * from patient where paitent_ID = ?";
$patient = excuteQuery($sql, [$visit]);





?>