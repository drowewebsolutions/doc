<?php 
include'../config/config.php';

$id = $_GET['id'];

$result2 = $db->prepare("DELETE FROM temp_center_patients_details WHERE id= $id");
$result2->execute();

header('Location:../index.php');
?>
