"use strict";
$(document).ready(function(){
	var $window = $(window);
	var getBody = $("body");
	var bodyClass = getBody[0].className;
	$(".main-menu").attr('id', bodyClass);
	$('.theme-loader').fadeOut(1000);
	var emailbody = $(window).height();
	$('.user-body').css('min-height', emailbody);

	$(".card-header-right .icofont-close-circled").on('click',function() {
		var $this = (this);
		$this.parents('.card').animate({
			'opacity':'0',
			'-webkit-transform':'scale3d(.3, .3, .3)',
			'transform':'scale3d(.3, .3, .3)'
		});
		setTimeout(function(){
			$this.parents('.card').remove();
		},800);
	});

	$(".card-header-right .icofont-rounded-down").on('click',function(){
		var $this = $(this);
		var port = $($this.parents('.card'));
		var card = $(port).children('.card-block').slideToggle();
		$(this).toggleClass("icon-up").fadeIn('slow');
	});

	$(".icofont-refresh").on('mouseenter mouseleave',function(){
		$(this).toggleClass("rotate-refresh").fadeIn('slow');
	});

	$("#more-details").on('click',function(){
		$(".more-details").slideToggle(500);
	});

	$(".mobile-options").on('click',function(){
		$(".navbar-container .nav-right").slideToggle('slow');
	});
});

function toggleFullScreen(){
	var a = $(window).height()-10;
	if(!document.fullscreenElement && !document.mozFullScreenElement && !document.webkitFullscreenElement){
		if(document.documentElement.requestFullscreen){
			document.documentElement.requestFullscreen();
		}else if(document.documentElement.mozRequestFullScreen){
			document.documentElement.mozRequestFullScreen();
		}else if(document.documentElement.webkitRequestFullscreen){
			document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
		}
	}else{
		if(document.cancelFullScreen){
			document.cancelFullScreen();
		}else if(document.mozCancelFullScreen){
			document.mozCancelFullScreen();
		}else if(document.webkitCancelFullScreen){
			document.webkitCancelFullScreen();
		}
	}
}

$(document).on('click','[data-toggle="lightbox"]',function(event){
	event.preventDefault();
	$(this).ekkoLightbox();
});

$('.color-picker').animate({right: '-239px'});
$('.color-picker a.handle').click(function(e){
	e.preventDefault();
	var div = $('.color-picker');
	if(div.css('right') === '-239px'){
		$('.color-picker').animate({right: '0px'});
	}else{
		$('.color-picker').animate({right: '-239px'});
	}
});
