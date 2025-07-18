<?php
/**
 * The category template file
 *
 * @package Graceful Gold Blog
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

get_header();
	
// Left Sidebar
get_template_part( 'template-parts/sidebars/sidebar', 'left' ); 

// Content Columns Wrapper
?>

<?php
get_template_part( 'template-parts/columns/column', 'one' );

// Right Sidebar
get_template_part( 'template-parts/sidebars/sidebar', 'right' ); 

get_footer();