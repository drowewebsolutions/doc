<?php 
include'../../config/config.php';

$id = $_POST['id'];
$name = $_POST['update_dm_name'];

$sql = "UPDATE bulk_medicen SET name=? WHERE id =?";
$db->prepare($sql)->execute([$name,	$id]);

header('Location:../../views/bulk/bulk-medicen.php');
?>
