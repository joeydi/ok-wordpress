var $ = $ || jQuery,
    OK = OK || {};

OK.init_project = function() {
    var container = $('.project-images');

    container.isotope({
        itemSelector: 'div',
        layoutMode: 'masonry'
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
        }
    });
};

$(document).ready(function() {
    OK.init_project();
});
