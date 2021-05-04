<?php 
include'../config/config.php';
$test = $_POST['test'];
$investigations = $_POST['investigations'].'-'.$_POST['month'];
$retunurl = $_POST['retunurl'];
$id = $_POST['id'];
$test_count = count($test);
$a=0;
var_dump($id);
for ($f = 0; $f < $test_count; $f++) {

	$r = $a++;
	$tests_count = count($test[$r])-1;
	$variables_others_id = explode(",",  $test[$r][0]);

	$q = 1;
	for ($g = 0; $g < $tests_count; $g++) {
		$w = $q++;
		
		$variables_others_units_id[$r]= substr(strrchr($test[$r][$w], ","), 1);
		$colect_id = $variables_others_units_id[$r];
		$prescription_value = explode(",", $test[$r][$w])[0];

		$a_slq = "SELECT * FROM variables_test_units WHERE name='$prescription_value'";
		$id_result = $db->query($a_slq)->fetch();

	    if(count($id_result["name"]) == '0'){
		 	$sql_diagnoses = "INSERT INTO variables_test_units(test_id,name) VALUES ('".$variables_others_id[1]."','".$prescription_value."')";
		 	$db->exec($sql_diagnoses);
		 }

	}

};
$variables_others_units_id_srialize = serialize($variables_others_units_id);

//query
$sql = "INSERT INTO histy_test(user_id,test, investigations,investigations_id) VALUES ('".$id."','".serialize($test)."','".$investigations."','".$variables_others_units_id_srialize."')";
$db->exec($sql);
header('Location:../views/history-view.php?id='.$id.'&#short_term');

?>
	