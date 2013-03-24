<?php
// Do not delete these lines

	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))

		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>

		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>

	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>

	<h3 class="h3comments" id="comments"><?php comments_number('No Comments', '1 Comment', '% Comments' );?> </h3>
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
				<div class="commentsNavigation" style="overflow:hidden;padding:10px 0 5px;">
					<div class="nav-previous" style="float:left"><strong><?php previous_comments_link( __( '&laquo; Older Comments' ) ); ?></strong></div>
					<div class="nav-next" style="float:right"><strong><?php next_comments_link( __( 'Newer Comments &raquo;' ) ); ?></strong></div>
				</div> <!-- .navigation -->

	<?php endif; // check for comment navigation ?>

	<ul class="commentlist">

	<?php wp_list_comments('callback=mytheme_comment'); ?>

	</ul>
	<div class="commentsNavigation" style="overflow:hidden">
					<div class="nav-previous" style="float:left"><strong><?php previous_comments_link( __( '&laquo; Older Comments' ) ); ?></strong></div>
					<div class="nav-next" style="float:right"><strong><?php next_comments_link( __( 'Newer Comments &raquo;' ) ); ?></strong></div>
				</div> <!-- .navigation -->
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open()) : ?>

		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>

		<!-- If comments are closed. -->

		<!--<p class="nocomments">Comments are closed.</p>-->

	<?php endif; ?>

<?php endif; ?>





<?php //if ('open' == $post->comment_status) :

		if ( comments_open() ) : ?>



<div id="respond">



<h3 id="commentsForm"><?php comment_form_title( 'Speak up! Let us know what you think.', 'Leave a comment to %s' ); ?></h3>



<div class="cancel-comment-reply">

	<small><?php cancel_comment_reply_link(); ?></small>

</div>



<?php if ( get_option('comment_registration') && !$user_ID ) : ?>

<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>

<?php else : ?>



<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">



<?php if ( $user_ID ) : ?>



<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>



<?php else : ?>



<p><label for="author">Name <?php if ($req) echo "(required)"; ?></label>

<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />

</p>



<p><label for="email">Mail (will not be published) <?php if ($req) echo "(required)"; ?></label>

<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />

</p>



<p><label for="url">Website</label>

<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />

</p>





<?php endif; ?>



<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->



<p><label for="comment">Comment</label>

<textarea name="comment" id="comment" cols="100%" rows="7" tabindex="4"></textarea></p>



<p><input name="submit" type="submit" id="submit" tabindex="5" class="but_purple" value="POST COMMENT" />

<?php comment_id_fields(); ?>

</p>

<?php do_action('comment_form', $post->ID); ?>



</form>



<?php endif; // If registration required and not logged in ?>

</div>



<?php endif; // if you delete this the sky will fall on your head ?>

