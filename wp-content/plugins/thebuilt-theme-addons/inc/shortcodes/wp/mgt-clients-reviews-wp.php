<?php

// Shortcode [clients_reviews_wp]
function mgt_shortcode_clients_reviews_wp($atts, $content = null) {
	extract(shortcode_atts(array(
		'use_slider' => 0,
		'slider_autoplay' => 0,
		'slider_navigation' => 0,
		'slider_pagination' => 1,
		'post_type' => 'mgt_clients_reviews',
        'exclude' => '',
        'include' => '',
        'orderby' => 'date',
        'reviews_style' => 'box',
        'items_per_row' => 1,
        'order' => 'ASC',
        'posts_per_page' => 10,
        'text_color' => 'text-dark'
	), $atts));
	ob_start();

	$args = array(
		'posts_per_page'   => $posts_per_page,
		'offset'           => 0,
		'category'         => '',
		'category_name'    => '',
		'orderby'          => $orderby,
		'order'            => $order,
		'include'          => $include,
		'exclude'          => $exclude,
		'meta_key'         => '',
		'meta_value'       => '',
		'post_type'        => $post_type,
		'post_mime_type'   => '',
		'post_parent'      => '',
		'post_status'      => 'publish',
		'suppress_filters' => true 
	);

	$posts = get_posts( $args );

	if(count($posts) == 1) {
		$single_post = ' mgt-single-review';
	} else {
		$single_post = '';
	}

	$rand_id = rand(1000,100000);

  	$style = '';

	if($use_slider == 1) {

		$style = ' style="display: none;"';

		if($slider_autoplay == 1) {
			$slider_autoplay = 'true';
		} else {
			$slider_autoplay = 'false';
		}
		if($slider_navigation == 1) {
			$slider_navigation = 'true';
		} else {
			$slider_navigation = 'false';
		}
		if($slider_pagination == 1) {
			$slider_pagination = 'true';
		} else {
			$slider_pagination = 'false';
		}

		echo '<div class="mgt-client-reviews-wrapper">';
	}

	$add_class = $text_color;

	$add_class .= ' reviews-style-'.$reviews_style;

	if($text_color == 'text-white') {
		$owlnav = ' owl-invert-nav';
	} else {
		$owlnav = ' owl-normal-nav';
	}

	echo '<div id="mgt-client-reviews-'.intval($rand_id).'" class="mgt-client-reviews'.esc_attr($single_post).' wpb_content_element'.esc_attr($owlnav).'"'.$style.'>';

	foreach($posts as $post) {

	  	echo '<div class="mgt-client-review '.esc_attr($add_class).'">';

	    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thebuilt-reviews-avatar');

	    if(has_post_thumbnail( $post->ID )) {
	    	$image_html ='<div class="mgt-client-review-image"><img src="'.esc_url($image[0]).'" alt="'.esc_attr($post->post_title).'"/></div>';
	    }
	    else {
	    	$image_html = '';
	    }  	

	    $reviewer_title = get_post_meta( $post->ID, '_thebuilt_clients_reviews_title', true );

	    if($reviewer_title !== '') {
	    	$reviewer_title_html = ' / <span>'.$reviewer_title.'</span>';
	    } else {
	    	$reviewer_title_html = '';
	    }

	    // All data inside $image_html variable already correctly escaped and safe.
	  	echo '<div class="mgt-client-review-details"><div class="mgt-client-review-content">'.wp_kses_post($post->post_content).'</div><div class="mgt-client-review-title">'.$image_html.'<h5>'.esc_html($post->post_title).' <span>'.wp_kses_post($reviewer_title_html).'</span></h5></div></div>';
	  	echo '<div class="clear"></div>';
	    echo '</div>';
	} 


	echo '</div>';

	if($use_slider == 1) {
		echo '</div>';
	}

	if($use_slider == 1) {
		echo '<script>(function($){
	    $(document).ready(function() {

		    $("#mgt-client-reviews-'.intval($rand_id).'").owlCarousel({
	            items: '.esc_js($items_per_row).',
	            itemsDesktop: [1024,1],
	            itemsTablet: [770,1],
	            itemsMobile : [480,1],
	            autoPlay: '.esc_js($slider_autoplay).',
	            navigation: '.esc_js($slider_navigation).',
	            navigationText : false,
	            pagination: '.esc_js($slider_pagination).',
	            afterInit : function(elem){
	                $(this).css("display", "block");
	            }
		    });
	    });})(jQuery);</script>';
	}

	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}

add_shortcode("mgt_clients_reviews_wp", "mgt_shortcode_clients_reviews_wp");
