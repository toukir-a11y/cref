(function ($) {
	var ua = window.navigator.userAgent;
	var isIE = /MSIE|Trident/.test(ua);

	if ( !isIE ) {
		//IE specific code goes here
		"use strict";
	}

    /** Adobe typekit font */
    try{Typekit.load({ async: true });}catch(e){};

	/*** Sticky header */
	$(window).scroll(function(){
		if($("body").scrollTop() > 0 || $("html").scrollTop() > 0) {
			$(".header").addClass("stop");
		} else {
			$(".header").removeClass("stop");
		}
	});

	/*** Sticky header */
	const body = document.body;
	const scrollUp = "scroll-up";
	const scrollDown = "scroll-down";
	const searchBar = $('.search-wrap');
	let lastScroll = 100;

	window.addEventListener("scroll", () => {
	  	const currentScroll = window.pageYOffset;
	  	if (currentScroll <= 0) 
	  	{
	    	body.classList.remove(scrollUp);
	    	return;
	  	}

	  	if (currentScroll > lastScroll && !body.classList.contains(scrollDown)) 
	  	{
	    	// down
	    	body.classList.remove(scrollUp);
	    	body.classList.add(scrollDown);
	    	searchBar.removeClass('search-show');
	  	} 
	  	else if ( currentScroll < lastScroll && body.classList.contains(scrollDown) ) 
	  	{
	    	// up
	    	body.classList.remove(scrollDown);
	    	body.classList.add(scrollUp);
	  	}

	  	lastScroll = currentScroll;
	});

    /*** Navbar Menu */
    $('.navbar-toggler').sidr({
        name: 'sidr-main',
        side: 'left',
        source: '#sidr',
        displace: false,
        renaming: false,
    });

    $('.header .navbar-toggler').on('click', function(e) {
    	e.preventDefault();
    	$('.navbar-toggler').addClass('in');
    });

    $('.sidr-inner .navbar-toggler').on('click', function(e) {
    	e.preventDefault();
        $.sidr('close', 'sidr-main');
        $('.navbar-toggler').removeClass('in');
    });

    $(window).scroll(function(){
        if($("body").scrollTop() > 0 || $("html").scrollTop() > 0) {
           $.sidr('close', 'sidr-main');
           $('.navbar-toggler').removeClass('in');
        }
    });

    $('.search-wrap').on('click', '.search-toggle', function (e) {
    	var selector = $(this).data('selector');
    	$(selector).toggleClass('search-show').find('.search-input').focus();
    	e.preventDefault();
    });

    /*** Select Wrap */
    $('select[multiple="multiple"]').multiselect({
    	nonSelectedText: 'Select all that apply',
    });

    $('select').multiselect();
    // $( "select" ).wrap( "<div class='select-wrapper'></div>" );


    /*** ScrollDown */
	$('.scrollDown').click(function() {
	    var target = $('#primary');
	    var space = $(this).data('space');

	    if (target.length) {
	        $('html,body').animate({
	          scrollTop: target.offset().top - space
	        }, 1e3, "easeInOutExpo");
	    }
	});

	/*** Smooth scroll */
    $('.smoothScroll, .smoothScroll a').click(function() {
       	if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
           	var target = $(this.hash);
           	target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
           	if (target.length) {
               	$('html,body').animate({
                   scrollTop: target.offset().top - 40
               	}, 1e3, "easeInOutExpo");

               return false;
           }
       	}
    });

	/*** Header height = gutter height */
	function setGutterHeight(){
		var header = document.querySelector('.header'),
			  gutter = document.querySelector('.header_gutter');
		if (gutter) {
			gutter.style.height = header.offsetHeight + 'px';
		}
	}
	window.onload = setGutterHeight;
	window.onresize = setGutterHeight;

	/*** lastNobullet */
	function lastNobullet() {
	    var lastElement = false;
	    $(".lastNobullet li").each(function() {
	        if (lastElement && lastElement.offset().top != $(this).offset().top) {
	            $(lastElement).addClass("nobullet");
	        } else {
	            $(lastElement).removeClass("nobullet");
	        }
	        lastElement = $(this);
	    }).last().addClass("nobullet");
	};
	lastNobullet();

	$(window).resize(function(){
	    lastNobullet();
	});

	/*** Rellax */
	var rellax = new Rellax('.rellax');
	var _parallax = $(".parallax-mobile"),
		_speed = 0.6;

	window.onscroll = function(){
	    [].slice.call(_parallax).forEach(function(el,i){
	      var rect = el.getBoundingClientRect();
	      var windowYOffset = window.pageYOffset,
	          elBackgrounPos = "0 " + (windowYOffset * _speed) + "px";
	      
	      el.style.top = elBackgrounPos;

	    });
	};

	/*** tooltip */
	$('[data-toggle="tooltip"]').tooltip({
		html: true,
	});

	/*** Number Counter */
	$('.counter').counterUp({
		delay: 10,
		time: 1000
	});

	/*** Masonry */
    function masonryGrid(){
        var $grid = $('.masonry');
        // initialize
        $grid.masonry({
            itemSelector: '.item',
            columnWidth: '.item',
            horizontalOrder: false,
            // isAnimated: true,
            // percentPosition: true,
        });

        $grid.masonry('reloadItems');
        $grid.masonry('layout');

        // layout Masonry after each image loads
        $grid.imagesLoaded().progress( function() {
            $grid.masonry('layout');
        });
    }
    masonryGrid();

	/*** enable lightbox */
	$('.popup-video').magnificPopup({
        type: 'iframe',
        preloader: false,
        fixedBgPos: true,
        removalDelay: 500,
        fixedContentPos: true,
        callbacks: {
            beforeOpen: function() {
                // console.log(this.st.iframe.markup);
                this.st.iframe.markup = this.st.iframe.markup.replace('mfp-iframe-scaler', 'mfp-iframe-scaler mfp-with-anim');
                this.st.mainClass = this.st.el.attr('data-effect');
            }
        },
        closeMarkup: '<button title="Close (Esc)" type="button" class="mfp-close">Close<span class="icon-close"></span></button>',
    });

    $('.gallery-popup').magnificPopup({
 		delegate: 'a.popup',
 		type: 'image',
 		midClick: true,
 		preloader: false,
 		fixedBgPos: true,
 		removalDelay: 500,
 		fixedContentPos: true,
 		gallery: {
	        enabled: true,
	        navigateByImgClick: true,
	        preload: [0,1]
	      },
 		callbacks: {
 		    beforeOpen: function() {
 		        this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
 		        this.st.mainClass = this.st.el.attr('data-effect');
 		    },
 		},
 		closeMarkup: '<button title="Close (Esc)" type="button" class="mfp-close">Close<span class="icon-close"></span></button>',
    });

    $('.enable_lightbox').magnificPopup({
        type: 'image',
        midClick: true,
        fixedBgPos: true,
        removalDelay: 500,
        fixedContentPos: true,
        tLoading: 'Loading image #%curr%...',
        image: {
            verticalFit: true,
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            titleSrc: function(item) {
                return item.el.find('img').attr('alt');
            }
        },
        callbacks: {
            beforeOpen: function() {
                this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                this.st.mainClass = 'mfp-move-from-top vertical-middle enable-lightbox-wrapper';
            },
            buildControls: function() {
              // re-appends controls inside the main container
              // this.contentContaine.append(this.arrowLeft.add(this.arrowRight));
            }
        },
        closeOnContentClick: true,
        midClick: true,
        closeMarkup: '<button title="Close (Esc)" type="button" class="mfp-close">Close<span class="icon-close"></span></button>',
    });

    $('.open-popup-link').magnificPopup({
      	type:'inline',
      	midClick: true,
      	removalDelay: 500,
    	fixedContentPos: true,
    	closeOnBgClick: true, 
    	closeMarkup: '<button title="Close (Esc)" type="button" class="mfp-close"><span class="icon-close"></span></button>',
    	callbacks: {
    	    beforeOpen: function() {
    	       this.st.mainClass = 'mfp-strategic-planning '+this.st.el.attr('data-effect');
    	       $('.strategic_planning_slider').attr( 'style', 'width:'+this.st.el.attr('data-style'));
    	    },
    	    open: function() {
    	    	// Drag
    	    	const strPlanSlider = document.querySelector('.strategic_planning_slider');
    	    	let mouseDown = false;
    	    	let startX, scrollLeft;

    	    	let startDragging = function (e) {
    	    	  	mouseDown = true;
    	    	  	startX = e.pageX - strPlanSlider.offsetLeft;
    	    	  	scrollLeft = strPlanSlider.scrollLeft;
    	    	};
    	    	
    	    	let stopDragging = function (event) {
    	    	  	mouseDown = false;
    	    	};

    	    	strPlanSlider.addEventListener('mousemove', (e) => {
    	    	  	e.preventDefault();
    	    	  	if(!mouseDown) { return; }
    	    	  		const x = e.pageX - strPlanSlider.offsetLeft;
    	    	  		const scroll = x - startX;
    	    	  	strPlanSlider.scrollLeft = scrollLeft - scroll;
    	    		console.log('sss');
    	    	});

    	    	// Add the event listeners
    	    	strPlanSlider.addEventListener('mousedown', startDragging, false);
    	    	strPlanSlider.addEventListener('mouseup', stopDragging, false);
    	    	strPlanSlider.addEventListener('mouseleave', stopDragging, false);

    	    	$('.mfp-close, #strategic-planning').on( "click", function() {
    	    	  	$.magnificPopup.close();
    	    	});
    	    }
    	},
    });

    /*** Home Page Slider = Container Right */
    function setMasonrySliderWidht() {
    	var body = document.querySelector('body'),
    		container = document.querySelector('.container'), 
    		nubms = document.querySelector('.get_width'),  
    		nu_cta_box = document.querySelectorAll('.open-popup-link'), 
    		containerRight = (body.offsetWidth - container.offsetWidth)/2+15;

    	if ( nu_cta_box ) {
    		nu_cta_box.forEach(d => d.dataset.style = 'calc(100% + '+containerRight + 'px' );
    	}
    }

    window.onload = setMasonrySliderWidht;
    window.onresize = setMasonrySliderWidht;

	/*** Generated by CoffeeScript 1.9.2 */
	function stickyKit() {
	    var reset_scroll;

	    $(function() {
	        return $("[data-sticky_column]").stick_in_parent({
	            parent: "[data-sticky_parent]",
	            offset_top: 120,
	            bottoming: true,
	        });
	    });

	    reset_scroll = function() {
	        var scroller;
	        scroller = $("body,html");
	        scroller.stop(true);

	        if ($(window).scrollTop() !== 0) {
	            scroller.animate({
	                scrollTop: 0
	            }, "fast");
	        }
	        return scroller;
	    };

	    window.scroll_it = function() {
	        var max;
	        max = $(document).height() - $(window).height();

	        return reset_scroll().animate({
	            scrollTop: max
	        }, max * 3).delay(100).animate({
	            scrollTop: 0
	        }, max * 3);
	    };

	    window.scroll_it_wobble = function() {
	        var max, third;
	        max = $(document).height() - $(window).height();
	        third = Math.floor(max / 3);

	        return reset_scroll().animate({
	            scrollTop: third * 2
	        }, max * 3).delay(100).animate({
	            scrollTop: third
	        }, max * 3).delay(100).animate({
	            scrollTop: max
	        }, max * 3).delay(100).animate({
	            scrollTop: 0
	        }, max * 3);
	    };

	    $(window).on("load", (function(_this) {
	        return function(e) {
	            return $(document.body).trigger("sticky_kit:recalc");
	        };
	    })(this));

	    $(window).on("resize", (function(_this) {
	        return function(e) {
	            return $(document.body).trigger("sticky_kit:recalc");
	        };
	    })(this));
	}

	var window_width = $(window).width();

	if (window_width < 1200) {
	    $(document.body).trigger("sticky_kit:detach");
	} else {
	    stickyKit();
	}

	$( window ).resize(function() {
	    window_width = $( window ).width();
	    if (window_width < 1200) {
	        $(document.body).trigger("sticky_kit:detach");
	    } else {
	        stickyKit();
	    }
	});

	/*** Image to SVG */
	$('img.svg').each(function(){
	    var $img = $(this);
	    var imgID = $img.attr('id');
	    var imgClass = $img.attr('class');
	    var imgURL = $img.attr('src');
	
	    $.get(imgURL, function(data) {
	        // Get the SVG tag, ignore the rest
	        var $svg = $(data).find('svg');
	
	        // Add replaced image's ID to the new SVG
	        if(typeof imgID !== 'undefined') {
	            $svg = $svg.attr('id', imgID);
	        }
	        // Add replaced image's classes to the new SVG
	        if(typeof imgClass !== 'undefined') {
	            $svg = $svg.attr('class', imgClass+' replaced-svg');
	        }
	
	        // Remove any invalid XML tags as per http://validator.w3.org
	        $svg = $svg.removeAttr('xmlns:a');
	        
	        // Check if the viewport is set, else we gonna set it if we can.
	        if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
	            $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
	        }
	
	        // Replace image with new SVG
	        $img.replaceWith($svg);
	
	    }, 'xml');
	
	});

	/*** Get OS */
	var os = ['iphone', 'ipad', 'windows', 'mac', 'linux'];
	var match = navigator.appVersion.toLowerCase().match(new RegExp(os.join('|')));
	if (match) {
	    $('body').addClass(match[0]);
	};

	/*** BrowserDetect */
	var BrowserDetect = {
	    init: function () {
	        this.browser = this.searchString(this.dataBrowser) || "Other";
	        this.version = this.searchVersion(navigator.userAgent) || this.searchVersion(navigator.appVersion) || "Unknown";
	    },
	    searchString: function (data) {
	        for (var i = 0; i < data.length; i++) {
	            var dataString = data[i].string;
	            this.versionSearchString = data[i].subString;

	            if (dataString.indexOf(data[i].subString) !== -1) {
	                return data[i].identity;
	            }
	        }
	    },
	    searchVersion: function (dataString) {
	        var index = dataString.indexOf(this.versionSearchString);
	        if (index === -1) {
	            return;
	        }

	        var rv = dataString.indexOf("rv:");
	        if (this.versionSearchString === "Trident" && rv !== -1) {
	            return parseFloat(dataString.substring(rv + 3));
	        } else {
	            return parseFloat(dataString.substring(index + this.versionSearchString.length + 1));
	        }
	    },

	    dataBrowser: [
	        {string: navigator.userAgent, subString: "Edge", identity: "MSEdge"},
	        {string: navigator.userAgent, subString: "MSIE", identity: "Explorer"},
	        {string: navigator.userAgent, subString: "Trident", identity: "Explorer"},
	        {string: navigator.userAgent, subString: "Firefox", identity: "Firefox"},
	        {string: navigator.userAgent, subString: "Opera", identity: "Opera"},  
	        {string: navigator.userAgent, subString: "OPR", identity: "Opera"},  

	        {string: navigator.userAgent, subString: "Chrome", identity: "Chrome"}, 
	        {string: navigator.userAgent, subString: "Safari", identity: "Safari"}       
	    ]
	};
	
	BrowserDetect.init();
	document.body.classList.add( BrowserDetect.browser );

	/*** Solutions Services */
    $('.solution-services-slider').each(function(num, elem) {
    	elem = $(elem);
    	siblings = elem.siblings('.slide-controls');
    	arrow = siblings.children('.slider-arrows');

        elem.slick({
			dots: true,
			arrows: true,
			infinite: true,
			autoplay: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			appendDots: siblings,
			prevArrow: arrow.children('.sarrow-prev'),
			nextArrow: arrow.children('.sarrow-next'),
		});
    });

    /*** Activities */
    $activitieslick = $('.activitiesSlider');

    $activitieslick.slick({
      	speed: 300,
      	dots: false,
      	arrows: false,
      	infinite: true,
      	slidesToShow: 4,
      	centerMode: true,
      	centerPadding: '190px 0 0',
      	slidesToScroll: 1,
      	responsive: [
    	    {
    	      	breakpoint: 2500,
    	      	settings: {
    	        	slidesToShow: 3,
    	        	slidesToScroll: 1,
    	      	}
    	    },
    	    {
    	      	breakpoint: 2300,
    	      	settings: {
    	        	slidesToShow: 2,
    	        	slidesToScroll: 1,
    	      	}
    	    },
    	    {
    	      	breakpoint: 1200,
    	      	settings: {
    	        	slidesToShow: 2,
    	        	slidesToScroll: 1,
    	        	centerPadding: '150px 0 0',
    	      	}
    	    },
    	    {
    	      	breakpoint: 992,
    	      	settings: {
    	        	slidesToShow: 2,
    	        	slidesToScroll: 1,
    	        	centerPadding: '120px 0 0',
    	      	}
    	    },
    	    {
    	      	breakpoint: 768,
    	      	settings: {
    	        	slidesToShow: 1,
    	        	slidesToScroll: 1,
    	        	centerPadding: '120px 0 0',
    	      	}
    	    },
    	    {
    	      	breakpoint: 576,
    	      	settings: {
    	        	slidesToShow: 1,
    	        	slidesToScroll: 1,
    	        	centerPadding: '100px 0 0',
    	      	}
    	    },
    	    {
    	      	breakpoint: 481,
    	      	settings: {
    	        	slidesToShow: 1,
    	        	slidesToScroll: 1,
    	        	centerPadding: '60px 0 0',
    	      	}
    	    }
      	]
    });

	/*** Team Member Slider */
	var teamtime = 5;
	var $teambar,
		$teamslick,
		teamisPause,
		teamtick,
		teampercentTime;

	$teamslick = $('.teamMemberSlider');

	$teamslick.slick({
	  	speed: 300,
	  	dots: false,
	  	arrows: false,
	  	infinite: true,
	  	slidesToShow: 6,
	  	centerMode: true,
	  	centerPadding: '190px 0 0',
	  	slidesToScroll: 1,
	  	responsive: [
		    {
		      	breakpoint: 2300,
		      	settings: {
		        	slidesToShow: 5,
		        	slidesToScroll: 1,
		      	}
		    },
		    {
		      	breakpoint: 1920,
		      	settings: {
		        	slidesToShow: 4,
		        	slidesToScroll: 1,
		      	}
		    },
		    {
		      	breakpoint: 1200,
		      	settings: {
		        	slidesToShow: 3,
		        	slidesToScroll: 1,
		        	centerPadding: '150px 0 0',
		      	}
		    },
		    {
		      	breakpoint: 992,
		      	settings: {
		        	slidesToShow: 2,
		        	slidesToScroll: 1,
		        	centerPadding: '120px 0 0',
		      	}
		    },
		    {
		      	breakpoint: 768,
		      	settings: {
		        	slidesToShow: 2,
		        	slidesToScroll: 1,
		        	centerPadding: '120px 0 0',
		      	}
		    },
		    {
		      	breakpoint: 576,
		      	settings: {
		        	slidesToShow: 1,
		        	slidesToScroll: 1,
		        	centerPadding: '100px 0 0',
		      	}
		    },
		    {
		      	breakpoint: 481,
		      	settings: {
		        	slidesToShow: 1,
		        	slidesToScroll: 1,
		        	centerPadding: '60px 0 0',
		      	}
		    }
	  	]
	});

	$teambar = $('.team-progress .progress');

	$teamslick.on({
		mouseenter: function() {
			teamisPause = true;
		},
		mouseleave: function() {
			teamisPause = false;
		}
	})

	function startteamProgressbar() {
		resetteamProgressbar();
			teampercentTime = 0;
			teamisPause = false;
			teamtick = setInterval(teamInterval, 10);
		}

	function teamInterval() {
		if( teamisPause === false ) 
		{
			teampercentTime += 1 / (teamtime+0.1);
			$teambar.css({
				width: teampercentTime+"%"
			});

			if(teampercentTime >= 100)
			{
				$teamslick.slick('slickNext');
				startteamProgressbar();
			}
		}
	}

	function resetteamProgressbar() {
		$teambar.css({
			width: 0+'%' 
		});
		clearTimeout(teamtick);
	}
	startteamProgressbar();

	// About Partner Quote
	var pqstime = 5;
	var $pqsbar,
		$pqsslick,
		pqsisPause,
		pqstick,
		pqspercentTime;

	$pqsslick = $('.blockquoteSlider');

	$pqsslick.slick({
	  	speed: 300,
	  	dots: true,
	  	arrows: false,
	  	infinite: true,
	  	autoplay: true,
	  	slidesToShow: 1,
	  	slidesToScroll: 1,
	  	appendDots: $('.qsdots'),
	});

	$pqsbar = $('.pqsprogress .progress');

	// $pqsslick.on({
	// 	mouseenter: function() {
	// 		pqsisPause = true;
	// 	},
	// 	mouseleave: function() {
	// 		pqsisPause = false;
	// 	}
	// })

	$('.pqsPlayPause').on('click', function(e) 
	{
		e.preventDefault();

		if ( $(this).children('i').hasClass( 'icon-pause' ) )
		{
			$(this).children('i').removeClass('icon-pause').addClass('icon-play');
			$pqsslick.slick('slickPause');
			pqsisPause = true;
		} 
		else 
		{  
			$(this).children('i').removeClass('icon-play').addClass('icon-pause');
			$pqsslick.slick('slickPlay');
			pqsisPause = false;
		}  
	});

	function startQuoteProgressbar() {
		resetQuoteProgressbar();
			pqspercentTime = 0;
			pqsisPause = false;
			pqstick = setInterval(intervalQuote, 10);
		}

	function intervalQuote() {
		if( pqsisPause === false ) 
		{
			pqspercentTime += 1 / (pqstime+0.1);
			$pqsbar.css({
				width: pqspercentTime+"%"
			});

			if(pqspercentTime >= 100)
			{
				$pqsslick.slick('slickNext');
				startQuoteProgressbar();
			}
		}
	}

	function resetQuoteProgressbar() {
		$pqsbar.css({
			width: 0+'%' 
		});
		clearTimeout(pqstick);
	}
	startQuoteProgressbar();

	/*** popular Slider */
	var populartime = 5;
	var $popularbar,
		$popularslick,
		popularisPause,
		populartick,
		popularpercentTime;

	$popularslick = $('.popularSlider');

	$popularslick.slick({
	  	speed: 300,
	  	dots: false,
	  	arrows: false,
	  	infinite: true,
	  	initialSlide: 1,
	  	slidesToShow: 3,
	  	centerMode: true,
	  	centerPadding: '190px 0 0',
	  	slidesToScroll: 1,
	  	responsive: [
		    {
		      	breakpoint: 1367,
		      	settings: {
		        	slidesToShow: 3,
		        	initialSlide: 1,
		        	slidesToScroll: 1,
		        	centerPadding: '170px 0 0',
		      	}
		    },
		    {
		      	breakpoint: 992,
		      	settings: {
		        	slidesToShow: 2,
		        	initialSlide: 1,
		        	slidesToScroll: 1,
		        	centerPadding: '150px 0 0',
		      	}
		    },
		    {
		      	breakpoint: 992,
		      	settings: {
		        	slidesToShow: 2,
		        	initialSlide: 1,
		        	slidesToScroll: 1,
		        	centerPadding: '120px 0 0',
		      	}
		    },
		    {
		      	breakpoint: 576,
		      	settings: {
		        	slidesToShow: 1,
		        	initialSlide: 0,
		        	slidesToScroll: 1,
		        	centerPadding: '130px 0 0',
		      	}
		    },
		    {
		      	breakpoint: 481,
		      	settings: {
		        	slidesToShow: 1,
		        	initialSlide: 0,
		        	slidesToScroll: 1,
		        	centerPadding: '60px 0 0',
		      	}
		    }
	  	]
	});

	$popularbar = $('.popular-progress .progress');

	$popularslick.on({
		mouseenter: function() {
			popularisPause = true;
		},
		mouseleave: function() {
			popularisPause = false;
		}
	})

	function startProgressbar() {
		resetProgressbar();
			popularpercentTime = 0;
			popularisPause = false;
			populartick = setInterval(interval, 10);
		}

	function interval() {
		if( popularisPause === false ) 
		{
			popularpercentTime += 1 / (populartime+0.1);
			$popularbar.css({
				width: popularpercentTime+"%"
			});

			if(popularpercentTime >= 100)
			{
				$popularslick.slick('slickNext');
				startProgressbar();
			}
		}
	}

	function resetProgressbar() {
		$popularbar.css({
			width: 0+'%' 
		});
		clearTimeout(populartick);
	}
	startProgressbar();

}(jQuery));