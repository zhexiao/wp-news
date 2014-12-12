<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
<div class="right-sidebar" >
	<!-- search -->
	<form role="search" method="get" id="searchform" class="searchform" action="<?=get_site_url();?>">
		<input type="text" value="<?=$_GET['s']?>" name="s" id="s" placeholder="Search...">			
	</form>

	<!-- recent post -->
	<div class="recent-post">
		<h4 class="r-s-rp">
			<span class="title">Recent Posts</span>
		</h4>
		<?php
		do_action( 'recent_posts', array(
			'posts_per_page' => 5
		));	
		?>	
	</div>

	<!-- dynatic sidebar -->
	<ul class="widget-area">
		<?php dynamic_sidebar( 'right-sidebar' ); ?>
	</ul>
</div>
<?php endif; ?>