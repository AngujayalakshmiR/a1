$(document).ready(function() {
  var options = {
    autoPlay: true,
    autoPlayDelay: 5000,
    nextButton: true,
    prevButton: true,
    preloader: true,
    animateStartingFrameIn: true,
    transitionThreshold: 500,
    fallback: {
      theme: "slide",
      speed: 500
    }
  };
	
	if ( $( "#sequence" ).length ) {
		var sequence = $("#sequence").sequence(options).data("sequence");
		
		sequence.afterLoaded = function() {
			$(".info").css('display', 'block');
			$("#sequence").hover(
				function() {
					$(".prev, .next").stop().animate({
						opacity: 0.7
					}, 300);
				},
				function() {
					$(".prev, .next").stop().animate({
						opacity: 0
					}, 300);
				}
			);
			
			$(".prev, .next").hover(
				function() {
					$(this).stop().animate({
						opacity: 1
					}, 200);
				},
				function() {
					$(this).stop().animate({
						opacity: 0.7
					}, 200);
				}
			);
		}
	}
});