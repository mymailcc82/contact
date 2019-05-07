

function allcheck( tf, className ) {
   //var ElementsCount = document.adminform.elements.length; // チェックボックスの数
   var ElementsCount = document.getElementsByClassName(className).length


   for( i=0 ; i<ElementsCount ; i++ ) {
      document.getElementsByClassName(className)[i].checked = tf; // ON・OFFを切り替え
   }
}
