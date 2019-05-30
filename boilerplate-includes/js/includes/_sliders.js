/*
 * @file
 *
 * Available variables
 * - gulp_display
 *
 */

(function ($) {
    'use strict';

    $(document).ready(function () {
        createSlick();
	    portail.detectNewHtmlElements([
            {
                // selector : '.jobs-offers-bloc .jobs, .jobs-zoom-bloc .zooms, .testimonials-bloc .testimonials, .formations-bloc .formations-list',
                callback : function () {
                    createSlick();
                }
            }
        ]);
    });

    $(window).on('resizeend', function () {
        createSlick();
    });

    function createSlick() {
        /* ########################################################################################### */
        /* -------------------------------------- Slider logo  --------------------------------------- */
	    /* ########################################################################################### */
	    var slider = $('.list-logos');
	    var slide = $('.list-logos div');
	    if (slide.length > 1) {
		    slider.not('.slick-initialized').slick(
			    {
				    infinite: false,
				    arrows: true,
				    speed: 300,
				    // centerMode: true,
				    slidesToShow: 6,
				    slidesToScroll: 1,
				    prevArrow : '<button class="slick-prev slick-arrow"><i class="i-arrow-left"></i></button>',
				    nextArrow : '<button class="slick-next slick-arrow"><i class="i-arrow-right"></i></button>',
				    responsive: [
					    {
						    breakpoint: 1024,
						    settings: {
							    slidesToShow: 4,
						    }
					    },
					    {
						    breakpoint: 600,
						    settings: {
							    slidesToShow: 2,
						    }
					    },
				    ]
			    }
		    );
	    }
	    /* ########################################################################################### */
	    /* -------------------------------- Slider appointments  ------------------------------------- */
        /* ########################################################################################### */

	    slider = $('.home .list-appointments');
	    slide = $('.home .list-appointments .item');
	    if (slide.length > 1) {
		    slider.not('.slick-initialized').slick(
			    {
				    infinite: false,
				    slidesToShow: 3,
				    slidesToScroll: 1,
				    variableWidth: true,
				    swipeToSlide: true,
				    prevArrow : $('.block-appointments .slick-prev'),
				    nextArrow : $('.block-appointments .slick-next'),
				    responsive: [
					    {
						    breakpoint: 768,
						    settings: {
							    arrows: false,
							    centerMode: true,
							    centerPadding: '40px',
							    slidesToShow: 1,
							    initialSlide: 1,
						    }
					    },
				    ]
			    }
		    );
	    }

	    /* ########################################################################################### */
	    /* -------------------------------- Slider testimonials  ------------------------------------- */
	    /* ########################################################################################### */

	    slider = $('.block-testimonials');
	    slide = $('.block-testimonials .item');
	    if (slide.length > 1) {
		    slider.not('.slick-initialized').slick(
			    {
				    infinite: true,
				    slidesToShow: 2,
				    slidesToScroll: 1,
				    arrows: false,
				    dots: true,
				    autoplay: true,
				    autoplaySpeed: 5000,
				    responsive: [
					    {
						    breakpoint: 480,
						    settings: {
							    slidesToShow: 1,
							    initialSlide: 1,
						    }
					    },
				    ]
			    }
		    );
	    }

    }

})(jQuery);
