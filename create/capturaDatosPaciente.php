<div class="form-group col-md-12">
      <h2><span class="label label-default">II. Identificación del Paciente</span></h2>
    </div>

    <div class="form-group col-md-3 hidden">
      <label for="cicam_clave">Clave Cicam:</label>
      <input type="text" class="form-control" id="cicam_clave" name="cicam_clave" placeholder="">
    </div>
     
    <div class="form-group col-md-3">
      <label for="nombre">Nombre:</label>
      <input type="text" class="form-control" id="nombre" name="nombre" onKeyUp="this.value=this.value.toUpperCase();">
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
      <label for="entidad_nacimiento">Entidad de nacimiento:</label>
        <select name="entidad_nacimiento" id="entidad_nacimiento" class="form-control" >
          <option value="NO CAPTURADO">SELECCIONE OPCIÓN</option>
          <option value="AGUASCALIENTES">AGUASCALIENTES</option>
          <option value="BAJA CALIFORNIA NORTE" selected>BAJA CALIFORNIA NTE.</option>
          <option value="BAJA CALIFORNIA SUR">BAJA CALIFORNIA SUR</option>
          <option value="CAMPECHE">CAMPECHE</option>
          <option value="COAHUILA">COAHUILA </option>
          <option value="COLIMA">COLIMA </option>
          <option value="CHIAPAS">CHIAPAS</option>
          <option value="CHIHUAHUA">CHIHUAHUA</option>
          <option value="DISTRITO FEDERAL">DISTRITO FEDERAL</option>
          <option value="DURANGO">DURANGO</option>
          <option value="GUANAJUATO">GUANAJUATO</option>
          <option value="GUERRERO">GUERRERO</option>
          <option value="HIDALGO">HIDALGO</option>
          <option value="JALISCO">JALISCO</option>
          <option value="MEXICO">MEXICO</option>
          <option value="MICHOACAN">MICHOACAN</option>
          <option value="MORELOS">MORELOS</option>
          <option value="NAYARIT">NAYARIT</option>
          <option value="NUEVO LEON">NUEVO LEÓN</option>
          <option value="OAXACA">OAXACA</option>
          <option value="PUEBLA">PUEBLA</option>
          <option value="QUERETARO">QUERETARO</option>
          <option value="QUINTANA ROO">QUINTANA ROO</option>
          <option value="SAN LUIS POTOSI">SAN LUIS POTOSI</option>
          <option value="SINALOA">SINALOA</option>
          <option value="SONORA">SONORA</option>
          <option value="TABASCO">TABASCO</option>
          <option value="TAMAULIPAS">TAMAULIPAS</option>
          <option value="TLAXCALA">TLAXCALA</option>
          <option value="VERACRUZ">VERACRUZ</option>
          <option value="YUCATAN">YUCATAN</option>
          <option value="ZACATECAS">ZACATECAS</option>
          <option value="SERV. EXTERIOR MEXICANO">SERV. EXTERIOR MEXICANO </option>
          <option value="NACIDO EN EL EXTRANJERO">NACIDO EN EL EXTRANJERO </option>
      </select>
    </div>
        
    <div class="form-group col-md-3">
      <label for="municipio_nacimiento">Municipio de Nacimiento:</label>
      <input type="text" class="form-control" id="municipio_nacimiento" name="municipio_nacimiento" placeholder="MEXICALI" onKeyUp="this.value=this.value.toUpperCase();">
    </div>

    <div class="form-group col-md-3">
      <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
      <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" onchange="edadCalcular(this.value)" required>
    </div>

    <div class="form-group col-md-3">
      <label for="edad">Edad:</label>
      <input type="number" class="form-control" id="edad" name="edad" readonly>
    </div>

    <div class="form-group col-md-3">
      <label for="curp">Curp:</label>
      <input type="text" class="form-control" id="curp" name="curp" value="NO CAPTURADO" onKeyUp="this.value=this.value.toUpperCase();">
    </div>
  
    <div class="page-header col-md-12">
      <h3>Domicilio del paciente</h3>
    </div>
    
    <div class="form-group col-md-3">
      <label for="calle">Calle:</label>
      <input type="text" class="form-control" id="calle" name="calle" onKeyUp="this.value=this.value.toUpperCase();">
    </div>

    <div class="form-group col-md-3">
      <label for="numero_calle">Número:</label>
      <input type="number" class="form-control" min="0" id="numero_calle" name="numero_calle">
    </div>
        
    <div class="form-group col-md-3">
      <label for="colonia">Colonia:</label>
      <input type="text" class="form-control" id="colonia" name="colonia" placeholder="Ej. Insurgentes Este"  onKeyUp="this.value=this.value.toUpperCase();">
    </div>

    <!-- COMINEZA SELECT PARA LOCALIDAD -->
    <div class="form-group col-md-3">
      <label for="localidad">Localidad:</label>
       <!--  <select name="localidad" class="form-control" > -->
            <?php /*foreach ($rowsLocalidad as $key) {
              if($key['nombre']== 'NINGUNA LOCALIDAD'){
                echo '<option value="'.$key['id'].'" selected>'.$key['nombre'].'</option>';
                }
                else {
                  echo '<option value="'.$key['id'].'">'.$key['nombre'].'</option>';
                  }
            }*/?>
        <!-- </select>     -->
        <input type="text" class="form-control" id="localidad" name="localidad" placeholder="Escribe localidad si no existe dejar en blanco" required onKeyUp="this.value=this.value.toUpperCase();">
    </div>
    <!-- FIN DEL SELECT PARA LOCALIDAD -->
        
    <!-- EMPIEZA SELECTO MUNICIPIOS-->
    <div class="form-group col-md-3">
      <label for="municipio_id">Municipio:</label>
        <select name="municipio_id" class="form-control">
                <?php foreach ($rowsMunicipio as $key) {
                  if ($key['nombre']=='TIJUANA') {
                    echo '<option value="'.$key['id'].'" selected>'.$key['nombre'].'</option>';
                  }else {
                    echo '<option value="'.$key['id'].'">'.$key['nombre'].'</option>';
                  }
                }?>
        </select>
    </div>
    <!-- TERMINA SELECT MUNICIPIO-->

    <div class="form-group col-md-3">
      <label for="delegacion">Delegación:</label>
 <!--      <input type="text" class="form-control" id="delegacion" name="delegacion" onKeyUp="this.value=this.value.toUpperCase();"> -->
      <select name="delegacion" id="delegacion" class="form-control" >
          <option value="Centro">1. Centro</option>
          <option value="Otay Centenario">2. Otay Centenario</option>
          <option value="Playas de Tijuana">3. Playas de Tijuana</option>
          <option value="La Mesa">4. La Mesa</option>
          <option value="San Antonio de los Buenos">5. San Antonio de los Buenos</option>
          <option value="Sánchez Taboada">6. Sánchez Taboada</option>
          <option value="Cerro Colorado">7. Cerro Colorado</option>
          <option value="La Presa">8. La Presa</option>
          <option value="La Presa Rural">9. La Presa Rural</option>
      </select>
    </div>

    <div class="form-group col-md-3">
      <label for="cp">C.P:</label>
      <input type="number" class="form-control" min="0" id="cp" name="cp" value="21700" >
    </div>

    <div class="form-group col-md-3 hidden">
      <label for="entidad_federativa">Entidad Federativa (Estado):</label>
        <select name="entidad_federativa" id="entidad_federativa" class="form-control" >
          <!--  <option value="NO CAPTURADO">SELECCIONE OPCIÓN</option> -->
          <option value="AGUASCALIENTES">AGUASCALIENTES</option>
          <option value="BAJA CALIFORNIA NORTE" selected>BAJA CALIFORNIA NTE.</option>
          <option value="BAJA CALIFORNIA SUR">BAJA CALIFORNIA SUR</option>
          <option value="CAMPECHE">CAMPECHE</option>
          <option value="COAHUILA">COAHUILA </option>
          <option value="COLIMA">COLIMA </option>
          <option value="CHIAPAS">CHIAPAS</option>
          <option value="CHIHUAHUA">CHIHUAHUA</option>
          <option value="DISTRITO FEDERAL">DISTRITO FEDERAL</option>
          <option value="DURANGO">DURANGO</option>
          <option value="GUANAJUATO">GUANAJUATO</option>
          <option value="GUERRERO">GUERRERO</option>
          <option value="HIDALGO">HIDALGO</option>
          <option value="JALISCO">JALISCO</option>
          <option value="MEXICO">MEXICO</option>
          <option value="MICHOACAN">MICHOACAN</option>
          <option value="MORELOS">MORELOS</option>
          <option value="NAYARIT">NAYARIT</option>
          <option value="NUEVO LEON">NUEVO LEÓN</option>
          <option value="OAXACA">OAXACA</option>
          <option value="PUEBLA">PUEBLA</option>
          <option value="QUERETARO">QUERETARO</option>
          <option value="QUINTANA ROO">QUINTANA ROO</option>
          <option value="SAN LUIS POTOSI">SAN LUIS POTOSI</option>
          <option value="SINALOA">SINALOA</option>
          <option value="SONORA">SONORA</option>
          <option value="TABASCO">TABASCO</option>
          <option value="TAMAULIPAS">TAMAULIPAS</option>
          <option value="TLAXCALA">TLAXCALA</option>
          <option value="VERACRUZ">VERACRUZ</option>
          <option value="YUCATAN">YUCATAN</option>
          <option value="ZACATECAS">ZACATECAS</option>
        </select>
    </div>

    <!-- COMINEZA SELECT PARA JURISDICCION -->     
    <div class="form-group col-md-3">
      <label for="jurisdiccion_id">Jurisdicción:</label>
      <select name="jurisdiccion_id" class="form-control" >
                <?php foreach ($rowsJurisdiccion as $key) {
                  if($key['id']==$jurisdiccion){
                  echo '<option value="'.$key['id'].'" selected>'.$key['nombre'].'</option>';
                }else{
                    echo '<option value="'.$key['id'].'">'.$key['nombre'].'</option>';
                }
              }
                ?>
      </select>
    </div>
    <!-- FIN DEL SELECT PARA JURISDICCION -->
    
    <div class="form-group col-md-3">
      <label for="telefono">Teléfono:</label>
      <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Ej. 68662272024" >
    </div>

    <div class="form-group col-md-3">
      <label for="correo">Correo Eléctronico:</label>
      <input type="email" class="form-control" id="correo" name="correo" placeholder="Ej. correo@gmail.com">
    </div>
    
    <div class="form-group col-md-3">
      <label for="tiempo_residencia">Tiempo de Residencia años:</label>
      <input type="number" class="form-control" id="tiempo_residencia" min="0" name="tiempo_residencia" value="1" >
    </div>

    <div class="form-group col-md-3">
      <label for="estado_civil">Estado Civil:</label>
      <select name="estado_civil" class="form-control">
      <!--   <option value="NO CAPTURADO">SELECCIONE OPCIÓN</option> -->
        <option value="SOLTERO">Solter(a)</option>
        <option value="CASADO">Casad(a)</option>
        <option value="DIVORSIADO">Divorsiad(a)</option>
        <option value="SEPARADO">Separad(a)</option>
        <option value="UNIÓN LIBRE">Unión Libre</option>
        <option value="VIUDO">Viud(a)</option>
      </select>
    </div>

    <div class="form-group col-md-3">
      <label for="escolaridad">Escolaridad:</label>
      <select name="escolaridad" class="form-control">
      <!-- <option value="NO CAPTURADO">SELECCIONE OPCIÓN</option> -->
        <option value="ANALFABETA">Analfabeta</option>
        <option value="PRIMARIA">Primaria</option>
        <option value="SECUNDARIA">Secundaria</option>
        <option value="PREPARATORIA">Preparatoria</option>
        <option value="LICENCIATURA">Licenciatura</option>
        <option value="POSGRADO">Posgrado(a)</option>
      </select>
     </div>
        
     <div class="form-group col-md-3">
      <label for="ocupacion">Ocupación:</label>
      <input type="text" class="form-control" id="ocupacion" name="ocupacion" value="NO CAPTURADO"  onKeyUp="this.value=this.value.toUpperCase();">
     </div>

     <div class="form-group col-md-3">
        <label for="afiliacion">Afiliación:</label>
        <select name="afiliacion" class="form-control">
        <!--  <option value="NO CAPTURADO">SELECCIONE OPCIÓN</option> -->
          <option value="SEGURO POPULAR">Seguro Popular(a)</option>
          <option value="IMSS">IMSS</option>
          <option value="ISSSTE">ISSSTE</option>
          <option value="PEMEX">PEMEX</option>
          <option value="SEDENA LIBRE">SEDENA LIBRE</option>
          <option value="SEMAR">SEMAR</option>
          <option value="IMMS PROSPERA">IMMS PROSPERA</option>
          <option value="NINGUNO">NINGUNO</option>
        </select>
    </div>

    <div class="form-group col-md-3">
      <label for="num_poliza">Número de Afiliación o Poliza:</label>
      <input type="number" class="form-control" id="num_poliza" name="num_poliza" min="0" value="NO CAPTURADO" >
    </div>

    <div class="form-group col-md-3">
      <label for="afiliacion_otro">Número de Expediente Eléctronico:</label>
      <input type="text" class="form-control" id="afiliacion_otro" name="afiliacion_otro" value="NO CAPTURADO">
    </div>

    <div class="form-group col-md-3">
      <label for="es_indigena">¿Es Indígena?</label>
      <select name="es_indigena" class="form-control">
          <option value="SI">SI</option>
          <option value="NO" selected>NO</option>
      </select>
    </div>

    <div class="form-group col-md-3">
      <label for="grupo_etnico">Grupo Étnico:</label>
      <input type="text" class="form-control" id="grupo_etnico" name="grupo_etnico" value="NINGUNO" onKeyUp="this.value=this.value.toUpperCase();">
    </div>

    <div class="form-group col-md-3">
      <label for="habla_lengua_indigena">¿Habla Lengua Indígena?</label>
      <select name="habla_lengua_indigena" class="form-control">
          <option value="SI">SI</option>
          <option value="NO" selected>NO</option>
      </select>
    </div>

    <div class="form-group col-md-3">
      <label for="cual_lengua">¿Cúal Lengua Indígena?</label>
      <input type="text" class="form-control" id="cual_lengua" name="cual_lengua" value="NINGUNO" onKeyUp="this.value=this.value.toUpperCase();">
    </div>
        
    <div class="page-header col-md-12">
      <h3>Domicilio de Contacto</h3>
    </div>
        
    <div class="form-group col-md-4">
      <label for="calle_contacto">Calle:</label>
      <input type="text" class="form-control" id="calle_contacto" name="calle_contacto" onKeyUp="this.value=this.value.toUpperCase();">
    </div>

    <div class="form-group col-md-4">
      <label for="numero_calle_contacto">Número:</label>
      <input type="number" class="form-control" min="0" id="numero_calle_contacto" name="numero_calle_contacto" placeholder="SIN NUMERO">
    </div>
        
    <div class="form-group col-md-4">
      <label for="colonia_contacto">Colonia:</label>
      <input type="text" class="form-control" id="colonia" name="colonia_contacto" placeholder="Ej. Insurgentes Este"  onKeyUp="this.value=this.value.toUpperCase();">
    </div>

    <div class="form-group col-md-4">
      <label for="otro_telefono">Otro Teléfono:</label>
      <input type="tel" class="form-control" id="otro_telefono" name="otro_telefono">
    </div>
        
    
    <!-- FIN DEL SELECT PARA PACIENTE -->
