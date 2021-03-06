$(function(){
	//
	$('.btn-mob').on('click', function(){
		if ($(this).hasClass('active')) {
			$(this).removeClass('active')
				.next().fadeOut();
		} else {
			$(this).addClass('active')
				.next().fadeIn();
		}
		return false;
	});

	//
	function resize () {
		var width = $(window).width();
		if (width > 800) {
			$('.btn-mob').removeClass('active');
			$('.nav-menu').removeAttr('style');
		}
	}
	$(window).resize(resize);

	// owl carousel
	$('.owl-carousel').owlCarousel({
		loop: true,
		margin: 20,
		nav: true,
		dots: false,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:3
			},
			700:{
				items:4
			},
			1000:{
				items:5,
				nav: false
			}
		}
	});

	// 
	$('.adv_carousel').owlCarousel({
		loop: true,
		margin: 20,
		nav: false,
		responsive:{
			0:{
				items:1
			},
			400:{
				items:2
			},
			600:{
				items:3
			},
			800:{
				items:4,
				dots: false
			},
			1000:{
				items:4,
				dots: false
			}
		}
	});

	// toogle title Question - answer
	$('.quest_title').on('click', function(){
		if ($(this).hasClass('active')) {
			$(this).removeClass('active')
				.next().toggle('hide');
		} else {
			$(this).addClass('active')
				.next().toggle('show');
		}
		return false;
	});

	function check_val () {
		$('.label_inverse').each(function(){
			if ($(this).val() != '') {
				$(this).prev().hide();
			}
		});
	}
	$(document).ready(check_val);
	
	//hide label in contact page
	$('.label_inverse').on('focusin', function(){
		$(this).prev().fadeOut();
	}).on('focusout', function(){
		if ($(this).val() == '') {
			$(this).prev().fadeIn();
		}
	});
});