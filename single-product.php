<?php
get_header();
$price = get_field('gia');
?>

<div class="product-slideshow slideshow">
    <div class="swiper">
        <div class="swiper-wrapper">
            <?php 
            if(have_rows('top_slide')) {
                $k = 0;
                $size = 'full'; // (thumbnail, medium, large, full or custom size)
                while(have_rows('top_slide')) {
                    the_row();
                    $image = get_sub_field('image');
                    $desc = get_sub_field('description');
                ?>
                <div class="swiper-slide">
                    <div class="inner-slide">
                        <?= wp_get_attachment_image($image, $size ); ?>
                        <div class="intro">
                            <h1 class="heading"><?php the_title() ?></h1>
                            <div class="desc"><?= $desc ?></div>
                            <div class="price">
                                Chỉ từ <br>
                                <?= $price ?>
                            </div>
                        </div>
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


<nav id="submenus" class="navbar navbar-light bg-light">
    <div class="container">
        <a href="#" class="navbar-brand"><?php the_title() ?></a>
        <ul class="nav nav-pills">
            <li class="nav-item"><a href="#dac-diem" class="nav-link">Đặc điểm nổi bật</a></li>
            <li class="nav-item"><a href="#thong-so" class="nav-link">Thông số kỹ thuật</a></li>
        </ul>
    </div>
</nav>

<div data-spy="scroll" data-target="#submenus" data-offset="0" class="tab-content" id="pills-product">
    <div id="dac-diem">
        <div class="product-overview">
            <div class="row overview">
                <div class="col-sm-7 overview_image">
                    <?= wp_get_attachment_image(get_field('hinh_chinh'), 'full'); ?>
                </div>
                <div class="col-sm-5 overview_intro">
                    <h1 class="heading header-page"><?php the_title() ?></h1>
                    <div class="desc"><?= get_field('mo_ta_xe') ?></div>
                </div>
            </div>
        </div><!-- product-overview -->

        <div id="product-ngoai-that">
            <div class="row overview">
                <div class="col-sm-5 overview_intro">
                    <h2 class="heading"><?= get_field('title_ngoai_that') ?></h2>
                    <div class="desc"><?= get_field('mo_ta_xe') ?></div>
                </div>
                <div class="col-sm-7 overview_image">
                    <?= wp_get_attachment_image(get_field('hinh_ngoai_that'), 'full'); ?>
                </div>
            </div>
            <div class="product-face">
                <div class="tab-content" id="pills-faces">
                    <div class="tab-pane fade show active" id="face1" role="tabpanel" aria-labelledby="pills-face1-tab"><?= wp_get_attachment_image(get_field('hinh_mat_truoc'), 'full'); ?></div>
                    <div class="tab-pane fade" id="face2" role="tabpanel" aria-labelledby="pills-face2-tab"><?= wp_get_attachment_image(get_field('hinh_mat_sau'), 'full'); ?></div>
                </div>
                <ul class="nav nav-pills" id="faces-pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a href="#face1" id="pills-face1-tab" class="nav-link active" data-toggle="pill" role="tab" aria-controls="face1" aria-selected="true">Mặt trước</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#face2" id="pills-face2-tab" class="nav-link" data-toggle="pill" role="tab" aria-controls="face2" aria-selected="false">Mặt sau</a>
                    </li>
                </ul>
            </div>
            <?php if(have_rows('slide_ngoai_that')) {
                $images = [];
                $size = 'full';
                ?>

                <div class="slide-ngoai-that">
                    <div thumbsSlider="" class="swiper swiper-ngoai-that-thumb">
                        <div class="swiper-wrapper">
                            <?php while(have_rows('slide_ngoai_that')) {
                                the_row(); 
                                $image = wp_get_attachment_image(get_sub_field('image'), $size);
                                if(!$image) continue;
                                $images[] = $image;
                            ?>
                            <div class="swiper-slide">
                                <?= $image ?>
                            </div>
                            <?php
                            } ?>
                        </div>
                    </div>
                    <div class="swiper swiper-ngoai-that">
                        <div class="swiper-wrapper">
                            <?php foreach($images as $image) { ?>
                                <div class="swiper-slide">
                                    <?= $image ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            <?php
            } //if(have_rows('slide_ngoai_that')) ?>
        </div><!-- product-ngoai-that -->

        <div id="product-noi-that">
            <?php if(have_rows('slide_noi_that')) {
                $images = [];
                $size = 'full';
                ?>
                <div class="slide-noi-that">
                    <div class="swiper swiper-noi-that">
                        <div class="swiper-wrapper">
                            <?php while(have_rows('slide_noi_that')) {
                                the_row(); 
                                $image = wp_get_attachment_image(get_sub_field('image'), $size);
                                if(!$image) continue;
                                $images[] = $image;
                            ?>
                                <div class="swiper-slide">
                                    <?= $image ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <div thumbsSlider="" class="swiper swiper-noi-that-thumb">
                        <div class="swiper-wrapper">
                            <?php foreach($images as $image) { ?>
                            <div class="swiper-slide">
                                <?= $image ?>
                            </div>
                            <?php
                            } ?>
                        </div>
                    </div>
                </div>
            <?php
            } //if(have_rows('slide_noi_that')) ?>
        </div><!-- product-noi-that -->

        <div id="product-van-hanh">
            <?php if(have_rows('slide_van_hanh')) {
                $images = [];
                $size = 'full';
                ?>

                <div class="slide-van-hanh">
                    <div class="swiper swiper-van-hanh">
                        <div class="swiper-wrapper">
                            <?php while(have_rows('slide_van_hanh')) {
                                the_row(); 
                                $image = wp_get_attachment_image(get_sub_field('image'), $size);
                                if(!$image) continue;
                                $images[] = $image;
                            ?>
                                <div class="swiper-slide">
                                    <?= $image ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <div thumbsSlider="" class="swiper swiper-van-hanh-thumb">
                        <div class="swiper-wrapper">
                            <?php foreach($images as $image) { ?>
                            <div class="swiper-slide">
                                <?= $image ?>
                            </div>
                            <?php
                            } ?>
                        </div>
                    </div>
                </div>
            <?php
            } //if(have_rows('slide_ngoai_that')) ?>
        </div><!-- product-van-hanh -->
    </div><!-- #dac_diem -->
    <div id="thong-so">
        <div class="container">
            <h2 class="heading">Thông số kỹ thuật</h2>
            <?php if(have_rows('thong_so_ky_thuat') || have_rows('trang_thiet_bi')) { ?>
                <div class="accordion" id="accordionThongSo">
                    <?php if(have_rows('trang_thiet_bi')) {
                        $k = 0;
                        while(have_rows('thong_so_ky_thuat')) {
                            the_row(); ?>
                            <div class="card">
                                <div class="card-header" id="headingTS<?= $k ?>">
                                    <h2 class="mb-0"><button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseTS<?= $k ?>" aria-expanded="false" aria-controls="collapseTS<?= $k ?>"><?php the_sub_field('title_ts') ?></button></h2>
                                </div>
                                <div id="collapseTS<?= $k ?>" class="collapse" aria-labelledby="headingTS<?= $k ?>" data-parent="#accordionThongSo">
                                    <div class="card-body"><?php the_sub_field('table_ts') ?></div>
                                </div>
                            </div>
                    <?php
                            $k++;
                        } //while(have_rows())
                    } //have_rows ?>
                    <?php if(have_rows('trang_thiet_bi')) {
                        while(have_rows('trang_thiet_bi')) {
                            the_row(); ?>
                            <div class="card">
                                <div class="card-header" id="headingTTB<?= $k ?>">
                                    <h2 class="mb-0"><button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseTTB<?= $k ?>" aria-expanded="false" aria-controls="collapseTTB<?= $k ?>"><?php the_sub_field('title_ts') ?></button></h2>
                                </div>
                                <div id="collapseTTB<?= $k ?>" class="collapse" aria-labelledby="headingTTB<?= $k ?>" data-parent="#accordionThongSo">
                                    <div class="card-body"><?php the_sub_field('table_ts') ?></div>
                                </div>
                            </div>
                        <?php
                            $k++;
                        } //while(have_rows())
                    } //have_rows ?>
                </div><!-- accordionThongSo -->
            <?php } //have_rows ?>
        </div><!-- container -->
    </div> <!-- thong-so -->
</div><!-- scroll -->

<?php
get_footer();
