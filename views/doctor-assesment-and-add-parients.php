<?php include'../config/config.php';?>
<?php 
  session_start();
  if(isset($_GET['data'])) {
      $_SESSION["nd"] = $_GET['nd'];
      $_SESSION["data"] = $_GET['data'];
  };
  $nd = $_SESSION["nd"];
  $ord_id = $_SESSION["data"];

  $pat_chck_slq = "SELECT * FROM temp_center_patients_details WHERE `order`="."'".$ord_id."'"." and `center`="."'".$Center."'"." and `nd`="."'".$nd."'"."";
  $pat_chck_result = $db->query($pat_chck_slq)->fetch();
  if($pat_chck_result['id']){
    $pat_array = @unserialize(base64_decode($pat_chck_result['data_arrey']));
    $las_id = $pat_chck_result['id'];
    $patients_id = $pat_chck_result['patients_id'];
  }else{
    $sql = "INSERT INTO temp_center_patients_details(`order`,`center`,`nd`,`active`) VALUES ('".$ord_id."','".$Center."','".$nd."','1')";
    $db->exec($sql);
    $pat_array = null;
    $patients_id = null;
    $las_id = $db->lastInsertId();
  }
    
  $user_id = '01'.$las_id;
  $id = '01'.$las_id;
  // /var_dump($id);
  $retunurl = 'doctor-assesment-and-add-parients';
  include'../inc/header.php'; 
