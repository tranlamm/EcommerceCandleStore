// Bestseller
$('#bestseller-carousel').owlCarousel({
    loop: true,
    autoplay: true,
    items: 4,
    margin: 24,
    autoplayTimeout: 3000,
    smartSpeed: 1500,
    animateIn: 'linear',
    animateOut: 'linear',
    nav: false,
    dots:false,
    responsive:{
        0:{items:1},
        576:{items:1},
        768:{items:2},
        992:{items:3},
        1200:{items:4}
   },
})

$('#bestseller-carousel-prev-btn').click(function()
{
    $('#bestseller-carousel').trigger('prev.owl.carousel');
})

$('#bestseller-carousel-next-btn').click(function()
{
    $('#bestseller-carousel').trigger('next.owl.carousel');
})
    // Top rated
$('#toprated-carousel').owlCarousel({
    loop: true,
    autoplay: true,
    items: 4,
    margin: 24,
    autoplayTimeout: 3000,
    smartSpeed: 1500,
    animateIn: 'linear',
    animateOut: 'linear',
    nav: false,
    dots:false,
    responsive:{
        0:{items:1},
        576:{items:1},
        768:{items:2},
        992:{items:3},
        1200:{items:4}
   },
})

$('#toprated-carousel-prev-btn').click(function()
{
    $('#toprated-carousel').trigger('prev.owl.carousel');
})

$('#toprated-carousel-next-btn').click(function()
{
    $('#toprated-carousel').trigger('next.owl.carousel');
})
    