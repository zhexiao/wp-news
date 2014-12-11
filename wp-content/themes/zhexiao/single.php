<?php
/**
 * The Template for displaying all single post
 */
get_header(); ?>

<div class="main-top-3">
	<div class="col-md-8">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>

			<nav class="nav-single">
				<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
				<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentytwelve' ) . '</span> %title' ); ?></span>
				<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentytwelve' ) . '</span>' ); ?></span>
			</nav>

			<?php comments_template( '', true ); ?>

		<?php endwhile; ?>
	</div>
	
	<div class="col-md-4 col-right-sidebar">
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>