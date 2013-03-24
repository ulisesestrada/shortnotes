<?php
$postid = $post->ID;
$embed = get_post_meta($post->ID, 'sn_video_post_embed', $single = true);
?>
<div class="postmeta">
	<div class="icon video"></div>
	<?php get_template_part( 'content', 'meta' ); ?>
</div>
<h2><?php the_title();?></h2>
<div class="entry-content">
<?php if ( !is_singular() ) { ?>
	<?php
        if( !empty( $embed ) ) {
            echo stripslashes(htmlspecialchars_decode($embed));
        } else {
        	player_video($postid);
		 }
	?>
<?php } else { ?>
	<?php
        if( !empty( $embed ) ) {
        	$embed = get_post_meta($post->ID, 'sn_video_post_embed', $single = true);
            echo stripslashes(htmlspecialchars_decode($embed));
        } else {
			player_video($postid);
        }?>
		<?php the_content();?>

<?php } ?>
<?php if(has_tag()){?>
<div class="tags"><?php the_tags('<strong>Tags:</strong> ', ', ', '<br />'); ?></div>
<?php }?>
</div>