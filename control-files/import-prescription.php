<?php
include'../config/config.php';
$userid = $_GET['userid'];
$id = $_GET['id'];

$sql_ppimport = "INSERT INTO pp_import( pr_id, status, user_id ) VALUES ('".$id."','1','".$userid."')";
$db->exec($sql_ppimport);

$temp_diagnoses = $db->prepare("SELECT * FROM save_diagnoses WHERE prescription_number=$id");
$temp_diagnoses->execute();
for($i=0; $row = $temp_diagnoses->fetch(); $i++){

    $diagnoses = $row['diagnoses'];
    $sql_pressname = "INSERT INTO temp_diagnoses( user_id, diagnoses ) VALUES ('".$userid."','".$diagnoses."')";
    $db->exec($sql_pressname);
}

$save_drug_allergies = $db->prepare("SELECT * FROM save_drug_allergies WHERE prescription_number=$id");
$save_drug_allergies->execute();
for($i=0; $row = $save_drug_allergies->fetch(); $i++){

    $drug_allergies = $row['drug_allergies'];
    $sql_pressname = "INSERT INTO temp_drug_allergies( user_id, drug_allergies ) VALUES ('".$userid."','".$drug_allergies."')";
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
    $sql_pressname = "INSERT INTO temp_prescription_drugs( order_no, user_id, form, generic_name, trade_name, strength, unit, route, frequency, duration, indication, instructions, category) VALUES ( '".$order_no."', '".$userid."', '".$form."','".$generic_name."','".$trade_name."','".$strength."','".$unit."','".$route."','".$frequency."','".$duration."','".$indication."','".$instructions."','".$category."')";
    $db->exec($sql_pressname);
}

header('Location:../views/prescription.php?id='.$userid);