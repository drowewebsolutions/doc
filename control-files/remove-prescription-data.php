<?php
	include'../config/config.php';
	$id=$_POST['id'];
	$table=$_POST['table'];
	$result = $db->prepare("DELETE FROM $table WHERE id= $id");
	$result->execute();

?>
