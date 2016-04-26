
 <?php 
 
$server = "localhost";
$user = "root";
$pass = "";
$bd = "salud";
 
//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass,$bd) 
or die("Ha sucedido un error inexperado en la conexion de la base de datos");
 
//generamos la consulta
// $sql = "SELECT id, unix_timestamp(creado) AS creado, unix_timestamp(modificado) AS modificado FROM citologia";

$sql = "SELECT DISTINCT citologia.id, unidades.nombre AS unidades_nombre, pacientes.apellido_pat, pacientes.apellido_mat, pacientes.nombre, citologia.citologia, citologia.rfc_responsable, citologia.fecha_toma_muestra, citologia.estatus, unix_timestamp(citologia.creado) AS creado FROM jurisdicciones,pacientes, citologia INNER JOIN unidades ON citologia.unidad_id = unidades.id WHERE citologia.paciente_id = pacientes.id";

mysqli_set_charset($conexion, "utf8"); //formato de datos utf8
 
if(!$result = mysqli_query($conexion, $sql)) die();
 
$out = array(); //creamos un array
 
while($row = mysqli_fetch_array($result)) 
{ 
    $id=$row['id'];
    $title="Citología: "." ".$row['apellido_pat']." ".$row['apellido_mat']." ".$row['nombre'];
    $url="http://localhost/salud/resultado/citologia-formato-online.php?id=";
    if ($row['estatus']=='ENTREGADO') {
    	$class='event-success';
    }else {
    	$class='event-info';
    }
    $start=$row['creado'];
    $end=$row['creado'];
    
    
    $out[] = array('id'=> $id, 'title'=> $title, 'url'=> $url.$id, 'class'=> $class,
                        'start'=> $start.'000', 'end'=> $end.'000');
 
}
echo json_encode(array('success' => 1, 'result' => $out));
exit;    
//desconectamos la base de datos
$close = mysqli_close($conexion) 
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
  
 
//Creamos el JSON
$json_string = json_encode($out);
echo $json_string;

//Si queremos crear un archivo json, sería de esta forma:

// $file = 'out.json';
// file_put_contents($file, $json_string);

    
 
?>