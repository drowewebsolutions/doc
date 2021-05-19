<!-- Table row -->
<div class="row">
    <div class="col-12 table-responsive">
        <table class="prestable pres-table after_the_other">
            <thead>
              <tr style="display: none">
                  <th  style="display: none"> </th>
                  <th></th>
                  <th>Trade name</th>
                  <th>Generic </th>
                  <th>Form</th>
                  <th>Strength </th>
                  <th>Frequency</th>
                  <th>Duration</th>
                  <th>Route</th>
                  <th>Indication</th>
                  <th>Advice</th>
                  <th>Action</th>
              </tr>
            </thead>
            <tbody class="sortable">
            <?php
            $result = $db->prepare("SELECT * FROM temp_prescription_drugs where category="."'".$step."'"." and user_id=$user_id ORDER BY order_no asc");
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
                    <td><span date-id="<?php echo $row['id']; ?>" data-table="temp_prescription_drugs" class="badge bg-danger del-row">Remove</span></td>
                </tr>
                <?php $r++; };   ?>
            </tbody>
        </table>
    </div>
    <!-- /.col -->
</div>
