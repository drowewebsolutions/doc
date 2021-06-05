<?php include'../../config/config.php'; ?>
<?php include'../../inc/header.php'; 

 ?>
  <div class="nes-stat">
    <div class="container">
            <h2>Drag Bundle Bank</h2>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form role="form" action="<?php echo $url; ?>control-files/bulk/bulk-save.php" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Name </label>
                                    <input type="text" class="form-control" name="balik-name" placeholder="Name">
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            </div>
                        </form>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-body p-0">
                            <table class="table table-sm">
                              
                                <?php
                                $result = $db->prepare("SELECT * FROM bulk_medicen ORDER BY id DESC");
                                $result->execute();
                                for ($i = 0; $row = $result->fetch(); $i++) {

                                    $id = $row['id'];
                                    ?>
                                    <tr> 
                                        <td width="150px">
                                             <span style="display: inline-block;vertical-align: top;width: 100px;"><?php echo $row['name']; ?></span>
                                             <form style="display: inline-block;vertical-align: top">
                                                 <input type="text" name="update_dm_name">
                                                 <input type="submit" value="update">
                                             </form>   
                                        </td>
                                        <td width="250px">
                                            <button type="button" class="idbtn alt-btn add-color" data-toggle="modal" data-target="#short_term" data-id="<?php echo $row['id']; ?>">Add Medicine</button> 
                                            <button type="button" class="idbtn alt-btn add-color" data-toggle="modal" data-target="#modal-bulk" data-id="<?php echo $row['id']; ?>">Add Bulk Medicine</button> 
                                            <a class="alt-btn delet-color" href="<?php echo $url; ?>control-files/bulk/bulk-delete.php?id=<?php echo $row['id']; ?>" class="badge bg-danger svg-btn">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <table id="myTable" class="table table-hover text-nowrap ">
                                                <thead>
                                                    <tr>
                                                        <th>Item</th>
                                                        <th>Trade name</th>
                                                        <th>Generic Name</th>
                                                        <th>Form</th>
                                                        <th>Strength</th>
                                                        <th>Route</th>
                                                        <th>Frequency</th>
                                                        <th>Duration</th>
                                                        <th>Indication</th>
                                                        <th>Advice</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="sortable">
                                                <?php
                                                $results = $db->prepare("SELECT * FROM bulk_medicen_prescription where bm_id = $id ORDER BY id asc");
                                                $results->execute();
                                                $r=1;
                                                for($w=0; $rowr = $results->fetch(); $w++){
                                                    ?>
                                                    <tr>
                                                        <td class='coun'><span><?php echo $r++; ?></span></td>
                                                        <td><?php echo explode(",", $rowr['generic_name'])[0]; ?></td>
                                                        <td><?php echo explode(",", $rowr['trade_name'])[0]; ?></td>
                                                        <td><?php echo explode(",", $rowr['form'])[0]; ?></td>
                                                        <td><?php echo explode(",", $rowr['strength'])[0]; ?> <?php echo explode(",", $rowr['unit'])[0]; ?></td>

                                                        <td><?php echo explode(",", $rowr['route'])[0]; ?></td>
                                                        <td><?php echo explode(",", $rowr['frequency'])[0]; ?></td>
                                                        <td><?php echo explode(",", $rowr['duration'])[0]; ?></td>
                                                        <td><?php echo explode(",", $rowr['indication'])[0]; ?></td>
                                                        <td><?php echo explode(",", $rowr['instructions'])[0]; ?></td>
                                                        <td>
                                                            <a href="<?php echo $url; ?>control-files/bulk/bulk-unite-delete.php?id=<?php echo $rowr['id']; ?>&madi=<?php echo $id; ?>" class="badge bg-danger svg-btn"><svg enable-background="new 0 0 384 384" version="1.1" viewBox="0 0 384 384" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="m64 341.33c0 23.574 19.093 42.667 42.667 42.667h170.67c23.573 0 42.666-19.093 42.666-42.667v-256h-256v256z"/><polygon points="266.67 21.333 245.33 0 138.67 0 117.33 21.333 42.667 21.333 42.667 64 341.33 64 341.33 21.333"/></svg></a>
                                                        </td>
                                                    </tr>

                                                <?php  };   ?>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                        </div>
                        <!-- /.card-body -->

                    </div>

                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php  
include'medicen-model.php';
include'add-bulk-medicen-model.php';
include'../../inc/footer.php'; 
?>
<script>
    (function ($) {
        $(".idbtn").click(function () {
            var id = $(this).attr('data-id');
            $('.ids').attr('value', id);
        });

        $('.myTable').DataTable();
    })(jQuery);
</script>
