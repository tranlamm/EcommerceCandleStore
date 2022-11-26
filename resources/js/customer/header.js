// Search
$('.header__search-type').click(function()
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