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
    // Bestseller
$('#bestseller-carousel').owlCarousel({
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
    autoplayTimeout: 5000,
    smartSpeed: 1500,
    animateIn: 'linear',
    animateOut: 'linear',
    nav: false,
    dots:false,
})

$('#toprated-carousel-prev-btn').click(function()
{
    $('#toprated-carousel').trigger('prev.owl.carousel');
})

$('#toprated-carousel-next-btn').click(function()
{
    $('#toprated-carousel').trigger('next.owl.carousel');
})

// Search
$('.search-type').click(function()
{
    $('#header__search-type-input').val($(this).attr('data-type'));
    $('#header__search-form').submit();
})
$('#search-btn').click(function()
{
    $('#header__search-name-input').val($('#header__search-name-text').val());
    $('#header__search-form').submit();
})
$('.search-category').click(function()
{
    $('#header__search-order-name').val($(this).attr('data-order-name'));
    $('#header__search-order-type').val($(this).attr('data-order-type'));
    $('#header__search-order-fullname').val($(this).text());
    $('#header__search-form').submit();
})