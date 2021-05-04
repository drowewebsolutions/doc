<?php
	include'../config/config.php';
	$id=$_POST['id'];
	$result = $db->prepare("DELETE FROM temp_prescription_drugs WHERE id = $id");
	$result->execute();
?>

