<?php
  require_once '../clases/Connection.simple2.php';
  include("../head.php");
  include("../nav.php");
?>
<section>
  <div class="container">
  <?php
   $id = $_GET['id'];
if(isset($id)){

      $result = $mysqli->query("select * from personal where id='$id' limit 0,1");
      $data = $result->fetch_assoc();
?>
    <div class="row">
      <div class="col-md-10">
        <h1>Actualización de Datos</h1>
      </div>
      <div class="col-md-2 text-right">
        <h1><a href="../index/personal.php" class="btn btn-primary"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Back</a></h1>
      </div>
    </div>
    <?php
    if(isset($_POST['submit'])){
      $clues_unidad     = $_POST['clues_unidad'];
      $nombre           = $_POST['nombre'];
      $apellido_pat     = $_POST['apellido_pat'];
      $apellido_mat     = $_POST['apellido_mat'];
      $rfc              = $_POST['rfc'];
      $cedula           = $_POST['cedula'];
      $puesto           = $_POST['puesto'];
      $contrato         = $_POST['contrato'];
      $correo           = $_POST['correo'];
      
      $query = $mysqli->query("update personal set nombre='$nombre', apellido_pat='$apellido_pat', apellido_mat='$apellido_mat', rfc='$rfc' , cedula = $cedula, modificado = NOW() where id='$id'");
      if($query){
        ?>
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Éxito!</strong> Datos Actualizados.
        </div>
        <?php
      } else{
        ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Alerta!</strong> Faltan Datos.
        </div>
        <?php
      }
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

    <form method="post">

      <!-- COMINEZA SELECT PARA UNIDADES -->
        <div class="form-group col-md-3">
            <label for="clues_unidad">Unidad:</label>
            <select name="clues_unidad" class="form-control" >
              <option value="-1">SELECCIONA UNIDAD</option>';
                <?php foreach ($rowsUnidad as $key) {
                  if ($key['clues']==$data['clues_unidad']) {
                    echo '<option value="'.$key['clues'].'" selected>'.$key['nombre'].'</option>';
                  }else
                  echo '<option value="'.$key['clues'].'">'.$key['nombre'].'</option>';
                }?>
            </select>
        </div>
      <!-- FIN DEL SELECT PARA UNIDADES -->

        <div class="form-group col-md-3">
          <label for="nombre">Nombre:</label>
          <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $data['nombre'] ?>" required>
        </div>

         <div class="form-group col-md-3">
          <label for="apellido_pat">Apellido Paterno:</label>
          <input type="text" class="form-control" id="apellido_pat" name="apellido_pat" value="<?php echo $data['apellido_pat'] ?>" required>
        </div>

         <div class="form-group col-md-3">
          <label for="apellido_mat">Apellido Materno:</label>
          <input type="text" class="form-control" id="apellido_mat" name="apellido_mat" value="<?php echo $data['apellido_mat'] ?>" required>
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
          <input type="text" class="form-control" id="curp" name="curp" value="<?php echo $data['curp'] ?>" required>
        </div>

        <div class="form-group col-md-3">
          <label for="rfc">RFC:</label>
          <input type="text" class="form-control" id="rfc" name="rfc" value="<?php echo $data['rfc'] ?>" required>
        </div>
        
        <div class="form-group col-md-3">
          <label for="cedula">Cédula:</label>
          <input type="text" class="form-control" id="cedula" name="cedula" value="<?php echo $data['cedula'] ?>" required>
        </div>

        <div class="form-group col-md-3">
          <label for="telefono">Teléfono:</label>
          <input type="tel" class="form-control" id="telefono" name="telefono" value="55524" required>
        </div>

        <div class="form-group col-md-3">
          <label for="puesto">Puesto:</label>
          <input type="text" class="form-control" id="puesto" name="puesto" value="<?php echo $data['puesto'] ?>" required>
        </div>

        <div class="form-group col-md-3">
          <label for="correo">Email:</label>
          <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $data['correo'] ?>" required>
        </div>

      <!-- COMINEZA SELECT PARA TIPO DE RECURSO -->
        <div class="form-group col-md-3">
            <label for="tipo_recurso">Tipo de Recurso:</label>
            <select name="tipo_recurso" class="form-control" >
              <option value="-1">SELECCIONA TIPO DE RECURSO</option>';
                <?php foreach ($rowsTipodeRecurso as $key) {
                  if ($key['tipo_recurso']==$data['tipo_recurso']) {
                    echo '<option value="'.$key['tipo_recurso'].'" selected>'.$key['tipo_recurso'].'</option>';
                  }else
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
                if ($key['actividad_desempena']==$data['actividad_desempena']) {
                    echo '<option value="'.$key['actividad_desempena'].'" selected>'.$key['actividad_desempena'].'</option>';
                  }else
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
                  if ($key['area_trabajo']==$data['area_trabajo']) {
                    echo '<option value="'.$key['area_trabajo'].'" selected>'.$key['area_trabajo'].'</option>';
                  }else
                  echo '<option value="'.$key['area_trabajo'].'">'.$key['area_trabajo'].'</option>';
                }?>
            </select>
        </div>
      <!-- FIN DEL SELECT PARA AREA DE TRABAJO -->

        <div class="form-group col-md-3">
          <label for="fecha_ingreso_institucion">Fecha de Ingreso Institución:</label>
          <input type="date" class="form-control" id="fecha_ingreso_institucion" name="fecha_ingreso_institucion" value="<?php echo $data['fecha_ingreso_institucion'] ?>" required>
        </div>

      <!-- COMINEZA SELECT PARA JORNADA -->
        <div class="form-group col-md-3">
            <label for="jornada">Jornada:</label>
            <select name="jornada" class="form-control" >
              <option value="-1">Elije Jornada</option>';
                <?php foreach ($rowsJornada as $key) {
                if ($key['jornada']==$data['jornada']) {
                    echo '<option value="'.$key['jornada'].'" selected>'.$key['jornada'].'</option>';
                  }else
                  echo '<option value="'.$key['jornada'].'">'.$key['jornada'].'</option>';
                }?>
            </select>
        </div>
      <!-- FIN DEL SELECT PARA JORNADA -->

        <div class="form-group col-md-3">
          <label for="hora_entrada">Hora de Entrada:</label>
          <input type="time" class="form-control" id="hora_entrada" name="hora_entrada" value="<?php echo $data['hora_entrada'] ?>" required>
        </div>

        <div class="form-group col-md-3">
          <label for="hora_salida">Hora de Salida:</label>
          <input type="time" class="form-control" id="hora_salida" name="hora_salida" value="<?php echo $data['hora_salida'] ?>" required>
        </div>

      <!-- COMINEZA SELECT PARA DIAS LABORALES -->
        <div class="form-group col-md-3">
            <label for="dias_laborales">Dias Laborales:</label>
            <select name="dias_laborales" class="form-control" >
              <option value="-1">Elije Lista</option>';
                <?php foreach ($rowsDiasLaborales as $key) {
                  if ($key['dias_laborales']==$data['dias_laborales']) {
                    echo '<option value="'.$key['dias_laborales'].'" selected>'.$key['dias_laborales'].'</option>';
                  }else
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
                  if ($key['escolaridad']==$data['escolaridad']) {
                    echo '<option value="'.$key['escolaridad'].'" selected>'.$key['escolaridad'].'</option>';
                  }else
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
                  if ($key['tipo_contrato']==$data['tipo_contrato']) {
                    echo '<option value="'.$key['tipo_contrato'].'" selected>'.$key['tipo_contrato'].'</option>';
                  }else
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
                if ($key['tipo_plaza']==$data['tipo_plaza']) {
                    echo '<option value="'.$key['tipo_plaza'].'" selected>'.$key['tipo_plaza'].'</option>';
                  }else
                  echo '<option value="'.$key['tipo_plaza'].'">'.$key['tipo_plaza'].'</option>';
                }?>
            </select>
        </div>
      <!-- FIN DEL SELECT PARA TIPO DE CONTRATO -->
        
        <button type="submit" class="btn btn-default" name="submit">Actualizar</button>
    </form>
<?php
} else{
  echo "<script>location.href='../index/personal.php'</script>";
}
?>
  </div>
</section>

<?php
  include("../footer.php");
?>