<!doctype html>
<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6 oldie"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7 oldie"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8 oldie"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta charset="utf-8">
		<!--[if ie]><meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'/><![endif]-->
		
		<title><?php wp_title( ' - ', true, 'right' ); ?> <?php bloginfo('name'); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<?php if ( of_get_option('shortnotes_enablemeta')== '1') { ?>
			<!-- meta -->
			<meta name="description" content="<?php echo of_get_option('shortnotes_metadescription')  ?>">
			<meta name="keywords" content="<?php wp_title('' , true, right); ?>, <?php echo of_get_option('shortnotes_metakeywords')  ?>" />
			<meta name="revisit-after" content="<?php echo of_get_option('shortnotes_revisitafter')  ?> days" />
			<meta name="author" content="www.site5.com">
		<?php } ?>
		
		<?php if ( of_get_option('shortnotes_enablerobot')== '1') { ?>
		
		<!-- robots -->
		<meta name="robots" content="<?php echo of_get_option('shortnotes_metabots')  ?>" />
		<meta name="googlebot" content="<?php echo of_get_option('shortnotes_metagooglebot')  ?>" />
		<?php } ?>
		
				
  		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

  		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/css/normalize.css">
		
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->

		<?php if(of_get_option('shortnotes_css_code') != '') { ?> 
		<!-- custom css -->  
			<?php load_template( get_template_directory() . '/custom.css.php' );?>
		<!-- custom css -->
		<?php } ?>

		<?php if(of_get_option('shortnotes_customtypography') == '1') { ?>     
		<!-- custom typography-->   
			<?php if(of_get_option('shortnotes_headingfontlink') != '') { ?>
			<?php echo stripslashes(html_entity_decode(of_get_option('shortnotes_headingfontlink')));?>
		<!-- custom typography -->
			<?php } ?>
			<?php load_template( get_template_directory() . '/custom.typography.css.php' );?>
		<?php } ?>
	</head>

	<body <?php body_class(); ?>>
	<!-- begin #mainWrapper -->
	<div id="wrapper">
		<!-- menu for smaller screens -->
		<?php if ( has_nav_menu( 'main_nav' ) ) {?>
		<div id="small-screens-menu" class="block">
			<a href="#" id="topmenu-button"><strong><?php _e(":::: MENU ::::", "site5framework"); ?></strong></a>
		    <?php  site5_main_nav(); ?>
		</div>
		<?php }?>
		<!-- end menu for smaller screens -->
		<!-- begin header -->
		<header role="banner" >
			<!-- begin .block -->
			<div class="block clearfix">
				<!-- begin #logo -->
				<div id="logo">
					<h1>
						<a href="<?php echo home_url(); ?>">
						<?php if ( of_get_option('shortnotes_clogo')!= '') { ?>
						<img src="<?php echo of_get_option('shortnotes_clogo'); ?>" alt="<?php echo bloginfo( 'name' ) ?>" />
						<?php } elseif( of_get_option('shortnotes_clogo_text')!= '') {
						        echo of_get_option('shortnotes_clogo_text');
		                    } else {
							bloginfo( 'name' );
						}?>
						</a>
						<span><?php bloginfo('description'); ?></span>
					</h1>
					
				</div>
				<!-- end #logo -->
				<!-- begin #socialIcons -->
				<div id="socialIcons">
					<ul>
                        <?php if(of_get_option('shortnotes_twitter')!="#" and of_get_option('shortnotes_twitter')!=""){ ?>
						<li><a href="<?php echo of_get_option('shortnotes_twitter');?>" class="twitter hide-text"></a></li>
                        <?php } ?>
                        <?php if(of_get_option('shortnotes_facebook')!="#" and of_get_option('shortnotes_facebook')!=""){ ?>
						<li><a href="<?php echo of_get_option('shortnotes_facebook');?>" class="facebook hide-text"></a></li>
                        <?php } ?>
                        <?php if(of_get_option('shortnotes_youtube')!="#" and of_get_option('shortnotes_youtube')!=""){ ?>
						<li><a href="<?php echo of_get_option('shortnotes_youtube');?>" class="youtube hide-text"></a></li>
                        <?php } ?>
						<?php if(of_get_option('shortnotes_vimeo')!="#" and of_get_option('shortnotes_vimeo')!=""){ ?>
						<li><a href="<?php echo of_get_option('shortnotes_vimeo');?>" class="vimeo hide-text"></a></li>
                        <?php } ?>
                        <?php if(of_get_option('shortnotes_dribbble')!="#" and of_get_option('shortnotes_dribbble')!=""){ ?>
						<li><a href="<?php echo of_get_option('shortnotes_dribbble');?>" class="dribbble hide-text"></a></li>
                        <?php } ?>
                        <?php if(of_get_option('shortnotes_google')!="#" and of_get_option('shortnotes_google')!=""){ ?>
						<li><a href="<?php echo of_get_option('shortnotes_google');?>" class="google hide-text"></a></li>
                        <?php } ?>
                        <?php if(of_get_option('shortnotes_pinterest')!="#" and of_get_option('shortnotes_pinterest')!=""){ ?>
						<li><a href="<?php echo of_get_option('shortnotes_pinterest');?>" class="pinterest hide-text"></a></li>
                        <?php } ?>
                        <?php if(of_get_option('shortnotes_linkedin')!="#" and of_get_option('shortnotes_linkedin')!=""){ ?>
						<li><a href="<?php echo of_get_option('shortnotes_linkedin');?>" class="linkedin hide-text"></a></li>
                        <?php } ?>
                        <?php if(of_get_option('shortnotes_extrss')!="#" and of_get_option('shortnotes_extrss')!=""){ ?>
                        <li><a href="<?php echo of_get_option('shortnotes_extrss'); ?>" class="rss hide-text"></a></li>
                		<?php } else { ?>
                        <li><a href="<?php bloginfo('rss2_url'); ?>" class="rss hide-text"></a></li>
                        <?php } ?>
						
					</ul>
				</div>
				<!-- end #socialIcons -->
			</div>
			<!-- end .block -->
		</header>
		<!-- end header -->
		
		<!--begin #content-->
		<div id="content" role="main" class="block clearfix">
		<!-- begin #search-top, visible on smaller screens -->
		<div id="search-top" class="search">
			<form id="searchform" action="<?php echo home_url( '/' ); ?>" method="get">
				<input type="text" id="s" name="s" value="<?php _e("type your search and hit enter", "site5framework"); ?>" onFocus="this.value=''" />
			</form>
		</div>
		<!-- end #search-top -->