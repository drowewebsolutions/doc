<?php
	include'../config/config.php';
	$patients_id=$_GET['id'];
	$result = $db->prepare("DELETE FROM patients_details WHERE patients_id= $patients_id");
	$result->execute();

	$result2 = $db->prepare("DELETE FROM temp_patients_other_details WHERE patients_id= $patients_id");
	$result2->execute();

	$patients_prescription_number = $db->prepare("SELECT * FROM patients_prescription_number WHERE patients_id=$patients_id");
	$patients_prescription_number->execute();

	for($i=0; $row = $patients_prescription_number->fetch(); $i++){

		$id = $row['id'];

		$save_assign_a_doctor = $db->prepare("DELETE FROM save_assign_a_doctor WHERE prescription_number= $id");
		$save_assign_a_doctor->execute();
		$save_diagnoses = $db->prepare("DELETE FROM save_diagnoses WHERE prescription_number= $id");
		$save_diagnoses->execute();
		$save_patients_other_details = $db->prepare("DELETE FROM save_patients_other_details WHERE prescription_number= $id");
		$save_patients_other_details->execute();
		$temp_next_visits = $db->prepare("DELETE FROM save_next_visits WHERE prescription_number= $id");
		$temp_next_visits->execute();
		$temp_prescription_drugs = $db->prepare("DELETE FROM save_prescription_drugs WHERE prescription_number= $id");
		$temp_prescription_drugs->execute();
		$temp_test = $db->prepare("DELETE FROM save_test WHERE prescription_number= $id");
		$temp_test->execute();

	}
	$result3 = $db->prepare("DELETE FROM patients_prescription_number WHERE patients_id= $patients_id");
	$result3->execute();

	$result4 = $db->prepare("DELETE FROM today_patients WHERE patients_id= $patients_id");
	$result4->execute();

header('Location:../views/all-patients.php');
?>
