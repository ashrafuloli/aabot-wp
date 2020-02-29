(function ($) {
"use strict";

// side bar
$('.open-side').on('click',function (event) {
	event.preventDefault();
	$(this).parent().addClass('active');
	$('.side-bar').addClass('open');
	$('.body-overlay').addClass('active');
});

$('.body-overlay').on('click',function (event) {
	event.preventDefault();
	$(this).removeClass('active');
	$('.open-side').parent().removeClass('active');
	$('.side-bar').removeClass('open');
});

$('.close-side').on('click',function (event) {
	event.preventDefault();
	$('.open-side').parent().removeClass('active');
	$('.side-bar').removeClass('open');
	$('.body-overlay').removeClass('active');
});

// meanmenu
$('.site-menu').meanmenu({
	meanMenuContainer: '.mobile-menu',
	meanScreenWidth: "991",
	meanMenuOpen:"<i class=\"far fa-bars\"></i>",
	meanMenuClose:"<i class=\"far fa-times\"></i>"
});

// One Page Nav
var top_offset = $('.header-area').height() - 10;
$('.site-menu ul').onePageNav({
	currentClass: 'active',
	scrollOffset: top_offset,
});


$(window).on('scroll', function () {
	var scroll = $(window).scrollTop();
	if (scroll < 245) {
		$(".header-area").removeClass("sticky");
	} else {
		$(".header-area").addClass("sticky");
	}
});

// mainSlider
function mainSlider() {
	var BasicSlider = $('.slider-active');
	BasicSlider.on('init', function (e, slick) {
		var $firstAnimatingElements = $('.single-slider:first-child').find('[data-animation]');
		doAnimations($firstAnimatingElements);
	});
	BasicSlider.on('beforeChange', function (e, slick, currentSlide, nextSlide) {
		var $animatingElements = $('.single-slider[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
		doAnimations($animatingElements);
	});
	BasicSlider.slick({
		autoplay: false,
		autoplaySpeed: 10000,
		dots: false,
		fade: true,
		arrows: false,
		responsive: [
			{ breakpoint: 767, settings: { dots: false, arrows: false } }
		]
	});

	function doAnimations(elements) {
		var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
		elements.each(function () {
			var $this = $(this);
			var $animationDelay = $this.data('delay');
			var $animationType = 'animated ' + $this.data('animation');
			$this.css({
				'animation-delay': $animationDelay,
				'-webkit-animation-delay': $animationDelay
			});
			$this.addClass($animationType).one(animationEndEvents, function () {
				$this.removeClass($animationType);
			});
		});
	}
}
mainSlider();

/* magnificPopup img view */
$('.popup-image').magnificPopup({
	type: 'image',
	gallery: {
	  enabled: true
	}
});

/* magnificPopup video view */
$('.popup-video').magnificPopup({
	type: 'iframe'
});

// scrollToTop
$.scrollUp({
	scrollName: 'scrollUp', // Element ID
	topDistance: '300', // Distance from top before showing element (px)
	topSpeed: 300, // Speed back to top (ms)
	animation: 'fade', // Fade, slide, none
	animationInSpeed: 200, // Animation in speed (ms)
	animationOutSpeed: 200, // Animation out speed (ms)
	scrollText: '<i class="fas fa-level-up-alt"></i>', // Text for element
	activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
});



})(jQuery);