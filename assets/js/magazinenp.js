jQuery(function ($) {

	var magazineNPJs = {

		init: function () {
			this.iniNav();
			this.initSearch();
			this.initGoToTop();
			this.initTicker();
			this.matchHeight();
			this.initSlider();
			this.initSticky();
			this.initStickyMenu();
			this.initAccessibility();
		},
		iniNav: function () {


			$('.mnp-top-header-nav-menu-toggle').on('click', function () {
				$('.mnp-top-header .mnp-top-header-nav').toggleClass('toggled-link-on');
			});
			$('.main-navigation').find('.sub-menu, .children').before('<span class="dropdown-toggle"><span class="dropdown-icon"></span></span>');
			$('.main-navigation').find('.sub-menu, .children').parent().addClass('dropdown-parent');
			$('.main-navigation').find('.dropdown-toggle').on('click', function (e) {
				e.preventDefault();
				$(this).next('.sub-menu, .children').toggleClass('dropdown-active');
				$(this).toggleClass('toggle-on');
			});
			$(window).on('load resize', function () {
				var screenwidth = $(window).outerWidth();
				if (screenwidth >= 992) {
					$('.main-navigation').find('.sub-menu.dropdown-active, .children.dropdown-active').removeClass('dropdown-active');
					$('.main-navigation').find('.dropdown-toggle.toggle-on').removeClass('toggle-on');
				}
			});
		},
		initSearch: function () {
			$('.search-toggle').on('click', function (event) {
				var that = $('.search-toggle'),
					wrapper = $('.search-block');

				that.toggleClass('active');
				wrapper.toggleClass('off').toggleClass('on');
				$('.search-block.on').fadeIn();
				$('.search-block.off').fadeOut();
				if (that.is('.active') || $('.search-toggle')[0] === event.target) {
					wrapper.find('.s').focus();
				}

				// search form escape while pressing ESC key
				$(document).on('keydown', function (e) {
					if (e.keyCode === 27 && that.hasClass('active')) {
						that.removeClass('active');
						wrapper.addClass('off').removeClass('on');
						$('.search-block.off').fadeOut();
					}
				});
			});

		},
		initGoToTop: function () {
			$('.back-to-top').hide();
			$(window).scroll(function () {
				if ($(this).scrollTop() > 1000) {
					$('.back-to-top').fadeIn();
				} else {
					$('.back-to-top').fadeOut();
				}
			});

			// scroll body to 0px on click
			$('.back-to-top a').on('click', function () {
				$('body,html,header').animate({
					scrollTop: 0
				}, 800);
				return false;
			});
		},
		initTicker: function () {
			if ($('.mnp-news-ticker-slide').length < 1) {
				return;
			}
			$('.mnp-news-ticker-slide').marquee({
				//speed in milliseconds of the marquee
				speed: 50,
				//gap in pixels between the tickers
				gap: 0,
				//time in milliseconds before the marquee will start animating
				delayBeforeStart: 0,
				//'left' or 'right'
				direction: 'left',
				//true or false - should the marquee be duplicated to show an effect of continues flow
				duplicated: true,
				pauseOnHover: true,
				startVisible: true
			});
		},
		matchHeight: function () {
			if ($('.featured-section .title-wrap').length < 1) {
				return;
			}
			$('.featured-section .title-wrap').matchHeight({
				property: 'min-height'
			});
		},
		initSlider: function () {
			if ($('.owl-carousel').length < 1) {
				return;
			}
			$('.owl-carousel.mnp-owl-before').removeClass('mnp-owl-before');
			$('.featured-slider .owl-carousel').owlCarousel({
				loop: true,
				margin: 0,
				nav: true,
				navText: ['', ''],
				autoplay: true,
				dots: false,
				smartSpeed: 800,
				autoHeight: true,
				autoplayTimeout: 5500,
				responsive: {
					0: {
						items: 1
					}
				}
			});

			$('.related-posts .owl-carousel').owlCarousel({
				loop: true,
				margin: 15,
				nav: true,
				navText: ['', ''],
				autoplay: true,
				dots: false,
				smartSpeed: 800,
				autoHeight: true,
				autoplayTimeout: 5500,
				responsive: {
					0: {
						items: 1
					},
					480: {
						items: 1
					},
					768: {
						items: 2
					},
					992: {
						items: 4
					}
				}
			});
		},
		initSticky: function () {

			$(window).load(function () {
				if ($('.sticky-sidebar').length < 1) {
					return;
				}
				var after_height = 0;

				var site_content_row = $('.site-content-row')[0],
					wp_adminBar = $('#wpadminbar').outerHeight(),
					doc_width = $(window).outerWidth(),
					top_spacing = 20 + wp_adminBar;

				if (site_content_row) {
					var page_height = $('body.theme-body').outerHeight(),
						page_before_height = $('body.theme-body').offset().top,
						total_page_height = page_height + page_before_height,
						before_content_height = $('.site-content-row').offset().top,
						content_height = $('.site-content-row').outerHeight();
					after_height = total_page_height - before_content_height - content_height;
				}

				if (doc_width >= 992) {
					if (wp_adminBar) {
						$('.sticky-sidebar').sticky({topSpacing: top_spacing, bottomSpacing: after_height});
					} else {
						$('.sticky-sidebar').sticky({topSpacing: 20, bottomSpacing: after_height});
					}
				}
			});
		},
		initStickyMenu: function () {
			$(window).load(function () {

				var wpAdminBar = jQuery('#wpadminbar');
				if (wpAdminBar.length) {
					jQuery('.mnp-bottom-header.mnp-sticky').sticky({
						topSpacing: wpAdminBar.height(),
						zIndex: 99
					});
				} else {
					jQuery('.mnp-bottom-header.mnp-sticky').sticky({
						topSpacing: 0,
						zIndex: 99
					});
				}
			});
		},
		initAccessibility: function () {
			var main_menu_container = $('.main-navigation ul.nav-menu');
			main_menu_container.find('li.menu-item, li.page_item').focusin(function () {
				if (!$(this).hasClass('focus')) {
					$(this).addClass('focus');
				}
			});
			main_menu_container.find('li.menu-item, li.page_item').focusout(function () {
				$(this).removeClass('focus');

			});
		}


	};


	magazineNPJs.init();

});
