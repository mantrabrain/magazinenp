jQuery(function ($) {
	var magazineNPLastFocusableEl;

	var magazineNPJs = {

		init: function () {
			this.initEvents();
			this.iniNav();
			this.initSearch();
			this.initGoToTop();
			this.initTicker();
			this.matchHeight();
			this.initSlider();
			this.initSticky();
			this.initStickyMenu();
			this.initAccessibility();
			this.keyPressInit();
		},
		initEvents: function () {

			var _this = this;
			$(document).on('magazinenp_focus_inside_element', function (event, parent_id, focusable_el, trap_class) {
				$('#' + parent_id).find(focusable_el).focus();
				var el = document.getElementById(parent_id);
				_this.trapFocus(el, trap_class);

			});
		},
		iniNav: function () {


			$('.mnp-top-header-nav-menu-toggle').on('click', function () {
				$('.mnp-top-header .mnp-top-header-nav').toggleClass('toggled-link-on');
			});
			$('.main-navigation').find('.sub-menu, .children').before('<span class="dropdown-toggle"><button class="dropdown-icon"></button></span>');
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
			$('#navbarCollapse').on('shown.bs.collapse', function () {
				var mnp_navbar_id = 'navbarCollapse';
				$('#' + mnp_navbar_id).addClass('mnp-navbar-open');
				$('#' + mnp_navbar_id).find('a').eq(0).focus();
				$(document).trigger('magazinenp_focus_inside_element', [mnp_navbar_id, '#navbarCollapse a:first-child', 'show']);


			});

			$('.navbar-toggler.menu-toggle').on('click', function () {
				var expanded = $(this).attr('aria-expanded');
				if (expanded === 'true') {
					if ($('.mnp-bottom-header').length > 0) {
						if ($('#masthead.site-header').find('#sticky-wrapper').length > 0) {
							var bottom_header_height = $('.mnp-bottom-header .navigation-bar-top').height();
							$('#masthead.site-header').find('#sticky-wrapper').css({
								'height': bottom_header_height + 'px'
							});
						}
					}
				}
			});

		},
		initSearch: function () {
			$('.search-toggle').on('click', function (event) {
				var parentEvent = event;
				var this_toggle = $(this);
				var that = $('.search-toggle'),
					wrapper = $('.search-block');

				that.toggleClass('active');
				wrapper.toggleClass('off').toggleClass('on');
				$('.search-block.on').fadeIn('slow', function () {
					if (this_toggle.hasClass('active')) {
						if (that.is('.active') || $('.search-toggle')[0] === parentEvent.target) {
							wrapper.find('.s').focus();
						}
						var mnp_search_box_id = 'magazinenp-search-block';
						$('#' + mnp_search_box_id).addClass('magazinenp-searchbox-open');
						$(document).trigger('magazinenp_focus_inside_element', [mnp_search_box_id, '#magazinenp-search-block input.form-control.s', 'on']);
					}
				});
				$('.search-block.off').fadeOut();


				// search form escape while pressing ESC key
				$(document).on('keydown', function (e) {
					if (e.keyCode === 27 && that.hasClass('active')) {
						that.removeClass('active');
						wrapper.addClass('off').removeClass('on');
						$('.search-block.off').fadeOut();
						$('.navigation-bar-top').find('button.search-toggle').focus();
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
					var doc_width = $(document).width();
					if (doc_width < 601) {
						$('.mnp-bottom-header.mnp-sticky').sticky({
							topSpacing: 0,
							zIndex: 99
						});
					} else {
						$('.mnp-bottom-header.mnp-sticky').sticky({
							topSpacing: wpAdminBar.height(),
							zIndex: 99
						});
					}
				} else {
					$('.mnp-bottom-header.mnp-sticky').sticky({
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
		},
		trapFocus: function (element, open_class) {
			var focusableEls = element.querySelectorAll('a[href]:not([disabled]), button:not([disabled]), textarea:not([disabled]), input[type="text"]:not([disabled]), input[type="search"]:not([disabled]), input[type="radio"]:not([disabled]), input[type="checkbox"]:not([disabled]), select:not([disabled])'),
				firstFocusableEl = focusableEls[0];
			magazineNPLastFocusableEl = focusableEls[focusableEls.length - 1];
			var KEYCODE_TAB = 9;
			element.addEventListener('keydown', function (e) {
				var isTabPressed = (e.key === 'Tab' || e.keyCode === KEYCODE_TAB);

				if (!isTabPressed) {
					return;
				}
				if (!element.classList.contains(open_class)) {
					element.removeEventListener('keydown', this);
					return;

				}

				if (e.shiftKey) /* shift + tab */ {
					if (document.activeElement === firstFocusableEl) {
						magazineNPLastFocusableEl.focus();
						e.preventDefault();
					}
				} else /* tab */ {

					if (document.activeElement === magazineNPLastFocusableEl) {
						firstFocusableEl.focus();
						e.preventDefault();
					}
				}

			});
		},
		keyPressInit: function () {
			$(document).keydown(function (e) {
				var key_code = e.keyCode || e.which;
				if (key_code === 27) {
					$('button.navbar-toggler.menu-toggle:not(.collapsed)').trigger('click').focus();
				}
			});
		}


	};


	magazineNPJs.init();

});
