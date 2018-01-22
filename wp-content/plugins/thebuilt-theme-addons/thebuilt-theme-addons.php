<?php
/*
Plugin Name: TheBuilt Theme Addons
Plugin URI: http://magniumthemes.com/
Description: Custom Post Types, Shortcodes, Demo data for TheBuilt WordPress theme
Author: dedalx
Version: 1.0.2
Author URI: http://magniumthemes.com/
Text Domain: thebuilt
License: General Public License
*/

// Define current version constant
define( 'thebuilt_CPT_VERSION', '2.0' );

// Define current WordPress version constant
define( 'thebuilt_CPT_WP_VERSION', get_bloginfo( 'version' ) );

//load translated strings
add_action( 'init', 'thebuilt_cpt_load_textdomain' );

//load init
add_action( 'init', 'thebuilt_cpt_init' );

//process custom taxonomies
add_action( 'init', 'thebuilt_cpt_create_custom_taxonomies', 0 );

//process custom post types
add_action( 'init', 'thebuilt_cpt_create_custom_post_types', 0 );

//process custom meta boxes
add_action( 'init', 'thebuilt_cpt_create_metaboxes', 0 );

//flush rewrite rules on deactivation
register_deactivation_hook( __FILE__, 'thebuilt_cpt_deactivation' );

function thebuilt_cpt_deactivation() {
	// Clear the permalinks to remove our post type's rules
	flush_rewrite_rules();
}

function thebuilt_cpt_load_textdomain() {
	load_plugin_textdomain( 'thebuilt', false, basename( dirname( __FILE__ ) ) . '/languages' );
}

function thebuilt_cpt_init() {
	global $pagenow;

	add_image_size( 'thebuilt-post-image-small', 270, 230, true);
	add_image_size( 'thebuilt-post-image-normal', 370, 230, true);
	add_image_size( 'thebuilt-post-image-medium', 570, 230, true);
	add_image_size( 'thebuilt-post-image-large', 1170, 230, true);
	add_image_size( 'thebuilt-portfolio-thumb-square', 1024, 1024, true);
    add_image_size( 'thebuilt-portfolio-large', 1600, 800, true);
    add_image_size( 'thebuilt-portfolio-nav', 100, 100, true);
    add_image_size( 'thebuilt-reviews-avatar', 40, 40, true);

    // Allow shortcodes in Text widgets
	add_filter('widget_text', 'do_shortcode');

    // Demo data import
    if (( $pagenow !== 'admin-ajax.php' ) && (is_admin())) {
		require plugin_dir_path( __FILE__ ).'inc/oneclick-demo-import/init.php';
	}

}

function thebuilt_cpt_create_custom_post_types() {
	
	function thebuilt_posts_types() {

		register_post_type( 'mgt_clients_reviews',
		array(
		    'labels' => array(
		    'name' => __( 'Clients reviews', 'thebuilt-cpt' ),
		    'singular_name' => __( 'Clients reviews', 'thebuilt-cpt' ),
		    'has_archive' => true,
		    'add_new' => __( 'Add review', 'thebuilt-cpt' ),
		    'not_found' => __( 'Not found', 'thebuilt-cpt' ),
		    'not_found_in_trash' => __( 'No clients reviews found in trash', 'thebuilt-cpt' ),
		    'add_new_item' => __( 'Add review', 'thebuilt-cpt' ),
		    'all_items' => __( 'All client reviews', 'thebuilt-cpt' ),
		    ),
		    'public' => true,
		    'has_archive' => true,
		    'supports' => array(
		        'title',
		        'thumbnail',
		        'editor',
		        'comments'
		    ),
		    'menu_icon' => plugin_dir_url('thebuilt-theme-addons').'thebuilt-theme-addons/img/admin/icon-team.png'
		));

		register_post_type( 'mgt_portfolio',
		array(
		    'labels' => array(
		    'name' => __( 'Portfolio', 'thebuilt-cpt' ),
		    'singular_name' => __( 'Portfolio', 'thebuilt-cpt' ),
		    'has_archive' => true,
		    'add_new' => __( 'Add New item', 'thebuilt-cpt' ),
		    'not_found' => __( 'Not found', 'thebuilt-cpt' ),
		    'not_found_in_trash' => __( 'No Portfolio items found in trash', 'thebuilt-cpt' ),
		    'add_new_item' => __( 'Add New item', 'thebuilt-cpt' ),
		    'all_items' => __( 'All Portfolio items', 'thebuilt-cpt' ),
		    ),
		    'public' => true,
		    'has_archive' => true,
		    'rewrite' => array(
		    	'slug' => 'project'
		    ),
		    'supports' => array(
		        'title',
		        'thumbnail',
		        'excerpt',
		        'editor',
		        'comments'
		    ),
		    'menu_icon' => plugin_dir_url('thebuilt-theme-addons').'thebuilt-theme-addons/img/admin/icon-portfolio.png'
		));
	}

	add_action( 'init', 'thebuilt_posts_types' );	
}

