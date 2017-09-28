$(function() {
  $(".item-group").click(function(){
    $(".item-group").removeClass("active");
    $(this).toggleClass("active");
  });
  $(".dropdown .list-toggler").click(function(){
  	$(this).siblings(".item-list").toggleClass("hidden");
  });
});
