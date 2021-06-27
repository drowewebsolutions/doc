 <div class="modal fade" id="investigations" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <form method="post" action="<?php echo $url; ?>control-files/set-tepm_test.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="retunurl" value="<?php echo $retunurl; ?>">
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
              <br>
            <?php
                $result = $db->prepare("SELECT * FROM variables_test ORDER BY id asc");
                $result->execute();
                $s=0;
                for($i=0; $row = $result->fetch(); $i++){
                $id = $row['id'];
                $r= $s++;

                ?> 
                
                <div class="dinamic">
                  <div class="row">
                    <div class="col-sm-2">
                      <input type="hidden" name="test_cat[<?php echo $r; ?>]" value="<?php echo $row['name'],',',$row['id']; ?>">
                      <input type="checkbox" class="mychek" name="das" value="1">
                      <input type="hidden" name="abndl[]" class="check" value="0">
                      <label style="font-size: 12px;">Add Bundle</label>
                    </div>
                    <div class="col-sm-4">
                      <label for="exampleInputEmail1"><?php echo $row['name']; ?> </label>
                      <select class="form-control select2" style="width: 100%;" name="test[<?php echo $r; ?>][]" multiple="multiple">
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
                    <div class="col-sm-4">
                      <label for="exampleInputEmail1">Indications </label>
                      <select class="form-control select2" style="width: 100%;" name="indications[<?php echo $r; ?>][]" multiple="multiple">
                        <?php
                          $others_tn = $db->prepare("SELECT * FROM variables_test_indications where test_id = $id");
                          $others_tn->execute();
                          for($i=0; $row_tn = $others_tn->fetch(); $i++){
                        ?>
                        <option value="<?php echo $row_tn['name']; ?>,<?php echo $row_tn['id']; ?>"><?php echo $row_tn['name']; ?></option>
                        <?php
                          }
                        ?>
                      </select>
                    </div>
                    <div class="col-sm-1 indications-col">
                      <span class="indications adbtn" data-id="row1<?php echo $r; ?>">+</span> 
                    </div>
                  </div>
                  <div class="row row1<?php echo $r; ?>" style="display: none;">
                    <div class="col-sm-2">
                      <input type="hidden" name="test_cat[<?php echo $r; ?>]" value="<?php echo $row['name'],',',$row['id']; ?>">
                    </div>
                    <div class="col-sm-4">
                      <label for="exampleInputEmail1"><?php echo $row['name']; ?> </label>
                      <select class="form-control select2" style="width: 100%;" name="test[<?php echo $r; ?>][]" multiple="multiple">
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
                    <div class="col-sm-4">
                      <label for="exampleInputEmail1">Indications </label>
                      <select class="form-control select2" style="width: 100%;" name="indications[<?php echo $r; ?>][]" multiple="multiple">
                        <?php
                          $others_tn = $db->prepare("SELECT * FROM variables_test_indications where test_id = $id");
                          $others_tn->execute();
                          for($i=0; $row_tn = $others_tn->fetch(); $i++){
                        ?>
                        <option value="<?php echo $row_tn['name']; ?>,<?php echo $row_tn['id']; ?>"><?php echo $row_tn['name']; ?></option>
                        <?php
                          }
                        ?>
                      </select>
                    </div>
                    <div class="col-sm-1 indications-col">
                      <span class="indications adbtn" data-id="row2<?php echo $r; ?>">+</span> <span class="indications rmubtn">-</span>
                    </div>
                  </div>
                  <div class="row row2<?php echo $r; ?>" style="display: none;">
                    <div class="col-sm-2">
                      <input type="hidden" name="test_cat[<?php echo $r; ?>]" value="<?php echo $row['name'],',',$row['id']; ?>">
                    </div>
                    <div class="col-sm-4">
                      <label for="exampleInputEmail1"><?php echo $row['name']; ?> </label>
                      <select class="form-control select2" style="width: 100%;" name="test[<?php echo $r; ?>][]" multiple="multiple">
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
                    <div class="col-sm-4">
                      <label for="exampleInputEmail1">Indications </label>
                      <select class="form-control select2" style="width: 100%;" name="indications[<?php echo $r; ?>][]" multiple="multiple">
                        <?php
                          $others_tn = $db->prepare("SELECT * FROM variables_test_indications where test_id = $id");
                          $others_tn->execute();
                          for($i=0; $row_tn = $others_tn->fetch(); $i++){
                        ?>
                        <option value="<?php echo $row_tn['name']; ?>,<?php echo $row_tn['id']; ?>"><?php echo $row_tn['name']; ?></option>
                        <?php
                          }
                        ?>
                      </select>
                    </div>
                    <div class="col-sm-1 indications-col">
                      <span class="indications adbtn" data-id="row3<?php echo $r; ?>">+</span> <span class="indications rmubtn">-</span>
                    </div>
                  </div>
                  <div class="row row3<?php echo $r; ?>" style="display: none;">
                    <div class="col-sm-2">
                      <input type="hidden" name="test_cat[<?php echo $r; ?>]" value="<?php echo $row['name'],',',$row['id']; ?>">
                    </div>
                    <div class="col-sm-4">
                      <label for="exampleInputEmail1"><?php echo $row['name']; ?> </label>
                      <select class="form-control select2" style="width: 100%;" name="test[<?php echo $r; ?>][]" multiple="multiple">
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
                    <div class="col-sm-4">
                      <label for="exampleInputEmail1">Indications </label>
                      <select class="form-control select2" style="width: 100%;" name="indications[<?php echo $r; ?>][]" multiple="multiple">
                        <?php
                          $others_tn = $db->prepare("SELECT * FROM variables_test_indications where test_id = $id");
                          $others_tn->execute();
                          for($i=0; $row_tn = $others_tn->fetch(); $i++){
                        ?>
                        <option value="<?php echo $row_tn['name']; ?>,<?php echo $row_tn['id']; ?>"><?php echo $row_tn['name']; ?></option>
                        <?php
                          }
                        ?>
                      </select>
                    </div>
                    <div class="col-sm-1 indications-col">
                      <span class="indications adbtn" data-id="row4<?php echo $r; ?>">+</span> <span class="indications rmubtn">-</span>
                    </div>
                  </div>
                  <div class="row row4<?php echo $r; ?>" style="display: none;">
                    <div class="col-sm-2">
                      <input type="hidden" name="test_cat[<?php echo $r; ?>]" value="<?php echo $row['name'],',',$row['id']; ?>">
                    </div>
                    <div class="col-sm-4">
                      <label for="exampleInputEmail1"><?php echo $row['name']; ?> </label>
                      <select class="form-control select2" style="width: 100%;" name="test[<?php echo $r; ?>][]" multiple="multiple">
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
                    <div class="col-sm-4">
                      <label for="exampleInputEmail1">Indications </label>
                      <select class="form-control select2" style="width: 100%;" name="indications[<?php echo $r; ?>][]" multiple="multiple">
                        <?php
                          $others_tn = $db->prepare("SELECT * FROM variables_test_indications where test_id = $id");
                          $others_tn->execute();
                          for($i=0; $row_tn = $others_tn->fetch(); $i++){
                        ?>
                        <option value="<?php echo $row_tn['name']; ?>,<?php echo $row_tn['id']; ?>"><?php echo $row_tn['name']; ?></option>
                        <?php
                          }
                        ?>
                      </select>
                    </div>
                    <div class="col-sm-1 indications-col">
                      <span class="indications adbtn">+</span> <span class="indications rmubtn">-</span>
                    </div>
                  </div>

                </div>
                <?php
                  };
                ?>
           
          </div>
          <div class="modal-footer justify-content-between">                         
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
      </div>
    </form>
    </div>
  </div>

