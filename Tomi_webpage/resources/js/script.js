$(document).ready(function() {
    
    /*Sticky Navigation*/
    
    $('.js--section_about_me').waypoint(function(direction) {
       if (direction == "down") {
           $('nav').addClass('sticky');
       } else {
           $('nav').removeClass('sticky');
       }
    }, {
      offset: '60px'
    });
    
    /*Scroll on button*/
    
    $('.js--scroll_to_form').click(function () {
        $('html, body').animate({scrollTop: $('.js--section_form').offset().top}, 1000);
    });
    
    $('.js--scroll_to_production').click(function () {
        $('html, body').animate({scrollTop: $('.js--section_production').offset().top}, 1000);
    });
   
       
});