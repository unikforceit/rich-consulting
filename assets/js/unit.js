/* -----------------------------------------------------------------------------



File:           JS Core
Version:        1.0
Last change:    00/00/00 
-------------------------------------------------------------------------------- */
(function($) {

	"use strict";

	var CanDo = {
		init: function() {
			this.Basic.init();  
		},

		Basic: {
			init: function() {

				this.preloader();
				this.BackgroundImage();
				this.MobileMenu();
				this.scrollTop();

			},
			preloader: function (){
				$(window).on('load', function() {
					$(".preloader").fadeOut();
				});
			},
			BackgroundImage: function (){
				$('[data-background]').each(function() {
					$(this).css('background-image', 'url('+ $(this).attr('data-background') + ')');
				});
			},
			MobileMenu: function (){
				jQuery(window).on('scroll', function() {
					if (jQuery(window).scrollTop() > 250) {
						jQuery('.default-richconsulting-header').addClass('sticky-on')
					} else {
						jQuery('.default-richconsulting-header').removeClass('sticky-on')
					}
				})
				$('.str-open_mobile_menu').on("click", function() {
					$('.str-mobile_menu_wrap').toggleClass("mobile_menu_on");
				});
				$('.str-open_mobile_menu').on('click', function () {
					$('body').toggleClass('mobile_menu_overlay_on');
				});
				if($('.str-mobile_menu li.dropdown ul').length){
					$('.str-mobile_menu li.dropdown').append('<div class="dropdown-btn"><span class="fa fa-angle-down"></span></div>');
					$('.str-mobile_menu li.dropdown .dropdown-btn').on('click', function() {
						$(this).prev('ul').slideToggle(500);
					});
				}
			},
			scrollTop: function (){
				$(window).on("scroll", function(){
					var ScrollBarPosition = $(this).scrollTop();
					if(ScrollBarPosition > 200 ) {
						$(".scroll-top").fadeIn();
					} else {
						$(".scroll-top").fadeOut();
					}
				});
				$(".scroll-top").on("click", function(){
					$('body,html').animate({
						scrollTop: 0,
					});
				})
			},
		}
	}
	jQuery(document).ready(function (){
		CanDo.init();
	});
	console.log('unit js loaded');
})(jQuery);