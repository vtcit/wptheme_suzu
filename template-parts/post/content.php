<?php
/**
 * Template part for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage tuanict/leo
 * @since 1.0
 * @version 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		if($images_id = get_post_meta($post->ID, 'header_images', true))
		{
			$img_id = reset($images_id);
			echo '<div class="post-image header-image"><a href="'.get_permalink().'" class="thumb resize">'.wp_get_attachment_image($img_id, 'large').'</a></div>';
		}
	?>
	<header class="entry-header post-heading">
		<?php
			the_title('<h1 class="page-header entry-title">', '</h1>');
			//if(is_front_page() && is_home())
			edit_post_link(sprintf(__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'cit_service' ), get_the_title()), '<p class="edit-link small">', '</p>');
		?>
	</header><!-- .entry-header -->
	<div class="entry-meta small clearfix hidden">
		<strong><span class="vcard author"><span class="fn"><?php the_author() ?></span></span></strong> <i><?php _the_entry_date() ?></i>
		|
		<span class="post-terms"><span class="item"><?php the_category('</span><span class="term-item">, '); ?></span></span> <span class="post-tags"><?php the_tags(' | '); ?></span>
	</div><!-- entry-meta -->
	<div class="entry-content">
		<?php
		 the_content();
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
