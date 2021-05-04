<?php 
include'../config/config.php';

$center = $_COOKIE['center'];
$time = date('Y-m-d');
$sql = "INSERT INTO medical_center(name,time) VALUES ('".$center."','".$time."')";
$db->exec($sql);

header('Location:../index.php');