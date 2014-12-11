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
		<?php if ( ! post_password_required() && ! is_attachment() ) :
			// the_post_thumbnail();
		endif; ?>

		<?php if ( is_single() ) : ?>
			<h1 class="entry-title">
				<?php the_title(); ?>
			</h1>
		<?php else : ?>
			<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark">
					<?php the_title(); ?>
				</a>
			</h1>
		<?php endif; ?>

		<?php if ( comments_open() ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( '<span class="leave-reply">' . 'Leave a reply' . '</span>', '1 Reply', '% Replies'); ?>
			</div>
		<?php endif; ?>
	</header>

	<?php if ( is_search() ) : ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div>
	<?php else : ?>
		<div class="entry-content">
			<?php the_content( 'Continue reading <span class="meta-nav">&rarr;</span>' ); ?>
			<?php wp_link_pages( array( 
				'before' => '<div class="page-links">' . 'Pages:', 
				'after' => '</div>' 
			) ); ?>
		</div>
	<?php endif; ?>

	<footer class="entry-meta">
		<?php post_entry_meta(); ?>
		<?php edit_post_link( 'Edit', '<span class="edit-link">', '</span>' ); ?>
		<?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
			<div class="author-info">
				<div class="author-avatar">
					<?php
					/** This filter is documented in author.php */
					$author_bio_avatar_size = apply_filters( 'twentytwelve_author_bio_avatar_size', 68 );
					echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
					?>
				</div>
				<div class="author-description">
					<h2><?php printf(  'About %s', get_the_author() ); ?></h2>
					<p><?php the_author_meta( 'description' ); ?></p>
					<div class="author-link">
						<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
							<?php printf( 'View all posts by %s <span class="meta-nav">&rarr;</span>', get_the_author() ); ?>
						</a>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</footer>
</article>
