(function($){})(window.jQuery);
$(document).ready(function (){
    setVariable = 0;
    submitted = false;
    parallaxVariable = .5;
    locked = 0;

    // set elements to correct width and/or height before load
    if($('.home').length > 0 && $(window).width() > 768) {
        $('#marley-logo').width($('#image-51').width()).height($('#image-51 > img').height());
        $('#intro-screen').width($(window).width()).height($(window).height());
        $('body').height($(window).height());
        $('#wrapper').css({'min-height':$(window).height(),overflow : 'hidden'});
    } else {
        $('#navigation-wrap').addClass('fixed-position');
        var pageHeight = $('body').height() * parallaxVariable;
        $('body').css({'overflow-y':'auto', 'overflow-x': 'hidden', height : pageHeight});
        $('#wrapper').css('visibility','visible');
    }

    // on page refresh always go to top
    $(window).unload(function() {
        $('body').scrollTop(0);
    });

    backpositionHack();
	
	$('div.buy-full-list section.grounds-section li').each(function() {
		var link = $(this).find('.lcp_customfield').text();
		$(this).find('a').attr('href',link);	
		$(this).find('a').attr('target','_blank');		
	});

    $('.expandable-content-wrap:eq(0)').find('.panel-body').css('display','block');
    $('.expandable-content-wrap:eq(0)').find('.glyphicon-plus').addClass('glyphicon-minus').removeClass('glyphicon-plus');

    // cookie stuff
    var introTest = $.cookie('intro');
    if (introTest == 'true'){
        $('#intro-screen').remove();
        $('#image-51, #wrapper').css('visibility','visible');
        var pageHeight = $('body').height() * parallaxVariable;
        $('body').css({'overflow-y':'auto', 'overflow-x': 'hidden', height : pageHeight});
    }

    // squaring off blocks
    squareBlock('.post-it-wrap, .custom-block-wrap');

    // large screen navigation dropdown
    $('.dropdown').each(function(){
        if($(window).width() > 768 ) {
            $('<i></i>').addClass('glyphicon glyphicon-chevron-down').appendTo($(this));
        } else {
            $('<i></i>').addClass('glyphicon glyphicon-chevron-right').appendTo($(this));
        }
    });
    if($(window).width() > 768 ) {
        $('.dropdown').hover(function() {
            $(this).children('.sub-menu').stop().slideDown(100);
        },function() {
            $(this).children('.sub-menu').slideUp(100);
        });
    }

    // hover to reveal title on isotopes
    $('.item').hover(function() {
        $(this).find('.slideshow-title').stop().animate({bottom: 0},500);
    },function() {
        $(this).find('.slideshow-title').stop().animate({bottom: '-150px'},500);
    });

    // small screen navigation
	if($(window).width() < 768) {
		var leftNav = $('#left-side-nav');
		$('#mobile-menu-icon').click(function(e) {
			e.preventDefault();
			$(this).animate({opacity:0},200);
			leftNav.css('min-height',$(window).height()).css('max-height',$(window).height());
			leftNav.fadeIn(1,function() {
				$(this).animate({'margin-left': 0},500);
			});
			$('.close').click(function() {
				leftNav.animate({'margin-left': '-500px'},500,function() {
					$(this).fadeOut(1);
					$('#mobile-menu-icon').animate({opacity:1},300);
				})
			})
		});
	}		

    // mobile menu
    if($(window).width() < 768) {
        $('.dropdown').click(function(e) {
            //e.preventDefault();
            $('.sub-menu').fadeOut(200);
            $(this).find('.sub-menu').fadeIn(300);
        })
    }

    // slideshows
    $('.slideshow').each(function() {
        $(this).slidesjs({
            width: $(this).attr('data-width'),
            height: $(this).attr('data-height'),
            //navigation: false,
            play: {
                active: false,
                effect: "fade",
                interval: 5000,
                auto: true,
                pauseOnHover: true,
                restartDelay: 2500
            },
            navigation: {
                active: false
            },
            auto : 4000
        });
    });
    $('.in-fancybox').css('display','none');

    // modal windows
    $('.modal-message').each(function() {
        $(this).appendTo('body');
        $(this).modal({
            show : false
        })
    });

    // Opportunites page
    $('#opportunities-menu li a, #international').click(function(e) {
        var program = $(this).text();
        if(program == 'contact us') {
            $('#program-select').val('International Distribution');
        } else {
            $('#program-select').val(program);
        }
    });
    var oppGoodHeight = $('.opportunity-block:eq(2)').height();
    var oppBadHeight =  $('.opportunity-block:eq(1)').height();
    var diff = oppGoodHeight - oppBadHeight;
    $('.opportunity-block:eq(1) img').css('padding-top', diff/2).css('padding-bottom',diff/2);

    $('#hidden_iframe_opps').load(function(){
        if(submitted == true){
            $('#opportunity-contact form').fadeOut(400,function() {
                $('#submit-confirmation-opps').fadeIn(400)
            });
        }
    });

    // email form
    $('#hidden_iframe').load(function(){
        if(submitted == true){
            $('.join-button').fadeOut(400);
            $('#email-form-signup').fadeOut(400,function() {
                $('#submit-confirmation').fadeIn(400)
            });
        }
    });
    $('#hidden_iframe_header').load(function(){
        if(submitted == true){
            $('#email-form-signup-header').fadeOut(400,function() {
                $('#submit-confirmation-header').fadeIn(400)
            });
        }
    });
	
	$('#hidden_iframe_prize').load(function(){
        if(submitted == true){
            $('#email-form-signup-prize').fadeOut(400,function() {
                $('#submit-confirmation-prize').fadeIn(400)
            });
        }
    });
	
	$('#hidden_iframe_coupon').load(function(){
        if(submitted == true){
			firstStep = $('.step-wrapper').eq(0);
            $('.step-content').slideDown(300);
			firstStep.find('.step-content').slideUp(200);
			firstStep.css('background','#ffc220 url(http://marleycoffee.com/wp-content/uploads/2014/11/checkmark.svg) no-repeat 95% 0');
        }
    });
	var secondStep = $('.step-wrapper').eq(1);	
	secondStep.find('.step-content').find('a').click(function() {
		secondStep.find('.step-content').slideUp(300);	
		secondStep.css('background','#ffc220 url(http://marleycoffee.com/wp-content/uploads/2014/11/checkmark.svg) no-repeat 95% 0');
	});

    $('#hidden_iframe_main').load(function(){
        if(submitted == true){
            $('#contact-page-form .marley-btn').fadeOut(400,function() {
                $('<h4></h4>').attr('id','submit-confirmation-main').css('display','none').appendTo('.thanks-catcher').text('Thanks!').fadeIn(400);
            });
        }
    });

    // Fancybox
	$("a.video-popup").click(function() {
		$.fancybox({
			'padding'             : 10,
			'helpers' : {
				'overlay' : {
					'locked' : false
				}
			},
			'autoScale'   : false,
			'transitionIn'        : 'none',
			'transitionOut'       : 'none',
			'title'               : this.title,
			'width'               : 680,
			'height'              : 495,
			'href'                : this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
			'type'                : 'swf',    // <--add a comma here
			'swf'                 : {'allowfullscreen':'true'} // <-- flashvars here
		});
		return false;
	});
	$('.popup').fancybox({
		helpers : {
			overlay : {
				locked : false
			}
		},
		width : $(this).find('.slideshow').attr('data-width'),
		height : $(this).find('.slideshow').attr('data-height'),
		autoSize : false,
		autoDimensions : false,
		fitToView : true,
		scrolling : 'no',
		onComplete : function () {
			$.fancybox.resize();
			$.fancybox.center();
		}
	});

    //Intro effects
    fullScreen_bg();
    //coffeeSteam();


    // coffee page
    coffeeNav();

    // recipe page
    toggleFAQ();

	//Activate Tabs for Pages
	setTabActive();
	
    //
    var mainPageSection = $('.dynamic-load');
    mainPageSection.each(function() {
     $('<div></div>').attr('class','section-loading').appendTo(this);
     })

    // open links in new window (small)
    $('a[rel=external]').click(function(){
        window.open(this.href, "myWindowName", "width=480, height=740");
        return false;
    });

    // music player (jplayer)
    var myPlaylist = new jPlayerPlaylist({
        jPlayer: "#jquery_jplayer_N",
        cssSelectorAncestor: "#jp_container_N"
    },  [
        {
            title:"Stir It Up",
            artist:"Bob Marley",
            mp3:"http://marleycoffee.com/wp-content/uploads/2014/01/stir_it_up.mp3",
            poster: "http://marleycoffee.com/wp-content/uploads/2014/02/MusicPlayer_BobMarley1.jpg"
        },
        {
            title:"One More Cup of Coffee",
            artist:"Bob Marley",
            mp3:"http://marleycoffee.com/wp-content/uploads/2014/01/one_more_cup_of_coffee.mp3",
            poster: "http://marleycoffee.com/wp-content/uploads/2014/02/MusicPlayer_BobMarley2.jpg"
        },
        {
            title:"Could You be Loved",
            artist:"Bob Marley",
            mp3:"http://marleycoffee.com/wp-content/uploads/2014/01/could_you_be_loved.mp3",
            poster: "http://marleycoffee.com/wp-content/uploads/2014/02/MusicPlayer_BobMarley3.jpg"
        },
        {
            title:"Jammin'",
            artist:"Bob Marley",
            mp3:"http://marleycoffee.com/wp-content/uploads/2014/01/jammin.mp3",
            poster: "http://marleycoffee.com/wp-content/uploads/2014/02/MusicPlayer_BobMarley4.jpg"
        },
        {
            title:"Lively Up Yourself",
            artist:"Bob Marley",
            mp3:"http://marleycoffee.com/wp-content/uploads/2014/01/lively_up_yourself.mp3",
            poster: "http://marleycoffee.com/wp-content/uploads/2014/02/MusicPlayer_BobMarley5.jpg"
        },
        {
            title:"Positive Vibration",
            artist:"Bob Marley",
            mp3:"http://marleycoffee.com/wp-content/uploads/2014/01/positive_vibration.mp3",
            poster: "http://marleycoffee.com/wp-content/uploads/2014/02/MusicPlayer_BobMarley6.jpg"
        },
        {
            title:"No Woman, No Cry",
            artist:"Bob Marley",
            mp3:"http://marleycoffee.com/wp-content/uploads/2014/01/05-No-Woman-No-Cry.mp3",
            poster: "http://marleycoffee.com/wp-content/uploads/2014/02/MusicPlayer_BobMarley7.jpg"
        }

    ], {
        playlistOptions: {
            enableRemoveControls: false
            //autoPlay : true
        },
        swfPath: "js",
        supplied: "mp3",
        smoothPlayBar: true,
        keyEnabled: true,
        size: {
            width: '100%',
            height: '270px'
        },
        audioFullScreen: true
    });
	
	//blog
	$('#blog-container > .item').hover(function() {
		$(this).find('.panel-footer').find('p').stop().slideDown();
	},function() {
		$(this).find('.panel-footer').find('p').stop().slideUp();
	});

});

