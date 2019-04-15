document.body.onload = function() {

	setTimeout(function() {
		var preloader = document.getElementById('page-preloader');
		if( !preloader.classList.contains('done') ) {
			preloader.classList.add('done');
		};
	}, 750);

}


$( () => {
	
	//On Scroll Functionality
	$(window).scroll( () => {
		var windowTop = $(window).scrollTop();
		windowTop > 20 ? $('nav').addClass('navShadow') : $('nav').removeClass('navShadow');
	});

	$(window).scroll( () => {
		var windowTop = $(window).scrollTop();
		windowTop > 20 ? $('.link').addClass('black') : $('.link').removeClass('black');
	});

	$(window).scroll( () => {
		var windowTop = $(window).scrollTop();
		windowTop > 20 ? $('.hvr-underline-from-center').addClass('hvr-underline-from-center-before') : $('.hvr-underline-from-center').removeClass('hvr-underline-from-center-before');
	});
	$(window).scroll( () => {
		var windowTop = $(window).scrollTop();
		windowTop > 20 ? $('.abtn').addClass('abtnn') : $('.abtn').removeClass('abtnn');
	});
	$(window).scroll( () => {
		var windowTop = $(window).scrollTop();
		windowTop > 20 ? $('.abtn').addClass('abtnnn') : $('.abtn').removeClass('abtnnn');
	});

	$(window).scroll( () => {
		var windowTop = $(window).scrollTop();
		windowTop > 30 ? $('.main-logo').addClass('block-none') : $('.main-logo').removeClass('block-none');
	});
	

	$(window).scroll( () => {
		var windowTop = $(window).scrollTop();
		windowTop > 30 ? $('.sec-logo').addClass('block') : $('.sec-logo').removeClass('block');
	});

	$(window).scroll( () => {
		var windowTop = $(window).scrollTop();
		windowTop > 30 ? $('.top-div').addClass('top-div-sec') : $('.top-div').removeClass('top-div-sec');
	});

	$(window).scroll( () => {
		var windowTop = $(window).scrollTop();
		windowTop > 30 ? $('.tss-label_pic').addClass('blue') : $('.tss-label_pic').removeClass('blue');
	});

	$(window).scroll( () => {
		var windowTop = $(window).scrollTop();
		windowTop > 30 ? $('.tss--close').addClass('white') : $('.tss--close').removeClass('white');
	});

	
	//Click Logo To Scroll To Top
	$('#logo').on('click', () => {
		$('html,body').animate({
			scrollTop: 0
		},500);
	});
	
	//Smooth Scrolling Using Navigation Menu
	$('a[href*="#"]').on('click', function(e){
		$('html,body').animate({
			scrollTop: $($(this).attr('href')).offset().top - 0
		},500);
		e.preventDefault();
	});
	
	
});


var config = {
	elementID: 'touchSideSwipe',
            elementWidth: 300, //px
            elementMaxWidth: 0.8, // *100%
            sideHookWidth: 44, //px
            moveSpeed: 0.5, //sec
            opacityBackground: 0.5,
            shiftForStart: 50, // px
            windowMaxWidth: 1024, // px
        }
        var touchSideSwipe = new TouchSideSwipe(config);


        var swiper = new Swiper('.swiper-container', {
        	spaceBetween: 30,
        	effect: 'fade',
        	loop: true,
        	autoplay: {
        		delay: 6000,
        		disableOnInteraction: false,
        	},
        	pagination: {
        		el: '.swiper-pagination',
        		clickable: true,
        	},
        	navigation: {
        		nextEl: '.swiper-button-next',
        		prevEl: '.swiper-button-prev',
        	},
        });

