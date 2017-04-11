<?php
/**
 * This template is used for display the post details
 */
get_header(); ?>

<div class="post-detail-wrap content-wrap container">
    <div class="list-wrap clearfix">
        <div class="col-md-8 single-post">
            <?php while ( have_posts() ){ the_post(); ?>
                <!-- get post details -->
                <?php get_template_part( 'template-parts/content', get_post_format() ); ?>

                <!-- get previous and next post -->
                <nav class="nav-single clearfix">
                    <div class="col-md-6 nav-previous">
                        <div class="nav-p-n-label"><i class="fa fa-angle-left"></i>PREVIOUS ARTICLE</div>
                        <?php previous_post_link( '%link', '%title' ); ?>
                    </div>
                    <div class="col-md-6 nav-next">
                        <div class="nav-p-n-label">NEXT ARTICLE<i class="fa fa-angle-right"></i></div>
                        <?php next_post_link( '%link', '%title'); ?>
                    </div>
                </nav>

                <!-- get comment template -->
                <div class="page-comments">
                    <?php comments_template(); ?>
                </div>
            <?php } ?>
        </div>
        
        <div class="col-md-4 sidebar">
            <?php dynamic_sidebar( 'right-sidebar' ); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>