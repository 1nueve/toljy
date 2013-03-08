jQuery(function($){
	$(window).load(function() {
		
		function wpex_isotope() {
			
			// cache container
			var $container = $('#portfolio-filter-content, .portfolio-category');
			// initialize isotope
			$container.imagesLoaded(function(){
				$container.isotope({
					itemSelector: '.portfolio-entry',
					animationOptions: {
						duration: 400,
						easing: 'swing',
						queue: false
					}
				});
			});
		
			
			// filter items when filter link is clicked
			$('.filter a').click(function(){
				
			  var selector = $(this).attr('data-filter');
				$container.isotope({ filter: selector });
				$(this).parents('ul').find('a').removeClass('active');
				$(this).addClass('active');
			  return false;
			});
			
			
			$(window).resize(function () {
			
				// cache container
				var $container = $('#portfolio-filter-content, .portfolio-category');
				// initialize isotope
				$container.isotope({ });
			
			}); // END resize
		
		} wpex_isotope();

		
	}); // END window ready
}); // END function