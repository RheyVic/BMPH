let menu = document.querySelector('#menu-btn1');
let caret = document.querySelector('.header .games');

menu.onclick = () =>{
   menu.classList.toggle('fa-caret-down');
   caret.classList.toggle('active');
};

window.onscroll = () =>{
   menu.classList.remove('fa-caret-down');
   caret.classList.remove('active');
};

//navbar//
let navbar = document.querySelector('.menu-1');

document.querySelector('#menu-btn').onclick = () =>{
   navbar.classList.toggle('active');
}

//header change//
jQuery(function($){
   var $navbar =$('.header');
   $(window).scroll(function(event){
       var $current = $(this).scrollTop();
       if( $current > 0 ){
           $navbar.addClass('navbar-color');

       } else{
           $navbar.removeClass('navbar-color');
       }
   });
});

//slider//

var swiper = new Swiper(".home-slider", {
   loop:true,
   navigation: {
     nextEl: ".swiper-button-next",
     prevEl: ".swiper-button-prev",
   },
});

var swiper = new Swiper(".reviews-slider", {
   grabCursor:true,
   loop:true,
   autoHeight:true,
   spaceBetween: 20,
   breakpoints: {
      0: {
        slidesPerView: 1,
      },
      700: {
        slidesPerView: 2,
      },
      1000: {
        slidesPerView: 3,
      },
   },
});

