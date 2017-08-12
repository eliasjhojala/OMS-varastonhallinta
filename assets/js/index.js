var linkBarAlpha;
var popup;
var menuBox;

function smallDisplay() {
  return $(window).width() < 888;
}

$(function() {
  if ($(window).width() > 800) {
      $('#teaserVideo').html('<source src="/assets/media/teasers/teaser.mp4" type="video/mp4">');
      $('#teaserImage').html('<img src="/assets/media/teasers/teaser_still_fullHd.jpg">');
  } else if ($(window).width() > 600) {
      $('#teaserVideo').html('<source src="/assets/media/teasers/teaser_LowRes.mp4" type="video/mp4">');
      $('#teaserImage').html('<img src="/assets/media/teasers/teaser_still_LowRes.jpg">');
  } else {
      $('#teaserVideo').html('<source src="/assets/media/teasers/teaser_LowRes2.mp4" type="video/mp4">');
      $('#teaserImage').html('<img src="/assets/media/teasers/teaser_still_LowRes.jpg">');
  }
  

  linkBarAlpha.init();
  popup.init();
  menuBox.init();
  
   $("video").bind("contextmenu",function(){
       return false;
   });
  
  $('video').animate({volume: 0.05}, 1);
  
  $('video').bind("timeupdate", function() {
    if(this.currentTime >= 10) {
      $('video').animate({volume: 0}, 1000);
      $('#teaserImage img').fadeTo(1000, 1);
    }
    if(this.currentTime >= 11) {
      this.pause();
      $(document).off('touchstart click');
      $('video, playbutton').off('touchstart click');
    }
  });
  
  function playVideo() {
    $('video').get(0).play();
  }
  $('video, playButton').click(playVideo);
  
  $(document).on('touchstart click', playVideo);
  
  $('video').on('play', function () {
    $('.playButton').css("display", "none")
  });
  function playButtonLocation() {
    var value = $('#teaser').height() / 2 - 35;
    if (smallDisplay()) value += $('#linkbar').outerHeight();
    $('.playButton').css("top", value + "px");
  }
  function linkBarFlow() {
    if (smallDisplay()) {
      $('.black').css('padding-top', $('#linkbar').outerHeight() + "px");
    } else {
      $('.black').css('padding-top', '0');
    }
  }
  playButtonLocation();
  linkBarFlow();
  $(window).resize(function() {
    playButtonLocation();
    linkBarFlow();
  });
});

function clamp(val, min, max) {
  return Math.min(Math.max(val, min), max);
}

linkBarAlpha = {
  linkbar: null,
  teaser: null,
  top: null,
  bottom: 1,
  originalColor: null,
  init: function() {
    var self = linkBarAlpha;
    self.linkbar = $('#linkbar');
    self.teaser = $('#teaser');
    self.top = self.linkbar.css("background-color");
    self.originalColor = self.top.replace(/rgba\((.+),.+\)/, '$1');
    self.top = Number(self.top.replace(/^.*,(.+)\)/,'$1'));
    $( window ).on('scroll resize', self.set);
    self.set();
  },
  set: function() {
    var self = linkBarAlpha;
    var color = "rgba(" + self.originalColor + ", " + self.getAlpha() + ")";
    self.linkbar.css("background-color", color);
  },
  getAlpha: function() {
    var self = linkBarAlpha;
    if (smallDisplay()) return 1;
    var end = self.teaser.height() - self.linkbar.outerHeight();
    var start = end * 0.6;
    var current = $(window).scrollTop();
    end -= start;
    current -= start;
    return clamp(current / end, 0, 1) * (self.bottom - self.top) + self.top;
  }
};

popup = {
  element: null,
  backgroundElement: null,
  contentElement: null,
  titleElement: null,
  init: function() {
    var self = popup;
    self.element = $('#popup');
    self.backgroundElement = $('#popupBackground');
    self.contentElement = $('#popupContent');
    self.titleElement = $('#popup-title');
    $('.open-popup').click(function(e) {
      e.preventDefault();
      var me = $(this);
      self.show(me.data('popup-url'), me.data('title'));
    });
    $('.close-popup').click(function(e) {
      e.preventDefault();
      self.hide();
    });
  },
  show: function(contentUrl, title) {
    var self = popup;
    self.contentElement.load(contentUrl);
    self.titleElement.html(title);
    self.backgroundElement.addClass('open');
    self.element.addClass('open');
    $(document).keyup(function (e) {
      if (e.keyCode == 27) self.hide(); // ESC
    });
  },
  hide: function() {
    var self = popup;
    self.backgroundElement.removeClass('open');
    self.element.removeClass('open');
    self.contentElement.html("");
    $(document).off('keyup');
  }
};


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
  },
  close: function() {
    var self = menuBox;
    self.element.removeClass('open');
  }
};
