<!-- get header content -->
<?php get_header(); ?>

<div class="main-content">
	<div class="main-top-1">
		<div class="col-md-8">
			<?php echo do_shortcode( '[soliloquy id="4"]' ) ?>
		</div>

		<div class="col-md-4">	
			<?php 
				$featuredTopTwo = get_category_posts($GLOBALS['feaCatId'], 2);
				foreach($featuredTopTwo as $ft){
					$ftImage = wp_get_attachment_image_src( get_post_thumbnail_id( $ft->ID ), 'large' ); 
			?>
				<div class="ft-img-wrap">
					<a href="<?=$ft->guid?>">
						<img class="img-responsive ft-img" src="<?=$ftImage[0]?>" />
					</a>
					<div class="ft-img-title"><?=substr($ft->post_title, 0, 30)?></div>
				</div>
			<?php
				}
			?>		
		</div>
	</div>

	<div class="clearfix"></div>

	<div class="main-top-2">
		<h4 class="m-t-h4">
			<span class="title">Featured Articles</span>
		</h4>

		<?php 
			$featuredTopTwo = get_category_posts($GLOBALS['feaCatId'], 4, 2);
			foreach($featuredTopTwo as $ft){
				$ftImage = wp_get_attachment_image_src( get_post_thumbnail_id( $ft->ID ), 'large' ); 
		?>
			<div class="col-md-3 f-a-col">		
				<div class="img-hover">		
					<a href="<?=$ft->guid?>">
						<img class="img-responsive img-hover-c" src="<?=$ftImage[0]?>" />
					</a>
				</div>
				<div class="m-t-2-title">
					<a href="<?=$ft->guid?>"><?=substr($ft->post_title, 0, 30)?></a>
				</div>
			</div>
		<?php
			}
		?>				
	</div>

	<div class="clearfix"></div>

	<div class="main-top-3">
		<div class="col-md-8">
			<h4 class="m-t-h4 m-t-3-ent">
				<span class="title">Entertainment</span>
			</h4>

			<?php 
				$entPosts = get_category_posts($GLOBALS['entCatId']);
				foreach($entPosts as $ep){
					$epImg = wp_get_attachment_image_src( get_post_thumbnail_id( $ep->ID ), 'large' ); 
			?>
				<div class="col-md-3 f-a-col">		
					<div class="img-hover">		
						<a href="<?=$ep->guid?>">
							<img class="img-responsive img-hover-c" src="<?=$epImg[0]?>" />
						</a>
					</div>
					<div class="m-t-2-title">
						<a href="<?=$ep->guid?>"><?=substr($ep->post_title, 0, 30)?></a>
					</div>
				</div>
			<?php
				}
			?>			
		</div>

		<div class="col-md-4">
			<?php get_sidebar();?>
		</div>
	</div>
</div>

<div class="clearfix"></div>


<!-- get footer content -->
<?php get_footer(); ?>