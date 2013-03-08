jQuery(function($){
	$(window).load(function() {
		
		// Homepage
		$('#home-testimonials .flexslider').flexslider({
			animation: 'slide',
			slideshow: false,
			smoothHeight: true,
			controlNav: false,
			directionNav: true,
			video: false,
			prevText: '<span class="wpex-icon-chevron-left"></span>',
			nextText: '<span class="wpex-icon-chevron-right"></span>'
		});
		
	}); // end window load
}); // end function