?>
<link rel="stylesheet" href="<?php echo $url; ?>dist/css/prescription.css">
 
  <div class="nes-stat">
    <div class="container">
      <form method="post" id="configform" action="<?php echo $url; ?>control-files/save-doc-assesment.php">
        <input type="hidden" value="<?php echo $las_id; ?>" name="las_id">
        <input type="hidden" value="<?php echo $nd; ?>" name="nd">
        <div class="row">
          <div class="col-sm-4">
            <div class="ns-tble">
              <table>
                <tr>
                  <th>Parameters</th>
                  <th>Result</th>
                </tr>
                <tr>
                  <td>Patient ID</td>
                  <td><input type="text" class="form-control" value="<?php echo $patients_id; ?>" name="patient_id" disabled></td>
                </tr>
                <tr>
                  <td>Date and Dime</td>
                  <td><?php echo date('y-m-d') ?></td>
                </tr>
                <tr>
                  <td>Center</td>
                  <td><?php echo $Center; ?></td>
                </tr>
                <tr>
                  <td>Name</td>
                  <td><input type="text" class="form-control autup" value="<?php echo $pat_array['name']; ?>" name="name" ></td>
                </tr>
                <tr>
                  <td>Gender</td>
                  <td class="malgrd">
                    <select name="gender" class="form-control autup">
                      <?php if($pat_array['name']){ echo '<option>'.$pat_array['gender'].'</option>';} ?>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Date of Birth</td>
                  <td> <input type="text" class="datevalidate form-control" placeholder="YYYY-MM-DD" autocomplete="off" value="<?php echo $pat_array['birthday']; ?>" class="form-control datepicker" name="birthday" ></td>
                </tr>
                <tr>
                  <td>Residence</td>
                  <td>
                    <select class="form-control select2 autup" style="width: 100%;" name="residence">
                      <?php if($pat_array['residence']){ echo '<option>'.$pat_array['residence'].'</option>';} ?>
                      <option value="---">---</option>
                      <?php
                        $others_units = $db->prepare("SELECT * FROM variables_residence");
                        $others_units->execute();
                        for($i=0; $row_resal = $others_units->fetch(); $i++){
                      ?>
                      <option value="<?php echo $row_resal['name']; ?>,<?php echo $row_resal['id']; ?>"><?php echo $row_resal['name']; ?></option>
                      <?php
                        }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Payment</td>
                  <td>
                    <select name="report_or_consultation" class="form-control autup" required>
                      <?php if($pat_array['report_or_consultation']){ echo '<option>'.$pat_array['report_or_consultation'].'</option>';} ?>
                        <option>Consultation</option>
                        <option>Report</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Phone</td>
                  <td><input type="text" class="form-control autup" value="<?php echo $pat_array['phone']; ?>" name="phone" ></td>
                </tr>
                <tr>
                  <td>Session</td>
                  <td>
                    <select name="time" class="form-control autup" required>
                      <?php if($pat_array['time']){ echo '<option>'.$pat_array['time'].'</option>';} ?>
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
                    <select name="apnumber" class="form-control autup" required>
                      <?php if($pat_array['apnumber']){ echo '<option>'.$pat_array['apnumber'].'</option>';} ?>
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
                    <select class="form-control select2 autup" style="width: 100%;" name="occupation">
                      <?php if($pat_array['occupation']){ echo '<option>'.$pat_array['occupation'].'</option>';} ?>
                      <option value="---">---</option>
                      <?php
                        $others_units = $db->prepare("SELECT * FROM variables_occupation ");
                        $others_units->execute();
                        for($i=0; $row_resal = $others_units->fetch(); $i++){
                      ?>
                            <option value="<?php echo $row_resal['name']; ?>,<?php echo $row_resal['id']; ?>"><?php echo $row_resal['name']; ?></option>
                      <?php
                        }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Smoking</td>
                  <td>
                    <select name="smoking" class="custom-select autup">
                      <?php if($pat_array['smoking']){ echo '<option>'.$pat_array['smoking'].'</option>';} ?>
                      <option>No</option>
                      <option>Yes</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Alcohol</td>
                  <td>
                    <select name="alcohol" class="custom-select autup">
                      <?php if($pat_array['alcohol']){ echo '<option>'.$pat_array['alcohol'].'</option>';} ?>
                      <option>No</option>
                      <option>Yes</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Kidney failure</td>
                  <td>
                    <select name="kidney" class="custom-select autup">
                      <?php if($pat_array['kidney']){ echo '<option>'.$pat_array['kidney'].'</option>';} ?>
                      <option>No</option>
                      <option>Yes</option>
                      <option>unknown</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Drug Allergies</td>
                  <td>
                    <select name="allergies" class="custom-select autup">
                      <?php if($pat_array['allergies']){ echo '<option>'.$pat_array['allergies'].'</option>';} ?>
                      <option>Not Present</option>
                      <option>Present</option>
                    </select>
                  </td>
                </tr>
                <tr class="femal">
                  <td>Pregnancy status</td>
                  <td>
                    <select name="pregnancy" class="custom-select autup">
                      <?php if($pat_array['pregnancy']){ echo '<option>'.$pat_array['pregnancy'].'</option>';} ?>
                      <option>No</option>
                      <option>Yes</option>
                    </select>
                  </td>
                </tr>
                <tr class="femal">
                  <td>Lactation</td>
                  <td>
                    <select name="lactating" class="custom-select autup">
                      <?php if($pat_array['lactating']){ echo '<option>'.$pat_array['lactating'].'</option>';} ?>
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
                      <input type="text" class="form-control datepicker autup" name="lrmp" >
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
                  <td><input type="text" class="form-control bldpash autup" value="<?php echo $pat_array['systolic_blood_pressure']; ?>" name="systolic_blood_pressure" ></td>
                  <td>mmHg</td>
                  <td>[90-120]</td>
                </tr>
                <tr>
                  <td>Diastolic blood pressure</td>
                  <td><input type="text" class="form-control bldpash autup" value="<?php echo $pat_array['diastolic_blood_pressure']; ?>" name="diastolic_blood_pressure" ></td>
                  <td>mmHg</td>
                  <td>[60-80]</td>
                </tr>
                <tr>
                  <td>Blood pressure</td>
                  <td><input type="text" class="form-control autup" value="<?php echo $pat_array['blood_pressure']; ?>" name="blood_pressure" disabled ></td>
                  <td>mmHg</td>
                  <td>[120/80]</td>
                </tr>
                <tr>
                  <td>Random blood glucose</td>
                  <td><input type="text" class="form-control autup" value="<?php echo $pat_array['random_blood_suga']; ?>" name="random_blood_suga" ></td>
                  <td>mg/dl</td>
                  <td>[80-140]</td>
                </tr>
                <tr>
                  <td>Body Weight</td>
                  <td><input type="text" class="form-control inchange autup" value="<?php echo $pat_array['body_Weight']; ?>" name="body_Weight" ></td>
                  <td>kg</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Height</td>
                  <td><input type="text" class="form-control inchange autup" value="<?php echo $pat_array['height']; ?>" name="height" ></td>
                  <td>m</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Body mass index[BMI] </td>
                  <td> <input type="text" class="form-control autup" value="<?php echo $pat_array['bmi']; ?>" name="bmi" disabled></td>
                  <td>kg/m<sup>2</sup></td>
                  <td>[18.5-24.9]</td>
                </tr>
                <tr>
                  <td>Ideal body weight [For BMI-25]</td>
                  <td><input type="text" class="form-control autup"  name="ideal_body_weight" disabled></td>
                  <td>Kg</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Mid umbilical waist</td>
                  <td><input type="text" class="form-control autup" value="<?php echo $pat_array['mid']; ?>" name="mid" ></td>
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
                  <td><input type="text" class="form-control autup" value="<?php echo $pat_array['pulse_rate']; ?>" name="pulse_rate" ></td>
                  <td>beats/min</td>
                  <td>[60-100]</td>
                </tr>
                <tr>
                  <td>Respiratory rate</td>
                  <td><input type="text" class="form-control autup" value="<?php echo $pat_array['respiratory_rate']; ?>" name="respiratory_rate" ></td>
                  <td>cycles per/min</td>
                  <td>[12-16]</td>
                </tr>
                <tr>
                  <td>Oxygen saturation</td>
                  <td><input type="text" class="form-control autup" value="<?php echo $pat_array['oxygen_saturation']; ?>" name="oxygen_saturation" ></td>
                  <td>%</td>
                  <td>[95-100]</td>
                </tr>
                <tr>
                  <td>Temperature</td>
                  <td><input type="text" class="form-control autup" value="<?php echo $pat_array['temperature']; ?>" name="temperature" ></td>
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
          <div class="prescription-heding">
            
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
          </div>
          <!-- /.row -->
          <br><br>
          <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-sm-12 ">
                        <button type="button" class="btn btn-block btn-primary col-4" data-toggle="modal" data-target="#investigations">Add Investigations</button>
                        <div class="investigations">
                            <?php
                            $result = $db->prepare("SELECT * FROM temp_investigations_days where user_id=$user_id ORDER BY id asc");
                            $result->execute();
                            $r = 1;
                            for ($i = 0; $row = $result->fetch(); $i++) { 
                                $day_id = $row['id'];
                                ?>
                                <div class="inves-tabe">
                                    <table>
                                        <tr>
                                            <td><h6>INVESTIGATIONS TO BE DONE <?php echo $row['days']; ?></h6></td>
                                        </tr>
                                        <tr>
                                            <td width="100%">
                                                <?php
                                                $cat_result = $db->prepare("SELECT * FROM temp_investigations_group where day_id=$day_id ORDER BY id asc");
                                                $cat_result->execute(); 
                                                for ($s = 0; $cat_row = $cat_result->fetch(); $s++) { 
                                                $group_id = $cat_row['id'];
                                                ?>
                                                <table>
                                                    <?php if($s==0){ ?>
                                                    <tr>
                                                        <th width="20%">Investigations category</th>
                                                        <th width="30%">
                                                            <table>
                                                                <tr>
                                                                    <th>Test</th>
                                                                    <th>Indications</th>
                                                                </tr>
                                                            </table>
                                                        </th>
                                                        <th width="40%">Instruction to patient</th>
                                                    </tr>
                                                    <?php }; ?>
                                                    <tr>
                                                        <td width="20%"><?php echo $cat_row['test_catagory']; ?></td>
                                                        <td width="40%">
                                                            <table>
                                                                <?php $result_ins = $db->prepare("SELECT * FROM temp_test where group_id=$group_id ORDER BY id asc");
                                                                    $result_ins->execute();
                                                                    for ($s = 0; $ros = $result_ins->fetch(); $s++) { ?>
                                                                    <tr>
                                                                        <td><?php echo $ros['test']; ?></td>
                                                                        <td><?php echo $ros['indications']; ?></td>
                                                                    </tr>
                                                                <?php }; ?>
                                                            </table>
                                                        </td>
                                                        <td width="40%">
                                                            <?php 
                                                            $special_instruction = $cat_row['test_id']; 
                                                            $isntrc_slq = "SELECT * FROM variables_test where id="."'".$special_instruction."'";
                                                            $insc_result = $db->query($isntrc_slq)->fetch();
                                                            echo $insc_result["special_instruction"];
                                                            ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <?php }; ?>
                                            </td>
                                        </tr>
                                   </table>
                                   <span date-id="<?php echo $row['id']; ?>" data-table="temp_investigations_days" class="badge bg-danger del-inst">Delete</span>
                                </div>
                                
                            <?php }; ?>
                            
                        </div>
                        <br>
                    </div>
                    <div id="htm"></div>
                </div>
                <div class="row">
                    <div class="col-sm-8 invoice-col">
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
                            $result_assign_a_doctor->execute(); ?>
                            <?php for ($f = 0; $rownas = $result_assign_a_doctor->fetch(); $f++) {
                                ?>
                                <tr>
                                    <td><?php echo $rownas['name']; ?></td>
                                    <td><?php echo $rownas['note']; ?></td>
                                    <td width="15%"><span date-id="<?php echo $rownas['id']; ?>" data-table="temp_assign_a_doctor" class="badge bg-danger del-row">Remove</span></td>
                                </tr>
                            <?php }; ?>
                        </table>
                    </div>
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
                    <!-- /.col -->
                    
                </div>
                <br>
                <div class="row ">
                    <div class="col-md-12">
                        <div class=" doc-dit">
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
      </form>
    </div>
  </div>
  <div class="alert alert-success topsmall" role="alert">
    Saved!
  </div>
  <div id="htm"></div>
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

    $(".bldpash").on('change', function(){  

        var sbp = $("input[name='systolic_blood_pressure']").val();
        var dbp  = $("input[name='diastolic_blood_pressure']").val();
        var sbpdbp = sbp + '/' + dbp;

        $("input[name='blood_pressure']").val(sbpdbp);

    });
    $('.femal').show();
    var gender = $('select[name=gender]').val();
    if (gender == 'Male') {
        $('.femal').hide();
    }
    else if (gender == 'Female') {
        $('.femal').show();
    };

    $('select[name=gender]').change(function() {
        if (this.value == 'Male') {
            $('.femal').hide();
        }
        else if (this.value == 'Female') {
            $('.femal').show();
        }
    });

    $('select[name=allergies]').change(function() {
        if (this.value == 'Present') {
            $('#allergies').show();
        }
        else{
            $('#allergies').hide();
        }
    });

    $('.select2').select2({
      tags: true,
    });

        $(".li-modal").click(function () {
        var url = $(this).attr('href');
        $( "#content-madel" ).load( url );
    });

    $('input[type=radio][name=db_catogary]').change(function () {
        if (this.value == 'after_the_other') {
            $('.drugs_to_be').show();
            $('input[type=radio][name=drugs_to_be]').prop('checked', false);
        } else {
            $('.drugs_to_be').hide();
            $('input[type=radio][name=drugs_to_be]').prop('checked', false);
        }
    });

    // Deletes row
    $(".del-row").click(function () {
        var id = $(this).attr('date-id');
        var table = $(this).attr('data-table');
        var diag = $(this).parent().parent();

        $.ajax({
            type: 'POST',
            url: '<?php echo $url; ?>control-files/remove-prescription-data.php',
            data: "id=" + id + "&table=" + table,
            success: function (data) {
                $('#htm').html(data);
                    diag.fadeOut().remove();
            }
        });
    });


    $(".sortable").sortable({

        update: function (event, ui) {

            var data = Array();
            $(".sortable tr").each(function (i, v) {
                data[i] = Array();
                $(this).children('td:first-child').each(function (ii, vv) {
                    data[i][ii] = $(this).text();
                });
            })
            console.log(data);
            $.ajax({
                url: "<?php echo $url; ?>control-files/order-update.php",
                method: "POST",
                data: {post_order_ids: data},
                success: function (data) {
                    //$('#htm').html(data);
                }
            });
        }

    });

    $(".autup").on('change', function(){  

        var from_arry = {};
        from_arry["id"] = <?php echo $pat_chck_result['id']; ?>;
        from_arry["name"] = $('input[name="name"]').val();
        from_arry["gender"] = $('select[name="gender"]').val();
        from_arry["birthday"] = $('input[name="birthday"]').val();
        from_arry["residence"] = $('select[name="residence"]').val();
        from_arry["report_or_consultation"] = $('select[name="report_or_consultation"]').val();
        from_arry["phone"] = $('input[name="phone"]').val();
        from_arry["time"] = $('select[name="time"]').val();
        from_arry["apnumber"] = $('select[name="apnumber"]').val();
        from_arry["occupation"] = $('select[name="occupation"]').val();
        from_arry["smoking"] = $('select[name="smoking"]').val();
        from_arry["alcohol"] = $('select[name="alcohol"]').val();
        from_arry["kidney"] = $('select[name="kidney"]').val();
        from_arry["allergies"] = $('select[name="allergies"]').val();
        from_arry["pregnancy"] = $('select[name="pregnancy"]').val();
        from_arry["lactating"] = $('select[name="lactating"]').val();
        from_arry["lrmp"] = $('input[name="lrmp"]').val();
        from_arry["systolic_blood_pressure"] = $('input[name="systolic_blood_pressure"]').val();
        from_arry["diastolic_blood_pressure"] = $('input[name="diastolic_blood_pressure"]').val();
        from_arry["blood_pressure"] = $('input[name="blood_pressure"]').val();
        from_arry["random_blood_suga"] = $('input[name="random_blood_suga"]').val();
        from_arry["body_Weight"] = $('input[name="body_Weight"]').val();
        from_arry["height"] = $('input[name="height"]').val();
        from_arry["bmi"] = $('input[name="bmi"]').val();
        from_arry["mid"] = $('input[name="mid"]').val();
        from_arry["pulse_rate"] = $('input[name="pulse_rate"]').val();
        from_arry["respiratory_rate"] = $('input[name="respiratory_rate"]').val();
        from_arry["oxygen_saturation"] = $('input[name="oxygen_saturation"]').val();
        from_arry["temperature"] = $('input[name="temperature"]').val();
        from_arry["nd"] = $('input[name="nd"]').val();
        
        var json_arr = JSON.stringify(from_arry);

        $.ajax({
            type: 'POST',
            url: '<?php echo $url; ?>control-files/autosave_temp_patients.php',
            data: "from_arry=" + json_arr,
            success: function (data) {
              $('#htm').html(data);
              $('.topsmall').show("slow").delay(500).hide("slow");
            }
        });

    });
})(jQuery);
</script>
</body>
</html>
