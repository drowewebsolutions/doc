<?php
/* Database config */
$url			= 'http://localhost/doc/';
$db_host		= 'localhost';
$db_user		= 'root';
$db_pass		= '';
$db_database	= 'doc'; 

/* End config */

$db = new PDO('mysql:host='.$db_host.';dbname='.$db_database, $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_GET['center'])) {
    $Center = $_GET['center'];
    if(!isset($_COOKIE['center'])) {
    	setcookie('center', $Center, time() + (86400 * 30), "/");
    }else {
    	$Center = $_COOKIE['center'];
    }
} else {
    $Center = $_COOKIE['center'];
};

function option_dropdown($db,$table){
  $result = $db->prepare("SELECT * FROM ".$table." ORDER BY name");
  $result->execute();
  for($i=0; $row = $result->fetch(); $i++){
  	$id = $row['id'];
  	$name = $row['name'];
    echo '<option value="'.$name.','.$id.'">'.$name.'</option>';
  };

};

function checkactive($db,$center,$nd,$order){
    $center_slq = "SELECT id FROM temp_center_patients_details WHERE `order`="."'".$order."'"." AND `center`="."'".$center."'"." AND `nd`="."'".$nd."'";
    $center_result = $db->query($center_slq)->fetch();
    return $center_result['id'];
};

$onecheck = checkactive($db,$Center,'n','1');
$towcheck = checkactive($db,$Center,'n','2');
$threcheck = checkactive($db,$Center,'n','3');

$onecheck_d = checkactive($db,$Center,'d','1');
$towcheck_d = checkactive($db,$Center,'d','2');
$threcheck_d = checkactive($db,$Center,'d','3');

function ifcheck($id,$para){
    if($id){
        echo $id,' ', $para;
    }else{
        echo "<span style='color:#000'>n/c</span>";
    }
};

function chckdb($db,$name,$tabel){
    $id = substr(strrchr($name, ","), 1);
    $value = explode(",", $name)[0];

    $a_slq = "SELECT * FROM $tabel WHERE name='$value'";
    $id_result = $db->query($a_slq)->fetch();

    if(!$id_result["name"] && !$value==''){
        $sql = "INSERT INTO $tabel(name) VALUES ('".$value."')";
        $db->exec($sql); 
    };
};
?>

