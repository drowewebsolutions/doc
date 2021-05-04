<?php
include'../config/config.php';
$user_id = $_GET['patients_id'];

$sql = "UPDATE today_patients SET status='1' WHERE patients_id='$user_id'";
$stmt = $db->prepare($sql);
$stmt->execute();

header('Location:../views/today-patients.php');