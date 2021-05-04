<!-- Table row -->
<div class="row">
  <div class="col-12 table-responsive">
    <table class="prestable pres-table when_needed">
      <tbody class="sortable">
        <?php 
          $result = $db->prepare("SELECT * FROM save_prescription_drugs where category='when_needed' AND prescription_number=$prescription_number ORDER BY order_no asc");
          $result->execute();
          $r=1;
          for($i=0; $row = $result->fetch(); $i++){                   
        ?>
      <tr>
        <td class='coun' data-post-id="<?php echo $r; ?>"><span><?php echo $r; ?></span><span style="display: none;">,<?php  echo $row['id']; ?></span></td>
        <td><?php echo explode(",", $row['trade_name'])[0]; ?></td>
        <td><?php echo explode(",", $row['generic_name'])[0]; ?></td>
        <td><?php echo explode(",", $row['form'])[0]; ?></td>
        <td><?php echo explode(",", $row['strength'])[0]; ?> <?php echo explode(",", $row['unit'])[0]; ?></td>
        <td><?php echo explode(",", $row['frequency'])[0]; ?></td>
        <td><?php echo explode(",", $row['duration'])[0]; ?></td>
          <td><?php echo explode(",", $row['route'])[0]; ?></td>
        <td><?php echo explode(",", $row['indication'])[0]; ?></td>
        <td><?php echo explode(",", $row['instructions'])[0]; ?></td>
        <td><span date-id="<?php echo $row['id']; ?>" data-table="temp_prescription_drugs" class="badge bg-danger del-row svg-btn"><svg enable-background="new 0 0 384 384" version="1.1" viewBox="0 0 384 384" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="m64 341.33c0 23.574 19.093 42.667 42.667 42.667h170.67c23.573 0 42.666-19.093 42.666-42.667v-256h-256v256z"/><polygon points="266.67 21.333 245.33 0 138.67 0 117.33 21.333 42.667 21.333 42.667 64 341.33 64 341.33 21.333"/></svg></span></td>
      </tr>
    <?php $r++; };   ?>
      </tbody>
    </table>
  </div>
  <!-- /.col -->
</div>