(function($) {
    $('.datevalidate').mask("9999-99-99");
        $('.datevalidate').change(function(){

        if($(this).val().substring(0,2) > 12 || $(this).val().substring(0,2) == "00") {
        
         return false;
        }
         if($(this).val().substring(3,5) > 31 || $(this).val().substring(0,2) == "00") {
         
         return false;
        }
    });
})(jQuery);