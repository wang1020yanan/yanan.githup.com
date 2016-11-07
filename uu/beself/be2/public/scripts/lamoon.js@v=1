/*
 * Lamoon V1.0
 * By UXbarn
 * Themeforest Profile: http://themeforest.net/user/UXbarn?ref=UXbarn
 * Demo URL: www.uxbarn.com/demo/retail/lamoon
 * 7/24/2012
 */

/* #Configuration Parameters
 ================================================== */
var captionAnimated;
var imageHoveringIcon;
var imageHoveringIconPos;
var useAutoMap;
var address;

$(document).ready(function() {

    /* #DEMOOOOOOOOOOOOOO
     ================================================== */
    if (window.location.pathname.indexOf('elements/') > 0) {
        $.getScript('../demo/demo.js');
    } else {
        $.getScript('demo/demo.js');
    }
    /* END DEMOOOOOOOOOOOOOO */

    /* #Configuration
    ================================================== */
    // Animate the banner caption?
    captionAnimated = true;

    // Show notification icon for any clickable image?
    imageHoveringIcon = true;

    /* Position of the icon:
     * rt = Right Top
     * lt = Left Top
     * rb = Right Bottom
     * lb = Left Bottom
     */
    imageHoveringIconPos = 'rt';

    // Generate Google Map automatically using the following address?
    useAutoMap = true;
    address = '57-091 Kamehameha Highway, Kahuku, Oahu, HI';

    /* #Start calling required functions
     ================================================== */
    initConfig();
    initPlugins();
    initEvents();
    initDropdownMenu();
});

/* #Initialize Configuration
 ================================================== */
function initConfig() {

    if (!captionAnimated) {
        $('.banner-caption.left').css({
            opacity : '1',
            left : '0'
        });

        $('.banner-caption.right').css({
            opacity : '1',
            right : '0'
        });
    }

    if (imageHoveringIcon) {
        var hoverignItems = $('.hover');
        hoverignItems.append('<span class="hover-icon ' + imageHoveringIconPos + '">+</span>');
    }

    loadGoogleMap(useAutoMap, address);
}

/* #Initialize Event Handlers
 ================================================== */
