<?php
// global variable
$GLOBALS['featuredCatId'] = 2;

/* Add css and js to the Wordpress theme*/
function theme_add_assets() {
	// load css
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'style-css', get_template_directory_uri() . '/style.css' );

	// load javascript
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-1.11.1.min');
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '', true );
	wp_enqueue_script( 'jquery.easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array(), '', true );
}
add_action( 'wp_enqueue_scripts', 'theme_add_assets' );

//  declare their support for post thumbnails 
add_theme_support( 'post-thumbnails' ); 

// get featured posts
function get_category_posts($categoryId = '', $page = 5, $offset = 0){
	$args = array(
		'posts_per_page'   => $page,
		'offset'           => $offset,
		'category'         => $categoryId,
		'orderby'          => 'post_date',
		'order'            => 'DESC',
		'post_type'        => 'post',
		'post_status'      => 'publish',
		'suppress_filters' => true 
	); 

	return get_posts( $args );
}

