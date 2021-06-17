<?php include'../../config/config.php'; ?>
<?php include'../../inc/header.php'; 
$table = $_GET['tb'];
?>

<div class="nes-stat">
  <div class="container">

    <!-- /.row -->
    <div class="row">
     <div class="col-12">
          <div>
            <?php if($table == 'variables_doctor' || $table == 'variables_doctor_indication'){ ?>
              <ul class="nav nav-treeview" style="display: block;">
                <li class="nav-item">
                  <a class="nav-link <?php if($table == 'variables_doctor'){ echo 'active'; } ?>" href="<?php echo $url; ?>views/drug-variables/variables.php?tb=variables_doctor">
                    Professional
                  </a>
                </li>
                <li class="nav-item">
                  <a  class="nav-link <?php if($table == 'variables_doctor_indication'){ echo 'active'; } ?>" href="<?php echo $url; ?>views/drug-variables/variables.php?tb=variables_doctor_indication">
                    Referral
                  </a>
                </li>
               
              </ul>
            <?php }elseif($table == 'variables_occupation' || $table == 'variables_residence'){ ?>
              <ul class="nav nav-treeview" style="display: block;">
                 <li class="nav-item">
                    <a  class="nav-link <?php if($table == 'variables_occupation'){ echo 'active'; } ?>" href="<?php echo $url; ?>views/drug-variables/variables.php?tb=variables_occupation">
                      Occupation
                    </a>
                  </li>
                  <li class="nav-item">
                    <a  class="nav-link <?php if($table == 'variables_residence'){ echo 'active'; } ?>" href="<?php echo $url; ?>views/drug-variables/variables.php?tb=variables_residence">
                      Residence
                    </a>
                  </li>
                </ul>
           <?php }else{ ?>
            <ul class="nav nav-treeview" style="display: block;">
              <li class="nav-item">
                <a class="nav-link <?php if($table == 'variables_generic_name'){ echo 'active'; } ?>" href="<?php echo $url; ?>views/drug-variables/variables.php?tb=variables_generic_name">
                  Generic names
                </a>
              </li>
              <li class="nav-item">
                <a  class="nav-link <?php if($table == 'variables_trade_name'){ echo 'active'; } ?>" href="<?php echo $url; ?>views/drug-variables/variables.php?tb=variables_trade_name">
                  Trade name
                </a>
              </li>
              <li class="nav-item">
                <a  class="nav-link <?php if($table == 'variables_form'){ echo 'active'; } ?>" href="<?php echo $url; ?>views/drug-variables/variables.php?tb=variables_form">
                  Form
                </a>
              </li>
              <li class="nav-item">
                <a  class="nav-link <?php if($table == 'variables_strength'){ echo 'active'; } ?>" href="<?php echo $url; ?>views/drug-variables/variables.php?tb=variables_strength">
                  Strength
                </a>
              </li>
              <li class="nav-item">
                <a  class="nav-link <?php if($table == 'variables_unit'){ echo 'active'; } ?>" href="<?php echo $url; ?>views/drug-variables/variables.php?tb=variables_unit">
                  Unit
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($table == 'variables_route'){ echo 'active'; } ?>" href="<?php echo $url; ?>views/drug-variables/variables.php?tb=variables_route">
                  Route
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($table == 'variables_frequency'){ echo 'active'; } ?>" href="<?php echo $url; ?>views/drug-variables/variables.php?tb=variables_frequency">
                  Frequency
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($table == 'variables_duration'){ echo 'active'; } ?>" href="<?php echo $url; ?>views/drug-variables/variables.php?tb=variables_duration">
                  Duration
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($table == 'variables_indication'){ echo 'active'; } ?>" href="<?php echo $url; ?>views/drug-variables/variables.php?tb=variables_indication">
                  Indication
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($table == 'variables_instructions'){ echo 'active'; } ?>" href="<?php echo $url; ?>views/drug-variables/variables.php?tb=variables_instructions">
                  Instructions
                </a>
              </li>
                <!-- <li class="nav-item">
                    <a href="<?php echo $url; ?>views/drug-variables/variables.php?tb=variables_doctor">
                        Doctors List
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $url; ?>views/drug-variables/variables.php?tb=variables_doctor_indication">
                        Doctors Indications List
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $url; ?>views/drug-variables/variables.php?tb=variables_occupation">
                        Occupations
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $url; ?>views/drug-variables/variables.php?tb=variables_residence">
                        Residence
                    </a>
                </li> -->
            </ul>
           <?php }; ?>
          </div>
     </div>
     <br>&nbsp;
     <br>
      <div class="col-12">
        <h1><?php echo $table; ?></h1>
        <div class="card">
          <form role="form" action="<?php echo $url; ?>control-files/variables/save.php?tb=<?php echo $table; ?>" method="post">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name </label>
                    <input type="text" class="form-control" name="variables_name" placeholder="Name">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Sinhala </label>
                    <input type="text" class="form-control" name="variables_name_sinhala" placeholder="Name in sinhala" >
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-sm">Submit</button>
            </div>
          </form>
          <br>
          <div class="card-body p-0">
            <table class="table table-sm">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Sinhala</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $result = $db->prepare("SELECT * FROM $table ORDER BY id DESC");
                  $result->execute();
                  for($i=0; $row = $result->fetch(); $i++){
                ?>
                <tr>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['sinhala']; ?></td> 
                  <td>
                    <form method="post" action="<?php echo $url; ?>control-files/sinhala_update.php">
                      <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
                      <input type="hidden" value="<?php echo $table; ?>" name="tb">
                      <input type="text"  name="sinhala_name" placeholder="Name in sinhala" >
                      <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </form>
                  </td>
                  <td><span date-id="<?php echo $row['id']; ?>" data-table="<?php echo $table; ?>" class="badge bg-danger del-row">Remove</span></td>
                </tr>
                <?php
                  }
                ?>
              </tbody>
            </table>
          </div>          
        </div>   
      </div>   
    </div>
  </div>
</div>

<?php include'../../inc/footer.php'; ?>
<script type="text/javascript">
  (function ($) {
      $(".del-row").click(function () {

        var id = $(this).attr('date-id');
        var table = $(this).attr('data-table');
        var diag = $(this).parent().parent();

        $.ajax({
            type: 'POST',
            url: '<?php echo $url; ?>control-files/variables/delete.php',
            data: "id=" + id + "&table=" + table,
            success: function (data) {
                //alert(data);
                //$('#htm').html(data);
                    diag.fadeOut().remove();
            }
        });
    });
  })(jQuery);    
</script>
</body>
</html>
