<?php 
include'../config/config.php';

$id = $_POST['id'];
$variables_name = $_POST['variables_name'];
$variables_name_sinhala = $_POST['variables_name_sinhala'];
$special_instruction = $_POST['special_instruction'];
$special_instruction_sinhala = $_POST['special_instruction_sinhala'];

$sql = "UPDATE variables_test SET name=?,sinhala=?,special_instruction=?,special_instruction_sinhala=? WHERE id=?";
$db->prepare($sql)->execute([$variables_name,$variables_name_sinhala,$special_instruction,$special_instruction_sinhala, $id]);

header('Location:../views/drug-variables/test-variables.php');
?>
