<?php 
include'../config/config.php';

$from_arry = json_decode($_POST['from_arry']);
$array = array();
foreach($from_arry as $key){
    $array[] = $key;
};

$all_data_array = array("id" => $array[0],
	"name" => $array[1], 
    "gender" => $array[2], 
    "birthday" => $array[3], 
    "residence" => $array[4], 
    "report_or_consultation" => $array[5], 
    "phone" => $array[6], 
    "time" => $array[7], 
    "apnumber" => $array[8], 
    "occupation" => $array[9], 
    "smoking" => $array[10], 
    "alcohol" => $array[11], 
    "kidney" => $array[12], 
    "allergies" => $array[13], 
    "pregnancy" => $array[14], 
    "lactating" => $array[15], 
    "lrmp" => $array[16], 
    "systolic_blood_pressure" => $array[17], 
    "diastolic_blood_pressure" => $array[18], 
    "blood_pressure" => $array[19], 
    "random_blood_suga" => $array[20], 
    "body_Weight" => $array[21], 
    "height" => $array[22], 
    "bmi" => $array[23], 
    "mid" => $array[24], 
    "pulse_rate" => $array[25], 
    "respiratory_rate" => $array[26], 
    "oxygen_saturation" => $array[27], 
    "temperature" => $array[28],
    "nd" => $array[29]
);

 
$serialize_array = base64_encode(serialize($all_data_array));
$sql = "UPDATE temp_center_patients_details SET active='1', data_arrey="."'".$serialize_array."'"." WHERE id=".$array[0]." and nd="."'".$array[29]."'"."";
$stmt = $db->prepare($sql);
$stmt->execute();

?>
