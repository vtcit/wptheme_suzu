jQuery(document).ready(function () {
    jQuery("a.by-scroll").click(function () {
        offset =
            typeof jQuery(this).data("nav") != "undefined"
                ? jQuery(this).data("offset")
                : 0;
        gotoScroll(jQuery(this).attr("href"), offset);
        return false;
    });

    jQuery(".form-validate").validate({
        highlight: function (element) {
            jQuery(element).closest(".form-group").addClass("has-error");
        },
        unhighlight: function (element) {
            jQuery(element).closest(".form-group").removeClass("has-error");
        },
        errorElement: "span",
        errorClass: "help-block small",
        errorPlacement: function (error, element) {
            if (element.parent(".input-group").length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function (form) {
            //jQuery('.date').prop("readonly", false);
            return true;
        },
    });
    jQuery("body").tooltip({
        selector: ".has-tips",
    });
    jQuery(".entry-content table").addClass("table").width("100%");
    jQuery(".entry-content figure").addClass("figure");
    jQuery(".entry-content figure img").addClass("figure-img");
    jQuery(".entry-content figure figcaption").addClass("figure-caption");
    jQuery("#mainnav .menu-item-has-children").addClass("dropdown");
    jQuery("#mainnav .menu-item-has-children > a").append(
        ' <span class="caret"></span>'
    );
    //jQuery('#mainnav .menu-item-has-children > a').addClass('dropdown-toggle').attr('data-toggle', 'dropdown').append(' <span class="caret"></span>');
    jQuery("#mainnav .menu-item-has-children > ul.sub-menu").addClass(
        "dropdown-menu"
    );

    jQuery("ul.nav li.menu-item-has-children").hover(
        function () {
            jQuery(this).toggleClass("open");
        },
        function () {
            jQuery(this).removeClass("open");
        }
    );
    if (jQuery(".owl-carousel").length > 0) {
        jQuery(".owl-carousel").each(function () {
            _id = jQuery(this).attr("id");
            console.log(".owl-carousel#" + _id);
            var items =
                typeof jQuery(this).data("items") != "undefined"
                    ? jQuery(this).data("items")
                    : 1;
            var margin =
                typeof jQuery(this).data("margin") != "undefined"
                    ? jQuery(this).data("margin")
                    : 0;
            var stagepadding =
                typeof jQuery(this).data("stagepadding") != "undefined"
                    ? jQuery(this).data("stagepadding")
                    : 0;
            var loop =
                typeof jQuery(this).data("loop") != "undefined"
                    ? jQuery(this).data("loop")
                    : true;
            var autoplay =
                typeof jQuery(this).data("autoplay") != "undefined"
                    ? jQuery(this).data("autoplay")
                    : true;
            var autoplaytimeout =
                typeof jQuery(this).data("autoplaytimeout") != "undefined"
                    ? jQuery(this).data("autoplaytimeout")
                    : 7000;
            var autoplayhoverpause =
                typeof jQuery(this).data("autoplayhoverpause") != "undefined"
                    ? jQuery(this).data("autoplayhoverpause")
                    : true;
            var nav =
                typeof jQuery(this).data("nav") != "undefined"
                    ? jQuery(this).data("nav")
                    : true;
            var dots =
                typeof jQuery(this).data("dots") != "undefined"
                    ? jQuery(this).data("dots")
                    : false;

            var stagemarginleft =
                typeof jQuery(this).data("stagemarginleft") != "undefined"
                    ? jQuery(this).data("stagemarginleft")
                    : 0;
            jQuery(this).owlCarousel({
                items: items,
                margin: margin,
                stagePadding: stagepadding,
                loop: loop,
                autoplay: autoplay,
                autoplayTimeout: autoplaytimeout,
                autoplayHoverPause: autoplayhoverpause,
                nav: nav,
                dots: dots,
                navText: [
                    "<i class='fa fa-chevron-left'></i>",
                    "<i class='fa fa-chevron-right'></i>",
                ],
            });
            if (stagemarginleft) {
                jQuery("#" + _id + " .owl-stage").css(
                    "margin-left",
                    stagemarginleft
                );
            }
        });
        jQuery(".owl-next").click(function () {
            jQuery(this).closest(".owl-carousel").trigger("owl.next");
        });
        jQuery(".owl-prev").click(function () {
            jQuery(this).closest(".owl-carousel").trigger("owl.prev");
        });
    }
});

function gotoScroll(id, offset) {
    var offset = offset | 0;
    jQuery("html,body").animate(
        { scrollTop: jQuery(id).offset().top - offset },
        "fast"
    );
}
