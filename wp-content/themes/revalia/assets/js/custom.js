/* ------------------------------------------ */
/*             TABLE OF CONTENTS
/* ------------------------------------------ */

/*   01 - MENU                   */
/*   02 - owl Slider             */
/*   05 - Search                 */
/*   06 - Loading Overlay        */
/*   07 - Back to top button     */
/*   08 - Parallax Mobile        */
/*   09 - WOW Animation          */

jQuery(document).ready(function($) {

"use strict";

/*-----------------------------------------------------------------------------------*/
/*	Start MENU
/*-----------------------------------------------------------------------------------*/

	$(".flexnav").flexNav({
	  'animationSpeed':     250,            // default for drop down animation speed
	});

	$('.sidebar-navigation').each(function(){
	  $("body").on("click",".sidebar-button a", function(e){
		$("html").addClass("sidebar-open");
		$(".sidebar-navigation, .blog-inwrap").addClass("open");
		e.stopPropagation();
		e.preventDefault();
	  });

	  $("body").on("click",".close-btn", function(e){
		$("html").removeClass("sidebar-open");
		$(".sidebar-navigation, .blog-inwrap").removeClass("open");
		e.preventDefault();
	  });

	  $(".sidebar-navigation ul li.menu-item-has-children a").click(function() {
		var link = $(this);
		var closest_ul = link.closest("ul");
		var parallel_active_links = closest_ul.find(".active")
		var closest_li = link.closest("li");
		var link_status = closest_li.hasClass("active");
		var count = 0;
		closest_ul.find("ul").slideUp(function() {
		  if (++count == closest_ul.find("ul").length)
			  parallel_active_links.removeClass("active");
		});
		if (!link_status) {
		  closest_li.children("ul").slideDown();
		  closest_li.addClass("active");
		}
	  });

	  $(".scrollbar-macosx").niceScroll({cursorcolor:"#1b1d25"});
	});

/*-----------------------------------------------------------------------------------*/
/*	End MENU
/*-----------------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------------*/
/*	Start owl Slider
/*-----------------------------------------------------------------------------------*/

jQuery(document).ready(function($) {
		$('#slider-post-img').owlCarousel({
		items:1,
		stagePadding: 0,
		margin:0,
		loop:true,
		merge:true,
		animateIn: 'fadeIn',
		animateOut: 'fadeOut',
		autoplay:true,
		smartSpeed:600,
		nav:true,
		autoplayTimeout:3000,
		autoplayHoverPause:true,
		responsiveClass:true,
		responsive:{
			200:{
				mergeFit:true,
				items:1,
				stagePadding: 0,
				margin:0,
			},
			678:{
				mergeFit:true,
				items:1,
				stagePadding: 0,
				margin:0,
			},
			1000:{
				mergeFit:false,
				items:1,
			}
		}
	});
});

/*-----------------------------------------------------------------------------------*/
/*	End owl Slider
/*-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/*	Start Sticky Sidebar
/*-----------------------------------------------------------------------------------*/

	$('.Sidebar').theiaStickySidebar({
	// Settings
	additionalMarginTop: 30
	});

/*-----------------------------------------------------------------------------------*/
/*	End Sticky Sidebar
/*-----------------------------------------------------------------------------------*/

/* ---------------------------------------------------------------------- */
/*	Start Search
/* ---------------------------------------------------------------------- */

$(".Search-Icon-click").on('click', function(){
	$(".Block-Search-header").fadeIn(150);
  $(".Block-Search-header").addClass('active-search');
});
$(".close-search").on('click', function(){
	$(".Block-Search-header").fadeOut(300);
  $(".Block-Search-header").removeClass('active-search');
})

$(window).load(function() {
  $('.Block-Search-header').css({'display':'none'});
});


/* ---------------------------------------------------------------------- */
/*	End Search
/* ---------------------------------------------------------------------- */

/*-----------------------------------------------------------------------------------*/
/*	Strat LOADING OVERLAY
/*-----------------------------------------------------------------------------------*/

$(window).load(function()
{
	$("#loading").fadeOut(300);
});

$(window).load(function() {
  $('body').css({'overflow':'auto', 'height':'auto', 'position':'relative'});
});

/*-----------------------------------------------------------------------------------*/
/*	End LOADING OVERLAY
/*-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/*	Start Back to top button
/*-----------------------------------------------------------------------------------*/

var winScroll = $(window).scrollTop();
	if (winScroll > 1) {
		$('#to-top').css({bottom:"10px"});
	} else {
		$('#to-top').css({bottom:"-100px"});
	}
	$(window).on("scroll",function(){
		winScroll = $(window).scrollTop();

		if (winScroll > 1) {
			$('#to-top').css({opacity:1,bottom:"30px"});
		} else {
			$('#to-top').css({opacity:0,bottom:"-100px"});
		}
	});
	$('#to-top').click(function(){
		$('html, body').animate({scrollTop: '0px'}, 800);
		return false;
});

$('.fa-hover').wrapInner('<span />');

/*-----------------------------------------------------------------------------------*/
/*	End Back to top button
/*-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/*	Start Parallax Mobile
/*-----------------------------------------------------------------------------------*/

jQuery(document).ready(function($) {
    if (navigator.userAgent.match(/Android/i) ||
        navigator.userAgent.match(/webOS/i) ||
        navigator.userAgent.match(/iPhone/i) ||
        navigator.userAgent.match(/iPad/i) ||
        navigator.userAgent.match(/iPod/i) ||
        navigator.userAgent.match(/BlackBerry/i)) {
        $('.parallax').addClass('mobile');
    }
});

/*-----------------------------------------------------------------------------------*/
/*	End Parallax Mobile
/*-----------------------------------------------------------------------------------*/

   $("iframe").removeAttr("frameborder");

/* ---------------------------------------------------------------------- */
/*	Start WOW Animation
/* ---------------------------------------------------------------------- */

jQuery(document).ready(function($) {
 new WOW().init();
});


jQuery(document).ready(function($) {
	var msnry = new Masonry( '.masonry-layout', {
	  // options
	  columnWidth: '',
		itemSelector: '.masonry-item',
		percentPosition: true,
		layoutMode: 'masonry',
	});
});

/*-----------------------------------------------------------------------------------*/
/*	End WOW Animation
/*-----------------------------------------------------------------------------------*/

(function($) {

var $event = $.event,
	$special,
	resizeTimeout;

$special = $event.special.debouncedresize = {
	setup: function() {
		$( this ).on( "resize", $special.handler );
	},
	teardown: function() {
		$( this ).off( "resize", $special.handler );
	},
	handler: function( event, execAsap ) {
		// Save the context
		var context = this,
			args = arguments,
			dispatch = function() {
				// set correct event type
				event.type = "debouncedresize";
				$event.dispatch.apply( context, args );
			};

		if ( resizeTimeout ) {
			clearTimeout( resizeTimeout );
		}

		execAsap ?
			dispatch() :
			resizeTimeout = setTimeout( dispatch, $special.threshold );
	},
	threshold: 150
};

})(jQuery);

});
