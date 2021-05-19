<?php
	include'../config/config.php';
	$id=$_POST['id'];
	$result2 = $db->prepare("DELETE FROM prescription_bluk_drugs WHERE id= $id");
	$result2->execute();
?>
