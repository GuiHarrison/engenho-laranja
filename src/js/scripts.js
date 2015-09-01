(function( root, $, undefined ) {
	'use strict';

	$(function () {

		var $headerButton = $('#header__button'),
			$mM = $('.menuMobile'),
			$header = $('.header');

		$headerButton.removeClass('hamburger--open');
		$mM.removeClass('menuMobileAberto');
		$header.removeClass('headerMenuAberto');

		$headerButton.on('click', function(e) {
			e.preventDefault();

			$(this).toggleClass('hamburger--open');
			$mM.toggleClass('menuMobileAberto');
			$header.toggleClass('headerMenuAberto');
		});

		$('#thumbCtrlFicha').slick({
			prevArrow : '.prev',
			nextArrow : '.next'
		});

	});

} ( this, jQuery ));