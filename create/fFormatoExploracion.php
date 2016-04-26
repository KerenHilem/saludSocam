<?php
require_once '../clases/Connection.simple2.php';
include("../head.php");
include("../nav.php");
?>
<section>
  <div class="container">
   <div class="row">
    <h2 class="col-md-10">Exploración Clínica</h2>
    <div class="col-md-2 text-right">
      <h1><a href="../index/home.php" class="btn btn-primary"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Back</a></h1>
    </div>
  </div>
  <?php
    //variables de sesion
      $jurisdiccion=$_SESSION['jurisdiccion'];//consultar datos de unidades
      $unidad_numero=$_SESSION['unidad_id']; //id que se guarda en citología, a su vez sirve para filtrar busquedas    

      $edad = $_POST['edad'];
      if(isset($_POST['submit'])){
        if($_SESSION['nivel']==1 || $_SESSION['nivel']==2){  
          $unidad_id= $_POST['unidad_id'];
        }else if ($_SESSION['nivel']==3 || $_SESSION['nivel']==4) {
          $unidad_id= $unidad_numero;
        }

        include("../create/datosPaciente.php");
        include("../create/exploracionClinica.php");

      }

      //USO POSTERIOR
      $establecerFecha = $mysqli->query("INSERT INTO envios_fechas VALUES ('', (SELECT MAX(id) AS id FROM 
      citologia), NOW(),NULL, NULL,NULL)");//crear variable global para conservar id de citologia en la que 
      //estamos trabajando

      if($_SESSION['nivel']==1){
        $rowsUnidad = $mysqli->query("SELECT id, nombre FROM unidades ORDER by nombre");
      }
      else if($_SESSION['nivel']==2 || $_SESSION['nivel']==3 || $_SESSION['nivel']==4){
        $rowsUnidad = $mysqli->query("SELECT id, nombre FROM unidades where jurisdiccion_id='$jurisdiccion' ORDER by nombre");
      }
      $rowsPaciente = $mysqli->query("SELECT id, apellido_pat, apellido_mat, nombre FROM pacientes ORDER BY apellido_pat");

      $unidadesDatos = $mysqli->query("SELECT unidades.nombre, unidades.clues, municipios.nombre AS municipios_nombre, 
        jurisdicciones.nombre AS jurisdicciones_nombre FROM unidades, jurisdicciones, municipios WHERE unidades.id='$unidad_numero' 
        AND jurisdicciones.id=unidades.jurisdiccion_id AND jurisdicciones.municipio_id=municipios.id");
      
      $dataUnidad = $unidadesDatos->fetch_assoc();

      $rowsJurisdiccion     = $mysqli->query("SELECT id, nombre FROM jurisdicciones ORDER by nombre");
      $rowsMunicipio        = $mysqli->query("SELECT id, nombre FROM municipios ORDER by nombre");
      $rowsLocalidad        = $mysqli->query("SELECT id, nombre FROM localidades ORDER by nombre");
      
      if($_SESSION['nivel']==1){
        $rowsUnidad = $mysqli->query("SELECT id, nombre FROM unidades ORDER by nombre");
      }else  if($_SESSION['nivel']==2){
       $rowsUnidad = $mysqli->query("SELECT id, nombre FROM unidades where jurisdiccion_id='$jurisdiccion' ORDER by nombre");
     }

       //VALIDACION DE FORMULARIOS A MOSTRAR
     include("../create/fDatosUnidad.php");
     include("../create/fDatosPaciente.php");
     include("../create/fExploracionClinica.php");
     echo "<button type='submit' class='btn btn-primary col-md-3' name='submit'>Capturar Detección</button>";
     ?>       
   </form>
 </div>
</section>
<?php
include("../footer.php");
?>