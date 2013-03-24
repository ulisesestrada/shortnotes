<?php

/*********************************************************************************************
Add Theme Support
*********************************************************************************************/
add_theme_support( 'menus' );
add_editor_style('editor_style.css');

/*********************************************************************************************
Post & Page Thumbnails Support
*********************************************************************************************/
if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 50, 50, true ); // Normal post thumbnails
add_image_size( 'large', 800, '', false); // for use on blog pages
    }


/*********************************************************************************************
Custom Admin Login Logo
*********************************************************************************************/
function custom_login_logo() {
    if ( !of_get_option('shortnotes_clogo')== '') {
    echo '<style type="text/css">
    #login h1 a {background-image: url('.of_get_option('shortnotes_clogo').') !important; background-size: auto !important;  }
    </style>';
    }
}
add_action('login_head', 'custom_login_logo');


/*********************************************************************************************
Default Wordpress Gallery With PrettyPhoto
*********************************************************************************************/
add_filter( 'wp_get_attachment_link', 'site5framework_prettyphoto');

function site5framework_prettyphoto ($content) {
    $content = preg_replace("/<a/","<a class=\"prettyPhoto[mixed]\"",$content,1);
    return $content;
}


/*********************************************************************************************
Remove and Reformat Admin Footer
*********************************************************************************************/
function remove_footer_admin () {

$themename = get_theme_data(get_stylesheet_directory() . '/style.css');
$version = "version ".$themename['Version'];
$themename = $themename['Name'];

    echo "<b><a href=http://www.s5themes.com>$themename - $version</a></b> - Responsive Tumblog WordPress Theme | <a href=http://www.s5themes.com/>Designed by S5themes.com</a> ";
}
add_filter('admin_footer_text', 'remove_footer_admin');


/*********************************************************************************************
Enable Threaded Comments
*********************************************************************************************/
function enable_threaded_comments(){
if (!is_admin()) {
     if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1))
          wp_enqueue_script('comment-reply');
     }
}

add_action('get_header', 'enable_threaded_comments');



function wpthemess_content_nav() {
	global $wp_query;
	if (  $wp_query->max_num_pages > 1 ) :
		if (function_exists('wp_pagenavi') ) {
			wp_pagenavi();
		} else { ?>
        	<nav id="nav-below">
			<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'site5framework' ); ?></h1>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'site5framework' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'site5framework' ) ); ?></div>
			</nav><!-- #nav-below -->
    	<?php }
	endif;
}

/*********************************************************************************************
WP MU IMAGE SUPPORT
*********************************************************************************************/
function get_image_url() {
    $theImageSrc = wp_get_attachment_url(get_post_thumbnail_id($post_id));
    global $blog_id;
    if (isset($blog_id) && $blog_id > 0) {
        $imageParts = explode('/files/', $theImageSrc);
        if (isset($imageParts[1])) {
            $theImageSrc = '/blogs.dir/' . $blog_id . '/files/' . $imageParts[1];
        }
    }
    echo $theImageSrc;
}

/*********************************************************************************************
WP MU CUSTOM META IMAGE SUPPORT
*********************************************************************************************/
function get_image_path($cutommeta_image) {
$theImageSrc1 = $cutommeta_image;
global $blog_id;
if (isset($blog_id) && $blog_id > 0) {
    $imageParts = explode('/files/', $theImageSrc1);
    if (isset($imageParts[1])) {
        $theImageSrc1 = '/blogs.dir/' . $blog_id . '/files/' . $imageParts[1];
    }
}
return $theImageSrc1;
}


/*******************************
 CUSTOM COMMENTS
********************************/

function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class('clearfix'); ?> id="li-comment-<?php comment_ID() ?>">
   <?php echo get_avatar($comment,$size='38'); ?>
     <div id="comment-<?php comment_ID(); ?>" class="comment_content">
    <div class="comment-meta commentmetadata clearfix">
      <?php printf(__('<strong>%s</strong>'), get_comment_author_link()) ?><?php edit_comment_link(__('(Edit)'),'  ','') ?> <span><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?>
    </span>
    </div>

      <div class="text">
      <?php comment_text() ?>
    </div>

    <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.') ?></em>
         <br />
      <?php endif; ?>

      <div class="reply">
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
     </div>
<?php }

/*******************************
 Video player
********************************/

