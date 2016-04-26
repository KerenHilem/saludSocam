<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php 
require_once '../clases/Connection.simple2.php';
  include("../head.php");
  include("../nav.php"); 

  $resultado = $mysqli->query("DELETE p1 FROM personal p1, personal p2 WHERE p1.id > p2.id and p1.curp = p2.curp and p1.rfc=p2.rfc and p1.nombre=p2.nombre and p1.apellido_pat=p2.apellido_pat and p1.apellido_mat=p2.apellido_mat and p1.sexo=p2.sexo and p1.puesto=p2.puesto and p1.correo=p2.correo and p1.tipo_recurso=p2.tipo_recurso and p1.actividad_desempena=p2.actividad_desempena and p1.area_trabajo=p2.area_trabajo and p1.fecha_ingreso_institucion=p2.fecha_ingreso_institucion and p1.clues_unidad=p2.clues_unidad and p1.jornada=p2.jornada and p1.hora_entrada=p2.hora_entrada and p1.hora_salida=p2.hora_salida and p1.dias_laborales=p2.dias_laborales and p1.escolaridad=p2.escolaridad and p1.cedula=p2.cedula and p1.tipo_contrato=p2.tipo_contrato and p1.tipo_plaza=p2.tipo_plaza and p1.creado=p2.creado and p1.modificado=p2.modificado");


?>	

</body>
</html>