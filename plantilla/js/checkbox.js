 window.onload = function() {
    
  if (document.getElementById('checkbox_auto_des_completar')) {

    document.getElementById('checkbox_auto_des_completar').onclick = function(){ 
       for (i=0;i<document.f1.elements.length;i++) 
          if(document.f1.elements[i].type == "checkbox")  
             document.f1.elements[i].checked=1 
    } 
  }

    // function deseleccionar_todo(){ 
    //    for (i=0;i<document.f1.elements.length;i++) 
    //       if(document.f1.elements[i].type == "checkbox")  
    //          document.f1.elements[i].checked=0 
    // }

}
