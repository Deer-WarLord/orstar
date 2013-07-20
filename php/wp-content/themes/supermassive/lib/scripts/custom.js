/*************************** Remove Javascript Disabled Class ***************************/

var el = document.getElementsByTagName("html")[0];
el.className = "";
	

/*************************** iPhone/iPad Styling ***************************/

if(navigator.platform == 'iPad' || navigator.platform == 'iPhone' || navigator.platform == 'iPod'){
	jQuery(document).ready(function(){	
		jQuery("#footer-bottom-outer").css("padding", "0px 32px 0px 32px");
	});
};


/*************************** Image Reflections ***************************/

jQuery(document).ready(function(){

	jQuery(".reflection-s").reflect({
		height: 25,
		opacity: 0.3
	});
	
	jQuery(".reflection-m").reflect({
		height: 70,
		opacity: 0.3
	});
	
	jQuery(".reflection-l").reflect({
		height: 100,
		opacity: 0.5
	});
	
	jQuery(".ie8 .slider .reflection-s, .ie8 .slider .reflection-m, .ie8 .slider .reflection-l").unreflect();
	
});


/*************************** Flash/Dropdown Menu Fix ***************************/

/*jQuery(document).ready(function () {
   fix_flash();    
});*/


/*************************** Navigation Menus ***************************/

jQuery(document).ready(function(){

	var nav = jQuery("#nav");

	nav.find(".menu > li").each(function() {
		if (jQuery(this).find("ul").length > 0) {	
		
			jQuery("<span/>").html("&#9660;").appendTo(jQuery(this).children(":first"));	
		
			jQuery("#nav ul li").mouseenter(function() {
				jQuery(this).find("ul:first").filter(':not(:animated)').slideDown(300);
			});
		
			jQuery(this).mouseleave(function() {
				jQuery(this).find("ul:first").slideUp(200);
			});
	
		}
	});
	
	nav.find("li ul li").each(function() {
		if (jQuery(this).find("ul").length > 0) {	
		
			jQuery("<span/>").html("&#9654;").appendTo(jQuery(this).children(":first"));	
			
			jQuery("#nav ul li").mouseenter(function() {
				jQuery(this).find("ul:first").filter(':not(:animated)').slideDown(300);
			});
		
			jQuery(this).mouseleave(function() {
				jQuery(this).find("ul:first").slideUp(200);
			});

		}
	});	


			
});


/*************************** Lightbox ***************************/

jQuery(document).ready(function(){

	jQuery("div.gallery-item .gallery-icon a").prepend('<span class="hover-image"></span>');
	jQuery("div.gallery-item .gallery-icon a").attr("rel", "prettyPhoto[gallery]");
	var galleryimgWidth = jQuery("div.gallery-item .gallery-icon img").width();
	var galleryimgHeight = jQuery("div.gallery-item .gallery-icon img").height();
	jQuery("div.gallery-item .gallery-icon .hover-image").css({"width": galleryimgWidth, "height": galleryimgHeight});
	jQuery("div.gallery-item .gallery-icon a").css({"width": galleryimgWidth});
	
	jQuery("a[rel^='prettyPhoto']").prettyPhoto({
		theme: 'light_square',
		deeplinking: false,
		social_tools: ''
	});
	
});


/*************************** Image Hover ***************************/

jQuery(document).ready(function(){

	jQuery('.hover-image, .hover-video').css({'opacity':'0'});
	jQuery("a[rel^='prettyPhoto']").hover(
		function() {
			jQuery(this).find('.hover-image, .hover-video').stop().fadeTo(750, 1);
			jQuery(this).find("img").stop().fadeTo(750, 0.5);
		},
		function() {
			jQuery(this).find('.hover-image, .hover-video').stop().fadeTo(750, 0);
			jQuery(this).find("img").stop().fadeTo(750, 1);
		})

});


/*************************** Image Preloader ***************************/

jQuery(function () {
	jQuery('.preload').hide();
});

var i = 0;
var int=0;
jQuery(window).bind("load", function() {
	var int = setInterval("doThis(i)",100);
});

function doThis() {
	var images = jQuery('.preload').length;
	if (i >= images) {
		clearInterval(int);
	}
	jQuery('.preload:hidden').eq(0).fadeIn(400);
	i++;
}


/*************************** Accordion ***************************/

jQuery(document).ready(function(){
	jQuery(".accordion").accordion({ header: "h3.accordion-title" });
	jQuery("h3.accordion-title").toggle(function(){
		jQuery(this).addClass("active");
		}, function () {
		jQuery(this).removeClass("active");
	});	
});


/*************************** Tabs ***************************/

jQuery(document).ready(function(){
	jQuery(".sc-tabs").tabs({
		fx: {
			height:'toggle',
			duration:'fast'
		}
	});	
});


/*************************** Toggle Content ***************************/

jQuery(document).ready(function(){
jQuery(".toggle-box").hide(); 

jQuery(".toggle").toggle(function(){
	jQuery(this).addClass("toggle-active");
	}, function () {
	jQuery(this).removeClass("toggle-active");
});

jQuery(".toggle").click(function(){
	jQuery(this).next(".toggle-box").slideToggle();
});
});


/*************************** Contact Form ***************************/

jQuery(document).ready(function(){
	
	jQuery('#contact-form').submit(function() {

		jQuery('.contact-error').remove();
		var hasError = false;
		jQuery('.requiredFieldContact').each(function() {
			if(jQuery.trim(jQuery(this).val()) == '') {
				jQuery(this).addClass('input-error');
				hasError = true;
			} else if(jQuery(this).hasClass('email')) {
				var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				if(!emailReg.test(jQuery.trim(jQuery(this).val()))) {
					jQuery(this).addClass('input-error');
					hasError = true;
				}
			}
		});
	
	});
				
	jQuery('#contact-form .contact-submit').click(function() {
		jQuery('.loader').css({display:"block"});
	});	

});


/*************************** Prevent Empty Search ***************************/


/**
 * Stop empty searches
 *
 * @author Thomas Scholz http://toscho.de
 * @param  $ jQuery object
 * @return bool|object
 */
(function( $ ) {
   $.fn.preventEmptySubmit = function( options ) {
       var settings = {
           inputselector: "#searchbar",
           msg          : emptySearchText
       };
       if ( options ) {
           $.extend( settings, options );
       };
       this.submit( function() {
           var s = $( this ).find( settings.inputselector );
           if ( ! s.val() ) {
               alert( settings.msg );
               s.focus();
               return false;
           }
           return true;
       });
       return this;
   };
})( jQuery );

jQuery(document).ready(function(){
	jQuery('#searchform').preventEmptySubmit();
	jQuery('.widget #searchform').preventEmptySubmit();
});