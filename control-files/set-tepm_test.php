<?php 
include'../config/config.php';
$test = $_POST['test'];

if(isset($_POST['indications'])){
	$indications = $_POST['indications'];
}else{
	$indications = null;
}

$test_catagory = $_POST['test_cat'];

$abndl = $_POST['abndl'];
$countabndl = count($abndl);
//var_dump($indications);

$days = $_POST['investigations'].'-'.$_POST['month'];
$retunurl = $_POST['retunurl'];
$id = $_POST['id'];

$test_catagory_count = count($test_catagory);
$test_count = count($abndl);

if(isset($_POST['indications'])){
	$indications_count = count($indications);
}else{
	$indications_count = '0';
}

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



for ($f = 0; $f < $countabndl; $f++) {

	$bndlact = $abndl[$f];
	$main_test = explode(",",  $test_catagory[$f])[0];
	$main_test_id = explode(",",  $test_catagory[$f])[1];
	$testval = @$test[$f];
  $indications_value_blk = @$indications[$f];

  
	if(!$testval == null){
		if($bndlact == '1'){

			$test_count_in = count($testval);
			
			$group_sql = "INSERT INTO temp_investigations_group(day_id,test_catagory,test_id,user_id) VALUES ('".$last_id."','".$main_test."','".$main_test_id."','".$id."')";
			$db->exec($group_sql);
			$group_id = $db->lastInsertId();

			$test_value = array();
			$test_value_id = array();

			for ($w = 0; $w < $test_count_in; $w++) {
				 	$test_value_cal = explode(",",  $test[$f][$w])[0];
				 	$test_value[] = explode(",",  $test[$f][$w])[0];
				 	$test_value_id[] = explode(",",  $test[$f][$w])[1];


				$a_slqunits = "SELECT * FROM variables_test_units WHERE name='$test_value_cal'";
				$units_result = $db->query($a_slqunits)->fetch();
				if(!$units_result["name"]){
					$variables_test_units = "INSERT INTO variables_test_units(name,test_id) VALUES ('".$test_value_cal."','".$main_test_id."')";
					$db->exec($variables_test_units);
				}
			}

			if(isset(explode(",",  $indications_value_blk[0])[0])){
				$indications_value_cal = explode(",",  $indications_value_blk[0])[0];
			}else{
				$indications_value_cal = '-';
			}
			
			if(isset(explode(",",  $indications_value_blk[0])[1])){
				$comindications_id = explode(",",  $indications_value_blk[0])[1];
			}else{
				$comindications_id = '-';
			}
			

			$a_indications = "SELECT * FROM variables_test_units WHERE name='$indications_value_cal'";
			$indications_result = $db->query($a_indications)->fetch();
			if(!$indications_result["name"]){
				$variables_test_units = "INSERT INTO variables_test_indications(name,test_id) VALUES ('".$indications_value_cal."','".$main_test_id."')";
				$db->exec($variables_test_units);
			}

			$test_value = implode(', ', remove_empty($test_value));
			$test_value_id = implode(', ', remove_empty($test_value_id));
			
			$sql = "INSERT INTO temp_test(group_id,indications,indications_id,test,test_id) VALUES ('".$group_id."','".$indications_value_cal."','".$comindications_id."','".$test_value."','".$test_value_id."')";
			$db->exec($sql);

		}else{

			$test_count_in = count($testval);
			
			$group_sql = "INSERT INTO temp_investigations_group(day_id,test_catagory,test_id,user_id) VALUES ('".$last_id."','".$main_test."','".$main_test_id."','".$id."')";
			$db->exec($group_sql);
			$group_id = $db->lastInsertId();

			for ($y = 0; $y < $test_count_in; $y++) {
				 	$test_value = explode(",",  $test[$f][$y])[0];
				 	$test_value_id = explode(",",  $test[$f][$y])[1];

				 	$indications_value_cal = explode(",",  $indications_value_blk[0])[0];
					$comindications_id = explode(",",  $indications_value_blk[0])[1];

					$a_slqunits = "SELECT * FROM variables_test_units WHERE name='$test_value'";
					$units_result = $db->query($a_slqunits)->fetch();
					if(!$units_result["name"]){
						$variables_test_units = "INSERT INTO variables_test_units(name,test_id) VALUES ('".$test_value."','".$main_test_id."')";
						$db->exec($variables_test_units);
					}

					$a_indications = "SELECT * FROM variables_test_units WHERE name='$indications_value_cal'";
					$indications_result = $db->query($a_indications)->fetch();
					if(!$indications_result["name"]){
						$variables_test_units = "INSERT INTO variables_test_indications(name,test_id) VALUES ('".$indications_value_cal."','".$main_test_id."')";
						$db->exec($variables_test_units);
					}

					$sql = "INSERT INTO temp_test(group_id,indications,indications_id,test,test_id) VALUES ('".$group_id."','".$indications_value_cal."','".$comindications_id."','".$test_value."','".$test_value_id."')";
					$db->exec($sql);

			}

		}

	}


};

header('Location:../views/'.$retunurl.'.php?id='.$id.'&#short_term');



?>
	