function initEvents() {

    // Read-more image hovering
    var readmore = $('.readmore');
    var readmoreText = $('.readmore span.text');
    readmore.animate({
        opacity : '0'
    }, 10);

    // View-photo image hovering
    var photo = $('.photo');
    var photoText = $('.photo span.text');
    photo.animate({
        opacity : '0'
    }, 10);

    var startPosition, endPosition;

    // Image hovering function
    $('.hover').hover(function() {

        var img = $(this).find('div');
        var imgHeight = img.height();
        var imgWidth = img.width();

        startPosition = (imgHeight / 2 + 30);
        endPosition = (imgHeight / 2 + 20);

        readmore.css({
            backgroundPosition : (imgWidth / 2 - 10) + 'px ' + (imgHeight / 2 - 15) + 'px',
            display : 'block'
        });
        readmoreText.css('top', startPosition + 'px');

        photo.css({
            backgroundPosition : (imgWidth / 2 - 15) + 'px ' + (imgHeight / 2 - 20) + 'px',
            display : 'block'
        });
        photoText.css('top', startPosition + 'px');

        $(this).find(readmore).stop().animate({
            opacity : '.7'
        }, 500, 'easeOutQuint');
        $(this).find(readmore).find(readmoreText).stop().animate({
            top : endPosition + 'px'
        }, 500);
        $(this).find(photo).stop().animate({
            opacity : '.7'
        }, 500, 'easeOutQuint');

        $(this).find(photo).find(photoText).stop().animate({
            top : endPosition + 'px'
        }, 500);

    }, function() {

        $(this).find(readmore).stop().animate({
            opacity : '0'
        }, 500, 'easeOutQuint');
        $(this).find(readmore).find(readmoreText).stop().animate({
            top : startPosition + 'px'
        }, 500);
        $(this).find(photo).stop().animate({
            opacity : '0'
        }, 500, 'easeOutQuint');
        $(this).find(photo).find(photoText).stop().animate({
            top : startPosition + 'px'
        }, 500);

    })
    // Submitting comment form
    if ($('form#comment-form').length > 0) {

        var commentForm = $('form#comment-form');
        commentForm.submit(function() {
            if (commentForm.validationEngine('validate')) {
                // Call your PHP file to save comment to database...
            }
        });
    }

    // Submitting reservation form
    if ($('form#reservation-form').length > 0) {

        var reservationForm = $('form#reservation-form');
        reservationForm.submit(function() {
            if (reservationForm.validationEngine('validate')) {
                $.ajax({
                    type : "POST",
                    url : "php/reservation.php",
                    data : reservationForm.serialize(),
                    success : function(result) {

                        // For testing only
                        //result = 'true';
                        /*************************/

                        if (result == 'true') {

                            $('html, body').animate({
                                scrollTop : 0
                            }, 1500, 'easeOutQuint', function() {

                                reservationForm.stop().animate({
                                    opacity : '0'
                                }, 400, function() {
                                    reservationForm.css('display', 'none');

                                    $('#success').css('display', 'block');
                                    $('#success').stop().animate({
                                        opacity : '1'
                                    }, 900);
                                });
                            });

                        } else {
                            $('#error').css('display', 'block');
                            $('#error').stop().animate({
                                opacity : '1'
                            }, 1000);

                            alert('Error Message: ' + result);
                        }
                    },
                    error : function(xmlHttpRequest, textStatus, errorThrown) {
                        $('#error').css('display', 'block');
                        $('#error').stop().animate({
                            opacity : '1'
                        }, 1000);

                        alert(errorThrown);
                    }
                });
                return false;
            }
        });

    }

    // Submitting contact form
    if ($('form#contact-form').length > 0) {

        var contactForm = $('form#contact-form');
        contactForm.submit(function() {
            if (contactForm.validationEngine('validate')) {
                $.ajax({
                    type : "POST",
                    url : "php/contact.php",
                    data : contactForm.serialize(),
                    success : function(result) {

                        // For testing only
                        //result = 'true';
                        /*************************/

                        if (result == 'true') {
                            contactForm.stop().animate({
                                opacity : '0'
                            }, 400, function() {
                                contactForm.css('display', 'none');
                                $('#success').css('display', 'block');
                                $('#success').stop().animate({
                                    opacity : '1'
                                }, 900);
                            });

                        } else {
                            $('#error').css('display', 'block');
                            $('#error').stop().animate({
                                opacity : '1'
                            }, 1000);

                            alert('Error Message: ' + result);
                        }

                    },
                    error : function(xmlHttpRequest, textStatus, errorThrown) {
                        $('#error').css('display', 'block');
                        $('#error').stop().animate({
                            opacity : '1'
                        }, 1000);

                        alert(errorThrown);
                    }
                });
                return false;
            }
        });

    }

}

/* #Initialize Plugins
 ================================================== */
function initPlugins() {
    // FlexSlider
    $('#banner-slider').flexslider({
        animationSpeed : 1000,
        slideshowSpeed : 6000,
        pauseOnAction : false,
        pauseOnHover : true,
        controlNav : false,
        start : function() {
            showBannerCaptions();
        },
        before : function() {
            if (captionAnimated) {
                $('.banner-caption.left').stop().animate({
                    opacity : '0',
                    left : '0'
                }, 10);

                $('.banner-caption.right').stop().animate({
                    opacity : '0',
                    right : '0'
                }, 10);
            }
        },
        after : function() {
            showBannerCaptions();
        }
    });

    $('#room-photos').flexslider({
        startAt : 0,
        animationSpeed : 800,
        slideshowSpeed : 4000,
        pauseOnAction : true,
        pauseOnHover : true,
        directionNav : false
    });

    // Superfish
    $('ul.sf-menu').superfish({
        animation : {
            opacity : 'show'
        },
        delay : 1000
    });

    // jQuery Cycle
    $('#home-testimonial').cycle();

    // FancyBox
    $('.image-box').fancybox({
        padding : '0',
        centerOnScroll : true,
        overlayOpacity : '0.9',
        overlayColor : '#222',
        transitionIn : 'elastic',
        transitionOut : 'elastic',
        speedIn : 500,
        speedOut : 300,
        showNavArrows : true
    });

    // Validation Engine
    if ($('form.validate').length > 0) {
        $('form.validate').validationEngine('attach', {
            autoHidePrompt : 'false',
            autoHideDelay : '7000',
            fixed : true,
            scroll : false,
            binded : false,
            promptPosition : 'centerRight'
        });
    }

    // Date Picker
    if ($('.datepicker').length > 0) {
        $('.datepicker').datepicker({
            dateFormat : "d M, y"
        });
    }

    // Numeric Spinner
    if ($('.spinner').length > 0) {
        $('.spinner').spinner({
            min : 1,
            max : 100
        });

        $('.spinner-min0').spinner({
            min : 0,
            max : 100
        });
    }
}

