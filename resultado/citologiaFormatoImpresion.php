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

      $result = $mysqli->query("select * from citologia where id='$id' limit 0,1");
      $data = $result->fetch_assoc();
?>
    <div class="row">
    <img src="../plantilla/images/logo.png" alt="" class="col-xs-12 col-md-12 visible-print-block">
      <div class="col-md-10">
        <h3>Resultado de Citología</h3>
      </div>
      <div class="col-md-2 text-right">
        <h1><a href="../index/citologiaResultados.php" class="btn btn-primary hidden-print "><span class="glyphicon glyphicon-menu-left" aria-="true"></span> Back</a></h1>
      </div>
    </div>
    <?php
   

     $jurisdiccion=$_SESSION['jurisdiccion'];
     $unidad_numero=$data['unidad_id'];
     $paciente_numero=$data['paciente_id'];

     $unidadesDatos = $mysqli->query("SELECT unidades.nombre, unidades.clues, municipios.nombre AS municipios_nombre, jurisdicciones.nombre AS jurisdicciones_nombre FROM unidades, jurisdicciones, municipios WHERE unidades.id='$unidad_numero' AND jurisdicciones.id=unidades.jurisdiccion_id AND jurisdicciones.municipio_id=municipios.id");
      
      $dataUnidad = $unidadesDatos->fetch_assoc();
    

      $pacienteDatos = $mysqli->query("SELECT pacientes.cicam_clave, pacientes.nombre, pacientes.apellido_pat, pacientes.apellido_mat, pacientes.entidad_nacimiento, pacientes.municipio_nacimiento, pacientes.edad, pacientes.fecha_nacimiento, pacientes.curp, pacientes.calle, pacientes.numero, pacientes.colonia, pacientes.telefono, pacientes.otro_telefono, pacientes.correo, localidades.nombre AS localidades_nombre , municipios.nombre AS municipios_nombre, delegacion, pacientes.cp, pacientes.entidad_federativa, jurisdicciones.nombre AS jurisdicciones_nombre, pacientes.tiempo_residencia, pacientes.estado_civil, pacientes.escolaridad, pacientes.ocupacion, pacientes.afiliacion, pacientes.afiliacion_otro, pacientes.num_poliza FROM pacientes,municipios, localidades, jurisdicciones WHERE pacientes.id='$paciente_numero' AND pacientes.localidad=localidades.id AND municipios.id=pacientes.municipio_id AND jurisdicciones.id=pacientes.jurisdiccion_id");

      $dataPaciente = $pacienteDatos->fetch_assoc();

    ?>
   
  <form role="form"  method="post">
    
    <div class="page-header col-md-12 col-xs-12">
        <h2>I. Identificación de la Unidad</h2>
    </div>
