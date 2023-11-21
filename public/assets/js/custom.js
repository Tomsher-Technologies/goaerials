( function($) {
  'use strict';
  	

  	/* Window Load */
	$(window).on('load',function(){
		$('.loader').fadeOut(200);
        $('.line').addClass('active');
	});


    /* Navbar scroll*/
    $('.navbar-nav ul li a').on('click', function() {
        var target = $(this.hash);
        if (target.length) {
            $('html,body').animate({
                scrollTop: (target.offset().top)
            }, 1000);
            $('body').removeClass('menu-is-opened').addClass('menu-is-closed');
            return false;
        }
    });


    /* Full page scroll*/
    if ($('#pagepiling').length > 0){

        $('#pagepiling').pagepiling({
            scrollingSpeed: 280,
            navigation:false,
            menu: '.navbar-nav',
            anchors: ['home', 'about', 'services', 'partners', 'reels', 'contact'],
            afterRender: function(anchorLink, index){ 
              NavbarColor();
            },
            afterLoad: function(anchorLink, index){
                $('.pp-section .intro').removeClass('animate');
                $('.active .intro').addClass('animate');
                NavbarColor();
            }
        });
    }
    if ($('#pagepiling-about').length > 0){

        $('#pagepiling-about').pagepiling({
            scrollingSpeed: 280,
            navigation:false,
            menu: '.navbar-nav',
            anchors: ['about-section-01', 'about-section-02', 'about-section-03', 'about-section-04','about-section-05'],
            afterRender: function(anchorLink, index){ 
            NavbarColor();
            },
            afterLoad: function(anchorLink, index){
                $('.pp-section .intro').removeClass('animate');
                $('.active .intro').addClass('animate');
                NavbarColor();
            }
        });
    }

    if ($('#pagepiling-contact').length > 0){

        $('#pagepiling-contact').pagepiling({
            scrollingSpeed: 280,
            navigation:false,
            menu: '.navbar-nav',
            anchors: ['contact-section-01', 'contact-section-02', 'contact-section-03', 'contact-section-04'],
            afterRender: function(anchorLink, index){ 
            NavbarColor();
            },
            afterLoad: function(anchorLink, index){
                $('.pp-section .intro').removeClass('animate');
                $('.active .intro').addClass('animate');
                NavbarColor();
            }
        });
    }


    function NavbarColor(){
        if ($('.pp-section.active').hasClass('navbar-is-white')){
            $('.navbar-desctop').addClass('navbar-white');
            $('.progress-nav').addClass('progress-nav-white');
            $('.navbar-bottom').addClass('navbar-bottom-white');
        }
        else{
            $('.navbar-desctop').removeClass('navbar-white');
            $('.progress-nav').removeClass('progress-nav-white');
            $('.navbar-bottom').removeClass('navbar-bottom-white');
        }
    }

    /* Navbar toggler */
    $('.toggler').on('click',function(){
    	$('body').addClass('menu-is-open');
    });

    $('.close, .click-capture').on('click',function(){
    	$('body').removeClass('menu-is-open');
    });


    /* Navbar mobile */
    $('.navbar-nav-mobile li a').on('click', function(){
    	$('body').removeClass('menu-is-open');
    	$('.navbar-nav-mobile li a').removeClass('active');
    	$(this).addClass('active');
    });

    $('.popup-youtube').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });



    /* Change bacgkround on project section*/
    $('.project-box').on('mouseover',function(){
        var index = $('.project-box').index(this);
        $('.bg-changer .section-bg').removeClass('active').eq(index).addClass('active');
    });


    /* Carousel experience*/
    $('.carousel-experience').owlCarousel({
        loop:true,
        margin:45,
        dots:true,
        nav:true,
        smartSpeed:1000,
        items:1
    });

    /* Carousel testimonials */
    $('.carousel-testimonials').owlCarousel({
	    loop:true,
	    margin:10,
        nav:true,
	    dots:false,
	    items:1
	});

    /* Send form */
	if ($('.js-ajax-form').length) {
		$('.js-ajax-form').each(function(){
			$(this).validate({
				errorClass: 'error',
			    submitHandler: function(form){
		        	$.ajax({
			            type: "POST",
			            url:"mail.php",
			            data: $(form).serialize(),
			            success: function() {
		                	$('#success-message').show();
		                },

		                error: function(){
		                	$('#error-message').show();
			            }
			        });
			    }
			});
		});
	}

})(jQuery);


$(function () {
    $('.popup-youtube, .popup-vimeo').magnificPopup({
      disableOn: 700,
      type: 'iframe',
      mainClass: 'mfp-fade',
      removalDelay: 160,
      preloader: false,
      fixedContentPos: false
    });
  });



  window.onscroll = function () {
    var height = $(window).height();
    var scrollTop = $(window).scrollTop();
    var obj = $('#scroll');
    var pos = obj.position();
    if (height + scrollTop < pos.top) {
       $('.button').fadeIn();
    }
    else {
       $('.button').fadeOut(); 
    }
}

//Make sure the user has scrolled at least double the height of the browser
var toggleHeight = $(window).outerHeight() * 2;

$(window).scroll(function() {
	if ($(window).scrollTop() > toggleHeight) {
		//Adds active class to make button visible
		$(".m-backtotop").addClass("active");
		
		//Just some cool text changes
		$('h1 span').text('TA-DA! Now hover it and hit dat!')
		
	} else {
		//Removes active class to make button visible
		$(".m-backtotop").removeClass("active");
		
		//Just some cool text changes
		//$('h1 span').text('(start scrolling)')
	}
});


//Scrolls the user to the top of the page again
$(".m-backtotop").click(function() {
	$("html, body").animate({ scrollTop: 0 }, "slow");
	return false;
});








    
