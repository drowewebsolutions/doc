<?php include'../../config/config.php'; ?>
<?php include'../../inc/header.php'; 
?>

  <div class="nes-statr">
    <section class="content">
      <div class="container">
        <table class="test-table">
          <form role="form" action="<?php echo $url; ?>control-files/test-save.php" method="post">
          <tr>
            <td>
              <table>
                <tr>
                  <td width="15%">English</td>
                  <td><input type="text" class="form-control" name="variables_name" placeholder="Name"></td>
                  <td width="15%">Sinhala</td>
                  <td><input type="text" class="form-control" name="variables_name_sinhala" placeholder="Name in sinhala" ></td>
                  <td width="70px"><button type="submit" class="btn btn-primary btn-sm">Submit</button></td>
                </tr>
                <tr>
                  <td width="15%">
                    Special instruction
                  </td>
                  <td>
                    <textarea name="special_instruction" class="form-control"></textarea>
                  </td>
                  <td width="15%">Special instruction Sinhala</td>
                  <td>
                    <textarea name="special_instruction_sinhala"  class="form-control"></textarea>
                  </td>
                  <td></td>
                </tr>
              </table>
            </td>
            
          </tr>
        </form>
      </table>
       <table class="test-table">
        <tr>
          <th width="50%">
            <table>
              <tr>
                <td width="15%">Investingation Category</td>
                <td width="35%">Patients Instructions</td>
              </tr>
            </table>
          </th>
          <th width="20%">Investingation Tests</th>
          <th width="30%">Indications</th>
        </tr>
          <?php
              $result = $db->prepare("SELECT * FROM variables_test ORDER BY id DESC");
              $result->execute();
              for($i=0; $row = $result->fetch(); $i++){
                $test_id = $row['id'];
            ?>
            <tr>
              <td >
                <table>
                  <tr>
                    <td>
                      <a href="<?php echo $url; ?>views/drug-variables/test-alter.php?id=<?php echo $row['id']; ?>" class="badge">Alter</a> | <a href="<?php echo $url; ?>control-files/test-delete.php?id=<?php echo $row['id']; ?>&tb=variables_test" class="badge">Delete</a>
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <td colspan="2"><?php echo $row['name']; ?></td>
                    <td><?php echo $row['special_instruction']; ?></td>
                  </tr>
                  <tr>
                    <td colspan="2"><?php echo $row['sinhala']; ?></td>
                     <td><?php echo $row['special_instruction_sinhala']; ?></td>
                  </tr>
                </table>
                
              </td>
             
              <td >
                <table>
                  <tr>
                    <td colspan="2">
                       <form role="form" action="<?php echo $url; ?>control-files/test-value-save.php" method="post">
                        <div>
                          <?php $test_id = $row['id']; ?>
                          <br>
                          <div class="form-group">
                            <input type="hidden" value="<?php echo $row['id']; ?>" name="test_id">
                            <input width="90%" type="text" class="form-control fmsina" name="variables_name" placeholder="Name">
                            <button type="submit" class="btn btn-primary btn-sm">></button>
                          </div>
                        </div>
                      </form>
                    </td>
                    </tr>
                  <?php
                    $result_variables_test = $db->prepare("SELECT * FROM variables_test_units where test_id =$test_id");
                    $result_variables_test->execute();
                    for($i=0; $row_vt = $result_variables_test->fetch(); $i++){
                  ?>
                  <tr>
                    <td><?php echo $row_vt['name']; ?></td>
                    <td width="70px"><a href="<?php echo $url; ?>control-files/test-delete.php?id=<?php echo $row_vt['id']; ?>&tb=variables_test_units" class="badge bg-danger svg-btn"><svg enable-background="new 0 0 384 384" version="1.1" viewBox="0 0 384 384" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="m64 341.33c0 23.574 19.093 42.667 42.667 42.667h170.67c23.573 0 42.666-19.093 42.666-42.667v-256h-256v256z"/><polygon points="266.67 21.333 245.33 0 138.67 0 117.33 21.333 42.667 21.333 42.667 64 341.33 64 341.33 21.333"/></svg></a></td>
                  </tr>
                  <?php
                    }
                  ?>
                </table>
              </td>
              <td>
                <table>
                  <tr>
                    <td colspan="2">
                       <form role="form" action="<?php echo $url; ?>control-files/test_indications-save.php" method="post">
                        <div>
                          <?php $test_id = $row['id']; ?>
                          <br>
                          <div class="form-group">
                            <input type="hidden" value="<?php echo $row['id']; ?>" name="test_id">
                            <input width="90%" type="text" class="form-control fmsina" name="test_indications" placeholder="Indications">
                            <button type="submit" class="btn btn-primary btn-sm">></button>
                          </div>
                        </div>
                      </form>
                    </td>
                    </tr>
                  <?php
                    $result_variables_test = $db->prepare("SELECT * FROM variables_test_indications where test_id =$test_id");
                    $result_variables_test->execute();
                    for($i=0; $row_vt = $result_variables_test->fetch(); $i++){
                  ?>
                  <tr>
                    <td><?php echo $row_vt['name']; ?></td>
                    <td width="70px"><a href="<?php echo $url; ?>control-files/test-delete.php?id=<?php echo $row_vt['id']; ?>&tb=variables_test_indications" class="badge bg-danger svg-btn"><svg enable-background="new 0 0 384 384" version="1.1" viewBox="0 0 384 384" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="m64 341.33c0 23.574 19.093 42.667 42.667 42.667h170.67c23.573 0 42.666-19.093 42.666-42.667v-256h-256v256z"/><polygon points="266.67 21.333 245.33 0 138.67 0 117.33 21.333 42.667 21.333 42.667 64 341.33 64 341.33 21.333"/></svg></a></td>
                  </tr>
                  <?php
                    }
                  ?>
                </table>
              </td>
            </tr>
            <?php
              }
            ?>
          </form>
        </table>
        <!-- /.row -->
        
    
        <!-- /.row -->
      </div>
    </section>
  </div>
<?php include'../../inc/footer.php'; ?>
<script>
  (function($) {
    $('#myTable').DataTable();
})(jQuery);
</script>
</body>
</html>
