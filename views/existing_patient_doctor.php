<?php include'../config/config.php'; ?>
<?php include'../inc/header.php';
$retunurl = 'existing_patient_doctor';
  $user_id = $_GET['id'];
  $id = $_GET['id'];
  $ndf_slq = "SELECT * FROM patients_details WHERE patients_id=$user_id";
  $ndf_result = $db->query($ndf_slq)->fetch();

  $pr_slq = "SELECT * FROM patients_prescription_number WHERE patients_id=$user_id order by id desc";
  $pr_result = $db->query($pr_slq)->fetch();
  $prescription_number = $pr_result['id'];

  $patients_other_details_slq = "SELECT * FROM temp_patients_other_details WHERE patients_id=$user_id ";
  $patients_other_details_result = $db->query($patients_other_details_slq)->fetch();

  if(!$patients_other_details_result["id"]){
      $patients_other_details_slq = "SELECT * FROM save_patients_other_details WHERE prescription_number='$prescription_number' order by id desc";
      $patients_details_result = $db->query($patients_other_details_slq)->fetch();
  }else{
      $patients_details_result = $patients_other_details_result;
  }

?>
<link rel="stylesheet" href="<?php echo $url; ?>dist/css/prescription.css">
  <div class="nes-stat">
    <div class="container">
      <form method="post" id="configform" action="<?php echo $url; ?>control-files/save-existing_patient.php">
        <input type="hidden" name="patients_id" value="<?php echo $user_id; ?>">
        <div class="row">
          <div class="col-sm-4">
            <div class="ns-tble">
              <table>
                <tr>
                  <td>Center</td>
                  <td><?php echo $Center; ?></td>
                </tr>
                <tr>
                  <td>Name</td>
                  <td><input type="text" class="form-control" name="name" value="<?php echo $ndf_result['name']; ?>"  disabled></td>
                </tr>
                <tr>
                  <td>Gender</td>
                  <td class="malgrd">
                    <select name="gender" class="form-control" disabled>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Date of Birth</td>
                  <td> <input type="text" autocomplete="off" class="form-control datepicker" value="<?php echo $ndf_result['birthday']; ?>" name="birthday" disabled></td>
                </tr>
                <tr>
                  <td>Residence</td>
                  <td>
                    <select class="form-control select2" style="width: 100%;" name="residence" disabled>
                    <option selected=""><?php echo explode(",", $ndf_result['residence'])[0]; ?></option>
                  </select>
                  </td>
                </tr>
                <tr>
                  <td>Payment</td>
                  <td>
                    <select name="report_or_consultation" class="form-control" required>
                      
                        <option>Consultation</option>
                        <option>Report</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Phone</td>
                  <td><input type="text" class="form-control" name="phone" value="<?php echo $ndf_result['phone']; ?>" disabled></td>
                </tr>
                <tr>
                  <td>Session</td>
                  <td>
                    <select name="time" class="form-control" required>
                        <?php
                        $start=strtotime('00:00');
                        $end=strtotime('24:00');
                        for ($i=$start;$i<=$end;$i = $i + 15*60)
                        {
                            echo "<option>".date('g:i A',$i)."</option>";
                        } ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Appointment number</td>
                  <td>
                    <select name="apnumber" class="form-control" required>
                      <?php for ($i=0; $i<=100;  $i++) { ?>
                      <?php if( $i == '0'){ }else{  ?> 
                        <option value="<?php if(1 <= $i && $i <= 9){ echo'0';} echo $i;?>"><?php if(1 <= $i && $i <= 9){ echo'0';} echo $i;?></option>
                      <?php }; } ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Occupation</td>
                  <td>
                    <select class="form-control select2" style="width: 100%;" name="occupation" disabled>
                    <option selected=""><?php echo explode(",", $ndf_result['occupation'])[0]; ?></option>
                   
                  </select>
                  </td>
                </tr>
                <tr>
                  <td>Smoking</td>
                  <td>
                    <select name="smoking" class="custom-select">
                    <option selected=""><?php echo $patients_details_result['smoking']; ?></option>
                    <option>No</option>
                    <option>Yes</option>
                  </select>
                  </td>
                </tr>
                <tr>
                  <td>Alcohol</td>
                  <td>
                    <select name="alcohol" class="custom-select">
                    <option selected=""><?php echo $patients_details_result['alcohol']; ?></option>
                    <option>No</option>
                    <option>Yes</option>
                  </select>
                  </td>
                </tr>
                <tr>
                  <td>Kidney failure</td>
                  <td>
                    <select name="kidney" class="custom-select" value="<?php echo $patients_details_result['kidney']; ?>">
                    <option selected=""><?php echo $patients_details_result['kidney']; ?></option>
                    <option>No</option>
                    <option>Yes</option>
                    <option>unknown</option>
                  </select>
                  </td>
                </tr>
                <tr>
                  <td>Drug Allergies</td>
                  <td>
                    <select name="allergies" class="custom-select" value="<?php echo $patients_details_result['allergies']; ?>">
                    <option selected=""><?php echo $patients_details_result['allergies']; ?></option>
                    <option>Not Present</option>
                    <option>Present</option>
                  </select>
                  </td>
                </tr>
                <tr class="femal">
                  <td>Pregnancy status</td>
                  <td>
                    <select name="pregnancy" class="custom-select" value="<?php echo $patients_details_result['pregnancy']; ?>">
                    <option selected=""><?php echo $patients_details_result['pregnancy']; ?></option>
                    <option>Yes</option>
                    <option>No</option>
                  </select>
                  </td>
                </tr>
                <tr class="femal">
                  <td>Lactation</td>
                  <td>
                    <select name="lactating" class="custom-select" value="<?php echo $patients_details_result['lactating']; ?>">
                    <option selected=""><?php echo $patients_details_result['lactating']; ?></option>
                    <option>No</option>
                    <option>Yes</option>
                  </select>
                  </td>
                </tr>
                <tr class="femal">
                  <td>Last menstrual period</td>
                  <td>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>
                      <input type="text" class="form-control datepicker" name="lrmp" value="<?php echo $patients_details_result['lrmp']; ?>">
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="ns-tble">
              <table>
                <tr>
                  <th>Parameter</th>
                  <th>Result</th>
                  <th>Unit</th>
                  <th>Reference</th>
                </tr>
                <tr>
                  <td>Systolic blood pressure </td>
                  <td><input type="text" class="form-control bldpash" name="systolic_blood_pressure" value="<?php echo $patients_details_result['systolic_blood_pressure']; ?>"></td>
                  <td>mmHg</td>
                  <td>[90-120]</td>
                </tr>
                <tr>
                  <td>Diastolic blood pressure</td>
                  <td><input type="text" class="form-control bldpash" name="diastolic_blood_pressure" value="<?php echo $patients_details_result['diastolic_blood_pressure']; ?>"></td>
                  <td>mmHg</td>
                  <td>[60-80]</td>
                </tr>
                <tr>
                  <td>Blood pressure</td>
                  <td><input type="text" class="form-control" value="<?php echo $patients_details_result['blood_pressure']; ?>" name="blood_pressure" disabled ></td>
                  <td>mmHg</td>
                  <td>[120/80]</td>
                </tr>
                <tr>
                  <td>Random blood glucose</td>
                  <td><input type="text" class="form-control" name="random_blood_suga" value="<?php echo $patients_details_result['random_blood_suga']; ?>"></td>
                  <td>mg/dl</td>
                  <td>[80-140]</td>
                </tr>
                <tr>
                  <td>Body Weight</td>
                  <td><input type="text" class="form-control inchange" name="body_Weight" value="<?php echo $patients_details_result['body_Weight']; ?>"></td>
                  <td>kg</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Height</td>
                  <td><input type="text" class="form-control inchange" name="height" value="<?php echo $patients_details_result['height']; ?>"></td>
                  <td>m</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Body mass index[BMI] </td>
                  <td> <input type="text" class="form-control"  name="bmi" disabled></td>
                  <td>kg/m<sup>2</sup></td>
                  <td>[18.5-24.9]</td>
                </tr>
                <tr>
                  <td>Ideal body weight [For BMI-25]</td>
                  <td><input type="text" class="form-control"  name="ideal_body_weight" disabled></td>
                  <td>Kg</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Mid umbilical waist</td>
                  <td><input type="text" class="form-control" name="mid" value="<?php echo $patients_details_result['mid']; ?>"></td>
                  <td>inch</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Ideal waist [waist - height ratio]</td>
                  <td></td>
                  <td>inch</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Pulse rate</td>
                  <td><input type="text" class="form-control" name="pulse_rate" value="<?php echo $patients_details_result['pulse_rate']; ?>"></td>
                  <td>beats/min</td>
                  <td>[60-100]</td>
                </tr>
                <tr>
                  <td>Respiratory rate</td>
                  <td><input type="text" class="form-control" name="respiratory_rate" value="<?php echo $patients_details_result['respiratory_rate']; ?>"></td>
                  <td>cycles per/min</td>
                  <td>[12-16]</td>
                </tr>
                <tr>
                  <td>Oxygen saturation</td>
                  <td> <input type="text" class="form-control" name="oxygen_saturation" value="<?php echo $patients_details_result['oxygen_saturation']; ?>"></td>
                  <td>%</td>
                  <td>[95-100]</td>
                </tr>
                <tr>
                  <td>Temperature</td>
                  <td><input type="text" class="form-control" name="temperature" value="<?php echo $patients_details_result['temperature']; ?>"></td>
                  <td><sup>0</sup>F</td>
                  <td>[97-99]</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="col-sm-3 invoice-col">
              <button type="button" class="btn btn-block btn-primary col-11" data-toggle="modal"
                      data-target="#diagnoses">Add diagnoses
              </button>
              <br>
              <h6>DIAGNOSES</h6>
              <div id="htm"></div>
              <table>
                  <?php
                  $result = $db->prepare("SELECT * FROM temp_diagnoses WHERE user_id=$user_id ORDER BY id asc");
                  $result->execute();
                  $r = 1;
                  for ($h = 0; $row = $result->fetch(); $h++) { ?>
                      <tr>
                          <td><?php echo $r++; ?></td>
                          <td><?php echo $row['diagnoses']; ?></td>
                          <td>
                              <span date-id="<?php echo $row['id']; ?>" data-table="temp_diagnoses" class="badge bg-danger del-row">Remove</span>
                          </td>
                      </tr>
                  <?php }; ?>
              </table>
              <br>
              <div id="allergies">
              <button type="button" class="btn btn-block btn-primary col-11" data-toggle="modal" data-target="#drug_allergies">Add Allergies</button>
              <br>
              <h6>DRUG ALLERGIES</h6>
              <div id="htm"></div>
              <div>
                  <?php
                  $result = $db->prepare("SELECT * FROM drug_allergies WHERE patients_id=$user_id ORDER BY id asc");
                  $result->execute();
                  $r = 1;
                  for ($h = 0; $row = $result->fetch(); $h++) { ?>
                      <p><?php echo $row['allergies']; ?> <span date-id="<?php echo $row['id']; ?>" data-table="temp_diagnoses" class="badge bg-danger del-row">Remove</span>,  </p>
                  <?php }; ?>
              </div>
              </div>
          </div>
        </div>
        <div id="htm"></div>
        <br>
        <div>
          <div class="row">
              <div class="col-sm-2">
                  <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#short_termpop">Create Drug</button>
              </div>
              <div class="col-sm-2">
                  <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#modal-bulk">Add Drugs</button>
              </div>
              <div class="col-sm-2">
                  <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#modal-bulk2">Add Bundle</button>
              </div>
          </div>
          <?php
          $short_slq = "SELECT * FROM temp_prescription_drugs where category='short_term' and user_id=$user_id";
          $short_result = $db->query($short_slq)->fetch();
          if (@count($short_result["id"]) >= 1) {
              ?>
              <h4 id="short_term" class="hed-bot">Short term</h4>
              <?php
              include 'parts/short-term.php';
          };
          $long_slq = "SELECT * FROM temp_prescription_drugs where category='long_term' AND user_id=$user_id";
          $long_result = $db->query($long_slq)->fetch();
          if (@count($long_result["id"]) >= 1) {
              ?>
              <h4 class="hed-bot">Long term</h4>
              <?php include 'parts/long-term.php';
          };
          $when_slq = "SELECT * FROM temp_prescription_drugs where category='when_needed' AND user_id=$user_id";
          $when_result = $db->query($when_slq)->fetch();
          if (@count($when_result["id"]) >= 1) {
              ?>
              <h4 class="hed-bot">Drugs to be used only when needed</h4>
              <?php include 'parts/when-needed.php';
          };
          $after_slq = "SELECT * FROM temp_prescription_drugs where category='after_the_other' AND user_id=$user_id";
          $after_result = $db->query($after_slq)->fetch();
          if (@count($after_result["id"]) >= 1) {
              ?>
              <h4 class="hed-bot">Drugs to be taken in step order</h4>
              <?php include 'parts/after-the-other.php';
          }; ?>
          <?php
          $sum = 0;
          for ($f = 1; $f <= 7; $f++) {
          $step = $f.'step';
              $after_slq = "SELECT * FROM temp_prescription_drugs where category="."'".$step."' AND user_id="."'".$user_id."'";
              $after_result = $db->query($after_slq)->fetch();
              if (@count($after_result["id"]) >= 1) {
                  ?>
                  <h4 class="hed-bot sml">Step <?php echo $f; ?> </h4>
                  <?php include 'parts/steps_table.php';
              };
          }?>

          <!-- /.row -->
          <br><br>
          <div class="row">
              <!-- accepted payments column -->
              <div class="col-sm-8 invoice-col">
                  <button type="button" class="btn btn-block btn-primary col-4" data-toggle="modal" data-target="#investigations">Add Investigations</button>
                  <div class="investigations">
                      <?php
                      $result = $db->prepare("SELECT * FROM temp_test where user_id=$user_id ORDER BY id asc");
                      $result->execute();
                      $r = 1;
                      for ($i = 0; $row = $result->fetch(); $i++) {

                          echo '<h6>INVESTIGATIONS TO BE DONE [ ' . $row['investigations'] . ' ]</h6>';
                          $test = unserialize($row['test']);


                          for ($e = 0; $e < @count($test); $e++) {
                              if (@count($test[$e]) == '2') {
                                  echo '<div>';
                                  for ($f = 0; $f < count($test[$e]); $f++) {

                                      if ($f == 0) {
                                          echo '<span>' . explode(",", $test[$e][$f])[0] . ' : </span>';
                                      } else {
                                          echo explode(",", $test[$e][$f])[0] . ', ';
                                      }

                                  };
                                  echo '</div>';
                              }
                          }; ?>
                          <span date-id="<?php echo $row['id']; ?>" data-table="temp_test" class="badge bg-danger del-row">Remove</span>
                      <?php }; ?>

                  </div>
                  <br>
                  <button type="button" class="btn btn-block btn-primary col-4" data-toggle="modal" data-target="#assign_a_doctor">Assign a doctor</button>
                  <br>
                  <h6 id="assignadoctor">REFERRALS</h6>
                  <table class="pres-table nv" width="100%">
                      <tr>
                          <th>Doctor</th>
                          <th>Indication</th>
                      </tr>
                      <?php
                      $result_assign_a_doctor = $db->prepare("SELECT * FROM temp_assign_a_doctor where user_id=$user_id ORDER BY id asc");
                      $result_assign_a_doctor->execute();
                      for ($f = 0; $rownas = $result_assign_a_doctor->fetch(); $f++) {
                          ?>
                          <tr>
                              <td><?php echo $rownas['name']; ?></td>
                              <td><?php echo $rownas['note']; ?></td>
                              <td width="15%"><span date-id="<?php echo $rownas['id']; ?>" data-table="temp_assign_a_doctor" class="badge bg-danger del-row">Remove</span></td>
                          </tr>
                      <?php }; ?>
                  </table>
              </div>
              <!-- /.col -->
              <div class="col-4">
                  <button type="button" class="btn btn-block btn-primary col-9" data-toggle="modal" data-target="#special">Add Next Visits</button>
                  <div class="investigations ">
                      <h6>NEXT VISIT</h6>
                      <table class="pres-table nv" width="100%">
                          <?php
                          $result_next_visits = $db->prepare("SELECT * FROM temp_next_visits where user_id=$user_id ORDER BY id asc");
                          $result_next_visits->execute();
                          for ($m = 0; $rownv = $result_next_visits->fetch(); $m++) {
                          ?>
                          <tr>
                              <td><?php echo $rownv['days']; ?></td>
                              <td><?php echo $rownv['pay']; ?></td>
                              <td><span date-id="<?php echo $rownv['id']; ?>" data-table="temp_next_visits" class="badge bg-danger del-row">Remove</span></td>
                          </tr>
                          <?php }; ?>
                      </table>
                  </div>
              </div>
          </div>
          <br>
          <div class="row doc">
              <div class="col-4">
                  <div>
                      <p>Dr. Damintha Dissanayake</p>
                      <p>MD [Colombo], FRCP [UK]</p>
                  </div>
              </div>
              <div class="col-4">
                  <div>
                      <p>Specialist Consultant Physician</p>
                      <p>SLMC 21848</p>
                  </div>
              </div>
              <div class="col-4">
                  <div>
                      <p>Phone : 0773908394 [Consultant]</p>
                      <p>Phone : 0772915415 [Nurse]</p>
                      <p>daminthadissanayake@yahoo.com</p>
                  </div>
              </div>
          </div>
          <div class="row no-print">
              <div class="col-12">
                  <a href="<?php echo $url; ?>views/prescription-print.php?id=<?php echo $id; ?>" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print English</a>
                  <a href="<?php echo $url; ?>views/prescription-print-sinhala.php?id=<?php echo $id; ?>" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print Sinhala</a>
                  <a href="<?php echo $url; ?>control-files/save_prescription.php?patients_id=<?php echo $user_id; ?>" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Save</a>
                  <a href="<?php echo $url; ?>views/prescription-print-sinhala.php?patients_id=<?php echo $id; ?>" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Send Via Whatsapp</a>
                  <a href="<?php echo $url; ?>control-files/clear-prescription.php?id=<?php echo $id; ?>" class="btn bg-danger"> Clear Prescription</a>
                  <a target="_blank" href="https://api.whatsapp.com/send?file=C:\Users\Sheran\Downloads\AdminLTE 3 _ Dashboard 2.pdf&phone=+94773908394">Send Message</a>
                  <a href="<?php echo $url; ?>control-files/reset_results.php?id=<?php echo $pat_chck_result['id']; ?>" class="btn btn-warning btn-with">DELETE RESULTS ONLY</a>
              <a href="<?php echo $url; ?>control-files/delete_results.php?id=<?php echo $pat_chck_result['id']; ?>" class="btn btn-danger btn-with">DELETE ALL RESULTS AND PATIENT</a>
              </div>
          </div>
        </div>
          <div class="col-md-12">
            <div class="form-group mar">
              <input type="submit" class="btn btn-success btn-with" value="Update">
          
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

