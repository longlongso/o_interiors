$(function() {
	$(document).bind("contextmenu",function(e){   
		  return false;   
	});
    $(document).foundation();
    $('.left_nav_tog_btn').click(function() {
        $('.left_nav').slideToggle();
		var icon = $(this).children('i');
		if (icon.hasClass('cate-icon-up')) {
			icon.removeClass('cate-icon-up');
		} else {
			icon.addClass('cate-icon-up');
		}
    });
	$('.head_nav_tog_btn').click(function() {
        $('.head_nav').slideToggle();
    });
});