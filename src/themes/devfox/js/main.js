"use strict";

jQuery(document).ready(function () {
		
	jQuery( ".widget_nav_menu li a" ).each(function() {
		if(!jQuery(this).attr('href')) {
			jQuery(this).closest("li").addClass("empty_link");
		}
	});
	
	/**
	 * Header Search Form
	*/
	
	jQuery( ".cmt-sboxheader-search-link a" ).addClass('sclose');	
	jQuery( ".cmt-sboxheader-search-link a" ).on('click', function(){
		jQuery(".field.searchform-s").focus();	
		
		if (jQuery('.cmt-sboxheader-search-link a').hasClass('sclose')) {	
			jQuery( ".cmt-sboxheader-search-link a i" ).removeClass('cmt-devfox-icon-search-1').addClass('cmt-devfox-icon-search-1');
			jQuery(this).removeClass('sclose').addClass('open');	
			jQuery(".cmt-search-overlay").addClass('st-show');					
		} else {
			jQuery(this).removeClass('open').addClass('sclose');
			jQuery(".cmt-search-overlay").removeClass('st-show');	
		}	
	});	
	jQuery( ".cmt-search-overlay .cmt-close a" ).on('click', function(){
		jQuery('.cmt-sboxheader-search-link a').removeClass('open').addClass('sclose');		
		jQuery(".cmt-search-overlay").removeClass('st-show');	
	});	

	/**
	 * Floating-bar Section
	*/
	
	jQuery(".cymolthemes-fbar-btn > a.cymolthemes-fbar-btn-link").on('click', function(){		
		if( jQuery(this).closest('.cymolthemes-fbar-main-w').hasClass('cymolthemes-fbar-position-default') ){
			// Fbar top position
			if( jQuery('.cymolthemes-fbar-box-w').css('display')=='none' ){
				jQuery('.cmt-sboxfbar-open-icon', this).fadeOut();
				jQuery('.cmt-fbar-close-icon', this).fadeIn();				
				jQuery('.cymolthemes-fbar-box-w').slideDown();
			} else {
				jQuery('.cmt-sboxfbar-open-icon', this).fadeIn();
				jQuery('.cmt-fbar-close-icon', this).fadeOut();				
				jQuery('.cymolthemes-fbar-box-w').slideUp();
			}
		} else {
			// Fbar right position
		}				
		return false;
	});	
		
	/**
	 * Floating-bar Click Event
	*/
	
	jQuery('.cmt-fbar-close, .cymolthemes-fbar-btn > a.cymolthemes-fbar-btn-link, .cmt-float-overlay').on('click', function(){
		jQuery('.cymolthemes-fbar-box-w').toggleClass('animated');
		jQuery('.cmt-float-overlay').toggleClass('animated');
		jQuery('.cymolthemes-fbar-btn').toggleClass('animated');		
	});
		
	/**
	 * ROW Equal height
	*/
	jQuery('.vc_row-o-equal-height, .cmt-sboxequalheightdiv').each(function(){
		var thisRow = jQuery(this);
		jQuery('.wpb_column', thisRow).each(function(){
			var thisColumn = jQuery(this);
			if(
				(
					(jQuery('.cmt-col-wrapper-bg-layer', thisColumn).length > 0 && ( jQuery('.cmt-col-wrapper-bg-layer', thisColumn).css('background-image') != 'none')) || // For main column
					(jQuery('.vc_column-inner', thisColumn).length > 0 && ( jQuery('.vc_column-inner', thisColumn).css('background-image') != 'none'))  // for inner_coumn
				) &&
				(jQuery('.wpb_wrapper', thisColumn).html().trim() == '')
				
			) {
				
				if(jQuery('.cmt-col-wrapper-bg-layer', thisColumn).length > 0 && ( jQuery('.cmt-col-wrapper-bg-layer', thisColumn).css('background-image') != 'none')){
					var bgimage = jQuery('.cmt-col-wrapper-bg-layer', thisColumn).css('background-image').replace('url(','');
					bgimage     = bgimage.replace(')','');		
					
				} else {
					var bgimage = jQuery('.vc_column-inner', thisColumn).css('background-image').replace('url(','');
					bgimage     = bgimage.replace(')','');		
					
				}
				
				if( jQuery('.cmt-sboxequal-height-image', thisColumn ).length==0 ){
					jQuery('.vc_column-inner', thisColumn).after('<img src=' + bgimage + ' class="cmt-sboxequal-height-image" />');
				}
								
				jQuery(thisColumn).addClass('cmt-sboxemtydiv');
			}
		});
	});
	
});

	
/*------------------------------------------------------------------------------*/
/* Back to top
/*------------------------------------------------------------------------------*/

// ===== Scroll to Top ==== 
jQuery('#scroll_up').hide();
jQuery(window).scroll(function() {
    if (jQuery(this).scrollTop() >= 100) {        // If page is scrolled more than 50px
        jQuery('#scroll_up').fadeIn(200);    // Fade in the arrow
        jQuery('#scroll_up').addClass('top-visible');
    } else {
        jQuery('#scroll_up').fadeOut(200);   // Else fade out the arrow
        jQuery('#scroll_up').removeClass('top-visible');
    }
});
jQuery('#scroll_up').on('click', function() {    // When arrow is clicked
    jQuery('body,html').animate({
        scrollTop : 0                       // Scroll to top of body
    }, 500);
    return false;
});


/*------------------------------------------------------------------------------*/
/* Equal Height Div
/*------------------------------------------------------------------------------*/

var equalheight = function(container){

var currentTallest = 0,
     currentRowStart = 0,
     rowDivs = new Array(),
     $el,
     topPosition = 0;
 jQuery(container).each(function() {

   $el = jQuery(this);
   jQuery($el).outerHeight('auto')
   topPostion = $el.position().top;

   if (currentRowStart != topPostion) {
     for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
       rowDivs[currentDiv].height(currentTallest);
     }
     rowDivs.length = 0; // empty the array
     currentRowStart = topPostion;
     currentTallest = $el.outerHeight();
     rowDivs.push($el);
   } else {
     rowDivs.push($el);
     currentTallest = (currentTallest < $el.outerHeight()) ? ($el.outerHeight()) : (currentTallest);
  }
   for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
     rowDivs[currentDiv].outerHeight(currentTallest);
   }
 });
}	

function cymolthemes_sticky(){
	
	if( typeof jQuery.fn.stick_in_parent == "function" ){
		
		// Admin bar
		var offset_px = 0;
		if( jQuery('body').hasClass('admin-bar') ){
			offset_px = jQuery('#wpadminbar').height();
		}		

		// Returns width of browser viewport
		var pageWidth = jQuery( window ).width();	
		// setting height for spacer
		
		if( parseInt(pageWidth) > parseInt(cmt_breakpoint) ){
			jQuery('.cmt-sboxstickable-header').stick_in_parent({'parent':'body', 'spacer':false, 'offset_top':offset_px });
		} else {
			jQuery('.cmt-sboxstickable-header').trigger("sticky_kit:detach");
		}
	
	}
}

function cymolthemes_setCookie(c_name,value,exdays){
	var now  = new Date();
	var time = now.getTime();
	time    += (3600 * 1000) * 24;
	now.setTime(time);

	var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+now.toGMTString() );
	document.cookie=c_name + "=" + c_value;
} // END function cymolthemes_setCookie

/*------------------------------------------------------------------------------*/
/* Function to set dynamic height of Testimonial columns
/*------------------------------------------------------------------------------*/
function setHeight(column) {
    var maxHeight = 0;
    //Get all the element with class = col
    column = jQuery(column);
    column.css('height', 'auto');
	
	// Responsive condition: Work only in tablet, desktop and other bigger devices.
	if( jQuery( window ).width() > 479 ){
		
		//Loop all the column
		column.each(function() {       
			//Store the highest value
			if(jQuery(this).height() > maxHeight) {
				maxHeight = jQuery(this).height();
			}
		});
		//Set the height
		column.height(maxHeight);
		
	} // if( jQuery( window ).width() > 479 )
} // END function setHeight
/**************************************************************************/

/*------------------------------------------------------------------------------*/
/* Search form on search results page
/*------------------------------------------------------------------------------*/
if( jQuery('.cmt-sboxsresult-form-wrapper').length>0 ){

	jQuery('.cmt-sboxsresult-form-wrapper .cmt-sboxsresults-settings-btn').on('click', function(){
		jQuery('.cmt-sboxsresult-form-wrapper .cmt-sboxsresult-form-bottom').slideToggle('400',function(){
			if( jQuery('.cmt-sboxsresult-form-wrapper .cmt-sboxsresult-form-bottom').is(":hidden") ){
				jQuery('.cmt-sboxsresult-form-wrapper .cmt-sboxsresults-settings-btn').removeClass('cmt-sboxsresult-btn-active');
			} else {
				jQuery('.cmt-sboxsresult-form-wrapper .cmt-sboxsresults-settings-btn').addClass('cmt-sboxsresult-btn-active');
			}
		});
		return false;
	});

	// Check if post_type input is available or not
	if(jQuery('.cmt-sboxsresult-form-wrapper form.search-form').length > 0 ){
		if( jQuery(".cmt-sboxsresult-form-wrapper form.search-form input[name='post_type']").length==0 ){
		
			jQuery('<input>').attr({
				type : 'hidden',
				name : 'post_type'
			}).appendTo('.cmt-sboxsresult-form-wrapper form.search-form');
		}
	}

	// On change of the CPT dropdown
	jQuery(".cmt-sboxsresult-form-wrapper .cmt-sboxsresult-cpt-select").change(function(){
		jQuery(".cmt-sboxsresult-form-wrapper form.search-form input[name='post_type']").val( jQuery(this).val() );
	});

	// Submit the form
	jQuery(".cmt-sboxsresult-form-wrapper .cmt-sboxsresult-form-sbtbtn").on('click', function(){
		jQuery(".cmt-sboxsresult-form-wrapper form.search-form").submit();
	});

}

/*------------------------------------------------------------------------------*/
/* Function to Set Blog Masonry view
/*------------------------------------------------------------------------------*/
function cymolthemes_blogmasonry(){
	if( jQuery().isotope ){
		if( jQuery('#content.cymolthemes-blog-col-page').length > 0 ){
			
			jQuery('#content.cymolthemes-blog-col-page').masonry();
			jQuery('#content.cymolthemes-blog-col-page').isotope({
					itemSelector: '.post-box',
					masonry: {
							
					},
					sortBy : 'original-order'
			});
		}
	}
}

