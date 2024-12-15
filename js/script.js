let menu = document.querySelector('#menu-btn1');
let caret = document.querySelector('.header .games');

menu.onclick = () =>{
   menu.classList.toggle('fa-caret-down');
   caret.classList.toggle('active');
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
