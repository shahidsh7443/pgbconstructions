<?php

// Shortcode [countdown_wp]
function mgt_shortcode_countdown_wp($atts, $sc_content = null) {
	extract(shortcode_atts(array(
		'counter_date_format' => '%D days %H:%M:%S',
		'counter_value_to' => '2016/01/01',
		'text_color' => ''
	), $atts));

	wp_register_script('countdown', get_template_directory_uri() . '/js/jquery.countdown.min.js');
	wp_enqueue_script('countdown');

	ob_start();

	$rand_id = rand(1000,100000);

	$add_style = '';

	if($text_color!=='') {
		$add_style = ' style="color: '.esc_attr($text_color).'"';
	}

	echo '<div class="mgt-countdown-wrapper wpb_content_element">';
	echo '<div class="mgt-countdown-item" id="mgt-countdown-item-'.intval($rand_id).'"'.$add_style.'></div>';
	echo '</div>';
?>
	<script type="text/javascript">
	(function($){
	 $(document).ready(function() {
	   $("#mgt-countdown-item-<?php echo intval($rand_id); ?>").countdown("<?php echo esc_js($counter_value_to); ?>", function(event) {
	     $(this).text(
	       event.strftime('<?php echo esc_js($counter_date_format); ?>')
	     );
	   });
	});})(jQuery);
	</script>
<?php
	$sc_content = ob_get_contents();
	ob_end_clean();
	return $sc_content;
}

add_shortcode("mgt_countdown_wp", "mgt_shortcode_countdown_wp");

?>