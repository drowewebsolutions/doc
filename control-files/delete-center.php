<?php
	include'../config/config.php';
	$id=$_POST['id'];
	$result2 = $db->prepare("DELETE FROM medical_center WHERE id= $id");
	$result2->execute();
?>
