<?php
	include'../../config/config.php';
	$table = $_POST['table'];
	$id=$_POST['id'];
	$result = $db->prepare("DELETE FROM ".$table." WHERE id= $id");
	$result->execute();
?>
