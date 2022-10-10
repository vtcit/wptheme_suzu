<?php get_header(); ?>
<div class="breadcrumbs clearfix">
	<div class="container">
		<ol class="breadcrumb" itemprop="breadcrumb">
			<li><a href="<?php echo esc_url(home_url('/')); ?>"><span class="fa fa-home"></span><span class="sr-only"> <?php _e('Home', 'cit_service') ?></span></a></li>
			<?php
			$categories = get_the_category();
			if(!empty($categories))
			{
				foreach($categories as $cat)
				{
			?>
				<li class="term-item" typeof="v:Breadcrumb"><a href="<?php echo esc_url(get_category_link($cat->term_id)) ?>" rel="v:url" property="v:title"><?php echo esc_html($cat->name) ?></a></li>
			<?php
				}
			} ?>
		</ol>
	</div>
</div><!-- breadcrumbs -->
<main id="main">
	<div class="container">
		<?php
			while(have_posts())
			{
				the_post();
				get_template_part('template-parts/post/content');
		?>
		<?php
			}
			wp_reset_query();
		?>			<!-- OTHER POST -->
		<?php
		$cat_array = array();
		$_ids = array(get_the_ID());
		if($cats = get_the_category(get_the_ID()))
		{
			foreach($cats as $k => $cat)
			{
				$cat_array[$k] = $cat->slug;
			}
		}
		if($cat_array)
		{
			$_count = 6;
			$args = array(
				'posts_per_page' => $_count,
				'post__not_in' => $_ids,
				'tax_query' => array(
					array(
						'taxonomy' => 'category',
						'field' => 'slug',
						'terms' => $cat_array,
						'include_children' => false,
					),
				),
				'date_query' => array(
					'after' => get_the_date(),
				),
			);
			$myposts = get_posts($args);
			if($_count-count($myposts))
			{
				$args = array(
					'posts_per_page' => $_count-count($myposts),
					'post__not_in' => $_ids,
					'tax_query' => array(
						array(
							'taxonomy' => 'category',
							'field' => 'slug',
							'terms' => $cat_array,
							'include_children' => false,
						),
					),
					'date_query' => array(
						'before' => get_the_date(),
					),
				);
				if($myposts2 = get_posts($args))
				{
					if($myposts)
					{
						$myposts = array_merge($myposts, $myposts2);
					}
					else
					{
						$myposts = $myposts2;
					}
				}
			}
			if($myposts)
			{
		?>
			<hr class="space" />
			<div class="post-other">
				<h2 class="heading"><span>Bài viết khác</span></h2>
				<div class="row row-list post-list">
					<?php foreach($myposts as $k=>$post)
					{
						setup_postdata($post);
						echo '<div class="item col-xs-12 col-sm-6 col-md-4 col-lg-4 image-left">';
						get_template_part('template-parts/post/content-list-table');
						echo '</div><!-- item -->';
					}
					wp_reset_postdata();
					?>
				</div>
			</div><!-- post-related -->
		<?php
			} //if($myposts)
		} //if($cat_array) ?>
	</div><!-- .container -->
</main>
<?php get_footer(); ?>
