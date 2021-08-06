<?php include '../config/config.php'; ?>
<?php include '../inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo $url; ?>dist/css/prescription.css">

<div class="nes-stat">
   <div class="container">
        <div class="row">
            <div class="col-12">
                <?php
                $id = $_GET['id'];
                $user_id = $_GET['id'];
                $retunurl = 'prescription';

                $sql = "UPDATE today_patients SET status='2' WHERE patients_id='$user_id'";
                $stmt = $db->prepare($sql);
                $stmt->execute();

                $result = $db->prepare("SELECT id,date FROM patients_prescription_number WHERE patients_id=$id ORDER BY id DESC ");
                $result->execute();
                for ($e = 0; $row = $result->fetch(); $e++) {
                    ?>
                <?php if($e == 0){ ?>
                <h5>Past Prescriptions</h5>
                <div class="patients-row">
                <?php }; 
                $prid = $row['id'];
                $pp_slq = "SELECT * FROM pp_import WHERE pr_id=$prid";
                $pp_result = $db->query($pp_slq)->fetch();
                ?>
                    <div class="imprrow">
                        <span><?php echo $row['date']; ?></span>
                        <a class="btn btn-block btn-warning btn-xs li-modal" data-toggle="modal" href="<?php echo $url; ?>views/prescription-view.php?id=<?php echo $row['id']; ?>&userid=<?php echo $user_id; ?>" data-target="#pastmodal">View</a>
                        <a class="btn btn-block btn-success btn-xs <?php if($pp_result["status"]=='1'){ echo 'pp-dis'; }?>" href="<?php echo $url; ?>control-files/import-prescription.php?id=<?php echo $prid; ?>&userid=<?php echo $user_id; ?>">Import</a>
                    </div>
                <?php if($e == count($row)){ ?>
                 </div>
                <?php }; ?>
                <?php
                }
                ?>
                <?php
                $ndf_slq = "SELECT * FROM patients_details WHERE patients_id=$user_id";
                $ndf_result = $db->query($ndf_slq)->fetch();

                $patients_other_details_slq = "SELECT * FROM temp_patients_other_details WHERE patients_id=$user_id order by id desc";
                $patients_other_details_result = $db->query($patients_other_details_slq)->fetch();
                $id_result = $patients_other_details_result;
                ?>
            </div>
        </div>
        <div class="modal fade" id="pastmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div id="content-madel">
                    </div>
                </div>
            </div>
        </div>
       
        <div class="col-12">
            <div class="invoice p-3 mb-3">
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
                    <div class="col-sm-4 invoice-col vital-right">
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
                      
                        <button type="button" class="btn btn-block btn-primary col-11" data-toggle="modal" data-target="#drug_allergies">Add Allergies</button>
                        <br>
                        <h6>DRUG ALLERGIES</h6>
                        <div id="htm"></div>
                        <div class="allergies">
                            <?php
                            $result = $db->prepare("SELECT * FROM temp_drug_allergies WHERE user_id='$user_id'");
                            $result->execute();
                            $r = 1;
                            for ($h = 0; $row = $result->fetch(); $h++) { ?>
                                <p><?php echo $row['drug_allergies']; ?> <span date-id="<?php echo $row['id']; ?>" data-table="temp_drug_allergies" class="badge bg-danger del-row-algy">Remove</span>,  </p>
                            <?php }; ?>
                        </div>
                        
                    </div>

                    <!-- /.col -->
                </div>
                <br>
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
                <table class="prestable pres-table long_term">
              <thead>
              <tr >
                  <th></th>
                  <th>Trade name</th>
                  <th>Generic Name</th>
                  <th>Form</th>
                  <th>Strength </th>
                  
                  <th>Frequency</th>
                  <th>Duration</th>
                  <th>Route</th>
                  
                  <th>Indication</th>
                  <th>Advice</th>
                  <th></th>
              </tr>
              </thead>
            </table>                    <?php
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
                    echo "<div class='drg-heding'>";
                    $after_slq = "SELECT * FROM temp_prescription_drugs where category='after_the_other' AND user_id=$user_id";
                    $after_result = $db->query($after_slq)->fetch();
                    if (@count($after_result["id"]) >= 1) {
                        ?>
                        <h4 class="hed-bot drg_hed">Drugs to be taken in step order</h4>
                        <?php include 'parts/after-the-other.php';
                    }; ?>
                    <?php
                    $sum = 0;
                    for ($f = 1; $f <= 7; $f++) { ?>
                    <?php $step = $f.'step';
                        $after_slq = "SELECT * FROM temp_prescription_drugs where category="."'".$step."' AND user_id="."'".$user_id."'";
                        $after_result = $db->query($after_slq)->fetch();
                        if (@count($after_result["id"]) >= 1) {
                            ?>
                            
                            <h4 class="hed-bot drg_hed">Drugs to be taken in step order</h4>
                            <h4 class="hed-bot sml">Step <?php echo $f; ?> </h4>
                            <?php include 'parts/steps_table.php';
                        };
                    }?>
                    </div>
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
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">
                <div class="col-12">
                    <a href="<?php echo $url; ?>views/prescription-print.php?id=<?php echo $id; ?>" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print English</a>
                    <a href="<?php echo $url; ?>views/prescription-print-sinhala.php?id=<?php echo $id; ?>" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print Sinhala</a>
                    <a href="<?php echo $url; ?>control-files/complete_patients.php?patients_id=<?php echo $user_id; ?>"  class="btn btn-default"><i class="fas fa-print"></i> Save</a>
                    <!-- <a href="<?php echo $url; ?>views/prescription-print-sinhala.php?patients_id=<?php echo $id; ?>" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Send Via Whatsapp</a> -->
                    <a href="<?php echo $url; ?>control-files/clear-prescription.php?id=<?php echo $id; ?>" class="btn bg-danger"> Clear Prescription</a>
                    <!-- <a target="_blank" href="https://api.whatsapp.com/send?file=C:\Users\Sheran\Downloads\AdminLTE 3 _ Dashboard 2.pdf&phone=+94773908394">Send Message</a> -->
                </div>
            </div>
        </div>
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
include '../inc/footer.php';
?>

