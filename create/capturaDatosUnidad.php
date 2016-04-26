<div class="form-group col-md-12">
      <h2><span class="label label-default">I. Identificación de la Unidad</span></h2>
    </div>

    <form role="form"  method="post">
    <?php  
    if($_SESSION['nivel']==1|| $_SESSION['nivel']==2){
        echo ' <div class="form-group col-md-4 col-xs-6">
                     <label for="unidad_id">Unidad:</label>
                     <select name="unidad_id" class="form-control" id="unidad_id">';
                 foreach ($rowsUnidad as $key) {
                  echo '<option value="'.$key['id'].'">'.$key['nombre'].'</option>';
                }
           echo '</select>
                    </div>';
        }
     ?>
    <?php  
    if($_SESSION['nivel']==3 || $_SESSION['nivel']==4){
      echo '<div class="form-group col-md-4 col-xs-6">';
      echo '<label for="">Nombre:</label>';
      echo  '<input type="text" class="form-control" id="" name="" value="'.$dataUnidad['nombre']; echo '"readonly>
       </div>';
    }
    ?>

    <div class="form-group col-md-4 col-xs-6">
      <label for="">CLUES:</label>
      <input type="text" class="form-control" id="clues" name="clues" value="<?php echo $dataUnidad['clues'] ?>" readonly>
    </div>
       
    <div class="form-group col-md-4 col-xs-6">
      <label for="">Institución:</label>
      <input type="text" class="form-control" id="" name="" value="SSA" readonly>
    </div>

    <div class="form-group col-md-4 col-xs-6">
      <label for="">Entidad/Delegación:</label>
      <input type="text" class="form-control" id="" name="" value="Baja California" readonly>
    </div>

    <div class="form-group col-md-4 col-xs-6">
      <label for="">Jurisdicción:</label>
      <input type="text" class="form-control" id="jurisdicciones_nombre" name="jurisdicciones_nombre" value="<?php echo $dataUnidad['jurisdicciones_nombre'] ?>" readonly>
    </div>

    <div class="form-group col-md-4 col-xs-6">
      <label for="">Municipio:</label>
      <input type="text" class="form-control" id="municipios_nombre" name="municipios_nombre" value="<?php echo $dataUnidad['municipios_nombre'] ?>" readonly>
    </div>