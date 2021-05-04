<?php include'../config/config.php'; ?>
<?php include'../inc/header.php'; 
?>

<div class="nes-stat">
  <div class="container">

    <!-- /.row -->
    <div class="row">
     
      <div class="col-12">
        <h1></h1>
        <div class="card">
          
          <div class="row">
            <div class="col-md-6">
              <form role="form" action="<?php echo $url; ?>control-files/variables/save.php?tb=variables_doctor" method="post">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Name </label>
                        <input type="text" class="form-control" name="variables_name" placeholder="Name">
                      </div>
                    </div>
                    <div class="col-md-12">
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
                      $result = $db->prepare("SELECT * FROM variables_doctor ORDER BY id DESC");
                      $result->execute();
                      for($i=0; $row = $result->fetch(); $i++){
                    ?>
                    <tr>
                      <td><?php echo $row['name']; ?></td>
                      <td><?php echo $row['sinhala']; ?></td>
                      <td>
                        <form method="post" action="<?php echo $url; ?>control-files/sinhala_update.php">
                          <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
                          <input type="hidden" value="variables_doctor" name="tb">
                          <input type="text"  name="sinhala_name" placeholder="Name in sinhala" >
                          <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </form>
                      </td>
                      <td><a href="<?php echo $url; ?>control-files/variables/delete.php?id=<?php echo $row['id']; ?>&tb=variables_doctor" class="badge bg-danger">Delete</span></td>
                    </tr>
                    <?php
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-md-6">
              
            </div>
          </div>
                    
        </div>   
      </div>   
    </div>
  </div>
</div>

<?php include'../inc/footer.php'; ?>
</script>
</body>
</html>
