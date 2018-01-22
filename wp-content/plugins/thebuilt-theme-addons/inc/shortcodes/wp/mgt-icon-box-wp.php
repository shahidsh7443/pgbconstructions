<?php

// Shortcode [icon_box_wp]
function mgt_shortcode_icon_box_wp($atts, $sc_content = null) {
	extract(shortcode_atts(array(
		'icon_image_id' => '',
		'icon_font' => '',
		'icon_background' => 0,
		'icon_background_color' => 'normal',
		'animateicon' => 0,
		'title' => 'Header',
		'subtitle' => '',
		'title_position' => 'top',
		'color' => 'black',
		'css_animation' => '',
		'css' => ''
	), $atts));
	
	ob_start();

	$icon_image_data = wp_get_attachment_image_src( $icon_image_id, 'mgt-image-square-small' );

	if($icon_image_data !== false) {
		$icon_image_html = '<img src="'.$icon_image_data[0].'" alt="'.$title.'"/>';
		$icon_type_class = "mgt-icon-image";
	} else {
		$icon_image_html = '<div class="mgt-font-icon"><i class="fa fa-'.$icon_font.'"></i></div>';
		$icon_type_class = "mgt-icon-fa";
	}

	$add_class = ' mgt-icon-box-'.$title_position;

	if($icon_background == 1) {
		$icon_background_class = ' '.$icon_type_class.' mgt-icon-background mgt-icon-background-'.$icon_background_color;
	} else {
		$icon_background_class = ' '.$icon_type_class;
	}

	$subtitle_html = '';
	
	if($subtitle !== '') {
		$subtitle_html = '<h6>'.$subtitle.'</h6>';
	}

	if($animateicon == 1) {
		$mgticonbox_class = ' hvr-icon-push';
	} else {
		$mgticonbox_class = '';
	}

	if($css_animation !== '') {
		$animation_css_class = ' wpb_animate_when_almost_visible wpb_'.$css_animation;

		// Load animation JS
		wp_register_script( 'waypoints', vc_asset_url( 'lib/waypoints/waypoints.min.js' ), array( 'jquery' ), WPB_VC_VERSION, true );
		wp_enqueue_script( 'waypoints' );
		
	} else {
		$animation_css_class = '';
	}

	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), '', $atts );

	if($title_position == 'top') {
		echo '<div class="mgt-icon-box wpb_content_element'.esc_attr($animation_css_class).esc_attr($icon_background_class).' text-'.esc_attr($color).' '.esc_attr( $css_class ).'">'.wp_kses_post($subtitle_html).'<h5>'.esc_html($title).'</h5><div class="mgt-icon-box-icon '.esc_attr($mgticonbox_class).'">'.wp_kses_post($icon_image_html).'</div><div class="mgt-icon-box-content">'.wp_kses_post($sc_content).'</div><div class="clearfix"></div></div>';
	} else {
		echo '<div class="mgt-icon-box wpb_content_element'.esc_attr($animation_css_class).esc_attr($add_class).esc_attr($icon_background_class).' text-'.esc_attr($color).' '.esc_attr( $css_class ).'"><div class="mgt-icon-box-icon'.esc_attr($mgticonbox_class).'">'.wp_kses_post($icon_image_html).'</div><div class="mgt-icon-box-content">'.wp_kses_post($subtitle_html).'<h5>'.esc_html($title).'</h5>'.wp_kses_post($sc_content).'</div><div class="clearfix"></div></div>';
	}
	
	$sc_content = ob_get_contents();
	ob_end_clean();
	return $sc_content;
}

add_shortcode("mgt_icon_box_wp", "mgt_shortcode_icon_box_wp");