<?php

// Shortcode [message_box_wp]
function mgt_shortcode_message_box_wp($atts, $sc_content = null) {
	extract(shortcode_atts(array(
		'message_text' => 'Message box test',
		'message_type' => 'mgt-message-box-message'
	), $atts));
	
	ob_start();

	echo '<div class="mgt-message-box '.esc_attr($message_type).'">'.wp_kses_post($message_text).'</div>';

	$sc_content = ob_get_contents();
	ob_end_clean();
	return $sc_content;
}

add_shortcode("mgt_message_box_wp", "mgt_shortcode_message_box_wp");
