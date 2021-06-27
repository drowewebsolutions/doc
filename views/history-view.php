<?php include '../config/config.php'; ?>
<?php include '../inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo $url; ?>dist/css/prescription.css">

<div id="printarea" class="nes-stat">
   <div class="container">
        <div class="row ">
            <div class="col-12 printnone">
                <?php
                $id = $_GET['id'];
                $user_id = $_GET['id'];
                $retunurl = 'prescription';

                $sql = "UPDATE today_patients SET status='2' WHERE patients_id='$user_id'";
                $stmt = $db->prepare($sql);
                $stmt->execute();

                $result = $db->prepare("SELECT id,date FROM patients_prescription_number WHERE patients_id=$id ORDER BY date DESC ");
                $result->execute();
                for ($e = 0; $row = $result->fetch(); $e++) {
                    ?>
                <?php if($e == 0){ ?>
                <h5>Past Prescriptions</h5>
                <div class="patients-row">
                <?php }; ?>
                    <div class="imprrow">
                        <span><?php echo $row['date']; ?></span>
                        <a class="btn btn-block btn-warning btn-xs li-modal" data-toggle="modal" href="<?php echo $url; ?>views/prescription-view.php?id=<?php echo $row['id']; ?>&userid=<?php echo $user_id; ?>" data-target="#pastmodal">View</a>
                        <a class="btn btn-block btn-success btn-xs" href="<?php echo $url; ?>control-files/import-hist_prescription.php?id=<?php echo $row['id']; ?>&userid=<?php echo $user_id; ?>">Alter</a> 
                        <a class="badge bg-danger svg-btn" href="<?php echo $url; ?>control-files/delete_hist-prescription.php?id=<?php echo $row['id']; ?>&userid=<?php echo $user_id; ?>"><svg enable-background="new 0 0 384 384" version="1.1" viewBox="0 0 384 384" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="m64 341.33c0 23.574 19.093 42.667 42.667 42.667h170.67c23.573 0 42.666-19.093 42.666-42.667v-256h-256v256z"/><polygon points="266.67 21.333 245.33 0 138.67 0 117.33 21.333 42.667 21.333 42.667 64 341.33 64 341.33 21.333"/></svg></a>
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

                $patients_other_details_slq = "SELECT * FROM histy_patients_other_details WHERE patients_id=$user_id order by id desc";
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
                        <button type="button" class="btn btn-block btn-primary col-11 " data-toggle="modal"
                                data-target="#diagnoses">Add diagnoses
                        </button>
                        <br class="">
                        <h6>DIAGNOSES</h6>
                        <div id="htm"></div>
                        <table>
                            <?php
                            $result = $db->prepare("SELECT * FROM histy_diagnoses WHERE user_id=$user_id ORDER BY id asc");
                            $result->execute();
                            $r = 1;
                            for ($h = 0; $row = $result->fetch(); $h++) { ?>
                                <tr>
                                    <td><?php echo $r++; ?></td>
                                    <td><?php echo $row['diagnoses']; ?></td>
                                    <td>
                                        <span date-id="<?php echo $row['id']; ?>" data-table="histy_diagnoses" class="badge bg-danger del-row">Remove</span>
                                    </td>
                                </tr>
                            <?php }; ?>
                        </table>
                        <br class="">
                        <button type="button" class="btn btn-block btn-primary col-11 " data-toggle="modal" data-target="#drug_allergies">Add Allergies</button>
                        <br>
                        <h6>DRUG ALLERGIES</h6>
                        <div id="htm"></div>
                        <div class="allergies">
                            <?php
                            $result = $db->prepare("SELECT * FROM histy_drug_allergies WHERE user_id=$user_id ORDER BY id asc");
                            $result->execute();
                            $r = 1;
                            for ($h = 0; $row = $result->fetch(); $h++) { ?>
                                <p><?php echo $row['drug_allergies']; ?> <span date-id="<?php echo $row['id']; ?>" data-table="histy_drug_allergies" class="badge bg-danger del-row-algy">Remove</span>,  </p>
                            <?php }; ?>
                        </div>
                    </div>

                    <!-- /.col -->
                </div>
                <br>
                <div class="row ">
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
                $short_slq = "SELECT * FROM histy_prescription_drugs where category='short_term' and user_id=$user_id";
                $short_result = $db->query($short_slq)->fetch();
                if (@count($short_result["id"]) >= 1) {
                    ?>
                    <h4 id="short_term" class="hed-bot">Short term</h4>
                    <?php
                    include 'hist_parts/short-term.php';
                };
                $long_slq = "SELECT * FROM histy_prescription_drugs where category='long_term' AND user_id=$user_id";
                $long_result = $db->query($long_slq)->fetch();
                if (@count($long_result["id"]) >= 1) {
                    ?>
                    <h4 class="hed-bot">Long term</h4>
                    <?php include 'hist_parts/long-term.php';
                };
                $when_slq = "SELECT * FROM histy_prescription_drugs where category='when_needed' AND user_id=$user_id";
                $when_result = $db->query($when_slq)->fetch();
                if (@count($when_result["id"]) >= 1) {
                    ?>
                    <h4 class="hed-bot">Drugs to be used only when needed</h4>
                    <?php include 'hist_parts/when-needed.php';
                };
                echo "<div class='drg-heding'>";
                $after_slq = "SELECT * FROM histy_prescription_drugs where category='after_the_other' AND user_id=$user_id";
                $after_result = $db->query($after_slq)->fetch();
                if (@count($after_result["id"]) >= 1) {
                    ?>
                    <h4 class="hed-bot drg_hed">Drugs to be taken in step order</h4>
                    <?php include 'hist_parts/after-the-other.php';
                }; ?>
                <?php
                $sum = 0;
                for ($f = 1; $f <= 7; $f++) {
                $step = $f.'step';
                    $after_slq = "SELECT * FROM histy_prescription_drugs where category="."'".$step."' AND user_id="."'".$user_id."'";
                    $after_result = $db->query($after_slq)->fetch();
                    if (@count($after_result["id"]) >= 1) {
                        ?>
                        <h4 class="hed-bot drg_hed">Drugs to be taken in step order</h4>
                        <h4 class="hed-bot sml">Step <?php echo $f; ?> </h4>
                        <?php include 'hist_parts/steps_table.php';
                    };
                }?>
                </div>
                <!-- /.row -->
                <br><br>
                <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-sm-8 invoice-col">
                        <button type="button" class="btn btn-block btn-primary col-4 " data-toggle="modal" data-target="#investigations">Add Investigations</button>
                        <div class="investigations">
                            <?php
                            $result = $db->prepare("SELECT * FROM histy_test where user_id=$user_id ORDER BY id asc");
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
                                <span date-id="<?php echo $row['id']; ?>" data-table="histy_test" class="badge bg-danger del-row">Remove</span>
                            <?php }; ?>

                        </div>
                        <br>
                        <button type="button" class="btn btn-block btn-primary col-4 " data-toggle="modal" data-target="#assign_a_doctor">Assign a doctor</button>
                        <br>
                        <h6 id="assignadoctor">REFERRALS</h6>
                        <table class="pres-table nv" width="100%">
                            <tr>
                                <th>Doctor</th>
                                <th>Indication</th>
                            </tr>
                            <?php
                            $result_assign_a_doctor = $db->prepare("SELECT * FROM histy_assign_a_doctor where user_id=$user_id ORDER BY id asc");
                            $result_assign_a_doctor->execute();
                            for ($f = 0; $rownas = $result_assign_a_doctor->fetch(); $f++) {
                                ?>
                                <tr>
                                    <td><?php echo $rownas['name']; ?></td>
                                    <td><?php echo $rownas['note']; ?></td>
                                    <td width="15%"><span date-id="<?php echo $rownas['id']; ?>" data-table="histy_assign_a_doctor" class="badge bg-danger del-row">Remove</span></td>
                                </tr>
                            <?php }; ?>
                        </table>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="button" class="btn btn-block btn-primary col-9 " data-toggle="modal" data-target="#special">Add Next Visits</button>
                        <div class="investigations ">
                            <h6>NEXT VISIT</h6>
                            <table class="pres-table nv" width="100%">
                                <?php
                                $result_next_visits = $db->prepare("SELECT * FROM histy_next_visits where user_id=$user_id ORDER BY id asc");
                                $result_next_visits->execute();
                                for ($m = 0; $rownv = $result_next_visits->fetch(); $m++) {
                                ?>
                                <tr>
                                    <td><?php echo $rownv['days']; ?></td>
                                    <td><?php echo $rownv['pay']; ?></td>
                                    <td><span date-id="<?php echo $rownv['id']; ?>" data-table="histy_next_visits" class="badge bg-danger del-row">Remove</span></td>
                                </tr>
                                <?php }; ?>
                            </table>
                        </div>
                    </div>
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

            <!-- this row will not appear when printing -->
            <div class="row no-print">
                <div class="col-12">
                    <button id="printbtn" class="btn btn-default"><i class="fas fa-print"></i> Print English</button>
                    <a href="<?php echo $url; ?>views/prescription-print-sinhala.php?id=<?php echo $id; ?>" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print Sinhala</a>
                    <!-- <a href="<?php echo $url; ?>views/prescription-print-sinhala.php?patients_id=<?php echo $id; ?>" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Send Via Whatsapp</a> -->
                    <a href="<?php echo $url; ?>control-files/clear_hist-prescription.php?id=<?php echo $id; ?>" class="btn bg-danger"> Discard Changes</a>
                    <a href="<?php echo $url; ?>control-files/clear_hist-prescription.php?id=<?php echo $id; ?>" class="btn bg-danger"> Save Changes</a>
                    <!-- <a target="_blank" href="https://api.whatsapp.com/send?file=C:\Users\Sheran\Downloads\AdminLTE 3 _ Dashboard 2.pdf&phone=+94773908394">Send Message</a> -->
                </div>
            </div>
        </div>
    </div>
</div>



<?php
include 'prescription/hpopup/diagnoses.php';
include 'prescription/hpopup/drug_allergies.php';
include 'prescription/hpopup/investigations.php';
include 'prescription/hpopup/assign_a_doctor.php';
include 'prescription/hpopup/next-visit.php';
include 'prescription/hpopup/create_drug.php';
include 'prescription/hpopup/add_bulk_drugs.php';
include 'prescription/hpopup/add_drug_with_ilnes.php';
include '../inc/footer.php';
?>

<script type="text/javascript">
(function ($) {
    $("#printbtn").click(function () {
        //Hide all other elements other than printarea.
        $("#printarea").show();
        window.print();
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
                url: "<?php echo $url; ?>control-files/order_hist-update.php",
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

})(jQuery);
</script>
</script>
</body>
</html>
