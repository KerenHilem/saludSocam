<?php
    require_once '../clases/Connection.simple.php';
	$result = "";
	$conn = dbConnect();
	$combobox;
	$row;

	// Create the query
	$sql = 'SELECT id, nombre FROM jurisdicciones';
	// we have to tell the PDO that we are going to send values to the query
	$stmt = $conn->query($sql);
	// Extract the values from $stmt
	$rows = $stmt->fetchAll();
	if (empty($rows)) {
		$result = "No se encontraron resultados !!";
	}
 ?>
 <!DOCTYPE html>
<html lang="en">
    <head>
    	<meta charset="UTF-8" />
        <title>Query data sending an ID</title>
        <meta http-equiv="X-UA-Compatible" content="IE=9,crome" />
		<meta name="copyright" content="Datasoft Engineering 2013"/>
		<meta name="author" content="Reedyseth"/>
		<meta name="email" content="ibarragan@behstant.com"/>
		<meta name="description" content="Query data sending an ID" />
		<style type="text/css">
			body {font-family: Arial, Helvetica, sans-serif;}
		</style>
	</head>

    <body>
    	<p><?php echo $result;?></p>

    	<fieldset style="width:480px" 	>
    		<legend>Busqueda de Empleado</legend>
	    	<form action="" method="post">
	    		<div>
	    			<label for="id">Id de empleado:</label>
	    			<input type="text" name="id" id="id"/>
					<select name="nombreEmpleado">
						<?php foreach ($rows as $row) {
							echo '<option value="'.$row['id'].'">'.$row['nombre'].'</option>';
						}?>
	    			</select>
	    			<input type="submit" name="search" value="Buscar" />
	    		</div>
	    	</form>
    	</fieldset>
    </body>
</html>