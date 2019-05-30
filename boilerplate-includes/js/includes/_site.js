/* Global variables and functions */
var portail = (function ($, window, undefined) {
	'use strict';
	var $win = $(window),
		$header = $('#header'),
		$main = $('#main'),
		$footer = $('#footer');

	/*-----------------------------------------------------*/
	/*------------   detectNewHtmlElements  ---------------*/
	/*-----------------------------------------------------*/

	function _detectNewHtmlElements(options) {
		if (Modernizr.mutationobserver) {
			var observer = new MutationObserver(function (mutations) {
				mutations.forEach(function (mutation) {
					if (mutation.addedNodes) {
						$.each(options, function (key, item) {
							if ($(mutation.addedNodes[0]).is(item.selector)) {
								item.callback($(mutation.addedNodes[0]));
							} else if ($(mutation.addedNodes[0]).find(item.selector).length) {
								$(mutation.addedNodes[0]).find(item.selector).each(function () {
									item.callback($(this));
								});
							}
						});
					}
				});
			});
			var config = {
				attributes : false,
				childList : true,
				subtree : true,
				characterData : false
			};
			observer.observe($('body')[0], config);
		} else {
			$(document).on('DOMNodeInserted', function (e) {
				var target = $(e.target);
				$.each(options, function (key, item) {
					if (target.is(item.selector)) {
						item.callback(target);
					} else if (target.find(item.selector).length) {
						target.find(item.selector).each(function () {
							item.callback($(this));
						});
					}
				});
			});
		}
	}
	/*-----------------------------------------------------*/
	/*------------------------  focus  --------------------*/
	/*-----------------------------------------------------*/

	$('a').on('keyup focusout', function(e) {
		var code = (e.keyCode ? e.keyCode : e.which);
		if (code == 9) {
			$(this).addClass('is-focus');
			if($('.multi-lang li.is-active a').hasClass('is-focus')) {
				$('.multi-lang li:not(.is-active)').show();
			}
		} else  {
			$(this).removeClass('is-focus');

			if($(this).closest('li').is(':last-child') && $(this).closest('.multi-lang')) {
				$('.multi-lang li:not(.is-active)').hide();
			}
		}
	});

	/*-----------------------------------------------------*/
	/*------------------------  menu  ---------------------*/
	/*-----------------------------------------------------*/

	function _menu() {
		$('.btn-collapse').on('click', function (e) {
			e.preventDefault();
			e.stopPropagation();
			$(this).toggleClass('is-active');
			$header.toggleClass('is-active');
			$('.wrap-collapse').toggleClass('is-active');
			$('body').toggleClass('disableScroll');
		});

		/*-----------  detect tab keyboard  -----------*/

		$('.btn-collapse').on('keyup', function(e) {
			var code = (e.keyCode ? e.keyCode : e.which);
			if (code == 9) {
				e.preventDefault();
				e.stopPropagation();
				$(this).toggleClass('is-active');
				$header.toggleClass('is-active');
				$('.wrap-collapse').toggleClass('is-active');
				$('body').toggleClass('disableScroll');
			}
		});

		$('.main-nav a:last').on('focusout', function(e) {
			e.preventDefault();
			e.stopPropagation();
			$('.btn-collapse').removeClass('is-active');
			$header.removeClass('is-active');
			$('.wrap-collapse').removeClass('is-active');
			$('body').removeClass('disableScroll');
		});
	}

	/*-----------------------------------------------------*/
	/*--------------------  sticky menu  ------------------*/
	/*-----------------------------------------------------*/

	function _stickyMenu() {
		var $nav = $('.block-header');
		var $banner = $('.block-banner');
		if($banner.length) {
			// var $mainContent = $('.main');
			var $navOffset = $banner.offset().top + $banner.outerHeight() - 60;

			$(window).scroll(function(){
				var scrollTop = $(this).scrollTop();
				if(scrollTop >= $navOffset) {
					$nav.addClass('is-sticky');
					$header.addClass('is-sticky');
					// $mainContent.addClass('sticky');
				} else {
					$nav.removeClass('is-sticky');
					$header.removeClass('is-sticky');
					// $mainContent.removeClass('sticky');
				}
			});
		}
	}

	/*-----------------------------------------------------*/
	/*---------------------  btn close   ------------------*/
	/*-----------------------------------------------------*/
	
	function _btnClose() {
		$('[data-close]').each(function () {
			var $target = $('[data-close]').data('close');

			$(this).click(function () {
				$($target).fadeOut();
			});
		});
	}

	/*-----------------------------------------------------*/
	/*--------------------  list even  --------------------*/
	/*-----------------------------------------------------*/
	
	function _listEvents() {
		var $btn = $('.list-events .btn-default');
		$btn.each(function () {
			$(this).not('.added-js').click(function (e) {
				e.preventDefault();
				$(this).closest('.item').toggleClass('is-active');
				$(this).closest('.item').find('.des').slideToggle();
			});
			$(this).addClass('added-js');
		});

	}

	/*-----------------------------------------------------*/
	/*------------------------  menu  ---------------------*/
	/*-----------------------------------------------------*/

	function _searchMobile() {
		$('.btn-search-mobile').on('click', function (e) {
			e.preventDefault();
			e.stopPropagation();
			$('.block-search').slideToggle();
		});

		$('.btn-search-mobile').on('keyup', function(e) {
			var code = (e.keyCode ? e.keyCode : e.which);
			if (code == 9) {
				e.preventDefault();
				e.stopPropagation();
				$('.block-search').slideToggle();
			}
		});
	}

	/*-----------------------------------------------------*/
	/*-----------------------  select2  --------------------*/
	/*-----------------------------------------------------*/

	function _select2() {
		var $select = $(".select2, .form-partner select");
		if ($select.length) {
			$select.each(function () {
				$(this).select2({
					minimumResultsForSearch: -1,
				});
			});

		}
		return $select;
	}

    /*-----------------------------------------------------*/
    /*---------------------  multi lang  ------------------*/
    /*-----------------------------------------------------*/

    function _multiLang() {
        $('.multi-lang li.is-active').click(function (e) {
            e.preventDefault();
            $('.multi-lang li:not(.is-active)').toggle();
        });
    }

	/*-----------------------------------------------------*/
	/*-----------------------------------------------------*/
	/*-----------------------------------------------------*/


	return {
		init: function () {
			_menu();
			_stickyMenu();
			_btnClose();
			_listEvents();
			_searchMobile();
			_select2();
			_multiLang();
		},
		detectNewHtmlElements: _detectNewHtmlElements,
		eventClick: _listEvents,

	};

}(jQuery, window));

jQuery(document).ready(function () {
	portail.init();
});
