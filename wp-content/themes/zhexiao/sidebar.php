<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
<div class="right-sidebar" >
	<ul class="widget-area">
		<?php dynamic_sidebar( 'right-sidebar' ); ?>
	</ul>
</div>
<?php endif; ?>