var menuBox;



function smallDisplay() {
  return $(window).width() < 888;
}

function swipeRight() {
  if($('.pswp').css("display") == "none") {
    $('#linkbar').toggleClass('open');
    $('#popupBackground').toggleClass('open');
  }
}
function swipeLeft() {
  if($('.pswp').css("display") == "none") {
    $('#linkbar').removeClass('open');
    $('#popupBackground').removeClass('open');
  }
}
function swipeUp() {
}
function swipeDown() {
}


$(function() {
  
  $('#form').html($('#form-template').html());
  
  $('#form').submit(function(e) {
    $.post( "email.php", $( "#form" ).serialize() )
    .done(function() {
      $('#form').html($('#form-template').html());
      $('#form .notification').remove();
      $('#form #submit').before($('#success-template').html());
      setTimeout(function() { $('#form .notification').addClass('hideSlow'); }, 3000);
    })
    .fail(function() {
      $('#form .notification').remove();
      $('#form #submit').before($('#error-template').html());
      setTimeout(function() { $('#form .notification').addClass('hideSlow'); }, 3000);
    });

    e.preventDefault();
    
  });


	var ink, d, x, y;
	$(".ripplelink").click(function(e){
    if($(this).find(".ink").length === 0){
        $(this).prepend("<span class='ink'></span>");
    }
         
    ink = $(this).find(".ink");
    ink.removeClass("animate");
     
    if(!ink.height() && !ink.width()){
        d = Math.max($(this).outerWidth(), $(this).outerHeight());
        ink.css({height: d, width: d});
    }
     
    x = e.pageX - $(this).offset().left - ink.width()/2;
    y = e.pageY - $(this).offset().top - ink.height()/2;
     
    ink.css({top: y+'px', left: x+'px'}).addClass("animate");
  });
  

  $('#popupBackground').on('click touchstart', function(e) {
    $('#linkbar').removeClass('open');
    $('#popupBackground').removeClass('open');
  });

  $('#siteContent').on('click touchstart', function(e) {
    $('#linkbar').removeClass('open');
    $('#popupBackground').removeClass('open');
  });

  $(window).on('scroll', function(e) {
    $('#linkbar').removeClass('open');
    $('#popupBackground').removeClass('open');
    
    if($(window).scrollTop() > 20) {
      $('#contactFloatingButton').addClass('hidden');
    }
    if($(window).scrollTop() < 20) {
      $('#contactFloatingButton').removeClass('hidden');
    }
    
  });

  $('#linkBarLinks').on('swipe', function(e) {
    $('#linkbar').removeClass('open');
    $('#popupBackground').removeClass('open');
  });


  document.addEventListener('touchstart', handleTouchStart, false);
  document.addEventListener('touchmove', handleTouchMove, false);

  menuBox.init();


  linkBarFlow();
  $(window).resize(function() {
    linkBarFlow();
  });
});

var xDown = null; var yDown = null;

function handleTouchStart(evt) {
    xDown = evt.touches[0].clientX;
    yDown = evt.touches[0].clientY;
};

function handleTouchMove(evt) {
    if ( ! xDown || ! yDown ) { return; }
    var xUp = evt.touches[0].clientX;
    var yUp = evt.touches[0].clientY;
    var xDiff = xDown - xUp;
    var yDiff = yDown - yUp;

    if (Math.abs(xDiff) > Math.abs(yDiff*2)) {/*most significant*/
        if (xDiff > 0) { swipeLeft();  }
        else { swipeRight(); }
    } else if(Math.abs(yDiff) > Math.abs(xDiff*2)) {
        if (yDiff > 0) { swipeUp(); }
        else { swipeDown(); }
    }

    xDown = null; yDown = null;
};

function clamp(val, min, max) {
  return Math.min(Math.max(val, min), max);
}

menuBox = {
  element: null,
  init: function() {
    var self = menuBox;
    self.element = $('#linkbar');
    $('.toggle-menubox').click(function(e) {
      e.preventDefault();
      self.toggle();
    });
    $('.close-menubox').click(function(e) {
      e.preventDefault();
      self.close();
    });
  },
  toggle: function() {
    var self = menuBox;
    self.element.toggleClass('open');
    $('#popupBackground').toggleClass('open');
  },
  close: function() {
    var self = menuBox;
    self.element.removeClass('open');
    $('#popupBackground').removeClass('open');
  }
};