/* #Banner Caption
 ================================================== */
function showBannerCaptions() {
    if (captionAnimated) {
        var leftCaption = $('.banner-caption.left');
        leftCaption.css({
            opacity : '0',
            left : '100px'
        });

        leftCaption.stop().animate({
            opacity : '1',
            left : '0'
        }, 2500, 'easeOutQuint');

        var rightCaption = $('.banner-caption.right');
        rightCaption.css({
            opacity : '0',
            right : '100px'
        });

        rightCaption.stop().animate({
            opacity : '1',
            right : '0'
        }, 2500, 'easeOutQuint');
    }
}

/* #Dropdown Menu for Showing on Small Devices
 ================================================== */
function initDropdownMenu() {

    // Create the dropdown bases
    $('<select />').appendTo('#menu');

    // Create default option
    $('<option />', {
        'selected' : 'selected',
        'value' : '',
        'text' : '- Select Page -'
    }).appendTo('#menu select');

    // Populate dropdowns with the first menu items
    $('#menu li a').each(function() {
        var el = $(this);
        if (el.text().length > 0) {
            $('<option />', {
                'value' : el.attr('href'),
                'text' : el.text()
            }).appendTo('#menu select');
        }
    });

    $('#menu select').append($('<option></option>').attr('value', $('a#purchase').value).text('Purchase this template'));

    $('#menu select').change(function() {
        window.location = $(this).find('option:selected').val();
    });
}

/* #Google Map Loader
 ================================================== */
function loadGoogleMap(isActive, address) {
    if ($('#googleMap').length > 0) {
        if (isActive) {
            $('#googleMap').css('display', 'block');

            if ($('#yourMap').length > 0) {
                $('#yourMap').css('display', 'none');
            }

            var geocoder = new google.maps.Geocoder();
            var latlng = new google.maps.LatLng(-34.397, 150.644);
            var myOptions = {
                zoom : 13,
                center : latlng,
                mapTypeId : google.maps.MapTypeId.ROADMAP
            }
            var map = new google.maps.Map($('#googleMap')[0], myOptions);

            geocoder.geocode({
                'address' : address
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    map.setCenter(results[0].geometry.location);
                    var marker = new google.maps.Marker({
                        map : map,
                        position : results[0].geometry.location
                    });
                } else {
                    alert("Geocode was not successful for the following reason: " + status);
                }
            });
        } else {
            $('#googleMap').css('display', 'none');
            if ($('#yourMap').length > 0) {
                $('#yourMap').css('display', 'block');
            }
        }
    }
}

function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
    var regexS = "[\\?&]" + name + "=([^&#]*)";
    var regex = new RegExp(regexS);
    var results = regex.exec(window.location.search);
    if (results == null)
        return "";
    else
        return decodeURIComponent(results[1].replace(/\+/g, " "));
}

/* #Skeleton Tab
================================================== */
/**
 * Skeleton V1.1
 * Copyright 2011, Dave Gamache
 * www.getskeleton.com
 * Free to use under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 8/17/2011
 */
(function($) {
    // hash change handler
    function hashchange() {
        var hash = window.location.hash, el = $('ul.tabs [href*="' + hash + '"]'), content = $(hash)

        if (el.length && !el.hasClass('active') && content.length) {
            el.closest('.tabs').find('.active').removeClass('active');
            el.addClass('active');
            content.show().addClass('active').siblings().hide().removeClass('active');
        }
    }

    // listen on event and fire right away
    $(window).on('hashchange.skeleton', hashchange);
    hashchange();
    $(hashchange);
})(jQuery);
