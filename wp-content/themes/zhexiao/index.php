<?php get_header(); ?>
<div class="row">
	<div class="col-md-8">
		<?php if (have_posts()) :
			while (have_posts()) : {
				the_post();
				the_title();
				echo( '<br />' );	
				the_content();
				echo( '<br />' );
			}
			endwhile;
		endif; ?>
	</div>
	<div class="col-md-4">
		<?php get_sidebar(); ?></div>
</div>

<?php get_footer(); ?>