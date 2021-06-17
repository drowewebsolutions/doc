<?php 
  include'../config/config.php';
  include'../inc/header.php';  
  $id = $_GET['id'];
  $si_slq = "SELECT * FROM patients_details WHERE patients_id='$id '";
  $id_si = $db->query($si_slq)->fetch();
?>
 
  <div class="nes-stat">
    <div class="container">
      <form method="post" id="configform" action="<?php echo $url; ?>control-files/update_biodata-update.php">
        <div class="row">
          <div class="col-md-12">
            <div class="ns-tble">
              <table>
                <tr>
                  <th>Parameters</th>
                  <th>Result</th>
                </tr>
               
                <tr>
                  <td>Name</td>
                  <td><input type="hidden" class="form-control" value="<?php echo $id; ?>" name="id" >
                    <input type="text" class="form-control" value="<?php echo $id_si["name"]; ?>" name="name" >
                  </td>
                </tr>
                <tr>
                  <td>Gender</td>
                  <td class="malgrd">
                    <select name="gender" class="form-control">
                      <?php if($id_si["gender"]){ echo '<option>'.$id_si["gender"].'</option>';} ?>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Date of Birth</td>
                  <td> <input type="text" class="datevalidate form-control" placeholder="YYYY-MM-DD" autocomplete="off" value="<?php echo $id_si["birthday"]; ?>" class="form-control datepicker" name="birthday" ></td>
                </tr>
                <tr>
                  <td>Residence</td>
                  <td>
                    <select class="form-control select2" style="width: 100%;" name="residence">
                      <?php if($id_si["residence"]){ echo '<option>'.$id_si["residence"].'</option>';} ?>
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
                  <td>Phone</td>
                  <td><input type="text" class="form-control" value="<?php echo $id_si["phone"];; ?>" name="phone" ></td>
                </tr>
                <tr>
                  <td>Occupation</td>
                  <td>
                    <select class="form-control select2" style="width: 100%;" name="occupation">
                      <?php if($id_si["occupation"]){ echo '<option>'.$id_si["occupation"].'</option>';} ?>
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
              </table>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group mar">
              <input type="submit" class="btn btn-success btn-with" value="UPDATE">
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
<?php include'../inc/footer.php'; ?>

<script type="text/javascript">
  (function ($) {
    $('.select2').select2({
      tags: true,
    });
  })(jQuery);
</script>
</body>
</html>
