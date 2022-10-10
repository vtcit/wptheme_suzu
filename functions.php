<?php

//Trở về trình soạn thảo văn bản cũ trên bản wp mới nhất
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
add_filter( 'use_widgets_block_editor', '__return_false' );
add_filter('use_block_editor_for_post', '__return_false');

/* Custom Post Type Start */
function create_posttype_product() {
	register_post_type( 'product',
	// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Sản phẩm' ),
				'singular_name' => __( 'Sản phẩm' )
			),
			'public' => true,
			'has_archive' => false,
			'rewrite' => array('slug' => 'san-pham'),
			'menu_position' => 6,
			'has_archive' => true,
			'supports' => ['title'],
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype_product' );
/* Custom Post Type End */
register_taxonomy("category_product", 
	['product'], 
	[
		"hierarchical" => true, 
		"label" => "Danh mục sản phẩm",
		"singular_label" => "Danh mục sản phẩm", 
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		"rewrite" => ['slug' => 'danh-muc-san-pham', 'with_front'=> false]
	]
);

add_action('after_setup_theme', '_setup');
if (!function_exists('_setup')) {
	function _setup()
	{
		remove_action('wp_head', 'wp_generator');
		// load_theme_textdomain('cit_service', get_template_directory() . '/languages');

		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
		add_post_type_support('post', 'excerpt');
		add_post_type_support('page', 'excerpt');

		register_nav_menus(array(
			'primary' => __('Primary', 'cit_service'),
			'top' => __('Top menu', 'cit_service'),
			'bottom1' => __('Bottom 1 Menu', 'cit_service'),
			'bottom2' => __('Bottom 2 Menu', 'cit_service'),
			'bottom3' => __('Bottom 3 Menu', 'cit_service'),
			'bottom4' => __('Bottom 4 Menu', 'cit_service'),
			'footer' => __('Footer Menu', 'cit_service'),
		));

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support('html5', array(
			'comment-list',
			'comment-form',
			'search-form',
			'gallery',
			'caption'
		));

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		// add_theme_support('post-formats', array(
		// 	'aside',
		// 	'image',
		// 	'video',
		// 	'quote',
		// 	'link',
		// 	'gallery',
		// 	'status',
		// 	'audio',
		// 	'chat',
		// ));

		add_action('wp_enqueue_scripts', '_scripts');
	}
} //_setup

if (!function_exists('_widgets_init')) {
	function _widgets_init()
	{
		register_sidebar(array(
			'name'		  => __('Homepage', 'cit_service'),
			'id'			=> 'homepage',
			'before_widget' => '<div id="%1$s" class="%2$s homepage-widget clearfix"><div class="container">',
			'after_widget'  => '</div><!-- container --></div>',
			'before_title'  => '<h2 class="heading heading-widget"><span>',
			'after_title'   => '</span></h2>',
		));

		register_sidebar(array(
			'name'		  => __('Right', 'cit_service'),
			'id'			=> 'right',
			'before_widget' => '<div id="%1$s" class="%2$s right-widget clearfix">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="heading heading-widget"><span>',
			'after_title'   => '</span></h3>',
		));

		register_sidebar(array(
			'name'		  => __('Left', 'cit_service'),
			'id'			=> 'left',
			'before_widget' => '<div id="%1$s" class="%2$s left-widget clearfix">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="heading heading-widget"><span>',
			'after_title'   => '</span></h3>',
		));
	}
	add_action('widgets_init', '_widgets_init');
}


if (!function_exists('_scripts')) {
	function _scripts()
	{
		wp_enqueue_style('bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css', [], '3.3.7');
		wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css', [], '4.7.0');
		wp_enqueue_style('owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css', [], '2.2.1');
		wp_enqueue_style('jquery-ui-smoothness', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.min.css', [], '1.11.4');
		wp_enqueue_style('jquery-ui-smoothness-theme', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/theme.min.css', [], '1.11.4');
		wp_enqueue_style('animate', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css', [], '3.5.2');
		wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css', [], '20180505.1');
		wp_enqueue_style('style', get_template_directory_uri() . '/style.css', [], '191109.2');
		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}

		$googlefont = str_replace(',', '%2C', '//fonts.googleapis.com/css?family=Roboto:400,400italic,700,700italic|Roboto+Condensed:400,700|Open+Sans:400,700,800|Oswald:400,700&amp;subset=latin,greek,vietnamese');
		wp_enqueue_style('googlefonts', $googlefont, [], '20160602.1');

		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-datepicker');
		wp_enqueue_script('bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js', null, '3.3.7', true);
		wp_enqueue_script('owl.carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js', null, '2.2.1', true);
		wp_enqueue_script('function', get_template_directory_uri() . '/js/function.js', [], '20180504.3', true);
		wp_localize_script('__script', 'screenReaderText', array(
			'expand'   => __('expand child menu', 'cit_service'),
			'collapse' => __('collapse child menu', 'cit_service'),
		));
	}
}

require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/functions.php';
require get_template_directory() . '/theme-option/option.php';
// require get_template_directory() . '/widgets/my-widget-recent-posts.php';
