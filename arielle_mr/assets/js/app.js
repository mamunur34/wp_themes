jQuery(function($) {
    'use strict';

    $('#toggle').click(function () {
        $(this).toggleClass('active');
        $('#overlay').toggleClass('open');
        $('#overlay-search').toggleClass('open');
        $('body').toggleClass('overlay-body');
        $('.search').removeClass('expanded');
    });

    

    $('.icon').on('click', function (e) {
        e.preventDefault();
        
        $('#toggle').addClass('active');
        $('#overlay').addClass('open');
        $('.search').addClass('expanded');
        $('body').addClass('overlay-body');

    });

    $('.button__container__icon.active').click(function () {

        $('.box').hide();
        
        

    });

   

   const hero = document.getElementById('hero');
   
   const resize = () => {
       if (window.matchMedia('(min-width: 520px)').matches) {
           const height = window.innerHeight;
           $('.hero__featured').css("height", height + 'px');
           $('.hero__featured2').css("height", height/2 + 'px');
       } if (window.matchMedia('(min-width: 200px) and (max-width: 519px)').matches) {
        $('.hero__featured').css("height",  '370px');
        $('.hero__featured2').css("height", '370px');
       } else {
        
       }
   };
   resize();
   window.addEventListener('resize', resize);


    // -------------------------------------------------------------
    // Sticky Menu
    // -------------------------------------------------------------

    // (function () {
    //     var nav = $('.header__menu');
    //     var scrolled = false;

    //     $(window).scroll(function () {

    //         if (500 < $(window).scrollTop() && !scrolled) {
    //             nav.addClass('sticky').animate({
    //                 'margin-top': '0px'
    //             });

    //             scrolled = true;
    //         }

    //         if (500 > $(window).scrollTop() && scrolled) {
    //             nav.removeClass('sticky').css('margin-top', '0px');

    //             scrolled = false;
    //         }
    //     });

    // }());
   

}); // JQuery end