<?php
	include'../config/config.php';
	$patients_id=$_GET['id'];
	$result = $db->prepare("DELETE FROM patients_details WHERE patients_id= $id");
	$result->execute();
	
	$result2 = $db->prepare("DELETE FROM patients_other_details WHERE patients_id= $id");
	$result2->execute();
	
	header('Location:../views/all-patients.php');
?>
