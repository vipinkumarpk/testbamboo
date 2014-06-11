jQuery(document).ready(function () {
    if(jQuery().queryLoader2){
        var $body=jQuery('body');
        var $color = $body.attr('loadercolor');
        jQuery("body").queryLoader2({
            backgroundColor: $color,	 //Background color of the loader (in hex).
            barColor: "#ffffff",	 //Background color of the bar (in hex).
            barHeight: 20,	 //Height of the bar in pixels. Default: 1
            deepSearch: true,	 //Set to true to find ALL images with the selected elements. If you don't want queryLoader to look in the children, set to false. Default: true.
            percentage: true,	 //Set to true to enable percentage visualising. Default is false.
            completeAnimation: "fade", //Set the animation type at the end. Options: "grow" or "fade". Default is "fade".
            onComplete: function(){
                jQuery("#ct_preloader").fadeOut(600);
            }
        });
    }
});


// Begin tooltip for socials init */

function tooltipInit() {
    jQuery("[data-toggle='tooltip']").tooltip();
};


jQuery(document).ready(function () {
    tooltipInit();
});



// Change navigation still on scroll
jQuery(window).scroll(function () {
    var scroll = jQuery(window).scrollTop();
    if (jQuery("nav").hasClass("navbar-has-transition")) {
        //>=, not <=
        if (scroll >= 100) {
            jQuery("nav").removeClass("navbar-transparent");
            jQuery("nav").addClass("navbar-inverse");
        }
        if (scroll < 100) {
            jQuery("nav").addClass("navbar-transparent");
            jQuery("nav").removeClass("navbar-inverse");
        }
    }
    if (jQuery("nav").hasClass("navbar-middle")) {
        //>=, not <=
        if (scroll >= 100) {
            jQuery("nav").addClass("small");
        }
        if (scroll < 100) {
            jQuery("nav").removeClass("small");
        }
    }
    if (jQuery("nav").hasClass("navbar-info-top")) {
        //>=, not <=
        if (scroll >= 100) {
            jQuery("nav").addClass("navbar-info-top-hidden");
            jQuery("nav .top-info").addClass("top-info-hidden");
        }
        if (scroll < 100) {
            jQuery("nav").removeClass("navbar-info-top-hidden");
            jQuery("nav .top-info").removeClass("top-info-hidden");
        }
    }
}); //missing );

//Page Scroller


jQuery(document).ready(function () {
    jQuery('.btn[href^="#"]').on('click', function (e) {
        console.log(this);
        e.preventDefault();

        var target = this.hash, $target = jQuery(target);

        jQuery('html, body').stop().animate({
            'scrollTop': $target.offset().top
        }, 900, 'swing', function () {
            window.location.hash = target;
        });
    });
    jQuery(".navbar li.dropdown > .dropdown-toggle").removeAttr("data-toggle data-target");

    if(jQuery().pageScroller){
        if(jQuery('body').hasClass('onepage')){
            jQuery('body').pageScroller({
                navigation: '.onepage',
                sectionClass: 'chapter',
                animationType: 'easeOutExpo',
                animationSpeed: 750,
                keyboardControl: true,
                scrollOffset: '-80'
            });
        }
    }

    if (jQuery('#faq1').length > 0) {
        jQuery('#faq1').affix({
            offset: { top: jQuery('#faq1').offset().top - 115 }
        });
    }


    jQuery('#faq1 a').bind('click', function (e) {
        e.preventDefault();

        jQuery('html, body').animate({
            scrollTop: jQuery(this.hash).offset().top }, 300);
    });
});

function scrollToTop(i) {
    if (i == 'show') {
        if (jQuery(this).scrollTop() != 0) {
            jQuery('#toTop').fadeIn();
        } else {
            jQuery('#toTop').fadeOut();
        }
    }
}

jQuery(window).scroll(function () {
    scrollToTop('show');
});

/* show search form */
jQuery(document).ready(function () {

    jQuery('#searchIcon1').click(function () {

        if((jQuery('div.searchForm').hasClass('search-open'))){
            jQuery('div.searchForm').removeClass('search-open');
        } else{
            jQuery('div.searchForm').addClass('search-open');
        }
    });
});

jQuery(document).ready(function () {

    if(jQuery("#MainHeader").find('.fullscreen-flexslider').length !=0 || jQuery("#MainHeader").find('.fullscreen-flexslider-ken-burns').length !=0 || jQuery("#MainHeader").find('.flexslider-with-video').length !=0 || jQuery("#MainHeader").find('.fullscreen-slider-slogan').length !=0){
        jQuery("#MainHeader").addClass('responsive-auto');
    }

    if(!device.mobile() && !device.tablet()){
        jQuery('.parallax').css('background-attachment' , 'fixed');
    } else{
        jQuery('.parallax').css('background-attachment' , 'scroll');
    }

    // menu for onepager
    jQuery("#nav > li > a[href^='/#']").each(function () {
        var $this = jQuery(this);
        jQuery($this.parent()).removeClass("active").addClass("onepage");
        // remove unnecessary active classes
        $this.parent().removeClass("active");
    });

    jQuery("#nav1 > li > a[href^='/#']").each(function () {
        var $this = jQuery(this);
        jQuery($this.parent()).removeClass("active").addClass("onepage");
        // remove unnecessary active classes
        $this.parent().removeClass("active");
    })

    jQuery("#nav2 > li > a[href^='/#']").each(function () {
        var $this = jQuery(this);
        jQuery($this.parent()).removeClass("active").addClass("onepage");
        // remove unnecessary active classes
        $this.parent().removeClass("active");
    });

    // remove unnecessary active classes
    jQuery("#nav > li > a[href='/']").parent().removeClass("active");
    jQuery("#nav1 > li > a[href='/']").parent().removeClass("active");
    jQuery("#nav2 > li > a[href='/']").parent().removeClass("active");


    if (jQuery("body").hasClass("home")) {
        //page scroll

        if (jQuery("#nav > li").hasClass("onepage") || jQuery("#nav1 > li").hasClass("onepage") || jQuery("#nav2 > li").hasClass("onepage") ) {
            jQuery('body').pageScroller({
                navigation: '#navigation .onepage',
                sectionClass: 'chapter',
                animationType: 'easeOutExpo',
                animationSpeed: 750,
                keyboardControl: true,
                scrollOffset: '-80'
            })
        }
    }


});