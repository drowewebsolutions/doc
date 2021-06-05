<?php 
include'../config/config.php';

$id = $_POST['id'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$birthday = $_POST['birthday'];
$residence = $_POST['residence'];
$phone = $_POST['phone'];
$occupation = $_POST['occupation'];

$sql = "UPDATE patients_details SET name=?,birthday=?,gender=?,phone=?,residence=?,occupation=? WHERE patients_id =?";
$db->prepare($sql)->execute([$name,$birthday,$gender,$phone,$residence,$occupation, $id]);

header('Location:../views/update_biodata.php?id='.$id.'');
?>
