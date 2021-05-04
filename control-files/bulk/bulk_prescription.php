<?php
include'../../config/config.php';
$generic_name = $_POST['generic_name'];
$trade_name = $_POST['trade_name'];
$variables_form = $_POST['variables_form'];
$variables_strength = $_POST['variables_strength'];
$variables_unit = $_POST['variables_unit'];
$variables_route = $_POST['variables_route'];
$variables_frequency = $_POST['variables_frequency'];
$variables_duration = $_POST['variables_duration'];
$variables_indication = $_POST['variables_indication'];
$variables_instructions = $_POST['variables_instructions'];

$id = $_POST['id'];

function chckdb($db,$name,$tabel){
	$id = substr(strrchr($name, ","), 1);
	$value = explode(",", $name)[0];

	$a_slq = "SELECT * FROM $tabel WHERE name='$value'";
	$id_result = $db->query($a_slq)->fetch();

	if( !$id_result["name"] ){
		$sql = "INSERT INTO $tabel(name) VALUES ('".$value."')";
		$db->exec($sql);
	};
}


chckdb($db,$generic_name,'variables_generic_name');
chckdb($db,$trade_name,'variables_trade_name');
chckdb($db,$variables_form,'variables_form');
chckdb($db,$variables_strength,'variables_strength');
chckdb($db,$variables_unit,'variables_unit');
chckdb($db,$variables_route,'variables_route');
chckdb($db,$variables_frequency,'variables_frequency');
chckdb($db,$variables_duration,'variables_duration');
chckdb($db,$variables_indication,'variables_indication');
chckdb($db,$variables_instructions,'variables_instructions');


$sql_pressname = "INSERT INTO bulk_medicen_prescription(bm_id,form,generic_name,trade_name,strength,unit,route,frequency,duration,indication,instructions) VALUES (
	'".$id."', '".$variables_form."','".$generic_name."','".$trade_name."', '".$variables_strength."', '".$variables_unit."', '".$variables_route."', '".$variables_frequency."', '".$variables_duration."', '".$variables_indication."', '".$variables_instructions."')";
$db->exec($sql_pressname);

header('Location:../../views/bulk/bulk-medicen.php');


