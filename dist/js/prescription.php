<script>
(function ($) {
    $(".li-modal").click(function () {
        var url = $(this).attr('href');
        $( "#content-madel" ).load( url );
    });

    $('input[type=radio][name=db_catogary]').change(function () {
        if (this.value == 'after_the_other') {
            $('.drugs_to_be').show();
            $('input[type=radio][name=drugs_to_be]').prop('checked', false);
        } else {
            $('.drugs_to_be').hide();
            $('input[type=radio][name=drugs_to_be]').prop('checked', false);
        }
    });

    // Deletes row
    $(".del-row").click(function () {
        var id = $(this).attr('date-id');
        var table = $(this).attr('data-table');
        var diag = $(this).parent().parent();

        $.ajax({
            type: 'POST',
            url: '<?php echo $url; ?>control-files/remove-prescription-data.php',
            data: "id=" + id + "&table=" + table,
            success: function (data) {
                $('#htm').html(data);
                    diag.fadeOut().remove();
            }
        });
    });


    $(".sortable").sortable({

        update: function (event, ui) {

            var data = Array();
            $(".sortable tr").each(function (i, v) {
                data[i] = Array();
                $(this).children('td:first-child').each(function (ii, vv) {
                    data[i][ii] = $(this).text();
                });
            })
            console.log(data);
            $.ajax({
                url: "<?php echo $url; ?>control-files/order-update.php",
                method: "POST",
                data: {post_order_ids: data},
                success: function (data) {
                    //$('#htm').html(data);
                }
            });
        }

    });

    $('.select2').select2({
        tags: true,
    });


    $("#english-print").click(function () {
        $("#printdive").show();
        window.print();
    });


})(jQuery);
</script>