<script type="text/javascript">
(function ($) {
    
    $(".adbtn").click(function () {
        var tab = $(this).attr('data-id');
        $('.'+tab).css('display','flex');
        // var html = $(this).closest('.row').html();
        // $(this).closest('.dinamic').append('<div class="row remvespan">'+html+'</div>');
        // $('.remvespan span').remove();
        // initSelect2();
    });

    $(".rmubtn").click(function () {
        $(this).parent().closest('.row').css('display','none');
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
                    diag.fadeOut().remove();
            }
        });
    });

    // Deletes row-algy
    $(".del-row-algy").click(function () {
        var id = $(this).attr('date-id');
        var table = $(this).attr('data-table');
        var diag = $(this).parent();

        $.ajax({
            type: 'POST',
            url: '<?php echo $url; ?>control-files/remove-prescription-data.php',
            data: "id=" + id + "&table=" + table,
            success: function (data) {
                    diag.fadeOut().remove();
            }
        });
    });

    $(".del-inva").click(function () {
        var id = $(this).attr('date-id');
        var table = $(this).attr('data-table');
        var diag = $(this).parent();

        $.ajax({
            type: 'POST',
            url: '<?php echo $url; ?>control-files/remove-prescription-data.php',
            data: "id=" + id + "&table=" + table,
            success: function (inva_data) {
                   // diag.fadeOut().remove();
            }
        });
    });

    $(".del-inst").click(function () {

        var id = $(this).attr('date-id');
        var table = $(this).attr('data-table');
        var diag = $(this).parent();

        $.ajax({
            type: 'POST',
            url: '<?php echo $url; ?>control-files/remove-inst-data.php',
            data: "id=" + id + "&table=" + table,
            success: function (data) {
                //alert(data);
                //$('#htm').html(data);
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
            //console.log(data);
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

    $('.select2').select2({
        tags: true,
    });


        var test = $('#ilness option:first-child').val();
   
        var trainindIdArray = test.split(',');

        $.ajax({
            type: 'POST',
            url: '<?php echo $url; ?>control-files/inst-data-view.php',
            data: "id=" + trainindIdArray[1],
            success: function (data) {
                $('#hastm').html(data);
                initSelect2();
            }
        });

        //alert(trainindIdArray[1]);
  

    $(document.body).on("change","#ilness",function(){

        var test = this.value;
        var trainindIdArray = test.split(',');

        $.ajax({
            type: 'POST',
            url: '<?php echo $url; ?>control-files/inst-data-view.php',
            data: "id=" + trainindIdArray[1],
            success: function (data) {
                $('#hastm').html(data);
                initSelect2();
            }
        });

        //alert(trainindIdArray[1]);
      });

function initSelect2() {
 $('.select2').select2({
        tags: true,
    });
}


$(".mychek").prop("checked", false);
$(".mychek").click(function () {

    if ($(this).is(":checked")) {
        $(this).closest(".row").addClass("selected");
        $(this).parent().find('.check').val('1');
    } else {
        $(this).closest(".row").removeClass("selected");
        $(this).parent().find('.check').val('0');
    }

});



})(jQuery);
</script>
</body>
</html>
