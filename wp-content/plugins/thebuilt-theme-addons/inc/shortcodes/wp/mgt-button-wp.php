<?php

// Shortcode [button_wp]
function mgt_shortcode_button_wp($atts, $sc_content = null) {
	extract(shortcode_atts(array(
		'button_style' => 'solid',
		'hover_effect' => 'default',
		'button_link' => '',
		'button_icon' => '',
		'button_icon_position' => 'left',
		'button_display' => 'inline',
		'button_size' => 'normal',
		'button_align' => 'center',
		'text_size' => 'normal',
		'text_tranform' => 'none',
		'button_top_margin' => 'disable',
		'css_animation' => ''
	), $atts));
	
	ob_start();

	if($css_animation !== '') {
		$animation_css_class = ' wpb_animate_when_almost_visible wpb_'.$css_animation;

		// Load animation JS
		wp_register_script( 'waypoints', vc_asset_url( 'lib/waypoints/waypoints.min.js' ), array( 'jquery' ), WPB_VC_VERSION, true );
		wp_enqueue_script( 'waypoints' );
		
	} else {
		$animation_css_class = '';
	}

	$add_class = 'btn hvr-'.$hover_effect.' mgt-button mgt-style-'.$button_style.' mgt-size-'.$button_size.' mgt-align-'.$button_align.' mgt-display-'.$button_display.' mgt-text-size-'.$text_size.' mgt-button-icon-position-'.$button_icon_position.' mgt-text-transform-'.$text_tranform.' '.esc_attr($animation_css_class);

	$button_data = vc_build_link($button_link);

	$button_html = '';

	if($button_data['title'] !== '') {
		if($button_icon !== '') {
			$button_icon = '<i class="fa fa-'.$button_icon.'"></i>';
		} else {
			$button_icon = '';
		}

		if($button_data['target'] !== '') {
			$target_html = ' target="'.$button_data['target'].'"';
		} else {
			$target_html = '';
		}

		$button_html .= '<div class="mgt-button-wrapper mgt-button-wrapper-align-'.$button_align.' mgt-button-wrapper-display-'.$button_display.' mgt-button-top-margin-'.$button_top_margin.'">';

		if($button_icon_position == 'right') {
			$button_html .= '<a class="'.esc_attr($add_class).'" href="'.esc_url($button_data['url']).'"'.($target_html).'>'.esc_html($button_data['title']).wp_kses_post($button_icon).'</a>';
		} else {
			$button_html .= '<a class="'.esc_attr($add_class).'" href="'.esc_url($button_data['url']).'"'.($target_html).'>'.wp_kses_post($button_icon).esc_html($button_data['title']).'</a>';
		}

		$button_html .= '</div>';

	}

	// All data inside $button_html variable already correctly escaped and safe.
	echo $button_html;

	$sc_content = ob_get_contents();
	ob_end_clean();
	return $sc_content;
}

add_shortcode("mgt_button_wp", "mgt_shortcode_button_wp");