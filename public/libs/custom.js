$(function(){
    
    $('.case-std-holder .item').hover(function(){
        $('.case-std-holder .item').removeClass('active');
        $(this).addClass('active');
        var html = $(this).find('.text').html();
        if(html)
            $('.case-std-detail-holder').html(html);
        
        // Create slider
        $('.case-std-detail-holder .img-box').flexslider({
		animation: "slide",
		directionNav: false,
		controlNav: true,
		touch: true,
		pauseOnHover: true,
		start: function() {
			$.waypoints('refresh');
		}
	});
        
    },function(){});
    
    
    $('.case-std-detail-holder').html($('.case-std-holder .item.active').find('.text').html());
    
    
    // img overlayer
    $('.overlayer-img .showbig').click(function(){
		var image = $(this).parents('.overlayer-img').find('img.big').attr('src');
		$("#overlay").css("background", "rgba(255,255,255,.7) url(" + image + ") no-repeat center center fixed").fadeIn(200);
		return false;
	});
    
    $('#overlay').click(function(){
            $(this).fadeOut(200);
    });
    
    $('.scroll-down').click(function(){
        $('html, body').animate({
            scrollTop: $("section.intro").offset().top
        }, 500);
    })
    
})
$(window).scroll(function(){
  var sticky = $('nav.top-menu'),
      scroll = $(window).scrollTop();

  if (scroll >= 700) sticky.addClass('fixed');
  else sticky.removeClass('fixed');
});