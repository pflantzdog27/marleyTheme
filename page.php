<?php get_header(); ?>


    <div class="container">
        <div id="inner-template">
            <?php if (have_posts()) :?>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="main-inner col-sm-12">
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
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4d9b516371593d6d"></script>

<?php get_footer(); ?>
