<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="resource-type" content="document" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,400;1,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,300;0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="site-root"></div>
	<div id="wapper" class="site">
		<div id="fb-root"></div>
		<header id="main-header">
			<nav id="mainnav" class="navbar navbar-expand-md navbar-light" role="navigation">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'your-theme-slug' ); ?>">
						<span class="navbar-toggler-icon"></span>
					</button>
					<a class="navbar-brand" href="<?= esc_url(site_url('/')); ?>">
						<img class="logo" src="<?= get_field('logo', 'option'); ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" />
						<span class="text d-none"><i class="fa fa-home"></i> <?= __('Home', 'cit_service') ?></span>
					</a>
					<?php
					if (has_nav_menu('primary')) {
						wp_nav_menu([
							'theme_location'  => 'primary',
							'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
							'container'       => 'div',
							'container_class' => 'collapse navbar-collapse',
							'container_id'    => 'bs-example-navbar-collapse-1',
							'menu_class'      => 'navbar-nav mr-auto',
							'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
							'walker'          => new WP_Bootstrap_Navwalker(),
						]);
					}
					?>

				</div>
			</nav><!-- mainnav -->
		</header><!-- /#main-header -->