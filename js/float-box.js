if( jQuery(window).width() > 859 ) {
	 jQuery(function() {
	    var offset = jQuery(".floatbox").offset();
	    var topPadding = 65;
	    jQuery(window).scroll(function() {
	        if (jQuery(window).scrollTop() > offset.top) {
	            jQuery(".floatbox").stop().animate({
	                marginTop: jQuery(window).scrollTop() - offset.top + topPadding
	            });
	        } else {
	            jQuery(".floatbox").stop().animate({
	                marginTop: 0
	            });
	        };
	    });
	});
}