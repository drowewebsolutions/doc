<?php
include'../config/config.php';
    $Center = $_POST["center"];
    $result = $db->prepare("SELECT * FROM today_patients where center='$Center' ORDER BY order_set asc");
    $result->execute();
    $r= 1;
    for($i=0; $row = $result->fetch(); $i++){
  ?>
  <tr class=" <?php 
    if($row["status"] == null){
      echo 'checkin';
    }elseif($row["status"] == '1'){
      echo 'complete';
    }elseif($row["status"] == '2'){
      echo 'doc';
    }else{
      echo 'nts';
    }
    ?>">
    <td class='coun' data-post-id="<?php echo $r; ?>"><span><?php echo $r; ?></span><span style="display: none;">,<?php  echo $row['id']; ?></span></td>
    <td>
      <?php
      $id = $row['patients_id'];
      $a_slq = "SELECT * FROM patients_details WHERE patients_id=$id";
      $id_result = $db->query($a_slq)->fetch();
      echo ($id_result["name"]);
      ?>                        
    </td>
    <td><?php echo ($id_result["gender"][0]); ?></td>
    <td> 
      <?php if($id_result["birthday"]){
            $birthDate = explode("-", $id_result["birthday"]);
            $age = date("Y") - $birthDate[0];
            echo $age;
        }else{
            echo "UNKNOWN";
        }; ?>
    <td><?php echo ($id_result["patients_id"]); ?></td>
    <td><span class="badge
      <?php if($row['report_or_consultation']=="Report"){echo 'btn-primary';}else{ echo 'btn-warning'; } ?> btn-sm"><?php echo $row['report_or_consultation']; ?></span>
    </td>
    <td><span><?php echo $row['time']; ?></span></td>
    <td><span><?php echo $row['apnumber']; ?></span></td> 
    <td class="status-msg">
      <span class="chekin">Checked in</span>
      <span class="nextse">Next to see</span>
      <span class="doc">Doctor</span>
      <span class="complt">Complete</span>
    </td> 
    <td>
        <a class="badge btn-success btn-sm" href="<?php echo $url; ?>views/prescription.php?id=<?php echo $row['patients_id']; ?>">Prescribe</a> |
        <a href="<?php echo $url; ?>views/existing_patient.php?id=<?php echo $row['patients_id']; ?>" class="badge btn-primary btn-sm">Nurse Updates</a> |
        <a href="<?php echo $url; ?>views/existing_patient_doctor.php?id=<?php echo $row['patients_id']; ?>" class="badge btn-warning">Doctor Updates</a> |
        <a href="<?php echo $url; ?>control-files/delete-patients.php?id=<?php echo $row['id']; ?>" class="badge bg-danger svg-btn"><svg enable-background="new 0 0 384 384" version="1.1" viewBox="0 0 384 384" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="m64 341.33c0 23.574 19.093 42.667 42.667 42.667h170.67c23.573 0 42.666-19.093 42.666-42.667v-256h-256v256z"/><polygon points="266.67 21.333 245.33 0 138.67 0 117.33 21.333 42.667 21.333 42.667 64 341.33 64 341.33 21.333"/></svg></a>
    </td>
  </tr>
  <?php
  $r++;
    }
  ?>