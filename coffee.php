<?php
/*
Template Name: Coffee Page
*/
?>
<?php get_header(); ?>

<div class="container">
    <div id="inner-template" class="no-white">
        <?php if (have_posts()) :?>
        <?php $pageTitle = '';?>
        <?php $layout = '';?>
        <section class="grounds-section">
            <header>
                <hgroup class="clearfix">
                    <div class="row">
                        <?php while (have_posts()) : the_post(); ?>
                        <?php $pageTitle = get_the_title();?>
                        <?php $layout = get_field('coffee_layout_options');?>
                            <?php if( get_field( "left_coffee_title" ) ): ?>
                                <h3 class="col-sm-7"><?php the_field('left_coffee_title');?></h3>
                            <?php endif;?>
                            <?php if( get_field( "right_coffee_title" ) ): ?>
                                <h3 class="col-sm-5 right_title"><?php the_field('right_coffee_title');?></h3>
                            <?php endif;?>
                            <?php if( get_field( "the_seal" ) ): ?>
                                <img class="coffee-seal" src="<?php the_field( "the_seal" ); ?>" alt="<?php the_title()?>">
                            <?php endif; ?>
                            <?php endwhile;?>
                    </div>
                </hgroup>
            </header>
            <div class="grounds-main">
                <div class="ground-items-wrap clearfix">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php if( get_field( "coffee_intro" ) ): ?>
                            <article class="intro-item">
                                <?php the_field('coffee_intro')?>
                            </article>
                        <?php endif; ?>
                    <?php endwhile;?>
                    <?php endif; wp_reset_query(); ?>
                    <?php $i = 1;?>
                    <?php $coffeeItems = array( 'post_type' => 'coffee_item','order' => 'asc' ,'coffee_group' => $pageTitle);?>
                    <?php $coffee = new WP_Query( $coffeeItems );
                    if ( have_posts() ) :
                        while ( $coffee->have_posts() ) : $coffee->the_post();?>
                            <?php if( $layout == 'Image on TOP of content'){?>
                                <?php if($i == 1) {echo '<div class="row">';} ?>
                                <div class="ground-item row-grouped col-sm-3">
                                    <figure class="col-sm-12 realcup">
                                        <img class="img-responsive" src="<?php the_field('coffee_image')?>" alt="<?php the_title();?>">
                                    </figure>
                                    <article class="col-sm-12">
                                        <h4><?php the_title()?></h4>
                                        <?php if(get_field('coffee_info')):?>
                                            <small><?php the_field('coffee_info')?></small>
                                        <?php endif; ?>
                                        <?php  $select_details = get_field( "coffee_details" );
                                        if( $select_details ){
                                            $select_details_list = array();
                                            foreach( $select_details as $select_detail):
                                                $select_details_list[] = '<li>' . $select_detail .'</li>';
                                            endforeach;

                                        } ?>
                                        <?php  $select_kosher = get_field( "kosher_specification" );
                                        if( $select_kosher ){
                                            $select_kosher_list = array();
                                            foreach( $select_kosher as $select_koshery):
                                                $select_kosher_list[] = '<li>' . $select_koshery .'</li>';
                                            endforeach;

                                        } ?>
                                        <?php  $select_origins = get_field( "coffee_origins" );
                                        if( $select_origins ){
                                            $select_origins_list = array();
                                            foreach( $select_origins as $select_origin):
                                                $select_origins_list[] = '<li>' . $select_origin .'</li>';
                                            endforeach;

                                        } ?>

                                        <ul>
                                            <?php if( $select_details ){
                                                echo implode(' ',$select_details_list);
                                            } ?>
                                            <?php if( $select_kosher ){
                                                echo implode(' ',$select_kosher_list);
                                            } ?>
                                            <?php if( $select_origins ){
                                                echo implode(' ',$select_origins_list);
                                            } ?>
                                            <?php  $grade = get_field( "coffee_grade" ); ?>
                                            <?php switch ($grade) {
                                                case "Light":
                                                    echo '<li><img class="grade" src="'.get_bloginfo("template_url") .'/images/grade_light.jpg" alt="Grade Light"></li>';
                                                    break;
                                                case "Light Medium":
                                                    echo '<li><img class="grade" src="'. get_bloginfo("template_url") .'/images/grade_lt_medium.jpg" alt="Grade Light Medium"></li>';
                                                    break;
                                                case "Medium":
                                                    echo '<li><img class="grade" src="'. get_bloginfo("template_url") .'/images/grade_medium.jpg" alt="Grade Medium"></li>';
                                                    break;
                                                case "Medium Dark":
                                                    echo '<li><img class="grade" src="'. get_bloginfo("template_url") .'/images/grade_med_dark.jpg" alt="Grade Medium Dark"></li>';
                                                    break;
                                                case "Dark":
                                                    echo '<li><img class="grade" src="'. get_bloginfo("template_url") .'/images/grade_dark.jpg" alt="Grade Strong"></li>';
                                                    break;
                                            } ?>
                                        </ul>
                                    </article>
                                </div>
                                <?php if($i % 4 == 0) {echo '</div><div class="row">';} ?>
                                <?php $i++; ?>
                            <?php } else { ?>
                                <div class="ground-item col-sm-4">
                                    <div class="row">
                                        <figure class="col-sm-6">
                                            <img class="img-responsive" src="<?php the_field('coffee_image')?>" alt="<?php the_title();?>">
                                        </figure>
                                        <article class="col-sm-6">
                                            <h4><?php the_title()?></h4>
                                            <?php if(get_field('coffee_info')):?>
                                                <small><?php the_field('coffee_info')?></small>
                                            <?php endif; ?>
                                            <?php  $select_details = get_field( "coffee_details" );
                                            if( $select_details ){
                                                $select_details_list = array();
                                                foreach( $select_details as $select_detail):
                                                    $select_details_list[] = '<li>' . $select_detail .'</li>';
                                                endforeach;

                                            } ?>
                                            <?php  $select_kosher = get_field( "kosher_specification" );
                                            if( $select_kosher ){
                                                $select_kosher_list = array();
                                                foreach( $select_kosher as $select_koshery):
                                                    $select_kosher_list[] = '<li>' . $select_koshery .'</li>';
                                                endforeach;

                                            } ?>
                                            <?php  $select_origins = get_field( "coffee_origins" );
                                            if( $select_origins ){
                                                $select_origins_list = array();
                                                foreach( $select_origins as $select_origin):
                                                    $select_origins_list[] = '<li>' . $select_origin .'</li>';
                                                endforeach;

                                            } ?>

                                            <ul>
                                                <?php if( $select_details ){
                                                    echo implode(' ',$select_details_list);
                                                } ?>
                                                <?php if( $select_kosher ){
                                                    echo implode(' ',$select_kosher_list);
                                                } ?>
                                                <?php if( $select_origins ){
                                                    echo implode(' ',$select_origins_list);
                                                } ?>
                                                <?php  $grade = get_field( "coffee_grade" ); ?>
                                                <?php switch ($grade) {
                                                    case "Light":
                                                        echo '<li><img class="grade" src="'.get_bloginfo("template_url") .'/images/grade_light.jpg" alt="Grade Light"></li>';
                                                        break;
                                                    case "Light Medium":
                                                        echo '<li><img class="grade" src="'. get_bloginfo("template_url") .'/images/grade_lt_medium.jpg" alt="Grade Light Medium"></li>';
                                                        break;
                                                    case "Medium":
                                                        echo '<li><img class="grade" src="'. get_bloginfo("template_url") .'/images/grade_medium.jpg" alt="Grade Medium"></li>';
                                                        break;
                                                    case "Medium Dark":
                                                        echo '<li><img class="grade" src="'. get_bloginfo("template_url") .'/images/grade_med_dark.jpg" alt="Grade Medium Dark"></li>';
                                                        break;
                                                    case "Dark":
                                                        echo '<li><img class="grade" src="'. get_bloginfo("template_url") .'/images/grade_dark.jpg" alt="Grade Strong"></li>';
                                                        break;
                                                } ?>
                                            </ul>
                                        </article>
                                    </div>
                                </div>
                            <?php } ?>


                        <?php endwhile; ?>
                    <?php endif; wp_reset_query(); ?>
                </div>
            </div>
        </section>
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
