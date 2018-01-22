<?php
/**
 * Load custom VC shortcodes
 */

add_action( 'wp_loaded', 'thebuilt_visual_composer_custom_init' );

function thebuilt_visual_composer_custom_init() {

	if(function_exists('vc_set_as_theme')) vc_set_as_theme(true);

	// VC Templates
	$vc_templates_dir = plugin_dir_path( __FILE__ ).'shortcodes/visual-composer/templates';

	vc_set_shortcodes_templates_dir($vc_templates_dir);

	// Remove default VC elements
	vc_remove_element("vc_posts_grid");
	vc_remove_element("vc_carousel");
	vc_remove_element("vc_posts_slider");
	vc_remove_element("vc_cta_button");
	vc_remove_element("vc_cta_button2");
	vc_remove_element("vc_message");

	// Add new WP shortcodes to VC
	include_once('shortcodes/visual-composer/mgt-promo-block.php');
	include_once('shortcodes/visual-composer/mgt-header-block.php');
	include_once('shortcodes/visual-composer/mgt-icon-box.php');
	include_once('shortcodes/visual-composer/mgt-post-list.php');
	include_once('shortcodes/visual-composer/mgt-button.php');
	include_once('shortcodes/visual-composer/mgt-calltoaction-block.php');
	include_once('shortcodes/visual-composer/mgt-signup-block.php');
	include_once('shortcodes/visual-composer/mgt-message-box.php');
	include_once('shortcodes/visual-composer/mgt-counter.php');
	include_once('shortcodes/visual-composer/mgt-clients-reviews.php');
	include_once('shortcodes/visual-composer/mgt-portfolio-grid.php');
	include_once('shortcodes/visual-composer/mgt-countdown.php');
	include_once('shortcodes/visual-composer/mgt-pricing-table.php');
	
	// Shortcodes that work only with VC plugin
	include_once('shortcodes/wp/mgt-promo-block-wp.php');
	include_once('shortcodes/wp/mgt-button-wp.php');
	include_once('shortcodes/wp/mgt-calltoaction-block-wp.php');
	include_once('shortcodes/wp/mgt-portfolio-grid-wp.php');
	
	// Custom VC Row
	include_once('shortcodes/visual-composer/vc-row-custom.php');

}


add_action( 'init', 'thebuilt_addons_shortcodes_init', 9999 );

function thebuilt_addons_shortcodes_init() {

	include_once('shortcodes/wp/mgt-header-block-wp.php');
	include_once('shortcodes/wp/mgt-icon-box-wp.php');
	include_once('shortcodes/wp/mgt-post-list-wp.php');
	include_once('shortcodes/wp/mgt-signup-block-wp.php');
	include_once('shortcodes/wp/mgt-message-box-wp.php');
	include_once('shortcodes/wp/mgt-counter-wp.php');
	include_once('shortcodes/wp/mgt-clients-reviews-wp.php');
	include_once('shortcodes/wp/mgt-countdown-wp.php');
	include_once('shortcodes/wp/mgt-pricing-table-wp.php');

}

?>