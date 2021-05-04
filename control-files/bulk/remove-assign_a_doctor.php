<?php
	include'../config/config.php';
	$id=$_POST['id'];
	$result = $db->prepare("DELETE FROM assign_a_doctor WHERE id= $id");
	$result->execute();
?>
