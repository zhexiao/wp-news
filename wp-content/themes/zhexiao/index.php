<!-- get header content -->
<?php get_header(); ?>

<div class="main-content">
	<div>
		<?php echo do_shortcode( '[soliloquy id="11"]' ) ?>

		get_category_posts($GLOBALS['featuredCatId']);
	</div>

	<div class="row">
		<div class="col-md-8">
			<?php if (have_posts()) :
				while (have_posts()) : {
					the_post();
					the_title();
					echo( '<br />' );	
					// check if the post has a Post Thumbnail assigned to it.
					if ( has_post_thumbnail() ) {
						the_post_thumbnail('medium');
					} 
					the_content();
					echo( '<br />' );
				}
				endwhile;
			endif; ?>
		</div>
		<div class="col-md-4">
			<?php get_sidebar(); ?></div>
	</div>
</div>


<!-- get footer content -->
<?php get_footer(); ?>