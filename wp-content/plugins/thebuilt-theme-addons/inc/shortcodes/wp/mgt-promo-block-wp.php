<?php

// Shortcode [promo_block_wp]
function mgt_shortcode_promo_block_wp($atts, $sc_content = null) {
	extract(shortcode_atts(array(
		'background_image_id' => '',
		'background_color' => '',
		'background_repeat' => 'no-repeat',
		'parallax' => 0,
		'block_width' => '',
		'block_height' => '',
		'content_va' => '',
		'animated' => 1,
		'animated_overlay_color' => 'rgba(0,0,0,0.5)',
		'darken' => 'darken',
		'darken_overlay_color' => 'rgba(0,0,0,0.3)',
		'coverimage' => 0,
		'css_animation' => '',
		'text_size' => 'normal',
		'is_category_usage' => 0,
		'text_color' => 'white',
		'text_color_hover' => 0,
		'button_url' => '',
		'button_style' => 'solid',
		'hover_effect' => 'default',
		'button_icon' => '',
		'button_icon_position' => 'left',
		'button_size' => 'normal',
		'button_text_size' => 'normal',
		'button_align' => 'center',
		'button_show_onhover' => 0,
		'text_tranform' => 'none',
		'button_top_margin' => 'disable',
		'block_url'	=> '',
		'unique_block_id'	=> 0,
		'format_h1_fontsize' => '',
		'format_h1_margin' => '',
		'format_h2_fontsize' => '',
		'format_h2_margin' => '',
		'format_h3_fontsize' => '',
		'format_h3_margin' => '',
		'format_p_fontsize' => '',
		'format_p_margin' => '',
		'format_h1_color' => '',
		'format_h2_color' => '',
		'format_h3_color' => '',
		'format_p_color' => '',
		'format_a_color' => '',
		'css' => ''
	), $atts));
	
	ob_start();

	$style = '';

	$mgt_custom_css = '';

	if($is_category_usage == 1) {
		$background_image_size = 'mgt-category-image-large';
	} else {
		$background_image_size = 'full';
	}
	if(($is_category_usage == 1)&&($parallax == 1)) {
		$background_image_size = 'full';
	}

	$background_image_data = wp_get_attachment_image_src( $background_image_id, $background_image_size );

	$no_image_class = '';

	if($background_image_data[0] == '') {
		if($background_color !== '') {
			$style = 'background-color: '.$background_color.';';
		}

		if($is_category_usage > 0) {
			$no_image_class = ' without-image';
		}

		if($block_width == '') {
			$block_width = '100%';
		}

		if($block_height == '') {
			$block_height = 'auto';
		}
	} else {

		if($background_color !== '') {
			$style .= 'background-color: '.$background_color.';';
		}

		$style .= 'background-image: url('.$background_image_data[0].');';

		$style .= 'background-repeat: '.$background_repeat.';';

		if($block_width == '') {
			$block_width = $background_image_data[1].'px';
		}

		if($block_height == '') {
			$block_height = $background_image_data[2].'px';
		}
	}

	$add_class = '';

	$add_class .= $no_image_class;

	if($animated == 1) {
		$add_class .= ' animated';
	}

	if($parallax == 1) {
		$add_class .= ' parallax';
	}

	if($text_color == 'white') {
		$add_class .= ' white-text';
	} else {
		$add_class .= ' black-text';
	}

	if($text_color_hover == 1) {
		$add_class .= ' text-color-hover-white';
	}

	if($coverimage == 1) {
		$add_class .= ' cover-image';
	}

	$add_class .= ' text-size-'.$text_size;

	$add_class .= ' '.$darken;

	$style .= 'width: '.$block_width.'; height: '.$block_height.';';

	$button_data = vc_build_link($button_url);

	$button_html = '';

	$button_show_onhover_class = '';

	if($button_data['title'] !== '') {

		if($button_show_onhover == 1) {
			$button_show_onhover_class = ' mgt-hide-button';
		}

		$button_html .= do_shortcode('[mgt_button_wp button_style="'.$button_style.'" hover_effect="'.$hover_effect.'" button_link="'.$button_url.'" button_icon="'.$button_icon.'" button_icon_position="'.$button_icon_position.'" button_display="newline" button_size="'.$button_size.'" text_size="'.$button_text_size.'" text_tranform="'.$text_tranform.'" button_align="'.$button_align.'" button_top_margin="'.$button_top_margin.'"]');

	}

	if($is_category_usage == 0) {
		$sc_content = str_replace('<p>', '', $sc_content);
		$sc_content = str_replace('</p>', '', $sc_content);
	}

	$unique_class_name = 'mgt-promo-block-'.$unique_block_id;

	if($darken == 'darken' && ($darken_overlay_color !== '')) {
		$mgt_custom_css .= "
		    .$unique_class_name.mgt-promo-block.darken .mgt-promo-block-content {
		        background-color: $darken_overlay_color!important;
		    }

		";
	}

    if($animated == 1 && ($animated_overlay_color !== '')) {
    	$mgt_custom_css .= "
		    .$unique_class_name.mgt-promo-block.animated:hover .mgt-promo-block-content {
		        background-color: $animated_overlay_color!important;
		    }
		";
    }

    if($format_h1_fontsize !== '') {
    	$mgt_custom_css .= "
		    .$unique_class_name.mgt-promo-block .mgt-promo-block-content h1 {
		        font-size: $format_h1_fontsize;
		        line-height: normal!important;
		    }
		";
    }
    if($format_h1_margin !== '') {
    	$mgt_custom_css .= "
		    .$unique_class_name.mgt-promo-block .mgt-promo-block-content h1 {
		        margin: $format_h1_margin!important;
		    }
		";
    }
    if($format_h1_color !== '') {
    	$mgt_custom_css .= "
		    .$unique_class_name.mgt-promo-block .mgt-promo-block-content h1 {
		        color: $format_h1_color!important;
		    }
		";
    }

    if($format_h2_fontsize !== '') {
    	$mgt_custom_css .= "
		    .$unique_class_name.mgt-promo-block .mgt-promo-block-content h2 {
		        font-size: $format_h2_fontsize;
		        line-height: normal!important;
		    }
		";
    }
    if($format_h2_margin !== '') {
    	$mgt_custom_css .= "
		    .$unique_class_name.mgt-promo-block .mgt-promo-block-content h2 {
		        margin: $format_h2_margin!important;
		    }
		";
    }

    if($format_h2_color !== '') {
    	$mgt_custom_css .= "
		    .$unique_class_name.mgt-promo-block .mgt-promo-block-content h2 {
		        color: $format_h2_color!important;
		    }
		";
    }

    if($format_h3_fontsize !== '') {
    	$mgt_custom_css .= "
		    .$unique_class_name.mgt-promo-block .mgt-promo-block-content h3 {
		        font-size: $format_h3_fontsize;
		        line-height: normal!important;
		    }
		";
    }

    if($format_h3_margin !== '') {
    	$mgt_custom_css .= "
		    .$unique_class_name.mgt-promo-block .mgt-promo-block-content h3 {
		        margin: $format_h3_margin!important;
		    }
		";
    }

    if($format_h3_color !== '') {
    	$mgt_custom_css .= "
		    .$unique_class_name.mgt-promo-block .mgt-promo-block-content h3 {
		        color: $format_h3_color!important;
		    }
		";
    }

    if($format_p_fontsize !== '') {
    	$mgt_custom_css .= "
		    .$unique_class_name.mgt-promo-block .mgt-promo-block-content p {
		        font-size: $format_p_fontsize;
		        line-height: normal!important;
		    }
		";
    }

	if($format_p_margin !== '') {
    	$mgt_custom_css .= "
		    .$unique_class_name.mgt-promo-block .mgt-promo-block-content p {
		        margin: $format_p_margin!important;
		    }
		";
    }

    if($format_p_color !== '') {
    	$mgt_custom_css .= "
		    .$unique_class_name.mgt-promo-block .mgt-promo-block-content p {
		        color: $format_p_color!important;
		    }
		";
    }
    if($format_a_color !== '') {
    	$mgt_custom_css .= "
		    .$unique_class_name.mgt-promo-block .mgt-promo-block-content a {
		        color: $format_a_color!important;
		    }
		";
    }

	if($mgt_custom_css !== '') {
		$mgt_custom_css = str_replace(array("\r", "\n", "  ", "	"), '', $mgt_custom_css);
		echo "<style scoped='scoped'>$mgt_custom_css</style>"; // This variable contains user Custom CSS code and can't be escaped with WordPress functions.
	}

	$add_class .= ' '.$unique_class_name;

	if($content_va !=='') {
		$add_class_content = ' va-'.$content_va;
	} else {
		$add_class_content = '';
	}

	$add_class_content .= $button_show_onhover_class;

	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), '', $atts );

	if(trim($block_url !== '')) {
		echo '<a class="mgt-promo-block-link" href="'.esc_url($block_url).'">';
	}

	if($css_animation !== '') {

		$animation_css_class = ' wpb_animate_when_almost_visible wpb_'.$css_animation;

		// Load animation JS
		wp_register_script( 'waypoints', vc_asset_url( 'lib/waypoints/waypoints.min.js' ), array( 'jquery' ), WPB_VC_VERSION, true );
		wp_enqueue_script( 'waypoints' );

	} else {
		$animation_css_class = '';
	}

	echo '<div class="mgt-promo-block'.esc_attr($add_class).' wpb_content_element'.esc_attr($animation_css_class).'" data-style="'.esc_attr($style).'"><div class="mgt-promo-block-content'.esc_attr($add_class_content).'"><div class="mgt-promo-block-content-inside'.esc_attr( $css_class ).'">'.wp_kses_post($sc_content).''.$button_html.'</div></div></div>';

	if(trim($block_url !== '')) {
		echo '</a>';
	}

	$sc_content = ob_get_contents();
	ob_end_clean();
	return $sc_content;
}

add_shortcode("mgt_promo_block_wp", "mgt_shortcode_promo_block_wp");