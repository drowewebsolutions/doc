<?php include '../config/config.php'; ?>
<link rel="stylesheet" href="<?php echo $url; ?>dist/css/print.css">
<div class="container-fluid"> 
    <?php

    $prescription_number = $_GET['id'];
    $user_id = $_GET['userid'];

    $ndf_slq = "SELECT * FROM patients_details WHERE patients_id=$user_id";
    $ndf_result = $db->query($ndf_slq)->fetch();

    $patients_other_details_slq = "SELECT * FROM save_patients_other_details WHERE prescription_number=$prescription_number order by id desc";
    $patients_other_details_result = $db->query($patients_other_details_slq)->fetch();
    $id_result = $patients_other_details_result;
    ?>
    <div class="row">
        <div class="col-12" style="padding: 0;">
            <div class="invoice p-3">
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        <h6>PATIENT'S DETAILS</h6>
                        <table>
                            <tr>
                                <td><b>ID</b></td>
                                <td><?php echo $user_id; ?></td>
                            </tr>
                            <tr>
                                <td><b>Date</b></td>
                                <td><?php echo date("j/m/Y"); ?></td>
                            </tr>
                            <tr>
                                <td><b>Name</b></td>
                                <td><?php echo($ndf_result["name"]); ?></td>
                            </tr>
                            <tr>
                                <td><b>DOB</b></td>
                                <td><?php if($ndf_result["birthday"]){
                                    echo $ndf_result["birthday"];
                                }else{
                                    echo "UNKNOWN";
                                }; ?></td>
                            </tr>
                            <tr>
                                <td><b>Age</b></td>
                                <td><?php if($ndf_result["birthday"]){
                                    $birthDate = explode("-", $ndf_result["birthday"]);
                                    $age = date("Y") - $birthDate[0];
                                    echo $age;
                                }else{
                                    echo "UNKNOWN";
                                }; ?>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Residence</b></td>
                                <td><?php echo explode(",", $ndf_result["residence"])[0]; ?></td>
                            </tr>
                            <tr>
                                <td><b>Occupation</b></td>
                                <td><?php echo explode(",", $ndf_result["occupation"])[0]; ?></td>
                            </tr>
                            <tr>
                                <td><b>Drug Allergies</b></td>
                                <td><?php echo($id_result["allergies"]); ?></td>
                            </tr>
                            <tr>
                                <td><b>Gender </b></td>
                                <td><?php echo($ndf_result["gender"]); ?></td>
                            </tr>
                            <?php if ($ndf_result["gender"] == 'Female') { ?>
                                
                                <tr>
                                    <td><b>Pregnant </b></td>
                                    <td><?php echo($id_result["pregnancy"]); ?></td>
                                </tr>
                                <tr>
                                    <td><b>Lactating </b></td>
                                    <td><?php echo($id_result["lactating"]); ?></td>
                                </tr>
                            <?php }; ?>
                            <tr>
                                <td><b>Kidney Failure </b></td>
                                <td><?php echo($id_result["kidney"]); ?></td>
                            </tr>
                            <tr>
                                <td><b>Smoking </b></td>
                                <td><?php echo($id_result["smoking"]); ?></td>
                            </tr>
                            <tr>
                                <td><b>Alcohol </b></td>
                                <td><?php echo($id_result["alcohol"]); ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-sm-4 invoice-col">
                        <h6>VITAL SIGNS</h6>
                        <table>
                            <tr>
                                <td><b>Height</b></td>
                                <td><?php ifcheck($id_result["height"],'(m)'); ?> </td>
                            </tr>
                            <tr>
                                <td><b>Weight </b></td>
                                <td><?php ifcheck($id_result["body_Weight"],'(kg)'); 
                                if ($id_result["height"]) {
                                    $height = $id_result["height"];
                                }else{
                                    $height = '0';
                                }
                                if ($id_result["body_Weight"]) {
                                    $weight = $id_result["body_Weight"];
                                }else{
                                    $weight = '0';
                                }
                            ?> </td>
                            </tr>
                            <tr>
                                <?php if($height=='0' && $weight == '0'){ $bmi_val = '0'; }else{ @$bmi_val = $weight / ($height * $height); }; ?>
                                <td><b>BMI</b></td>
                                <td><span class="<?php
                                    if ($bmi_val > 25 || $bmi_val < 18.5) {
                                        echo 'red';
                                    }
                                    ?>"><?php 
                                    $bmival = round($bmi_val, 2); 
                                    if($bmival == '0'){
                                        $bmival = null;
                                    }
                                    ifcheck($bmival,'[18.5 - 24.9]');
                                ?></span> 
                                </td>
                            </tr>
                            <tr>
                                <td><b>Ideal body weight (BMI25)</b></td>
                                <td><?php echo 25 * ($height * $height); ?></td>
                            </tr>
                            <tr>
                              <td><b>Ideal waist [waist - height ratio]</b></td>
                              <td><?php echo round((($height * 100) / 5.08),'2'); ?> inch</td>
                            </tr>
                            <tr>
                                <td><b>Mid umbilical waist </b></td>
                                <td><?php 
                            if($ndf_result["gender"] == 'Female') { $verib = '[< 32inches]'; } else { $verib = '[< 35inches]'; }
                                ifcheck($id_result["mid"],$verib); ?> </td>
                            </tr>
                            <tr>
                                <td><b>Systolic BP </b></td>
                                <td><span class="<?php
                                    if ($id_result["systolic_blood_pressure"] < 90 || $id_result["systolic_blood_pressure"] > 120) {
                                        echo 'red';
                                    }
                                    ?>"><?php ifcheck($id_result["systolic_blood_pressure"],'[90-120mmHg]'); ?></span>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td><b>Diastolic BP</b></td>
                                <td><span class="<?php
                                    if ($id_result["diastolic_blood_pressure"] < 60 || $id_result["diastolic_blood_pressure"] > 80) {
                                        echo 'red';
                                    }
                                    ?>"><?php ifcheck($id_result["diastolic_blood_pressure"],'[60-80mmHg]'); ?></span>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td><b>Blood pressure </b></td>
                                <td><?php ifcheck($id_result["systolic_blood_pressure"],''); ?>
                                    /<?php ifcheck($id_result["diastolic_blood_pressure"],'[155/90mmHg.]'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Pulse Rate</b></td>
                                <td><span class="<?php
                                    if ($id_result["pulse_rate"] < 60 || $id_result["pulse_rate"] > 100) {
                                        echo 'red';
                                    }
                                    ?>"><?php ifcheck($id_result["pulse_rate"],'[60-100bpm]'); ?></span> 
                                </td>
                            </tr>
                            <tr>
                                <td><b>Respiratory rate</b></td>
                                <td><span class="<?php
                                    if ($id_result["respiratory_rate"] < 12 || $id_result["respiratory_rate"] > 20) {
                                        echo 'red';
                                    }
                                    ?>"><?php ifcheck($id_result["respiratory_rate"],'[12-20/min]'); ?></span> 
                                </td>
                            </tr>
                            <tr>
                                <td><b>Oxygen Saturation</b></td>
                                <td><span class="<?php
                                    if ($id_result["oxygen_saturation"] < 95 || $id_result["oxygen_saturation"] > 100) {
                                        echo 'red';
                                    }
                                    ?>"><?php ifcheck($id_result["oxygen_saturation"],'[95-100%]'); ?></span> 
                                </td>
                            </tr>
                            <tr>
                                <td><b>Temperature</b></td>
                                <td><span class="<?php
                                    if ($id_result["temperature"] < 97 || $id_result["temperature"] > 99) {
                                        echo 'red';
                                    }
                                    ?>"><?php ifcheck($id_result["temperature"],'[97-99 <sup>0</sup>F]'); ?></span> 
                                </td>
                            </tr>
                            <tr>
                                <td><b>Random blood glucose</b></td>
                                <td><span class="<?php
                                    if ($id_result["random_blood_suga"] < 80 || $id_result["random_blood_suga"] > 140) {
                                        echo 'red';
                                    }
                                    ?>"><?php ifcheck($id_result["random_blood_suga"],'[80-140mg/dl]'); ?></span> 
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-3 invoice-col">

                        <h6>Diagnoses</h6> 
                        
                        <table>
                            <?php
                            $result = $db->prepare("SELECT * FROM save_diagnoses WHERE prescription_number=$prescription_number ORDER BY id asc");
                            $result->execute();
                            $r = 1;
                            for ($h = 0; $row = $result->fetch(); $h++) { ?>
                                <tr>
                                    <td><?php echo $r++; ?></td>
                                    <td><?php echo $row['diagnoses']; ?></td>
                                </tr>
                            <?php }; ?>
                        </table>
                        <br>
                        <h6>DRUG ALLERGIES</h6>
                        <div id="htm"></div>
                        <div class="allergies">
                            <?php
                            $result = $db->prepare("SELECT * FROM save_drug_allergies WHERE prescription_number='$prescription_number'");
                            $result->execute();
                            $r = 1;
                            for ($h = 0; $row = $result->fetch(); $h++) { ?>
                                <p><?php echo $row['drug_allergies']; ?>,  </p>
                            <?php }; ?>
                        </div>
                    </div>
                </div>

                <?php
                $short_slq = "SELECT * FROM save_prescription_drugs where category='short_term' and prescription_number=$prescription_number";
                $short_result = $db->query($short_slq)->fetch();
                if (@count($short_result["id"]) >= 1) {
                    ?>
                    <h4 id="short_term" class="hed-bot">Short term</h4>
                    <?php
                    include 'view-parts/short-term.php';
                };
                $long_slq = "SELECT * FROM save_prescription_drugs where category='long_term' AND prescription_number=$prescription_number";
                $long_result = $db->query($long_slq)->fetch();
                if (@count($long_result["id"]) >= 1) {
                    ?>
                    <h4 class="hed-bot">Long term</h4>
                    <?php include 'view-parts/long-term.php';
                };
                $when_slq = "SELECT * FROM save_prescription_drugs where category='when_needed' AND prescription_number=$prescription_number";
                $when_result = $db->query($when_slq)->fetch();
                if (@count($when_result["id"]) >= 1) {
                    ?>
                    <h4 class="hed-bot">Drugs to be used only when needed</h4>
                    <?php include 'view-parts/when-needed.php';
                };
                echo "<div class='drg-heding'>";
                $after_slq = "SELECT * FROM save_prescription_drugs where category='after_the_other' AND prescription_number=$prescription_number";
                $after_result = $db->query($after_slq)->fetch();
                if (@count($after_result["id"]) >= 1) {
                    ?>
                    <h4 class="hed-bot drg_hed">Drugs to be taken in step order</h4>
                    <?php include 'view-parts/after-the-other.php';
                }; ?>
                <?php
                $sum = 0;
                for ($f = 1; $f <= 7; $f++) {
                    $step = $f . 'step';
                    $after_slq = "SELECT * FROM save_prescription_drugs where category=" . "'" . $step . "' AND prescription_number=" . "'" . $prescription_number . "'";
                    $after_result = $db->query($after_slq)->fetch();
                    if (@count($after_result["id"]) >= 1) {
                        ?>
                        <h4 class="hed-bot drg_hed">Drugs to be taken in step order</h4>
                            <h4 class="hed-bot sml">Step <?php echo $f; ?> </h4>
                        <?php include 'view-parts/steps_table.php';
                    };
                } ?>
            </div>
                <div class="clera"></div>
                <br><br>
                <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-sm-12 ">
                        <div class="investigations">
                            <?php
                            $result = $db->prepare("SELECT * FROM save_investigations_days where prescription_number=$prescription_number ORDER BY id asc");
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
                                                $cat_result = $db->prepare("SELECT * FROM save_investigations_group where day_id=$day_id ORDER BY id asc");
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
                                                                <?php $result_ins = $db->prepare("SELECT * FROM save_test where group_id=$group_id ORDER BY id asc");
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
                                </div>
                                
                            <?php }; ?>
                            
                        </div>
                        <br>
                    </div>
                    <div id="htm"></div>
                </div>
                <div class="row">
                    <div class="col-sm-8 invoice-col">
                        <h6 id="assignadoctor">REFERRALS</h6>
                        <table class="pres-table nv" width="100%">
                            <tr>
                                <th>Doctor</th>
                                <th>Indication</th>
                            </tr>
                            <?php
                            $result_assign_a_doctor = $db->prepare("SELECT * FROM save_assign_a_doctor where prescription_number=$prescription_number ORDER BY id asc");
                            $result_assign_a_doctor->execute(); ?>
                            <?php for ($f = 0; $rownas = $result_assign_a_doctor->fetch(); $f++) {
                                ?>
                                <tr>
                                    <td><?php echo $rownas['name']; ?></td>
                                    <td><?php echo $rownas['note']; ?></td>
                                </tr>
                            <?php }; ?>
                        </table>
                    </div>
                    <div class="col-4">
                        <div class="investigations ">
                            <h6>NEXT VISIT</h6>
                            <table class="pres-table nv" width="100%">
                                <?php
                                $result_next_visits = $db->prepare("SELECT * FROM save_next_visits where prescription_number=$prescription_number ORDER BY id asc");
                                $result_next_visits->execute();
                                for ($m = 0; $rownv = $result_next_visits->fetch(); $m++) {
                                ?>
                                <tr>
                                    <td><?php echo $rownv['day']; ?></td>
                                    <td><?php echo $rownv['pay']; ?></td>
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
            </div>
            <!-- /.row -->

        </div>
    </div>
</div>