/*------------------------------------------------------------------------------*/
/* Function to set margin bottom for sticky footer
/*------------------------------------------------------------------------------*/
function cymolthemes_stickyFooter(){
	if( jQuery('body').hasClass('cymolthemes-sticky-footer')){
		jQuery('div#content-wrapper').css( 'marginBottom', jQuery('footer#colophon').height() );
	}
}

/*------------------------------------------------------------------------------*/
/* Function to add class to select box if default option selected
/*------------------------------------------------------------------------------*/
function setEmptySelectBox(element){
	if(jQuery(element).val() == ""){
		jQuery(element).addClass("empty");
	} else {
		jQuery(element).removeClass("empty");
	}
}

function cymolthemes_hide_togle_link(){
	if( jQuery('#navbar div.mega-menu-wrap ul.mega-menu').length > 0 ){
		jQuery('h3.menu-toggle').css('display','none');
	}
}

/*------------------------------------------------------------------------------*/
/* Google Map in Header area
/*------------------------------------------------------------------------------*/
function cymolthemes_reset_gmap(){
	jQuery('.cymolthemes-fbar-box-w > div > aside').each(function(){
		var mainthis = jQuery(this);
		jQuery( 'iframe[src^="https://www.google.com/maps/"], iframe[src^="http://www.google.com/maps/"]',mainthis ).each(function(){
			if( !jQuery(this).hasClass('cymolthemes-set-gmap') ){
				jQuery(this).attr('src',jQuery(this).attr('src')+'');
				jQuery(this).load(function(){
					jQuery(this).addClass('cymolthemes-set-gmap').animate({opacity: 1 }, 1000 );
				});	

			}
		})
	});
}

function cymolthemes_hide_gmap(){
	jQuery('.cymolthemes-fbar-box-w > div > aside').each(function(){
		var mainthis = jQuery(this);
		jQuery( 'iframe[src^="https://www.google.com/maps/"], iframe[src^="http://www.google.com/maps/"]',mainthis ).each(function(){
			if( !jQuery(this).hasClass('cymolthemes-set-gmap') ){
				jQuery(this).css({opacity: 0});				
				jQuery(this).css('display', 'block');
			}
		})
	});
}	
	
function cymolthemes_isotope() {
	jQuery('.cymolthemes-boxes-sortable-yes,.cymolthemes-sortable-yes').each(function(){	
		var gallery_item = jQuery('.cymolthemes-boxes-row-wrapper', this );
		var filterLinks  = jQuery('.cmt-sortable-wrapper a', this );			
		gallery_item.isotope({
			animationEngine : 'best-available'
		})
		filterLinks.on('click', function(e){
			var selector = jQuery(this).attr('data-filter');
			gallery_item.isotope({
				filter : selector,
				itemSelector : '.isotope-item'
			});

			filterLinks.removeClass('selected');
			jQuery('#filter-by li').removeClass('current-cat');
			jQuery(this).addClass('selected');
			e.preventDefault();
		});
		
	});
};


function devfox_circle_progress_counter(){

	jQuery('.cmt-round-box').each(function(){
		var circle_box = jQuery(this);
		
		// Circlebox settings
		var fill_val       = circle_box.data('fill');
		var emptyFill_val  = circle_box.data('emptyfill');
		var thickness_val  = circle_box.data('thickness');
		var fill_gradient  = circle_box.data('gradient');
		var startangle_val = (-Math.PI / 4 * 1.5);
		
		// Gradient settings
		if( fill_gradient!='' ){
			fill_gradient = fill_gradient.split('|');
			fill_val = {gradient: [ fill_gradient[0], fill_gradient[1] ]};
		}
		
		if( typeof jQuery.fn.circleProgress == "function" ){
			var digit   = circle_box.data('digit');
			var before  = circle_box.data('before');
			var after   = circle_box.data('after');
			var digit       = Number( digit );
			var short_digit = ( digit/100 );
			var size_val	= circle_box.data('size');
			
			jQuery('.cmt-round', circle_box ).circleProgress({
				value: 0,
				size: size_val,
				startAngle: startangle_val,
				thickness: thickness_val,
				emptyFill: emptyFill_val,
				fill: fill_val
			}).on('circle-animation-progress', function(event, progress, stepValue) {
				circle_box.find('.cmt-fid-number').html( before + Math.round( stepValue*100 ) + after );
			});
		}
		
		circle_box.waypoint(function(direction) {
			if( !circle_box.hasClass('completed') ){				
				// Re draw when view
				if( typeof jQuery.fn.circleProgress == "function" ){
					jQuery('.cmt-round', circle_box ).circleProgress( { value: short_digit } );
				};
				circle_box.addClass('completed');
			}
		}, { offset:'90%' });
			
	});
}


/******************************/

