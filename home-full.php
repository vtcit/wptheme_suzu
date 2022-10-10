<?php

/**

 * Template Name: Homepage Page Full

 */
/**
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vpw_theme
 * @author VT.CIT
 */

get_header();
?>
<div class="home-slideshow">
    <div id="slideshow" class="owl-carousel owl-theme" data-items="1">
        <?php
            if( have_rows('slideshow','option') ) {
            while ( have_rows('slideshow','option') )  {
                the_row();
                $title = get_sub_field('title');
        ?>
        <div class="item">
            <div class="thumb resize" >
                <img src="<?php the_sub_field('image') ?>" alt="<?php esc_attr($title) ?>" />
            </div>
            <div class="description text-center">
                <div class="inner container">
                    <h2>
                        <a href="<?php esc_url(the_sub_field('link')) ?>"><?= $title ?></a>
                    </h2>
                    <?php the_sub_field('description') ?>
                </div>
            </div>
        </div>
        <?php
                }
            }
        ?>
    </div>
        <!-- #slideshow -->
</div>
<div class="container">
    <?php dynamic_sidebar('homepage') ?>
</div>
<?php
get_footer();
