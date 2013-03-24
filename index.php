<?php get_header(); ?>

			<!-- begin #main -->
			<div id="main">
					<!-- archive-title -->				
						<?php if(is_month()) { ?>
						<div id="archive-title">
						<?php _e('Posts from ', 'site5framework'); ?> "<strong><?php the_time('F, Y') ?></strong>"
						</div>
						<?php } ?>
						<?php if(is_search()) { ?>
						<div id="archive-title">
						<?php _e('Search results for ', 'site5framework'); ?> "<strong><?php echo get_search_query() ?></strong>"
						</div>
						<?php } ?>
						<?php if(is_category()) { ?>
						<div id="archive-title">
						<?php _e('Posts in ', 'site5framework'); ?> "<strong><?php $current_category = single_cat_title("", true); ?></strong>"
						</div>
						<?php } ?>
						<?php if(is_tag()) { ?>
						<div id="archive-title">
						<?php _e('Posts tagged with ', 'site5framework'); ?> "<strong><?php echo  single_tag_title( '', false ) ?></strong>"
						</div>
						<?php } ?>
					<!-- /archive-title -->
					
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	

						<!-- begin article -->
						<?php if ( has_post_format( 'image' ) ) : { ?>
						<article class="image-post">
							<?php  get_template_part( 'lib/post-formats/image' ); ?>
						</article>
						<?php }	elseif ( has_post_format( 'gallery' ) ) : { ?>
						<article class="gallery-post">
							<?php  get_template_part( 'lib/post-formats/gallery' ); ?>
						</article>
						<?php }	elseif ( has_post_format( 'video' ) ) : { ?>
						<article class="video-post">
							<?php  get_template_part( 'lib/post-formats/video' ); ?>
						</article>
						<?php }	elseif ( has_post_format( 'audio' ) ) : { ?>
						<article class="audio-post">
							<?php  get_template_part( 'lib/post-formats/audio' ); ?>
						</article>
						<?php }	elseif ( has_post_format( 'link' ) ) : { ?>
						<article class="link-post">
							<?php  get_template_part( 'lib/post-formats/link' ); ?>
						</article>
						<?php }	elseif ( has_post_format( 'quote' ) ) : { ?>
						<article class="quote-post">
							<?php  get_template_part( 'lib/post-formats/quote' ); ?>
						</article>
						<?php }	elseif ( has_post_format( 'aside' ) ) : { ?>
						<article class="aside-post">
							<?php  get_template_part( 'lib/post-formats/aside' ); ?>
						</article>
						<?php }	else : { ?>
						<article class="standard-post">
							<?php  get_template_part( 'lib/post-formats/standard' ); ?>
						</article>
						<?php }	endif; ?>
						<!-- end article -->
						<?php endwhile;
						endif;?>
                        
                        <!-- begin #pagination -->
    					<?php if (function_exists("wpthemess_paginate")) {
    					    wpthemess_paginate();
    					} ?>
    					<!-- end #pagination -->
			</div>
			<!-- end #main -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>