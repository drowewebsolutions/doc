<?php 
include'../config/config.php';

$date = date('Y-M-D');
$time = $_POST['time'];
$date_and_time = $date.' '.$time;
session_start();
$_SESSION["log"] = "1";
// query
$sql = "INSERT INTO medicine_center(name,date_time) VALUES ('".$medicine_center."','".$date_and_time."')";
$db->exec($sql);
header('Location:../index.php');
?>
