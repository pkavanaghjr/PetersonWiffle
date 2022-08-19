/*======================================*/ 
/* 		Table of Contents 				

	** FIREWORKS

	** WINDOW RESIZE

*/
/*======================================*/


/*============================================================================*/ 
/* 							** DOC READY 									  */
/*============================================================================*/
jQuery( document ).ready(function( $ ) {

	var windowWidth = $(window).width();
	var windowHeight = $(window).height();


/*======================================*/ 
/* 		** FIREWORKS					*/
/*======================================*/

	$(document).on('click', '.block--winners .winners__fireworks--trigger', function(e){
		console.log('start party');

		// START PARTY
		if( !$(this).hasClass('active') ){
			$(this).addClass('active');
			$('body').addClass('active--fireworks');
			// Add canvas and start
			var canvas_html = '<div class="winners__fireworks--canvas"></div>';
			$('.block--winners').prepend(canvas_html);
			$('.block--winners .winners__fireworks--canvas').fireworks();
		}

		// STOP
		else{
			$(this).removeClass('active');
			$('body').removeClass('active--fireworks');
			$('.block--winners .winners__fireworks--canvas').fadeOut(1000, function(){
				$('.block--winners .winners__fireworks--canvas').delay(100).remove();
			});
		}
	});






/*======================================*/ 
/* 		** WINDOW RESIZE				*/
/*======================================*/

	$(window).on('resize', function(){
		windowWidth = $(window).width();
		windowHeight = $(window).height();
		
	});


}); /***|  END DOCUMENT.READY  |***/



