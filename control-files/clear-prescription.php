<?php
include'../config/config.php';
$patients_id=$_GET['id'];
$result = $db->prepare("DELETE FROM temp_assign_a_doctor");
$result->execute();

$result2 = $db->prepare("DELETE FROM temp_diagnoses");
$result2->execute();

$result3 = $db->prepare("DELETE FROM temp_next_visits");
$result3->execute();

$result5 = $db->prepare("DELETE FROM temp_patients_other_details");
$result5->execute();

$result6 = $db->prepare("DELETE FROM temp_prescription_drugs");
$result6->execute();

$result7 = $db->prepare("DELETE FROM temp_test");
$result7->execute();


header('Location:../views/prescription.php?id='.$patients_id);
?>
