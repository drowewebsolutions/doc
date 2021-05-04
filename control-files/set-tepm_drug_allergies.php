<?php 
include'../config/config.php';
$drugs = $_POST['drugs'];
$id = $_POST['id'];
//var_dump($drugs);
$retunurl = $_POST['retunurl'];
// $a_slq = "SELECT * FROM variables_generic_name WHERE name='$drugs'";
// $id_result = $db->query($a_slq)->fetch();

// if (!$id_result["name"]) {
//     $sql = "INSERT INTO variables_generic_name(name) VALUES ('" . $drugs . "')";
//     $db->exec($sql);
// };


$sql = "INSERT INTO temp_drug_allergies (user_id,drug_allergies) VALUES ('".$id."','".$drugs."')";
$db->exec($sql);
header('Location:../views/'.$retunurl.'.php?id='.$id.'');
?>

