jQuery(function($){
	$(document).ready(function(){
		
		//animate comments scroll
		function wpex_comment_scroll() {
			$(".comment-scroll a").click(function(event){		
				event.preventDefault();
				$('html,body').animate({ scrollTop:$(this.hash).offset().top}, 'normal' );
			});
		} wpex_comment_scroll();
		
		//superFish
		$(function() { 
			$("ul.sf-menu").superfish({
				delay: 200,
				autoArrows: false,
				dropShadows: false,
				animation: {opacity:'show', height:'show'},
				speed: 'fast'
			});
		});
		
		//portfolio hover
		function wpex_portfolio_hover() {
				var config = {    
					 timeout: 500, // number = milliseconds delay before onMouseOut    
				};
	
				$(".portfolio-entry").hover(function(){
					
					var $overlay = $(this).find('.portfolio-entry-overlay');
					var $overlayHeading = $overlay.find('h2');
					var $entryHeight =  $(this).height();
					var $overlayHeight = $overlayHeading.height();
					var $topmargin = ($entryHeight - $overlayHeight) / 2;
					
					$overlay.stop(true, true).fadeIn("normal");
					$overlayHeading.stop(true, true).animate({ top: 0, marginTop: $topmargin }, "bounceOutBack");
					
				}, function(){
					
					var $overlay = $(this).find('.portfolio-entry-overlay');
					var $overlayHeading = $overlay.find('h2');
					
					$overlay.stop(true, true).fadeOut("normal");
					$overlayHeading.stop(true, true).animate({ top: -400 });
					
				});
			}
			//prevent portfolio hover animation on small screens
			if ($(window).width() > 959) {
				wpex_portfolio_hover();
			}
	
	}); // end doc ready
}); // end function


jQuery(function($){
	$(window).load(function() {
		
		// Homepage
    	$('#home-slider .flexslider').flexslider({
			animation: 'slide',
			slideshow: false,
			smoothHeight: true,
			controlNav: true,
			directionNav: true,
			video: false,
			prevText: '<span class="wpex-icon-chevron-left"></span>',
			nextText: '<span class="wpex-icon-chevron-right"></span>',
			start: function(slider) {
 				slider.removeClass('slider-loading');
			}
		});
		
		// Portfolio
		$('#single-portfolio-media .flexslider').flexslider({
			animation: 'slide',
			slideshow: true,
			smoothHeight: true,
			controlNav: false,
			prevText: '<span class="wpex-icon-chevron-left"></span>',
			nextText: '<span class="wpex-icon-chevron-right"></span>',
			start: function(slider) {
 				slider.removeClass('slider-loading');
			}
		});
		
	}); // end window load
}); // end function