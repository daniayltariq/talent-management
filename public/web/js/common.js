'use-strict';

$(window).on( "scroll", function() {
	if ($(this).scrollTop() > 80) {
		$('header').addClass("sticky");
	}
	else {
		$('header').removeClass("sticky");
	}
});

$(window).on( "load", function() {

	/*MENU*/
	$(".responsive-menu__button").on('click', function(){
		$(".main__menu").addClass('menu-center');

		$(".main__menu").slideToggle(400, function(){
			$(this).toggleClass("m-nav__expanded").css('display', '');
		});
	});
	/* double border-botton on sub-menu */
	if ($(window).width() > 992) {
		$('.m-menu__sub').mousemove(function(event) {
			$(this).prev('a').css('border-bottom', '1px solid red');
		});
		$('.m-menu__sub').mouseleave(function(event) {
			$(this).prev('a').css('border-bottom', 'none');
		});

	} else {
		$('.menu-item-has-children > a').append('<i class="mdi mdi-chevron-down toggle-sub-menu"><i>')
	}
	/* toogle sub-menu on mobile*/
	$('.toggle-sub-menu').on('click', function(event) {
		event.preventDefault();
		$(this).toggleClass('mdi-chevron-down mdi-chevron-up');
		$(this).parent().next().toggle();
	});
	

	/*SEARCH*/
	$('.full-search-wrap').css({
		width: $(window).width(),
		height: $(window).height()
	});
	$('.form-search__input_search').on('click', function() {
		$('.full-search-wrap').fadeIn('fast')
	
		$('#s-full').focus()
	});
	$('.close-s').on('click', function(event) {
		$('.form-search__input_search').val($('#s-full').val());
		$('.full-search-wrap').fadeOut('600');
	});
	
	/*SCROLL TO TOP*/
	$('.scroll-top').on('click', function(){
	    $("html, body").animate({ scrollTop: 0 }, 600);
	    return false;
	});
	
	// model slider
	if ($("div").is("#model-slider")){
			$( '#model-slider' ).sliderPro({
			width: 500,
			height: 760,
			fade: true,
			arrows: true,
			buttons: false,
			fullScreen: true,
			shuffle: true,
			smallSize: 500,
			mediumSize: 1000,
			largeSize: 3000,
			thumbnailArrows: true,
			autoplay: false
		});
	}
});

/* for correct isotope grid */
$(window).on( "load", function() {
	/*ISOTOPE*/
	var $grid = $('.grid').isotope({
		itemSelector: '.grid-item',
		percentPosition: true,
		masonry: {
			columnWidth: '.grid-sizer',
			gutter: '.grid-gutter'
			
		}
	});

	// bind filter button click
	$('.filters-button-group').on( 'click', 'button', function() {
		var filterValue = $( this ).attr('data-filter');
		// use filterFn if matches value
		// filterValue = filterFns[ filterValue ] || filterValue;
		$grid.isotope({ filter: filterValue });
	});
	// change is-checked class on buttons
	$('.button-group').each( function( i, buttonGroup ) {
		var $buttonGroup = $( buttonGroup );
		$buttonGroup.on( 'click', 'button', function() {
			$buttonGroup.find('.is-checked').removeClass('is-checked');
			$( this ).addClass('is-checked');
		});
	});

	/*post grid*/
	var $postGrid = $('.blog-grid').isotope({
		itemSelector: '.blog-grid__post',

		masonry: {
			columnWidth: '.blog-grid__sizer',
			gutter: '.blog-grid__gutter'
			
		}
	});
});

