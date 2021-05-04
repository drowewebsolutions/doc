<?php include'../../config/config.php'; ?>
<?php include'../../inc/header.php'; 
$id = $_GET['id'];
$pat_chck_slq = "SELECT * FROM variables_test WHERE `id`="."'".$id."'";
$pat_chck_result = $db->query($pat_chck_slq)->fetch();

?>

  <div class="nes-statr">
    <section class="content">
      <div class="container">
        <table class="test-table">
          <form role="form" action="<?php echo $url; ?>control-files/test-update.php" method="post">
            <input type="hidden"  name="id" value="<?php echo $id; ?>">
          <tr>
            <td>
              <table>
                <tr>
                  <td width="15%">English</td>
                  <td><input type="text" class="form-control" name="variables_name" placeholder="Name" value="<?php echo $pat_chck_result['name']; ?>"></td>
                  <td width="15%">Sinhala</td>
                  <td><input type="text" class="form-control" name="variables_name_sinhala" placeholder="Name in sinhala" value="<?php echo $pat_chck_result['sinhala']; ?>"></td>
                  <td width="70px"><button type="submit" class="btn btn-primary btn-sm">Submit</button></td>
                </tr>
                <tr>
                  <td width="15%">
                    Special instruction
                  </td>
                  <td>
                    <textarea name="special_instruction" class="form-control"><?php echo $pat_chck_result['special_instruction']; ?></textarea>
                  </td>
                  <td width="15%">Special instruction Sinhala</td>
                  <td>
                    <textarea name="special_instruction_sinhala"  class="form-control"><?php echo $pat_chck_result['special_instruction_sinhala']; ?></textarea>
                  </td>
                  <td></td>
                </tr>
              </table>
            </td>
            
          </tr>
        </form>
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
