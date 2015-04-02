<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<div class="featured-post">
			Featured post
		</div>
	<?php endif; ?>

	<header class="entry-header">	
		<!-- image -->
		<?php if ( ! post_password_required() && ! is_attachment() && has_post_thumbnail()) : ?>
			<div class="entry-image">
				<img src="<?=wp_get_attachment_url( get_post_thumbnail_id() );?>" />
			</div>
		<?php endif; ?>

		<!-- title -->
		<?php if ( is_single() ) : ?>
			<h1 class="entry-title">
				<?php the_title(); ?>

				<?php if ( comments_open() ) : ?>
					<a href="#respond" class="entry-comment-link-wrap">
						<i class="fa fa-comments">
							<?=comments_number(0, 1, '%', 'comment-link'); ?>
						</i>
					</a>
				<?php endif; ?>
			</h1>
		<?php else : ?>
			<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</h1>
		<?php endif; ?>

		<!-- meta1 info -->
		<div class="entry-meta-1">
			<span class="author">
				<span>By</span>
				<a href="<?=esc_url(get_author_posts_url(get_the_author_meta('ID')))?>" ><?=get_the_author();?></a>
			</span>

			<span class="datetime">
				on <?=get_the_time().', '.get_the_date()?>
			</span>

			<span class="category">
				<?=get_the_category_list(', ');?>
			</span>
		</div>

		<!-- content -->
		<?php if ( is_search() || is_category() ) : ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div>
		<?php else : ?>
			<div class="entry-content">
				<?php the_content( 'Read more...' ); ?>
				<?php wp_link_pages( array( 
					'before' => '<div class="page-links">' . 'Pages:', 
					'after' => '</div>' 
				) ); ?>
			</div>
		<?php endif; ?>

		<!-- meta2 info-->
		<div class="entry-meta-2">
			<b class="tagLabel"><i class="fa fa-tags"></i>TAGS:</b>
			<?=get_the_tag_list( '', '');?>

			<span class="entry-share">
				<?=generate_shares( get_the_ID() );?>
			</span>
		</div>
	</header>
</article>
