<?php include'../config/config.php'; ?>
<style>
    body {
        font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif;
    }
    *{ font-family: 'Quicksand', sans-serif;}

    .content-table{
        border-collapse: collapse;
        margin: 30px auto 0px;
        font-size: 0.9em;
        min-width: 400px;
        border-radius: 5px 5px 0 0;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15)
    }

    .content-table thead tr{
        background-color: #009879;
        color: white;
        text-align: left;
        font-weight: bold;
    }
    .content-table th, .content-table td{
        padding: 20px 45px;
        font-size: 25px;
    }
    .content-table tbody tr{
        border-bottom: 1px solid #dddddd;
    }
    .content-table tbody tr:nth-of-type(even){
        background-color: #f3f3f3;
    }
    .content-table tbody tr:last-of-type{
        border-bottom: 2px solid #009879;
    }
    .badge{
        background-color: #f1a557;
        padding: 5px 10px;
        border-radius: 2px;
    }
</style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <section class="content">
      <div class="container-fluid">

        <!-- /.row -->

        <div class="row">
          <div class="col-12">
            <div class="card">

              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="content-table">
                  <thead>
                    <tr>
                        <th >Order</th>
                        <th width="20"></th>
                        <th>Session</th>
                        <th>Appointment number</th>
                        <th>Name</th>
                        <th>Status</th>
                    </tr>
                  </thead>
                  <tbody class="sortable">
                    <?php
                      $result = $db->prepare("SELECT * FROM today_patients ORDER BY order_set asc");
                      $result->execute();
                      $r= 1;
                      for($i=0; $row = $result->fetch(); $i++){
                    ?>
                    <tr>
                      <td class='coun' data-post-id="<?php echo $r; ?>"><span><?php echo $r; ?></span><span style="display: none;">,<?php  echo $row['id']; ?></span></td>
                      <td><?php echo $row['order_id']; ?></td>
                      <td><span><?php echo $row['time']; ?></span></td>
                      <td><span><?php echo $row['apnumber']; ?></span> - <span class="badge
                      <?php if($row['report_or_consultation']=="Report"){echo 'btn-primary';}else{ echo 'btn-warning'; } ?>
                       btn-sm"><?php echo $row['report_or_consultation']; ?></span></td>
                      <td>
                        <?php
                        $id = $row['patients_id'];
                        $a_slq = "SELECT name,birthday FROM patients_details WHERE patients_id=$id";
                        $id_result = $db->query($a_slq)->fetch();
                        echo ($id_result["name"]);

                      ?></td>
                        <td>asdasd</td>
                      </tr>
                    <?php
                    $r++;
                      }
                    ?>
                  </tbody>
                </table>
                 <div id="htm"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<!-- jQuery -->
<script src="<?php echo $url; ?>plugins/jquery/jquery.min.js"></script>

<script>
(function($) {
    setTimeout("window.open(self.location, '_self');", 60000);
})(jQuery);
</script>
</body>
</html>
