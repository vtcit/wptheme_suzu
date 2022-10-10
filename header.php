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
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="site-root"></div>
	<div id="wapper" class="site">
		<div id="fb-root"></div>
		<header id="main-header">
			<div class="topmod">
				<div class="container">
					<div class="company-name"><?= get_field('company_name', 'option') ?></div>
					<div class="hotline">Hotline <span><?= get_field('hotline', 'option') ?></span></div>
					<div class="google-translate"><?php echo do_shortcode('[gtranslate]'); ?></div>
				</div>
			</div>
			<div class="mainnav">
				<nav class="navbar navbar-inverse">
					<!-- navbar-fixed-top -->
					<div class="container">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mainnav">
								<span class="sr-only">Toggle mainnav</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand<?php if (is_home()) echo ' active' ?>" href="<?php echo esc_url(site_url('/')); ?>"><img class="logo" src="<?= get_field('logo', 'option'); ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" /><span class="text hidden"><i class="fa fa-home"></i> <?php echo __('Home', 'cit_service') ?></span></a>
						</div>
						<div id="mainnav" class="collapse navbar-collapse">
							<?php
							if (has_nav_menu('primary')) {
								wp_nav_menu(array(
									'theme_location' => 'primary',
									'items_wrap'	 => '<ul id="primary-menu" class="%1$s %2$s nav navbar-nav">%3$s</ul>', //<li class="menu-item'.(is_home()? ' active current-menu-item' : '').'"><a href="'.esc_url(site_url('/')).'">'.__('Home', 'cit_service').'</a></li>
									'container'		=> false,
								));
							}
							if (has_nav_menu('top')) {
								wp_nav_menu(array(
									'theme_location' => 'top',
									'items_wrap' => '<ul id="top-menu" class="%1$s %2$s nav navbar-nav">%3$s</ul>',
									'container'		=> false,
								));
							}
							?>
						</div><!-- #mainnav -->
					</div>
				</nav>
			</div><!-- .mainnav -->
		</header><!-- /#main-header -->