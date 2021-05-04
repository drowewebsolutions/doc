<!-- Table row -->
<div class="row">
  <div class="col-12 table-responsive">
    <table class="prestable pres-table when_needed">
      <tbody class="sortable">
        <?php 
          $result = $db->prepare("SELECT * FROM histy_prescription_drugs where category='when_needed' and user_id=$user_id ORDER BY order_no asc");
          $result->execute();
          $r=1;
        $s = 1;
          for($i=0; $row = $result->fetch(); $i++){                   
        ?>
      <tr>
        <td style="display: none" class='coun' data-post-id="<?php echo $r; ?>"><span><?php echo $r; ?></span><span style="display: none;">,<?php  echo $row['id']; ?></span></td>
          <td><?php  if(explode(",", $row['trade_name'])[0] == '--'){}else{ echo $s++;} ?></td>
        <td><?php echo explode(",", $row['trade_name'])[0]; ?></td>
        <td><?php echo explode(",", $row['generic_name'])[0]; ?></td>
        <td><?php echo explode(",", $row['form'])[0]; ?></td>
        <td><?php echo explode(",", $row['strength'])[0]; ?> <?php echo explode(",", $row['unit'])[0]; ?></td>
        <td><?php echo explode(",", $row['frequency'])[0]; ?></td>
        <td><?php echo explode(",", $row['duration'])[0]; ?></td>
          <td><?php echo explode(",", $row['route'])[0]; ?></td>
        <td><?php echo explode(",", $row['indication'])[0]; ?></td>
        <td><?php echo explode(",", $row['instructions'])[0]; ?></td>
        <td><span date-id="<?php echo $row['id']; ?>" data-table="histy_prescription_drugs" class="badge bg-danger del-row">Remove</span></td>
      </tr>
    <?php $r++; };   ?>
      </tbody>
    </table>
  </div>
  <!-- /.col -->
</div>