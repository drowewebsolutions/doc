<div class="modal fade" id="modal-bulk" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form method="post" action="<?php echo $url; ?>control-files/set-hist_blk-prescription.php">
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
                        <label class="radio-inline"><input type="radio" name="db_catogary" value="short_term" checked>
                            Short term</label>
                        <label class="radio-inline"><input type="radio" name="db_catogary" value="long_term"> Long term</label>
                        <label class="radio-inline"><input type="radio" name="db_catogary" value="when_needed"> Drugs to
                            be used only when needed</label>
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
                            <table class="pres-table">
                                <thead>
                                <tr>
                                    <th></th>
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
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $result = $db->prepare("SELECT * FROM prescription_bluk_drugs ORDER BY id asc");
                                $result->execute();
                                $r = 1;
                                for ($i = 0; $row = $result->fetch(); $i++) {
                                    ?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="set[<?php echo $i; ?>][id]"
                                                   value="<?php echo $row['id']; ?>" id="exampleCheck1">
                                        </td>
                                        <td>
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

                                        <td><a class="badge bg-danger svg-btn"
                                               href="<?php echo $url; ?>control-files/remove-set-blk-prescription.php?id=<?php echo $row['id']; ?>&patients_id=<?php echo $user_id; ?>"><svg enable-background="new 0 0 384 384" version="1.1" viewBox="0 0 384 384" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="m64 341.33c0 23.574 19.093 42.667 42.667 42.667h170.67c23.573 0 42.666-19.093 42.666-42.667v-256h-256v256z"/><polygon points="266.67 21.333 245.33 0 138.67 0 117.33 21.333 42.667 21.333 42.667 64 341.33 64 341.33 21.333"/></svg></a>
                                        </td>
                                    </tr>
                                <?php }; ?>
                                </tbody>
                            </table>
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