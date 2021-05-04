<?php 
include'../config/config.php';
$diagnoses = $_POST['diagnoses'];
$id = $_POST['id'];
$retunurl = $_POST['retunurl'];

$a=0;
for ($f = 0; $f < count($diagnoses); $f++) {
	$where = $diagnoses[$a++];
	$a_slq = "SELECT * FROM variables_diagnoses WHERE name='$where'";
	$id_result = $db->query($a_slq)->fetch();

    if(@count($id_result["name"]) >= '1'){
		$sql = "INSERT INTO histy_diagnoses(diagnoses,user_id) VALUES ('".$where."','".$id."')";
		$db->exec($sql);
		header('Location:../views/history-view.php?id='.$id.'');
	}else{
		$sql_diagnoses = "INSERT INTO variables_diagnoses(name) VALUES ('".$where."')";
		$db->exec($sql_diagnoses);

		$sql = "INSERT INTO histy_diagnoses(diagnoses,user_id) VALUES ('".$where."','".$id."')";
		$db->exec($sql);
		header('Location:../views/history-view.php?id='.$id.'&#short_term');
	}
}

?>