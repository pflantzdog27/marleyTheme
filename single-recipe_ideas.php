<?php require_once('header.php');?>
    <div class="container">
        <div id="inner-template" class="no-white">
            <div class="recipe-body">
                <?php if ( have_posts() ) :
                    while ( have_posts() ) : the_post(); ?>
                        <h2><?php the_title(); ?></h2>
                        <?php if(get_field('recipe_intro')):?>
                            <p><?php the_field( "recipe_intro" ); ?></p>
                        <?php endif; ?>
                        <?php if(get_field('recipe_image')):?>
                            <img src="<?php the_field('recipe_image')?>" class="img-responsive" alt="<?php the_field( "inactive_tab" ); ?>">
                        <?php endif; ?>
                        <div class="recipe-section">
                            <h5>INGREDIENTS:</h5>
                            <?php the_field('ingredients')?>
                        </div>
                        <div class="recipe-section">
                            <h5>INSTRUCTIONS:</h5>
                            <?php the_field('recipe_instructions')?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                <div class="back-command">
                    <i class="glyphicon glyphicon-chevron-left"></i><a href="<?php echo
                    get_post_type_archive_link( 'recipe_ideas' );
                    ?>">Back to RECIPES</a>
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
    </div>
<?php require_once('footer.php');?>