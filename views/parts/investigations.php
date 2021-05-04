 <div class="modal fade" id="investigations" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <form method="post" action="<?php echo $url; ?>control-files/set-tepm_test.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">INVESTIGATIONS</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-4">
                <label for="exampleInputEmail1">Investigations </label>
                <select class="form-control select2" style="width: 100%;" name="investigations">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                    <option>11</option>
                    <option>12</option>
                    <option>13</option>
                    <option>14</option>
                    <option>15</option>
                    <option>16</option>
                    <option>17</option>
                    <option>18</option>
                    <option>19</option>
                    <option>20</option>
                    <option>21</option>
                    <option>22</option>
                    <option>23</option>
                    <option>24</option>
                    <option>25</option>
                    <option>26</option>
                    <option>27</option>
                  </select>
              </div>
              <div class="col-sm-4">
                <label for="exampleInputEmail1">&nbsp; </label>
                <select class="form-control select2" style="width: 100%;" name="month">
                    <option>Day</option>
                    <option>Days</option>
                    <option>Week</option>
                    <option>Weeks</option>
                    <option>Month</option>
                    <option>Months</option>
                  </select>
              </div>
            </div>
              <div class="row">
            <?php
                $result = $db->prepare("SELECT * FROM variables_test ORDER BY id asc");
                $result->execute();
                $s=0;
                for($i=0; $row = $result->fetch(); $i++){
                $id = $row['id'];
                $r= $s++;

                ?>
                <div class="col-sm-3">
                  <label for="exampleInputEmail1"><?php echo $row['name']; ?> </label>
                  <input type="hidden" value="<?php echo $row['name'].','.$id; ?>" name="test[<?php echo $r; ?>][]">

                  <select class="form-control select2" multiple="multiple" style="width: 100%;" name="test[<?php echo $r; ?>][]">
                    <?php
                      $others_units = $db->prepare("SELECT * FROM variables_test_units where test_id = $id");
                      $others_units->execute();
                      for($i=0; $row_resal = $others_units->fetch(); $i++){
                    ?>
                    <option value="<?php echo $row_resal['name']; ?>,<?php echo $row_resal['id']; ?>"><?php echo $row_resal['name']; ?></option>
                    <?php
                      }
                    ?>
                  </select>
                </div>
                <?php
                  };
                ?>
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