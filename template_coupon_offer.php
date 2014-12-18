<?php
/*
Template Name: Coupon Offer
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
                            <?php  if ( get_field('coupon_featured_image') ) { ?>
                                <img class="img-responsive" src="<?php the_field('coupon_featured_image');?>" alt="Coupon Offer Featured Image">
                            <?php } ?>
                        </figure>
                    </aside>
                    <div class="main-inner col-sm-6">
                        <header class="page-title">
							<?php if(get_field('coupon_title')) {?>
								<h2><?php the_field('coupon_title');?></h2>
							<?php } ?>
                        </header>
                        <section id="page-content">
							<?php if(get_field('coupon_content')) {?>
								<?php the_field('coupon_content');?>
							<?php } ?>	
							<?php if( have_rows('step_section') ): ?>
								<div id="step-app">
									<?php while ( have_rows('step_section') ) : the_row(); ?>
										<div class="step-wrapper">
											<div class="step-header">
												<h2><?php the_sub_field('step_title');?></h2>
											</div>
											<div class="step-content">
												<?php if(get_sub_field('step_type') == 'Email Form') { ?>												
													<form id="email-form-coupon" action="https://docs.google.com/forms/d/1E0_5ZzYZW6eDcx5XkegO76KQ3KHHmoxUR2oNqtQEMVM/formResponse" method="POST" target="hidden_iframe_coupon" onclick="submitted=true">
														<p><?php the_sub_field('pitch_for_email');?></p>
														<input style="width: 50%; border: 1px solid #3c1e06; padding: 5px; margin-bottom: 10px;" name="entry.2058090366" required="required" type="email" placeholder="EMAIL" />
														<input type="hidden" name="entry.864996450" value="<?php the_field('coupon_title');?>"> 
														<input class="email-submit" name="submit" type="submit" value="Submit" />
														<input name="draftResponse" type="hidden" value="[]" />
														<input name="pageHistory" type="hidden" value="0" />
													</form>
													<iframe id="hidden_iframe_coupon" style="display: none;" name="hidden_iframe_coupon" width="300" height="150"></iframe>													
												<?php } else if(get_sub_field('step_type') == 'Downloadable'){?>										
													<div>
														<p><?php get_sub_field('pitch_for_downloadable');?></p>
														<a href="<?php the_sub_field('coupon_downloadable');?>" download="Marley_Coffee_Coupon"><?php the_sub_field('button_verbage')?></a>
													</div>														
												<?php } else {
													the_sub_field('step_content');
													  } ?>
											</div>
										</div>
									<?php endwhile; ?>
								</div>
							<?php endif;  ?>
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
