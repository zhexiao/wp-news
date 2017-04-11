<!-- main content -->
<?php get_header(); ?>

<div class="content-wrap container">
	<div class="slides">
		<?php echo do_shortcode('[metaslider id=10]')?>
	</div>
	
	<div class="list-wrap clearfix col-md-12">
		<div class="tpl-header featured-tpl-header">
			<h3>Featured Posts</h3>
		</div>
		
		<?php
		  	$featured_posts = zx_get_posts([
		        'meta_key' => 'featured-post-checkbox',
		  		'meta_value' => 1,
		  		'posts_per_page' => 6
		    ]);
			while($featured_posts->have_posts()): 
				$featured_posts->the_post(); 
		?>
				<div class="col-md-4">
					<?php get_template_part( 'template-parts/content', 'lists-tpl'); ?>
				</div>
		<?php 
			endwhile; 
		?>
	</div>
	
	<div class="list-wrap clearfix">
		<div class="col-md-8 sidebar-board">
			<div class="list-wrap clearfix">
				<div class="tpl-header news-tpl-header">
					<h3>News</h3>
				</div>
				
				<?php
				  	$posts = zx_get_posts([
				        'category_name' => 'news',
				    ]);
					while($posts->have_posts()): 
						$posts->the_post(); 
				?>
						<div class="col-md-6">
							<?php get_template_part( 'template-parts/content', 'lists-tpl'); ?>
						</div>
				<?php 
					endwhile; 
				?>
			</div>
			
			<div class="list-wrap  clearfix">
				<div class="tpl-header business-tpl-header">
					<h3>Business</h3>
				</div>
				
				<?php
				  	$posts = zx_get_posts([
				        'category_name' => 'business',
				        'posts_per_page' => 2
				    ]);
					while($posts->have_posts()): 
						$posts->the_post(); 
				?>
						<div class="col-md-6">
							<?php get_template_part( 'template-parts/content', 'lists-tpl'); ?>
						</div>
				<?php 
					endwhile; 
				?>
			</div>
			
			<div class="list-wrap clearfix">
				<div class="tpl-header entertainment-tpl-header">
					<h3>Entertainment</h3>
				</div>
				
				<?php
				  	$posts = zx_get_posts([
				        'category_name' => 'entertainment',
				        'posts_per_page' => 2
				    ]);
					while($posts->have_posts()): 
						$posts->the_post(); 
				?>
						<div class="col-md-6">
							<?php get_template_part( 'template-parts/content', 'lists-tpl'); ?>
						</div>
				<?php 
					endwhile; 
				?>
			</div>
		</div>
		
		<div class="col-md-4 sidebar">
			<?php dynamic_sidebar( 'right-sidebar' ); ?>
		</div>
	</div>

	<div class="list-wrap clearfix">
		<div class="col-md-4">
			<div class="tpl-header tech-tpl-header">
				<h3>Technology</h3>
			</div>

			<?php
			  	$posts = zx_get_posts([
			        'category_name' => 'technology',
			        'posts_per_page' => 3
			    ]);
				while($posts->have_posts()): 
					$posts->the_post(); 
			?>
					<div class="col-md-12">
						<?php get_template_part( 'template-parts/content', 'lists-tpl'); ?>
					</div>
			<?php 
				endwhile; 
			?>
		</div>

		<div class="col-md-4">
			<div class="tpl-header sports-tpl-header">
				<h3>Sports</h3>
			</div>

			<?php
			  	$posts = zx_get_posts([
			        'category_name' => 'sports',
			        'posts_per_page' => 3
			    ]);
				while($posts->have_posts()): 
					$posts->the_post(); 
			?>
					<div class="col-md-12">
						<?php get_template_part( 'template-parts/content', 'lists-tpl'); ?>
					</div>
			<?php 
				endwhile; 
			?>
		</div>

		<div class="col-md-4">
			<div class="tpl-header world-tpl-header">
				<h3>World</h3>
			</div>

			<?php
			  	$posts = zx_get_posts([
			        'category_name' => 'world',
			        'posts_per_page' => 3
			    ]);
				while($posts->have_posts()): 
					$posts->the_post(); 
			?>
					<div class="col-md-12">
						<?php get_template_part( 'template-parts/content', 'lists-tpl'); ?>
					</div>
			<?php 
				endwhile; 
			?>
		</div>
	</div>
</div>

<!-- get footer content -->
<?php get_footer(); ?>



