  <div class="modal fade" id="modal-bulk" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <form method="post" action="<?php echo $url; ?>control-files/set-tepm_blk-prescription.php">
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Medicine</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body"> 
            <div class="term-row">
              <label class="radio-inline"><input type="radio" name="db_catogary" value="short_term" checked> Short term</label>
              <label class="radio-inline"><input type="radio" name="db_catogary" value="long_term"> Long term</label>
              <label class="radio-inline"><input type="radio" name="db_catogary" value="when_needed"> Drugs to be used only when needed</label>
              <label class="radio-inline"><input type="radio" name="db_catogary" value="after_the_other">Drugs to be taken one after the other</label>
            </div>
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="pres-table">
                    <thead>
                    <tr>
                    <th>Select</th>
                      <th>Trade name</th>
                      <th>Generic Name</th>
                      <th>Form</th>
                      <th>Strength</th>
                      <th>Unit</th>
                      <th>Route</th>
                      <th>Frequency</th>
                      <!-- <th>Duration numbers</th> -->
                      <th>Duration</th>
                      <th>Indication</th>
                      <th>Advice</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $result = $db->prepare("SELECT * FROM prescription_bluk_drugs ORDER BY id asc");
                        $result->execute();
                        $r=1;
                        for($i=0; $row = $result->fetch(); $i++){
                      ?>
                    <tr>
                      <td>
                        <input type="checkbox" name="set[<?php echo $i; ?>][id]" value="<?php echo $row['id']; ?>" id="exampleCheck1">
                      </td>
                      <td>
                        <input type="hidden" name="set[<?php echo $i; ?>][trade_name]" value="<?php echo $row['trade_name']; ?>">
                        <?php echo explode(",", $row['trade_name'])[0]; ?>
                      </td>
                      <td>
                        <input type="hidden" name="set[<?php echo $i; ?>][generic_name]" value="<?php echo $row['generic_name']; ?>">
                        <?php echo explode(",", $row['generic_name'])[0]; ?>
                      </td>
                      <td>
                        <select class="form-control select2" style="width: 100%;" name="set[<?php echo $i; ?>][variables_form]">
                          <option value="<?php echo $row['form']; ?>"><?php echo explode(",", $row['form'])[0]; ?></option>
                        <?php option_dropdown($db,'variables_form'); ?>
                        </select>
                      </td>

                      <td>
                        <select class="form-control select2" style="width: 100%;" name="set[<?php echo $i; ?>][variables_strength]">
                          <option value="<?php echo $row['strength']; ?>"><?php echo explode(",", $row['strength'])[0]; ?></option>
                        <?php option_dropdown($db,'variables_strength'); ?>
                        </select>
                      </td>

                      <td>
                        <select class="form-control select2" style="width: 100%;" name="set[<?php echo $i; ?>][variables_unit]">
                          <option value="<?php echo $row['unit']; ?>"><?php echo explode(",", $row['unit'])[0]; ?></option>
                        <?php option_dropdown($db,'variables_unit'); ?>
                        </select>
                      </td>

                      <td>
                        <select class="form-control select2" style="width: 100%;" name="set[<?php echo $i; ?>][variables_route]">
                          <option value="<?php echo $row['route']; ?>"><?php echo explode(",", $row['route'])[0]; ?></option>
                        <?php option_dropdown($db,'variables_route'); ?>
                        </select>
                      </td>

                      <td>
                        <select class="form-control select2" style="width: 100%;" name="set[<?php echo $i; ?>][variables_frequency]">
                          <option value="<?php echo $row['frequency']; ?>"><?php echo explode(",", $row['frequency'])[0]; ?></option>
                        <?php option_dropdown($db,'variables_frequency'); ?>
                        </select>
                      </td>

                      <!-- <td>
                        <select class="form-control select2" style="width: 100%;" name="set[<?php echo $i; ?>][variables_duration]">
                          <option value="<?php echo $row['duration']; ?>"><?php echo explode(",", $row['duration'])[0]; ?></option>
                        <?php option_dropdown($db,'variables_duration'); ?>
                        </select>
                      </td> -->
                      <td>
                        <select class="form-control select2" style="width: 100%;" name="set[<?php echo $i; ?>][variables_duration_date]">
                          
                          <option><?php
                        $sum = 0;
                        for($i = 1; $i<=30; $i++) {
                            $sum = $sum + $i;
                            echo $sum; 
                        }
                           
                        ?></option>
                        </select>
                        <select class="form-control select2" style="width: 100%;" name="set[<?php echo $i; ?>][variables_duration]">
                          <option value="<?php echo $row['duration']; ?>"><?php echo explode(",", $row['duration'])[0]; ?></option>
                        <?php option_dropdown($db,'variables_duration'); ?>
                        </select>
                      </td>

                      <td>
                        <select class="form-control select2" style="width: 100%;" name="set[<?php echo $i; ?>][variables_indication]">
                          <option value="<?php echo $row['indication']; ?>"><?php echo explode(",", $row['indication'])[0]; ?></option>
                        <?php option_dropdown($db,'variables_indication'); ?>
                        </select>
                      </td>

                      <td>
                        <select class="form-control select2" style="width: 100%;" name="set[<?php echo $i; ?>][variables_instructions]">
                          <option value="<?php echo $row['instructions']; ?>"><?php echo explode(",", $row['instructions'])[0]; ?></option>
                        <?php option_dropdown($db,'variables_instructions'); ?>
                        </select>
                      </td>

                      <td><a class="badge bg-danger" href="<?php echo $url; ?>control-files/remove-set-blk-prescription.php?id=<?php echo $row['id']; ?>&patients_id=<?php echo $user_id; ?>">Remove</a></td>
                    </tr>
                  <?php };   ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
          </div>
          <div class="modal-footer justify-content-between">                         
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add to Prescription</button>
          </div>
        </div>
      </form>
    </div>
  </div> 