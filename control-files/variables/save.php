<?php 
include'../../config/config.php';
$table = $_GET['tb'];
$variables_name = $_POST['variables_name'];
$variables_name_sinhala = $_POST['variables_name_sinhala'];

// query
$sql = "INSERT INTO ".$table."(name,sinhala) VALUES ('".$variables_name."','".$variables_name_sinhala."')";
$db->exec($sql);
header('Location:../../views/drug-variables/variables.php?tb='.$table.'');
?>
