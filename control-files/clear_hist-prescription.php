<?php
include'../config/config.php';
$patients_id=$_GET['id'];
$result = $db->prepare("DELETE FROM histy_assign_a_doctor");
$result->execute();

$result2 = $db->prepare("DELETE FROM histy_diagnoses");
$result2->execute();

$result3 = $db->prepare("DELETE FROM histy_next_visits");
$result3->execute();

$result5 = $db->prepare("DELETE FROM histy_patients_other_details");
$result5->execute();

$result6 = $db->prepare("DELETE FROM histy_prescription_drugs");
$result6->execute();

$result7 = $db->prepare("DELETE FROM histy_test");
$result7->execute();


header('Location:../views/history-view.php?id='.$patients_id);
?>
