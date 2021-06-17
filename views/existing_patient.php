<?php include'../config/config.php'; ?>
<?php include'../inc/header.php';

  $user_id = $_GET['id'];
  $ndf_slq = "SELECT * FROM patients_details WHERE patients_id=$user_id";
  $ndf_result = $db->query($ndf_slq)->fetch();

  $pr_slq = "SELECT * FROM patients_prescription_number WHERE patients_id=$user_id order by id desc";
  $pr_result = $db->query($pr_slq)->fetch();
  $prescription_number = $pr_result['id'];


  $tp_slq = "SELECT * FROM today_patients WHERE patients_id=$user_id order by id desc";
  $tp_result = $db->query($tp_slq)->fetch();

  $patients_other_details_slq = "SELECT * FROM temp_patients_other_details WHERE patients_id=$user_id ";
  $patients_other_details_result = $db->query($patients_other_details_slq)->fetch();

  if(!$patients_other_details_result["id"]){
      $patients_other_details_slq = "SELECT * FROM save_patients_other_details WHERE prescription_number='$prescription_number' order by id desc";
      $patients_details_result = $db->query($patients_other_details_slq)->fetch();
  }else{
      $patients_details_result = $patients_other_details_result;
  }

?>
  <div class="nes-stat">
    <div class="container">
      <form method="post" id="configform" action="<?php echo $url; ?>control-files/save-existing_patient.php">
        <input type="hidden" name="patients_id" value="<?php echo $user_id; ?>">
        <div class="row">
          <div class="col-md-6">
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
                    <select class="form-control desabl" style="width: 100%;" name="residence" disabled>
                    <option value="<?php echo explode(",", $ndf_result['residence'])[0]; ?>" selected="selected"><?php echo explode(",", $ndf_result['residence'])[0]; ?></option>
                     
                  </select>
                  </td>
                </tr>
                <tr>
                  <td>Payment</td>
                  <td>
                    <select name="report_or_consultation" class="form-control" required>
                        <option><?php echo $tp_result['report_or_consultation']; ?></option>
                        <option>Consultation</option>
                        <option>Report</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Phone</td>
                  <td><input type="text" class="form-control desabl" name="phone" value="<?php echo $ndf_result['phone']; ?>" disabled></td>
                </tr>
                <tr>
                  <td>Session</td>
                  <td>
                    <select name="time" class="form-control" required>
                      <option><?php echo $tp_result['time']; ?></option>
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
                      <option><?php echo $tp_result['apnumber']; ?></option>
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
                    <select class="form-control select2 desabl" style="width: 100%;" name="occupation" >
                    <option value="<?php echo explode(",", $ndf_result['occupation'])[0]; ?>" selected="selected"><?php echo explode(",", $ndf_result['occupation'])[0]; ?></option>
                      
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
                  <td>Kg</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Height</td>
                  <td><input type="text" class="form-control inchange height_in" name="height" value="<?php echo $patients_details_result['height']; ?>"></td>
                  <td>m</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Body mass index[BMI] </td>
                  <td> <input type="text" class="form-control"  name="bmi" disabled></td>
                  <td>Kg/m<sup>2</sup></td>
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
                  <td><input type="text" class="form-control" id="ideal_waist"  name="ideal_waist" disabled></td> 
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
          <div class="col-md-12">
            <div class="form-group mar">
              <input type="submit" class="btn btn-success btn-with" value="Update">
          
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

<?php include'../inc/footer.php'; ?>

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

    $(".height_in").on('change', function(){  
        var height = $(this).val();
        var ideal_waist = (height * 100) / 5.08;
        $('#ideal_waist').val(ideal_waist.toFixed(0));
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
