$(function () {

	/*=======================================
	=            Activate WOW.js            =
	=======================================*/
	
	new WOW().init();	

	/*==========================================
	=            Animate skill bars            =
	==========================================*/

	// Prevent animation, once it has been already nimated
	var animated = true;

	$(window).scroll(function() {	
		if ($(window).scrollTop() > 600) {

			if (animated) {
				jQuery('.skillbar').each(function(){
					jQuery(this).find('.skillbar-bar').animate({
						width:jQuery(this).attr('data-percent')
					},1000);
				});
				animated = false;
			}
	    }
	});


	/*===========================================
	=            Hire me scroll down            =
	===========================================*/
	
    $("#scroll-down").on("click" ,function(){
        $('html, body').animate({
            scrollTop: $("#news").offset().top
        }, 1000);
    });  

});