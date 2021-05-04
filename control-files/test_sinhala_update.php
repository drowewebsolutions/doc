<?php 
include'../config/config.php';

$id = $_POST['id'];
$sinhala_name = $_POST['sinhala_name'];
$table = $_POST['tb'];
$sql = "UPDATE ".$table." SET sinhala=? WHERE id=?";
$db->prepare($sql)->execute([$sinhala_name, $id]);

header('Location:../views/drug-variables/test-variables.php');
?>
