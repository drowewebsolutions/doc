<?php
	include'../../config/config.php';
	$id = $_GET['id'];
	$madi = $_GET['madi'];
	$result = $db->prepare("DELETE FROM bulk_medicen_prescription WHERE id= $id");
	$result->execute();
	header('Location:../../views/bulk/bulk-medicen.php');
?>
