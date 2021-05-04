<?php 
include'../config/config.php';

$id = $_POST['id'];
$number = $_POST['number'];

$sql = "UPDATE variables_others_id SET order_id=? WHERE id=?";
$db->prepare($sql)->execute([$number, $id]);


header('Location:../views/drug-variables/other-units.php');
?>
