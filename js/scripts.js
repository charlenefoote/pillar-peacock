// Pintrest
(function(d){
    var f = d.getElementsByTagName('SCRIPT')[0], p = d.createElement('SCRIPT');
    p.type = 'text/javascript';
    p.async = true;
    p.src = '//assets.pinterest.com/js/pinit.js';
    f.parentNode.insertBefore(p, f);
}(document));

// Masonry
jQuery(window).load(function(){
	jQuery('#container').masonry({ 
		singleMode: true,
  		isAnimated: !Modernizr.csstransitions
	}).imagesLoaded(function() {
  		jQuery('#container').masonry('reload');
  		
  	});
});

jQuery(window).resize(function(){
	jQuery('#container').masonry({ 
		singleMode: true,
  		isAnimated: !Modernizr.csstransitions
	}).imagesLoaded(function() {
  		jQuery('#container').masonry('reload');
  	});
});