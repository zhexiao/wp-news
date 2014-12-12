<!-- get header content -->
<?php get_header(); ?>

<div class="main-content">
	<div class="main-top-1">
		<div class="col-md-8">
			<?php echo do_shortcode( '[soliloquy id="3"]' ) ?>
		</div>

		<div class="col-md-4">	
			<?php 
				$featuredTopTwo = get_category_posts($GLOBALS['catTop1'], 2);
				foreach($featuredTopTwo as $ft){
					$ftImage = wp_get_attachment_image_src( get_post_thumbnail_id( $ft->ID ), 'large' ); 
			?>
				<div class="ft-img-wrap">
					<a href="<?=get_permalink($ft->ID)?>">
						<img class="img-responsive ft-img" src="<?=$ftImage[0]?>" />
					</a>
					<div class="ft-img-title">
						<?=substr($ft->post_title, 0, 30)?>
					</div>
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
			do_action( 'featured_posts', array(
				'cat' => $GLOBALS['catTop1'],
				'posts_per_page' => 4,
				'offset' => 2
			));		
		?>	
	</div>

	<div class="clearfix"></div>

	<div class="main-top-3">
		<div class="col-md-8">
			<h4 class="m-t-h4 m-t-3-ent m-t-3-t1">
				<span class="title">
					<?=get_cat_name( $GLOBALS['catTop2'] )?>
				</span>
				<a class="pull-right view-all" href="<?=get_category_link( $GLOBALS['catTop2'] );?>">
					View All
					<i class="fa fa-angle-double-right"></i>
				</a>
			</h4>
			<div class="m-t-3-content">
				<?php
					do_action( 'categorized_posts', array(
						'cat' => $GLOBALS['catTop2'],
						'posts_per_page' => 4
					));
				?>
			</div>

			<div class="clearfix"></div>

			<h4 class="m-t-h4 m-t-3-ent m-t-3-t2">
				<span class="title">
					<?=get_cat_name( $GLOBALS['catTop3'] )?>
				</span>
				<a class="pull-right view-all" href="<?=get_category_link( $GLOBALS['catTop3'] );?>">
					View All
					<i class="fa fa-angle-double-right"></i>
				</a>
			</h4>
			<div class="m-t-3-content">
				<?php
					do_action( 'categorized_posts', array(
						'cat' => $GLOBALS['catTop3'],
						'posts_per_page' => 4
					));
				?>
			</div>

			<div class="clearfix"></div>

			<h4 class="m-t-h4 m-t-3-ent m-t-3-t3">
				<span class="title">
					<?=get_cat_name( $GLOBALS['catTop4'] )?>
				</span>
				<a class="pull-right view-all" href="<?=get_category_link( $GLOBALS['catTop4'] );?>">
					View All
					<i class="fa fa-angle-double-right"></i>
				</a>
			</h4>
			<div class="m-t-3-content">
				<?php
					do_action( 'categorized_posts', array(
						'cat' => $GLOBALS['catTop4'],
						'posts_per_page' => 4
					));
				?>
			</div>
		</div>

		<div class="col-md-4 col-right-sidebar">
			<?php get_sidebar();?>
		</div>
	</div>

	<div class="clearfix"></div>

	<div class="main-top-4">
		<div class="col-md-4">		
			<h4 class="m-t-h4 m-t-3-ent m-t-4-t1">
				<span class="title">
					<?=get_cat_name( $GLOBALS['catTop5'] )?>
				</span>
				<a class="pull-right view-all" href="<?=get_category_link( $GLOBALS['catTop5'] );?>">
					View All
					<i class="fa fa-angle-double-right"></i>
				</a>
			</h4>
			<div class="m-t-3-content">
				<?php
					do_action( 'categorized_posts', array(
						'cat' => $GLOBALS['catTop5'],
						'posts_per_page' => 3
					));
				?>
			</div>
		</div>

		<div class="col-md-4">		
			<h4 class="m-t-h4 m-t-3-ent m-t-4-t2">
				<span class="title">
					<?=get_cat_name( $GLOBALS['catTop6'] )?>
				</span>
				<a class="pull-right view-all" href="<?=get_category_link( $GLOBALS['catTop6'] );?>">
					View All
					<i class="fa fa-angle-double-right"></i>
				</a>
			</h4>
			<div class="m-t-3-content">
				<?php
					do_action( 'categorized_posts', array(
						'cat' => $GLOBALS['catTop6'],
						'posts_per_page' => 3
					));
				?>
			</div>
		</div>

		<div class="col-md-4">		
			<h4 class="m-t-h4 m-t-3-ent m-t-4-t3">
				<span class="title">
					<?=get_cat_name( $GLOBALS['catTop7'] )?>
				</span>
				<a class="pull-right view-all" href="<?=get_category_link( $GLOBALS['catTop7'] );?>">
					View All
					<i class="fa fa-angle-double-right"></i>
				</a>
			</h4>
			<div class="m-t-3-content">
				<?php
					do_action( 'categorized_posts', array(
						'cat' => $GLOBALS['catTop7'],
						'posts_per_page' => 3
					));
				?>
			</div>
		</div>
	</div>
</div>

<!-- get footer content -->
<?php get_footer(); ?>