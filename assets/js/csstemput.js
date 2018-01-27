var menuBox;
function bindItemButtons(){
  $(".item-group").click(function(){
    $(".item-group").removeClass("active");
    $(this).toggleClass("active");
  });
  $(".dropdown .list-toggler").click(function(){
  	$(this).siblings(".item-list").toggleClass("hidden");
  });
  /* Select unique items and show their data in the middle */
  $(".item-list > .unique-item").click(function(){
      // mark item and unmark others
      // get id
      // selectItem(id)
  });
};

/* Shows item's data in the middle */
function selectItem(id){
  notes = Array()
  condition = 1
  /* Fill notes and condition with real data. Here are just some placeholders*/
  notes.push({time:'2018-01-12', note:'Tomi viel ihan hyvin'});
  // Somehow get the notes for item. Maybe by downlooading the whole database
  // Clear note area from notes

  for (i=0;i++,i<notes.length()){
    // Add a note
  }
}

$(function() {
  onDatabaseUpdate();

  $("#left").children(".tab-content").slice(1).addClass("hidden");
  $("#right").children(".tab-content").slice(1).addClass("hidden");

  $(".tab-button").click(function(){
    //Hide other tabs and show one
    var elementName = "#" + $(this).attr('id').split("-")[0] + "-tab-content";
    $(this).parent().siblings().addClass("hidden");
    $(elementName).removeClass("hidden");
    //Change active tab visuals
    $(this).siblings().removeClass("active")
    $(this).addClass("active")
  });


  /* Ripplelink start */
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
  /* Ripplelink end */


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

  });

  $('#linkBarLinks').on('swipe', function(e) {
    $('#linkbar').removeClass('open');
    $('#popupBackground').removeClass('open');
  });


  document.addEventListener('touchstart', handleTouchStart, false);
  document.addEventListener('touchmove', handleTouchMove, false);

  menuBox.init();


});

/* Start swipe functions */

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

/* End swipe functions */

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

function clamp(val, min, max) {
  return Math.min(Math.max(val, min), max);
}
