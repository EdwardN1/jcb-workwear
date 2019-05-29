jQuery(document).ready(function ($) {

    $(document).on('change', '.variation-radios input', function () {
        $('select[name="' + $(this).attr('name') + '"]').val($(this).val()).trigger('change');
        var value = $(this).value;
        var slideIndex = $('#product-slider-main [data-colour="'+$(this).val()+'"]').data('colour-index');
        window.console.log('slideIndex = ' + slideIndex);
        if(slideIndex!=null) {
            $('#product-slider-main').slick('slickGoTo',parseInt(slideIndex));
        }
    });


});