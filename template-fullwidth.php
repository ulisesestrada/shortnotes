<?php get_header(); ?>
<?php
/*
Template Name: Full Width Page
*/
?>
	<!-- begin #main -->
	<div id="main" class="fullwidth clearfix">
			<h2><?php the_title();?></h2>
		<?php if (have_posts()) : while (have_posts()) : the_post(); 
		the_content();
		endwhile; ?>
		<?php else : ?>
			<p><?php _e("Sorry, but you are looking for something that isn't here.","site5framework")?></p>
		<?php endif; ?>
	</div>
	<!-- end #main -->
<?php get_footer(); ?>