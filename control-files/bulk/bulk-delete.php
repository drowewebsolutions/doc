<?php
	include'../../config/config.php';
	$id = $_GET['id'];
	$result = $db->prepare("DELETE FROM bulk_medicen WHERE id= $id");
	$result->execute();

header('Location:../../views/bulk/bulk-medicen.php');
?>
