<?php 
include'../config/config.php';
$test = $_POST['test'];
$indications = $_POST['indications'];
$test_catagory = $_POST['test_cat'];


if(isset($_POST['abndl'])){
	$abndl = $_POST['abndl'];
}else{
	$abndl = null;
}
var_dump($indications);

$days = $_POST['investigations'].'-'.$_POST['month'];
$retunurl = $_POST['retunurl'];
$id = $_POST['id'];

$test_catagory_count = count($test_catagory);
$test_count = count($test);
$indications_count = count($indications);
$a=0;


function remove_empty($array) {
  return array_filter($array, '_remove_empty_internal');
}

function _remove_empty_internal($value) {
  return !empty($value) || $value === 0;
}

$sql = "INSERT INTO temp_investigations_days(user_id,days) VALUES ('".$id."','".$days."')";
$db->exec($sql);
$last_id = $db->lastInsertId();



for ($f = 0; $f < $test_count; $f++) {

	$main_test = explode(",",  $test_catagory[$f])[0];
	$main_test_id = explode(",",  $test_catagory[$f])[1];

	$indications_value_blk = explode(",",  @$indications[$f][0])[0];
	if(isset(explode(",",  $indications[$f][0])[1])){
		$indications_id_blk = explode(",",  $indications[$f][0])[1];
	}else{
		$indications_id_blk = $main_test_id;
	}


	$group_sql = "INSERT INTO temp_investigations_group(day_id,test_catagory,test_id,user_id) VALUES ('".$last_id."','".$main_test."','".$main_test_id."','".$id."')";
	$db->exec($group_sql);
	$group_id = $db->lastInsertId();


	$test_count_in =  count($test[$f]);
	$indications_count_in =  count($indications[$f]);
		
	if($abndl[$f] == "1"){

		for ($w = 0; $w < $test_count_in; $w++) {

			$test_value[] = explode(",",  $test[$f][$w])[0];
			$test_value_cal = explode(",",  $test[$f][$w])[0];
			if(isset(explode(",",  $test[$f][$w])[1])){
				$test_id[] = explode(",",  $test[$f][$w])[1];
				$test_id_cal = explode(",",  $test[$f][$w])[1];
			}else{
				$test_id[] = $main_test_id;
				$test_id_cal = $main_test_id;
			}

			$a_slqunits = "SELECT * FROM variables_test_units WHERE name='$test_value_cal'";
			$units_result = $db->query($a_slqunits)->fetch();
			if(!$units_result["name"]){
				$variables_test_units = "INSERT INTO variables_test_units(name,test_id) VALUES ('".$test_value_cal."','".$test_id_cal."')";
				$db->exec($variables_test_units);
			}

		}

		for ($u = 0; $u < $indications_count_in; $u++) {

			$indications_value[] = explode(",",  $indications[$f][$u])[0];
			$indications_value_cal = explode(",",  $indications[$f][$u])[0];
			if(isset(explode(",",  $indications[$f][$u])[1])){
				$indications_id[] = explode(",",  $indications[$f][$u])[1];
				$indications_id_cal = explode(",",  $indications[$f][$u])[1];
			}else{
				$indications_id[] = $main_indications_id;
				$indications_id_cal = $main_indications_id;
			}

			$a_slqunits = "SELECT * FROM variables_test_indications WHERE name='$indications_value_cal'";
			$units_result = $db->query($a_slqunits)->fetch();
			if(!$units_result["name"]){
				$variables_test_units = "INSERT INTO variables_test_indications(name,test_id) VALUES ('".$indications_value_cal."','".$test_id_cal."')";
				$db->exec($variables_test_units);
			}

		}



		$comtest_value = implode(', ', remove_empty($test_value));
		$comtest_id = implode(', ', remove_empty($test_id));

		$comindications_value = implode(', ', remove_empty($indications_value));
		$comindications_id = implode(', ', remove_empty($indications_id));


		$sql = "INSERT INTO temp_test(group_id,indications,indications_id,test,test_id) VALUES ('".$group_id."','".$comindications_value."','".$comindications_id."','".$comtest_value."','".$comtest_id."')";
		$db->exec($sql);


	}else{

		for ($w = 0; $w < $test_count_in; $w++) {

			$test_value = explode(",",  $test[$f][$w])[0];

			if(isset(explode(",",  $test[$f][$w])[1])){
				$test_id = explode(",",  $test[$f][$w])[1];
			}else{
				$test_id = $main_test_id;
			}
			

			$indica_value = explode(",",  $indications[$f][$w])[0];

			if(isset(explode(",",  $indications[$f][$w])[1])){
				$indications_id = explode(",",  $indications[$f][$w])[1];
			}else{
				$indications_id = $main_test_id;
			}
			
			$a_slq = "SELECT * FROM variables_test_indications WHERE name='$test_value'";
			$id_result = $db->query($a_slq)->fetch();
			if(!$id_result["name"]){
				$indications_sql = "INSERT INTO variables_test_indications(name,test_id) VALUES ('".$indica_value."','".$test_id."')";
				$db->exec($indications_sql);
			}

			$a_slqunits = "SELECT * FROM variables_test_units WHERE name='$indica_value'";
			$units_result = $db->query($a_slqunits)->fetch();
			if(!$units_result["name"]){
				$variables_test_units = "INSERT INTO variables_test_units(name,test_id) VALUES ('".$test_value."','".$test_id."')";
				$db->exec($variables_test_units);
			}

			$sql_tp = "INSERT INTO temp_test(group_id,indications,indications_id,test,test_id) VALUES ('".$group_id."','".$indica_value."','".$indications_id."','".$test_value."','".$test_id."')";
			$db->exec($sql_tp);

		
		}

	}

};

header('Location:../views/'.$retunurl.'.php?id='.$id.'&#short_term');



?>
	