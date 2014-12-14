<?php
/**
 * The template for displaying Category pages
 *
 * Used to display archive-type pages for posts in a category.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

<div class="main-top-3">
	<div class="col-md-8">
		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title">
					<?php printf( 'Category Archives: %s', '<span>' . single_cat_title( '', false ) . '</span>' ); ?>
				</h1>

				<?php if ( category_description() ) : ?>
					<div class="archive-meta">
						<?=category_description(); ?>
					</div>
				<?php endif; ?>
			</header>

			<?php
			while ( have_posts() ) : the_post();
				/* Include the post format-specific template for the content. If you want to
				 * this in a child theme then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );

			endwhile;

			post_content_nav( 'nav-below' );
			?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
	</div>
	
	<div class="col-md-4 col-right-sidebar">
		<?php get_sidebar(); ?>
	</div>
</div>


<?php get_footer(); ?>