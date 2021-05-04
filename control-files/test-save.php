<?php 
include'../config/config.php';
$variables_name = $_POST['variables_name'];
$variables_name_sinhala = $_POST['variables_name_sinhala'];
$special_instruction = $_POST['special_instruction'];
$special_instruction_sinhala = $_POST['special_instruction_sinhala'];

// query
$sql = "INSERT INTO variables_test(name,sinhala,special_instruction,special_instruction_sinhala) VALUES ('".$variables_name."','".$variables_name_sinhala."','".$special_instruction."','".$special_instruction_sinhala."')";
$db->exec($sql);
header('Location:../views/drug-variables/test-variables.php');
?>
