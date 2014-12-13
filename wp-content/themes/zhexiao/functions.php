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
	wp_enqueue_script( 'jquery-1.11', get_template_directory_uri() . '/js/jquery-1.11.1.min.js');
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '', true );
	wp_enqueue_script( 'jquery.easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array(), '', true );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array(), '', true);
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
 * get the  first image in post content
 * @return [type] [description]
 */
function catch_that_image($content = '') {
	if(empty($content)){
		global $post, $posts;
		$first_img = '';
		ob_start();
		ob_end_clean();
		$content = $post->post_content;
	}

	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
	$first_img = $matches[1][0];

	if(empty($first_img)) {
		return '';
	}
	return $first_img;
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
 * generate share html
 * @return [type] [description]
 */
function generate_shares($postId){
	$str = '<a target="_blank" href="http://www.facebook.com/sharer.php?u='.get_permalink($postId).'" class="fa fa-facebook" data-toggle="tooltip" data-placement="top" title="Share on Facebook"></a>
			<a target="_blank" href="http://twitter.com/home?status='.get_permalink($postId).'" class="fa fa-twitter" data-toggle="tooltip" data-placement="top" title="Share on Twitter"></a>
			<a target="_blank" href="http://plus.google.com/share?url='.get_permalink($postId).'
				" class="fa fa-google-plus" data-toggle="tooltip" data-placement="top" title="Share on Google+">
			</a>
			<a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url='.get_permalink($postId).'
				" class="fa fa-linkedin" data-toggle="tooltip" data-placement="top" title="Share on LinkedIn"">
			</a>';

	echo $str;
}


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

	while ( $catQuery->have_posts() ) {
		$catQuery->the_post();

		// get content
		$content = strip_tags(get_the_content());
		if(strlen($content) > 120){
			$content = substr($content, 0, 120).'...';
		}
		

		// get title
		$title = get_the_title();
		if(strlen($title) > 70){
			$title = substr($title, 0, 70).'...';
		}

		// get image
		$imgStr = '';
		$image = catch_that_image();
		if(!empty($image)){
			$imgStr = 	'<a class="media-top" href="'.get_permalink().'">
					    	<img src="'.$image.'" alt="'.$title.'">
					  	</a>';
		}

		$str .= '<div class="col-md-6 f-a-col">
					<div class="media">
					  	'.$imgStr.'
					  	<div class="media-body">
					    	<div class="c-p-title">
					    		<a href="'.get_permalink().'">'.$title.'</a>
					    	</div>
					    	<div class="c-p-content">
					    		'.$content.'
					    	</div>
					    	<time>'.date('h:i A, D F j, Y', get_post_time()).'</time>
					    	<div class="clearfix"></div>
					  	</div>
					</div>
				</div>';
	}	

	wp_reset_postdata();

	echo $str;
}
add_action( 'categorized_posts', 'show_posts_by_category');


/**
 * display the recent posts
 */
function show_recent_posts($args = array()){
	$str = '';
	$recent_posts = wp_get_recent_posts( $args );
	foreach( $recent_posts as $recent ){
		// check the title
		$title = $recent["post_title"];
		if(strlen($title) > 70){
			$title = substr($title, 0, 70).'...';
		}

		// get the featured image
		$image = wp_get_attachment_url( get_post_thumbnail_id($recent['ID']) );
		if(!$image){
			$image = catch_that_image($recent['post_content']);
		}

		$imgStr = '';	
		if(!empty($image)){
			$imgStr = 	'<a class="media-left" href="'.get_permalink($recent['ID']).'">
					    	<img src="'.$image.'" alt="'.$title.'" style="width: 64px; height: 60px;">
					  	</a>';
		}

		$str .= '<div class="media">
				  	'.$imgStr.'
				  	<div class="media-body">
				    	<div class="r-p-title"><a href="'.get_permalink($recent['ID']).'">'.$title.'</a></div>
				    	<time>'.date('h:i A, D F j, Y', strtotime($recent["post_date"])).'</time>
				  	</div>
				</div>';
	}

	echo $str;
}
add_action( 'recent_posts', 'show_recent_posts');



/**
 * Displays navigation to next/previous pages when applicable.
 *
 */
function post_content_nav( $html_id ) {
	global $wp_query;

	$html_id = esc_attr( $html_id );

	if ( $wp_query->max_num_pages > 1 ){ ?>
		<nav id="<?=$html_id;?>" class="navigation" role="navigation">
			<h3 class="assistive-text">Post navigation</h3>
			<div class="nav-previous"><?php next_posts_link('<span class="meta-nav">&larr;</span> Older posts'); ?></div>
			<div class="nav-next"><?php previous_posts_link('Newer posts <span class="meta-nav">&rarr;</span>'); ?></div>
		</nav>
	<?php };
}