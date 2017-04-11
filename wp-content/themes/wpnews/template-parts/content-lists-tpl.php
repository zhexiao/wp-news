<div class="content-tpl-wrap">
	<div class="thumbnail">
		<?php 
			// get image
			$image = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID(), 'large'));
			if(!$image){
				$image = get_content_image(get_the_content());
			}
			
			// get title
			$title = get_the_title();
			if(strlen($title) > 70){
				$title = substr($title, 0, 70).'...';
			}
			
			// get content
			$content = strip_tags(get_the_content());
			if(strlen($content) > 120){
				$content = substr($content, 0, 120).'...';
			}
		?>
		<a href="<?php the_permalink(); ?>"> 
			<img src="<?=$image?>">
		</a>
		<div class="caption">
			<h3>
				<a class="title-href" href="<?php the_permalink(); ?>"> 
					<?=$title?>
				</a>
			</h3>
			<p class="content">
				<?=$content?>
			</p>
		</div>
		<div class="meta">
			<time><?=date('h:i A, D F j, Y', get_post_time())?></time>
		</div>
	</div>
</div>
