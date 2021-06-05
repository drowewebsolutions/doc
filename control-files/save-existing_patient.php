<?php 

include'../config/config.php';
$patients_id = $_POST['patients_id'];

$report_or_consultation = $_POST['report_or_consultation'];
$time = $_POST['time'];
$apnumber = $_POST['apnumber'];

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
$mid = $_POST['mid'];
//var_dump($residence);
$patients_other_details_slq = "SELECT * FROM temp_patients_other_details WHERE patients_id=$patients_id ";
$patients_other_details_result = $db->query($patients_other_details_slq)->fetch();

if($patients_other_details_result["id"]){
	$result2 = $db->prepare("DELETE FROM temp_patients_other_details WHERE patients_id= $patients_id");
	$result2->execute();
}

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

$sql = "UPDATE today_patients SET apnumber=? , time=? , report_or_consultation=? WHERE patients_id=?";
$db->prepare($sql)->execute([$apnumber, $time, $report_or_consultation, $patients_id]);

//query
$sql = "INSERT INTO temp_patients_other_details( patients_id, smoking, alcohol, allergies, pregnancy, lactating, kidney, lrmp, height, body_Weight,systolic_blood_pressure,diastolic_blood_pressure, pulse_rate, respiratory_rate, oxygen_saturation, temperature, random_blood_suga,mid) VALUES ('".$patients_id."','".$smoking."', '".$alcohol."','".$allergies."', '".$pregnancy."', '".$lactating."', '".$kidney."', '".$lrmp."', '".$height."', '".$body_Weight."', '".$systolic_blood_pressure."', '".$diastolic_blood_pressure."','".$pulse_rate."', '".$respiratory_rate."', '".$oxygen_saturation."', '".$temperature."', '".$random_blood_suga."', '".$mid."')";
$db->exec($sql);

header('Location:../views/today-patients.php');
?>

