<!-- header content -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="msvalidate.01" content="793991BF5868EC482D178E28926211BE" />
	<title><?=wp_title( '', false, 'right' );?></title>
	<?php wp_head(); ?>
</head>

<body <?php body_class();?>>


<div class="header-wrap container">
	<div class="text-center header-logo-wrap">
		<span class="date">
			<?=date('l, M j, Y', time())?>
		</span>
		<a class="header-logo">
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
					<?=wp_nav_menu([
						'menu' => 'main_menus',
						'depth' => 0
					])?>
				</ul>
			</div>
		</div>
	</nav>
</div>