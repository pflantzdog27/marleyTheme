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
				<div class="row">
					<div class="col-xs-2">
						<a href="#"><img id="mobile-menu-icon" class="img-responsive" src="<?php bloginfo('template_url') ?>/images/logo.jpg"></a>
					</div>
					<div class="col-xs-10" id="primary-links">
						<?php $defaults = array(
						'theme_location'  => 'main_nav',
						'container'       => false,
						'menu_class'      => false,
						'items_wrap'      => '<ul id="main-nav" class="nav navbar-nav col-sm-12">%3$s</ul>'
						);  wp_nav_menu( $defaults ); ?>
						<div class="row">
							<?php if ( is_front_page() || is_post_type_archive('news_media') || is_post_type_archive('marley_blog')) { ?>
							<nav id="sort-nav" class="col-xs-7 navbar navbar-default navbar-inverse hidden-xs" role="navigation">
									<?php if ( is_front_page()) { ?>
										<ul class="filter option-set nav navbar-nav" data-filter-group="secondary">
											<li><a class="selected" href="#" data-filter-value="">Overview</a></li>
											<li><a href="#" data-filter-value=".pix">Images</a></li>
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
							</nav>
							<?php } ?>
							<ul class="col-xs-5 list-unstyled" id="sub-nav-action">
								<li><a href="#">Log In</a></li>
								<li><a href="#">Join Email List</a></li>
							</ul>
						</div>
					</div>
				</div>	
            </div>
        </nav>
    </div>

    <nav id="left-side-nav" role="navigation">
        <button type="button" class="close" aria-hidden="true">&times;</button>
        <?php $defaults = array(
            'theme_location'  => 'main_nav',
            'container'       => false,
            'menu_class'      => false,
            'items_wrap'      => '<ul class="nav nav-pills nav-stacked">%3$s</ul>'
        );  wp_nav_menu( $defaults ); ?>
    </nav><!-- end small nav -->

