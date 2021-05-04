<?php 

include'../config/config.php';
$set = $_POST['set'];
$user_id = $_POST['user_id'];
$retunurl = $_POST['retunurl'];

if(@$_POST['drugs_to_be'] && $_POST['db_catogary']){
	$category = $_POST['drugs_to_be'];
}elseif($_POST['db_catogary']){
	$category = $_POST['db_catogary'];
}

$test_count = count($set);
for ($f = 0; $f < $test_count; $f++) {

	if(@$set[$f]['id']){
		$trade_name = $set[$f]['trade_name']; 
		$generic_name = $set[$f]['generic_name']; 
		$variables_form = $set[$f]['variables_form']; 
		$variables_strength = $set[$f]['variables_strength']; 
		$variables_unit = $set[$f]['variables_unit']; 
		$variables_route = $set[$f]['variables_route']; 
		$variables_frequency = $set[$f]['variables_frequency'];
		$variables_duration = $set[$f]['variables_duration'];
		$variables_indication = $set[$f]['variables_indication'];
		$variables_instructions = $set[$f]['variables_instructions']; 

		$sql_pressname = "INSERT INTO histy_prescription_drugs(user_id,form,generic_name,trade_name,strength,unit,route,frequency,duration,indication,instructions,category) VALUES (
	'".$user_id."', '".$variables_form."','".$generic_name."','".$trade_name."', '".$variables_strength."', '".$variables_unit."', '".$variables_route."', '".$variables_frequency."', '".$variables_duration."', '".$variables_indication."', '".$variables_instructions."', '".$category."')";
		$db->exec($sql_pressname);

		$lastid = $db->lastInsertId();
		$sql = "UPDATE histy_prescription_drugs SET order_no=".$lastid." WHERE id=".$lastid."";
		$stmt = $db->prepare($sql);
		$stmt->execute();
	}

};

header('Location:../views/history-view.php?id='.$user_id.'#short_term');

?>
