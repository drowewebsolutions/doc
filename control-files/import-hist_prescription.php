<?php
include'../config/config.php';
$userid = $_GET['userid'];
$id = $_GET['id'];


$temp_prescription_other_details = $db->prepare("SELECT * FROM save_patients_other_details WHERE prescription_number=$id");
$temp_prescription_other_details->execute();
for($q=0; $row = $temp_prescription_other_details->fetch(); $q++){

    $allergies = $row['allergies'];
    $sql_pressname = "INSERT INTO histy_patients_other_details( patients_id, allergies ) VALUES ('".$userid."','".$allergies."')";
    $db->exec($sql_pressname);

}

$temp_diagnoses = $db->prepare("SELECT * FROM save_diagnoses WHERE prescription_number=$id");
$temp_diagnoses->execute();
for($i=0; $row = $temp_diagnoses->fetch(); $i++){

    $diagnoses = $row['diagnoses'];
    $sql_pressname = "INSERT INTO histy_diagnoses( user_id, diagnoses ) VALUES ('".$userid."','".$diagnoses."')";
    $db->exec($sql_pressname);
}

$temp_prescription_drugs = $db->prepare("SELECT * FROM save_prescription_drugs WHERE prescription_number=$id");
$temp_prescription_drugs->execute();
for($q=0; $row = $temp_prescription_drugs->fetch(); $q++){

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
    $sql_pressname = "INSERT INTO histy_prescription_drugs( order_no, user_id, form, generic_name, trade_name, strength, unit, route, frequency, duration, indication, instructions, category) VALUES ( '".$order_no."', '".$userid."', '".$form."','".$generic_name."','".$trade_name."','".$strength."','".$unit."','".$route."','".$frequency."','".$duration."','".$indication."','".$instructions."','".$category."')";
    $db->exec($sql_pressname);
}


$save_drug_allergies = $db->prepare("SELECT * FROM save_drug_allergies WHERE prescription_number=$id");
$save_drug_allergies->execute();
for($i=0; $row = $save_drug_allergies->fetch(); $i++){

    $drug_allergies = $row['drug_allergies'];
    $sql_pressname = "INSERT INTO histy_drug_allergies( user_id, drug_allergies ) VALUES ('".$userid."','".$drug_allergies."')";
    $db->exec($sql_pressname);
}


$save_assign_a_doctor = $db->prepare("SELECT * FROM save_assign_a_doctor WHERE prescription_number=$id");
$save_assign_a_doctor->execute();
for($i=0; $row = $save_assign_a_doctor->fetch(); $i++){

    $name = $row['name'];
    $note = $row['note'];
    $sql_pressname = "INSERT INTO histy_assign_a_doctor( user_id, name,note ) VALUES ('".$userid."','".$name."','".$note."')";
    $db->exec($sql_pressname);
}

$save_next_visits = $db->prepare("SELECT * FROM save_next_visits WHERE prescription_number=$id");
$save_next_visits->execute();
for($i=0; $row = $save_next_visits->fetch(); $i++){

    $day = $row['day'];
    $pay = $row['pay'];
    $sql_pressname = "INSERT INTO histy_next_visits( user_id, days, pay ) VALUES ('".$userid."','".$day."','".$pay."')";
    $db->exec($sql_pressname);
}
header('Location:../views/history-view.php?id='.$userid);