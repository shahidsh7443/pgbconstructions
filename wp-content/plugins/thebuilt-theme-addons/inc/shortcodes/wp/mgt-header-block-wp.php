<?php

// Shortcode [header_block_wp]
function mgt_shortcode_header_block_wp($atts, $sc_content = null) {
	extract(shortcode_atts(array(
		'title' => 'Header',
		'subtitle' => '',
		'line' => 1,
		'align' => 'left',
		'style' => 1,
		'texttransform' => 'header',
		'color' => 'black',
		'css_animation' => '',
		'header_font_size' => 'h2',
		'css' => ''
	), $atts));
	
	ob_start();

	if($subtitle !== '') {
		$subtitle = '<p class="mgt-header-block-subtitle">'.$subtitle.'</p>';
	}

	$line_html = '';

	if($line == 1) {
		$line_html = '<div class="mgt-header-line"></div>';
	}

	$addclass = " mgt-header-block-style-".$style;

	$addclass .= " mgt-header-texttransform-".$texttransform;

	if($style == 1) {
		$content = '<'.$header_font_size.' class="mgt-header-block-title">'.($title).'</'.$header_font_size.'>'.$subtitle;
	} else {
		$content = $subtitle.'<'.$header_font_size.' class="mgt-header-block-title">'.($title).'</'.$header_font_size.'>';
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

	echo '<div class="mgt-header-block clearfix text-'.esc_attr($align).' text-'.esc_attr($color).esc_attr($animation_css_class).' wpb_content_element '.esc_attr($addclass).' '.esc_attr( $css_class ).'">'.wp_kses_post($content).wp_kses_post($line_html).'</div>';

	$sc_content = ob_get_contents();
	ob_end_clean();
	return $sc_content;
}

add_shortcode("mgt_header_block_wp", "mgt_shortcode_header_block_wp");