<?php 
  include'../config/config.php';
  $ilid = $_POST['id'];
?>
<div class="row">
    <div class="col-12 table-responsive">
    	<?php echo $ilid; ?>
        <table class="pres-table">
            <thead>
            <tr>
                <th>Trade name</th>
                <th>Generic Name</th>
                <th>Form</th>
                <th>Strength</th>
                <th>Unit</th>
                <th>Route</th>
                <th>Frequency</th>
                <th>Duration</th>
                <th>Indication</th>
                <th>Advice</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $result = $db->prepare("SELECT * FROM bulk_medicen_prescription where bm_id=$ilid ORDER BY id asc");
            $result->execute();
            $r = 1;
            for ($i = 0; $row = $result->fetch(); $i++) {
                ?>
                <tr>
                   
                       
                    
                    <td>
                    	 <input type="hidden" name="set[<?php echo $i; ?>][id]"
                               value="<?php echo $row['id']; ?>" id="exampleCheck1">
                        <input type="hidden" name="set[<?php echo $i; ?>][trade_name]"
                               value="<?php echo $row['trade_name']; ?>">
                        <?php echo explode(",", $row['trade_name'])[0]; ?>
                    </td>
                    <td>
                        <input type="hidden" name="set[<?php echo $i; ?>][generic_name]"
                               value="<?php echo $row['generic_name']; ?>">
                        <?php echo explode(",", $row['generic_name'])[0]; ?>
                    </td>
                    <td>
                        <select class="form-control select2" style="width: 100%;"
                                name="set[<?php echo $i; ?>][variables_form]">
                            <option value="<?php echo $row['form']; ?>"><?php echo explode(",", $row['form'])[0]; ?></option>
                            <?php option_dropdown($db, 'variables_form'); ?>
                        </select>
                    </td>

                    <td>
                        <select class="form-control select2" style="width: 100%;"
                                name="set[<?php echo $i; ?>][variables_strength]">
                            <option value="<?php echo $row['strength']; ?>"><?php echo explode(",", $row['strength'])[0]; ?></option>
                            <?php option_dropdown($db, 'variables_strength'); ?>
                        </select>
                    </td>

                    <td>
                        <select class="form-control select2" style="width: 100%;"
                                name="set[<?php echo $i; ?>][variables_unit]">
                            <option value="<?php echo $row['unit']; ?>"><?php echo explode(",", $row['unit'])[0]; ?></option>
                            <?php option_dropdown($db, 'variables_unit'); ?>
                        </select>
                    </td>

                    <td>
                        <select class="form-control select2" style="width: 100%;"
                                name="set[<?php echo $i; ?>][variables_route]">
                            <option value="<?php echo $row['route']; ?>"><?php echo explode(",", $row['route'])[0]; ?></option>
                            <?php option_dropdown($db, 'variables_route'); ?>
                        </select>
                    </td>

                    <td>
                        <select class="form-control select2" style="width: 100%;"
                                name="set[<?php echo $i; ?>][variables_frequency]">
                            <option value="<?php echo $row['frequency']; ?>"><?php echo explode(",", $row['frequency'])[0]; ?></option>
                            <?php option_dropdown($db, 'variables_frequency'); ?>
                        </select>
                    </td>


                    <td>
                        <select class="form-control select2" style="width: 100%;"  name="set[<?php echo $i; ?>][variables_duration]">
                            <option value="<?php echo $row['duration']; ?>"><?php echo explode(",", $row['duration'])[0]; ?></option>
                            <?php option_dropdown($db, 'variables_duration'); ?>
                        </select>
                    </td>

                    <td>
                        <select class="form-control select2" style="width: 100%;"
                                name="set[<?php echo $i; ?>][variables_indication]">
                            <option value="<?php echo $row['indication']; ?>"><?php echo explode(",", $row['indication'])[0]; ?></option>
                            <?php option_dropdown($db, 'variables_indication'); ?>
                        </select>
                    </td>

                    <td>
                        <select class="form-control select2" style="width: 100%;"
                                name="set[<?php echo $i; ?>][variables_instructions]">
                            <option value="<?php echo $row['instructions']; ?>"><?php echo explode(",", $row['instructions'])[0]; ?></option>
                            <?php option_dropdown($db, 'variables_instructions'); ?>
                        </select>
                    </td>

                    
                </tr>
            <?php }; ?>
            </tbody>
        </table>
    </div>
</div>