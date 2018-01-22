<?php

// Shortcode [calltoaction_block_wp]
function mgt_shortcode_calltoaction_block_wp($atts, $sc_content = null) {
	extract(shortcode_atts(array(
		'background_image_id' => '',
		'background_color' => '#EEEEEE',
		'background_repeat' => 'no-repeat',
		'parallax' => 0,
		'title' => '',
		'button_url' => '',
		'button_style' => 'solid',
		'hover_effect' => 'default',
		'button_icon' => '',
		'button_icon_position' => 'left',
		'button_size' => 'normal',
		'text_size' => 'normal',
		'text_tranform' => 'none',
		'text_color' => 'black',
		'side_paddings' => 1,
	), $atts));

	ob_start();

	$style = '';

	$background_image_data = wp_get_attachment_image_src( $background_image_id, 'full' );

	if($background_image_data[0] == '') {
		$style = 'background-color: '.$background_color.';';

	} else {
		$style = 'background: '.$background_color.' url('.$background_image_data[0].') '.$background_repeat.';';
	}

	$add_class = '';

	// End Custom CSS styles

	if($parallax == 1) {
		$add_class .= ' parallax';
	}

	if($text_color == 'white') {
		$add_class .= ' white-text';
	} else {
		$add_class .= ' black-text';
	}

	$button_html = do_shortcode('[mgt_button_wp hover_effect="'.$hover_effect.'" button_style="'.$button_style.'" button_link="'.$button_url.'" button_icon="'.$button_icon.'" button_icon_position="'.$button_icon_position.'" button_display="newline" button_size="'.$button_size.'" text_size="'.$text_size.'" text_tranform="'.$text_tranform.'" button_align="right"]');

	if($sc_content !== '') {
		$content = '<div class="mgt-cta-block-content">'.$sc_content.'</div>';

		$add_class .= ' with-text';
	} else {
		$content = '';

		$add_class .= ' without-text';
	}

	if($side_paddings == 0) {
		$add_class .= ' no-side-paddings';
	}

	echo '<div class="mgt-cta-block clearfix'.esc_attr($add_class).' wpb_content_element" data-style="'.esc_attr($style).'">'.$button_html.'<h5 class="mgt-cta-block-header">'.esc_html($title).'</h5>'.wp_kses_post($content).'</div>';

	$sc_content = ob_get_contents();
	ob_end_clean();
	return $sc_content;
}

add_shortcode("mgt_calltoaction_block_wp", "mgt_shortcode_calltoaction_block_wp");