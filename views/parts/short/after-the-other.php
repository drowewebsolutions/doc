<!-- Table row -->
<div class="row">
  <div class="col-12 table-responsive">
    <table class="prestable pres-table after_the_other">
      <thead> 
      <tr>
        <th width="2%">Item</th>
        <th width="10%">Trade name</th>
        <th width="10%">Generic Name</th>
        <th width="14%">Form</th>
        <th width="6%">Strength </th>
        <th width="5%">Route</th>
        <th width="9%">Frequency</th>
        <th width="6%">Duration</th>
        <th width="11%">Indication</th>
        <th width="17%">Advice</th>
        <th width="10%">Action</th>
      </tr>
      </thead>
      <tbody class="sortable">
        <?php 
          $result = $db->prepare("SELECT * FROM temp_prescription_drugs where category='after_the_other' ORDER BY order_no asc");
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
        <td><?php echo explode(",", $row['route'])[0]; ?></td>
        <td><?php //echo explode(",", $row['frequency'])[0]; ?>4 times a day</td>
        <td><?php echo explode(",", $row['duration'])[0]; ?></td>
        <td><?php echo explode(",", $row['indication'])[0]; ?></td>
        <td><?php echo explode(",", $row['instructions'])[0]; ?></td>
        <td><span class="badge bg-danger del-row" date-id="<?php echo $row['id']; ?>">Remove</span></td>
      </tr>
    <?php $r++; };   ?>
      </tbody>
    </table>
  </div>
  <!-- /.col -->
</div>
