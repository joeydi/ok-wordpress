/**
 * @depend isotope.pkgd.js
 * @depend jquery.magnific-popup.js
 * @depend jquery.fitvids.js
 * @depend jquery.waypoints.js
 * @depend fastclick.js
 * @depend bootstrap.js
 * @depend jquery.imagesloaded.js
 */

/*!
* Okay Plus
*
* Copyright 2014, Joe di Stefano - http://okaypl.us
* Released under the WTFPL license - http://sam.zoy.org/wtfpl/
*/

var $ = $ || jQuery,
    OK = OK || {};

OK.init_mobile_nav = function () {
    var trigger = $('#menu-trigger'),
        menu = $('nav');

    trigger.click(function () {
        menu.toggleClass('active');
    });
};

OK.init_clock = function() {
    if (!$('body').hasClass('home')) {
        return false;
    }

    var content = $('#content'),
        clock_container = $('<div class="clock-container"></div>'),
        clock_outline = $('<img src="/wp-content/themes/ok/static/images/clock-outline.svg" alt="" />'),
        clock_minute_hand = $('<img src="/wp-content/themes/ok/static/images/clock-minute-hand.svg" alt="" />'),
        clock_hour_hand = $('<img src="/wp-content/themes/ok/static/images/clock-hour-hand.svg" alt="" />');

    content.addClass('js-clock');

    clock_container.append(clock_outline, clock_minute_hand, clock_hour_hand);
    content.append(clock_container);

    $(window).scroll(function() {
        var top = $(window).scrollTop();

        clock_minute_hand.css({
            transform: 'rotate(' + top + 'deg)'
        });

        clock_hour_hand.css({
            transform: 'rotate(' + top/30 + 'deg)'
        });
    });
};

OK.init_testimonials = function() {
    if (!$('body').hasClass('home')) {
        return false;
    }

    $('#hero').addClass('active');

    $('.testimonial').waypoint({
        offset: '100%',
        handler: function(direction) {
            if (direction == 'down') {
                $(this.element).addClass('show');
            } else {
                $(this.element).removeClass('show');
            }
        }
    });
};

OK.init_project_archive = function() {
    if (!$('body').hasClass('post-type-archive-project')) {
        return false;
    }

    $('.project-excerpt').waypoint({
        offset: '100%',
        handler: function(direction) {
            if (direction == 'down') {
                $(this.element).addClass('show');
            } else {
                $(this.element).removeClass('show');
            }
        }
    });
};

OK.init_project = function() {
    var container = $('.project-images');

    container.imagesLoaded(function() {
        container.isotope({
            itemSelector: 'div',
            layoutMode: 'masonry'
        });
    });

    container.magnificPopup({
        delegate: 'a',
        type: 'image',
        image: {
            verticalFit: false
        },
        gallery: {
            enabled: true,
            preload: [1,2],
            navigateByImgClick: true,
        },
        zoom: {
            enabled: true,
        }
    });


    $(window).on('load', function() {
        $('#project-pagination')
            .waypoint({
                offset: '100%',
                continuous: true,
                handler: function() {
                    $(this).addClass('show');
                }
            });
    });
};

OK.init_video_post = function() {
    $('.video').fitVids();
};

$(document).ready(function() {
    OK.init_mobile_nav();
    OK.init_clock();
    OK.init_testimonials();
    OK.init_project_archive();
    OK.init_project();
    OK.init_video_post();
});
