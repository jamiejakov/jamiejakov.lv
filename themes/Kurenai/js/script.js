var main = function(){
		
}



$(window).scroll(function() {
  if ($(document).scrollTop() > 30) {
    $('header').addClass('shrink');
    $('nav').addClass('compact');
  } else {
    $('header').removeClass('shrink');
    $('nav').removeClass('compact');
  }
});

$(document).ready(main)