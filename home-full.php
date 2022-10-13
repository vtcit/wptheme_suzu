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
<div class="home-slideshow slideshow">
    <div class="swiper">
        <div class="swiper-wrapper">
            <?php 
            if(have_rows('home_slide')) {
                $k = 0;
                $size = 'full'; // (thumbnail, medium, large, full or custom size)
                while(have_rows('home_slide')) {
                    the_row();
                    $image = get_sub_field('image');
                    $title = get_sub_field('title');
                    $desc = get_sub_field('desc');
                    $link = get_sub_field('link');
                    $price = get_sub_field('price');
                ?>
                <div class="swiper-slide">
                    <div class="inner-slide">
                        <?= wp_get_attachment_image($image, $size ); ?>
                        <div class="intro position-absolute">
                            <h2 class="title"><?= $title ?></h2>
                            <div class="desc"><?= $desc ?></div>
                        </div>
                        <div class="price"><?= $price ?></div>
                    </div>
                
                </div>
                <?php
                    $k++;
                }
            }
        ?>
        </div>
        <div class="swiper-pagination"></div>

        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

        <div class="swiper-scrollbar"></div>
    </div>

</div><!-- home-slideshow -->
<?php
    $cats = get_terms(['taxonomy' => 'category_product', 'hide_empty' => 0]);
?>
<section id="home-products">
    <div class="container">
        <h2 class="heading mb-3"><a href="san-pham">Sản phẩm</a></h2>
        <ul class="d-none nav nav-pills text-center justify-content-center" id="pills-tab" role="tablist">
            <?php
                if(!empty($cats) && !is_wp_error($cats)) {
                    foreach($cats as $cat) {
                        echo '<li class="nav-item" id="term1-tab" data-toggle="pill" href="#pills-term1" role="tab" aria-controls="pills-term1" aria-selected="true"><a  class="nav-link" href="#">'.$cat->name.'</a></li>';
                    }
                }
            ?>
            
        </ul>
        <?php
            $args = [
                'posts_per_page' => 8,
                'post_type' => 'product',
                'order' => 'ASC',
            ];
            $Q = new WP_Query($args);
            if($Q->have_posts()) {
        ?>
        <div class="row row-list product-list">
            <?php
            $k = 0;
            while($Q->have_posts()) {
                $Q->the_post(); ?>
                <div class="col-md-3 product-item">
                    <div class="inner">
                        <a href="<?php the_permalink() ?>">
                            <div class="product-image"><?php the_post_thumbnail('medium') ?></div>
                            <div class="product-title"><h3><?php the_title() ?></h3></div>
                            <div class="product-slogan"><?php the_field('slogan') ?></div>
                            <div class="product-price"><?= number_format(get_field('gia'), 0, ',', '.')  ?><sup>đ</sup></div>
                        </a>
                    </div>
                </div>
            <?php
            $k++;
            } ?>
        </div>
        <?php
            }
        ?>
    </div>
</section>

<section id="home-gallery">
    <div class="container">
        <h2 class="heading">Gallery</h2>
        
        <div class="row row-list gallery-list">
            <?php
            $images = get_field('home_gallery2');
            if($images) {
                foreach($images as $k=>$image_id) {
                ?>
                    <div class="col-md-3">
                        <div class="gallery-item">
                            <?= wp_get_attachment_image($image_id, 'medium') ?>
                        </div>
                    </div>
                <?php
                    $k++;
                }
            } ?>
        </div>
    </div>
</section>

<div class="container">
    <?php //dynamic_sidebar('homepage') ?>
</div>
<?php
get_footer();
