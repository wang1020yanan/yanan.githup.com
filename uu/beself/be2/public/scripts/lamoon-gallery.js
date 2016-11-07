$(document).ready(function() {

    // To enable auto-generated thumbnail
    $('.photo-item').nailthumb();
    
    var $container = $('#gallery');

    $container.imagesLoaded(function() {
        
        $container.isotope({
            itemSelector : '.photo-item',
            layoutMode : 'fitRows'
        });
        
        
    });

    $('#categories a').click(function() {
        var selector = $(this).attr('data-filter');
        $container.isotope({
            filter : selector
        });
        return false;
    });
    
    
    
    /* Gallery Category */
    $('ul#categories a').click(function() {
        $('ul#categories a').removeClass('active');
        $(this).addClass('active');
    });
    /* End Gallery Category */

});
