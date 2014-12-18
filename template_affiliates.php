<?php
/*
Template Name: Affiliates Layout
*/
?>
<?php get_header(); ?>

<div class="container">
    <div id="inner-template" class="no-white">
        <section class="multi-section-page">
            <header class="page-title">
                <h2 style="text-align: center;">Marley Coffee Affiliates / Partners</h2>
            </header>
                    <p>Already in business with Marley Coffee®? This is your exclusive log-in to find Marley Coffee marketing tools and resources. Simply click the appropriate <strong>“Brand Assets”</strong> button and then enter your email and password to gain access to Brand Folder.</p>
                    <p>If you have not yet requested a password, please click the <strong>“Request Access”</strong> button and fill out and submit the form. A log-in will be sent to you within 2 business days.</p>
                    <p>We actively monitor the use of the Marley Coffee Brand Mark on promotional material in the marketplace and will take appropriate action to protect its integrity. Use of all Marley Coffee marks must be pre-approved in writing by the Art Department. Email
<a href="mailto:artdept@marleycoffee.com">artdept@marleycoffee.com</a></p>
                <br>
            <div class="row">
                <div class="col-sm-4"><a class="col-sm-12 btn btn-default marley-btn" href="https://brandfolder.com/marleycoffee" target="_blank" onclick="Brandfolder.showEmbed({brandfolder_id: 'marleycoffee'});return false;">Brand Assets North America</a></div>
                <div class="col-sm-4"><a class="col-sm-12 btn btn-default marley-btn" href="https://brandfolder.com/marleycoffeeinternational" target="_blank" onclick="Brandfolder.showEmbed({brandfolder_id: 'marleycoffeeinternational'});return false;">Brand Assets International</a></div>
                <div class="col-sm-4"><a class="col-sm-12 btn btn-default marley-btn-reverse" href="https://docs.google.com/a/ogilvy.com/forms/d/1pfLRTQN6Abr9Nm_cP_14oeXPu9cv-HadTITjSz8miJo/viewform" target="_blank">Request Access</a></div>
            </div>
            <div class="clearfix"></div>
        </section>
        <section class="multi-section-page">
            <header class="page-title">
                <h2 style="text-align: center;">Foodservice / Hospitality / Office Coffee Service Products</h2>
            </header>
            <nav id="coffee-nav" class="hidden-xs row">
                <ul>
                    <li class="col-sm-4 twoLB"><a href="#twoLB"><strong>2-lb Bags</strong><br>Whole Bean or Ground
                            Coffee</a></li>
                    <li class="col-sm-4 fracs"><a href="#fracs"><strong>Fracs</strong><br>(2.5oz Fractional
                            Packs)
                        </a></li>
                    <li class="col-sm-4 pods"><a href="#breakroom-pods"><strong>Breakroom Pods</strong><br>Coffee and
                            Tea</a></li>
                </ul>
            </nav>
        </section>

        <?php if (have_posts()) :?>
            <?php while (have_posts()) : the_post(); ?>

                <?php the_content();?>

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
    </div> <!-- inner-template -->
</div> <!-- container -->



<?php get_footer(); ?>
<script>
    sectionChunk('#twoLB','<?php bloginfo('url')?>/two-lb',' .grounds-section > *',finishLoad());
    sectionChunk('#fracs','<?php bloginfo('url')?>/fracs',' .grounds-section > *',finishLoad());
    sectionChunk('#breakroom-pods','<?php bloginfo('url')?>/breakroompods',' .grounds-section > *',finishLoad());
</script>