<?php 
include 'prescription/popup/diagnoses.php';
include 'prescription/popup/drug_allergies.php';
include 'prescription/popup/investigations.php';
include 'prescription/popup/assign_a_doctor.php';
include 'prescription/popup/next-visit.php';
include 'prescription/popup/create_drug.php';
include 'prescription/popup/add_bulk_drugs.php';
include 'prescription/popup/add_drug_with_ilnes.php';
include'../inc/footer.php'; ?>

  <script>
  (function($) { 
    var Weight = $("input[name='body_Weight']").val();
    var Height  = $("input[name='height']").val();
    var imb = Weight / (Height * Height);
    var ideal_body_weight = 25 * (Height * Height);

    $("input[name='bmi']").val(imb.toFixed(2));
    $("input[name='ideal_body_weight']").val(ideal_body_weight.toFixed(2));

    $(".inchange").on('change', function(){  

      var Weight = $("input[name='body_Weight']").val();
      var Height  = $("input[name='height']").val();
      var imb = Weight / (Height * Height);
      var ideal_body_weight = 25 * (Height * Height);

      $("input[name='bmi']").val(imb.toFixed(2));
      $("input[name='ideal_body_weight']").val(ideal_body_weight.toFixed(2));

    });

    var sbp = $("input[name='systolic_blood_pressure']").val();
    var dbp  = $("input[name='diastolic_blood_pressure']").val();
    var sbpdbp = sbp + '/' + dbp;

    $("input[name='blood_pressure']").val(sbpdbp);

    $(".bldpash").on('change', function(){  
        var sbp = $("input[name='systolic_blood_pressure']").val();
        var dbp  = $("input[name='diastolic_blood_pressure']").val();
        var sbpdbp = sbp + '/' + dbp;
        $("input[name='blood_pressure']").val(sbpdbp);
    });


  <?php if ($ndf_result['gender'] == 'Female'){ ?>
    $('.femal').show();
  <?php }else{ ?>
    $('.femal').hide();
  <?php }; ?>


     $('.datepicker').datepicker();
     $('.select2').select2({
      tags: true,
     });

})(jQuery);
</script>
<style type="text/css">
  .malgrd > div{
  display: inline-block;
  margin-right: 45px
}

</style>
</body>
</html>
