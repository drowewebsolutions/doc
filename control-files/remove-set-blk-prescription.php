<?php
	include'../config/config.php';
	$id=$_GET['id'];
	$patients_id=$_GET['patients_id'];
	$result = $db->prepare("DELETE FROM prescription_bluk_drugs WHERE id= $id");
	$result->execute();

header('Location:../views/prescription.php?id='.$patients_id.'');
?>
