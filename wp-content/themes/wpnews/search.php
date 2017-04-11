<?php
/**
 * This template is used for display search result data
 */

get_header(); ?>

<div class="content-wrap container category-wrap">
    <div class="list-wrap">
        <div class="col-md-8 search-result">
            <?php if ( have_posts() ) : ?>
                <h1 class="archive-title">
                    <?php printf( 'Search Results for: %s', '<span>' . get_search_query() . '</span>' ); ?>
                </h1>

                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'template-parts/content', get_post_format() ); ?>
                <?php endwhile; ?>

                <?php post_content_nav( 'below-pagination' );?>
            <?php else : ?>
                <?php get_template_part( 'template-parts/content', 'none' ); ?>
            <?php endif; ?>
        </div>
        
        <div class="col-md-4 sidebar">
            <?php dynamic_sidebar( 'right-sidebar' ); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>