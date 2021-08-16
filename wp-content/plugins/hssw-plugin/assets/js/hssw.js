jQuery(window).load(function() {
	/* Home page carousel */
	if (jQuery('.features-carousel').length) {
		jQuery('.features-carousel').owlCarousel({
			loop: true,
			margin: 0,
			nav: true,
			dots: false,
			autoplay: true,
			autoplayTimeout: 5000,
			autoplaySpeed: 1000,
			autoplayHoverPause: true,
			navSpeed: 1000,
			items: 1
		});
	}
});
