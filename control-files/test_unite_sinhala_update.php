<?php 
include'../config/config.php';

$id = $_POST['id'];
$sinhala_name = $_POST['sinhala_name'];

$sql = "UPDATE variables_test_units SET sinhala=? WHERE id=?";
$db->prepare($sql)->execute([$sinhala_name, $id]);

header('Location:../views/drug-variables/test-variables.php');
?>