function thebuilt_cpt_create_custom_taxonomies() {
	function thebuilt_register_portfolio_taxonomy() {
	    register_taxonomy("mgt_portfolio_filter", array("mgt_portfolio"), array("hierarchical" => true, "label" => "Project category", "singular_label" => "Project Category", 'rewrite'  => array( 'slug' => 'projects' ), "show_admin_column" => true));
	}
	add_action( 'init', 'thebuilt_register_portfolio_taxonomy');
}

function thebuilt_cpt_create_metaboxes() {

	/**
	* Custom metabox for Our Team custom post type
	**/

	function reviews_image_box() {

	    remove_meta_box('postimagediv', 'mgt_clients_reviews', 'side');
	    
	    add_meta_box('postimagediv', __('Client photo/logo', 'thebuilt-cpt'), 'post_thumbnail_meta_box', 'mgt_clients_reviews', 'normal', 'high');

	}

	add_action('do_meta_boxes', 'reviews_image_box');

	/**
	* Custom metabox for Portfolio custom post type
	**/

	function portfolio_image_box() {

	    remove_meta_box('postimagediv', 'mgt_portfolio', 'side');
	    
	    add_meta_box('postimagediv', __('Portfolio grid item image', 'thebuilt-cpt'), 'post_thumbnail_meta_box', 'mgt_portfolio', 'normal', 'high');

	}
	add_action('do_meta_boxes', 'portfolio_image_box');

	function portfolio_settings_box() {

	    $screens = array( 'mgt_portfolio' );

	    foreach ( $screens as $screen ) {

	        add_meta_box(
	            'portfolio_settings_box',
	            __( 'Portfolio item page details and settings', 'thebuilt-cpt' ),
	            'portfolio_settings_inner_box',
	            $screen,
	            'normal'
	        );
	    }
	}
	add_action( 'add_meta_boxes', 'portfolio_settings_box' );

	function portfolio_settings_inner_box( $post ) {

		wp_enqueue_script('wp-color-picker');
  		wp_enqueue_style( 'wp-color-picker' );

		// Add an nonce field so we can check for it later.
		wp_nonce_field( 'portfolio_settings_inner_box', 'portfolio_settings_inner_box_nonce' );

		/*
		* Use get_post_meta() to retrieve an existing value
		* from the database and use the value for the form.
		*/

		$value_portfolio_description = get_post_meta( $post->ID, '_portfolio_description_value', true );
		
		echo '<p><label for="portfolio_description" style="width: 120px; display: inline-block;">';
		_e( "Short description: ", 'thebuilt-cpt' );
		echo '</label> ';
		echo '<input type="text" id="portfolio_description" name="portfolio_description" value="' . esc_attr( $value_portfolio_description ) . '" size="30" /> <span>(Used in MGT Portfolio Grid)</span></p>';


		$value_portfolio_hide_details = get_post_meta( $post->ID, '_portfolio_hide_details_value', true );

		$checked = '';
		if( $value_portfolio_hide_details == true ) { 
			$checked = 'checked = "checked"';
		}
		echo '<p><input type="checkbox" id="portfolio_hide_details" name="portfolio_hide_details" '.$checked.' /> <label for="portfolio_hide_details">'.__( "Hide portfolio details (Project url, Client, Location, Area, Value, Date, Architect, Category)", 'thebuilt-cpt' ).'</label></p>';

		$value_portfolio_url = get_post_meta( $post->ID, '_portfolio_url_value', true );
		
		echo '<p><label for="portfolio_url" style="width: 120px; display: inline-block;">';
		_e( "Project url: ", 'thebuilt-cpt' );
		echo '</label> ';
		echo '<input type="text" id="portfolio_url" name="portfolio_url" value="' . esc_attr( $value_portfolio_url ) . '" size="30" /> <span>(Also can be used in MGT Portfolio Grid to open url instead of single project page)</span></p>';

		

		$value_portfolio_brand = get_post_meta( $post->ID, '_portfolio_brand_value', true );
		
		echo '<p><label for="portfolio_brand" style="width: 120px; display: inline-block;">';
		_e( "Client: ", 'thebuilt-cpt' );
		echo '</label> ';
		echo '<input type="text" id="portfolio_brand" name="portfolio_brand" value="' . esc_attr( $value_portfolio_brand ) . '" size="30" /></p>';


		$value_portfolio_location = get_post_meta( $post->ID, '_portfolio_location_value', true );
		
		echo '<p><label for="portfolio_location" style="width: 120px; display: inline-block;">';
		_e( "Location: ", 'thebuilt-cpt' );
		echo '</label> ';
		echo '<input type="text" id="portfolio_location" name="portfolio_location" value="' . esc_attr( $value_portfolio_location ) . '" size="30" /></p>';


		$value_portfolio_area = get_post_meta( $post->ID, '_portfolio_area_value', true );
		
		echo '<p><label for="portfolio_area" style="width: 120px; display: inline-block;">';
		_e( "Surface area: ", 'thebuilt-cpt' );
		echo '</label> ';
		echo '<input type="text" id="portfolio_area" name="portfolio_area" value="' . esc_attr( $value_portfolio_area ) . '" size="30" /></p>';


		$value_portfolio_value = get_post_meta( $post->ID, '_portfolio_value_value', true );
		
		echo '<p><label for="portfolio_value" style="width: 120px; display: inline-block;">';
		_e( "Value: ", 'thebuilt-cpt' );
		echo '</label> ';
		echo '<input type="text" id="portfolio_value" name="portfolio_value" value="' . esc_attr( $value_portfolio_value ) . '" size="30" /></p>';


		$value_portfolio_completed = get_post_meta( $post->ID, '_portfolio_completed_value', true );
		
		echo '<p><label for="portfolio_completed" style="width: 120px; display: inline-block;">';
		_e( "Completed date: ", 'thebuilt-cpt' );
		echo '</label> ';
		echo '<input type="text" id="portfolio_completed" name="portfolio_completed" value="' . esc_attr( $value_portfolio_completed ) . '" size="30" /></p>';


		$value_portfolio_architect = get_post_meta( $post->ID, '_portfolio_architect_value', true );
		
		echo '<p><label for="portfolio_architect" style="width: 120px; display: inline-block;">';
		_e( "Architect: ", 'thebuilt-cpt' );
		echo '</label> ';
		echo '<input type="text" id="portfolio_architect" name="portfolio_architect" value="' . esc_attr( $value_portfolio_architect ) . '" size="30" /></p>';


		$value_portfolio_display_type = get_post_meta( $post->ID, '_portfolio_display_type_value', true );
		
		echo '<p><label for="portfolio_display_type" style="width: 120px; display: inline-block;">';
		_e( "Layout: ", 'thebuilt-cpt' );
		echo '</label> ';
		echo '<label><input type="radio" name="portfolio_display_type" value="0"'; 
		if($value_portfolio_display_type == 0) { echo 'checked'; }
		echo ' >';
		_e( "Normal image size, description at the right", 'thebuilt-cpt' ).'</label>';
		echo ' &nbsp;<label><input type="radio" name="portfolio_display_type" value="1"';
		if($value_portfolio_display_type == 1) { echo 'checked'; }
		echo '>'; 
		_e( "Full width image size, description at the bottom", 'thebuilt-cpt' ).'</label>';

		$value_portfolio_disableslider = get_post_meta( $post->ID, '_portfolio_disableslider_value', true );

		$checked = '';
		if( $value_portfolio_disableslider == true ) { 
			$checked = 'checked = "checked"';
		}
		echo '<p><input type="checkbox" id="portfolio_disableslider" name="portfolio_disableslider" '.$checked.' /> <label for="portfolio_disableslider">'.__( "Disable slider for this item images (show images in column)", 'thebuilt-cpt' ).'</label></p>';

		$value_portfolio_fullwidthslider = get_post_meta( $post->ID, '_portfolio_fullwidthslider_value', true );

		$checked = '';
		if( $value_portfolio_fullwidthslider == true ) { 
			$checked = 'checked = "checked"';
		}
		echo '<p><input type="checkbox" id="portfolio_fullwidthslider" name="portfolio_fullwidthslider" '.$checked.' /> <label for="portfolio_fullwidthslider">'.__( "Show item images or slider fullwidth (liquid)", 'thebuilt-cpt' ).'</label></p>';

		$value_portfolio_original_image_sizes = get_post_meta( $post->ID, '_portfolio_original_image_sizes_value', true );

		$checked = '';
		if( $value_portfolio_original_image_sizes == true ) { 
			$checked = 'checked = "checked"';
		}
		echo '<p><input type="checkbox" id="portfolio_original_image_sizes" name="portfolio_original_image_sizes" '.$checked.' /> <label for="portfolio_original_image_sizes">'.__( "Use original images sizes for all item images (don't crop images)", 'thebuilt-cpt' ).'</label></p>';


		$value_portfolio_hide_1st_image_from_slider = get_post_meta( $post->ID, '_portfolio_hide_1st_image_from_slider_value', true );

		$checked = '';
		if( $value_portfolio_hide_1st_image_from_slider == true ) { 
			$checked = 'checked = "checked"';
		}
		echo '<p><input type="checkbox" id="portfolio_hide_1st_image_from_slider" name="portfolio_hide_1st_image_from_slider" '.$checked.' /> <label for="portfolio_hide_1st_image_from_slider">'.__( "Don't show 'Portfolio grid item image' on item page", 'thebuilt-cpt' ).'</label></p>';

		$value_portfolio_socialshare_disable = get_post_meta( $post->ID, '_portfolio_socialshare_disable_value', true );

		$checked = '';
		if( $value_portfolio_socialshare_disable == true ) { 
			$checked = 'checked = "checked"';
		}

		echo '<p><input type="checkbox" id="portfolio_socialshare_disable" name="portfolio_socialshare_disable" '.$checked.' /> <label for="portfolio_socialshare_disable">'.__( "Disable social share counters and buttons on this item page", 'thebuilt-cpt' ).'</label></p>';

		$value_portfolio_titleposition = get_post_meta( $post->ID, '_portfolio_titleposition_value', true );

		$selected_1 = '';
		$selected_2 = '';
		$selected_3 = '';

		if($value_portfolio_titleposition == "default") {
			$selected_1 = ' selected';
		}
		if($value_portfolio_titleposition == "description") {
			$selected_2 = ' selected';
		}
		if($value_portfolio_titleposition == "disable") {
			$selected_3 = ' selected';
		}

		echo '<p><label for="portfolio_titleposition" style="display: inline-block; width: 150px;">'.__( "Title position: ", 'thebuilt-cpt' ).'</label>';
		echo '<select name="portfolio_titleposition" id="portfolio_titleposition">
		    <option value="default"'.$selected_1.'>'.__( "Page title", 'thebuilt-cpt' ).'</option>
		    <option value="description"'.$selected_2.'>'.__( "Before description and details", 'thebuilt-cpt' ).'</option>
		    <option value="disable"'.$selected_3.'>'.__( "Disable title", 'thebuilt-cpt' ).'</option>
		</select></p>';

		$value_page_bgcolor = get_post_meta( $post->ID, '_page_bgcolor_value', true );

		echo '<label for="page_bgcolor" style="display: inline-block; height: 40px;">'.__( "Page background color: ", 'thebuilt' ).'</label> &nbsp;';
	  	echo '<input type="text" id="page_bgcolor" name="page_bgcolor" value="' . esc_attr( $value_page_bgcolor ) . '" style="width: auto; height:25px;" />';
	 
	  	echo "<script type=\"text/javascript\">    jQuery(document).ready(function($) {    $('#page_bgcolor').wpColorPicker(); }); </script>";


		$value_portfolio_sidebarposition = get_post_meta( $post->ID, '_portfolio_sidebarposition_value', true );

		$selected_1 = '';
		$selected_2 = '';
		$selected_3 = '';
		$selected_4 = '';

		if($value_portfolio_sidebarposition == 0) {
			$selected_1 = ' selected';
		}
		if($value_portfolio_sidebarposition == "left") {
			$selected_2 = ' selected';
		}
		if($value_portfolio_sidebarposition == "right") {
			$selected_3 = ' selected';
		}
		if($value_portfolio_sidebarposition == "disable") {
			$selected_4 = ' selected';
		}

		echo '<p><label for="portfolio_sidebarposition" style="display: inline-block; width: 150px;">'.__( "Sidebar position: ", 'thebuilt-cpt' ).'</label>';
		echo '<select name="portfolio_sidebarposition" id="portfolio_sidebarposition">
		    <option value="0"'.$selected_1.'>'.__( "Use theme control panel settings", 'thebuilt-cpt' ).'</option>
		    <option value="left"'.$selected_2.'>'.__( "Left", 'thebuilt-cpt' ).'</option>
		    <option value="right"'.$selected_3.'>'.__( "Right", 'thebuilt-cpt' ).'</option>
		    <option value="disable"'.$selected_4.'>'.__( "Disable sidebar", 'thebuilt-cpt' ).'</option>
		</select></p>';

		$value_page_transparent_header = get_post_meta( $post->ID, '_page_transparent_header_value', true );

		$checked = '';

		if( $value_page_transparent_header == true ) { 
			$checked = 'checked = "checked"';
		}

		echo '<p><input type="checkbox" id="page_transparent_header" name="page_transparent_header" '.$checked.' /> <label for="page_transparent_header">'.__( "Show transparent header with light logo and white menus under page content. Use this if you have fullwidth image or slider at the page start (header will be displayed above your image).", 'thebuilt' ).'</label></p>';


	}

	function portfolio_settings_save_postdata( $post_id ) {

		/*
		* We need to verify this came from the our screen and with proper authorization,
		* because save_post can be triggered at other times.
		*/

		// Check if our nonce is set.
		if ( ! isset( $_POST['portfolio_settings_inner_box_nonce'] ) )
		return $post_id;

		$nonce = $_POST['portfolio_settings_inner_box_nonce'];

		// Verify that the nonce is valid.
		if ( ! wp_verify_nonce( $nonce, 'portfolio_settings_inner_box' ) )
		  return $post_id;

		// If this is an autosave, our form has not been submitted, so we don't want to do anything.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
		  return $post_id;

		// Check the user's permissions.
		if ( 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) )
		    return $post_id;

		} else {

		if ( ! current_user_can( 'edit_post', $post_id ) )
		    return $post_id;
		}

		// Sanitize user input.
		if(!isset($_POST['portfolio_hide_details'])) $_POST['portfolio_hide_details'] = false;

		$mydata = sanitize_text_field( $_POST['portfolio_hide_details'] );

		// Update the meta field in the database.
		update_post_meta( $post_id, '_portfolio_hide_details_value', $mydata );

		// Sanitize user input.
		$mydata = sanitize_text_field( $_POST['portfolio_url'] );

		// Update the meta field in the database.
		update_post_meta( $post_id, '_portfolio_url_value', $mydata );

		// Sanitize user input.
		$mydata = sanitize_text_field( $_POST['portfolio_description'] );

		// Update the meta field in the database.
		update_post_meta( $post_id, '_portfolio_description_value', $mydata );

		// Sanitize user input.
		$mydata = sanitize_text_field( $_POST['portfolio_brand'] );

		// Update the meta field in the database.
		update_post_meta( $post_id, '_portfolio_brand_value', $mydata );

		// Sanitize user input.
		$mydata = sanitize_text_field( $_POST['portfolio_location'] );

		// Update the meta field in the database.
		update_post_meta( $post_id, '_portfolio_location_value', $mydata );

		// Sanitize user input.
		$mydata = sanitize_text_field( $_POST['portfolio_area'] );

		// Update the meta field in the database.
		update_post_meta( $post_id, '_portfolio_area_value', $mydata );

		// Sanitize user input.
		$mydata = sanitize_text_field( $_POST['portfolio_value'] );

		// Update the meta field in the database.
		update_post_meta( $post_id, '_portfolio_value_value', $mydata );

		// Sanitize user input.
		$mydata = sanitize_text_field( $_POST['portfolio_completed'] );

		// Update the meta field in the database.
		update_post_meta( $post_id, '_portfolio_completed_value', $mydata );

		// Sanitize user input.
		$mydata = sanitize_text_field( $_POST['portfolio_architect'] );

		// Update the meta field in the database.
		update_post_meta( $post_id, '_portfolio_architect_value', $mydata );

		// Sanitize user input.
		$mydata = sanitize_text_field( $_POST['portfolio_display_type'] );

		// Update the meta field in the database.
		update_post_meta( $post_id, '_portfolio_display_type_value', $mydata );
		
		if(!isset($_POST['portfolio_disableslider'])) $_POST['portfolio_disableslider'] = false;

		// Sanitize user input.
		$mydata = sanitize_text_field( $_POST['portfolio_disableslider'] );

		// Update the meta field in the database.
		update_post_meta( $post_id, '_portfolio_disableslider_value', $mydata );
		
		if(!isset($_POST['portfolio_fullwidthslider'])) $_POST['portfolio_fullwidthslider'] = false;

		// Sanitize user input.
		$mydata = sanitize_text_field( $_POST['portfolio_fullwidthslider'] );

		// Update the meta field in the database.
		update_post_meta( $post_id, '_portfolio_fullwidthslider_value', $mydata );

		if(!isset($_POST['portfolio_hide_1st_image_from_slider'])) $_POST['portfolio_hide_1st_image_from_slider'] = false;

		// Sanitize user input.
		$mydata = sanitize_text_field( $_POST['portfolio_hide_1st_image_from_slider'] );

		// Update the meta field in the database.
		update_post_meta( $post_id, '_portfolio_hide_1st_image_from_slider_value', $mydata );

		if(!isset($_POST['portfolio_socialshare_disable'])) $_POST['portfolio_socialshare_disable'] = false;

		// Sanitize user input.
		$mydata = sanitize_text_field( $_POST['portfolio_socialshare_disable'] );

		// Update the meta field in the database.
		update_post_meta( $post_id, '_portfolio_socialshare_disable_value', $mydata );

		if(!isset($_POST['portfolio_original_image_sizes'])) $_POST['portfolio_original_image_sizes'] = false;

		// Sanitize user input.
		$mydata = sanitize_text_field( $_POST['portfolio_original_image_sizes'] );

		// Update the meta field in the database.
		update_post_meta( $post_id, '_portfolio_original_image_sizes_value', $mydata );

	  	// Sanitize user input.
 		$mydata = sanitize_text_field( $_POST['page_bgcolor'] );

	  	// Update the meta field in the database.
	  	update_post_meta( $post_id, '_page_bgcolor_value', $mydata );

		// Sanitize user input.
		$mydata = sanitize_text_field( $_POST['portfolio_sidebarposition'] );

		// Update the meta field in the database.
		update_post_meta( $post_id, '_portfolio_sidebarposition_value', $mydata );

		// Sanitize user input.
		$mydata = sanitize_text_field( $_POST['portfolio_titleposition'] );

		// Update the meta field in the database.
		update_post_meta( $post_id, '_portfolio_titleposition_value', $mydata );

		// Sanitize user input.
		if(!isset($_POST['page_transparent_header'])) $_POST['page_transparent_header'] = false;

		$mydata = sanitize_text_field( $_POST['page_transparent_header'] );

		// Update the meta field in the database.
		update_post_meta( $post_id, '_page_transparent_header_value', $mydata );

	}
	add_action( 'save_post', 'portfolio_settings_save_postdata' );

	// CMB2 Metaboxes
	// Portfolio Gallery Uploader
	function thebuilt_register_porftolio_images_metabox() {

	  // Start with an underscore to hide fields from custom fields list
	  $prefix = '_thebuilt_';
	  /**
	   * Metabox to be displayed on a single page ID
	   */
	  $cmb_post_format_settings = new_cmb2_box( array(
	    'id'           => $prefix . 'post_format_settings_metabox',
	    'title'        => __( 'Portfolio images/photos', 'cmb2' ),
	    'object_types' => array( 'mgt_portfolio' ), // Post type
	    'context'      => 'normal',
	    'priority'     => 'high',
	    'show_names'   => false, // Show field names on the left
	  ) );

	  $cmb_post_format_settings->add_field( array(
	    'name'         => __( 'Portfolio images<br>', 'cmb2' ),
	    'desc'         => __( 'Use this field to add your images for portfolio item. Use SHIFT/CTRL keyboard buttons to select multiple images.', 'cmb2' ),
	    'id'           => $prefix . 'portfolio_images_file_list',
	    'type'         => 'file_list',
	    'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	  ) );
	  
	}
	add_action( 'cmb2_init', 'thebuilt_register_porftolio_images_metabox' );

	// Clients Reviews metabox
	function thebuilt_register_clients_reviews_metabox() {

	  // Start with an underscore to hide fields from custom fields list
	  $prefix = '_thebuilt_';
	  /**
	   * Metabox to be displayed on a single page ID
	   */
	  $cmb_cr_post_format_settings = new_cmb2_box( array(
	    'id'           => $prefix . 'cr_post_format_settings_metabox',
	    'title'        => __( 'Client Review settings', 'cmb2' ),
	    'object_types' => array( 'mgt_clients_reviews' ), // Post type
	    'context'      => 'normal',
	    'priority'     => 'high',
	    'show_names'   => true, // Show field names on the left
	  ) );

	  $cmb_cr_post_format_settings->add_field( array(
        'name'       => __( 'Reviewer title', 'cmb2' ),
        'desc'       => __( 'Reviewer title or description', 'cmb2' ),
        'id'         => $prefix . 'clients_reviews_title',
        'type'       => 'text',
      ) );
	  
	}
	add_action( 'cmb2_init', 'thebuilt_register_clients_reviews_metabox' );
	 
	/**
	* Removes the 'view' link in the admin bar
	*
	*/
	function thebuilt_remove_view_button_admin_bar() {
	 
		global $wp_admin_bar;
		$hide_view_in_post_types = Array('mgt_clients_reviews');
		foreach ( $hide_view_in_post_types as $post_type ) {
			if( get_post_type() === $post_type){
				$wp_admin_bar->remove_menu('view');
			}
		}
	}
	add_action( 'wp_before_admin_bar_render', 'thebuilt_remove_view_button_admin_bar' );
	 
	function thebuilt_remove_view_row_action( $actions ) {
	 	$hide_view_in_post_types = Array('mgt_clients_reviews');
		foreach ( $hide_view_in_post_types as $post_type ) {
			if( get_post_type() === $post_type ){
				unset( $actions['view'] );
			}
		}
		return $actions;
	 
	}
	add_filter( 'post_row_actions', 'thebuilt_remove_view_row_action', 10, 1 );
}

/**
 * Load theme custom shortcodes.
*/
// Check that VC installed
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

function thebuilt_admin_notice_vc_required() {
    ?>
    <div class="notice notice-error">
        <p><?php _e( '<strong>Visual Composer (TheBuilt Visual Page Builder) plugin must be installed and activated for correct theme work. Please <a href="'.esc_url('themes.php?page=install-required-plugins').'">install and activate all required plugins</a>.</strong>', 'thebuilt-cpt' ); ?></p>
    </div>
    <?php
}

if(is_plugin_active('js_composer/js_composer.php')) {
	require plugin_dir_path( __FILE__ ).'inc/theme-shortcodes.php';
} else {
	add_action( 'admin_notices', 'thebuilt_admin_notice_vc_required' );
}