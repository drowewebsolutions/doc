  <div class="modal fade" id="short_termpop" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <form method="post" action="<?php echo $url; ?>control-files/set-tepm_prescription.php">
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
        <input type="hidden" name="retunurl" value="<?php echo $retunurl; ?>">
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
                <label class="radio-inline"><input type="radio" class="act-secnd" name="db_catogary" value="after_the_other">Drugs to be taken in step order</label>
            </div>
              <div class="drugs_to_be" style="display:none;">
                  <label class="radio-inline"><input type="radio" name="drugs_to_be" value="1step"> Step 1 </label>
                  <label class="radio-inline"><input type="radio" name="drugs_to_be" value="2step"> Step 2 </label>
                  <label class="radio-inline"><input type="radio" name="drugs_to_be" value="3step">Step 3 </label>
                  <label class="radio-inline"><input type="radio" name="drugs_to_be" value="4step">Step 4 </label>
                  <label class="radio-inline"><input type="radio" name="drugs_to_be" value="5step">Step 5 </label>
                  <label class="radio-inline"><input type="radio" name="drugs_to_be" value="6step">Step 6 </label>
                  <label class="radio-inline"><input type="radio" name="drugs_to_be" value="7step">Step 7 </label>
              </div>
            <div class="row">
              <div class="col-sm-2">
                <label for="exampleInputEmail1">Generic name </label>
                <select class="form-control select2" style="width: 100%;" name="generic_name">

                  <?php option_dropdown($db,'variables_generic_name'); ?>
                </select>
              </div>

              <div class="col-sm-2">
                <label for="exampleInputEmail1">Trade name</label>
                <select class="form-control select2" style="width: 100%;" name="trade_name">

                  <?php option_dropdown($db,'variables_trade_name'); ?>
                </select>
              </div>
              <div class="col-sm-2">
                <label for="exampleInputEmail1">Form</label>
                <select class="form-control select2" style="width: 100%;" name="variables_form">

                  <?php option_dropdown($db,'variables_form'); ?>
                </select>
              </div>
     
              <div class="col-sm-2">
                <label for="exampleInputEmail1">Strength</label>
                <select class="form-control select2" style="width: 100%;" name="variables_strength">

                   <?php option_dropdown($db,'variables_strength'); ?>
                </select>
              </div>

              <div class="col-sm-2">
                <label for="exampleInputEmail1">Unit</label>
                <select class="form-control select2" style="width: 100%;" name="variables_unit">

                   <?php option_dropdown($db,'variables_unit'); ?>
                </select>
              </div>


              <div class="col-sm-2">
                <label for="exampleInputEmail1">Route</label>
                <select class="form-control select2" style="width: 100%;" name="variables_route">

                   <?php option_dropdown($db,'variables_route'); ?>
                </select>
              </div>

              <div class="col-sm-2">
                <label for="exampleInputEmail1">Frequency</label>
                <select class="form-control select2" style="width: 100%;" name="variables_frequency">

                   <?php option_dropdown($db,'variables_frequency'); ?>
                </select>
              </div>

              <div class="col-sm-2">
                  <label for="exampleInputEmail1">Duration</label>
                  <select class="form-control select2" style="width: 100%;" name="variables_duration">

                      <?php option_dropdown($db,'variables_duration'); ?>
                  </select>
              </div>

              <div class="col-sm-2">
                <label for="exampleInputEmail1">Indication</label>
                <select class="form-control select2" style="width: 100%;" name="variables_indication">

                   <?php option_dropdown($db,'variables_indication'); ?>
                </select>
              </div>

              <div class="col-sm-2">
                <label for="exampleInputEmail1">Instructions</label>
                <select class="form-control select2" style="width: 100%;" name="variables_instructions">

                   <?php option_dropdown($db,'variables_instructions'); ?>
                </select>
              </div>

            </div>
            <br>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name='set' value="1" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Set Prescription list</label>
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