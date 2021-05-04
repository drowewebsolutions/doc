<?php 
include'../config/config.php';
$test_indications = $_POST['test_indications'];
$test_id = $_POST['test_id'];

// query
$sql = "INSERT INTO variables_test_indications(test_id,name) VALUES ('".$test_id."','".$test_indications."')";
$db->exec($sql);
header('Location:../views/drug-variables/test-variables.php');
?>