// ON LOAD
$(window).load(function() {
    fullScreenImages();
        /*$('#intro-load').fadeOut(1000,function() {
            $(this).remove();
        });*/
    $.cookie('intro', 'true', { path: '/' });
    // intro screen
    $('#marley-logo').animate({opacity : 1},1500,function() {
        $('#down-arrow').fadeIn(1,function() {
            $(this).animate({'backgroundPositionY': '102%',
                             'backgroundPositionX': '50%'}, 500,function() {
                $(this).click(function() {
                    locked = 1;
                    $(this).remove();
                    $('.full-screen-image').animate({'margin-top' : '-'+$(window).height()+'px'},1000);
                    $('#wrapper').css('visibility','visible');
                    $('#intro-screen').slideUp(1000,function() {
                        $('#image-51').css('visibility','visible');
                    });
                    var pageHeight = $('body').height() * parallaxVariable;
                    $('body').css({'overflow-y':'auto', 'overflow-x': 'hidden', height : pageHeight});
                })

            });
        });
    });
    if($('body').hasClass('.page-template-coffee_ajax-php')){
        $('.pillar-header img').animate({'margin-top':'0'},1000);
    }
})

// SCROLL
$(window).scroll(function() {
    $('#footer').css('visibility','visible');
    if($('body').hasClass('home')) {
        var distance = $('#wrapper').offset().top;
        if ( $(window).scrollTop() >= distance ) {
            $('#navigation-wrap').addClass('fixed-position');
            $('#wrapper > .container').css('padding-top','155px');
            $('#marley-logo').css('visibility','hidden');
            $('#image-51').css('visibility','visible').addClass('remain-visible');
        } else {
            $('#navigation-wrap').removeClass('fixed-position');
            $('#image-51').css('visibility','hidden');
            $('#marley-logo').css('visibility','visible');
            $('#wrapper > .container').css('padding-top','0');
        }
    }
    footerDisplay(500);
});

