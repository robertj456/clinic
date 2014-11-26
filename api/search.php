<?php

include 'database.php';


if(isset($_GET['visitID'])&&is_numeric($_GET['visitID']))
{
	$visit=$_GET['visitID'];

$sql = "SELECT * from visit where Visit_ID = ?";
$visit = excuteQuery($sql, [$visit]);

$sql = "SELECT * from patient where PATIENT_ID = ?";
$patient = excuteQuery($sql, [$visit[0]['PATIENT_ID']]);

// do proper questuff
$sql = "SELECT * from queue where queue_name = ?";
$code = excuteQuery($sql, ["code ".$visit[0]['CODE']]);




$json =[$visit[0],$patient[0], $code[0]];


echo json_encode($json);

}

else{
// if improper input
echo 'ERROR';

}


?>