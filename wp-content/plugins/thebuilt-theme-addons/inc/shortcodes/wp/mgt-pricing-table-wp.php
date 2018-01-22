<?php

// Shortcode [pricing_table_wp]
function mgt_shortcode_pricing_table_wp($atts, $sc_content = null) {
	extract(shortcode_atts(array(
		'layout_style' => 'style-default',
		'hover_animation' => 'animation-none',
		'featured_table' => 0,
		'bordered' => 1,
		'enlarge' => 0,
		'shadow' => 0,
		'header_text' => 'Service name',
		'subheader_text' => '<sup>$</sup>99 <sub>/ per month</sub>',
		'subheader_icon' => '',
		'button_url' => '',
		'button_style' => 'solid',
		'hover_effect' => 'default',
		'button_icon' => '',
		'button_size' => 'normal',
		'button_text_size' => 'normal',
		'text_tranform' => 'none',
		'unique_block_id'	=> 0,
		'format_header_fontsize' => '',
		'format_header_padding' => '',
		'format_subheader_fontsize' => '',
		'format_subheader_padding' => '',
		'format_item_fontsize' => '',
		'format_item_padding' => '',
		'header_color' => '',
		'header_bg_color' => '',
		'header_bg_image' => '',
		'subheader_color' => '',
		'subheader_bg_color' => '',
		'list_text_color' => '',
		'list_bg_color_1' => '',
		'list_bg_color_2' => '',
		'a_color' => '',
		'border_color' => '',
		'css_animation' => '',
		'css' => ''
	), $atts));
	
	ob_start();

	$mgt_custom_css = '';

	$add_class = '';

	$background_image_data = wp_get_attachment_image_src( $header_bg_image, 'thebuilt-blog-thumb' );

	$no_image_class = '';
	$style = '';

	if($background_image_data[0] !== '') {

		$style .= 'background-image: url('.$background_image_data[0].');';
	}

	if($featured_table == 1) {
		$add_class .= ' featured';
	}
	if($bordered == 1) {
		$add_class .= ' bordered';
	}

	$add_class .= ' '.$hover_animation;

	$add_class .= ' '.$layout_style;

	if($enlarge == 1) {
		$add_class .= ' enlarge';
	}

	if($shadow == 1) {
		$add_class .= ' shadow';
	}

	$button_data = vc_build_link($button_url);

	$button_html = '';

	$button_show_onhover_class = '';

	if($button_data['title'] !== '') {

		$button_html = '<div class="mgt-pricing-table-button">'.do_shortcode('[mgt_button_wp button_style="'.$button_style.'" hover_effect="'.$hover_effect.'" button_link="'.$button_url.'" button_icon="'.$button_icon.'" button_display="newline" button_size="'.$button_size.'" text_size="'.$button_text_size.'" text_tranform="'.$text_tranform.'" button_align="center"]'.'</div>');

	}

	$unique_class_name = 'mgt-pricing-table-'.$unique_block_id;

	// Header 
    if($format_header_fontsize !== '') {
    	$mgt_custom_css .= "
		    .$unique_class_name.mgt-pricing-table h4.mgt-pricing-table-header {
		        font-size: $format_header_fontsize!important;
		        line-height: normal!important;
		    }
		";
    }
    if($format_header_padding !== '') {
    	$mgt_custom_css .= "
		    .$unique_class_name.mgt-pricing-table h4.mgt-pricing-table-header {
		        padding: $format_header_padding!important;
		    }
		";
    }

    if($header_color !== '') {
    	$mgt_custom_css .= "
		    .$unique_class_name.mgt-pricing-table h4.mgt-pricing-table-header {
		        color: $header_color!important;
		    }
		";
    }

    if($header_bg_color !== '') {
    	$mgt_custom_css .= "
		    .$unique_class_name.mgt-pricing-table h4.mgt-pricing-table-header {
		        background-color: $header_bg_color!important;
		    }
		";
    }

    // Subheader:
    if($format_subheader_fontsize !== '') {
    	$mgt_custom_css .= "
		    .$unique_class_name.mgt-pricing-table .mgt-pricing-table-subheader {
		        font-size: $format_subheader_fontsize!important;
		        line-height: normal!important;
		    }
		";
    }
    if($format_subheader_padding !== '') {
    	$mgt_custom_css .= "
		    .$unique_class_name.mgt-pricing-table .mgt-pricing-table-subheader {
		        padding: $format_subheader_padding!important;
		    }
		";
    }

    if($subheader_color !== '') {
    	$mgt_custom_css .= "
		    .$unique_class_name.mgt-pricing-table .mgt-pricing-table-subheader {
		        color: $subheader_color!important;
		    }
		";
    }

    if($subheader_bg_color !== '') {
    	$mgt_custom_css .= "
		    .$unique_class_name.mgt-pricing-table .mgt-pricing-table-subheader,
		    .$unique_class_name.mgt-pricing-table .mgt-pricing-table-button {
		        background-color: $subheader_bg_color!important;
		    }
		";
    }
    // List:
    if($format_item_fontsize !== '') {
    	$mgt_custom_css .= "
		    .$unique_class_name.mgt-pricing-table ul li {
		        font-size: $format_item_fontsize!important;
		        line-height: normal!important;
		    }
		";
    }
    if($format_item_padding !== '') {
    	$mgt_custom_css .= "
		    .$unique_class_name.mgt-pricing-table ul li {
		        padding: $format_item_padding!important;
		    }
		";
    }

    if($list_text_color !== '') {
    	$mgt_custom_css .= "
		    .$unique_class_name.mgt-pricing-table ul li {
		        color: $list_text_color!important;
		    }
		";
    }

    if($list_bg_color_1 !== '') {
    	$mgt_custom_css .= "
		    .$unique_class_name.mgt-pricing-table ul li {
		        background-color: $list_bg_color_1!important;
		    }
		";
    }

    if($list_bg_color_2 !== '') {
    	$mgt_custom_css .= "
		    .$unique_class_name.mgt-pricing-table ul li:nth-child(even) {
		        background-color: $list_bg_color_2;
		    }
		";
    }
    // Link:
    if($a_color !== '') {
    	$mgt_custom_css .= "
		    .$unique_class_name.mgt-pricing-table a {
		        color: $a_color!important;
		    }
		";
    }
    // Border color:
    if($border_color !== '') {
    	$mgt_custom_css .= "
		    .$unique_class_name.mgt-pricing-table.bordered,
			.$unique_class_name.mgt-pricing-table.bordered h4.mgt-pricing-table-header,
			.$unique_class_name.mgt-pricing-table.bordered .mgt-pricing-table-subheader,
			.$unique_class_name.mgt-pricing-table.bordered ul li,
			.$unique_class_name.mgt-pricing-table.bordered .mgt-pricing-table-button {
		        border-color: $border_color!important;
		    }
		";
    }

	if($mgt_custom_css !== '') {
		$mgt_custom_css = str_replace(array("\r", "\n", "  ", "	"), '', $mgt_custom_css);
		echo "<style scoped='scoped'>$mgt_custom_css</style>"; // This variable contains user Custom CSS code and can't be escaped with WordPress functions.
	}

	$add_class .= ' '.$unique_class_name;

	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), '', $atts );

	$header_text_html = '<h4 class="mgt-pricing-table-header" data-style="'.esc_attr($style).'">'.wp_kses_post($header_text).'</h4>';

	if($subheader_icon !== '') {
		$subheader_icon_html = '<div class="mgt-pricing-table-icon"><i class="fa fa-'.$subheader_icon.'"></i></div>';
	} else {
		$subheader_icon_html = '';
	}

	if($subheader_text !== '') {
		$subheader_text_html =  '<div class="mgt-pricing-table-subheader">'.$subheader_icon_html.wp_kses_post($subheader_text).'</div>';
	} else {
		$subheader_text_html = '';
	}

	if($css_animation !== '') {

		$animation_css_class = ' wpb_animate_when_almost_visible wpb_'.$css_animation;

		// Load animation JS
		wp_register_script( 'waypoints', vc_asset_url( 'lib/waypoints/waypoints.min.js' ), array( 'jquery' ), WPB_VC_VERSION, true );
		wp_enqueue_script( 'waypoints' );

	} else {
		$animation_css_class = '';
	}

	echo '<div class="mgt-pricing-table'.esc_attr($add_class).' wpb_content_element'.esc_attr( $css_class ).esc_attr($animation_css_class).'">'.$header_text_html.$subheader_text_html.'<div class="mgt-pricing-table-list">'.wp_kses_post($sc_content).$button_html.'</div></div>';

	$sc_content = ob_get_contents();
	ob_end_clean();
	return $sc_content;
}

add_shortcode("mgt_pricing_table_wp", "mgt_shortcode_pricing_table_wp");
