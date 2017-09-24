$(function() {
  $(".own-item").click(function(){
    $(".own-item").removeClass("active");
    $(this).toggleClass("active");
  });
  $(".own-item.list-toggler").click(function(){
    $(this).siblings(".item-list").toggleClass("hidden")
  })
});
