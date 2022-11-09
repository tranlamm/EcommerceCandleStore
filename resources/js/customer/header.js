const navbar = $('#header__navbar');
$(window).scroll(function()
{
    if($(this).scrollTop() >= 300)
    {
        navbar.addClass('navbar--active');
    }
    else {
        navbar.removeClass('navbar--active');
    }
})

// Carousel
$('#product-carousel').owlCarousel({
    loop: true,
    autoplay: true,
    items: 4,
    margin: 24,
    autoplayTimeout: 5000,
    smartSpeed: 1500,
    animateIn: 'linear',
    animateOut: 'linear',
    nav: false,
    dots:false,
})

$('#carousel-prev-btn').click(function()
{
    $('#product-carousel').trigger('prev.owl.carousel');
})

$('#carousel-next-btn').click(function()
{
    $('#product-carousel').trigger('next.owl.carousel');
})