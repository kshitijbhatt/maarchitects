
jQuery(document).ready(function(){

	// ========== LOGO SLIDER
	jQuery('.logoslider').owlCarousel({
	    loop:true,
	    margin:0,
	    autoplay:true,
	    nav:false,	    
	    animateOut: 'fadeOut',
    	animateIn: 'fadeIn',	   
    	autoplayTimeout:2000,	   
	    autoplayHoverPause:true,	    
    	smartSpeed:960,
	    responsive:{
	        0:{
	            items:1
	        },
	        600:{
	            items:3
	        },
	        1000:{
	            items:4
	        }
	    }
	});

	/* STICKY MENU */
	jQuery(function(){
	    jQuery(window).scroll(function() {
	        if (jQuery(this).scrollTop() >= 100) {
	            jQuery('.site_header').addClass('stickytop');
	        }
	        else {
	            jQuery('.site_header').removeClass('stickytop');
	        }
	    });
	});


	/* SCROLL TO TOP */
	jQuery(window).scroll(function() {
	    if (jQuery(this).scrollTop() > 100) {
	        jQuery('#toTop').fadeIn();
	    } else {
	        jQuery('#toTop').fadeOut();
	    }
	});
	jQuery('#toTop').click(function() {
	    jQuery('html, body').animate({
	        scrollTop: 0
	    }, 800);
	    return false;
	});


	/* WOW JS INIT */
	new WOW().init();


	// Toggle Filter
	jQuery('.filter_link').on('click', function(){
	    jQuery('.filter_wrap').slideToggle();
	    jQuery('.filter_link i.fa').toggleClass('fa-angle-right fa-angle-down');
	});



});
	
// On window Load
//-------------------------------------------------------------------
jQuery(window).on('load', function(){	
  // Pre loadder
  //----------------------------------------
  jQuery('#preloader').fadeOut(450);
});
