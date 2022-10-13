
		<footer id="main-footer">
			<?php 
				$menu_locations = get_nav_menu_locations();
			?>
			<div class="footer-menu background-gray">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
							<h4><?= get_field('company_name', 'option') ?></h4>
							<div class="address"><i class="fa fa-fw fa-map-marker"></i> <?= get_field('company_address', 'option') ?></div>
							<div class="hotline"><i class="fa fa-fw fa-phone"></i> <?= get_field('hotline', 'option') ?></div>
							<div class="email"><i class="fa fa-fw fa-envelope"></i> <?= get_field('email', 'option') ?></div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
							<?php
							$menu_name = 'bottom1';
							if(has_nav_menu($menu_name))
							{
								$menu_id = $menu_locations[$menu_name];
								$menu = wp_get_nav_menu_object($menu_id);
							?>
							<h4><?= $menu->name ?></h4>
							<?php
								wp_nav_menu(array(
									'theme_location' => $menu_name,
									'items_wrap'	 => '<ul id="'.$menu_name.'-menu" class="%1$s %2$s list-unstyled">%3$s</ul>',
									'container'		=> false,
									'depth' => 1,
								));
							?>
							<?php
							} ?>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
							<?php
							$menu_name = 'footer';
							if(has_nav_menu($menu_name))
							{
								$menu_id = $menu_locations[$menu_name];
								$menu = wp_get_nav_menu_object($menu_id);
							?>
							<h4><?= $menu->name ?></h4>
							<?php
								wp_nav_menu(array(
									'theme_location' => $menu_name,
									'items_wrap'	 => '<ul id="'.$menu_name.'-menu" class="%1$s %2$s list-unstyled">%3$s</ul>',
									'container'		=> false,
									'depth' => 1,
								));
							?>
							<?php
							} ?>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
							<h4>Kết nối với chúng tôi</h4>
							<div class="socials">
								<a href="<?= get_field('facebook', 'option') ?>"><i class="fa fa-facebook"></i> Facebook</a>
								<a href="<?= get_field('youtube', 'option') ?>"><i class="fa fa-youtube"></i> Youtube</a>
							</div>
						</div>
					</div>
				</div><!-- /.container -->
			</div><!-- /.footer-menu -->
			<div class="footer-copy">
				<div class="container">
					<p>&copy; <?php echo date('Y'); ?> <a href="<?php echo home_url('/') ?>"><?php echo $_SERVER['SERVER_NAME']; ?></a> All Rights Reserved</p>
				</div><!-- /.container -->
			</div><!-- /.footer-copy -->
		</footer><!-- /#main_footer -->
	</div><!-- /#wapper.site -->

<?php wp_footer(); ?>
</body>

</html>