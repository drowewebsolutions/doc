<?php 

include'../config/config.php';

$user_id = $_GET['id'];
$nd = $_GET['nd'];
$ndf_slq = "SELECT * FROM patients_details WHERE patients_id=$user_id";
$ndf_result = $db->query($ndf_slq)->fetch();

$pr_slq = "SELECT * FROM patients_prescription_number WHERE patients_id=$user_id order by id desc";
$pr_result = $db->query($pr_slq)->fetch();
$prescription_number = $pr_result['id'];

$patients_other_details_slq = "SELECT * FROM save_patients_other_details WHERE prescription_number="."'".$prescription_number."'"." order by id desc";
$patients_details_result = $db->query($patients_other_details_slq)->fetch();

if(!$onecheck){ $arid = '1'; }elseif(!$towcheck){ $arid = '2'; }elseif(!$threcheck){ $arid = '3'; }

$all_data_array = array("id" => $arid,
	"name" => $ndf_result['name'], 
    "gender" => $ndf_result['gender'], 
    "birthday" => $ndf_result['birthday'], 
    "residence" => explode(",", $ndf_result['residence'])[0], 
    "report_or_consultation" => null, 
    "phone" => $ndf_result['phone'], 
    "time" => null, 
    "apnumber" => null, 
    "occupation" => explode(",", $ndf_result['occupation'])[0], 
    "smoking" => $patients_details_result['smoking'], 
    "alcohol" => $patients_details_result['alcohol'], 
    "kidney" => null, 
    "allergies" => null, 
    "pregnancy" => null, 
    "lactating" => null, 
    "systolic_blood_pressure" => null, 
    "diastolic_blood_pressure" => null, 
    "blood_pressure" => null, 
    "random_blood_suga" => null, 
    "body_Weight" => null, 
    "height" => $patients_details_result['height'], 
    "bmi" => $patients_details_result['bmi'], 
    "mid" => null, 
    "pulse_rate" => null, 
    "respiratory_rate" => null, 
    "oxygen_saturation" => null, 
    "temperature" => null
);


$serialize_array = base64_encode(serialize($all_data_array));

$sql = "INSERT INTO `temp_center_patients_details`(`patients_id`, `order`, `center`, `nd`, `active`, `data_arrey`,`import`) VALUES ("."'".$user_id."'".","."'".$arid."'".","."'".$Center."'".","."'".$nd."'".",'1',"."'".$serialize_array."'".",'1')";
$db->exec($sql);

if($nd == 'n'){
	header('Location:../views/nurses-assesment.php?nd='.$nd.'&data='.$arid);
}else {
	header('Location:../views/doctor-assesment-and-add-parients.php?nd='.$nd.'&data='.$arid);
}

?>

