
function edadCalcular(Fecha){
fecha = new Date(Fecha)
hoy = new Date()
ed = parseInt((hoy -fecha)/365/24/60/60/1000)
document.getElementById('edad').value = ed;
}

// function seleccionar_todo(){ 
//    for (i=0;i<document.f1.elements.length;i++) 
//       if(document.f1.elements[i].type == "checkbox")	
//          document.f1.elements[i].checked=1 
// } 

// function deseleccionar_todo(){ 
//    for (i=0;i<document.f1.elements.length;i++) 
//       if(document.f1.elements[i].type == "checkbox")	
//          document.f1.elements[i].checked=0 
// }

function OpenInNewTab(url) {
  var win = window.open("https://docs.google.com/forms/d/1QjDVKLLvU8tjkNQZfcqA2KdzY8vCyqppslpUIVXsJXc/viewform", '_blank');
  win.focus();
}