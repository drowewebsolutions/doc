<!-- Table row -->
<div class="row">
  <div class="col-12 table-responsive">
    <table class="prestable pres-table short_term">
      <thead>
      <tr>
          <th>Item</th>
          <th>Trade name</th>
          <th>Generic Name</th>
          <th>Form</th>
          <th>Strength </th>
          <th>Route</th>
          <th>Frequency</th>
          <th>Duration</th>
          <th>Indication</th>
          <th>Advice</th>
          <th>Action</th>
      </tr>
      </thead>
      <tbody class="sortable">
        <?php 
          $result = $db->prepare("SELECT * FROM temp_prescription_drugs where category='short_term' ORDER BY order_no asc");
          $result->execute();
          $r=1;
          $s = 1;
          for($i=0; $row = $result->fetch(); $i++){                   
        ?>
      <tr>
        <td style="display: none" class='coun' data-post-id="<?php echo $r; ?>"><span><?php echo $r; ?></span><span style="display: none;">,<?php  echo $row['id']; ?></span></td>
        <td><?php  if(explode(",", $row['trade_name'])[0] == '--'){}else{ echo $s++;} ?></td>
        <td><?php getsinhala($db,'variables_trade_name',explode(",", $row["trade_name"])[1]); ?></td>
        <td><?php getsinhala($db,'variables_generic_name',explode(",", $row["generic_name"])[1]); ?></td>
        <td><?php getsinhala($db,'variables_form',explode(",", $row["form"])[1]); ?></td>
        <td><?php getsinhala($db,'variables_strength',explode(",", $row["strength"])[1]); ?> <?php getsinhala($db,'variables_unit',explode(",", $row["unit"])[1]); ?></td>
        <td><?php getsinhala($db,'variables_frequency',explode(",", $row["frequency"])[1]); ?></td>
        <td><?php getsinhala($db,'variables_duration',explode(",", $row["duration"])[1]); ?></td>
        <td><?php getsinhala($db,'variables_route',explode(",", $row["route"])[1]); ?></td>
          <td><?php echo explode(",", $row['indication'])[1]; ?></td>
        <td><?php getsinhala($db,'variables_instructions',explode(",", $row["instructions"])[1]); ?></td>
        <td><span date-id="<?php echo $row['id']; ?>" data-table="temp_prescription_drugs" class="badge bg-danger del-row">Remove</span></td>
      </tr>
    <?php $r++; };   ?>
      </tbody>
    </table>
  </div>
  <!-- /.col -->
</div>