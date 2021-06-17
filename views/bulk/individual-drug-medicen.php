<?php include'../../config/config.php'; ?>
<?php include'../../inc/header.php'; 

 ?>
  <div class="nes-stat">
    <div class="container">
            <h2>Individual Drug Bank</h2>
            <div class="row">
                <div class="col-12">
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#short_termpop">Create Drug</button>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-body p-0">
                            <table id="myTable" class="table table-hover text-nowrap ">
                                <thead>
                                    <tr>
                                        <th></th>
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
                                <tbody >
                                <?php
                                $results = $db->prepare("SELECT * FROM prescription_bluk_drugs ORDER BY id asc");
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
                                            <span class="badge bg-danger ind-delet" data-id="<?php echo $rowr['id']; ?>">
                                                <svg enable-background="new 0 0 384 384" version="1.1" viewBox="0 0 384 384" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="m64 341.33c0 23.574 19.093 42.667 42.667 42.667h170.67c23.573 0 42.666-19.093 42.666-42.667v-256h-256v256z"></path><polygon points="266.67 21.333 245.33 0 138.67 0 117.33 21.333 42.667 21.333 42.667 64 341.33 64 341.33 21.333"></polygon></svg>
                                            </span>
                                        </td>
                                    </tr>

                                <?php  };   ?>
                                </tbody>
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
include'../model/individual-drug-bank-pop-up.php'; 
include'../../inc/footer.php'; 
?>
<script> 
(function ($) {
    $(".ind-delet").click(function () {
        var id = $(this).attr('data-id');
        var centerrow = $(this).parent().parent();

        $.ajax({
            type: 'POST',
            url: '<?php echo $url; ?>control-files/delete-individual-drug.php',
            data: "id=" + id,
            success: function (data) {
                centerrow.fadeOut().remove();
            }
        });

    });
    $('.select2').select2({
          tags: true,
    });
    $('#myTable').DataTable();
})(jQuery);
</script>
