document.addEventListener('wpcf7mailsent', function( event ) {
    //document.addEventListener('wpcf7submit', function( event ) {

    if(event.detail.contactFormId=="23"  ){

        successsendmail();
    }
}, false );
function successsendmail(){

    window.location.href  = 'http://septik-omsk.ru/wp-content/uploads/2018/09/5_oshibok_pri_montage_septika.pdf';

    //download_file('http://septik-omsk.ru/wp-content/uploads/2018/09','5_oshibok_pri_montage_septika.pdf');
}
/*
function download_file(fileURL, fileName) {
    // for non-IE
    if (!window.ActiveXObject) {
        var save = document.createElement('a');
        save.href = fileURL;
        save.target = '_blank';
        var filename = fileURL.substring(fileURL.lastIndexOf('/')+1);
        save.download = fileName || filename;
        if ( navigator.userAgent.toLowerCase().match(/(ipad|iphone|safari)/) && navigator.userAgent.search("Chrome") < 0) {
            document.location = save.href;
// window event not working here
        }else{
            var evt = new MouseEvent('click', {
                'view': window,
                'bubbles': true,
                'cancelable': false
            });
            save.dispatchEvent(evt);
            (window.URL || window.webkitURL).revokeObjectURL(save.href);
        }
    }

    // for IE < 11
    else if ( !! window.ActiveXObject && document.execCommand)     {
        var _window = window.open(fileURL, '_blank');
        _window.document.close();
        _window.document.execCommand('SaveAs', true, fileName || fileURL)
        _window.close();
    }
}*/
// ---------------------------------------------------------
// !!!!!!!!!!!!!!!!!document ready!!!!!!!!!!!!!!!!!!!!!!!!!!
// ---------------------------------------------------------

jQuery(document).ready(function () {
    "use strict";
    jQuery('.phone-field, input[name=number_slider_form]').inputmask({"mask": "+7 (999) 999-9999"});
    jQuery(window).scroll(function () {
        if (jQuery(this).scrollTop() > 100) {
            jQuery('#back_to_top').addClass('backactive');
        } else {
            jQuery('#back_to_top').removeClass('backactive');
        }
    });
    jQuery(document).on('click', '#back_to_top', function (e) {
        e.preventDefault();

        jQuery('body,html').animate({scrollTop: 0}, jQuery(window).scrollTop() / 3, 'linear');
    });
//-------------------------
//   Slider height match
//------------------------
    jQuery('#sldier').css('height', jQuery(window).height() - jQuery('header').outerHeight());

//-------------------------
//   Product
//------------------------
    var catname = jQuery('.list-item-cat.active').data('slug');

    jQuery('.products').find('.' + catname).slideDown();

    jQuery('.list-item-cat').click(function () {

        var cliclcatname = jQuery(this).data('slug');

        jQuery('.products li').slideUp();
        jQuery('.products').find('.' + cliclcatname).slideDown();
        jQuery('.list-item-cat').removeClass('active');
        jQuery(this).addClass('active');
        return false;
    });


//-------------------------
//   Action for First block
//------------------------
    jQuery('.scroll-to-next-block').click(function (e) {
        e.preventDefault();
        jQuery('html, body').animate({scrollTop: jQuery('#first-section').offset().top}, 500);
        alert();

    });

//-------------------------
//   Action for open modal
//------------------------
    jQuery('.link-open-modal').click(function (e) {
        e.preventDefault();
        jQuery('.modal-form').fadeIn();

    });
    jQuery('.modal-form .fa-times').click(function () {
        jQuery('.modal-form').fadeOut();
        return false;
    });

//-------------------------
//   Product  modal
//------------------------

    jQuery('.modals .fa-times').click(function () {
        jQuery('.modals').fadeOut();
        return false;
    });

    jQuery('.product-link.alt, .product-link').click(function () {
        var $this = jQuery(this).parent();
        var title = $this.data('title');
        var img = $this.data('url');
        var product_price_reg = $this.data('reg-price');
        var product_sale_reg = $this.data('sale-price');
        var product_attr = $this.find('.product-attr').html();
        var product_description = $this.find('.product-content').html();


        jQuery('.modal-title').html(' ').html(title);
        jQuery('.form-hidden-title').val(' ').val(title);
        if (product_price_reg.length) {
            jQuery('.modal-price-reg').html(' ').html('Розничная цена ' + product_price_reg + ' руб.');
        }else{
            jQuery('.modal-price-reg').html(' ');
        }

        jQuery('.modal-price-sale').html(' ').html('Цена по акции ' + product_sale_reg + ' руб.');
        jQuery('.modal-attr').html(' ').html(product_attr);
        jQuery('.modal-description').html(' ').html(product_description);


        jQuery('.modal-img-block').html(' ').html('<img src="' + img + '" />   ');


        jQuery('.modals').fadeIn();
        return false;

    });


//-------------------------
//   Carousel Review
//------------------------

    jQuery('.list-our-clients-carousel').slick({
        infinite: true,
        autoplay: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        speed: 1000,
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true,
                }
            },
            {
                breakpoint: 900,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }, {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ],
        prevArrow: jQuery('.our-clients .nav-link.left'),
        nextArrow: jQuery('.our-clients .nav-link.right')

    });
//-------------------------
//   Carousel Sert
//------------------------

    jQuery('.list-our-sert-carousel').slick({
        infinite: true,
        // autoplay: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        speed: 1000,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true,
                }
            },
            {
                breakpoint: 900,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }, {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ],
        prevArrow: jQuery('.sert .nav-link.left'),
        nextArrow: jQuery('.sert .nav-link.right')

    });
//-------------------------
//   Accordion  QA
// ------------------------
    jQuery('.block-accordion-wrap').find('.title-accordion').click(function () {
        jQuery(this).next().stop().slideToggle();
        jQuery(this).toggleClass("accordion-open");
    }).next().stop().hide();


    google.maps.event.addDomListener(window, 'load', init);

    function init() {
        // Basic options for a simple Google Map
        // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
        var mapOptions = {
            // How zoomed in you want the map to start at (always required)
            zoom: 15,
            disableDefaultUI: true,
            // The latitude and longitude to center the map (always required)
            center: new google.maps.LatLng(54.9601424, 73.3860068, 18.25)

            // How you would like to style the map.
            // This is where you would paste any style found on Snazzy Maps.
        };

        // Get the HTML DOM element that will contain your map
        // We are using a div with id="map" seen below in the <body>
        var mapElement = document.getElementById('map');

        // Create the Google Map using our element and options defined above
        var map = new google.maps.Map(mapElement, mapOptions);

        // Let's also add a marker while we're at it
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(54.9601424, 73.3860068, 18.25),
            map: map,
            title: 'Компания'
        });
    }


// end redy function
});

