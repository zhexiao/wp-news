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
	<div class="col-md-8 archive-div">
		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title">
					Category: <span><?=single_cat_title( '', false )?></span>
				</h1>
			</header>

			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'content', get_post_format() );
			endwhile;

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