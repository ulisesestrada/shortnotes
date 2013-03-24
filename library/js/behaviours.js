jQuery.noConflict();
jQuery(document).ready(function(){
    
/*ACCORDION JQUERY STARTS*/	
/********** jquery toogle function **********/
jQuery('#toggle-view li').click(function () {
	var text = jQuery(this).children('p');

	if (text.is(':hidden')) {
		text.slideDown('200');
		jQuery(this).find('.toggle-indicator').text('-');
	} else {
		text.slideUp('200');
		jQuery(this).find('.toggle-indicator').text('+');
	}
});
/*ACCORDION JQUERY ENDS*/

/*GOOGLE MAPS STARTS*/
if ( jQuery( '#map' ).length && jQuery() ) {
var jQuerymap = jQuery('#map');
	jQuerymap.gMap({	
	address: 'Level 13, 2 Elizabeth St, Melbourne Victoria 3000 Australia',	 
	zoom: 18,
	markers: [
	{ 'address' : 'Level 13, 2 Elizabeth St, Melbourne Victoria 3000 Australia' },]	
			});
		 } 
/*GOOGLE MAPS ENDS*/

/*PRETTYPHOTO STARTS*/
    jQuery("a[class^='prettyPhoto']").prettyPhoto({animationSpeed:'slow',theme:'facebook',slideshow:2000});
/*PRETTYPHOTO ENDS*/	

});
