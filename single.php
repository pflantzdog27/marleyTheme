<?php get_header(); ?>


<div class="container">
    <div id="inner-template" class="row">
        <?php if (have_posts()) :?>
            <?php while (have_posts()) : the_post(); ?>
                <aside class="inner-sidebar col-sm-3">
                    <figure class="sidebar-graphic">
                        <?php  if ( get_field('image_upload_select') ) { ?>
                            <img class="col-xs-12 img-responsive" src="<?php the_field('image_upload_select');?>">
                       <?php } ?>
                    </figure>
                </aside>
                <div class="main-inner col-sm-9">
                    <header class="page-title">
                        <h2><?php the_title();?></h2>
                    </header>
                    <section id="page-content">
                        <?php the_content();?>
                    </section>
                </div>
            <?php endwhile;?>
        <?php endif; ?>
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
