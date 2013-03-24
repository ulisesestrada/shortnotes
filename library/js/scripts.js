
// as the page loads, cal these scripts
jQuery(document).ready(function() {

/*FIT VIDEOS STARTS*/
jQuery("article").fitVids();
/*FIT VIDEOS ENDS*/

/* Small Screens Menu Slide Down/Up */
jQuery("#topmenu-button").click(function(){
	jQuery("#small-screens-menu nav").slideToggle("slow");
});

}); /* end of as page load scripts */