$(window).resize(function() {
    // small screen navigation
    var leftNav = $('#left-side-nav');
    leftNav.css('min-height',$(window).height()).css('max-height',$(window).height());

})

// FUNCTIONS
function backpositionHack() {
    var div = document.createElement('div'),
        rposition = /([^ ]*) (.*)/;

    if (div.style.backgroundPositionX !== '') {
        $(['X', 'Y']).each(function( i, letter ) {
            var property = 'backgroundPosition'+letter,
                isX = letter == 'X';
            $.cssHooks[property] = {
                set: function( elem, value ) {
                    var current = elem.style.backgroundPosition;
                    elem.style.backgroundPosition = (isX? value + ' ' : '' ) + (current? current.match(rposition)[isX+1] : '0') + (isX? '' : ' ' + value);
                },
                get: function( elem, computed ) {
                    var current = computed?
                        $.css( elem, 'backgroundPosition' ):
                        elem.style.backgroundPosition;
                    return current.match(rposition)[!isX+1];
                }
            };
            $.fx.step[property] = function( fx ) {
                $.cssHooks[property].set( fx.elem, fx.now + fx.unit );
            }
        });
    }
    div = null;
}
function footerDisplay(time) {
    if($(window).scrollTop() + $(window).height() == $(document).height()) {
       $('#coffee-cup').stop().animate({right:0},500);
    }
    if($(window).scrollTop() + $(window).height() < $(document).height() - 50 ) {
        $('#coffee-cup').stop().animate({right: '-500px'},500);
    }
}

