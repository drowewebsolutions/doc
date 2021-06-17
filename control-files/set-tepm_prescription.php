<?php
include'../config/config.php';
$generic_name = $_POST['generic_name'];
$trade_name = $_POST['trade_name'];
if(@$_POST['drugs_to_be'] && $_POST['db_catogary']){
	$category = $_POST['drugs_to_be'];
}elseif($_POST['db_catogary']){
	$category = $_POST['db_catogary'];
}
$variables_form = $_POST['variables_form'];
$variables_strength = $_POST['variables_strength'];
$variables_unit = $_POST['variables_unit'];
$variables_route = $_POST['variables_route'];
$variables_frequency = $_POST['variables_frequency'];
$variables_duration = $_POST['variables_duration'];
$variables_indication = $_POST['variables_indication'];
$variables_instructions = $_POST['variables_instructions'];
$retunurl = $_POST['retunurl'];
$user_id = $_POST['user_id'];


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

$sql_pressname = "INSERT INTO temp_prescription_drugs(user_id,form,generic_name,trade_name,strength,unit,route,frequency,duration,indication,instructions,category) VALUES (
	'".$user_id."', '".$variables_form."','".$generic_name."','".$trade_name."', '".$variables_strength."', '".$variables_unit."', '".$variables_route."', '".$variables_frequency."', '".$variables_duration."', '".$variables_indication."', '".$variables_instructions."','".$category ."')";
$db->exec($sql_pressname);

$lastid = $db->lastInsertId();
$sql = "UPDATE temp_prescription_drugs SET order_no=".$lastid." WHERE id=".$lastid."";
$stmt = $db->prepare($sql);
$stmt->execute();

$prs_chk = "SELECT * FROM prescription_bluk_drugs WHERE form='".$variables_form."' and generic_name='".$generic_name."' and trade_name='".$trade_name."' and strength='".$variables_strength."' and unit='".$variables_unit."' and route='".$variables_route."' and frequency='".$variables_frequency."' and duration='".$variables_duration."' and indication='".$variables_indication."' and instructions='".$variables_instructions."'";
$id_result_ck = $db->query($prs_chk)->fetch();

if(!$id_result_ck["id"]){
	$sql_pressname = "INSERT INTO prescription_bluk_drugs(form,generic_name,trade_name,strength,unit,route,frequency,duration,indication,instructions) VALUES ('".$variables_form."','".$generic_name."','".$trade_name."', '".$variables_strength."', '".$variables_unit."', '".$variables_route."', '".$variables_frequency."', '".$variables_duration."', '".$variables_indication."', '".$variables_instructions."')";
	$db->exec($sql_pressname);
	//echo "string";
}

header('Location:../views/'.$retunurl.'.php?id='.$user_id.'#short_term');
?>
