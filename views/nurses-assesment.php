<?php include'../config/config.php';?>
<?php 

  $nd = $_GET['nd'];
  $ord_id = $_GET['data'];

  $pat_chck_slq = "SELECT * FROM temp_center_patients_details WHERE `order`="."'".$ord_id."'"." and `center`="."'".$Center."'"." and `nd`="."'".$nd."'"."";
  $pat_chck_result = $db->query($pat_chck_slq)->fetch();

  if($pat_chck_result['id']){
    $pat_array = @unserialize(base64_decode($pat_chck_result['data_arrey']));
    $las_id = $pat_chck_result['id'];
    $patients_id = $pat_chck_result['patients_id'];
  }else{
    $sql = "INSERT INTO temp_center_patients_details(`order`,`center`,`nd`,`active`) VALUES ('".$ord_id."','".$Center."','".$nd."','1')";
    $db->exec($sql);
    $patients_id = null;
    $pat_array = null;
    $las_id = $db->lastInsertId();
  }

  include'../inc/header.php'; 
?>
  <?php if($pat_chck_result['id'] == null){ ?>
    <script>
      location.reload();
    </script>
  <?php  }; ?>

  <div class="nes-stat">
    <div class="container">
      <form method="post" id="configform" action="<?php echo $url; ?>control-files/save-nurses-assesment.php">
        <input type="hidden" value="<?php echo $las_id; ?>" name="las_id">
        <input type="hidden" value="<?php echo $nd; ?>" name="nd">
        <div class="row">
          <div class="col-md-6">
            <div class="ns-tble">
              <table>
                <tr>
                  <th>Parameters</th>
                  <th>Result</th>
                </tr>
                <tr>
                  <td>Patient ID</td>
                  <td><input type="text" class="form-control" value="<?php echo $patients_id; ?>" name="patient_id" disabled>
                      <input type="hidden" class="form-control" value="<?php echo $patients_id; ?>" name="user_id" >
                  </td>
                </tr>
                <tr>
                  <td>Date and Dime</td>
                  <td><?php echo date('Y-m-d') ?></td>
                </tr>
                <tr>
                  <td>Center</td>
                  <td><?php echo $Center; ?></td>
                </tr>
                <tr>
                  <td>Name</td>
                  <td><input type="text" class="form-control" value="<?php echo $pat_array['name']; ?>" name="name" ></td>
                </tr>
                <tr>
                  <td>Gender</td>
                  <td class="malgrd">
                    <select name="gender" class="form-control">
                      <?php if($pat_array['name']){ echo '<option>'.$pat_array['gender'].'</option>';} ?>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Date of Birth</td>
                  <td> <input type="text" class="datevalidate form-control" placeholder="YYYY-MM-DD" autocomplete="off" value="<?php echo $pat_array['birthday']; ?>" class="form-control datepicker" name="birthday" id="birthday" ></td>
                </tr>
                <tr>
                  <td>Age</td>
                  <td> <div id="age" style="padding-left: 6px;"></div></td>
                </tr>
                <tr>
                  <td>Residence</td>
                  <td>
                    <select class="form-control select2" style="width: 100%;" name="residence">
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
                    <select name="report_or_consultation" class="form-control" required>
                      <?php if($pat_array['report_or_consultation']){ echo '<option>'.$pat_array['report_or_consultation'].'</option>';} ?>
                        <option>Consultation</option>
                        <option>Report</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Phone</td>
                  <td><input type="text" class="form-control" value="<?php echo $pat_array['phone']; ?>" name="phone" maxlength="10" minlength="10"></td>
                </tr>
                <tr>
                  <td>Session</td>
                  <td>
                    <select name="time" class="form-control" required>
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
                    <select name="apnumber" class="form-control" required>
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
                    <select class="form-control select2" style="width: 100%;" name="occupation">
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
                    <select name="smoking" class="custom-select">
                      <?php if($pat_array['smoking']){ echo '<option>'.$pat_array['smoking'].'</option>';} ?>
                      <option>No</option>
                      <option>Yes</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Alcohol</td>
                  <td>
                    <select name="alcohol" class="custom-select">
                      <?php if($pat_array['alcohol']){ echo '<option>'.$pat_array['alcohol'].'</option>';} ?>
                      <option>No</option>
                      <option>Yes</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Kidney failure</td>
                  <td>
                    <select name="kidney" class="custom-select">
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
                    <select name="allergies" class="custom-select">
                      <?php if($pat_array['allergies']){ echo '<option>'.$pat_array['allergies'].'</option>';} ?>
                      <option>Not Present</option>
                      <option>Present</option>
                    </select>
                  </td>
                </tr>
                <tr class="femal">
                  <td>Pregnancy status</td>
                  <td>
                    <select name="pregnancy" class="custom-select">
                      <?php if($pat_array['pregnancy']){ echo '<option>'.$pat_array['pregnancy'].'</option>';} ?>
                      <option>No</option>
                      <option>Yes</option>
                    </select>
                  </td>
                </tr>
                <tr class="femal">
                  <td>Lactation</td>
                  <td>
                    <select name="lactating" class="custom-select">
                      <?php if($pat_array['lactating']){ echo '<option>'.$pat_array['lactating'].'</option>';} ?>
                      <option>No</option>
                      <option>Yes</option>
                    </select>
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <div class="col-md-6">
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
                  <td><input type="text" placeholder="n/c" class="form-control bldpash" value="<?php echo $pat_array['systolic_blood_pressure']; ?>" name="systolic_blood_pressure" ></td>
                  <td>mmHg</td>
                  <td>[90-120]</td>
                </tr>
                <tr>
                  <td>Diastolic blood pressure</td>
                  <td><input type="text" placeholder="n/c" class="form-control bldpash" value="<?php echo $pat_array['diastolic_blood_pressure']; ?>" name="diastolic_blood_pressure" ></td>
                  <td>mmHg</td>
                  <td>[60-80]</td>
                </tr>
                <tr>
                  <td>Blood pressure</td>
                  <td><input type="text" placeholder="n/c" class="form-control" value="<?php echo $pat_array['blood_pressure']; ?>" name="blood_pressure" disabled ></td>
                  <td>mmHg</td>
                  <td>[120/80]</td>
                </tr>
                <tr>
                  <td>Random blood glucose</td>
                  <td><input type="text" placeholder="n/c" class="form-control" value="<?php echo $pat_array['random_blood_suga']; ?>" name="random_blood_suga" ></td>
                  <td>mg/dl</td>
                  <td>[80-140]</td>
                </tr>
                <tr>
                  <td>Body Weight</td>
                  <td><input type="text" placeholder="n/c" class="form-control inchange" value="<?php echo $pat_array['body_Weight']; ?>" name="body_Weight" ></td>
                  <td>kg</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Height</td>
                  <td><input type="text" placeholder="n/c" class="form-control inchange height_in" value="<?php echo $pat_array['height']; ?>" name="height" ></td>
                  <td>m</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Body mass index[BMI] </td>
                  <td> <input type="text" placeholder="n/c" class="form-control" value="<?php echo $pat_array['bmi']; ?>" name="bmi" disabled></td>
                  <td>kg/m<sup>2</sup></td>
                  <td>[18.5-24.9]</td>
                </tr>
                <tr>
                  <td>Ideal body weight [For BMI-25]</td>
                  <td><input type="text" placeholder="n/c" class="form-control"  name="ideal_body_weight" disabled></td>
                  <td>kg</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Mid umbilical waist</td>
                  <td><input type="text" placeholder="n/c" class="form-control" value="<?php echo $pat_array['mid']; ?>" name="mid" ></td>
                  <td>inch</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Ideal waist [waist - height ratio]</td>
                  <td><input type="text" class="form-control" id="ideal_waist"  name="ideal_waist" disabled></td>
                  <td>inch</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Pulse rate</td>
                  <td><input type="text" placeholder="n/c" class="form-control" value="<?php echo $pat_array['pulse_rate']; ?>" name="pulse_rate" ></td>
                  <td>beats/min</td>
                  <td>[60-100]</td>
                </tr>
                <tr>
                  <td>Respiratory rate</td>
                  <td><input type="text" placeholder="n/c" class="form-control" value="<?php echo $pat_array['respiratory_rate']; ?>" name="respiratory_rate" ></td>
                  <td>cycles per/min</td>
                  <td>[12-16]</td>
                </tr>
                <tr>
                  <td>Oxygen saturation</td>
                  <td><input type="text" placeholder="n/c" class="form-control" value="<?php echo $pat_array['oxygen_saturation']; ?>" name="oxygen_saturation" ></td>
                  <td>%</td>
                  <td>[95-100]</td>
                </tr>
                <tr>
                  <td>Temperature</td>
                  <td><input type="text" placeholder="n/c" class="form-control" value="<?php echo $pat_array['temperature']; ?>" name="temperature" ></td>
                  <td><sup>0</sup>F</td>
                  <td>[97-99]</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group mar">
              <input type="submit" class="btn btn-success btn-with" value="SAVE AND ADD TO LIST">
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
<?php include'../inc/footer.php'; 

?>

<script>

(function($) {
    var result = $("#birthday").val().split('-');
    var year = new Date().getFullYear();
    $('#age').text( year - result[0] );

    $("#birthday").on('change', function(){  
        var result = $(this).val().split('-');
        var year = new Date().getFullYear();
        $('#age').text( year - result[0] );
    });

    $(".height_in").on('change', function(){  
        var height = $(this).val();
        var ideal_waist = (height * 100) / 5.08;
        $('#ideal_waist').val(ideal_waist.toFixed(0));
    });

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
    $('.femal').hide();
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

    $("input,select").on('change', function(){  

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
              //$('#htm').html(data);
              $('.topsmall').show("slow").delay(500).hide("slow");
            }
        });

    });

    $('.select2').select2({
      tags: true,
    });
})(jQuery);
</script>
</body>
</html>
