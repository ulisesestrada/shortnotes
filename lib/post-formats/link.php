<div class="postmeta">
	<div class="icon link"></div>
<?php get_template_part( 'content', 'meta' ); ?>
</div>
<h2><a href="<?php echo get_post_meta($post->ID, 'sn_link_post_url', true); ?>"><?php the_title(); ?></a></h2>
<span><?php echo get_post_meta($post->ID, 'sn_link_post_description', true); ?></span>