jQuery( document ).ready(function($) {
	
	"use strict";
	
	cymolthemes_hide_gmap();

	
	/*------------------------------------------------------------------------------*/
	/* Add plus icon in nav menu
	/*------------------------------------------------------------------------------*/ 
		
	jQuery('#site-header-menu #site-navigation div.nav-menu > ul > li:has(ul), .cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap > ul > li:has(ul)').append("<span class='righticon'><i class='cmt-devfox-icon-angle-down'></i></span>");	
		
	jQuery('.cmt-mmmenu-override-yes #site-navigation .mega-menu-wrap > ul > li.menu-item-language ul').addClass("mega-sub-menu");		
	jQuery('.cmt-mmmenu-override-yes #navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal > li.menu-item-language > a').show();
	jQuery('.cmt-mmmenu-override-yes #site-navigation .mega-menu-wrap > ul > li.menu-item-language').hover(
         function () {			 		 
		   jQuery('.cmt-mmmenu-override-yes #navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-menu-flyout .mega-sub-menu').css("display", "none");	
           jQuery(this).find('ul').show();		   
         }, 
         function () {
           jQuery(this).find('ul').hide();
         }
     );
	
	
	jQuery('.menu li.current-menu-item').parents('li.mega-menu-megamenu').addClass('mega-current-menu-ancestor');	
	if (!jQuery('body').hasClass("cmt-header-invert")) {	
			
		jQuery( ".nav-menu ul:not(.children,.sub-menu) > li:eq(-2), #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li:eq(-2)" ).addClass( "lastsecond" );
		jQuery( ".nav-menu ul:not(.children,.sub-menu) > li:eq(-1), #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li:eq(-1)" ).addClass( "last" );	
	}
		
	/*------------------------------------------------------------------------------*/
	/* Responsive Menu
	/*------------------------------------------------------------------------------*/
	jQuery('.righticon').on('click', function() {
		if(jQuery(this).siblings('.sub-menu, .children, .mega-sub-menu').hasClass('open')){
			jQuery(this).siblings('.sub-menu, .children, .mega-sub-menu').removeClass('open');
			jQuery( 'i', jQuery(this) ).removeClass('cmt-devfox-icon-angle-up').addClass('cmt-devfox-icon-angle-down');
		} else {
			jQuery(this).siblings('.sub-menu, .children, .mega-sub-menu').addClass('open');			
			jQuery( 'i', jQuery(this) ).removeClass('cmt-devfox-icon-angle-down').addClass('cmt-devfox-icon-angle-up');
		}
		return false;
 	});
	
	
	/*------------------------------------------------------------------------------*/
	/* adding prettyPhoto in Gallery
	/*------------------------------------------------------------------------------*/
	jQuery("a[data-gal^='prettyPhoto']").prettyPhoto({hook: 'data-gal'});
		
	/*------------------------------------------------------------------------------*/
	/* Revolution Slider - Removing extra margin for no slider message
	/*------------------------------------------------------------------------------*/
	jQuery( ".cymolthemes-slider-wrapper > div > div > div:contains('Revolution Slider Error')" ).css( "margin-top", "0" );
		
	
	/*------------------------------------------------------------------------------*/
	/* Select2 library for all SELECT element
	/*------------------------------------------------------------------------------*/
	jQuery('select').select2();
	
	
	
	devfox_circle_progress_counter();	
	 
	/*------------------------------------------------------------------------------*/
	/* Social icon
	/*------------------------------------------------------------------------------*/ 
	
	jQuery(".cymolthemes-row-fullwidth-true.full-colum-height-widht > .grid_section > .vc_column_container img.vc_single_image-img").each(function() {  
       var imgsrc = jQuery(this).attr("src");
	   jQuery(this).parent().parent().parent().parent().parent('.vc_column_container').css('background-image', 'url(' + imgsrc + ')');       
  	});	
			
		
			 	
	 /*------------------------------------------------------------------------------*/
	 /* Applying prettyPhoto to all images
	 /*------------------------------------------------------------------------------*/
	if( typeof jQuery.fn.prettyPhoto == "function" ){
				
		// Gallery
		jQuery('div.gallery a[href*=".jpg"], div.gallery a[href*=".jpeg"], div.gallery a[href*=".png"], div.gallery a[href*=".gif"]').each(function(){
			if( jQuery(this).attr('target')!='_blank' ){
				jQuery(this).attr('rel','prettyPhoto[wp-gallery]');
			}
		});
		
		// WordPress Gallery
		jQuery('.gallery-item a[href*=".jpg"], .gallery-item a[href*=".jpeg"], .gallery-item a[href*=".png"], .gallery-item a[href*=".gif"]').each(function(){
			if( jQuery(this).attr('target')!='_blank' ){
				jQuery(this).attr('rel','prettyPhoto[coregallery]');
			}
		});
		
		// Normal link
		jQuery('a[href*=".jpg"], a[href*=".jpeg"], a[href*=".png"], a[href*=".gif"]').each(function(){
			if( jQuery(this).attr('target')!='_blank' && !jQuery(this).hasClass('prettyphoto') ){
				var attr = $(this).attr('rel');
				if (typeof attr !== typeof undefined && attr !== false && attr!='prettyPhoto' ) {
					jQuery(this).attr('data-rel','prettyPhoto');
				}
			}
		});		

		jQuery('a[data-rel^="prettyPhoto"]').prettyPhoto();
		jQuery('a.cmt_prettyphoto').prettyPhoto();
		jQuery('a[rel^="prettyPhoto"]').prettyPhoto();

		
		/*------------------------------------------------------------------------------*/
		/* Settting for lightbox content in Portfolio slider
		/*------------------------------------------------------------------------------*/
		jQuery("a.cymolthemes-open-gallery").on('click', function(){
			var id   = jQuery(this).data('id');
			var currid = window[ 'api_images_' + id ];
			jQuery.prettyPhoto.open( window[ 'api_images_' + id ] , window[ 'api_titles_' + id ] , window[ 'api_desc_' + id ] );
		});
		
	}

	/*------------------------------------------------------------------------------*/
	/* Animation on scroll: Number rotator
	/*------------------------------------------------------------------------------*/
	$("[data-appear-animation]").each(function() {
		var self      = $(this);
		var animation = self.data("appear-animation");
		var delay     = (self.data("appear-animation-delay") ? self.data("appear-animation-delay") : 0);
		
		if( $(window).width() > 959 ) {
			self.html('0');
			self.waypoint(function(direction) {
				if( !self.hasClass('completed') ){
					var from     = self.data('from');
					var to       = self.data('to');
					var interval = self.data('interval');
					self.numinate({
						format: '%counter%',
						from: from,
						to: to,
						runningInterval: 2000,
						stepUnit: interval,
						onComplete: function(elem) {
							self.addClass('completed');
						}
					});
				}
			}, { offset:'85%' });
		} else {
			if( animation == 'animateWidth' ) {
				self.css('width', self.data("width"));
			}
		}
	});

	/*------------------------------------------------------------------------------*/
	/* Set height of boxes inside row-column view of Blog and Portfolio
	/*------------------------------------------------------------------------------*/
	if( jQuery('.cymolthemes-testimonial-box' ).length > 0 ){
		setHeight('.cymolthemes-testimonial-box.col-lg-6.col-sm-6.col-md-6');
		setHeight('.cymolthemes-testimonial-box.col-lg-4.col-sm-6.col-md-4');
		setHeight('.cymolthemes-testimonial-box.col-lg-3.col-sm-6.col-md-3');
	}
	
	/*------------------------------------------------------------------------------*/
	/* Sticky
	/*------------------------------------------------------------------------------*/
	if( jQuery('.cmt-sboxstickable-header').length > 0 ){		

		cymolthemes_sticky();
	}	

	/*------------------------------------------------------------------------------*/
	/* Return Fasle when # Url
	/*------------------------------------------------------------------------------*/
	$('#site-navigation a[href="#"]').on('click', function(){return false;});
	
	
	/*------------------------------------------------------------------------------*/
	/* Welcome bar close button
	/*------------------------------------------------------------------------------*/
	$(".cymolthemes-close-icon").on('click', function(){
		$("#page").css('padding-top', (parseInt($("#page").css('padding-top')) - parseInt($(".cymolthemes-wbar").height()) ) + 'px' );
		$(".cymolthemes-wbar").slideUp();
		cymolthemes_setCookie('kw_hidewbar','1',1);
	});

	/*------------------------------------------------------------------------------*/
	/* Removing BR tag added by shortcode generator
	/*------------------------------------------------------------------------------*/
	var galleryHTML = jQuery(".gallery-size-full br").each(function(){
		jQuery(this).remove();
	});	

	/*------------------------------------------------------------------------------*/
	/* Settting for lightbox content in Blog
	/*------------------------------------------------------------------------------*/
	jQuery("a.cymolthemes-open-gallery").on('click', function(){
		var href   = jQuery(this).attr('href');
		var id     = href.replace("#cymolthemes-embed-code-", "");
		var currid = window[ 'api_images_' + id ];
		jQuery.prettyPhoto.open( window[ 'api_images_' + id ] , window[ 'api_titles_' + id ] , window[ 'api_desc_' + id ] );
	});
			
	/*-----------------------------------------------------------------------------------*/
	/*	Isotope
	/*-----------------------------------------------------------------------------------*/
	if( jQuery().isotope ){
		jQuery(window).load(function () {
			"use strict";
			cymolthemes_isotope();		
		});
		jQuery(window).resize(function(){
			cymolthemes_isotope();
		});
	}
	
	
	/*------------------------------------------------------------------------------*/
	/* Sticky Footer
	/*------------------------------------------------------------------------------*/
	jQuery('footer#colophon').resize(function(){
		cymolthemes_stickyFooter();
	});
	cymolthemes_stickyFooter();	
	
	/*------------------------------------------------------------------------------*/
	/* Equal Height Div load
	/*------------------------------------------------------------------------------*/	
	equalheight('.cmt-sboxequalheightdiv  .wpb_column.vc_column_container');
	
	cymolthemes_hide_togle_link();
	
	jQuery( "#cmt-sboxheader-slider > div > div:contains('Revolution Slider Error')" ).css( "margin", "auto" );
	
	/*------------------------------------------------------------------------------*/
	/*  Timeline view
	/*------------------------------------------------------------------------------*/	
	
		$.fn.smTimeline = function( option, value ) {
			jQuery( this ).each( function() {
				var $sm_timeline = jQuery( this );
				
				var is_mobile_view = jQuery( window ).width() < 768;
				$sm_timeline.find( '.timeline-element' ).each( function() {
					var $this = jQuery( this );
					var $timeline_spine = $this.find( '.cmt-sboxtimeline-spine' );
					if ( is_mobile_view ) {
						$this.addClass( 'wow fadeInUp' );
						$timeline_spine.attr( 'style', '' );
					} else {
						if ( $this.hasClass( 'left-side' ) ) {
							$this.find( '.cmt-sboxanimation-wrap' ).addClass( 'wow fadeInLeft' );
						} else if ( $this.hasClass( 'right-side' ) ) {
							$this.find( '.cmt-sboxanimation-wrap' ).addClass( 'wow fadeInRight' );
						}
						
						if ( $this.next().length == 0 ) return;
						var $next = $this.next();
						var $next_tl_spine = $next.find( '.cmt-sboxtimeline-spine' );
						
						if ( $next.hasClass( 'cmt-sboxdate-separator' ) ) {
							$timeline_spine.height( $next.offset().top - $timeline_spine.offset().top - 5 );					
						} else if ( $next_tl_spine.length ) {							
							$timeline_spine.height( $next_tl_spine.offset().top - $timeline_spine.offset().top - 25 );
						} 
					}
				} );
			} );
		}
	
	
	/* ***************** */
	/*  Carousel effect  */
	/* ***************** */

	jQuery('.cymolthemes-boxes-view-carousel').each(function(){
		var thisElement = jQuery(this);

		// Column
		var cmt_column         = 3;
		var cmt_slidestoscroll = 3;
		
		var cmt_slidestoscroll_1200 = 3;
		var cmt_slidestoscroll_992  = 2;
		var cmt_slidestoscroll_768  = 2;
		var cmt_slidestoscroll_574  = 1;
		var cmt_slidestoscroll_0    = 1;
		if( jQuery(this).data('cmt-slidestoscroll')=='1' ){  // slides to scroll
			var cmt_slidestoscroll      = 1;
			var cmt_slidestoscroll_1200 = 1;
			var cmt_slidestoscroll_992  = 1;
			var cmt_slidestoscroll_768  = 1;
			var cmt_slidestoscroll_574  = 1;
			var cmt_slidestoscroll_0    = 1;
		}		
		
		// responsive
		var cmt_responsive = [
			{ breakpoint: 1200, settings: {
				slidesToShow  : 3,
				slidesToScroll: cmt_slidestoscroll_1200
			} },
			{ breakpoint: 992, settings: {
				slidesToShow  : 2,
				slidesToScroll: cmt_slidestoscroll_992
			} },
			{ breakpoint: 768, settings: {
				slidesToShow  : 2,
				slidesToScroll: cmt_slidestoscroll_768
			} },
			{ breakpoint: 574, settings: {
				slidesToShow  : 1,
				slidesToScroll: cmt_slidestoscroll_574
			} },
			{ breakpoint: 0, settings: {
				slidesToShow  : 1,
				slidesToScroll: cmt_slidestoscroll_0
			} }
		];
								
		if( jQuery(this).hasClass('cymolthemes-boxes-col-three') ){
			cmt_column         = 3;
			cmt_slidestoscroll = 3;
			
			var cmt_slidestoscroll_1200 = 3;
			var cmt_slidestoscroll_992 	= 2;
			var cmt_slidestoscroll_768  = 2;
			var cmt_slidestoscroll_574  = 1;
			var cmt_slidestoscroll_0    = 1;
			if( jQuery(this).data('cmt-slidestoscroll')=='1' ){  // slides to scroll
				var cmt_slidestoscroll      = 1;
				var cmt_slidestoscroll_1200 = 1;
				var cmt_slidestoscroll_992  = 1;
				var cmt_slidestoscroll_768  = 1;
				var cmt_slidestoscroll_574  = 1;
				var cmt_slidestoscroll_0    = 1;
			}
			
			cmt_responsive     = [
				{ breakpoint: 1200, settings: {
					slidesToShow  : 3,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: cmt_slidestoscroll_1200,
				} },
				{ breakpoint: 992, settings: {
					slidesToShow  : 2,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: cmt_slidestoscroll_992
				} },
				{ breakpoint: 768, settings: {
					slidesToShow  : 2,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: cmt_slidestoscroll_768
				} },
				{ breakpoint: 574, settings: {
					slidesToShow  : 1,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: cmt_slidestoscroll_574
				} },
				{ breakpoint: 0, settings: {
					slidesToShow  : 1,
					slidesToScroll: cmt_slidestoscroll_0
				} }
			];
		
		} else if( jQuery(this).hasClass('cymolthemes-boxes-col-one') ){
		
			cmt_column         = 1;
			cmt_slidestoscroll = 1;
			
			cmt_responsive     = [
				{ breakpoint: 1200, settings: {
					slidesToShow  : 1,
					slidesToScroll: 1,
					centerMode: false,
					centerPadding: '0px',
					arrows: true
				} },
				{ breakpoint: 768, settings: {
					slidesToShow  : 1,
					slidesToScroll: 1,
					centerMode: false,
					centerPadding: '0px',
					arrows: true
				} },
				{ breakpoint: 574, settings: {
					slidesToShow  : 1,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: 1
				} },
				{ breakpoint: 0, settings: {
					slidesToShow  : 1,
					slidesToScroll: 1
				} }
			];
			
		} else if( jQuery(this).hasClass('cymolthemes-boxes-col-two') ){
			cmt_column         = 2;
			cmt_slidestoscroll = 2;
			
			var cmt_slidestoscroll_1200 = 2;
			var cmt_slidestoscroll_768  = 2;
			var cmt_slidestoscroll_574  = 1;
			var cmt_slidestoscroll_0    = 1;
			if( jQuery(this).data('cmt-slidestoscroll')=='1' ){  // slides to scroll
				var cmt_slidestoscroll      = 1;
				var cmt_slidestoscroll_1200 = 1;
				var cmt_slidestoscroll_768  = 1;
				var cmt_slidestoscroll_574  = 1;
				var cmt_slidestoscroll_0    = 1;
			}
			
			cmt_responsive     = [
				{ breakpoint: 1200, settings: {
					slidesToShow  : 2,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: cmt_slidestoscroll_1200
				} },
				{ breakpoint: 768, settings: {
					slidesToShow  : 2,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: cmt_slidestoscroll_768
				} },
				{ breakpoint: 574, settings: {
					slidesToShow  : 1,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: cmt_slidestoscroll_574
				} },
				{ breakpoint: 0, settings: {
					slidesToShow  : 1,
					slidesToScroll: cmt_slidestoscroll_0
				} }
			];
		
		} else if( jQuery(this).hasClass('cymolthemes-boxes-col-four') ){
			cmt_column         = 4;
			cmt_slidestoscroll = 4;
			
			var cmt_slidestoscroll_1200 = 4;
			var cmt_slidestoscroll_992  = 3;
			var cmt_slidestoscroll_768  = 2;
			var cmt_slidestoscroll_574  = 1;
			var cmt_slidestoscroll_0    = 1;
			if( jQuery(this).data('cmt-slidestoscroll')=='1' ){  // slides to scroll
				var cmt_slidestoscroll      = 1;
				var cmt_slidestoscroll_1200 = 1;
				var cmt_slidestoscroll_992  = 1;
				var cmt_slidestoscroll_768  = 1;
				var cmt_slidestoscroll_574  = 1;
				var cmt_slidestoscroll_0    = 1;
			}
			
			cmt_responsive     = [
				{ breakpoint: 1200, settings: {
					slidesToShow  : 4,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: cmt_slidestoscroll_1200
				} },
				{ breakpoint: 992, settings: {
					slidesToShow  : 3,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: cmt_slidestoscroll_992
				} },
				{ breakpoint: 768, settings: {
					slidesToShow  : 2,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: cmt_slidestoscroll_768
				} },
				{ breakpoint: 574, settings: {
					slidesToShow  : 1,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: cmt_slidestoscroll_574
				} },
				{ breakpoint: 0, settings: {
					slidesToShow  : 1,
					slidesToScroll: cmt_slidestoscroll_0
				} }
			];			
			
		} else if( jQuery(this).hasClass('cymolthemes-boxes-col-five') ){
			cmt_column         = 5;
			cmt_slidestoscroll = 5;
			
			var cmt_slidestoscroll_1200 = 3;
			var cmt_slidestoscroll_768  = 3;
			var cmt_slidestoscroll_574  = 1;
			var cmt_slidestoscroll_0    = 1;
			if( jQuery(this).data('cmt-slidestoscroll')=='1' ){  // slides to scroll
				var cmt_slidestoscroll      = 1;
				var cmt_slidestoscroll_1200 = 1;
				var cmt_slidestoscroll_768  = 1;
				var cmt_slidestoscroll_574  = 1;
				var cmt_slidestoscroll_0    = 1;
			}
			
			cmt_responsive     = [
				{ breakpoint: 1200, settings: {
					slidesToShow  : 3,
					slidesToScroll: cmt_slidestoscroll_1200,
					centerMode: false,
					centerPadding: '0px'
				} },
				{ breakpoint: 768, settings: {
					slidesToShow  : 2,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: cmt_slidestoscroll_768
				} },
				{ breakpoint: 574, settings: {
					slidesToShow  : 1,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: cmt_slidestoscroll_574
				} },
				{ breakpoint: 0, settings: {
					slidesToShow  : 1,
					slidesToScroll: cmt_slidestoscroll_0
				} }
			];
			
		} else if( jQuery(this).hasClass('cymolthemes-boxes-col-six') ){
			cmt_column         = 6;
			cmt_slidestoscroll = 6;
			
			var cmt_slidestoscroll_1200 = 6;
			var cmt_slidestoscroll_992  = 4;
			var cmt_slidestoscroll_768  = 3;
			var cmt_slidestoscroll_574  = 1;
			var cmt_slidestoscroll_0    = 1;
			if( jQuery(this).data('cmt-slidestoscroll')=='1' ){  // slides to scroll
				var cmt_slidestoscroll      = 1;
				var cmt_slidestoscroll_1200 = 1;
				var cmt_slidestoscroll_768  = 1;
				var cmt_slidestoscroll_574  = 1;
				var cmt_slidestoscroll_0    = 1;
			}
			
			cmt_responsive     = [
				{ breakpoint: 1200, settings: {
					slidesToShow  : 5,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: cmt_slidestoscroll_1200
				} },
				{ breakpoint: 992, settings: {
					slidesToShow  : 4,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: cmt_slidestoscroll_992
				} },
				{ breakpoint: 768, settings: {
					slidesToShow  : 3,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: cmt_slidestoscroll_768
				} },
				{ breakpoint: 574, settings: {
					slidesToShow  : 1,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: cmt_slidestoscroll_574
				} },
				{ breakpoint: 0, settings: {
					slidesToShow  : 1,
					slidesToScroll: cmt_slidestoscroll_0
				} }
			];
		}		
				
		// Fade effect
		var cmt_fade = false;
		if( jQuery(this).data('cmt-effecttype')=='fade' ){
			cmt_fade = true;
		}
		

		// Transaction Speed
		var cmt_speed = 800;
		if( jQuery.trim( jQuery(this).data('cmt-speed') ) != '' ){
			cmt_speed = jQuery.trim( jQuery(this).data('cmt-speed') );
		}
		
		// Autoplay
		var cmt_autoplay = false;
		if( jQuery(this).data('cmt-autoplay')=='1' ){
			cmt_autoplay = true;
		}
		
		// Autoplay Speed
		var cmt_autoplayspeed = 2000;
		if( jQuery.trim( jQuery(this).data('cmt-autoplayspeed') ) != '' ){
			cmt_autoplayspeed = jQuery.trim( jQuery(this).data('cmt-autoplayspeed') );
		}
		
		// Loop
		var cmt_loop = false;
		if( jQuery.trim( jQuery(this).data('cmt-loop') ) == '1' ){
			cmt_loop = true;
		}
		
		// Dots
		var cmt_dots = false;
		if( jQuery.trim( jQuery(this).data('cmt-dots') ) == '1' ){
			cmt_dots = true;
		}
		
		// Next / Prev navigation
		var cmt_nav = false;
		if( jQuery.trim( jQuery(this).data('cmt-nav') ) == '1' || jQuery.trim( jQuery(this).data('cmt-nav') ) == 'above' || jQuery.trim( jQuery(this).data('cmt-nav') ) == 'below' ){
			cmt_nav = true;
		}
		
		// Center mode
		var cmt_centermode = false;
		if( jQuery.trim( jQuery(this).data('cmt-centermode') ) == '1' ){
			cmt_centermode = true;
		}
		
		// Center padding
		var cmt_centerpadding = 800;
		if( jQuery.trim( jQuery(this).data('cmt-centerpadding') ) != '' ){
			var cmt_centerpadding = jQuery.trim( jQuery(this).data('cmt-centerpadding') );
		}
		
		// Pause on Focus
		var cmt_pauseonfocus = false;
		if( jQuery.trim( jQuery(this).data('cmt-pauseonfocus') ) == '1' ){
			cmt_pauseonfocus = true;
		}
		
		// Pause on Hover
		var cmt_pauseonhover = false;
		if( jQuery.trim( jQuery(this).data('cmt-pauseonhover') ) == '1' ){
			cmt_pauseonhover = true;
		}
		
		
		// RTL
		var cmt_rtl = false;
		if( jQuery('body').hasClass('rtl') ){
			cmt_rtl = true;
		}
		
		jQuery('.cymolthemes-boxes-row-wrapper > div', this).removeClass (function (index, css) {
			return (css.match (/(^|\s)col-\S+/g) || []).join(' ');
		});
	
		jQuery('.cymolthemes-boxes-row-wrapper', this).not('.slick-initialized').slick({
			fade             : cmt_fade,
			speed            : cmt_speed,
			centerMode       : cmt_centermode,
			centerPadding    : cmt_centerpadding+'px',
			pauseOnFocus     : cmt_pauseonfocus,
			pauseOnHover     : cmt_pauseonhover,
			slidesToShow     : cmt_column,
			slidesToScroll   : cmt_slidestoscroll,
			autoplay         : cmt_autoplay,
			autoplaySpeed    : cmt_autoplayspeed,
			rtl              : cmt_rtl,
			dots             : cmt_dots,
			pauseOnDotsHover : false,
			arrows           : cmt_nav,
			adaptiveHeight   : false,
			infinite         : cmt_loop,
			responsive       : cmt_responsive
  
		});
	});
		
	
	// Next button in heading area
	jQuery(".cmt-slick-arrow.cmt-slick-next", this ).on('click', function(){
		jQuery('.cymolthemes-boxes-row-wrapper', jQuery(this).closest('.cymolthemes-boxes-view-carousel') ).slick('slickNext');
	});
	
	// Pre button in heading area
	jQuery(".cmt-slick-arrow.cmt-sboxslick-prev", this).on('click', function(){
		jQuery('.cymolthemes-boxes-row-wrapper', jQuery(this).closest('.cymolthemes-boxes-view-carousel') ).slick('slickPrev');
	});	
	
	// Testimonials Slick view
	jQuery('.cymolthemes-boxes-view-slickview,.cymolthemes-boxes-view-slickview-leftimg').each(function(){

		// Fade effect
		var cmt_fade = false;
		if( jQuery(this).data('cmt-effecttype')=='fade' ){
			cmt_fade = true;
		}
		
		// Transaction Speed
		var cmt_speed = 800;
		if( jQuery.trim( jQuery(this).data('cmt-speed') ) != '' ){
			cmt_speed = jQuery.trim( jQuery(this).data('cmt-speed') );
		}
		
		// Autoplay
		var cmt_autoplay = false;
		if( jQuery(this).data('cmt-autoplay')=='1' ){
			cmt_autoplay = true;
		}
		
		// Autoplay Speed
		var cmt_autoplayspeed = 2000;
		if( jQuery.trim( jQuery(this).data('cmt-autoplayspeed') ) != '' ){
			cmt_autoplayspeed = jQuery.trim( jQuery(this).data('cmt-autoplayspeed') );
		}
		
		// Loop
		var cmt_loop = false;
		if( jQuery.trim( jQuery(this).data('cmt-loop') ) == '1' ){
			cmt_loop = true;
		}
		
		// Dots
		var cmt_dots = false;
		if( jQuery.trim( jQuery(this).data('cmt-dots') ) == '1' ){
			cmt_dots = true;
		}
		
		// Next / Prev navigation
		var cmt_nav = false;
		if( jQuery.trim( jQuery(this).data('cmt-nav') ) == '1' ){
			cmt_nav = true;
		}
		
	
		var testinav 	= jQuery('.testimonials-nav', this);
		var testiinfo 	= jQuery('.testimonials-info', this);
		
		/* Options for "Owl Carousel 2"
		 * http://owlcarousel.owlgraphic.com/index.html
		 */
		var rtloption = false;
		if( jQuery('body').hasClass('rtl') ){
			rtloption = true;
		}
		
		// Info
		jQuery('.testimonials-info', this).not('.slick-initialized').slick({
			fade			: cmt_fade,
			//arrows			: cmt_nav,
			arrows			: true,
			asNavFor		: testinav,
			adaptiveHeight	: true,
			speed			: cmt_speed,
			autoplay		: cmt_autoplay,
			autoplaySpeed	: cmt_autoplayspeed,
			infinite		: cmt_loop,
			rtl             : rtloption
		});
		// Navigation
	   jQuery('.testimonials-nav', this).not('.slick-initialized').slick({
			slidesToShow	: 1,
			asNavFor		: testiinfo,
			centerMode		: true,
			centerPadding	: 0,
			focusOnSelect	: true,
			autoplay		: cmt_autoplay,
			autoplaySpeed	: cmt_autoplayspeed,
			speed			: cmt_speed,
			arrows			: cmt_nav,
			//arrows			: true,
			dots			: cmt_dots,
			variableWidth	: true,
			infinite		: cmt_loop,
			rtl             : rtloption
		});
	});	
	
	/*------------------------------------------------------------------------------*/
	/* One Page setting
	/*------------------------------------------------------------------------------*/	
	if( jQuery('body').hasClass('cymolthemes-one-page-site') ){
		var sections = jQuery('.cmt-row, #cmt-sboxheader-slider'),
		nav          = jQuery('.mega-menu-wrap, div.nav-menu'),
		nav_height   = jQuery('#site-navigation').data('sticky-height')-1;
		
		jQuery(window).on('scroll', function () {
			
			// active first menu
			if( jQuery('body').scrollTop() < 5 ){
				nav.find('a').parent().removeClass('mega-current-menu-item mega-current_page_item current-menu-ancestor current-menu-item current_page_item');						
				nav.find('a[href="#cmt-home"]').parent().addClass('mega-current-menu-item mega-current_page_item current-menu-ancestor current-menu-item current_page_item');
			}			
				
				var cur_pos = jQuery(this).scrollTop(); 
				sections.each(function() {
					
					var top = jQuery(this).offset().top - (nav_height+2),
					bottom = top + jQuery(this).outerHeight(); 
		
					if (cur_pos >= top && cur_pos <= bottom) {

						if( typeof jQuery(this) != 'undefined' && typeof jQuery(this).attr('id')!='undefined' && jQuery(this).attr('id')!='' ){
							
							var mainThis = jQuery(this);							
							nav.find('a').removeClass('mega-current-menu-item mega-current_page_item current-menu-ancestor current-menu-item current_page_item');						
							jQuery(this).addClass('mega-current-menu-item mega-current_page_item current-menu-ancestor current-menu-item current_page_item');
							var arr = mainThis.attr('id');							
							
							// Applying active class
							nav.find('a').parent().removeClass('mega-current-menu-item mega-current_page_item current-menu-ancestor current-menu-item current_page_item');
							nav.find('a').each(function(){
								var menuAttr = jQuery(this).attr('href').split('#')[1];						
								if( menuAttr == arr ){
									jQuery(this).parent().addClass('mega-current-menu-item mega-current_page_item current-menu-ancestor current-menu-item current_page_item');
								}
							})
						
						}
					}
				});
			//}
		});
		
		nav.find('a').on('click', function () {
			var $el = jQuery(this), 
			id = $el.attr('href');
			var arr=id.split('#')[1];	  
			jQuery('html, body').animate({
				scrollTop: jQuery('#'+ arr).offset().top - nav_height
			}, 500);  
			return false;
		});
		
	}
	
} ); // END of  document.ready

