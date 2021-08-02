<?php
include'../config/config.php';
$patients_id=$_GET['id'];
$result = $db->prepare("DELETE FROM temp_assign_a_doctor WHERE user_id=$patients_id");
$result->execute();

$result2 = $db->prepare("DELETE FROM temp_diagnoses WHERE user_id=$patients_id");
$result2->execute();

$result3 = $db->prepare("DELETE FROM temp_next_visits WHERE user_id=$patients_id");
$result3->execute();

$result5 = $db->prepare("DELETE FROM temp_patients_other_details WHERE patients_id=$patients_id");
$result5->execute();

$result6 = $db->prepare("DELETE FROM temp_prescription_drugs WHERE user_id=$patients_id");
$result6->execute();

$result7 = $db->prepare("DELETE FROM temp_investigations_days WHERE user_id=$patients_id");
$result7->execute();


$after_slq = $db->prepare("SELECT * FROM temp_investigations_group where user_id=$patients_id");
$after_slq->execute();
for ($s = 0; $after_result = $after_slq->fetch(); $s++) {

	$rd = $after_result['id'];

    $result_group = $db->prepare("SELECT * FROM temp_test where group_id=$rd");
    $result_group->execute();
    for ($s = 0; $rowgroup_id = $result_group->fetch(); $s++) {
		$group_id = $rowgroup_id['id'];

        $result = $db->prepare("DELETE FROM temp_test WHERE id= $group_id");
		$result->execute();

    };

}; 

$result_next_visits = $db->prepare("SELECT * FROM temp_investigations_group where user_id=$patients_id");
$result_next_visits->execute();
for ($m = 0; $rownv = $result_next_visits->fetch(); $m++) {
	$del_dat = $rownv['id'];
    $result = $db->prepare("DELETE FROM temp_investigations_group WHERE id= $del_dat");
	$result->execute();

};  


$result9 = $db->prepare("DELETE FROM temp_drug_allergies WHERE user_id=$patients_id");
$result9->execute();

$result8 = $db->prepare("DELETE FROM pp_import WHERE user_id=$patients_id");
$result8->execute();

header('Location:../views/prescription.php?id='.$patients_id);
?>
