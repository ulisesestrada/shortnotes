<!-- begin aside -->
	<aside>
		<!-- #search -->
		<div id="search-aside" class="search">
			<form id="searchform" action="<?php echo home_url( '/' ); ?>" method="get">
				<input type="text" id="s" name="s" value="<?php _e("type your search and hit enter", "site5framework"); ?>" onFocus="this.value=''" />
			</form>
		</div>
		<!-- END #search -->
		<!-- Sidebar Menu -->
		<?php if ( has_nav_menu( 'main_nav' ) ) {?>
		<div id="sidebar-menu" class="block">
			<h3><?php _e("Menu", "site5framework"); ?></h3>
			<?php site5_main_nav();?>
		</div>
		<?php }?>
		<!-- END Sidebar Menu -->
		<!-- Sidebar Widgets Area -->
		<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
			<?php dynamic_sidebar( 'sidebar' ); ?>
		<?php else : ?>
		<!-- This content shows up if there are no widgets defined in the backend. -->
			<p>
				<?php _e("Please activate some Widgets.", "site5framework"); ?>

				<?php if(current_user_can('edit_theme_options')) : ?>
				<a href="<?php echo admin_url('widgets.php')?>" class="add-widget"><?php _e("Add Widget", "site5framework"); ?></a>
				<?php endif ?>
			</p>
		<?php endif; ?>
		<!-- END Sidebar Widgets Area -->
	</aside>
	<!-- END aside -->