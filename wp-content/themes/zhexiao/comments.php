<?php
/**
 * The template for displaying html
 *
 * 
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ){
	return;
}
?>

<div class="post-comments-area">
	<?php if ( have_comments() ) { ?>
		<ul class="commentlist">
			<?php wp_list_comments( array( 'callback' => 'user_post_comment', 'style' => 'ul' ) ); ?>
		</ul>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ){?>
		<nav id="comment-nav-below" class="navigation" role="navigation">
			<h1 class="assistive-text section-heading">Comment navigation</h1>
			<div class="nav-previous"><?php previous_comments_link( '&larr; Older Comments' ); ?></div>
			<div class="nav-next"><?php next_comments_link( 'Newer Comments &rarr;' ); ?></div>
		</nav>
		<?php } ?>

		<?php if ( ! comments_open() && get_comments_number() ){ ?>
		<p class="nocomments">Comments are closed</p>
		<?php } ?>

	<?php } ?>

	<?php 
		$comments_args = array(
			'fields' => array(
				'author' => '<p class="comment-form-author"><input placeholder="Your Name" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ).'" size="30"' . $aria_req . ' /></p>',

				'email' => '<p class="comment-form-email"><input placeholder="Your Email" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .'" size="30"' . $aria_req . ' /></p>',
			),			
			'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" aria-required="true" placeholder="Your Comment"></textarea></p>',

	        'title_reply' => 'Write a Comment',
	        'title_reply_to' => 'Write a Reply to %s',

	        'comment_notes_after' => '',
	        'comment_notes_before' => '',

	         'logged_in_as' => '<div class="logged-in-as">' .
							    sprintf(
							    	'%1$s<a class="user" href="%2$s">%3$s</a><a class="logout" href="%4$s">Log out</a>',
							    	get_avatar( get_current_user_id(), 44 ),
							      	admin_url( 'profile.php' ),
							      	$user_identity,
							      	wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
							    ) 
							    . '</div>',
		);
		comment_form($comments_args); 
	?>
</div>