jQuery(window).load(function(){

	"use strict";
	
	/*------------------------------------------------------------------------------*/
	/* Flex Slider
	/*------------------------------------------------------------------------------*/
	if( jQuery('.cmt-sboxflexslider').length > 0 ){
		jQuery('.cmt-sboxflexslider').flexslider({
			animation   : "slide",
			controlNav  : true,			
			directionNav: false,
			start: function(){				
				if ( jQuery( '.cmt-sboxtimeline' ).length > 0 ) { jQuery( '.cmt-sboxtimeline' ).smTimeline(); }
			}
		});
	}
		
	/*------------------------------------------------------------------------------*/
	/* Hide pre-loader
	/*------------------------------------------------------------------------------*/
	function cymolthemes_preloader_fade_out(){ jQuery( '.cmt-sboxpage-loader-wrapper' ).fadeOut( 1000 ); }
	if ( jQuery( '.cmt-sboxpage-loader-wrapper' ).length > 0 ) {
		setTimeout(cymolthemes_preloader_fade_out, 100);
	}
				
	/*------------------------------------------------------------------------------*/
	/* Hide page-loader on load.
	/*------------------------------------------------------------------------------*/
	jQuery('#pageoverlay').fadeOut(500);
	
	/*------------------------------------------------------------------------------*/
	/* IsoTope
	/*------------------------------------------------------------------------------*/
	var $container = jQuery('.portfolio-wrapper');
	$container.isotope({
		filter: '*',
		animationOptions: {
			duration: 750,
			easing: 'linear',
			queue: false,
		}
	});
	jQuery('nav.portfolio-sortable-list ul li a').on('click', function(){
		var selector = jQuery(this).attr('data-filter');
		$container.isotope({
			filter: selector,
			animationOptions: {
				duration: 750,
				easing: 'linear',
				queue: false,
			}
		});
		// Selected class
		jQuery('nav.portfolio-sortable-list').find('a.selected').removeClass('selected');
		jQuery(this).addClass('selected'); 
		return false;
	});
	
	/*------------------------------------------------------------------------------*/
	/* Nivo Slider
	/*------------------------------------------------------------------------------*/
	if( jQuery('.cymolthemes-slider-wrapper .nivoSlider').length>0 ){
		jQuery('.cymolthemes-slider-wrapper .nivoSlider').nivoSlider();
	}
	
	/* Options for "Owl Carousel 2"
	 * http://owlcarousel.owlgraphic.com/index.html
	 */
	var rtloption = false;
	if( jQuery('body').hasClass('rtl') ){
		rtloption = true;
	}
	
	jQuery('.cmt-sboxslick-carousel').not('.slick-initialized').slick({
		autoplay: true,
		arrows  : false,
		dots    : true,
		rtl     : rtloption,
	});
	
	/*------------------------------------------------------------------------------*/
	/* Enables menu toggle for small screens.
	/*------------------------------------------------------------------------------*/ 
	 
	( function() {
		var nav = jQuery( '#site-navigation' ), button, menu;
		if ( ! nav )
			return;

		button = nav.find( '.menu-toggle' );
		if ( ! button )
			return;

		// Hide button if menu is missing or empty.
		menu = nav.find( '.nav-menu' );
		if ( ! menu || ! menu.children().length ) {
			button.hide();
			return;
		}

		jQuery( '.menu-toggle' ).on( 'click.devfox', function() {
			nav.toggleClass( 'toggled-on' );
		} );
	} )();
	
	/*------------------------------------------------------------------------------*/
	/* Responsive Menu : Open by clicking on the menu text too
	/*------------------------------------------------------------------------------*/
	jQuery('.righticon').each(function() {
		var mainele = this;
		if( jQuery( mainele ).prev().prev().length > 0 ){
			if( jQuery( mainele ).prev().prev().attr('href')=='#' ){
				jQuery( mainele ).prev().prev().on('click', function(){
					jQuery( mainele ).trigger( "click" );
				});
			}
		}
	});
	
	
	/*------------------------------------------------------------------------------*/
	/* Blog masonry view for 2, 3 and 4 columns
	/*------------------------------------------------------------------------------*/
	cymolthemes_blogmasonry();	

		jQuery(".cymolthemes-fbar-content-wrapper").perfectScrollbar({
			suppressScrollX:true,
			includePadding:true
		});
		
		jQuery(".header-style-one-vertical .cmt-header-box").perfectScrollbar({
			suppressScrollX:true,
			includePadding:true
		});

}); // END of window.load


