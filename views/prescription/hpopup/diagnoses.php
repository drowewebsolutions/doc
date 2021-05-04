<div class="modal fade" id="diagnoses" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form method="post" action="<?php echo $url; ?>control-files/set-hist_diagnoses.php">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="retunurl" value="<?php echo $retunurl; ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Diagnoses</h4>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4 set-minwith">
                            <label for="exampleInputEmail1">Diagnoses </label>
                            <select class="form-control select2 "  multiple="multiple"
                                    name="diagnoses[]">
                                <?php
                                $result = $db->prepare("SELECT * FROM variables_diagnoses ORDER BY id asc");
                                $result->execute();
                                $r = 1;
                                for ($g = 0; $row = $result->fetch(); $g++) { ?>
                                    <option><?php echo $row['name']; ?></option>
                                <?php }; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>