<?php
/**
 * The template for displaying Author Archive pages
 *
 * Used to display archive-type pages for posts by an author.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>


<div class="main-top-3">
	<div class="col-md-8 archive-div">
		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title">
					Author Archives: <span><?=get_the_author()?></span>
				</h1>
			</header>

			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'content', get_post_format() );
			endwhile;

			/* Since we called the_post() above, we need to
			 * rewind the loop back to the beginning that way
			 * we can run the loop properly, in full.
			 */
			rewind_posts();

			post_content_nav( 'nav-below' );
			?>
			<div class="clearfix"></div>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
	</div>
	
	<div class="col-md-4 col-right-sidebar">
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>