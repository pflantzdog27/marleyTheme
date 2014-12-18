<?php
/*
Template Name: Fifty Fifty Layout
*/
?>


<?php get_header(); ?>


<div class="container">
    <div id="inner-template">
        <div class="row">
            <?php if (have_posts()) :?>
                <?php while (have_posts()) : the_post(); ?>
                    <aside class="inner-sidebar col-sm-6">
                        <figure class="sidebar-graphic">
                            <?php  if ( has_post_thumbnail() ) {
                                the_post_thumbnail('left-column-image', array('class' => 'img-responsive'));
                            } ?>
                        </figure>
                    </aside>
                    <div class="main-inner col-sm-6">
                        <header class="page-title">
                            <h2><?php the_title();?></h2>
                        </header>
                        <section id="page-content">
                            <?php the_content();?>
                        </section>
                    </div>
                <?php endwhile;?>
            <?php endif; ?>
        </div>
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
