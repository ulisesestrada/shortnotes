<?php
/*********************************************************************************************

WP_Hooks - Enqueue Javascripts

*********************************************************************************************/
function site5framework_header_init() {
    if (!is_admin()) {
    wp_enqueue_script( 'jquery' );
    wp_deregister_script( 'modernizr' );
    wp_register_script( 'modernizr', get_template_directory_uri().'/library/js/modernizr.full.min.js', 'jquery', '1.0');
    wp_enqueue_script( 'modernizr' );
    wp_enqueue_script('prettyphoto', get_template_directory_uri() .'/lib/prettyphoto/jquery.prettyPhoto.js', array('jquery'), '3.1.4', false);
	wp_enqueue_style('prettyphoto', get_template_directory_uri().'/lib/prettyphoto/css/prettyPhoto.css', 'style', false);
	wp_enqueue_script( 'selectivizr', get_template_directory_uri().'/library/js/selectivizr-min.js', 'jquery', '1.0');
	wp_enqueue_script('buttonsjs', get_template_directory_uri().'/lib/shortcodes/js/buttons.js', 'jquery', '1.0');
    wp_enqueue_script('quovolverjs', get_template_directory_uri().'/lib/shortcodes/js/jquery.quovolver.js', array( 'jquery' ));
	wp_enqueue_script('cyclejs', get_template_directory_uri().'/lib/shortcodes/js/jquery.cycle.all.min.js', array( 'jquery' ));
    wp_enqueue_script('jplayer', get_template_directory_uri() . '/library/js/jquery.jplayer.min.js', 'jquery', '1.0');
    wp_enqueue_script('fitvids', get_template_directory_uri() . '/library/js/jquery.fitvids.js', 'jquery', '1.0');
    wp_enqueue_script('flexslider', get_template_directory_uri() . '/library/js/jquery.flexslider.js', 'jquery', '1.0');
    wp_enqueue_script( 'behaviours-js', get_template_directory_uri() .'/library/js/behaviours.js', array( 'jquery' ), false, true );
    wp_enqueue_script( 'contactform', get_template_directory_uri() .'/library/js/contactform/contactform.js', array( 'jquery' ), false, true );

    wp_enqueue_style('flexslider', get_template_directory_uri().'/library/css/flexslider.css');
	wp_enqueue_style('superfish', get_template_directory_uri().'/library/css/post.formats.css');
	wp_enqueue_style('boxes', get_template_directory_uri().'/lib/shortcodes/css/boxes.css');
	wp_enqueue_style('lists', get_template_directory_uri().'/lib/shortcodes/css/lists.css');
	wp_enqueue_style('social', get_template_directory_uri().'/lib/shortcodes/css/social.css');
	wp_enqueue_style('slider', get_template_directory_uri().'/lib/shortcodes/css/slider.css');
	wp_enqueue_style('viewers', get_template_directory_uri().'/lib/shortcodes/css/viewers.css');
	wp_enqueue_style('tabs', get_template_directory_uri().'/lib/shortcodes/css/tabs.css');
	wp_enqueue_style('toggles', get_template_directory_uri().'/lib/shortcodes/css/toggles.css');
	wp_enqueue_style('site5_buttons', get_template_directory_uri().'/lib/shortcodes/css/buttons.css');
	wp_enqueue_style('columns', get_template_directory_uri().'/lib/shortcodes/css/columns.css');

}
}
add_action('init', 'site5framework_header_init');


/*********************************************************************************************

Admin Hooks / Portfolio and Slider Media Uploader

*********************************************************************************************/
function site5framework_mediauploader_init() {
    if (is_admin()) {
    wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_style('thickbox');
}
}
add_action('init', 'site5framework_mediauploader_init');


/*********************************************************************************************

Favicon

*********************************************************************************************/
function site5framework_custom_shortcut_favicon() {
	if (of_get_option('shortnotes_custom_shortcut_favicon') != '') {
    echo '<link rel="shortcut icon" href="'. of_get_option('shortnotes_custom_shortcut_favicon') .'" type="image/ico" />'."\n";
	}
	else { ?><link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() ?>/images/ico/favicon.ico" type="image/ico" />
	<?php }
}
add_action('wp_head', 'site5framework_custom_shortcut_favicon');

/*********************************************************************************************

Contact Form JS

*********************************************************************************************/
function site5framework_contactform_init() {
	if (is_page_template('template.contact.form.php') && !is_admin()) {
    wp_enqueue_script('contactform', get_template_directory_uri().'/library/js/contactform/contactform.js', array('jquery'), '1.0');
    }
}
add_action('template_redirect', 'site5framework_contactform_init');

/*********************************************************************************************


Stats

*********************************************************************************************/
function site5framework_analytics(){
	$output = of_get_option('shortnotes_stats');
	if ( $output <> "" )
	echo stripslashes($output) . "\n";
}
add_action('wp_footer','site5framework_analytics');
?>