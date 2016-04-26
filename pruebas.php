<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
 
<script language="JavaScript">
function edadCalcular(Fecha){
fecha = new Date(Fecha)
hoy = new Date()
ed = parseInt((hoy -fecha)/365/24/60/60/1000)
document.getElementById('edad').value = ed;
}
</script>
</head>

<body>

 <div class="form-group col-md-3">
          <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
          <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" onchange="edadCalcular(this.value)"/>
        </div>

         <div class="form-group col-md-3">
          <label for="edad">Edad:</label>
          <input type="number" class="form-control" id="edad" name="edad" >
        </div>

</body>
</html>