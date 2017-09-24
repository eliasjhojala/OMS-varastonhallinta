$(function() {
  $(".own-item").click(function(){
    $(".own-item").removeClass("active");
    $(this).toggleClass("active");
  });

});
