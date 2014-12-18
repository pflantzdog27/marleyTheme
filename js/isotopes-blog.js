(function($){})(window.jQuery);
$(document).ready(function (){


    $container = $('#blog-container');
    setWidths();
	$container.imagesLoaded( function(){
		$container.isotope({
			resizable: false,
			masonry: { columnWidth: getUnitWidth() }
		});
	});

    $(window).smartresize(function () {
        setWidths();
		$container.imagesLoaded( function(){
			$container.isotope({
				masonry: { columnWidth: getUnitWidth() }
			});
		});	
    });

    //filtering
    $('.option-set li a').click(function(){
        var selector = $(this).attr('data-filter');
        var sortName = $(this).attr('href').slice(1);
        $('.option-set li a').removeClass('selected');
        $(this).addClass('selected');
        $container.isotope({
            filter: selector,
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
        });
        return false;
    });


});
function getUnitWidth() {
    var width;
    if($(window).width() <= 360) {
        width = $container.width() / 1;
    } else if($(window).width() <= 800) {
        width = $container.width() / 2;
    } else if($(window).width() <= 1200) {
        width = $container.width() / 3;
    } else {
        width = $container.width() / 3;
    }
    return width;
}
function setWidths() {
    var unitWidth = getUnitWidth() -1;
    $container.children().css({ width: unitWidth });
}