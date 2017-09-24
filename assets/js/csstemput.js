$(function() {
  $(".own-item").click(function(){
    $(".own-item").removeClass("active");
    $(this).toggleClass("active");
  });
  $(".dropdown .list-toggler").click(function(){
  	$(this).siblings(".item-list").toggleClass("hidden");
  });
});
