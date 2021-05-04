<?php
	include'../../config/config.php';
	$table = $_GET['tb'];
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM ".$table." WHERE id= $id");
	$result->execute();
	header('Location:../../views/drug-variables/variables.php?tb='.$table.'');
?>
