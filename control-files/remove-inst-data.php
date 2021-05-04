<?php
	include'../config/config.php';
	$id=$_POST['id'];
	$table=$_POST['table'];

	$result = $db->prepare("DELETE FROM temp_investigations_days WHERE id=$id");
	$result->execute();


    $after_slq = $db->prepare("SELECT * FROM temp_investigations_group where day_id=$id");
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

    $result_next_visits = $db->prepare("SELECT * FROM temp_investigations_group where day_id=$id");
    $result_next_visits->execute();
    for ($m = 0; $rownv = $result_next_visits->fetch(); $m++) {
		$del_dat = $rownv['id'];
        $result = $db->prepare("DELETE FROM temp_investigations_group WHERE id= $del_dat");
		$result->execute();

    };  

                

?>
