<?php
	include'../config/config.php';
	$id=$_POST['id'];
	$table=$_POST['table'];
	$result = $db->prepare("DELETE FROM medicine_center WHERE id= $id");
	$result->execute();

?>
