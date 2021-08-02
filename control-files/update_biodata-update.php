<?php 
include'../config/config.php';

$id = $_POST['id'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$birthday = $_POST['birthday'];

$sql = "UPDATE patients_details SET name=?,birthday=?,gender=? WHERE patients_id =?";
$db->prepare($sql)->execute([$name,$birthday,$gender,$phone,$residence,$occupation, $id]);

header('Location:../views/update_biodata.php?id='.$id.'');
?>
