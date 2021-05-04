<?php 

include'../../config/config.php';
$set = $_POST['set'];
$ids = $_POST['ids'];

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


		$sql_pressname = "INSERT INTO bulk_medicen_prescription(bm_id,form,generic_name,trade_name,strength,unit,route,frequency,duration,indication,instructions) VALUES (
	'".$ids."', '".$variables_form."','".$generic_name."','".$trade_name."', '".$variables_strength."', '".$variables_unit."', '".$variables_route."', '".$variables_frequency."', '".$variables_duration."', '".$variables_indication."', '".$variables_instructions."')";
$db->exec($sql_pressname);

	}

};

header('Location:../../views/bulk/bulk-medicen.php');

?>
