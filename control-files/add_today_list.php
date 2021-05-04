<?php 
include'../config/config.php';

$id = $_POST['id'];
$number = $_POST['number'];
$time = $_POST['time'];
$apnumber = $_POST['apnumber'];
$report_or_consultation = $_POST['report_or_consultation'];

// query
$sql = "INSERT INTO today_patients(patients_id ,apnumber,time,order_id,report_or_consultation) VALUES ('".$id."','".$apnumber."','".$time."','".$number."','".$report_or_consultation."')";
$db->exec($sql);

$lastid = $db->lastInsertId();
$sql = "UPDATE today_patients SET order_set=".$lastid." WHERE id=".$lastid."";
$stmt = $db->prepare($sql);
$stmt->execute();

header('Location:../views/today-patients.php');
?>
