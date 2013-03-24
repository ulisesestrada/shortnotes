<?php
/*********************************************************************************************

This theme uses wp_nav_menu() in one location.

*********************************************************************************************/
register_nav_menus(                      		// wp3+ menus
		array(
			'main_nav' => 'The Main Menu',   // main nav in header
		)
	);
	
function site5_main_nav() {
	// display the wp3 menu if available
    wp_nav_menu(
    	array(
    		'menu' => 'main_nav', /* menu name */
    		'theme_location' => 'main_nav', /* where in the theme it's assigned */
			'container' =>'nav'
    	)
    );
}

?>