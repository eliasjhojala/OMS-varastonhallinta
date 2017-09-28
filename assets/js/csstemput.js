$(function() {
  $(".item-group").click(function(){
    $(".item-group").removeClass("active");
    $(this).toggleClass("active");
  });
  $(".dropdown .list-toggler").click(function(){
  	$(this).siblings(".item-list").toggleClass("hidden");
  });


  $("#left").children(".tab-content").slice(2).addClass("hidden");
  $("#right").children(".tab-content").slice(2).addClass("hidden");

  $(".tab-button").click(function(){
    //Hide other tabs and show one
    var elementName = "#" + $(this).attr('id').split("-")[0] + "-tab-content";
    $(this).parent().siblings().addClass("hidden");
    $(elementName).removeClass("hidden");
    //Change active tab visuals
    $(this).sibling().removeClass("active")
    $(this).addClass("active")
  });

});
