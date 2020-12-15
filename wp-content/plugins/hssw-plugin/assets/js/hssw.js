jQuery(window).load(function() {
	/* Home page carousel */
	if (jQuery('.features-carousel').length) {
		jQuery('.features-carousel').owlCarousel({
			loop: true,
			margin: 0,
			nav: true,
			dots: false,
			autoplay: false,
			navSpeed: 500,
			items: 1
		});
	}
});
