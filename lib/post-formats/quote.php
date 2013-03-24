<div class="postmeta">
	<div class="icon quote"></div>
<?php get_template_part( 'content', 'meta' ); ?>
</div>
<div class="entry-content">
	<h2><?php echo get_post_meta($post->ID, 'sn_quote_post', true); ?></h2>
	<span class="quote-author">~ <?php echo get_post_meta($post->ID, 'sn_quote_author', true); ?> ~</span>
</div>
