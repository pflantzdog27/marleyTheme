(function($){})(window.jQuery);
$(document).ready(function (){

    var $container = $('#isotopes-container');
    filters = {};
    $container.imagesLoaded( function(){
        $container.isotope({
            itemSelector : '.item',
            layoutMode : 'masonry',
            perfectMasonry: {
                layout: "horizontal",      // Set layout as vertical/horizontal (default: vertical)
                liquid: true
            },
            filter: '.overview',
            getSortData : {
                position : function ( $elem ) {
                    return  parseInt($elem.attr('data-order'),10);
                }
            },
            sortBy : 'position'
        });
    });


    //filtering
    $('#sort-nav li a').click(function(e){
        var $this = $(this);
        if ( $this.hasClass('selected') ) {
            e.preventDefault();
            return;
        }
        var $optionSet = $this.parents('.option-set');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');
        var group = $optionSet.attr('data-filter-group');
        filters[ group ] = $this.attr('data-filter-value');
        var isoFilters = [];
        for ( var prop in filters ) {
            isoFilters.push( filters[ prop ] )
        }
        var selector = isoFilters.join('');
        $container.isotope({ filter: selector });
        return false;
    });

});

$(window).resize(function() {
    var $container = $('#isotopes-container');
    filters = {};
    $container.imagesLoaded( function(){
        $container.isotope({
            itemSelector : '.item',
            layoutMode : 'masonry',
            perfectMasonry: {
                layout: "horizontal",      // Set layout as vertical/horizontal (default: vertical)
                liquid: true
            },
            getSortData : {
                position : function ( $elem ) {
                    return  parseInt($elem.attr('data-order'),10);
                }
            },
            sortBy : 'position'
        });
    });

})
