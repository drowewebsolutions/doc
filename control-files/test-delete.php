<?php
	include'../config/config.php';
	$id = $_GET['id'];
	$table = $_GET['tb'];
	$result = $db->prepare("DELETE FROM $table WHERE id= $id");
	$result->execute();

header('Location:../views/drug-variables/test-variables.php');
?>
