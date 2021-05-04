<?php include'../config/config.php'; ?>
<?php include'../inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo $url; ?>dist/css/print.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Print English</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content " id='printdive'>
        <div class="container-fluid">
            <?php

            $id = $_GET['id'];
            $user_id = $_GET['id'];

            $ndf_slq = "SELECT * FROM patients_details WHERE patients_id=$user_id";
            $ndf_result = $db->query($ndf_slq)->fetch();

            $patients_other_details_slq = "SELECT * FROM temp_patients_other_details WHERE patients_id=$user_id order by id desc";
            $patients_other_details_result = $db->query($patients_other_details_slq)->fetch();
            $id_result = $patients_other_details_result;
            ?>
            <div class="row">
                <div class="col-12">
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->

                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                <h6>Patient's Details</h6>
                                <table>
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
                                        <td><?php echo($ndf_result["birthday"]); ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Age</b></td>
                                        <td>
                                            <?php
                                            $birthDate = explode("/", $ndf_result["birthday"]);
                                            $age = date("Y") - $birthDate[2];
                                            echo $age;
                                            ?>
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
                                            <td><b>LRMP</b></td>
                                            <td><?php echo($id_result["lrmp"]); ?></td>
                                        </tr>
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
                                <h6>Vital signs</h6>
                                <table>
                                    <tr>
                                        <td><b>Height</b></td>
                                        <td><?php echo($id_result["height"]); ?> (m)</td>
                                    </tr>
                                    <tr>
                                        <td><b>Weight </b></td>
                                        <td><?php echo($id_result["body_Weight"]); ?> (kg)</td>
                                    </tr>
                                    <tr>
                                        <?php @$bmi_val = $id_result["body_Weight"] / ($id_result["height"] * $id_result["height"]); ?>
                                        <td><b>BMI</b></td>
                                        <td><span class="<?php
                                            if ($bmi_val > 25 || $bmi_val < 18.5) {
                                                echo 'red';
                                            }
                                            ?>"><?php echo round($bmi_val, 2); ?></span> [18.5 - 24.9]
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Ideal body weight (BMI25)</b></td>
                                        <td><?php echo 25 * ($id_result["height"] * $id_result["height"]); ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Mid umbilical waist </b></td>
                                        <td><?php echo($id_result["mid"]); ?>
                                            <?php if ($ndf_result["gender"] == 'Female') { ?> [< 32inches] <?php } else { ?>[< 35inches]  <?php }; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Systolic BP </b></td>
                                        <td><span class="<?php
                                            if ($id_result["systolic_blood_pressure"] < 90 || $id_result["systolic_blood_pressure"] > 120) {
                                                echo 'red';
                                            }
                                            ?>"><?php echo($id_result["systolic_blood_pressure"]); ?></span>
                                            [90-120mmHg]
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Diastolic BP</b></td>
                                        <td><span class="<?php
                                            if ($id_result["diastolic_blood_pressure"] < 60 || $id_result["diastolic_blood_pressure"] > 80) {
                                                echo 'red';
                                            }
                                            ?>"><?php echo($id_result["diastolic_blood_pressure"]); ?></span>
                                            [60-80mmHg]
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Blood pressure </b></td>
                                        <td><?php echo($id_result["systolic_blood_pressure"]); ?>
                                            /<?php echo($id_result["diastolic_blood_pressure"]); ?>[155/90mmHg.]
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Pulse Rate</b></td>
                                        <td><span class="<?php
                                            if ($id_result["pulse_rate"] < 60 || $id_result["pulse_rate"] > 100) {
                                                echo 'red';
                                            }
                                            ?>"><?php echo($id_result["pulse_rate"]); ?></span> [60-100bpm]
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Respiratory rate</b></td>
                                        <td><span class="<?php
                                            if ($id_result["respiratory_rate"] < 12 || $id_result["respiratory_rate"] > 20) {
                                                echo 'red';
                                            }
                                            ?>"><?php echo($id_result["respiratory_rate"]); ?></span> [12-20/min]
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Oxygen Saturation</b></td>
                                        <td><span class="<?php
                                            if ($id_result["oxygen_saturation"] < 95 || $id_result["oxygen_saturation"] > 100) {
                                                echo 'red';
                                            }
                                            ?>"><?php echo($id_result["oxygen_saturation"]); ?></span> [95-100%]
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Temperature</b></td>
                                        <td><span class="<?php
                                            if ($id_result["temperature"] < 97 || $id_result["temperature"] > 99) {
                                                echo 'red';
                                            }
                                            ?>"><?php echo($id_result["temperature"]); ?></span> [97-99 <sup>0</sup>F]
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Random blood glucose</b></td>
                                        <td><span class="<?php
                                            if ($id_result["random_blood_suga"] < 80 || $id_result["random_blood_suga"] > 140) {
                                                echo 'red';
                                            }
                                            ?>"><?php echo($id_result["random_blood_suga"]); ?></span> [80-140mg/dl]
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-3 invoice-col">

                                <h6>Diagnoses</h6>
                                <table>
                                    <?php
                                    $result = $db->prepare("SELECT * FROM temp_diagnoses WHERE user_id=$user_id ORDER BY id asc");
                                    $result->execute();
                                    $r = 1;
                                    for ($i = 0; $row = $result->fetch(); $i++) { ?>
                                        <tr>
                                            <td><?php echo $row['diagnoses']; ?></td>
                                        </tr>
                                    <?php }; ?>
                                </table>
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

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-sm-8 invoice-col">
                                <div class="investigations">
                                    <?php
                                    $result = $db->prepare("SELECT * FROM temp_test where user_id=$user_id ORDER BY id asc");
                                    $result->execute();
                                    $r = 1;
                                    for ($i = 0; $row = $result->fetch(); $i++) {

                                        echo '<h6>INVESTIGATIONS TO BE DONE [ ' . $row['investigations'] . ' ]</h6>';
                                        $test = unserialize($row['test']);

                                        for ($e = 0; $e < count($test); $e++) {
                                            if (count($test[$e]) == '2') {
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
                                    <?php }; ?>
                                </div>


                               <?php  $asd_slq = "SELECT * FROM temp_assign_a_doctor where user_id=$user_id";
                                $asd_result = $db->query($asd_slq)->fetch(); ?>

                                <?php if ($asd_result["name"]){ ?>
                                <h6 id="assignadoctor">Referrals</h6>
                                <table class="pres-table nv" width="100%">
                                    <tr>
                                        <th>Doctor</th>
                                        <th>Indication</th>
                                    </tr>
                                <?php }; ?>
                                <?php
                                $result_assign_a_doctor = $db->prepare("SELECT * FROM temp_assign_a_doctor where user_id=$user_id ORDER BY id asc");
                                $result_assign_a_doctor->execute();
                                for ($s = 0; $rownas = $result_assign_a_doctor->fetch(); $s++) {
                                    ?>
                                        <tr>
                                            <td><?php echo explode(",", $rownas['name'])[0]; ?></td>
                                            <td><?php echo explode(",", $rownas['note'])[0]; ?></td>
                                        </tr>
                                <?php }; ?>
                                <?php if ($asd_result["name"]){ ?>
                                </table>
                                <?php }; ?>
                            </div>


                            <div class="col-4">
                                <?php  $nsx_slq = "SELECT * FROM temp_next_visits where user_id=$user_id";
                                $nsx_result = $db->query($nsx_slq)->fetch(); ?>

                                <?php if ($nsx_result["days"]){ ?>
                                <div class="investigations ">
                                    <h6>NEXT VISIT</h6>
                                    <table class="pres-table nv" width="100%">
                                <?php }; ?>
                                    <?php
                                    $result_next_visits = $db->prepare("SELECT * FROM temp_next_visits where user_id=$user_id ORDER BY id asc");
                                    $result_next_visits->execute();
                                    for ($d = 0; $rownv = $result_next_visits->fetch(); $d++) {
                                        ?>

                                            <tr>
                                                <td><?php echo $rownv['days']; ?></td>
                                                <td><?php echo $rownv['pay']; ?></td>
                                            </tr>

                                    <?php }; ?>
                                <?php if ($nsx_result["days"]){ ?>
                                    </table>
                                </div>
                                <?php }; ?>
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
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">
                            <a href="<?php echo $url; ?>control-files/save_prescription.php?patients_id=<?php echo $user_id; ?>"
                               target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Save</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

  </div><!-- /.container-fluid -->

<script src="<?php echo $url; ?>plugins/jquery/jquery.min.js"></script>
<script src="<?php echo $url; ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $url; ?>plugins/select2/js/select2.full.js"></script>
<script src="<?php echo $url; ?>plugins/jquery-ui/jquery-ui.js"></script>
<script src="<?php echo $url; ?>dist/js/adminlte.min.js"></script>
<script src="<?php echo $url; ?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo $url; ?>dist/js/demo.js"></script>
<script>
    (function($) {
    $("#printdive").show();
        window.print();
    })(jQuery);
</script>

</body>
</html>
