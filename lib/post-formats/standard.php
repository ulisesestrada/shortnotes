<div class="postmeta">
	<div class="icon standard"></div>
	<?php get_template_part( 'content', 'meta' ); ?>
</div>
	<h2><?php the_title();?></h2>
<div class="entry-content clearfix">
<?php the_content(__('Read More', 'site5framework')); ?>
<?php if(has_tag()){?>
<div class="tags"><?php the_tags('<strong>Tags:</strong> ', ', ', '<br />'); ?></div> 
<?php }?>
</div>