function player_video($postid){

$m4v = get_post_meta($postid, 'sn_video_post_m4v', $single = true);
$ogv = get_post_meta($postid, 'sn_video_post_ogv', $single = true);
$poster = get_post_meta($postid, 'sn_video_post_poster',true);
?>
<script type="text/javascript">

  jQuery(document).ready(function($){
    if($().jPlayer) {
      $("#jquery_jplayer_<?php echo $postid; ?>").jPlayer({
        ready: function () {
          $(this).jPlayer("setMedia", {
            <?php if($poster != '') : ?>
            poster: "<?php echo $poster['src']; ?>",
            <?php endif; ?>
            <?php if($m4v != '') : ?>
            m4v: "<?php echo $m4v; ?>",
            <?php endif; ?>
            <?php if($ogv != '') : ?>
            ogv: "<?php echo $ogv; ?>",
            <?php endif; ?>
            end: ""
          });
        },
        ended: function () {
                $(this).find('img').css({'display':'inline'});
                $(this).find('video').css({"width":"0"});
                $(this).find('object').css({"width":"0"});
                $(this).find('.fluid-width-video-wrapper').css({"padding-bottom":"0"});
            },
            play: function () {
                $(this).find('img').css({'display':'none'});
                $(this).find('video').css({'display':'inline'});
                $(this).find('video').css({"width":"100%"});
                $(this).find('object').css({"width":"100%"});
                $(this).find('object').css({"height":"100%"});
                $(this).find('.fluid-width-video-wrapper').css({"padding-bottom":"56.18%"});
                
            },
        size: {
                  width: "100%",
                  height:"auto"
              },
        swfPath: "<?php echo get_template_directory_uri(); ?>/library/js",
        cssSelectorAncestor: "#jp_interface_<?php echo $postid; ?>",
        supplied: "<?php if($m4v != '') : ?>m4v, <?php endif; ?><?php if($ogv != '') : ?>ogv, <?php endif; ?> all",
        solution: "html,flash"
      });
    }
  });
</script>

<div id="jquery_jplayer_<?php global $post; echo $postid; ?>" class="jp-jplayer jp-jplayer-video"></div>
  <div class="jp-video-container">
      <div class="jp-video">
           <div class="jp-type-single">
               <div id="jp_interface_<?php echo $postid; ?>" class="jp-interface">
                   <ul class="jp-controls">
                    <li><div class="seperator-first"></div></li>
                       <li><div class="seperator-second"></div></li>
                       <li><a href="#" class="jp-play" tabindex="1">play</a></li>
                       <li><a href="#" class="jp-pause" tabindex="1">pause</a></li>
                       <li><a href="#" class="jp-mute" tabindex="1">mute</a></li>
                       <li><a href="#" class="jp-unmute" tabindex="1">unmute</a></li>
                   </ul>
                   <div class="jp-progress-container">
                       <div class="jp-progress">
                           <div class="jp-seek-bar">
                               <div class="jp-play-bar"></div>
                           </div>
                       </div>
                   </div>
                   <div class="jp-volume-bar-container">
                       <div class="jp-volume-bar">
                           <div class="jp-volume-bar-value"></div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
</div>
<?php }

/*******************************
 Audio player
********************************/
function player_audio($postid){

$mp3 = get_post_meta($postid, 'sn_audio_post_mp3', $single = true);
$ogg = get_post_meta($postid, 'sn_audio_post_ogg', $single = true);
$poster = get_post_meta($postid, 'sn_audio_post_poster',true);
?>
<script type="text/javascript">
  jQuery(document).ready(function($){

    if($().jPlayer) {
      $("#jquery_jplayer_<?php echo $postid; ?>").jPlayer({
        ready: function () {
          $(this).jPlayer("setMedia", {
            <?php if($poster != '') : ?>
            poster: "<?php echo $poster['src']; ?>",
            <?php endif; ?>
            <?php if($mp3 != '') : ?>
            mp3: "<?php echo $mp3; ?>",
            <?php endif; ?>
            <?php if($ogg != '') : ?>
            oga: "<?php echo $ogg; ?>",
            <?php endif; ?>
            end: ""
          });
        },
        size: {
                  width: "100%",
                  height:"auto"
              },
        swfPath: "<?php echo get_template_directory_uri(); ?>/library/js",
        cssSelectorAncestor: "#jp_interface_<?php echo $postid; ?>",
        supplied: "<?php if($ogg != '') : ?>oga,<?php endif; ?><?php if($mp3 != '') : ?>mp3, <?php endif; ?> all"
      });
    }
  });
</script>

<div id="jquery_jplayer_<?php echo $postid; ?>" class="jp-jplayer jp-jplayer-audio"></div>
  <div class="jp-audio-container">
      <div class="jp-audio">
           <div class="jp-type-single">
               <div id="jp_interface_<?php echo $postid; ?>" class="jp-interface">
                   <ul class="jp-controls">
                    <li><div class="seperator-first"></div></li>
                       <li><div class="seperator-second"></div></li>
                       <li><a href="#" class="jp-play" tabindex="1">play</a></li>
                       <li><a href="#" class="jp-pause" tabindex="1">pause</a></li>
                       <li><a href="#" class="jp-mute" tabindex="1">mute</a></li>
                       <li><a href="#" class="jp-unmute" tabindex="1">unmute</a></li>
                   </ul>
                   <div class="jp-progress-container">
                       <div class="jp-progress">
                           <div class="jp-seek-bar">
                               <div class="jp-play-bar"></div>
                           </div>
                       </div>
                   </div>
                   <div class="jp-volume-bar-container">
                       <div class="jp-volume-bar">
                           <div class="jp-volume-bar-value"></div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
</div>
<?php


 }?>
