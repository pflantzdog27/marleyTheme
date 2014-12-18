<?php
/*
Template Name: Expandable Tabs
*/
?>
<?php get_header(); ?>
    <div class="container">
        <div id="inner-template">
            <?php if ( have_posts() ) :
                $pageTitle = '';
                while ( have_posts() ) : the_post(); ?>
                    <?php $pageTitle = get_the_title();?>
                    <header class="sub-page-header">
                        <h1><?php the_title();?></h1>
                        <p><?php the_content(); ?></p>
                    </header>
                <?php endwhile; ?>
            <?php endif; wp_reset_query(); ?>

            <?php $tabBlocks = array( 'post_type' => 'expandable_tab', 'order' =>'asc', 'tab_group' => $pageTitle);
            $tabs = new WP_Query( $tabBlocks );
            if ( have_posts() ) :
                while ( $tabs->have_posts() ) : $tabs->the_post();?>
                    <div class="expandable-content-wrap">
                        <section class="tab-item">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h2 class="panel-title"><?php the_field( "inactive_tab" ); ?></h2>
                                    <span class="glyphicon glyphicon-plus"></span>
                                </div>
                                <div class="panel-body">
                                    <?php the_field( "active_tab" ); ?>
                                </div>
                            </div>
                        </section>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
            <?php if (is_page( '10 Steps to Coffee: From Seed to Cup' )) { ?>
                <br><p>Source: <a href="http://ncausa.org" target="_blank">National Coffee Association USA</a>  </p>
            <?php } ?>

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