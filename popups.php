<?php
/*
Template Name: Popups
*/
?>

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
    <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/jquery.fancybox.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/skin/blue.monday/jplayer.blue.monday.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/all.css">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>


<!-- start main content section -->
<div id="wrapper">

    <div class="container">
        <?php if (have_posts()) :?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="main-inner col-sm-12">
                    <section id="page-content">
                        <?php the_content();?>
                    </section>
                </div>
            <?php endwhile;?>
        <?php endif; ?>

    </div>
</div>

<?php get_footer(); ?>
