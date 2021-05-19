<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo $url; ?>dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo $url; ?>dist/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="<?php echo $url; ?>dist/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo $url; ?>dist/css/style.css">
</head>

<body>
<div class="">
  <div class="header-top">
  <?php 
    $center_slq = "SELECT id FROM medical_center WHERE name="."'".$Center."'";
    $center_result = $db->query($center_slq)->fetch();
    if(isset($_GET['data'])) {
      $ord_id = $_GET['data'];
      $nd = $_GET['nd'];
    }else{
      $ord_id = null;
      $nd = null;
    }
  ?>
    <a id="new_patient_btn" href="<?php echo $url; ?>control-files/add_center.php" class="<?php if($center_result["id"]){ echo 'disabled'; } ?>">Create New Patient List</a>
    <a href="<?php echo $url; ?>views/consult-new-patient-add-parients.php">Consult New Patient</a>
    <a href="<?php echo $url; ?>views/all-patients.php?cpp=cpp">Consult Previous Patient</a>
    <a href="<?php echo $url; ?>views/drag-component-bank.php">Drag Component Bank</a>
    <a href="<?php echo $url; ?>views/bulk/individual-drug-medicen.php">Individual Drug Bank</a>
    <a href="<?php echo $url; ?>views/bulk/bulk-medicen.php">Drug Bundle Bank</a>
    <a href="<?php echo $url; ?>views/drug-variables/variables.php?tb=variables_diagnoses">Diagnoses Bank</a>
    <a href="<?php echo $url; ?>views/drug-variables/test-variables.php">Investigation bank</a>
    <a href="<?php echo $url; ?>views/drug-variables/variables.php?tb=variables_doctor">Referrals bank</a>
    <a href="<?php echo $url; ?>views/all-patients.php">Patient Bank</a>
  </div>
  <div class="clear"></div> 
  <div class="chanlcenter-row">
    <?php    
      $result = $db->prepare("SELECT * FROM medical_center ORDER BY id DESC");
      $result->execute();
      for($i=0; $row = $result->fetch(); $i++){
    ?>
    <div class="chanlcenter">
      <div class="ners">
        <div class="ns20">
          <a href="<?php echo $url; ?>views/today-patients.php"><?php echo $row['name']; ?> <span><?php echo $row['time']; ?></span></a>
        </div>
        <div class="bok-wid">
          <div>
            <label class="doclab">Nurse</label>
          </div>
          <div>
            <div class="nss20">
              <a class="<?php if($threcheck){ echo 'disabled'; } ?>" href="<?php echo $url; ?>views/nurses-assesment.php?nd=n&data=<?php 
            if($onecheck == null){ echo '1'; }elseif($towcheck == null){ echo '2'; }elseif($threcheck == null){ echo '3'; } ?>">Add new Patient</a>
            </div>
            <div class="nss20">
              <a class="<?php if($threcheck){ echo 'disabled'; } ?>" href="<?php echo $url; ?>views/all-patients.php?nd=n&data=<?php 
            if($onecheck == null){ echo '1'; }elseif($towcheck == null){ echo '2'; }elseif($threcheck == null){ echo '3'; } ?>">Add Previous Patient</a>
            </div>
            <div class="ns13">
              <a class="<?php if($onecheck || $ord_id == '1' && $nd == 'n' ){ echo 'actdeis'; } ?> <?php if($ord_id == '1'){ echo 'curnt'; } ?>" href="<?php echo $url; ?>views/nurses-assesment.php?nd=n&data=1">Patient 1</a>
            </div>
            <div class="ns13">
              <a class="<?php if($towcheck || $ord_id == '2' && $nd == 'n' ){ echo 'actdeis'; } ?> <?php if($ord_id == '2'){ echo 'curnt'; } ?>" href="<?php echo $url; ?>views/nurses-assesment.php?nd=n&data=2">Patient 2</a>
            </div>
            <div class="ns13">
              <a class="<?php if($threcheck || $ord_id == '3' && $nd == 'n' ){ echo 'actdeis'; } ?> <?php if($ord_id == '3'){ echo 'curnt'; } ?>" href="<?php echo $url; ?>views/nurses-assesment.php?nd=n&data=3">Patient 3</a>
            </div>
          </div>
        </div>

      </div>
      <div class="dork">
        <div class="bok-wid">
          <div>
            <label class="doclab">Doctor</label>
          </div>
          <div>
            <div class="nss20"><a class="<?php if($threcheck_d){ echo 'disabled'; } ?>" href="<?php echo $url; ?>views/doctor-assesment-and-add-parients.php?nd=d&data=<?php 
            if($onecheck_d == null){ echo '1'; }elseif($towcheck_d == null){ echo '2'; }elseif($threcheck_d == null){ echo '3'; } ?>">Add new Patient</a></div>
            <div class="nss20"><a class="<?php if($threcheck_d){ echo 'disabled'; } ?>" href="<?php echo $url; ?>views/all-patients.php?nd=d&data=<?php 
            if($onecheck_d == null){ echo '1'; }elseif($towcheck_d == null){ echo '2'; }elseif($threcheck_d == null){ echo '3'; } ?>">Add Previous Patient</a></div>
            <div class="ns13">
              <a class="<?php if($onecheck_d || $ord_id == '1' && $nd == 'd' ){ echo 'actdeis'; } ?> <?php if($ord_id == '1'){ echo 'curnt'; } ?>" href="<?php echo $url; ?>views/doctor-assesment-and-add-parients.php?nd=d&data=1">Patient 1</a>
            </div>
            <div class="ns13">
              <a class="<?php if($towcheck_d || $ord_id == '2' && $nd == 'd' ){ echo 'actdeis'; } ?> <?php if($ord_id == '2'){ echo 'curnt'; } ?>" href="<?php echo $url; ?>views/doctor-assesment-and-add-parients.php?nd=d&data=2">Patient 2</a>
            </div>
            <div class="ns13">
              <a class="<?php if($threcheck_d || $ord_id == '3' && $nd == 'd' ){ echo 'actdeis'; } ?> <?php if($ord_id == '3'){ echo 'curnt'; } ?>" href="<?php echo $url; ?>views/doctor-assesment-and-add-parients.php?nd=d&data=3">Patient 3</a>
            </div>
          </div>
        </div>

        <div class="ns20">
          <a href="<?php echo $url; ?>control-files/save-and-cls.php" id="savesur">Save and end current Patient List</a>
        </div>
      </div>
      <div class="sd-delet" date-id="<?php echo $row['id']; ?>">Delete Patient List</div>
       <div class="clear"></div> 
    </div>
    <?php
      }
    ?>
  </div>

</div>

