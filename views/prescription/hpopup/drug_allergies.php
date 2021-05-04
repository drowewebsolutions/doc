 <div class="modal fade" id="drug_allergies" aria-hidden="true">
    <div class="modal-dialog">
      <form method="post" action="<?php echo $url; ?>control-files/set-tepm_drug_allergies.php">
        <input type="hidden" name="id" value="<?php echo $user_id; ?>">
        <input type="hidden" name="retunurl" value="<?php echo $retunurl; ?>">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Drug Allergies</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
             <div class="row">
                <div class="col-sm-12">
                    <label for="exampleInputEmail1">Allergies </label>
                    <select class="form-control select2" style="width: 100%;" name="drugs">
                        <?php
                        $variables_doctor = $db->prepare("SELECT * FROM variables_generic_name");
                        $variables_doctor->execute();
                        for($i=0; $row_resal = $variables_doctor->fetch(); $i++){
                            ?>
                            <option value="<?php echo $row_resal['name']; ?>"><?php echo $row_resal['name']; ?></option>
                            <?php
                        } ?>
                    </select>
                </div>
            </div>
          </div>
          </div>
          <div class="modal-footer justify-content-between">                         
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
      </div>
    </form>
    </div>
  </div>