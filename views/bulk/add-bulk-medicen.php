<?php include '../../config/config.php'; ?>
<?php include '../../inc/header.php';
$id = $_GET['id'];
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create bundle </h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- /.row -->
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#short_term">Add medicine</button>
                                </div>
                            </div>
                            <br>
                            <div class="card-body table-responsive p-0">
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
                                    $result = $db->prepare("SELECT * FROM bulk_medicen_prescription where bm_id = $id ORDER BY id asc");
                                    $result->execute();
                                    $r=1;
                                    for($i=0; $row = $result->fetch(); $i++){
                                        ?>
                                        <tr>
                                            <td class='coun'><span><?php echo $r++; ?></span></td>
                                            <td><?php echo explode(",", $row['trade_name'])[0]; ?></td>
                                            <td><?php echo explode(",", $row['generic_name'])[0]; ?></td>
                                            <td><?php echo explode(",", $row['form'])[0]; ?></td>
                                            <td><?php echo explode(",", $row['strength'])[0]; ?> <?php echo explode(",", $row['unit'])[0]; ?></td>

                                            <td><?php echo explode(",", $row['route'])[0]; ?></td>
                                            <td><?php echo explode(",", $row['frequency'])[0]; ?></td>
                                            <td><?php echo explode(",", $row['duration'])[0]; ?></td>
                                            <td><?php echo explode(",", $row['indication'])[0]; ?></td>
                                            <td><?php echo explode(",", $row['instructions'])[0]; ?></td>
                                            <td>
                                                <a href="<?php echo $url; ?>control-files/bulk/bulk-unite-delete.php?id=<?php echo $row['id']; ?>&madi=<?php echo $id; ?>" class="badge bg-danger svg-btn"><svg enable-background="new 0 0 384 384" version="1.1" viewBox="0 0 384 384" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="m64 341.33c0 23.574 19.093 42.667 42.667 42.667h170.67c23.573 0 42.666-19.093 42.666-42.667v-256h-256v256z"/><polygon points="266.67 21.333 245.33 0 138.67 0 117.33 21.333 42.667 21.333 42.667 64 341.33 64 341.33 21.333"/></svg></a></td>
                                        </tr>

                                    <?php  };   ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <?php  include'medicen.php'; ?>
                    </div>

                    <!-- /.card -->
                </div>

            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php

include '../../inc/footer.php'; ?>

<script src="<?php echo $url; ?>plugins/jquery/jquery.min.js"></script>
<script src="<?php echo $url; ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $url; ?>plugins/select2/js/select2.full.js"></script>
<script src="<?php echo $url; ?>plugins/jquery-ui/jquery-ui.js"></script>
<script src="<?php echo $url; ?>dist/js/adminlte.min.js"></script>
<script src="<?php echo $url; ?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo $url; ?>dist/js/demo.js"></script>

<script>
    (function ($) {
        $('.select2').select2({
            tags: true,
        });
        $('#myTable').DataTable();
    })(jQuery);
</script>
</body>
</html>
