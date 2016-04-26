<?php
  require_once '../clases/Connection.simple2.php';
  include("../head.php");
  include("../nav.php");
?>
<section>
<div class="container">
 <div class="row">
      <div class="col-md-10"> <h3>Agregar Personal</h3> </div>
      <div class="col-md-2 text-right">
        <h1><a href="../index/personal.php" class="btn btn-primary"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Back</a></h1>
      </div>
    </div>
    <?php
    if(isset($_POST['submit'])){
      
        $curp                       = $_POST['curp'];
        $rfc                        = $_POST['rfc'];
        $nombre                     = $_POST['nombre'];
        $apellido_pat               = $_POST['apellido_pat'];
        $apellido_mat               = $_POST['apellido_mat'];
        $sexo                       = $_POST['sexo'];
        $puesto                     = $_POST['puesto'];
        $correo                     = $_POST['correo'];
        $tipo_recurso               = $_POST['tipo_recurso'];
        $actividad_desempena        = $_POST['actividad_desempena'];
        $area_trabajo               = $_POST['area_trabajo'];
        $fecha_ingreso_institucion  = $_POST['fecha_ingreso_institucion'];
        $clues_unidad               = $_POST['clues_unidad'];
        $jornada                    = $_POST['jornada'];
        $hora_entrada               = $_POST['hora_entrada'];
        $hora_salida                = $_POST['hora_salida'];
        $dias_laborales             = $_POST['dias_laborales'];
        $escolaridad                = $_POST['escolaridad'];
        $cedula                     = $_POST['cedula'];
        $tipo_contrato              = $_POST['tipo_contrato'];
        $tipo_plaza                 = $_POST['tipo_plaza'];

     $existe_personal = $mysqli->query("SELECT * FROM personal WHERE rfc='$rfc'");

      if (mysqli_num_rows($existe_personal)>0)
      {
        // echo 'Exite al menos un registro';
        
        echo '<div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>Ya Existe el Paciente Verique los Datos!</strong> Error.
              </div>';
       
      }
       else {
        echo ' No existe, crear registro ';
       
        $query = $mysqli->query("insert into personal values('','$curp','$rfc','$nombre','$apellido_pat','$apellido_mat','$sexo','$puesto','$correo','$tipo_recurso','$actividad_desempena','$area_trabajo','$fecha_ingreso_institucion','$clues_unidad','$jornada','$hora_entrada','$hora_salida','$dias_laborales','$escolaridad','$cedula','$tipo_contrato','$tipo_plaza',NOW(),NOW())"); 
        
        if($query){ 
        ?>
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Éxito!</strong> Datos Añadidos.
        </div>
        <?php
      } else{
        ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Se produjo un error en la base de datos!</strong> Error.
        </div>
        <?php
      }}
    }

    $rowsUnidad = $mysqli->query("SELECT clues, nombre FROM unidades ORDER by nombre");
    $rowsTipodeRecurso = $mysqli->query("SELECT DISTINCT tipo_recurso FROM personal WHERE tipo_recurso !='NULL' ORDER BY tipo_recurso");
    $rowsActividadDesempena = $mysqli->query("SELECT DISTINCT actividad_desempena FROM personal WHERE actividad_desempena !='NULL' ORDER BY actividad_desempena");
    $rowsAreaDeTrabajo = $mysqli->query("SELECT DISTINCT area_trabajo FROM personal WHERE area_trabajo !='NULL' ORDER BY area_trabajo");
    $rowsJornada = $mysqli->query("SELECT DISTINCT jornada FROM personal WHERE jornada !='NULL' ORDER BY jornada");
    $rowsDiasLaborales = $mysqli->query("SELECT DISTINCT dias_laborales FROM personal WHERE dias_laborales !='NULL' ORDER BY dias_laborales");
    $rowsEscolaridad = $mysqli->query("SELECT DISTINCT escolaridad FROM personal WHERE escolaridad !='NULL' ORDER BY escolaridad");
    $rowsTipoContrato = $mysqli->query("SELECT DISTINCT tipo_contrato FROM personal WHERE tipo_contrato !='NULL' ORDER BY tipo_contrato");
    $rowsTipoPlaza = $mysqli->query("SELECT DISTINCT tipo_plaza FROM personal WHERE tipo_plaza !='NULL' ORDER BY tipo_plaza");

    ?>

    <form role="form"  method="post">
     
      <!-- COMINEZA SELECT PARA UNIDADES -->
        <div class="form-group col-md-3">
            <label for="clues_unidad">Unidad:</label>
            <select name="clues_unidad" class="form-control" >
              <option value="-1">SELECCIONA UNIDAD</option>';
                <?php foreach ($rowsUnidad as $key) {
                  echo '<option value="'.$key['clues'].'">'.$key['nombre'].'</option>';
                }?>
            </select>
        </div>
      <!-- FIN DEL SELECT PARA UNIDADES -->

        <div class="form-group col-md-3">
          <label for="nombre">Nombre:</label>
          <input type="text" class="form-control" id="nombre" name="nombre" onKeyUp="this.value=this.value.toUpperCase();" required>
        </div>

         <div class="form-group col-md-3">
          <label for="apellido_pat">Apellido Paterno:</label>
          <input type="text" class="form-control" id="apellido_pat" name="apellido_pat" onKeyUp="this.value=this.value.toUpperCase();" required>
        </div>

         <div class="form-group col-md-3">
          <label for="apellido_mat">Apellido Materno:</label>
          <input type="text" class="form-control" id="apellido_mat" name="apellido_mat" onKeyUp="this.value=this.value.toUpperCase();" required>
        </div>

        <div class="form-group col-md-3">
            <label for="sexo">Sexo:</label>
            <select name="sexo" class="form-control" >
              <option value="-1">SELECCIONE SEXO</option>
              <option value="H">H</option>
              <option value="M">M</option>
            </select>
        </div>

        <div class="form-group col-md-3">
          <label for="curp">Curp:</label>
          <input type="text" class="form-control" id="curp" name="curp" onKeyUp="this.value=this.value.toUpperCase();">
        </div>

        <div class="form-group col-md-3">
          <label for="rfc">RFC:</label>
          <input type="text" class="form-control" id="rfc" name="rfc" onKeyUp="this.value=this.value.toUpperCase();" required>
        </div>
        
        <div class="form-group col-md-3">
          <label for="cedula">Cédula:</label>
          <input type="text" class="form-control" id="cedula" name="cedula" Value="NO CAPTURADA" onKeyUp="this.value=this.value.toUpperCase();">
        </div>

        <div class="form-group col-md-3">
          <label for="tel">Teléfono:</label>
          <input type="tel" class="form-control" id="tel" name="tel" placeholder="Ej. 686552477" >
        </div>

        <div class="form-group col-md-3">
          <label for="puesto">Puesto:</label>
          <input type="text" class="form-control" id="puesto" name="puesto" placeholder="Introduce Puesto" onKeyUp="this.value=this.value.toUpperCase();" required>
        </div>

        <div class="form-group col-md-3">
          <label for="correo">Email:</label>
          <input type="email" class="form-control" id="correo" name="correo" placeholder="Ej. Juan21@gmail.com" >
        </div>

      <!-- COMINEZA SELECT PARA TIPO DE RECURSO -->
        <div class="form-group col-md-3">
            <label for="tipo_recurso">Tipo de Recurso:</label>
            <select name="tipo_recurso" class="form-control" >
              <option value="-1">SELECCIONA TIPO DE RECURSO</option>';
                <?php foreach ($rowsTipodeRecurso as $key) {
                  echo '<option value="'.$key['tipo_recurso'].'">'.$key['tipo_recurso'].'</option>';
                }?>
            </select>
        </div>
      <!-- FIN DEL SELECT PARA TIPO DE RECURSO -->

      <!-- COMINEZA SELECT PARA ACTIVIDAD DESEMPENA -->
        <div class="form-group col-md-3">
            <label for="actividad_desempena">Actividad que desempeña:</label>
            <select name="actividad_desempena" class="form-control" >
              <option value="-1">Actividad que desempeña</option>';
                <?php foreach ($rowsActividadDesempena as $key) {
                  echo '<option value="'.$key['actividad_desempena'].'">'.$key['actividad_desempena'].'</option>';
                }?>
            </select>
        </div>
      <!-- FIN DEL SELECT PARA ACTIVIDAD DESEMPENA -->

      <!-- COMINEZA SELECT PARA AREA DE TRABAJO -->
        <div class="form-group col-md-3">
            <label for="area_trabajo">Area de trabajo:</label>
            <select name="area_trabajo" class="form-control" >
              <option value="-1">Area de trabajo</option>';
                <?php foreach ($rowsAreaDeTrabajo as $key) {
                  echo '<option value="'.$key['area_trabajo'].'">'.$key['area_trabajo'].'</option>';
                }?>
            </select>
        </div>
      <!-- FIN DEL SELECT PARA AREA DE TRABAJO -->

        <div class="form-group col-md-3">
          <label for="fecha_ingreso_institucion">Fecha de Ingreso Institución:</label>
          <input type="date" class="form-control" id="fecha_ingreso_institucion" name="fecha_ingreso_institucion" required>
        </div>

      <!-- COMINEZA SELECT PARA JORNADA -->
        <div class="form-group col-md-3">
            <label for="jornada">Jornada:</label>
            <select name="jornada" class="form-control" >
              <option value="-1">Elije Jornada</option>';
                <?php foreach ($rowsJornada as $key) {
                  echo '<option value="'.$key['jornada'].'">'.$key['jornada'].'</option>';
                }?>
            </select>
        </div>
      <!-- FIN DEL SELECT PARA JORNADA -->

        <div class="form-group col-md-3">
          <label for="hora_entrada">Hora de Entrada:</label>
          <input type="time" class="form-control" id="hora_entrada" name="hora_entrada" placeholder="" required>
        </div>

        <div class="form-group col-md-3">
          <label for="hora_salida">Hora de Salida:</label>
          <input type="time" class="form-control" id="hora_salida" name="hora_salida" placeholder="" required>
        </div>

      <!-- COMINEZA SELECT PARA DIAS LABORALES -->
        <div class="form-group col-md-3">
            <label for="dias_laborales">Dias Laborales:</label>
            <select name="dias_laborales" class="form-control" >
              <option value="-1">Elije Lista</option>';
                <?php foreach ($rowsDiasLaborales as $key) {
                  echo '<option value="'.$key['dias_laborales'].'">'.$key['dias_laborales'].'</option>';
                }?>
            </select>
        </div>
      <!-- FIN DEL SELECT PARA DIAS LABORALES -->

      <!-- COMINEZA SELECT PARA ESCOLARIDAD -->
        <div class="form-group col-md-3">
            <label for="escolaridad">Escolaridad:</label>
            <select name="escolaridad" class="form-control" >
              <option value="-1">Elije Lista</option>';
                <?php foreach ($rowsEscolaridad as $key) {
                  echo '<option value="'.$key['escolaridad'].'">'.$key['escolaridad'].'</option>';
                }?>
            </select>
        </div>
      <!-- FIN DEL SELECT PARA ESCOLARIDAD -->

      <!-- COMINEZA SELECT PARA TIPO DE CONTRATO -->
        <div class="form-group col-md-3">
            <label for="tipo_contrato">Tipo de Contrato:</label>
            <select name="tipo_contrato" class="form-control" >
              <option value="-1">Elije Lista</option>';
                <?php foreach ($rowsTipoContrato as $key) {
                  echo '<option value="'.$key['tipo_contrato'].'">'.$key['tipo_contrato'].'</option>';
                }?>
            </select>
        </div>
      <!-- FIN DEL SELECT PARA TIPO DE CONTRATO -->

            <!-- COMINEZA SELECT PARA TIPO DE CONTRATO -->
        <div class="form-group col-md-3">
            <label for="tipo_plaza">Tipo de Plaza:</label>
            <select name="tipo_plaza" class="form-control" >
              <option value="-1">Elije Lista</option>';
                <?php foreach ($rowsTipoPlaza as $key) {
                  echo '<option value="'.$key['tipo_plaza'].'">'.$key['tipo_plaza'].'</option>';
                }?>
            </select>
        </div>
      <!-- FIN DEL SELECT PARA TIPO DE CONTRATO -->

        <button type="submit" class="btn btn-default" name="submit">Enviar</button>
    </form>
  </div>
</section>
<?php
  include("../footer.php");
?>