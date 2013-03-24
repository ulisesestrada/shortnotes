<script type="text/javascript">
	jQuery(document).ready(function($){

	/*  Flex Slider */
	      $('.flexslider').flexslider({
	        animation: "fade",
	        easing:"swing",
	        smoothHeight: true,
	        slideshow: false
	      });
	});
</script>
<div class="postmeta">
	<div class="icon gallery"></div>
<?php get_template_part( 'content', 'meta' ); ?>
</div>
<h2><?php the_title();?></h2>
<div class="entry-content">
	<div class="flexslider clearfix">
	  <ul class="slides">
	  	<?php
						//Pull gallery images from custom meta
						$gallery_image = get_post_meta($post->ID,'sn_gl_',true);
						if($gallery_image !=  ''){
							foreach ($gallery_image as $arr){

						echo '<li><a class="prettyPhoto[mixed]" href="'.$arr['sn_gallery_post_image']['src'].'"><img src="'.$arr['sn_gallery_post_image']['src'].'" alt="'.$arr['sn_gallery_post_image_title'].'" /></a><span>'.$arr['sn_gallery_post_image_title'].'</span></li>';

							}
						}
		?>
	  </ul>
	</div>
	<?php if (is_singular()): the_content();
		endif;?>
<?php if(has_tag()){?>
<div class="tags"><?php the_tags('<strong>Tags:</strong> ', ', ', '<br />'); ?></div>
<?php }?>
</div>