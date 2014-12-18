<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" <?php language_attributes() ?>><!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description') : wp_title(''); ?></title>	
	<link rel="shortcut icon" href="<?php bloginfo('template_url') ?>/images/favicon.ico">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS2 Feed" href="<?php bloginfo('rss2_url'); ?>">  
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/jquery.fancybox.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/skin/blue.monday/jplayer.blue.monday.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/all.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/buy.css">
	<?php wp_head(); ?>       
</head>  
<body <?php body_class(); ?>>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-47778501-1', 'marleycoffee.com');
    ga('send', 'pageview');

</script>
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '547492018672472',
            channelUrl : '<?php bloginfo('template_url') ?>/channel.php',
            status     : true,
            xfbml      : true
        });
    };
    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
    <?php if ( is_front_page() ) { ?>

        <section id="intro-screen">
            <img class="active-bg full-screen-image" src="<?php bloginfo('template_url') ?>/images/intro_screen_C.jpg">
            <img class="full-screen-image" src="<?php bloginfo('template_url') ?>/images/intro_screen_B.jpg">
            <img class="full-screen-image" src="<?php bloginfo('template_url') ?>/images/intro_screen_A.jpg">
            <img class="full-screen-image" src="<?php bloginfo('template_url') ?>/images/intro_screen_D.jpg">
            <div class="container">
                <img id="marley-logo" src="<?php bloginfo('template_url') ?>/images/logo.jpg" class="col-sm-3 col-xs-6" alt="Marley Coffee Logo">
            </div>
            <span id="down-arrow"></span>
        </section>
    <?php } ?>
<!-- start main content section -->
<div id="wrapper">
    <!-- large display nav -->
    <div id="navigation-wrap">
        <nav id="main-nav-wrap" class="navbar navbar-default navbar-inverse" role="navigation">
            <div class="container">
                <button id="mobile-menu-icon" type="button" class="btn btn-default visible-xs visible-sm">MARLEY COFFEE </button>
                <div class="row">
                    <?php $defaults = array(
                    'theme_location'  => 'main_nav',
                    'container'       => false,
                    'menu_class'      => false,
                    'items_wrap'      => '<ul id="main-nav" class="nav navbar-nav col-sm-12 col-md-9">%3$s</ul>'
                    );  wp_nav_menu( $defaults ); ?>

                    <ul class="nav navbar-nav navbar-right col-md-3 visible-md visible-lg" id="social-networks">
						<li id="email-icon"><a href="http://marleycoffee.com/contact-us/"></a></li>
                        <li id="instagram"><a target="_blank" href="http://instagram.com/marleycoffee"></a></li>
                        <li id="pintrest"><a target="_blank" href="http://www.pinterest.com/themarleycoffee/"></a></li>
						<li id="google-icon"><a target="_blank" href="https://plus.google.com/103727062090227968007"></a></li>
                        <li id="youtube"><a target="_blank" href="https://www.youtube.com/channel/UC0oDYys0d3sLZhLgjMP86wQ"></a></li>
                        <li id="twitter"><a target="_blank" href="https://twitter.com/MarleyCoffee"></a></li>
                        <li id="facebook"><a target="_blank" href="https://www.facebook.com/MarleyCoffee"></a></li>
                        <li id="music"><a href="http://marleycoffee.com/music-player/" rel="external"></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <?php if ( is_front_page() || is_post_type_archive('news_media') || is_post_type_archive('marley_blog')) { ?>
            <nav id="sort-nav" class="navbar navbar-default navbar-inverse hidden-xs" role="navigation">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8">
                            <?php if ( is_front_page()) { ?>
                                <ul class="filter option-set nav navbar-nav" id="left-sorter" data-filter-group="primary">
                                    <li><a class="selected" id="overview-tab" href="#" data-filter-value=".overview">Overview</a></li>
                                    <li><a href="#" data-filter-value=".coffee">Coffee</a></li>
                                    <li><a href="#" data-filter-value=".company">Company</a></li>
                                    <li><a href="#" data-filter-value=".community">Community</a></li>
                                </ul>
                                <ul class="filter option-set nav navbar-nav" data-filter-group="secondary">
                                    <li><a class="selected" href="#" data-filter-value="">All</a></li>
                                    <li><a href="#" data-filter-value=".pix">Pix</a></li>
                                    <li><a href="#" data-filter-value=".videos">Videos</a></li>
                                </ul>
							<?php } elseif ( is_post_type_archive('marley_blog')) { ?>
                                <ul class="filter option-set nav navbar-nav" id="left-sorter" data-filter-group="primary">
                                    <li><a class="selected" href="#" data-filter="*">All</a></li>
                                    <li><a href="#" data-filter=".news">News</a></li>
									<li><a href="#" data-filter=".giving-back">Giving Back</a></li>
									<li><a href="#" data-filter=".sustainability">Sustainability</a></li>
									<li><a href="#" data-filter=".stir-it-up">Stir it Up</a></li>
                                </ul>
                            <?php } else { ?>
                                <ul class="filter option-set nav navbar-nav" id="left-sorter" data-filter-group="primary">
                                    <li><a class="selected" href="#" data-filter="*">All</a></li>
                                    <li><a href="#" data-filter=".print">Print</a></li>
                                    <li><a href="#" data-filter=".videos">Videos</a></li>
									<li><a href="#" data-filter=".Blogs">Blogs</a></li>
                                    <li><a href="#" data-filter=".Awards">Awards</a></li>
                                </ul>
                            <?php } ?>
                        </div>
                        <div class="pull-right col-sm-4">
                            <form action="https://docs.google.com/forms/d/1E0_5ZzYZW6eDcx5XkegO76KQ3KHHmoxUR2oNqtQEMVM/formResponse" method="POST" target="hidden_iframe_header" id="email-form-signup-header" onsubmit="submitted = true">
                                <input class="col-sm-6 email-input" type="email" placeholder="EMAIL" required name="entry.2058090366">
								<input type="hidden" name="entry.864996450" value="Homepage">
                                <input class="email-submit col-sm-6" type="submit" name="submit" value="JOIN EMAIL LIST">
                                <input type="hidden" name="draftResponse" value="[]">
                                <input type="hidden" name="pageHistory" value="0">
                            </form>
                            <iframe name="hidden_iframe_header" id="hidden_iframe_header" style="display:none;">
                            </iframe>
                            <h4 style="display: none" id="submit-confirmation-header">Thank you.</h4>
                        </div>
                    </div>
                </div>
            </nav>
        <?php } ?>
    </div>

    <nav id="left-side-nav" class="visible-xs" role="navigation">
        <button type="button" class="close" aria-hidden="true">&times;</button>
        <?php $defaults = array(
            'theme_location'  => 'main_nav',
            'container'       => false,
            'menu_class'      => false,
            'items_wrap'      => '<ul class="nav nav-pills nav-stacked">%3$s</ul>'
        );  wp_nav_menu( $defaults ); ?>
    </nav><!-- end small nav -->

