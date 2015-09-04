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

		// $('.thumbEcontroles').slick({
			// appendArrows: $('.controles')
			// prevArrow : '.prev',
			// nextArrow : '.next'
		// });

		$('.thumbEcontroles').slick();

		var $boxVan = $('.boxVan'),
				$seta = $('.seta');

		$boxVan.addClass('fechado');
		$seta.addClass('acroFechado');

		$boxVan.on('click', function () {
			$(this).toggleClass('fechado');
			$(this).children('.seta').toggleClass('acroFechado');
		});

	});

} ( this, jQuery ));
