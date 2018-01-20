var varastoData = {
  items: Array(),
  classes: Array(),
  set_items: function (i) {
    this.items = i;
    this.updateLists();
  },
  set_classes: function(c){
    this.classes = c;
    this.updateLists();
  },
  updateLists: function(){
    if (this.items.length>0 && this.classes.length>0){
      console.log('Alkutesti läpi, jatketaan...')
      c = {};
      for(i=0;i<this.classes.length;i++){
        c[this.classes[i].id]={className:this.classes[i].name,classItems:Array()};
      }
      for(i=0;i<this.items.length;i++){
        c[this.items[i].class_id].classItems.push(this.items[i]);
      }
      console.log(c)
      for(i=0;i<this.classes.length;i++){
        current = c[this.classes[i].id];
        console.log('index: '+i+', current: ')
        console.log(current)
        template = $('#item-group-sample').children('.item-group').clone();
        template.find('.counter').text(current.classItems.length);
        lista = template.find('.item-list>ul');
        listaHTML = ""
        for(j=0;j<current.classItems.length;j++){
          listaHTML += '<li className="unique-item">'+current.name+' #'+current.classItems[j].id+'</li>';
        }
        lista.html(listaHTML);
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
});
