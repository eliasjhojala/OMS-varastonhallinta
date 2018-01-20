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
      c = {};
      for(i=0;i<this.classes.length;i++){
        c[this.classes[i].id]={className:this.classes[i].name,classItems:Array()};
      }
      for((i=0;i<this.items.length;i++){
        c[this.items[i].class_id].classItems.append(this.items[i]);
      }

      for(i=0;i<this.classes.length;i++){
        current = c[this.classes[i].id]
        template = $('#item-group-sample').html()
        $(template).
      }
    }
  };
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
