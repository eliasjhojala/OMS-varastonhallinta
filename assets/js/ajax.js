var request;

/*Kutsuu php-funktiota ja palauttaa sen datan arrayna*/
function getArray($func) {
  $.post("/assets/phpFunctions/mysqlFunctions.php",{"do":$func}, function(data) {
    alert(data)
  })

}

$(document).ready(function(){
    $('.subtitle').click(function(){
        if (request) {
        request.abort();
        }
        request = $.ajax({
            url: "/a-test.php",
            type: "post",
            data: "Huomenia"
        });
        request.done(function(response, status, j1XHR){
            alert(response.replace(/<br\s*[\/]?>/gi, "\n"));
        });
        request.fail(function(response, status, j1XHR){
            alert("AJAX request failed!");
        });
    });


});
