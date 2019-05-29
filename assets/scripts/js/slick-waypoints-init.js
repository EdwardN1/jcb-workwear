jQuery(document).ready(function ($) {

    $('[data-waypoint]').each(function () {
        var $element = $(this);
        var wpOffset = $element.data('waypoint-offset');
        var wpDirection = $element.data('waypoint-direction');
        var wpClass = $element.data('waypoint-class');

        $element.waypoint(function (direction) {
            if (direction == wpDirection) {
                if (!$element.hasClass(wpClass)) {
                    $element.addClass(wpClass);
                }
            }
            this.destroy();
        }, {
            offset: wpOffset
        });
    });

    $('[data-slick-slider]').slick();

    $('[data-slick-slider-main]').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        initialSlide: 0,
        asNavFor: "#product-slider-nav",
    });

    $('[data-slick-slider-nav]').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        infinite: true,
        asNavFor: "#product-slider-main",
        /*centerMode: true,*/
        focusOnSelect: true,
        responsive: [
            {
                breakpoint: 1250,
                settings: {
                    slidesToShow: 4
                }
            }
            , {
                breakpoint: 980,
                settings: {
                    slidesToShow: 3
                }
            }
            , {
                breakpoint: 640,
                settings: {
                    slidesToShow: 4
                }
            }
            , {
                breakpoint: 580,
                settings: {
                    slidesToShow: 3
                }
            }
            , {
                breakpoint: 320,
                settings: {
                    slidesToShow: 1
                }
            }]
    });

});