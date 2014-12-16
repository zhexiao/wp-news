		
		<div class="clearfix"></div>

		<!-- dynatic sidebar -->
		<ul class="bottom-widget-area">
			<?php dynamic_sidebar( 'bottom-sidebar' ); ?>
			<li id="text-4" class="col-md-4 clearfix widget widget_text">
				<h2 class="widgettitle">Share</h2>
				<div class="textwidget">
					<a target="_blank" href="http://www.facebook.com/sharer.php?u=<?=$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];?>" class="fa fa-facebook" data-toggle="tooltip" data-placement="top" data-original-title="Share on Facebook"></a>

					<a target="_blank" href="http://twitter.com/home?status=<?=$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];?>" class="fa fa-twitter" data-toggle="tooltip" data-placement="top" data-original-title="Share on Twitter"></a>

					<a target="_blank" href="http://plus.google.com/share?url=<?=$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];?>" class="fa fa-google-plus" data-toggle="tooltip" data-placement="top" data-original-title="Share on Google+"></a>

					<a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?=$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];?>" class="fa fa-linkedin" data-toggle="tooltip" data-placement="top" data-original-title="Share on LinkedIn"></a>
				</div>
			</li>
		</ul>

		<div class="clearfix"></div>
		
		<div class="button-copy">
			Copyright © <?=date('Y')?> Zhe Xiao. All rights reserved.
		</div>
		<div class="clearfix"></div>
   	</div>
 
	<?php wp_footer(); ?>

	<!-- google analytic -->
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-57681337-1', 'auto');
	  ga('send', 'pageview');

	</script>
</body>
</html>