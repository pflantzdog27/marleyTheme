<?php
/*
Template Name: Super Simple Layout
*/
?>


<?php get_header(); ?>


<div class="container">
    <div id="inner-template" class="no-white">
            <?php if (have_posts()) :?>
                <?php while (have_posts()) : the_post(); ?>
                   <?php the_content();?>
                <?php endwhile;?>
            <?php endif; ?>
        <div class="clearfix"></div>
        <div class="page-share">
            <strong class="share-command">SHARE:</strong>
            <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
                <a class="addthis_button_facebook"></a>
                <a class="addthis_button_twitter"></a>
                <a class="addthis_button_pinterest_share"></a>
                <a class="addthis_button_google_plusone_share"></a>
                <a class="addthis_button_email"></a>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<?php get_footer(); ?>
