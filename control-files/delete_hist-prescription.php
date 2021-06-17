<?php
include'../config/config.php';
$id=$_GET['id'];
$userid=$_GET['userid'];
$resulte = $db->prepare("DELETE FROM save_assign_a_doctor WHERE prescription_number= $id");
$resulte->execute();

$result2 = $db->prepare("DELETE FROM save_diagnoses WHERE prescription_number= $id");
$result2->execute();

$result3 = $db->prepare("DELETE FROM save_drug_allergies WHERE prescription_number= $id");
$result3->execute();

$result7 = $db->prepare("DELETE FROM save_next_visits WHERE prescription_number= $id");
$result7->execute();

$result8 = $db->prepare("DELETE FROM save_patients_other_details WHERE prescription_number= $id");
$result8->execute();

$result9 = $db->prepare("DELETE FROM save_prescription_drugs WHERE prescription_number= $id");
$result9->execute();

$resulta = $db->prepare("DELETE FROM save_prescription_drugs WHERE prescription_number= $id");
$resulta->execute();


$result = $db->prepare("DELETE FROM save_investigations_days WHERE prescription_number=$id");
$result->execute();


$after_slq = $db->prepare("SELECT * FROM save_investigations_group where prescription_number=$id");
$after_slq->execute();
for ($s = 0; $after_result = $after_slq->fetch(); $s++) {

	$rd = $after_result['id'];

    $result_group = $db->prepare("SELECT * FROM save_test where group_id=$rd");
    $result_group->execute();
    for ($s = 0; $rowgroup_id = $result_group->fetch(); $s++) {
		$group_id = $rowgroup_id['id'];

        $result = $db->prepare("DELETE FROM save_test WHERE id= $group_id");
		$result->execute();

    };

}; 

$result_next_visits = $db->prepare("SELECT * FROM save_investigations_group where day_id=$id");
$result_next_visits->execute();
for ($m = 0; $rownv = $result_next_visits->fetch(); $m++) {
	$del_dat = $rownv['id'];
    $result = $db->prepare("DELETE FROM save_investigations_group WHERE id= $del_dat");
	$result->execute();

};  


$resulta = $db->prepare("DELETE FROM patients_prescription_number WHERE id= $id");
$resulta->execute();

header('Location:../views/history-view.php?id='.$userid);
?>
