$(document).on("scroll", function () {
    if ($(document).scrollTop() > 100) {
        $("nav").removeClass("bg-imperial-menu").addClass("bg-imperialscroll");
    } else {
        $("nav").removeClass("bg-imperialscroll").addClass("bg-imperial-menu");
    }
});

$(document).ready(function () {
    $('#exampleModalCenter').modal('show');
});


$('.carousel-main').owlCarousel({
    items: 3,
    loop: true,
    autoplay: true,
    autoplayTimeout: 5000,
    margin: 10,
    nav: true,
    dots: false,
    navText: ['<span class="fas fa-chevron-left fa-2x"></span>', '<span class="fas fa-chevron-right fa-2x"></span>'],
    responsiveClass: true,
    responsive: {
        0: {
            items: 1,
            nav: true
        },
        600: {
            items: 2,
            nav: false
        },
        1000: {
            items: 3,
            nav: true,
            loop: true
        }
    }
})