/*------------------------------------------------------------------------------*/
/* Bg img class in section and column
/*------------------------------------------------------------------------------*/


 var cmt_bgimage_class = function() {
	jQuery('.elementor-section').each(function() {
		if( jQuery(this).css('background-image')!='' && jQuery(this).css('background-image')!='none' ){
			jQuery(this).addClass('cmt-bgimage-yes' ).removeClass('cmt-bgimage-no' );
		} else {
			jQuery(this).addClass('cmt-bgimage-no' ).removeClass('cmt-bgimage-yes' );
		}
	});
	jQuery('.elementor-column').each(function() {
		if( jQuery(this).children('.elementor-widget-wrap').children('.cmt-stretched-div').length ){
			if( jQuery(this).children('.elementor-widget-wrap').children('.cmt-stretched-div').css('background-image')!='' && jQuery(this).children('.elementor-widget-wrap').children('.cmt-stretched-div').css('background-image')!='none' ){
				jQuery(this).addClass('cmt-bgimage-yes' ).removeClass('cmt-bgimage-no' );
			} else {
				jQuery(this).addClass('cmt-bgimage-no' ).removeClass('cmt-bgimage-yes' );
			}
		} else {
			if( jQuery(this).children('.elementor-widget-wrap').css('background-image')!='' && jQuery(this).children('.elementor-widget-wrap').css('background-image')!='none' ){
				jQuery(this).addClass('cmt-bgimage-yes' ).removeClass('cmt-bgimage-no' );
			} else {
				jQuery(this).addClass('cmt-bgimage-no' ).removeClass('cmt-bgimage-yes' );
			}
		}
	});
};

