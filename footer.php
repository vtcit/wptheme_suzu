
		<footer id="main-footer">
			<div class="footer-menu background-gray">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-4 col-lg-5">
							<h4><?= get_field('company_name', 'option') ?></h4>
							<div class="address"><i class="fa fa-fw fa-map-marker"></i> <?= get_field('company_address', 'option') ?></div>
							<div class="hotline"><i class="fa fa-fw fa-phone"></i> <?= get_field('hotline', 'option') ?></div>
							<div class="email"><i class="fa fa-fw fa-envelope"></i> <?= get_field('email', 'option') ?></div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
							<h4>Bản đồ</h4>
							<div class="gmap"><?= get_field('gmap', 'option') ?></div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
							<h4>Mạng xã hội</h4>
							<div class="gmap"><?= get_field('gmap', 'option') ?></div>
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

<a href="#wapper" class="by-scroll gotop"><i class="fa fa-arrow-up"></i></a>
<?php wp_footer(); ?>
</body>

</html>