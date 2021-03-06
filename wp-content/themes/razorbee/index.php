<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package TheBuilt
 */

get_header(); 

$thebuilt_theme_options = thebuilt_get_theme_options();

// Demo settings
if ( defined('DEMO_MODE') && isset($_GET['blog_sidebar_position']) ) {
  $thebuilt_theme_options['blog_sidebar_position'] = $_GET['blog_sidebar_position'];
}

$blog_sidebarposition = $thebuilt_theme_options['blog_sidebar_position'];

if(is_active_sidebar( 'main-sidebar' ) && ($blog_sidebarposition <> 'disable') ) {
	$span_class = 'col-md-9';
}
else {
	$span_class = 'col-md-12';
}

?>

<div class="content-block">
<div class="container-bg">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-item-title">
          <h1><?php esc_html_e('News', 'thebuilt'); ?></h1>
        </div>
      </div>
    </div>
  </div>
  <?php thebuilt_show_breadcrumbs(); ?>
</div>
	<div class="container">
		<div class="row">
			<?php if ( is_active_sidebar( 'main-sidebar' ) && ( $blog_sidebarposition == 'left')) : ?>
			<div class="col-md-3 main-sidebar sidebar">
			<ul id="main-sidebar">
			  <?php dynamic_sidebar( 'main-sidebar' ); ?>
			</ul>
			</div>
			<?php endif; ?>
			<div class="<?php echo esc_attr($span_class); ?>">
			
			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>
				
				<?php endwhile; ?>
				
				
				<?php thebuilt_content_nav( 'nav-below' ); ?>
				
			<?php else : ?>

				<?php get_template_part( 'no-results', 'index' ); ?>

			<?php endif; ?>
			</div>
			<?php if ( is_active_sidebar( 'main-sidebar' ) && ( $blog_sidebarposition == 'right')) : ?>
			<div class="col-md-3 main-sidebar sidebar">
			<ul id="main-sidebar">
			  <?php dynamic_sidebar( 'main-sidebar' ); ?>
			</ul>
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>