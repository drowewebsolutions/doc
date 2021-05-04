<script src="<?php echo $url; ?>dist/js/jquery-3.5.1.min.js"></script>
<script src="<?php echo $url; ?>dist/js/bootstrap.min.js"></script>
<script src="<?php echo $url; ?>dist/js/select2.min.js"></script>
<script src="<?php echo $url; ?>dist/js/jquery.dataTables.min.js"></script>
<script src="<?php echo $url; ?>dist/js/custom.js"></script>
<script type="text/javascript">
(function ($) {
    $(".sd-delet").click(function () {
        if(confirm('Are you sure you want to delete this item?')) {
            var id = $(this).attr('date-id');
            var centerrow = $(this).parent();

            $.ajax({
                type: 'POST',
                url: '<?php echo $url; ?>control-files/delete-center.php',
                data: "id=" + id,
                success: function (data) {
                   $('#new_patient_btn').removeClass('disabled');
                    centerrow.fadeOut().remove();
                }
            });
        };
    });

    $("#savesur").click(function () {
        if(confirm('Are you sure?')) {
            
        };
    });


})(jQuery);
</script>