function squareBlock (element) {
    var that = $(element);
    var padding = 40;
    var elementWidth = that.width() + padding;
    that.css('min-height',elementWidth+'px');
}

function setTabActive() {
	var checkURL = $(location).attr('href');
    var tab = $('#left-sorter li');
	var selector = '';
	
    tab.find('a').removeClass('selected');
    if(checkURL.indexOf('articles') > 0) {
        tab.eq(1).find('a').addClass('selected');
		selector = '.print';
    } else if(checkURL.indexOf('videos') > 0) {
        tab.eq(2).find('a').addClass('selected');
		selector = '.videos';
    } else {
        tab.eq(0).find('a').addClass('selected');
		selector = '*';
    }
	
	console.log(selector);
	$('#media-container').imagesLoaded( function(){
        $('#media-container').isotope({
            filter : selector
        });
    });
}

function fullScreen_bg() {
    var theWindow = $(window),
        $bg = $(".full-screen-image"),
        aspectRatio = $bg.width() / $bg.height();
    theWindow.resize(resizeBg).trigger("resize");
    function resizeBg() {
        if ( (theWindow.width() / theWindow.height()) < aspectRatio ) {
            $bg
                .removeClass('bgwidth')
                .addClass('bgheight');
        } else {
            $bg
                .removeClass('bgheight')
                .addClass('bgwidth');
        }
    }
}
function fullScreenImages() {
    var container = $('.full-screen-image');
    container.css({width : $(window).width(),
        height : $(window).height()});
    var imageCount = container.length;
    var index = Math.floor(Math.random() * imageCount);
    var selectedImage = container.eq(index);
    //selectedImage.addClass('active-bg');
    $('.active-bg').fadeIn(1000);
    setInterval(function() {
        if (locked != 1) {
            $('.active-bg').stop(true,true).fadeOut(1000);
            var nextBigItem = $('.active-bg').next('img');
            container.removeClass('active-bg');
            nextBigItem.addClass('active-bg');
            $('.active-bg').stop(true,true).fadeIn(800);
            if(nextBigItem.length < 1) {
                $('.full-screen-image:eq(0)').addClass('active-bg');
                $('.active-bg').fadeIn(800);
            }
        }
    },4000);
}

function sectionChunk(element,pathTrain,content,callbackFunction){
    var fnSettings;
    fnSettings = {
        catcher: element,
        path: pathTrain,
        contentBlock: content,
        callback : function() {
            if(!callbackFunction) {
                return false;
            } else {
                callbackFunction.call();
            }
        }
    };
    loadRequest( fnSettings );
}
function loadRequest( settings ) {
    $(settings.catcher).load( settings.path+settings.contentBlock, settings.callback);
}
function finishLoad(){
    $('.section-loading').fadeOut(500,function(){
        $(this).remove();
    })
}
function addRows(elementID){
    $(window).load(function() {
        var divs = $(elementID+' .ground-item');
        for(var i = 0; i < divs.length; i+=4) {
            divs.slice(i, i+4).wrapAll('<div class="row"></div>');
        }
    });

     finishLoad();
}
function coffeeNav() {
    var lastId,
        topMenu = $('#coffee-nav'),
        topMenuHeight = topMenu.outerHeight() - 185,
        menuItems = topMenu.find('a'),
        scrollItems = menuItems.map(function(){
            var item = $($(this).attr('href'));
            if (item.length) { return item; }
        });

    menuItems.click(function(e){
        var href = $(this).attr('href'),
            offsetTop = href === "#" ? 0 : $(href).offset().top-topMenuHeight+1;
        $('html, body').stop().animate({
            scrollTop: offsetTop
        }, 1000);
        e.preventDefault();
    });
}

function toggleFAQ() {
    $('.panel-heading').click(function() {
        var icon = $(this).children('span');
        var parent = $(this).parent('.panel');
        var answer = parent.children('.panel-body');
        answer.slideToggle(1);
        if(icon.hasClass('glyphicon-plus')) {
            icon.removeClass('glyphicon-plus').addClass('glyphicon-minus');
        } else {
            icon.removeClass('glyphicon-minus').addClass('glyphicon-plus');
        }
    })
}

