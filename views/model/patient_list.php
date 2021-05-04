  <div class="modal fade" id="patient_list" aria-hidden="true">
    <div class="modal-dialog">
      <form method="post" action="<?php echo $url; ?>control-files/add-medicine_center.php">
        
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Add Medicine Center</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            
            <div class="row">
                            
              <div class="col-sm-12">
                <label for="exampleInputEmail1">Session</label>
                <select name="time" class="form-control" required>
                    <?php
                    $start=strtotime('00:00');
                    $end=strtotime('24:00');

                    for ($i=$start;$i<=$end;$i = $i + 15*60)
                    {

                        //write your if conditions and implement your logic here

                        echo "<option>".date('g:i A',$i)."</option>";

                    }
                    ?>
                </select>
                <input type="hidden" value="<?php echo $medicine_center; ?>" name="medicine_center">
              </div>

            </div>
          </div>
          <div class="modal-footer justify-content-between">                         
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div> 