<?php
/*
Template Name: Ajax Coffee
*/
?>
<?php get_header(); ?>

    <div class="container">
        <div id="inner-template" class="no-white">
            <figure class="pillar-header col-sm-12">
                <img class="img-responsive" src="<?php bloginfo('template_url'); ?>/images/brand-pillars.png" alt="Sustainably Grown, Ethically Farmed, Artisan Roasted">
            </figure>
            <nav id="coffee-nav" class="row">
                <ul class="row fivecolumns">
                    <li class="col-sm-2 jbm"><a href="#jamaica-blue-mountain"><strong>Jamaica Blue
                                Mountain<span class="reg-trade">&reg;</span></strong><br>Whole Bean / Ground
                            <br>Coffee Bags</a></li>
                    <li class="col-sm-2 organic"><a href="#organic"><strong>Organic</strong><br>Whole Bean / Ground
                           <br> Coffee Bags</a></li>
                    <li class="col-sm-2 rfa"><a href="#rfa"><strong>Rainforest Alliance Certified™ </strong><br>Whole
                            Bean / Ground <br>Coffee Bags</a></li>
                    <li class="col-sm-2 real-cups"><a href="#real-cups"><strong>RealCup™ </strong><br>Single Serve
                            Cups</a></li>
                    <li class="col-sm-2 packets"><a href="#pods"><strong>Pods</strong><br>Coffee and Tea</a></li>
                </ul>
            </nav>

            <?php if (have_posts()) :?>
                <?php while (have_posts()) : the_post(); ?>

                    <?php the_content();?>

                <?php endwhile;?>
            <?php endif; ?>
            <br>
            <h5 class="plugin-text">In addition to these products,
                we also offer <strong>2-lb Bags</strong>
                    (ground and whole bean coffee),<br> <strong>2.5oz Single Serve Fracs</strong>,
                and <strong>Single Serve Pods</strong> for office/hospitality use.<br>
            See our <strong><a style="color: #3c1e06;" href="http://marleycoffee.com/affiliates-partners/">AFFILIATES/PARTNERS</a></strong> page for more
                    information on these Marley Coffee products.</h5>

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
        </div> <!-- inner-template -->
    </div> <!-- container -->



<?php get_footer(); ?>
<script>
    sectionChunk('#jamaica-blue-mountain','<?php bloginfo('url')?>/jamaica-blue-mountain',' .grounds-section > *', finishLoad());
    sectionChunk('#organic','<?php bloginfo('url')?>/organic',' .grounds-section > *',finishLoad());
    sectionChunk('#rfa','<?php bloginfo('url')?>/rainforest-alliance-certified',' .grounds-section > *', finishLoad());
    sectionChunk('#real-cups','<?php bloginfo('url')?>/keurig-compatible',' .grounds-section > *',finishLoad());
    sectionChunk('#pods','<?php bloginfo('url')?>/pods',' .grounds-section > *',finishLoad());
</script>