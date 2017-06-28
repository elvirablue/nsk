$(document).on('ready', function(){
	var navMain = document.querySelectorAll('.main-nav-block');
	var navToggle = document.querySelectorAll('.main-nav__toggle');
	var start_pos = navMain[0].offsetTop + 100; 
  var FLAG_visible_scroll_menu = false; 
  var activ =  $('nav.main-nav a');

	navMain[1].classList.remove('main-nav--nojs');
  navMain[0].classList.remove('main-nav--nojs');

	navToggle[0].addEventListener('click', function() {
		if (navMain[0].classList.contains('main-nav--closed')) {
			navMain[0].classList.remove('main-nav--closed');	
			navMain[0].classList.add('main-nav--opened');
		} else {
			navMain[0].classList.add('main-nav--closed');	
			navMain[0].classList.remove('main-nav--opened');	
		}
	});


  

 navToggle[1].addEventListener('click', function() {
    if (navMain[1].classList.contains('main-nav--closed')) {
      navMain[1].classList.remove('main-nav--closed');  
      navMain[1].classList.add('main-nav--opened');
    } else {
      navMain[1].classList.add('main-nav--closed'); 
      navMain[1].classList.remove('main-nav--opened');  
    }
  });

	$(window).scroll(function(){

    if ($(window).scrollTop() > start_pos && !FLAG_visible_scroll_menu) {
          if ($('.main-nav-scroll').hasClass('to_top')==false) {                        
                $('.main-nav-scroll').addClass('to_top');
                $('.main-nav-scroll').slideDown(600);
                FLAG_visible_scroll_menu = true;
          } 
    } 

    if ($(window).scrollTop() < start_pos && FLAG_visible_scroll_menu) {
                 $('.main-nav-scroll').slideUp(100, function() {
                    $('.main-nav-scroll').removeClass('to_top');               
                    FLAG_visible_scroll_menu = false;
                 });
                
             
          };

  });      

      //зафиксировать выбранный пункт меню
      $('.main-nav__wrapper > ul > li').click(function() {                  
        if (this.classList.contains('active')) return; 
        $('.main-nav__wrapper > ul > li.active').removeClass('active');                   
        $(this).addClass('active');             
  
      });
      

       



});