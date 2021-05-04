<?php 
include'../config/config.php';
$doctor = $_POST['doctor'];
$note = $_POST['note'];
$id = $_POST['id'];
$retunurl = $_POST['retunurl'];

if($doctor) {
    $a_slq = "SELECT * FROM variables_doctor WHERE name='$doctor'";
    $id_result = $db->query($a_slq)->fetch();

    if (!$id_result["name"]) {
        $sql = "INSERT INTO variables_doctor(name) VALUES ('" . $doctor . "')";
        $db->exec($sql);
    };
}

if($note){
    $note_slq = "SELECT * FROM variables_doctor_indication WHERE name='$note'";
    $note_result = $db->query($note_slq)->fetch();

    if(!$note_result["name"]){
        $sql = "INSERT INTO variables_doctor_indication(name) VALUES ('".$note."')";
        $db->exec($sql);
    };
}

// query
$sql = "INSERT INTO temp_assign_a_doctor (user_id,name,note) VALUES ('".$id."','".$doctor."','".$note."')";
$db->exec($sql);

header('Location:../views/'.$retunurl.'.php?id='.$id.'&#assignadoctor');

?>

