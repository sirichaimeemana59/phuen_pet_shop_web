function reposition_() {
    var modal = $(this),
    dialog = modal.find('.modal-dialog');
    modal.css('display', 'block');
    dialog.css("margin-top", Math.max(0, ($(window).height() - dialog.height()) / 2));
}

jQuery(document).ready(function ($) {
    "use strict";

    /* --------------------------------
     Preloader
     -------------------------------- */

    $(window).load(function () {
        $('#preloader').fadeOut('slow', function () {
            $(this).remove();
        });
    });

    /* --------------------------------
     primary navigation slide-in effect
     -------------------------------- */

    //if you change this breakpoint in the style.css file (or _layout.scss if you use SASS), don't forget to update this value as well
    var MQL = 1170;

    //primary navigation slide-in effect
    if ($(window).width() > MQL) {
        var headerHeight = $('.cd-header').height();
        $(window).on('scroll',
            {
                previousTop: 0
            },
            function () {
                var currentTop = $(window).scrollTop();
                //check if user is scrolling up
                if (currentTop < this.previousTop) {
                    //if scrolling up...
                    if (currentTop > 0 && $('.cd-header').hasClass('is-fixed')) {
                        $('.cd-header').addClass('is-visible');

                    } else {
                        $('.cd-header').removeClass('is-visible is-fixed');
                    }
                } else {
                    //if scrolling down...
                    $('.cd-header').removeClass('is-visible');
                    if (currentTop > headerHeight && !$('.cd-header').hasClass('is-fixed')) $('.cd-header').addClass('is-fixed');
                }
                this.previousTop = currentTop;
            });
    }

    /* --------------------------------
     open/close primary navigation
     -------------------------------- */

    $('.cd-primary-nav li a').smoothScroll();


    $('.cd-primary-nav-trigger').on('click', function () {
        $('.cd-menu-icon').toggleClass('is-clicked');
        $('.cd-header').toggleClass('menu-is-open');

        //in firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
        if ($('.cd-primary-nav').hasClass('is-visible')) {
            $('.cd-primary-nav').removeClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function () {
                $('body').removeClass('overflow-hidden');
            });
        } else {
            $('.cd-primary-nav').addClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function () {
                $('body').addClass('overflow-hidden');
                console.log("adding visible");
            });
        }
    });

    $('.cd-primary-nav li a').on('click', function () {
        if ($('.cd-primary-nav').hasClass('is-visible')) {
            $('.cd-menu-icon').toggleClass('is-clicked');
            $('.cd-header').toggleClass('menu-is-open');

            $('.cd-primary-nav').removeClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function () {
                $('body').removeClass('overflow-hidden');
            });
        }
    });

    /* --------------------------------
     swipebox video light box
     -------------------------------- */


    $('.swipebox-video').swipebox();



    /* --------------------------------
     Ajax MailChimp Integration
     -------------------------------- */



    $('#mc-form').ajaxChimp({
        language: 'ft',
        url: 'http://xxx.xxx.list-manage.com/subscribe/post?u=xxx&id=xxx',
        callback: clearSubsForm
        //http://xxx.xxx.list-manage.com/subscribe/post?u=xxx&id=xxx
    });


    $.ajaxChimp.translations.ft = {
        'submit': 'Submitting...',
        0: '<i class="fa fa-envelope"></i> Awesome! We have sent you a confirmation email',
        1: '<i class="fa fa-exclamation-triangle"></i> Please enter a value',
        2: '<i class="fa fa-exclamation-triangle"></i> An email address must contain a single @',
        3: '<i class="fa fa-exclamation-triangle"></i> The domain portion of the email address is invalid (the portion after the @: )',
        4: '<i class="fa fa-exclamation-triangle"></i> The username portion of the email address is invalid (the portion before the @: )',
        5: '<i class="fa fa-exclamation-triangle"></i> This email address looks fake or invalid. Please enter a real email address'
    };

    //Clear subscription form input field
    function clearSubsForm(ev) {
        if (ev.result === 'success') {
            $("#mc-email").val('');
        }
    }


    /* --------------------------------
     Carousel
     -------------------------------- */

    $('#Carousel').carousel({
        interval: 5000
    })

    /* --------------------------------
     Our Stats
     -------------------------------- */

    $('.our-stats-box').each(function () {
        $('.our-stat-info').fappear(function (direction) {
            $('.stats').countTo();
        }, {offset: "100px"});
    });

    /* --------------------------------
     screenshot carousel
     -------------------------------- */

    $('#myCarousel').carousel({
        interval: 5000
    })


    /* --------------------------------
     Typer.js is built by Layervault
     -------------------------------- */

    $('[data-typer-targets]').typer();

    /*----------------------------------------------------*/
    /*  Intro page jquery
     /*----------------------------------------------------*/

    $('.footer-nav-inner a[href*=#]:not([href=#])').on('click', function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });


    /*----------------------------------------------------*/
    /*  Scroll Down
     /*----------------------------------------------------*/

    $('.icon-arrow-down a[href*=#]:not([href=#])').on('click', function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top
                }, 800);
                return false;
            }
        }
    });

    $('.scrolling-href a[href*=#]:not([href=#])').on('click', function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top
                }, 500);
                return false;
            }
        }
    });

    $('a[title]').tooltip();



    /*----------------------------------------------------*/
    /*  Contact Form Section
     /*----------------------------------------------------*/
    $("#contact-form").on('submit', function (e) {
        e.preventDefault();
        var name = $("#name").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var property = $("#property").val();
        var text = $("#message").val();
        var capcha = $('#g-recaptcha-response').val();
        var dataString = 'name=' + name + '&email=' + email + '&phone=' + phone + '&text=' + text + '&property=' + property + '&capcha=' + capcha;


        function isValidEmail(emailAddress) {
            var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
            return pattern.test(emailAddress);
        };
        if (isValidEmail(email) && (text.length > 50) && (name.length > 1)) {
            $("#contact-btn").val('SENDING...').attr('disabled','disabled');
            $.ajax({
                type: "POST",
                url: $('#root-url').val()+"/home/contact",
                data: dataString,
                success: function (r) {
                    if(r == 'success') {
                        $('.success').fadeIn(1000).delay(3000).fadeOut(1000);
                        $('#contact-form')[0].reset();
                        grecaptcha.reset();
                    } else {
                        $('.error-capcha').fadeIn(1000).delay(5000).fadeOut(1000);
                    }
                    $("#contact-btn").removeAttr('disabled').val('SEND');
                }
            });
        } else {
            $('.error-form').fadeIn(1000).delay(5000).fadeOut(1000);

        }

        return false;
    });




    /*----------------------------------------------------*/
    /*  Input field animation
     /*----------------------------------------------------*/

    (function () {
        // trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
        if (!String.prototype.trim) {
            (function () {
                // Make sure we trim BOM and NBSP
                var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
                String.prototype.trim = function () {
                    return this.replace(rtrim, '');
                };
            })();
        }

        [].slice.call(document.querySelectorAll('input.input__field, textarea.input__field')).forEach(function (inputEl) {
            // in case the input is already filled..
            if (inputEl.value.trim() !== '') {
                classie.add(inputEl.parentNode, 'input--filled');
            }

            // events:
            inputEl.addEventListener('focus', onInputFocus);
            inputEl.addEventListener('blur', onInputBlur);
        });

        function onInputFocus(ev) {
            classie.add(ev.target.parentNode, 'input--filled');
        }

        function onInputBlur(ev) {
            if (ev.target.value.trim() === '') {
                classie.remove(ev.target.parentNode, 'input--filled');
            }
        }
    })();


    /*----------------------------------------------------*/
    /*  Remove # tags from URL
     /*----------------------------------------------------*/
    $(window).on('hashchange', function (e) {
        history.replaceState("", document.title, e.originalEvent.oldURL);
    });

    /**
     * Vertically center Bootstrap 3 modals so they aren't always stuck at the top
     */
    $(function () {
        function reposition() {
            var modal = $(this),
                dialog = modal.find('.modal-dialog');
            modal.css('display', 'block');

            // Dividing by two centers the modal exactly, but dividing by three
            // or four works better for larger screens.
            dialog.css("margin-top", Math.max(0, ($(window).height() - dialog.height()) / 2));
        }

        // Reposition when a modal is shown
        $('.modal').on('show.bs.modal', reposition);
        // Reposition when the window is resized
        $(window).on('resize', function () {
            $('.modal:visible').each(reposition);
        });
    });


    /*----------------------------------------------------*/
    /*	Scroll To Top Section
     /*----------------------------------------------------*/

    $(window).on('scroll', function() {
        var windowH = $(window).width();
        if ($(this).scrollTop() > 100 && windowH > 767) {
            $('.scrollup').fadeIn();
            $('.scrollup-chat').fadeIn();
        } else {
            $('.scrollup').fadeOut();
            $('.scrollup-chat').fadeOut();
        }


        /*// Check the location of each desired element
       $('.img-feature-flat').each( function(i){
           // If the object is completely visible in the window, fade it it
           if( checkTop($(this)) ){$(this).animate({'opacity':'1','top':0 },500);}
       });

       $('.brief-left-content').each( function(i){
           if( checkTop($(this)) ){$(this).animate({'opacity':'1','left':0 },500);}
       });

       $('.brief-right-content').each( function(i){
           if( checkTop($(this)) ){ $(this).animate({'opacity':'1','right':0 },500);}
       });*/

    });

    $('.scrollup').on('click', function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
});

function checkTop (obj) {
    var bottom_of_object = $(obj).offset().top + $(obj).outerHeight();
    var bottom_of_window = $(window).scrollTop() + $(window).height();
    return  bottom_of_window > bottom_of_object;
}
