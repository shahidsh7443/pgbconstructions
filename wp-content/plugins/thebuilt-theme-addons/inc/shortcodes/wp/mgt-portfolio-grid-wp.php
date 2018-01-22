<?php

// Shortcode [portfolio_grid_wp]
function mgt_shortcode_portfolio_grid_wp($atts, $content = null) {

	global $wp_query, $post;

	extract(shortcode_atts(array(
		'columns' => 4,
		'slider_columns' => 4,
		'item_hover_effect' => 0,
		'slider_autoplay' => 'false',
		'slider_navigation' => 'false',
		'slider_pagination' => 'false',
		'layout' => 0,
        'spaces' => 0,
		'show_filter' => 1,
		'show_viewmore_button' => 1,
		'show_description'	=> 1,
		'filter_effect_1' => 'fade',
		'filter_effect_2' => 'scale',
		'reset_filter_button_text' => 'All',
		'show_viewall_button' => '',
		'open_url' => 0,
		'open_image' => 0,
		'filter_align' => 'left',
		'filter_border' => 'hide',
		'category_name' => '',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => ''
	), $atts));
	ob_start();

	$porfolio_image_size = 'thebuilt-portfolio-thumb-square'; // 1024 by default

	if(($slider_columns < 3) || ($columns < 3)) {
		$porfolio_image_size = 'thebuilt-portfolio-large'; // 1600x800
	}

	// Show items in one column if used Compact/Medium List layout
	if($layout == 5 || $layout == 6) {
		$slider_columns = 1;
		$porfolio_image_size = 'thebuilt-portfolio-large'; // 1600x800
	}

	if((trim($posts_per_page) == '')||($posts_per_page == 0)) {
		$posts_per_page = 10000;
	}

	$all_terms = get_terms( 'mgt_portfolio_filter');

	$show_viewall_button_data = vc_build_link($show_viewall_button);

	if($layout == 1) {
		$spaces = 0;
	}
	
	if($spaces == 1) {
		$add_class = ' portfolio-with-spaces ';
	} else {
		$add_class = '';
	}

	// Don't show filter if Gallery used
	if($layout == 4) {
		$show_filter = 0;
	}

	$filter_add_class = 'filter-'.$filter_align;

	if($filter_border == 'show') {
		$filter_add_class .= ' filter-bordered';
	}

	?>

	<?php if((count($all_terms) > 1) && ($show_filter == 1) && $category_name == ''): ?>
	<div class="row portfolio-filter <?php echo esc_attr($filter_add_class);?>">
		<div class="col-md-12">
		<a class="filter" data-filter="all"><?php echo esc_html($reset_filter_button_text); ?></a><?php 
		foreach ( $all_terms as $term ) {
		  echo '<a class="filter" data-filter=".'.esc_attr($term->slug).'">'.esc_html($term->name).'</a>';
		}
		?><?php if($show_viewall_button_data['title'] !== ''): ?><?php echo '<a class="filter view-all" href="'.esc_url($show_viewall_button_data['url']).'" target="'.esc_attr($show_viewall_button_data['target']).'">'.esc_html($show_viewall_button_data['title']).'</a>'; ?>
		<?php endif; ?>
		</div>
	</div>
	<?php endif; ?>

	<div class="portfolio-list portfolio-columns-<?php echo esc_attr($columns); ?> portfolio-grid-layout-<?php echo esc_attr($layout);?> <?php echo esc_attr($add_class); ?>clearfix" id="portfolio-list">

	<?php

	$temp = $wp_query;
	$wp_query = null;

	$data_item = 0;

	// Show items from specific category
	if($category_name == '') {
		$wp_query = new WP_Query(array(
			'post_type' => 'mgt_portfolio',
			'posts_per_page' => $posts_per_page,
			'orderby'    => $orderby,
			'order' => $order
		));
	} else {
		$wp_query = new WP_Query(array(
			'post_type' => 'mgt_portfolio',
			'tax_query' => array(
				array(
					'taxonomy' => 'mgt_portfolio_filter',
					'field'    => 'slug',
					'terms'    => $category_name,
				),
			),
			'posts_per_page' => $posts_per_page,
			'orderby'    => $orderby,
			'order' => $order
		));
	}

	if(!$wp_query->have_posts()) {
		_e('You does not have projects to display for current MGT Portfolio Grid element settings.', 'thebuilt');
	}

	while ($wp_query->have_posts()) : $wp_query->the_post();

	  $data_item++;
	  
	  $portfolio_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), $porfolio_image_size );

	  $portfolio_brand = get_post_meta( $post->ID, '_portfolio_brand_value', true );
	  $portfolio_brand_url = get_post_meta( $post->ID, '_portfolio_brand_url_value', true );
	  $portfolio_url = get_post_meta( $post->ID, '_portfolio_url_value', true );
	  $portfolio_description = get_post_meta( $post->ID, '_portfolio_description_value', true );

	  $terms = get_the_terms( $post->ID , 'mgt_portfolio_filter' );

	  $terms_count = count($terms);

	  $terms_counter = 0;

	  $terms_slug = '';

	  $categories_html = '';

	  foreach ( $terms ? $terms: array() as $term ) {

	    if($terms_counter  < $terms_count - 1) {
	      $categories_html.= $term->name.' / ';
	    }
	    else
	    {
	      $categories_html .= $term->name;
	    }
	    
	    $terms_slug .= ' '.$term->slug;

	    $terms_counter++;
	  }

	  $style = 'background-image: url('.$portfolio_thumb[0].');';

	  if($layout == 4) {
	  	$item_class_add = 'slide-item';
	  } else {
	  	$item_class_add = 'mix';
	  }

	  // Open item image lightbox instead of item page
	  if($open_image == 1) {
	  	$open_url = 0;

	  	$portfolio_full_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'source' );
	  	$item_url = $portfolio_full_image[0];
	  	$item_rel = 'lightbox';
	  	$item_target = '_self';

	  } else {

		$item_rel = '';

	  	// Open item url instead of item page
		if($open_url == 1) {
			$item_url = $portfolio_url;
			$item_target = '_blank';
		} else {
			$item_url = esc_url(get_permalink( $post->ID ));
			$item_target = '_self';
		}
	  }

	?>
	<div class="portfolio-item-block portfolio-item-animation-<?php echo esc_attr($item_hover_effect);?> <?php echo esc_attr($item_class_add); ?><?php echo esc_attr($terms_slug); ?>" data-item="<?php echo esc_attr($data_item); ?>" data-name="<?php the_title(); ?>">
	<div class="portfolio-item-block-inside">
	  <a href="<?php echo esc_url($item_url);?>" target="<?php echo esc_attr($item_target); ?>" rel="<?php echo esc_attr($item_rel); ?>" title="<?php the_title(); ?>">
	    <div class="portfolio-item-image" data-style="<?php echo esc_attr($style); ?>"></div>
	    <div class="portfolio-item-bg"></div>
	    <div class="info">
	      <span class="sub-title"><?php echo esc_html($categories_html); ?></span>
	      <h4 class="title"><?php the_title(); ?></h4>
	      <?php if($show_description == 1 && $portfolio_description !== ''): ?>
	      <div class="project-description"><?php echo wp_kses_post($portfolio_description); ?></div>
	  	  <?php endif; ?>
	      <?php if($show_viewmore_button == 1): ?>
	      <div class="view-more btn mgt-button"><?php echo esc_html__('View more', 'thebuilt'); ?></div>
	  	  <?php endif; ?>
	    </div>
	  </a>
	</div>
	</div>
	<?php 
	if($data_item == 3){
	  $data_item = 0;
	}

	endwhile; // end of the loop. 

	wp_reset_query();

	?>
	         
	<?php $wp_query = null; $wp_query = $temp;?>

	</div>


<?php
	// Gallery
	if($layout == 4) {

		echo '<script>(function($){
            $(document).ready(function() {

                function initPortfolioCarousel() {

					$("#portfolio-list").owlCarousel({
	                    items: '.esc_js($slider_columns).',
	                    itemsDesktop:   [1199,'.esc_js($slider_columns).'],
	                    itemsDesktopSmall: [979,1],
	                    itemsTablet: [768,1],
	                    itemsMobile : [479,1],
	                    autoPlay: '.esc_js($slider_autoplay).',
	                    navigation: '.esc_js($slider_navigation).',
	                    navigationText : false,
	                    pagination: '.esc_js($slider_pagination).',
	                    afterInit : function(elem){
	                        $(this).css("display", "block");
	                    }
	                });

				}

				setTimeout(initPortfolioCarousel, 1000);
                
            });})(jQuery);</script>';
	} else {
		echo '<script>(function($){
	    $(document).ready(function() {

		    $("#portfolio-list").mixItUp({effects:["'.esc_js($filter_effect_1).'","'.esc_js($filter_effect_2).'"],easing:"snap"});

	    });})(jQuery);</script>';
	}
    

	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}

add_shortcode("mgt_portfolio_grid_wp", "mgt_shortcode_portfolio_grid_wp");
