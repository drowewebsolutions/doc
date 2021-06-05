<?php include'../config/config.php'; ?>
<?php include'../inc/header.php';?>
  <!-- Content Wrapper. Contains page content -->


    <div class="nes-stat">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table id="myTable" class="table table-hover text-nowrap ">
                  <thead>
                    <tr>
                      <th >Order</th>
                      <th>Name</th>
                      <th>Gender</th>
                      <th>Age</th>
                      <th>ID</th>
                      <th>Payment</th>
                      <th>Session</th>
                      <th>Number</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="sortable" id="tdaday">
                    
                  </tbody>
                </table>
                 <div id="htm"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
       </div>
     </div>


<?php include'../inc/footer.php'; ?>
<script>
(function($) {
  var centername = '<?php echo $Center; ?>';

  $.ajax({
    url:"<?php echo $url; ?>control-files/today-patients-datas.php",
    method:"POST",
    data:{center:centername},
    success:function(result){
      $('#tdaday').html(result);
    }
  });

   $( ".sortable" ).sortable({

    update  : function(event, ui){
      var data = Array();
      $(".sortable tr").each(function(i, v){
          data[i] = Array();
          $(this).children('td:first-child').each(function(ii, vv){
              data[i][ii] = $(this).text();
          });
      })

      $.ajax({
        url:"<?php echo $url; ?>control-files/today-order-update.php",
        method:"POST",
        data:{post_order_ids:data},
        success:function(result){
          $.ajax({
            url:"<?php echo $url; ?>control-files/today-patients-datas.php",
            method:"POST",
            data:{center:centername},
            success:function(result){
              $('#tdaday').html(result);
            }
          });
        }
      });
    }

 });
$('#myTable').DataTable();
})(jQuery);
</script>
</body>
</html>
