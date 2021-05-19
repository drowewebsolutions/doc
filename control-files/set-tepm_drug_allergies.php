 <?php 
include'../config/config.php';
$drugs = $_POST['drugs'];
$id = $_POST['id'];
$retunurl = $_POST['retunurl'];
var_dump($drugs);
$a=0;
for ($f = 0; $f < count($drugs); $f++) {
	$where = $drugs[$a++];
	$a_slq = "SELECT * FROM variables_generic_name WHERE name='$where'";
	$id_result = $db->query($a_slq)->fetch();

    if(@count($id_result["name"]) >= '1'){
		$sql = "INSERT INTO temp_drug_allergies(user_id,drug_allergies) VALUES ('".$id."','".$where."')";
		$db->exec($sql);
		header('Location:../views/'.$retunurl.'.php?id='.$id.'');
	}else{
		$sql_diagnoses = "INSERT INTO variables_generic_name(name) VALUES ('".$where."')";
		$db->exec($sql_diagnoses);

		$sql = "INSERT INTO temp_drug_allergies(user_id,drug_allergies) VALUES ('".$id."','".$where."')";
		$db->exec($sql);
		header('Location:../views/'.$retunurl.'.php?id='.$id.'');
	}
}
?>

