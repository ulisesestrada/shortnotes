<?php get_header(); ?>
<?php  $format = get_post_format( $post->ID );?>
<!-- begin #main -->
<div id="main">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
		<article class="<?php echo $format;?>-post">
			<?php 
			if(!$format==''): get_template_part( 'lib/post-formats/'.$format ); 
			else: get_template_part( 'lib/post-formats/standard');
			endif;
			?>
		</article>

			<?php comments_template(); ?>
			<?php endwhile; ?>
			<?php else : ?>
				<p><?php _e("Sorry, but you are looking for something that isn't here.","site5framework")?></p>
			<?php endif; ?>
	</div>
	<!-- end #main -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>