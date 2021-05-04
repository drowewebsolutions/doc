<?php include'../config/config.php'; ?>
<?php include'../inc/header.php'; 

 ?>
  <div class="nes-stat">
    <div class="container">
      <table id="myTable" class="table table-hover text-nowrap">
        <thead>
          <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Birthday</th>
              <th>Gender</th>
              <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
        
            $result = $db->prepare("SELECT * FROM patients_details ORDER BY patients_id DESC");
            $result->execute();
            for($i=0; $row = $result->fetch(); $i++){
          ?>
          <tr>
            <td><?php echo $row['patients_id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['birthday']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td>
            <?php if(isset($_GET['nd'])){ ?>
              <a style="display: inline-block;" href="<?php echo $url; ?>control-files/import_tepm_table.php?id=<?php echo $row['patients_id']; ?>&nd=<?php echo $_GET['nd']; ?>" class="badge btn-primary">add to list</a>
            <?php }; ?>
            <?php if(isset($_GET['cpp'])){ ?>
              <a style="display: inline-block;" href="<?php echo $url; ?>control-files/import_tepm_table.php?id=<?php echo $row['patients_id']; ?>" class="badge btn-primary">Consult Previous Patient</a>
            <?php }; ?>
              <a style="display: inline-block;" href="<?php echo $url; ?>views/history-view.php?id=<?php echo $row['patients_id']; ?>" class="badge btn-primary">Visit History</a>
              <a style="display: inline-block;" href="<?php echo $url; ?>views/update_biodata.php?id=<?php echo $row['patients_id']; ?>" class="badge btn-primary">Update Biodata</a>
              <a style="display: inline-block;" href="<?php echo $url; ?>control-files/remove-patient.php?id=<?php echo $row['patients_id']; ?>" class="badge bg-danger svg-btn"><svg enable-background="new 0 0 384 384" version="1.1" viewBox="0 0 384 384" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="m64 341.33c0 23.574 19.093 42.667 42.667 42.667h170.67c23.573 0 42.666-19.093 42.666-42.667v-256h-256v256z"/><polygon points="266.67 21.333 245.33 0 138.67 0 117.33 21.333 42.667 21.333 42.667 64 341.33 64 341.33 21.333"/></svg></a>
            </td>
          </tr>
          <?php
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
<?php include'../inc/footer.php'; ?>

<script>
(function($) {
$('#myTable').DataTable();
})(jQuery);
</script>
