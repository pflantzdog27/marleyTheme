<?php require_once('header.php');?>
        <div class="container">
            <div id="inner-template" class="no-white">
				<div class="banner-image row">
					<h2></h2>
				</div>
                <section id="blog-container">
                    <?php if ( have_posts() ) :
                        while ( have_posts() ) : the_post(); ?>
                            <?php $blog_categories = wp_get_post_categories( $post->ID );
                            $blogCats = array();
                            foreach($blog_categories as $bc){
                                $blogCat = get_category( $bc );
                                $blogCats[] = $blogCat->slug;
                            }?>
                            <div class="item col-xs-6 col-sm-4 <?php echo implode(' ',$blogCats);?>">
                                <article>
									<article class="news-content">
										<?php if(get_field('marley_blog_featured')) {?>
											<img class="img-responsive" src="<?php the_field('marley_blog_featured'); ?>" alt="<?php the_title(); ?>">
										<?php } else { ?>
											<img class="img-responsive" src="<?php bloginfo('template_url') ?>/images/logo.jpg" alt="<?php the_title(); ?>">
										<?php } ?>	
									</article>
									<div class="panel-footer">
										<h3 class="media-heading">
											<a href="<?php the_permalink() ?>" target="_blank">
												<?php the_title(); ?>
											</a>
										</h3>
										<?php if(get_field('marley_blog_intro')) :?> 
											<p><?php the_field('marley_blog_intro'); ?></p>
										<?php endif;?>	
										<a href="<?php the_permalink();?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
									</div>
                                </article>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                </section>
            </div>
        </div>

<?php require_once('footer.php');?>