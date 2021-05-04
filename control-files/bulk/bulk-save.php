<?php 
include'../../config/config.php';
$balik_name = $_POST['balik-name'];

// query
$sql = "INSERT INTO bulk_medicen(name) VALUES ('".$balik_name."')";
$db->exec($sql);
header('Location:../../views/bulk/bulk-medicen.php');
?>
