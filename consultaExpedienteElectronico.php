<?php
    $numero      = $_POST["numero_expediente_electronico"];

    if(isset($numero)){
require 'lib/nusoap.php';
$oSoapClient =new nusoap_client("http://www.saludbc.gob.mx:8080/ServiciosWeb/WSEsiap.asmx?wsdl",true);

$response=$oSoapClient->call('ExpedienteProgramaCancer',array("sExpediente" =>	$numero));


$var=$response['ExpedienteProgramaCancerResult'];

$xml = simplexml_load_string($var);

//datos de la unidad sacados del expediente electrónico
$institucion	 		= (string) $xml->Institucio;
$entidad_unidad 		= (string) $xml->Entidad;
$jurisdicciones_nombre 	= (string) $xml->Jurisdiccion;
$municipios_nombre 		= (string) $xml->Municipio;
$unidad_nombre 			= (string) $xml->CentroSalud;
$clues 					= (string) $xml->Clues;

//datos del paciente del expediente electrónico
$nombre_paciente 		= (string) $xml->NombreUsuario;
$apellido_pat 			= (string) $xml->ApaternoUsuario;
$apellido_mat 			= (string) $xml->AmaternoUsuario;
$entidad_nacimiento 	= (string) $xml->EntidadNacimiento;
$curp 					= (string) $xml->Curp;
$fecha_nacimiento 		= (string) $xml->FechaNacimiento;
$fecha_nacimiento = date("Y-m-d", strtotime($fecha_nacimiento));
$edad 					= (string) $xml->Edad;
$estado_domicilio 		= (string) $xml->EstadoDomicilio;
$municipio_domicilio 	= (string) $xml->MunicipioDomicilio;
$colonia 				= (string) $xml->Colonia;
$direccion 				= (string) $xml->Direccion;
$telefono 				= (string) $xml->Telefono;
$estado_civil 			= (string) $xml->EstadoCivil;
$ocupacion 				= (string) $xml->Ocupacion;
$afiliacion 			= (string) $xml->Afiliacion;
$num_poliza 			= (string) $xml->NumPoliza;


    $obj=array();
    //datos unidad
	$obj['institucion']				=	$institucion;
	$obj['entidad_unidad']			=	$entidad_unidad;
	$obj['jurisdicciones_nombre']	=	$jurisdicciones_nombre;
	$obj['municipios_nombre']		=	$municipios_nombre;
	$obj['unidad_nombre']			=	$unidad_nombre;
	$obj['clues']					=	$clues;
	//datos paciente
	$obj['nombre_paciente']			=	$nombre_paciente;
	$obj['apellido_pat']			=	$apellido_pat;
	$obj['apellido_mat']			=	$apellido_mat;
	$obj['entidad_nacimiento']		=	$entidad_nacimiento;
	$obj['curp']					=	$curp;
	$obj['fecha_nacimiento']		=	$fecha_nacimiento;
	$obj['edad']					=	$edad;
	$obj['estado_domicilio']		=	$estado_domicilio;
	$obj['municipio_domicilio']		=	$municipio_domicilio;
	$obj['colonia']					=	$colonia;
	$obj['direccion']				=	$direccion;
	$obj['telefono']				=	$telefono;
	$obj['estado_civil']			=	$estado_civil;
	$obj['ocupacion']				=	$ocupacion;
	$obj['afiliacion']				=	$afiliacion;
	$obj['num_poliza']				=	$num_poliza;

	//retorna el array para el jquery/ajax
	echo json_encode($obj);

	}
?>
