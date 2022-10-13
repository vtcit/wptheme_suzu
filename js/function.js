var Slide = {
    homeTopSlide: function () {
        let home_banner = new Swiper(".home-slideshow .swiper", {
            speed: 900,
            spaceBetween: 0,
            loop: true,
            autoplay: {
                delay: 5000,
            },
            fadeEffect: {
                crossFade: true,
            },
            pagination: {
                el: ".home-slideshow .swiper-pagination",
                type: "bullets",
                clickable: true,
            },
            navigation: {
                nextEl: ".home-slideshow .swiper-button-next",
                prevEl: ".home-slideshow .swiper-button-prev",
            },
        });
    },
    productNgoaithat: function () {
        let ngoaiThatThumb = new Swiper(".swiper-ngoai-that-thumb", {
            loop: false,
            // direction: "vertical",
            spaceBetween: 0,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });
        let ngoaiThat = new Swiper(".swiper-ngoai-that", {
            loop: true,
            spaceBetween: 0,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: ngoaiThatThumb,
            },
        });
    },
    productNoithat: function () {
        let noiThatThumb = new Swiper(".swiper-noi-that-thumb", {
            loop: false,
            // direction: "vertical",
            spaceBetween: 0,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });
        let noiThat = new Swiper(".swiper-noi-that", {
            loop: true,
            spaceBetween: 0,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: noiThatThumb,
            },
        });
    },
    productVanHanh: function () {
        let vanHanhThumb = new Swiper(".swiper-van-hanh-thumb", {
            loop: false,
            // direction: "vertical",
            spaceBetween: 0,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });
        let vanHanh = new Swiper(".swiper-van-hanh", {
            loop: true,
            spaceBetween: 0,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: vanHanhThumb,
            },
        });
    },
};

jQuery(document).ready(function ($) {
    Slide.homeTopSlide();
    Slide.productNgoaithat();
    Slide.productNoithat();
    Slide.productVanHanh();
    jQuery("a.by-scroll").click(function () {
        offset =
            typeof jQuery(this).data("nav") != "undefined"
                ? jQuery(this).data("offset")
                : 0;
        gotoScroll(jQuery(this).attr("href"), offset);
        return false;
    });
    $("#thong-so table").addClass("table table-striped");
});
