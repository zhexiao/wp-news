<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="<?=bloginfo('description'); ?>" />
	<title><?=empty(wp_title( '', false, 'right' ))?bloginfo('name'):wp_title( '', false, 'right' );?></title>
	<?php wp_head(); ?>
</head>

<body <?php body_class();?>>
	<div class="container main-wrap">
		<header>
			<div class="text-center header-1">
				<span class="date">
					<?=date('l, M j, Y', time())?>
				</span>
				<a href="" class="header-logo">
					<img src="<?=get_bloginfo('template_directory');?>/images/logo.png" />
				</a>
			</div>

			<nav class="navbar navbar-default header-navbar" role="navigation">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->			
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navigator">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->			
					<div class="collapse navbar-collapse" id="header-navigator">
						<ul class="nav navbar-nav header-nav-ul">				
							<?=wp_nav_menu( array( 'theme_location' => 'top_navigation' ) ); ?>	
						</ul>
					</div>
				</div>
			</nav>
		</header>