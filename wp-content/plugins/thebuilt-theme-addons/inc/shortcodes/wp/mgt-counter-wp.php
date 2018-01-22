<?php

// Shortcode [counter_wp]
function mgt_shortcode_counter_wp($atts, $sc_content = null) {
	extract(shortcode_atts(array(
		'counter_value_from' => '0',
		'counter_value_to' => '100',
		'counter_title' => '',
		'speed' => '2000',
		'align' => 'left',
		'color' => 'black',
		'icon' => '',
	), $atts));

	wp_register_script('appear', get_template_directory_uri() . '/js/jquery.appear.js');
	wp_enqueue_script('appear');

	wp_register_script('countto', get_template_directory_uri() . '/js/jquery.countTo.js');
	wp_enqueue_script('countto');

	ob_start();

	if($icon !== '') {
		$icon_html = '<div class="mgt-counter-icon"><i class="fa fa-'.$icon.'"></i>
</div>';
	} else {
		$icon_html = '';
	}

	echo '<div class="mgt-counter-wrapper wpb_content_element text-'.esc_attr($color).' text-'.esc_attr($align).'">';
	echo wp_kses_post($icon_html);
	echo '<span class="mgt-counter-value" data-from="'.esc_attr($counter_value_from).'" data-to="'.esc_attr($counter_value_to).'" data-speed="'.esc_attr($speed).'">'.esc_html($counter_value_to).'</span>';
	if(trim($counter_title) !== '') {
		echo '<h5 class="mgt-counter-title">'.esc_html($counter_title).'</h5>';
	}
	echo '</div>';

	$sc_content = ob_get_contents();
	ob_end_clean();
	return $sc_content;
}

add_shortcode("mgt_counter_wp", "mgt_shortcode_counter_wp");
