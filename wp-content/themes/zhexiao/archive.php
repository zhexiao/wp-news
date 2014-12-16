<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Twelve already
 * has tag.php for Tag archives, category.php for Category archives, and
 * author.php for Author archives.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

<div class="main-top-3">
	<div class="col-md-8 search-result">
		<?php if ( have_posts() ) : ?>
			<h1 class="archive-title">
				<?php printf( 'Monthly Archives: %s', '<span>' . get_the_date('F Y') . '</span>' ); ?>
			</h1>

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php post_content_nav( 'nav-below' ); ?>

		<?php else : ?>
			<article id="post-0" class="post no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title">Nothing Found!</h1>
				</header>

				<div class="entry-content">
					<p>Sorry, but nothing matched your search criteria. Please try again with some different.'</p>
				</div>
			</article>
		<?php endif; ?>
	</div>
	
	<div class="col-md-4 col-right-sidebar">
		<?php get_sidebar(); ?>
	</div>
</div>


<?php get_footer(); ?>