jQuery(function ($) {
    $(document).ready(function () {

        const h = $(".header .row_1").outerHeight();
        $(window).on("scroll", function () {
            if ($(window).scrollTop() >= h) {
                $(".header .row_2").addClass("sticky");
            } else {
                $(".header .row_2").removeClass("sticky");
            }
        }).scroll();

        $(".header .toggle").on("click", function () {
            $(this).toggleClass("open");
            $(".header .row_2 .block_2").toggleClass("open");
            $("body").toggleClass("hidden");
        });

        $(window).on("resize", function () {
            if (window.matchMedia("(max-width: 1199px)").matches) {
                $(".header .row_2 .block_2").outerHeight((window.innerHeight) + "px");
            } else {
                location.reload();
            }
        });

        $(".search_btn").on("click", function (e) {
            e.preventDefault();
            $(".search").css('display', 'grid');
            if ($(".search").hasClass('active')){
                $(".search").removeClass('active');
                setTimeout(() => {$(".search").css('display','none')}, 300);
            } else {
                $(".search").css("display", "grid");
                setTimeout(() => { $(".search").addClass("active"); }, 100);
            }
        });

        $(".home_1 .slider").slick({
            fade: true,
            autoplay: true,
            autoplaySpeed: 8000,
            speed: 800,
            useTransform: false,
            useCSS: true,
            pauseOnFocus: false,
            pauseOnHover: false,
            dots: false,
            arrows: true,
            prevArrow: ".home_1 .prev",
            nextArrow: ".home_1 .next"
        });

    });
});
