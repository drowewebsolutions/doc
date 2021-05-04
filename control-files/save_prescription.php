<?php
include'../config/config.php';
$user_id = $_GET['patients_id'];
date_default_timezone_set("Asia/Colombo");
$today = date('Y-m-d H:i');
$patients_id = $_GET['patients_id'];
$sql = "INSERT INTO patients_prescription_number (date,patients_id) VALUES ('".$today."','".$patients_id."')";
$db->exec($sql);
$patients_prescription_number = $db->lastInsertId();

$temp_diagnoses = $db->prepare("SELECT * FROM temp_diagnoses WHERE user_id=$user_id");
$temp_diagnoses->execute();

for($i=0; $row = $temp_diagnoses->fetch(); $i++){
    $id = $row['id'];
    $diagnoses = $row['diagnoses'];
    $sql_pressname = "INSERT INTO save_diagnoses( prescription_number, diagnoses ) VALUES ('".$patients_prescription_number."','".$diagnoses."')";
    $db->exec($sql_pressname);

    $result = $db->prepare("DELETE FROM temp_diagnoses WHERE id= $id");
    $result->execute();
}

$temp_next_visits = $db->prepare("SELECT * FROM temp_next_visits WHERE user_id=$user_id");
$temp_next_visits->execute();

for ($s = 0; $row = $temp_next_visits->fetch(); $s++) {
    $id = $row['id'];
    $days = $row['days'];
    $pay = $row['pay'];
    $sql_pressname = "INSERT INTO save_next_visits( prescription_number, day, pay ) VALUES ( '" . $patients_prescription_number . "','" . $days . "','" . $pay . "')";
    $db->exec($sql_pressname);

    $result = $db->prepare("DELETE FROM temp_next_visits WHERE id= $id");
    $result->execute();
}


$temp_prescription_drugs = $db->prepare("SELECT * FROM temp_prescription_drugs WHERE user_id=$user_id");
$temp_prescription_drugs->execute();
for($q=0; $row = $temp_prescription_drugs->fetch(); $q++){
    $id = $row['id'];
    $order_no = $row['order_no'];
    $form = $row['form'];
    $generic_name = $row['generic_name'];
    $trade_name = $row['trade_name'];
    $strength = $row['strength'];
    $unit = $row['unit'];
    $route = $row['route'];
    $frequency= $row['frequency'];
    $duration = $row['duration'];
    $indication = $row['indication'];
    $instructions = $row['instructions'];
    $category = $row['category'];
    $sql_pressname = "INSERT INTO save_prescription_drugs(prescription_number, order_no, form, generic_name, trade_name, strength, unit, route, frequency, duration, indication, instructions, category) VALUES ( '".$patients_prescription_number."','".$order_no."','".$form."','".$generic_name."','".$trade_name."','".$strength."','".$unit."','".$route."','".$frequency."','".$duration."','".$indication."','".$instructions."','".$category."')";
    $db->exec($sql_pressname);

    $result = $db->prepare("DELETE FROM temp_prescription_drugs WHERE id= $id");
    $result->execute();
}

$temp_test = $db->prepare("SELECT * FROM temp_test WHERE user_id=$user_id");
$temp_test->execute();
for($f=0; $row = $temp_test->fetch(); $f++){
    $id = $row['id'];
    $test = $row['test'];
    $investigations = $row['investigations'];
    $investigations_id = $row['investigations_id'];
    $sql_pressname = "INSERT INTO save_test( prescription_number, test, investigations, investigations_id ) VALUES ( '".$patients_prescription_number."','".$test."','".$investigations."','".$investigations_id."')";
    $db->exec($sql_pressname);

    $result = $db->prepare("DELETE FROM temp_test WHERE id= $id");
    $result->execute();
}

$temp_test = $db->prepare("SELECT * FROM temp_assign_a_doctor WHERE user_id=$user_id");
$temp_test->execute();
for($k=0; $row = $temp_test->fetch(); $k++){
    $id = $row['id'];
    $name = $row['name'];
    $note = $row['note'];
    $sql_pressname = "INSERT INTO save_assign_a_doctor( prescription_number, name, note ) VALUES ( '".$patients_prescription_number."','".$name."','".$note."')";
    $db->exec($sql_pressname);

    $result = $db->prepare("DELETE FROM temp_assign_a_doctor WHERE id= $id");
    $result->execute();
}

$temp_test = $db->prepare("SELECT * FROM temp_patients_other_details WHERE patients_id=$user_id");
$temp_test->execute();

$short_slq = "SELECT * FROM temp_patients_other_details where patients_id=$user_id";
$details = $db->query($short_slq)->fetch();

$id = $details['id'];
$smoking = $details['smoking'];
$alcohol = $details['alcohol'];
$allergies = $details['allergies'];
$pregnancy = $details['pregnancy'];
$lactating = $details['lactating'];
$kidney = $details['kidney'];
$lrmp = $details['lrmp'];
$height = $details['height'];
$body_Weight = $details['body_Weight'];
$systolic_blood_pressure = $details['systolic_blood_pressure'];
$diastolic_blood_pressure = $details['diastolic_blood_pressure'];
$pulse_rate = $details['pulse_rate'];
$respiratory_rate = $details['respiratory_rate'];
$oxygen_saturation = $details['oxygen_saturation'];
$temperature = $details['temperature'];
$random_blood_suga = $details['random_blood_suga'];
$mid = $details['mid'];

$sql_other_details = "INSERT INTO save_patients_other_details( prescription_number, smoking, alcohol, allergies, pregnancy, lactating, kidney, lrmp, height, body_Weight,systolic_blood_pressure,diastolic_blood_pressure, pulse_rate, respiratory_rate, oxygen_saturation, temperature, random_blood_suga,mid) VALUES ('".$patients_prescription_number."', '".$smoking."', '".$alcohol."','".$allergies."', '".$pregnancy."', '".$lactating."', '".$kidney."', '".$lrmp."', '".$height."', '".$body_Weight."', '".$systolic_blood_pressure."', '".$diastolic_blood_pressure."','".$pulse_rate."', '".$respiratory_rate."', '".$oxygen_saturation."', '".$temperature."', '".$random_blood_suga."', '".$mid."')";
$db->exec($sql_other_details);

$result = $db->prepare("DELETE FROM temp_patients_other_details WHERE patients_id=$user_id");
$result->execute();

$result4 = $db->prepare("DELETE FROM today_patients WHERE patients_id= $user_id");
$result4->execute();

header('Location:../views/today-patients.php');