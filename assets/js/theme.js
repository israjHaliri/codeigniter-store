$(document).ready(function(){
	$('#top-navigation').scrollToFixed();
	$('#top-navigation li a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });

  var offset=220;
  var duration=500;
  jQuery(window).scroll(function(){
    if(jQuery(this).scrollTop()>offset){
      jQuery('.toup').css({opacity:"1",display:"block",});
    }else{
      jQuery('.toup').css('opacity','0');
    }
  });
  
  jQuery('.toup').click(function(event){
    event.preventDefault();
    jQuery('html, body').animate({scrollTop:0},duration);
    return false;
  });
});