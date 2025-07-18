<?php
/**
 * Template part for Top Navigation
 *
 * @package Graceful Gold Blog
 */


if ( graceful_gold_blog_options( 'top_navigation_show' ) ) : ?>

<style type="text/css">
	#top-menu li a {
		color: <?php  echo esc_attr( graceful_gold_blog_options( 'top_navigation_text_color' ) ) ?>;
	}
	#top-menu .sub-menu {
		background: <?php  echo esc_attr( graceful_gold_blog_options( 'top_navigation_bg' ) ) ?>;
	}
</style>

<div id="top-navigation" class="clear-fix" style="background: <?php  echo esc_attr( graceful_gold_blog_options( 'top_navigation_bg' ) ) ?>;">
	<div <?php echo esc_attr( graceful_options( 'basic_header_width' ) ) === 'contained' ? 'class="wrapped-content"': ''; ?>>
		
		<?php

		// Top Navigation Menu
		if ( graceful_gold_blog_options( 'top_navigation_show' ) ) {
			wp_nav_menu( array(
				'theme_location' 	=> 'top',
				'menu_id' 		 	=> 'top-menu',
				'menu_class' 		=> '',
				'container' 	 	=> 'nav',
				'container_class'	=> 'top-menu-wrapper',
				'fallback_cb' 		=> 'graceful_top_menu_fallback'
			) );
		}
		?>

	</div>
</div><!-- #top-navigation -->

<?php 
endif;