/*------------------------------------------------------------------------------*/
/* Bg color class in section and column
/*------------------------------------------------------------------------------*/

var cmt_bgcolor_class = function() {
	jQuery('.elementor-section').each(function() {
		if( jQuery(this).css('background-color')!='' && jQuery(this).css('background-color')!='transparent' ){
			jQuery(this).addClass('cmt-bgcolor-yes');
		}
	});
	jQuery('.elementor-column').each(function() {
		if( jQuery(this).children('.cmt-stretched-div').length ){
			if( jQuery(this).children('.cmt-stretched-div').css('background-color')!='' && jQuery(this).children('.cmt-stretched-div').css('background-color')!='transparent' ){
				jQuery(this).addClass('cmt-bgcolor-yes' ).removeClass('cmt-bgcolor-no' );
			} else {
				jQuery(this).addClass('cmt-bgcolor-no' ).removeClass('cmt-bgcolor-yes' );
			}
		} else {
			if( jQuery(this).children('.elementor-widget-wrap').css('background-color')!='' && jQuery(this).children('.elementor-widget-wrap').css('background-color')!='transparent' ){
				jQuery(this).addClass('cmt-bgcolor-yes' ).removeClass('cmt-bgcolor-no' );
			} else {
				jQuery(this).addClass('cmt-bgcolor-no' ).removeClass('cmt-bgcolor-yes' );
			}
		}
	});
};


/*------------------------------------------------------------------------------*/
/* Stretch Column
/*------------------------------------------------------------------------------*/
	
var cmt_rearrange_stretched_col = function( model_id ) {
	if( jQuery('body').hasClass('elementor-editor-active') ){
		jQuery( '*[data-id="'+model_id+'"]' ).each(function(){
			jQuery('.cmt-stretched-div', this).remove();
			jQuery('.elementor-widget-wrap', this).removeAttr('style');
			setTimeout(function(){ cmt_stretched_col(); }, 50);
		});	
	}
}

var cmt_stretched_col = function() {

	jQuery('.elementor-section.elementor-top-section').each(function(){
		if( jQuery(this).hasClass('cmt-col-stretched-left') || jQuery(this).hasClass('cmt-col-stretched-right') || jQuery(this).hasClass('cmt-col-stretched-both') ){
			jQuery(this).addClass('cmt-col-stretched-yes').removeClass('cmt-col-stretched-no');
		} else {
			jQuery(this).addClass('cmt-col-stretched-no').removeClass('cmt-col-stretched-yes');
		}
	});

	// remove all stretched related changes in each column
	jQuery('.elementor-section.elementor-top-section').each(function(){
		var ThisSection = jQuery(this);
		var ThisColumn	= '';
		jQuery( '.elementor-column:not(.elementor-inner-column)', ThisSection ).each(function(){
			ThisColumn	= jQuery(this);
			jQuery( '.cmt-stretched-div', ThisColumn ).remove();
			ThisColumn.removeClass('cmt-col-stretched-yes cmt-col-stretched-left cmt-col-stretched-right cmt-col-stretched-content-yes');
		});
	});

	jQuery('.elementor-section.cmt-col-stretched-yes.elementor-top-section').each(function(){

		var ThisSection		= jQuery(this);
		var ThisColumn		= '';
		var ColWrapper		= '';
		var StretchedEle	= '';

		if( ThisSection.hasClass('cmt-col-stretched-left') || ThisSection.hasClass('cmt-col-stretched-both') ){
			ThisColumn = jQuery( '.elementor-column:not(.elementor-inner-column):first-child', ThisSection );
			
			if( jQuery('.cmt-stretched-div', ThisColumn).length==0 ){
				ColWrapper = ThisColumn.children('.elementor-widget-wrap');
				ColWrapper.prepend( '<div class="cmt-stretched-div"></div>' );

				// Stretched Element
				StretchedEle = ColWrapper.children('.cmt-stretched-div');

				StretchedEle.addClass( 'cmt-stretched-left' );
				ThisColumn.addClass('cmt-col-stretched-yes cmt-col-stretched-left');

				if( ThisSection.hasClass('cmt-left-col-stretched-content-yes') ){
					ThisColumn.addClass('cmt-col-stretched-content-yes');
				} else {
					ThisColumn.removeClass('cmt-col-stretched-content-yes');
				}

				// background move to stretched div
				ColWrapper.css('background-image', '');
				var bgImage =  ColWrapper.css('background-image');
				if( bgImage!='none' && bgImage!='' ){
					StretchedEle.css('background-image', bgImage );
					ColWrapper.css('background-image', 'none');
				}

				// Background Color
				var bgColor = ColWrapper.css('background-color');
				if( bgColor!='' ){
					StretchedEle.css('background-color', bgColor );
					ColWrapper.css('background-color', 'transparent');
				}

				// Background Position
				var bgPosition = ColWrapper.css('background-position');
				if( bgPosition!='' ){
					StretchedEle.css('background-position', bgPosition );
				}

				// Background Repeat
				var bgRepeat = ColWrapper.css('background-repeat');
				if( bgRepeat!='' ){
					StretchedEle.css('background-repeat', bgRepeat );
				}

				// Background Size
				var bgSize = ColWrapper.css('background-size');
				if( bgSize!='' ){
					StretchedEle.css('background-size', bgSize );
				}

				cmt_stretched_col_calc();

			}

		}

		if( ThisSection.hasClass('cmt-col-stretched-right') || ThisSection.hasClass('cmt-col-stretched-both') ){
			ThisColumn = jQuery( '.elementor-column:not(.elementor-inner-column):last-child', ThisSection );
	
			if( jQuery('.cmt-stretched-div', ThisColumn).length==0 ){
				ColWrapper = ThisColumn.children('.elementor-widget-wrap');
				ColWrapper.prepend( '<div class="cmt-stretched-div"></div>' );
	
				// Stretched Element
				StretchedEle = ColWrapper.children('.cmt-stretched-div');

				StretchedEle.addClass( 'cmt-stretched-right' );
				ThisColumn.addClass('cmt-col-stretched-yes cmt-col-stretched-right');

				if( ThisSection.hasClass('cmt-right-col-stretched-content-yes') ){
					ThisColumn.addClass('cmt-col-stretched-content-yes');
				} else {
					ThisColumn.removeClass('cmt-col-stretched-content-yes');
				}

				// background move to stretched div
				ColWrapper.css('background-image', '');
				var bgImage = ColWrapper.css('background-image');
				if( bgImage!='none' && bgImage!='' ){
					StretchedEle.css('background-image', bgImage );
					ColWrapper.css('background-image', 'none');
				}

				// Background Color
				var bgColor = ColWrapper.css('background-color');
				if( bgColor!='' ){
					StretchedEle.css('background-color', bgColor );
					ColWrapper.css('background-color', 'transparent');
				}

				// Background Position
				var bgPosition = ColWrapper.css('background-position');
				if( bgPosition!='' ){
					StretchedEle.css('background-position', bgPosition );
				}

				// Background Repeat
				var bgRepeat = ColWrapper.css('background-repeat');
				if( bgRepeat!='' ){
					StretchedEle.css('background-repeat', bgRepeat );
				}

				// Background Size
				var bgSize = ColWrapper.css('background-size');
				if( bgSize!='' ){
					StretchedEle.css('background-size', bgSize );
				}

				cmt_stretched_col_calc();

			}
		}

	});

};

var cmt_stretched_col_calc = function() {

	// padding left or right
	if( jQuery('.elementor-section.elementor-top-section > .elementor-container > .elementor-column.cmt-col-stretched-yes').length>0 ){

		// Returns width of browser viewport
		var window_width = jQuery( window ).width();

		// Returns width of HTML document
		var document_width = jQuery( document ).width();

		jQuery('.elementor-section.elementor-top-section > .elementor-container > .elementor-column.cmt-col-stretched-yes').each(function(){
	
			var this_ele    = jQuery(this);
			var curr_width  = jQuery(this).closest('.elementor-container').width();
			var extra_width = ((window_width - curr_width)/2);
			var parent_width = '';

			var position = 'left';
			if( jQuery(this).hasClass('cmt-col-stretched-right') ){
				position = 'right';
			}

			// set width to 100% if parent is 100%
			parent_width = jQuery('.elementor-widget-wrap', jQuery(this)).parent().width();
			if( parent_width == '100%' ){
				jQuery('.elementor-widget-wrap', jQuery(this)).css('width','100%');
			} else {
				jQuery('.elementor-widget-wrap', jQuery(this)).css('width','');
			}

			jQuery('.cmt-stretched-div', jQuery(this)).css( 'margin-'+position,'-'+extra_width+'px' );

			// stretched column content too
			if( jQuery(this).hasClass('cmt-col-stretched-content-yes') ){
				var stretched_width = jQuery('.cmt-stretched-div', jQuery(this) ).width();
				jQuery(this).children('.elementor-widget-wrap').css( 'margin-'+position,'-'+extra_width+'px' );
				jQuery(this).children('.elementor-widget-wrap').css( 'width', stretched_width+'px' );
			} else {
				jQuery(this).children('.elementor-widget-wrap').css( 'margin-'+position,'' );
				jQuery(this).children('.elementor-widget-wrap').css( 'width', '' );
			}
		});
	}

}

