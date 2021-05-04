  <div class="modal fade" id="modal-bulk2" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <form method="post" action="<?php echo $url; ?>control-files/set-tepm_blk-prescription-ilnes.php">
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
        <input type="hidden" class="db_catogary" value="short_term" name="category">
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
                <div class="col-12 table-responsive">
                  <select class="form-control select2" style="width: 100%;" id="ilness" name="ilness">
                  <?php option_dropdown($db,'bulk_medicen'); ?>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-12 table-responsive" id="hastm">
                </div>
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