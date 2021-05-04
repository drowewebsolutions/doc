<?php 
include'../config/config.php';

$id = $_GET['id'];
$nd = $_GET['nd'];

$sql = "UPDATE temp_center_patients_details SET data_arrey=null WHERE id="."'".$id."'"."";
$stmt = $db->prepare($sql);
$stmt->execute();

header('Location:../views/nurses-assesment.php?nd='.$nd.'&data='.$id);
?>
