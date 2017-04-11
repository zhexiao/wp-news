<?php
// Since WordPress 3.6, If your theme supports HTML5, which happens if it uses:
add_theme_support( 'html5', array( 'search-form' ) );

// declare their support for post thumbnails 
add_theme_support( 'post-thumbnails' ); 

// replace core jquery to user jquery
wp_deregister_script('jquery');
wp_register_script('jquery', (get_template_directory_uri() . '/js/jquery-2.1.4.min.js'));
wp_enqueue_script('jquery');

/**
 * Add css and js to the Wordpress theme
 */
function theme_assets() {
	// load css
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri() . '/css/fontawesome.css' );
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'style-css', get_template_directory_uri() . '/style.css', false, time() );

	// load javascript
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '', true );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array(), '', true);
}
add_action( 'wp_enqueue_scripts', 'theme_assets' );


/**
 * Register new wordpress widgets
 * Create two sidebar widgets
 */
function sidebar_widgets_init() {
	register_sidebar(array(
			'name'          => __( 'Right Sidebar', 'right-sidebar' ),
			'id'            => 'right-sidebar',
			'description'   => '',
			'class'         => '',
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>'
	));



	register_sidebar(array(
			'name'          => __( 'Bottom Sidebar', 'bottom-sidebar' ),
			'id'            => 'bottom-sidebar',
			'description'   => '',
			'class'         => '',
			'before_widget' => '<li id="%1$s" class="col-md-4 clearfix widget %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>'
	));
}
add_action( 'widgets_init', 'sidebar_widgets_init' );


/**
 * Get wordpress posts by query
 * @param unknown $args
 * @return WP_Query
 */
function zx_get_posts($args){
	$default = array(
		'posts_per_page' => 4,
	);
	
	$parameters = $args + $default;
	$posts = new WP_Query($parameters);
	
	return $posts;
}

/**
 * generate share html
 * @return [type] [description]
 */
function generate_shares($postId){
    $str = '<a target="_blank" href="http://www.facebook.com/sharer.php?u='.get_permalink($postId).'" class="fa fa-facebook" title="Share on Facebook"></a>
            <a target="_blank" href="http://twitter.com/home?status='.get_permalink($postId).'" class="fa fa-twitter" title="Share on Twitter"></a>
            <a target="_blank" href="http://plus.google.com/share?url='.get_permalink($postId).'" class="fa fa-google-plus" title="Share on Google+"></a>
            <a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url='.get_permalink($postId).'" class="fa fa-linkedin" title="Share on LinkedIn""></a>';

    echo $str;
}

/**
 * 
 * function for get the viewr number of the post
 * @return number|unknown
 */
function get_post_views($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return 0;
    }
    return $count;
}

/**
 * function for set the viewr number of the post
 * @param unknown $postID
 */
function set_post_views($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

/**
 * get the  first image in post content
 * @return [type] [description]
 */
function get_content_image($content = '') {
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
	$first_img = $matches[1][0];

	if(empty($first_img)) {
		return get_bloginfo('template_directory').'/images/upload-empty.png';
	}
	return $first_img;
}


/**
 * create a custom checkbox at the new post page,
 * we can mark this post is featured or not
 */
function zx_featured_post_checkbox() {
	add_meta_box( 'zx_featured_post_checkbox', 'Featured Post', 'zx_featured_post_checkbox_callback', 'post' );
}
/**
 * feature post checkbox callback
 * @param unknown $post
 */
function zx_featured_post_checkbox_callback( $post ) {
	$featured = get_post_meta( $post->ID );
?>
 
	<p>
        <label for="featured-post-checkbox">
            <input type="checkbox" name="featured-post-checkbox" id="featured-post-checkbox" <?=($featured['featured-post-checkbox'][0]==1)?'checked':'';?>/>
            Featured this post
        </label>
	</p>
 
<?php
}
add_action( 'add_meta_boxes', 'zx_featured_post_checkbox' );

/**
 * save custom featured post checkbox
 * @param unknown $post_id
 */
function zx_featured_post_checkbox_save( $post_id ) {
	// Checks save status
	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );
	$is_valid_nonce = ( isset( $_POST[ 'sm_nonce' ] ) && wp_verify_nonce( $_POST[ 'sm_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

	// exit the script is depending on the save status
	if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
		return;
	}

	// Checks for input and saves
	if(isset($_POST['featured-post-checkbox'])){
		update_post_meta( $post_id, 'featured-post-checkbox', 1 );
	} else {
		update_post_meta( $post_id, 'featured-post-checkbox', '' );
	}

}
add_action( 'save_post', 'zx_featured_post_checkbox_save' );

/**
 * Displays navigation to next/previous pages when applicable.
 *
 */
function post_content_nav( $html_id ) {
    global $wp_query;

    $html_id = esc_attr( $html_id );

    if ( $wp_query->max_num_pages > 1 ){ ?>
        <nav id="<?=$html_id;?>" class="navigation" role="navigation">
            <div class="nav nav-previous">
                <?php previous_posts_link('<span class="meta-nav"><i class="fa fa-arrow-left"></i>Newer</span>'); ?>
            </div>
            <div class="nav nav-next">
                <?php next_posts_link('<span class="meta-nav">Older<i class="fa fa-arrow-right"></i></span>'); ?>
            </div>
        </nav>
    <?php };
}
