<div class="postmeta">
	<div class="icon aside"></div>
<?php get_template_part( 'content', 'meta' ); ?>
</div>
<div class="entry-content">
	<?php echo get_post_meta($post->ID, 'sn_aside_post', true); ?>
</div>