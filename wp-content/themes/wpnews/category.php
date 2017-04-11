<?php
/**
 * This template used for display posts under category
 */

get_header(); ?>

<div class="content-wrap container category-wrap">
    <div class="list-wrap">
        <div class="col-md-8 archive-div">
            <?php if ( have_posts() ) : ?>
                <header class="archive-header">
                    <h1 class="archive-title">
                        Category: <span><?=single_cat_title( '', false )?></span>
                    </h1>
                </header>

                <?php
                    while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/content', get_post_format() );
                    endwhile;
                ?>

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