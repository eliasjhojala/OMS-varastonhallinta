$(function() {
  $(".tab-button").click(function(){
    var elementName = $(this).attr('id').split("-")[0] + "-tab-content";
    $(this).parent().siblings().addClass("hidden");
    $(elementName).removeClass("hidden");
  });
});
