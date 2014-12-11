<?php
/**
 * global variable
 */
$GLOBALS['catTop1'] = 8;
$GLOBALS['catTop2'] = 7;
$GLOBALS['catTop3'] = 6;
$GLOBALS['catTop4'] = 5;
$GLOBALS['catTop5'] = 2;
$GLOBALS['catTop6'] = 4;
$GLOBALS['catTop7'] = 1;

// Since WordPress 3.6, If your theme supports HTML5, which happens if it uses:
add_theme_support( 'html5', array( 'search-form' ) );

// declare their support for post thumbnails 
add_theme_support( 'post-thumbnails' ); 


/**
 * Add css and js to the Wordpress theme
 */
function theme_add_assets() {
	// load css
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'style-css', get_template_directory_uri() . '/style.css' );

	// load javascript
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-1.11.1.min');
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '', true );
	wp_enqueue_script( 'jquery.easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array(), '', true );
}
add_action( 'wp_enqueue_scripts', 'theme_add_assets' );


/**
 * get post content
 */
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


/**
 * Register dynamic sidebars.
 */
function sidebar_widgets_init() {
	$args = array(
		'name'          => __( 'Right Sidebar', 'right-sidebar' ),
		'id'            => 'right-sidebar',
		'description'   => '',
	    'class'         => '',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>' 
	);

	register_sidebar($args);
}
add_action( 'widgets_init', 'sidebar_widgets_init' );


/**
 * get the  first image in post content
 * @return [type] [description]
 */
function catch_that_image() {
	global $post, $posts;
	$first_img = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	$first_img = $matches[1][0];

	if(empty($first_img)) {
		$first_img = "/path/to/default.png";
	}
	return $first_img;
}

/**
 * show wordpress featured posts
 * @param  [type] $args [description]
 * @return [type]       [description]
 */
function show_featured_posts($args){
	$feaQuery = new WP_Query( array(
		'cat' => $args['cat'],
		'posts_per_page' => $args['posts_per_page'],
		'offset' => $args['offset']
	));
	$str = '';

	while ( $feaQuery->have_posts() ) {
		$feaQuery->the_post();
		$ftImage = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' ); 

		$str .= '<div class="col-md-3 f-a-col">		
					<div class="img-hover">		
						<a href="'.get_permalink().'">
							<img class="img-responsive img-hover-c" src="'.$ftImage[0].'" />
						</a>
					</div>
					<div class="m-t-2-title">
						<a href="'.get_permalink().'">'.get_the_title().'</a>
					</div>
				</div>';
	}	

	wp_reset_postdata();

	echo $str;
}
add_action( 'featured_posts', 'show_featured_posts');


/**
 * use do_action display categorized content
 * @param  [type] $catId [description]
 * @return [type]        [description]
 */
function show_posts_by_category($args){
	$catQuery = new WP_Query( array(
		'cat' => $args['cat'],
		'posts_per_page' => $args['posts_per_page']
	));
	$str = '';

	$i=0;
	while ( $catQuery->have_posts() ) {
		$catQuery->the_post();

		$content = '';
		$extra_class = 'second-post';
		if($i === 0){
			$extra_class = "first-post";
			$content = strip_tags(get_the_content());
			if(strlen($content) > 200){
				$content = substr($content, 0, 200).'...';
			}
		}

		$title = get_the_title();
		if(strlen($title) > 70){
			$title = substr($title, 0, 70).'...';
		}

		$str .= '<div class="col-md-6 f-a-col '.$extra_class.'">		
					<div class="img-hover">		
						<a href="'.get_permalink().'">
							<img class="img-responsive img-hover-c" src="'.catch_that_image().'" />
						</a>
					</div>
					<div class="m-t-2-time">
						<time>'.date('l, M j, Y' ,get_post_time()).'</time>
					</div>
					<div class="m-t-2-title">
						<a href="'.get_permalink().'">'.$title.'</a>
					</div>
					<div class="m-t-2-content">
						'.$content.'
					</div>
					<div class="clearfix"></div>
				</div>';
		$i++;
	}	

	wp_reset_postdata();

	echo $str;
}
add_action( 'categorized_posts', 'show_posts_by_category');


