<?php 
include'../config/config.php';
$variables_name = $_POST['variables_name'];
$variables_name_sinhala = $_POST['variables_name_sinhala'];
$test_id = $_POST['test_id'];

// query
$sql = "INSERT INTO variables_test_units(test_id,name,sinhala) VALUES ('".$test_id."','".$variables_name."','".$variables_name_sinhala."')";
$db->exec($sql);
header('Location:../views/drug-variables/test-variables.php');
?>
