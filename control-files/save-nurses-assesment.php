<?php 
include'../config/config.php';
if(isset($_POST['patient_id'])){
	$arady_patient_id = $_POST['patient_id'];
}else{
	$arady_patient_id = null;
}

$name = $_POST['name'];
$birthday = $_POST['birthday'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$residence = $_POST['residence'];
$occupation = $_POST['occupation'];
$smoking = $_POST['smoking'];
$alcohol = $_POST['alcohol'];
$allergies = $_POST['allergies'];
$pregnancy = $_POST['pregnancy'];
$lactating = $_POST['lactating'];
$kidney = $_POST['kidney'];
$lrmp = $_POST['lrmp'];
$height = $_POST['height'];
$body_Weight = $_POST['body_Weight'];
$systolic_blood_pressure = $_POST['systolic_blood_pressure'];
$diastolic_blood_pressure = $_POST['diastolic_blood_pressure'];
$pulse_rate = $_POST['pulse_rate'];
$respiratory_rate = $_POST['respiratory_rate'];
$oxygen_saturation = $_POST['oxygen_saturation'];
$temperature = $_POST['temperature'];
$random_blood_suga = $_POST['random_blood_suga'];
$date = date("Y m jS");
$mid = $_POST['mid'];
$las_id = $_POST['las_id'];

$only_residence = explode(",", $residence)[0];
$residence_slq = "SELECT * FROM variables_residence WHERE name='$only_residence'";
$res_result = $db->query($residence_slq)->fetch();
if(!$res_result["name"]){
	$sql = "INSERT INTO variables_residence(name, sinhala) VALUES ('".$only_residence."','')";
	$db->exec($sql);
};

$only_occupation = explode(",", $occupation)[0];
$a_slq = "SELECT * FROM variables_occupation WHERE name='$only_occupation'";
$id_result = $db->query($a_slq)->fetch();
if(!$id_result["name"]){
	$sql = "INSERT INTO variables_occupation(name , sinhala) VALUES ('".$only_occupation."','')";
	$db->exec($sql);
};

if($arady_patient_id){
	$patients_id = $arady_patient_id;
}else {
	$sql = "INSERT INTO patients_details(name, birthday, gender, phone, residence, occupation) VALUES ('".$name."', '".$birthday."', '".$gender."','".$phone."', '".$residence."', '".$occupation."')";
	$db->exec($sql);
	$patients_id = $db->lastInsertId();
}

$sql_other_details = "INSERT INTO temp_patients_other_details( patients_id , smoking, alcohol, allergies, pregnancy, lactating, kidney, lrmp, height, body_Weight,systolic_blood_pressure,diastolic_blood_pressure, pulse_rate, respiratory_rate, oxygen_saturation, temperature, random_blood_suga,mid) VALUES ('".$patients_id."', '".$smoking."', '".$alcohol."','".$allergies."', '".$pregnancy."', '".$lactating."', '".$kidney."', '".$lrmp."', '".$height."', '".$body_Weight."', '".$systolic_blood_pressure."', '".$diastolic_blood_pressure."','".$pulse_rate."', '".$respiratory_rate."', '".$oxygen_saturation."', '".$temperature."', '".$random_blood_suga."', '".$mid."')";
$db->exec($sql_other_details);

$time = $_POST['time'];
$apnumber = $_POST['apnumber'];
$report_or_consultation = $_POST['report_or_consultation'];


$sql = "INSERT INTO today_patients(patients_id ,apnumber,time,report_or_consultation,center) VALUES ('".$patients_id."','".$apnumber."','".$time."','".$report_or_consultation."','".$Center."')";
$db->exec($sql);
$lastid = $db->lastInsertId();

$sql = "UPDATE today_patients SET order_set=".$lastid." WHERE id=".$lastid."";
$stmt = $db->prepare($sql);
$stmt->execute();


$result2 = $db->prepare("DELETE FROM temp_center_patients_details WHERE id= $las_id");
$result2->execute();

header('Location:../views/today-patients.php');
?>