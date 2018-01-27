var varastoData = {
  items: Array(),
  classes: Array(),
  /* Käytä vain set_* funktioita arrayiden päivittämiseen. Ne myös päivittävät html:n automaattisesti */
  set_items: function (i) {
    this.items = i;
    this.updateLists();
  },
  set_classes: function(c){
    this.classes = c;
    this.updateLists();
  },
  /* Kutsuu fuktioita oikein ja hoitaa kaiken kerralla. */
  update_all: function(){
    getArrayAsString('items', function(data){
      varastoData.set_items(JSON.parse(data));
    })
    getArrayAsString('classes', function(data){
      varastoData.set_classes(JSON.parse(data));
    })
  },
  /* Päivittää html:n */
  updateLists: function(){
    if (this.items.length>0 && this.classes.length>0){
      // Classes by some id
      c = {};
      for(i=0;i<this.classes.length;i++){
        c[this.classes[i].id]={className:this.classes[i].name,classItems:Array()};
      }
      // Add items to classes
      for(i=0;i<this.items.length;i++){
        c[this.items[i].class_id].classItems.push(this.items[i]);
      }
      // Append html class by class
      for(i=0;i<this.classes.length;i++){
        current = c[this.classes[i].id];
        console.log('index: '+i+', current: ');
        console.log(current);
        template = $($('template#item-group-sample').html());
        template.find('.counter').text(current.classItems.length);
        template.find('.name').text(current.className);
        lista = template.find('.item-list>ul');
        listaHTML = "";
        for(j=0;j<current.classItems.length;j++){
          listaHTML += '<li className="unique-item">'+current.className+' #'+current.classItems[j].name+'</li>';
        }
        lista.html(listaHTML);
        $('#reserved-tab-content').append(template);
      }
    }
  }
}


function getArrayAsString(name, handleFunction) {
  $.post("/assets/phpFunctions/mysqlFunctions.php",{"getTable":name},handleFunction);
};

$(function(){
    getArrayAsString('items', function(data){
      /*Plaseeraa shitit paikalleen*/
      items = JSON.parse(data);
      for (i=0; i<items.length;i++){
        $('#reserved-tab-content').prepend('<div class="item-group">'+items[i].name+'</div>');
      }
    });


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

});