var cymolthemes_carousel = function() {
	jQuery('.cymolthemes-boxes-view-carousel').each(function(){
		
		var thisElement = jQuery(this);

		// Column
		var cmt_column         = 3;
		var cmt_slidestoscroll = 3;
		
		var cmt_slidestoscroll_1200 = 3;
		var cmt_slidestoscroll_992  = 3;
		var cmt_slidestoscroll_768  = 2;
		var cmt_slidestoscroll_479  = 1;
		var cmt_slidestoscroll_0    = 1;
		if( jQuery(this).data('cmt-slidestoscroll')=='1' ){  // slides to scroll
			var cmt_slidestoscroll      = 1;
			var cmt_slidestoscroll_1200 = 1;
			var cmt_slidestoscroll_992  = 1;
			var cmt_slidestoscroll_768  = 1;
			var cmt_slidestoscroll_479  = 1;
			var cmt_slidestoscroll_0    = 1;
		}		
		
		// responsive
		var cmt_responsive = [
			{ breakpoint: 1200, settings: {
				slidesToShow  : 3,
				slidesToScroll: cmt_slidestoscroll_1200
			} },
			{ breakpoint: 768, settings: {
				slidesToShow  : 2,
				slidesToScroll: cmt_slidestoscroll_768
			} },
			{ breakpoint: 574, settings: {
				slidesToShow  : 1,
				slidesToScroll: cmt_slidestoscroll_479
			} },
			{ breakpoint: 0, settings: {
				slidesToShow  : 1,
				slidesToScroll: cmt_slidestoscroll_0
			} }
		];
								
		if( jQuery(this).hasClass('cymolthemes-boxes-col-three') ){
			cmt_column         = 3;
			cmt_slidestoscroll = 3;
			
			var cmt_slidestoscroll_1200 = 3;
			var cmt_slidestoscroll_992  = 2;
			var cmt_slidestoscroll_768  = 2;
			var cmt_slidestoscroll_479  = 1;
			var cmt_slidestoscroll_0    = 1;
			if( jQuery(this).data('cmt-slidestoscroll')=='1' ){  // slides to scroll
				var cmt_slidestoscroll      = 1;
				var cmt_slidestoscroll_1200 = 1;
				var cmt_slidestoscroll_992  = 1;
				var cmt_slidestoscroll_768  = 1;
				var cmt_slidestoscroll_479  = 1;
				var cmt_slidestoscroll_0    = 1;
			}
			
			cmt_responsive     = [
				{ breakpoint: 1200, settings: {
					slidesToShow  : 3,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: cmt_slidestoscroll_1200,
				} },
				{ breakpoint: 992, settings: {
					slidesToShow  : 2,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: cmt_slidestoscroll_992
				} },
				{ breakpoint: 768, settings: {
					slidesToShow  : 2,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: cmt_slidestoscroll_768
				} },
				{ breakpoint: 574, settings: {
					slidesToShow  : 1,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: cmt_slidestoscroll_479
				} },
				{ breakpoint: 0, settings: {
					slidesToShow  : 1,
					slidesToScroll: cmt_slidestoscroll_0
				} }
			];
		
		} else if( jQuery(this).hasClass('cymolthemes-boxes-col-one') ){
		
			cmt_column         = 1;
			cmt_slidestoscroll = 1;
			
			cmt_responsive     = [
				{ breakpoint: 1200, settings: {
					slidesToShow  : 1,
					slidesToScroll: 1,
					centerMode: false,
					centerPadding: '0px',
					arrows: false
				} },
				{ breakpoint: 768, settings: {
					slidesToShow  : 1,
					slidesToScroll: 1,
					centerMode: false,
					centerPadding: '0px',
					arrows: false
				} },
				{ breakpoint: 574, settings: {
					slidesToShow  : 1,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: 1
				} },
				{ breakpoint: 0, settings: {
					slidesToShow  : 1,
					slidesToScroll: 1
				} }
			];
			
		} else if( jQuery(this).hasClass('cymolthemes-boxes-col-two') ){
			cmt_column         = 2;
			cmt_slidestoscroll = 2;
			
			var cmt_slidestoscroll_1200 = 2;
			var cmt_slidestoscroll_768  = 2;
			var cmt_slidestoscroll_479  = 1;
			var cmt_slidestoscroll_0    = 1;
			if( jQuery(this).data('cmt-slidestoscroll')=='1' ){  // slides to scroll
				var cmt_slidestoscroll      = 1;
				var cmt_slidestoscroll_1200 = 1;
				var cmt_slidestoscroll_768  = 1;
				var cmt_slidestoscroll_479  = 1;
				var cmt_slidestoscroll_0    = 1;
			}
			
			cmt_responsive     = [
				{ breakpoint: 1200, settings: {
					slidesToShow  : 2,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: cmt_slidestoscroll_1200
				} },
				{ breakpoint: 768, settings: {
					slidesToShow  : 2,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: cmt_slidestoscroll_768
				} },
				{ breakpoint: 574, settings: {
					slidesToShow  : 1,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: cmt_slidestoscroll_479
				} },
				{ breakpoint: 0, settings: {
					slidesToShow  : 1,
					slidesToScroll: cmt_slidestoscroll_0
				} }
			];
		
		} else if( jQuery(this).hasClass('cymolthemes-boxes-col-four') ){
			cmt_column         = 4;
			cmt_slidestoscroll = 4;
			
			var cmt_slidestoscroll_1200 = 4;
			var cmt_slidestoscroll_992  = 2;
			var cmt_slidestoscroll_768  = 2;
			var cmt_slidestoscroll_479  = 1;
			var cmt_slidestoscroll_0    = 1;
			if( jQuery(this).data('cmt-slidestoscroll')=='1' ){  // slides to scroll
				var cmt_slidestoscroll      = 1;
				var cmt_slidestoscroll_1200 = 1;
				var cmt_slidestoscroll_992  = 1;
				var cmt_slidestoscroll_768  = 1;
				var cmt_slidestoscroll_479  = 1;
				var cmt_slidestoscroll_0    = 1;
			}
			
			cmt_responsive     = [
				{ breakpoint: 1200, settings: {
					slidesToShow  : 4,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: cmt_slidestoscroll_1200
				} },
				{ breakpoint: 992, settings: {
					slidesToShow  : 2,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: cmt_slidestoscroll_992
				} },
				{ breakpoint: 768, settings: {
					slidesToShow  : 2,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: cmt_slidestoscroll_768
				} },
				{ breakpoint: 574, settings: {
					slidesToShow  : 1,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: cmt_slidestoscroll_479
				} },
				{ breakpoint: 0, settings: {
					slidesToShow  : 1,
					slidesToScroll: cmt_slidestoscroll_0
				} }
			];			
			
		} else if( jQuery(this).hasClass('cymolthemes-boxes-col-five') ){
			cmt_column         = 5;
			cmt_slidestoscroll = 5;
			
			var cmt_slidestoscroll_1200 = 5;
			var cmt_slidestoscroll_992  = 3;
			var cmt_slidestoscroll_768  = 3;
			var cmt_slidestoscroll_479  = 1;
			var cmt_slidestoscroll_0    = 1;
			if( jQuery(this).data('cmt-slidestoscroll')=='1' ){  // slides to scroll
				var cmt_slidestoscroll      = 1;
				var cmt_slidestoscroll_1200 = 1;
				var cmt_slidestoscroll_992  = 1;
				var cmt_slidestoscroll_768  = 1;
				var cmt_slidestoscroll_479  = 1;
				var cmt_slidestoscroll_0    = 1;
			}
			
			cmt_responsive     = [
				{ breakpoint: 1200, settings: {
					slidesToShow  : 5,
					slidesToScroll: cmt_slidestoscroll_1200,
					centerMode: false,
					centerPadding: '0px'
				} },
				{ breakpoint: 992, settings: {
					slidesToShow  : 3,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: cmt_slidestoscroll_992
				} },
				{ breakpoint: 768, settings: {
					slidesToShow  : 3,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: cmt_slidestoscroll_768
				} },
				{ breakpoint: 574, settings: {
					slidesToShow  : 1,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: cmt_slidestoscroll_479
				} },
				{ breakpoint: 0, settings: {
					slidesToShow  : 1,
					slidesToScroll: cmt_slidestoscroll_0
				} }
			];
			
		} else if( jQuery(this).hasClass('cymolthemes-boxes-col-six') ){
			cmt_column         = 6;
			cmt_slidestoscroll = 6;
			
			var cmt_slidestoscroll_1200 = 6;
			var cmt_slidestoscroll_992  = 3;
			var cmt_slidestoscroll_768  = 3;
			var cmt_slidestoscroll_479  = 1;
			var cmt_slidestoscroll_0    = 1;
			if( jQuery(this).data('cmt-slidestoscroll')=='1' ){  // slides to scroll
				var cmt_slidestoscroll      = 1;
				var cmt_slidestoscroll_1200 = 1;
				var cmt_slidestoscroll_992  = 1;
				var cmt_slidestoscroll_768  = 1;
				var cmt_slidestoscroll_479  = 1;
				var cmt_slidestoscroll_0    = 1;
			}
			
			cmt_responsive     = [
				{ breakpoint: 1200, settings: {
					slidesToShow  : 6,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: cmt_slidestoscroll_1200
				} },
				{ breakpoint: 992, settings: {
					slidesToShow  : 3,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: cmt_slidestoscroll_992
				} },
				{ breakpoint: 768, settings: {
					slidesToShow  : 3,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: cmt_slidestoscroll_768
				} },
				{ breakpoint: 574, settings: {
					slidesToShow  : 1,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: cmt_slidestoscroll_479
				} },
				{ breakpoint: 0, settings: {
					slidesToShow  : 1,
					slidesToScroll: cmt_slidestoscroll_0
				} }
			];
		}		
		if( jQuery(this).hasClass('cmt_1200slidestoshow_2') ){
			cmt_column         = 3;
			cmt_slidestoscroll = 3;
			
			var cmt_slidestoscroll_1200 = 3;
			var cmt_slidestoscroll_768  = 2;
			var cmt_slidestoscroll_479  = 1;
			var cmt_slidestoscroll_0    = 1;
			if( jQuery(this).data('cmt-slidestoscroll')=='1' ){  // slides to scroll
				var cmt_slidestoscroll      = 1;
				var cmt_slidestoscroll_1200 = 1;
				var cmt_slidestoscroll_768  = 1;
				var cmt_slidestoscroll_479  = 1;
				var cmt_slidestoscroll_0    = 1;
			}
			cmt_responsive     = [
				{ breakpoint: 1400, settings: {
					slidesToShow  : 2,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: cmt_slidestoscroll_1200,
				} },
				{ breakpoint: 768, settings: {
					slidesToShow  : 2,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: cmt_slidestoscroll_768
				} },
				{ breakpoint: 574, settings: {
					slidesToShow  : 1,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: cmt_slidestoscroll_479
				} },
				{ breakpoint: 0, settings: {
					slidesToShow  : 1,
					slidesToScroll: cmt_slidestoscroll_0
				} }
			];	
		
		}	
		// Fade effect
		var cmt_fade = false;
		if( jQuery(this).data('cmt-effecttype')=='fade' ){
			cmt_fade = true;
		}
		

		// Transaction Speed
		var cmt_speed = 800;
		if( jQuery.trim( jQuery(this).data('cmt-speed') ) != '' ){
			cmt_speed = jQuery.trim( jQuery(this).data('cmt-speed') );
		}
		
		// Autoplay
		var cmt_autoplay = false;
		if( jQuery(this).data('cmt-autoplay')=='1' ){
			cmt_autoplay = true;
		}
		
		// Autoplay Speed
		var cmt_autoplayspeed = 2000;
		if( jQuery.trim( jQuery(this).data('cmt-autoplayspeed') ) != '' ){
			cmt_autoplayspeed = jQuery.trim( jQuery(this).data('cmt-autoplayspeed') );
		}
		
		// Loop
		var cmt_loop = false;
		if( jQuery.trim( jQuery(this).data('cmt-loop') ) == '1' ){
			cmt_loop = true;
		}
		
		// Dots
		var cmt_dots = false;
		if( jQuery.trim( jQuery(this).data('cmt-dots') ) == '1' ){
			cmt_dots = true;
		}
		
		// Next / Prev navigation
		var cmt_nav = false;
		if( jQuery.trim( jQuery(this).data('cmt-nav') ) == '1' || jQuery.trim( jQuery(this).data('cmt-nav') ) == 'above' || jQuery.trim( jQuery(this).data('cmt-nav') ) == 'below' ){
			cmt_nav = true;
		}
		
		// Center mode
		var cmt_centermode = false;
		if( jQuery.trim( jQuery(this).data('cmt-centermode') ) == '1' ){
			cmt_centermode = true;
		}
		
		// Center padding
		var cmt_centerpadding = 800;
		if( jQuery.trim( jQuery(this).data('cmt-centerpadding') ) != '' ){
			var cmt_centerpadding = jQuery.trim( jQuery(this).data('cmt-centerpadding') );
		}
		
		// Pause on Focus
		var cmt_pauseonfocus = false;
		if( jQuery.trim( jQuery(this).data('cmt-pauseonfocus') ) == '1' ){
			cmt_pauseonfocus = true;
		}
		
		// Pause on Hover
		var cmt_pauseonhover = false;
		if( jQuery.trim( jQuery(this).data('cmt-pauseonhover') ) == '1' ){
			cmt_pauseonhover = true;
		}
		
		
		// RTL
		var cmt_rtl = false;
		if( jQuery('body').hasClass('rtl') ){
			cmt_rtl = true;
		}
		
		jQuery('.cymolthemes-boxes-row-wrapper > div', this).removeClass (function (index, css) {
			return (css.match (/(^|\s)col-\S+/g) || []).join(' ');
		});
	
		jQuery('.cymolthemes-boxes-row-wrapper', this).not('.slick-initialized').slick({
			fade             : cmt_fade,
			speed            : cmt_speed,
			centerMode       : cmt_centermode,
			centerPadding    : cmt_centerpadding+'px',
			pauseOnFocus     : cmt_pauseonfocus,
			pauseOnHover     : cmt_pauseonhover,
			slidesToShow     : cmt_column,
			slidesToScroll   : cmt_slidestoscroll,
			autoplay         : cmt_autoplay,
			autoplaySpeed    : cmt_autoplayspeed,
			rtl              : cmt_rtl,
			dots             : cmt_dots,
			pauseOnDotsHover : false,
			arrows           : cmt_nav,
			adaptiveHeight   : false,
			infinite         : cmt_loop,
			responsive       : cmt_responsive
  
		});
	});
		
	// On resize.. it will re-arrange the Flexslider
	jQuery('.cymolthemes-boxes-row-wrapper', this).on('setPosition', function(event, slick){
		jQuery( this ).find( ".cmt-flexslider" ).each(function(){
			jQuery(this).resize();
		});
	});
	
	// Next button in heading area
	jQuery(".cmt-slick-arrow.cmt-slick-next", this ).on('click', function(){
		jQuery('.cymolthemes-boxes-row-wrapper', jQuery(this).closest('.cymolthemes-boxes-view-carousel') ).slick('slickNext');
	});
	
	// Pre button in heading area
	jQuery(".cmt-slick-arrow.cmt-slick-prev", this).on('click', function(){
		jQuery('.cymolthemes-boxes-row-wrapper', jQuery(this).closest('.cymolthemes-boxes-view-carousel') ).slick('slickPrev');
	});	
	
	
	
	// Testimonials Slick view
	jQuery('.cymolthemes-boxes-view-slickview').each(function(){

		// Fade effect
		var cmt_fade = false;
		if( jQuery(this).data('cmt-effecttype')=='fade' ){
			cmt_fade = true;
		}
		
		// Transaction Speed
		var cmt_speed = 800;
		if( jQuery.trim( jQuery(this).data('cmt-speed') ) != '' ){
			cmt_speed = jQuery.trim( jQuery(this).data('cmt-speed') );
		}
		
		// Autoplay
		var cmt_autoplay = false;
		if( jQuery(this).data('cmt-autoplay')=='1' ){
			cmt_autoplay = true;
		}
		
		// Autoplay Speed
		var cmt_autoplayspeed = 2000;
		if( jQuery.trim( jQuery(this).data('cmt-autoplayspeed') ) != '' ){
			cmt_autoplayspeed = jQuery.trim( jQuery(this).data('cmt-autoplayspeed') );
		}
		
		// Loop
		var cmt_loop = false;
		if( jQuery.trim( jQuery(this).data('cmt-loop') ) == '1' ){
			cmt_loop = true;
		}
		
		// Dots
		var cmt_dots = false;
		if( jQuery.trim( jQuery(this).data('cmt-dots') ) == '1' ){
			cmt_dots = true;
		}
		
		// Next / Prev navigation
		var cmt_nav = false;
		if( jQuery.trim( jQuery(this).data('cmt-nav') ) == '1' ){
			cmt_nav = true;
		}
		
	
		var testinav 	= jQuery('.testimonials-nav', this);
		var testiinfo 	= jQuery('.testimonials-info', this);
		
		/* Options for "Owl Carousel 2"
		 * http://owlcarousel.owlgraphic.com/index.html
		 */
		var rtloption = false;
		if( jQuery('body').hasClass('rtl') ){
			rtloption = true;
		}
		
		// Info
		jQuery('.testimonials-info', this).not('.slick-initialized').slick({
			fade			: cmt_fade,
			//arrows		: cmt_nav,
			arrows			: false,
			asNavFor		: testinav,
			adaptiveHeight	: true,
			speed			: cmt_speed,
			autoplay		: cmt_autoplay,
			autoplaySpeed	: cmt_autoplayspeed,
			infinite		: cmt_loop,
			rtl             : rtloption
		});
		// Navigation
	   jQuery('.testimonials-nav', this).not('.slick-initialized').slick({
		    slidesToShow: 3,
			vertical: true,
			verticalScrolling: true,
			asNavFor		: testiinfo,
			centerMode		: true,
			centerPadding	: 0,
			focusOnSelect	: true,
			autoplay		: cmt_autoplay,
			autoplaySpeed	: cmt_autoplayspeed,
			speed			: cmt_speed,
			arrows			: false,
			dots			: cmt_dots,
			infinite		: cmt_loop,
			rtl             : rtloption
		});
	});
};	

 jQuery('.cymolthemes-element-testimonialbox-stylethree .cymolthemes-boxes-row-wrapper').slick({
		slidesToShow: 2,
		slidesToScroll: 1,
	    vertical: true,
	    autoplay:true,
		arrows: false,
        verticalSwiping: true
});

