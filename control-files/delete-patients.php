<?php
	include'../config/config.php';
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM today_patients WHERE id= $id");
	$result->execute();

header('Location:../views/today-patients.php');
?>
