<?php 
include'../config/config.php';
$days = $_POST['time'].' '.$_POST['month'];
$pay = $_POST['payment'];
$id = $_POST['id'];
$retunurl = $_POST['retunurl'];
// query
$sql = "INSERT INTO temp_next_visits (user_id,days,pay) VALUES ('".$id."','".$days."','".$pay."')";
$db->exec($sql);
header('Location:../views/'.$retunurl.'.php?id='.$id.'&#short_term');
?>
	