<!DOCTYPE html>
<html>
<head>
	<title></title>
<?php
  require_once '../clases/Connection.simple2.php';
  include("../head.php");
  include("../nav.php");
  include("..plantilla/css/bootstrap-checkbox.css");
  include("..plantilla/js/bootstrap-checkbox.js");
?>

</head>
<body>

<div class="container">
 <div class="row">
<form action="../create/fFormatoBase.php" method="POST">

  <h2 class="col-md-12">Qué estudios realizarás?</h2>
  
  <div class="form-group col-md-12 ">
          <label for="estudios_a_realizar"></label>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="estudios_a_realizar[]" value="Citología"/>1. Citología
                  </label>
                </div>

                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="estudios_a_realizar[]" value="Exploración clínica">2. Exploración clínica
                  </label>
                </div>

                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="estudios_a_realizar[]" value="VPH">3. VPH
                  </label>
                </div>


   
  
  <button type="submit" class="btn btn-default">Siguiente</button>
</form>
 </div>

</div>

</body>
</html>