jQuery(window).resize(function() {
	
	"use strict";
	
	/*------------------------------------------------------------------------------*/
	/* Equal Height Div load
	/*------------------------------------------------------------------------------*/	
	equalheight('.cmt-sboxequalheightdiv  .wpb_column.vc_column_container');
		
	/*------------------------------------------------------------------------------*/
	/*  Timeline view
	/*------------------------------------------------------------------------------*/	
	
	setTimeout(function() {
		jQuery( '.cmt-sboxtimeline' ).smTimeline();
	}, 100);
	
	
	/*------------------------------------------------------------------------------*/
	/* onResize: Set height of boxes inside row-column view of Blog and Portfolio
	/*------------------------------------------------------------------------------*/
	if( jQuery('.cymolthemes-testimonial-box' ).length > 0 ){
		setHeight('.cymolthemes-testimonial-box.col-lg-4.col-sm-6.col-md-4');
		setHeight('.cymolthemes-testimonial-box.col-lg-6.col-sm-6.col-md-6');
		setHeight('.cymolthemes-testimonial-box.col-lg-3.col-sm-6.col-md-3');
	}
	
	/*------------------------------------------------------------------------------*/
	/* Call header sticky function
	/*------------------------------------------------------------------------------*/
	cymolthemes_sticky();
		
});

	jQuery(document).ready(function () {
		cymolthemes_isotope();
		cmt_stretched_col();
		cmt_stretched_col_calc();
		cmt_bgimage_class();
		cmt_bgcolor_class();
	
		setTimeout(function(){
			cymolthemes_carousel();
		}, 100);
		
		var i_type = 'iframe';
		jQuery('a.cmt_playvideo, .cmt_playvideo a').each(function(){
			if( jQuery(this).hasClass('cmt_playvideo') || jQuery(this).closest('.vc_icon_element').hasClass('cmt_playvideo') ){
				i_type = 'iframe';
			} 
			jQuery(this).magnificPopup({type:i_type});
		});
	
	});
    
    
   