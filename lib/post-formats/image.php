<div class="postmeta">
	<div class="icon image"></div>
<?php get_template_part( 'content', 'meta' ); ?>
</div>
    <h2 class="entry-title"><?php the_title(); ?></h2>
    <?php
    $image_post_preview = get_post_meta($post->ID,'sn_image_post_preview',true);
    if($image_post_preview !=''){    echo '<a class="prettyPhoto[mixed]" href="'.$image_post_preview['src'].'"><img src="'.$image_post_preview['src'].'"></a>';    ?>
	<?php }?>
<div class="entry-content">
	<?php if( is_singular() ) { ?>
		<?php the_content();?>
	<?php } ?>
<?php if(has_tag()){?>
<div class="tags"><?php the_tags('<strong>Tags:</strong> ', ', ', '<br />'); ?></div>
<?php }?>
</div>


