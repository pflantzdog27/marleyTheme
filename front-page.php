<?php get_header(); ?>

    <div class="container">
        <section id="isotopes-container">
            <!-- SLIDESHOW -->
            <?php $slideshowBlocks = array( 'post_type' => 'slideshow_blocks');
            $slideshows = new WP_Query( $slideshowBlocks );
            if ( have_posts() ) :
                while ( $slideshows->have_posts() ) : $slideshows->the_post();?>
                    <?php $slideshow_categories = wp_get_post_categories( $post->ID );
                    $slideshowCats = array();
                    foreach($slideshow_categories as $sc){
                        $slideshowCat = get_category( $sc );
                        $slideshowCats[] = $slideshowCat->name;
                    }?>
                    <div class="item <?php echo implode(' ',$slideshowCats);?> col-xs-<?php the_field('isotope_width_mobile');?>  col-sm-<?php the_field('isotope_width');?>" data-order="<?php the_field('sort_priority')?>">
                        <article class="inner-isotope-contents">
                            <?php if( get_field( "type_of_slideshow" ) == 'Images open in Lightbox') { ?>
                                <a class="popup" href="#slideshow-overlay-view-<?php the_ID();?>">
                                    <img class="img-responsive" src="<?php the_field ('slideshow_poster') ?>" alt="<?php the_title();?>">
                                    <img class="play-overlay" src="<?php bloginfo('template_url');?>/images/slideshow-icon.png" alt="">
                                </a>
                                <div id="slideshow-overlay-view-<?php the_ID();?>" class="slideshow in-fancybox" data-width="<?php the_field('data_width_slideshow') ?>" data-height="<?php the_field ('data_height_slideshow') ?>">
                                    <?php $images = get_field( "slideshow_images" );?>
                                    <?php if($images ) {
                                        foreach( $images as $image ): ?>
                                            <img class="img-responsive" src="<?php echo $image['url']; ?>" alt="<?php if($image['alt']){echo $image['alt'];} else {echo 'Slideshow Image';}?>">
                                        <?php endforeach;
                                    }?>
                                </div>
                            <?php } else if( get_field( "type_of_slideshow" ) == 'Linked Content') { ?>
                                <a href="<?php the_field('slideshow_link');?>">
                                    <div id="slideshow-<?php the_ID();?>" class="slideshow" data-width="<?php the_field ('data_width_slideshow') ?>" data-height="<?php the_field ('data_height_slideshow') ?>">
                                        <?php $images = get_field( "slideshow_images" );?>
                                        <?php if($images ) {
                                            foreach( $images as $image ): ?>
                                                <img class="img-responsive" src="<?php echo $image['url']; ?>" alt="<?php if($image['alt']){echo $image['alt'];} else {echo 'Slideshow Image';}?>">
                                            <?php endforeach;
                                        }?>
                                    </div>
                                </a>
                                <footer class="slideshow-title">
                                    <?php if( get_field( "slideshow_link" )){ ?>
                                        <h4><a href="<?php the_field('slideshow_link');?>"><?php the_title(); ?></a></h4>
                                    <?php } else { ?>
                                        <h4><?php the_title(); ?></h4>
                                    <?php } ?>
                                </footer>
                            <?php } else { ?>
                                <div id="slideshow-<?php the_ID();?>" class="slideshow" data-width="<?php the_field ('data_width_slideshow') ?>" data-height="<?php the_field ('data_height_slideshow') ?>">
                                    <?php $images = get_field( "slideshow_images" );?>
                                    <?php if($images ) {
                                        foreach( $images as $image ): ?>
                                            <img class="img-responsive" src="<?php echo $image['url']; ?>" alt="<?php if($image['alt']){echo $image['alt'];} else {echo 'Slideshow Image';}?>">
                                        <?php endforeach;
                                    }?>
                                </div>
                            <?php } ?>
                        </article>
                    </div>
                <?php endwhile; ?>
            <?php endif; wp_reset_query(); ?>

            <!-- VIDEO -->
            <?php $videoBlocks = array( 'post_type' => 'video_blocks');
            $videos = new WP_Query( $videoBlocks );
            if ( have_posts() ) :
                while ( $videos->have_posts() ) : $videos->the_post();?>
                    <?php $video_categories = wp_get_post_categories( $post->ID );
                    $cats = array();
                    foreach($video_categories as $vc){
                        $cat = get_category( $vc );
                        $cats[] = $cat->name;
                    }?>
                    <div class="item <?php echo implode(' ',$cats);?> col-xs-<?php the_field('isotope_width_mobile');?>  col-sm-<?php the_field('isotope_width');?>" data-order="<?php the_field('sort_priority')?>">
                        <article class="inner-isotope-contents">
                            <a class="video-popup" href="<?php the_field( "video_url" )?>">
                                <img class="col-sm-12 img-responsive" src="<?php the_field( "video_poster" ); ?>" alt="<?php the_title(); ?>">
                                <img class="play-overlay" src="<?php bloginfo('template_url');?>/images/play-overlay.png" alt="">
                            </a>
                            <?php include('share.php');?>
                        </article>
                    </div>
                <?php endwhile; ?>
            <?php endif; wp_reset_query(); ?>


            <!-- IMAGE -->
            <?php $graphicBlocks = array( 'post_type' => 'image_blocks');
            $graphics = new WP_Query( $graphicBlocks );
            if ( have_posts() ) :
                while ( $graphics->have_posts() ) : $graphics->the_post();?>
                    <?php $graphic_categories = wp_get_post_categories( $post->ID );
                    $graphicCats = array();
                    foreach($graphic_categories as $gc){
                        $graphicCat = get_category( $gc );
                        $graphicCats[] = $graphicCat->name;
                    }?>
                    <div id="image-<?php the_ID(); ?>" class="item <?php echo implode(' ',$graphicCats);?> col-xs-<?php the_field('isotope_width_mobile');?>  col-sm-<?php the_field('isotope_width');?>" data-order="<?php the_field('sort_priority')?>">
                        <article>
                            <?php if( get_field( "image_overlay" ) ){ ?>
                                <a class="popup" href="<?php the_field( "image_overlay" ); ?>"><img class="col-xs-12 img-responsive" src="<?php the_field('image_upload_select');?>"></a>
                            <?php } elseif (get_field( "more_content" )) {?>
                                <a href="<?php the_permalink();?>"><img class="col-xs-12 img-responsive" src="<?php the_field('image_upload_select');?>"></a>
                            <?php } elseif (get_field( "link_to_page" )) {?>
                                <a <?php if( get_field( "open_new_tab" ) ){ ?> target="_blank"<?php } ?> href="<?php the_field('link_to_page');?>"><img class="col-xs-12 img-responsive" src="<?php the_field('image_upload_select');?>"></a>
                            <?php } else { ?>
                                <img class="col-xs-12 img-responsive" src="<?php the_field('image_upload_select');?>">
                            <?php } ?>
                            <?php include('share.php');?>
                        </article>
                    </div>
                <?php endwhile; ?>
            <?php endif; wp_reset_query(); ?>
            <!-- NOTE -->
            <?php $noteBlocks = array( 'post_type' => 'note_blocks');
            $notes = new WP_Query( $noteBlocks );
            if ( have_posts() ) :
                while ( $notes->have_posts() ) : $notes->the_post();?>
                    <?php $note_categories = wp_get_post_categories( $post->ID );
                    $noteCats = array();
                    foreach($note_categories as $nc){
                        $noteCat = get_category( $nc );
                        $noteCats[] = $noteCat->name;
                    }?>
                    <div id="image-<?php the_ID(); ?>" class="item <?php echo implode(' ',
                        $noteCats);?> col-sm-<?php the_field('isotope_width');?> <?php the_field('isotope_width_mobile');?>-xs" data-order="<?php the_field('sort_priority')?>">
                            <article class="inner-isotope-contents">
                                <div class="post-it-wrap">
                                    <?php the_field('note_content');?>
                                    <footer class="signature"></footer>
                                </div>
                                <?php include('share.php');?>
                            </article>
                        </div>
                <?php endwhile; ?>
            <?php endif; wp_reset_query(); ?>

            <!-- CUSTOM -->
            <?php $customBlocks = array( 'post_type' => 'custom_block');
            $custom = new WP_Query( $customBlocks );
            if ( have_posts() ) :
                while ( $custom->have_posts() ) : $custom->the_post();?>
                    <?php $custom_categories = wp_get_post_categories( $post->ID );
                    $customCats = array();
                    foreach($custom_categories as $cc){
                        $customCat = get_category( $cc );
                        $customCats[] = $customCat->name;
                    }?>
                    <div id="custom-<?php the_ID(); ?>" class="item <?php echo implode(' ',$customCats);?> col-xs-<?php the_field('isotope_width_mobile');?>  col-sm-<?php the_field('isotope_width');?>" data-order="<?php the_field('sort_priority')?>">
                        <article class="inner-isotope-contents">
                            <div class="custom-block-wrap <?php the_field('background_choice')?>">
                                <?php the_field('custom_content_area');?>
                            </div>
                            <?php include('share.php');?>
                        </article>
                    </div>
                <?php endwhile; ?>
            <?php endif; wp_reset_query(); ?>
        </section>
    </div>

<?php get_footer(); ?>
