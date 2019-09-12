
(function($){
  "use strict";

    // Toggle menu
     $(".navbar-toggle").click(function() {
        $(this).toggleClass('in');
    });


    /*** Sticky header */
    $(window).scroll(function() {

        if ($(window).scrollTop() > 0) {
          $(".header").addClass("sticky");
        } 
        else {
          $(".header").removeClass("sticky");
        }
    });


    /** Case Study Slider **/ 
    $(".slick-slider-img").slick({
        // dots: true,
        // infinite: true,
        slidesToScroll: 1,
        slidesToShow: 1,
        arrows: false,
        vertical: true,
        asNavFor: '.slick-slider-content',
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    vertical: false,
                }
            }      
        ]
    });

    $('.slick-slider-content').slick({
        // dots: true,
        // infinite: true,
        slidesToShow: 3,
        focusOnSelect: true,
        vertical: true,
        slidesToScroll: 1,
        asNavFor: '.slick-slider-img',
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToScroll: 1,
                    slidesToShow: 1,
                    vertical: false,
                }
            }      
        ]
    });

})(jQuery);