<div class="cuadrado">
     <div class="form-group col-md-3 col-xs-3">
        <label for="">1.- Institución:</label>
        <p>SSA</p>
     </div>

     <div class="form-group col-md-6 col-xs-6">
        <label for="">2.- Delegacion/Entidad:</label>
        <p>BAJA CALLIFNORNIA</p>
     </div>

     <div class="form-group col-md-3 col-xs-3">
        <label for="">3.- Jurisdicción:</label>
        <p><?php echo $dataUnidad['jurisdicciones_nombre'] ?></p>
     </div>

     <div class="form-group col-md-3 col-xs-3">
        <label for="">4.- Municipio:</label>
        <p><?php echo $dataUnidad['municipios_nombre'] ?></p>
     </div>
         
     <div class="form-group col-md-6 col-xs-6 ">
        <label for="unidad_id">5.- Unidad médica:</label>
        <p><?php echo $dataUnidad['nombre'] ?></p>
     </div>

     <div class="form-group col-md-3 col-xs-3">
        <label for="">6.- CLUES:</label>
        <p><?php echo $dataUnidad['clues'] ?></p>
     </div>
  </div>
       
      <div class="page-header col-md-12 col-xs-12">
          <h2>II. Identificación del Paciente</h2>
      </div>

      <!-- COMINEZA SELECT PARA PACIENTE -->
        <div class="form-group col-md-3 hidden ">
            <label for="paciente_id">Paciente:</label>
            <select name="paciente_id" id="paciente_id" class="form-control" disabled>
              <option value="-1">SELECCIONA PACIENTE</option>';
                <?php foreach ($rowsPaciente as $key) {
                if ($key['id']==$data['paciente_id']) {
                  echo '<option value="'.$key['id'].'"selected>'.$key['apellido_pat'].' '.$key['apellido_mat'].' '.$key['nombre'].'</option>';
                }else{
                   echo '<option value="'.$key['id'].'">'.$key['apellido_pat'].' '.$key['apellido_mat'].' '.$key['nombre'];
                }
                }?>
            </select>
        </div>

        <div class="form-group col-md-3 hidden">
          <label for="cicam_clave">Clave Sicam:</label>
          <input type="text" class="form-control" id="cicam_clave" name="cicam_clave" readonly>
        </div>
        <div class="form-group col-md-3 col-xs-3">
          <label for="nombre">Nombre:</label>
          <p><?php echo $dataPaciente['nombre'] ?></p>
         
        </div>

         <div class="form-group col-md-3 col-xs-3">
          <label for="apellido_pat">Apellido Paterno:</label>
          <p><?php echo $dataPaciente['apellido_pat'] ?></p>
        </div>

         <div class="form-group col-md-3 col-xs-3">
          <label for="apellido_mat">Apellido Materno:</label>
          <p><?php echo $dataPaciente['apellido_mat'] ?></p>
        </div>

        <div class="form-group col-md-3 col-xs-3">
          <label for="curp">Curp:</label>
             <p><?php echo $dataPaciente['curp'] ?></p>
        </div>

        <div class="form-group col-md-3 col-xs-3">
          <label for="entidad_nacimiento">Entidad de nacimiento:</label>
          <p><?php echo $dataPaciente['entidad_nacimiento'] ?></p>
        </div>
        
        <div class="form-group col-md-3 col-xs-3">
          <label for="municipio_nacimiento">Municipio de Naci</label>
          <p>miento:<?php echo $dataPaciente['municipio_nacimiento'] ?></p>
        </div>

        <div class="form-group col-md-3 col-xs-3">
          <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
          <p><?php echo $dataPaciente['fecha_nacimiento'] ?></p>
        </div>


        <div class="form-group col-md-3 col-xs-3">
          <label for="calle">Calle:</label>
          <p><?php echo $dataPaciente['calle'] ?></p>
        </div>

        <div class="form-group col-md-3 col-xs-3">
          <label for="numero">Número:</label>
          <p><?php echo $dataPaciente['numero'] ?></p>
        </div>
        
        <div class="form-group col-md-3 col-xs-3">
          <label for="colonia">Colonia:</label>
          <p><?php echo $dataPaciente['colonia'] ?></p>
        </div>

        <div class="form-group col-md-3 col-xs-3">
          <label for="telefono">Teléfono:</label>
          <p><?php echo $dataPaciente['telefono'] ?></p>
        </div>

        <div class="form-group col-md-3 col-xs-3">
          <label for="otro_telefono">Otro Teléfono:</label>
          <p><?php echo $dataPaciente['otro_telefono'] ?></p>
        </div>

        <div class="form-group col-md-3 col-xs-3">
          <label for="correo">Correo:</label>
          <p><?php echo $dataPaciente['correo'] ?></p>
        </div>

      <!-- COMINEZA SELECT PARA LOCALIDAD -->
        <div class="form-group col-md-3 col-xs-3">
            <label for="localidad">Localidad:</label>
            <p><?php echo $dataPaciente['localidades_nombre'] ?></p>
        </div>
      <!-- FIN DEL SELECT PARA LOCALIDAD -->
        
      <!-- EMPIEZA SELECTO MUNICIPIOS-->
        <div class="form-group col-md-3 col-xs-3">
            <label for="municipio_id">Municipio:</label>
            <p><?php echo $dataPaciente['municipios_nombre'] ?></p>
        </div>
      <!-- TERMINA SELECT MUNICIPIO-->

        <div class="form-group col-md-3 col-xs-3">
          <label for="delegacion">Delegación:</label>
          <p><?php echo $dataPaciente['delegacion'] ?></p>
        </div>

        <div class="form-group col-md-3 col-xs-3">
          <label for="cp">C.P:</label>
          <p><?php echo $dataPaciente['cp'] ?></p>
        </div>

        <div class="form-group col-md-3 col-xs-3">
          <label for="entidad_federativa">Entidad Federativa:</label>
          <p><?php echo $dataPaciente['entidad_federativa'] ?></p>
        </div>

        <div class="form-group col-md-3 col-xs-3">
          <label for="afiliacion">Afiliación:</label>
          <p><?php echo $dataPaciente['afiliacion'] ?></p>
        </div>

         <div class="form-group col-md-3 col-xs-3">
          <label for="num_poliza">Número de Poliza:</label>
          <p><?php echo $dataPaciente['num_poliza'] ?></p>
        </div>

    <div class="page-header col-md-12 col-xs-12">
        <h2>III. Antecedentes</h2>
    </div>
      <!-- COMINEZA SELECT PARA CITOLOGIA -->
        <div class="form-group col-md-3 col-xs-3">
          <label for="citologia">Citología:</label>
          <p><?php echo $data['citologia'] ?></p>
        </div>
      <!-- FIN DEL SELECT PARA CITOLOGIA -->
 
      
      <!-- COMINEZA SELECT PARA SITUACION GINECOOBSTETRICA --> 
        <div class="form-group col-md-3 col-xs-3">
          <label for="situacion_ginecoobstetrica">Situación Ginecoobstétrica:</label>
          <p><?php echo $data['situacion_ginecoobstetrica'] ?></p>
        </div>
      <!-- FIN DEL SELECT PARA SITUACION GINECOOBSTETRICA -->

        <div class="form-group col-md-3 col-xs-3">
          <label for="inicio_vida_sexual">Inicio de vida sexual:</label>
          <p><?php echo $data['inicio_vida_sexual'] ?></p>
        </div>

        <div class="form-group col-md-3 col-xs-3">
          <label for="edad_inicio_vida_sexual">Edad de inicio de vida sexual:</label>
          <p><?php echo $data['edad_inicio_vida_sexual'] ?></p>
        </div>


        <div class="form-group col-md-3 col-xs-3">
          <label for="antecedentes_vacunacion_vph">Antecedentes de vacunacion VPH:</label>
          <p><?php echo $data['antecedentes_vacunacion_vph'] ?></p>
        </div>

        <div class="form-group col-md-3 col-xs-3">
          <label for="edad_antecedentes_vacunacion_vph">Edad:</label>
          <p><?php echo $data['edad_antecedentes_vacunacion_vph'] ?></p>
        </div>

        <div class="form-group col-md-3 col-xs-3">
          <label for="dosis">Numero de dosis:</label>
          <p><?php echo $data['dosis'] ?></p>
        </div>

        <div class="form-group col-md-3 col-xs-3">
          <label for="ultima_regla">Fecha de ultima regla:</label>
          <p><?php echo $data['ultima_regla'] ?></p>
        </div>

        <div class="form-group col-md-3 col-xs-3">
          <label for="exploracion_observa">A la exploracion se observa:</label>
          <p><?php echo $data['exploracion_observa'] ?></p>
        </div>

        <div class="form-group col-md-3 col-xs-3">
          <label for="utensilio_muestra">Utensilio con el que se tomo la muestra:</label>
          <p><?php echo $data['utensilio_muestra'] ?></p>
        </div>

        <div class="form-group col-md-4 col-xs-4">
          <label for="rfc_responsable">RFC del responsable de la toma de citología:</label>
          <p><?php echo $data['rfc_responsable'] ?></p>
        </div>

        <div class="form-group col-md-4 col-xs-4">
          <label for="fecha_toma_muestra">Fecha de toma de la muestra:</label>
          <p><?php echo $data['fecha_toma_muestra'] ?></p>
        </div>

        <div class="form-group col-md-4 col-xs-4">
          <label for="factores_riesgo">Factores de riesgo:</label>
          <p><?php echo $data['factores_riesgo'] ?></p>
        </div>

        <div class="form-group col-md-4 col-xs-4">
          <label for="tiene_cartilla_salud">Cuenta con Cartilla Nacional de Salud de la Mujer:</label>
          <p><?php echo $data['tiene_cartilla_salud'] ?></p>
        </div>

        <div class="form-group col-md-4 col-xs-4">
          <label for="muestra_repetida">Muestra repetida:</label>
          <p><?php echo $data['muestra_repetida'] ?></p>
        </div>

        <div class="form-group col-md-4 col-xs-4">
          <label  for="citologico_anterior">Número citológico anterior:</label>
          <p><?php echo $data['citologico_anterior'] ?></p>
        </div>
  <!-- EMPIEZA LOS RESLULTADOS -->
        <div class="page-header col-md-12 col-xs-12">
            <h2>IV. Resultado de citología cervical</h2>
        </div>

         <div class="form-group col-md-6 col-xs-6">
          <label for="fecha_interpretacion">Fecha de interpretación:</label>
          <p><?php echo $data['fecha_interpretacion'] ?></p>
        </div>

        <div class="form-group col-md-6 col-xs-6">
          <label for="numero_citologico">Número citológico:</label>
          <p><?php echo $data['numero_citologico'] ?></p>
        </div>

        <div class="form-group col-md-6 col-xs-6">
          <label for="laboratorio">Laboratorio:</label>
          <p><?php echo $data['laboratorio'] ?></p>
        </div>

         <div class="form-group col-md-6 col-xs-6">
          <label for="caracteristicas_muestra">Características de la muestra:</label>
          <p><?php echo $data['caracteristicas_muestra'] ?></p>
        </div>

        <div class="form-group col-md-6 col-xs-6">
          <label for="diagnostico_citologico">Diagnóstico citológico:</label>
          <p><?php echo $data['diagnostico_citologico'] ?></p>
        </div>

        <div class="form-group col-md-6 col-xs-6">
          <label for="otros_hallazgos">Otros Hallazgos:</label>
          <p><?php echo $data['otros_hallazgos'] ?></p>
        </div>

        <div class="form-group col-md-3 col-xs-3">
          <label for="repetir_estudio">Repetir estudio:</label>
          <p><?php echo $data['repetir_estudio'] ?></p>
        </div>

         <div class="form-group col-md-9 col-xs-9">
          <label for="motivo_repeticion">Motivo:</label>
          <p><?php echo $data['motivo_repeticion'] ?></p>
        </div>

        <div class="form-group col-md-12 col-xs-12">
          <label for="cedula_citotecnologo">Cédula profesional del citotecnólogo (a):</label>
          <p><?php echo $data['cedula_citotecnologo'] ?></p>
        </div>

         <div class="form-group col-md-4 col-xs-4">
          <label for="revisada_patologo">La muestra fue revisada por el patólogo (a):</label>
          <p><?php echo $data['revisada_patologo'] ?></p>
        </div>

         <div class="form-group col-md-8 col-xs-8" >
          <label for="diagnostico_patologo">Diagnóstico del patólogo (a) (De acuerdo a la nomenclatura del reactivo 31):</label>
          <p><?php echo $data['diagnostico_patologo'] ?></p>
        </div>

        <div class="form-group col-md-12 col-xs-12" >
          <label for="cedula_patologo">Cédula profesional del patólogo (a):</label>
          <p><?php echo $data['cedula_patologo'] ?></p>
        </div>

        <button type="button" class="btn btn-default col-md-3 hidden">Volver</button>

    </form>

    <button onclick="myFunction()" class="btn btn-default col-md-3 hidden-print">Imprimir</button>

          <script>
          function myFunction() {
              window.print();
          }
          </script>
<?php
} else{
  echo "<script>location.href='../index/paciente.php'</script>";
}
?>
  </div>
</section>

<?php
  include("../footer.php");
?>