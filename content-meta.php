<div class="meta-text">
	<?php the_time('M j, Y') ?>
	<?php  $format = get_post_format( $post->ID );
	if($format=='audio' || $format=='video' || $format=='image' || $format=='gallery' || $format==''){
	?>
	<br>
	<img src="<?php echo get_template_directory_uri(); ?>/library/images/ico_comments.png"> <?php comments_popup_link('0 comments', '1 comment', ' % comments'); ?>
	<?php }?>
</div>
	
