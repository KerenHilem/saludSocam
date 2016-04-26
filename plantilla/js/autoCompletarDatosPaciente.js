 $(document).ready(function() {

            $("#buscar_expediente").click(function(){

            $.ajax({
            url: "../consultaExpedienteElectronico.php",
            type: "POST",
            data: {numero_expediente_electronico: $("#numero_expediente_electronico").val()},
            dataType: "json",
            success: function (jsonStr) {
                $("#result").text(JSON.stringify(jsonStr));

            }
        }).done(function (data){
      /*ejecutar las siguientes instrucciones
      * al terminar de ejecutar la llamada
      * ajax*/

      //convertir el objeto JSON a texto
        var json_string = JSON.stringify(data);

      //convertir el texto a un nuevo objeto
        var obj = $.parseJSON(json_string);

      /*asignar los valores obtenidos del objeto
      * a cada unos de losc controlres deseados
      * en el formulario*/
      
      //datos de unidad
        $('#institucion').val(obj.institucion);
        $('#entidad_unidad').val(obj.entidad_unidad);
        $('#jurisdicciones_nombre').val(obj.jurisdicciones_nombre);

        if (obj.jurisdicciones_nombre==='M-J1-MEXICALI'){
            $('#jurisdiccion_id option[value=1]').attr('selected','selected');
            $('#jurisdicciones_nombre').val('MEXICALI');
           }
        else if(obj.jurisdicciones_nombre==='M-J2-TIJUANA'){
            $('#jurisdiccion_id option[value=2]').attr('selected','selected');
            $('#jurisdicciones_nombre').val('TIJUANA');
           }
        else if(obj.jurisdicciones_nombre==='M-J3-ENSENADA'){
            $('#jurisdiccion_id option[value=3]').attr('selected','selected');
            $('#jurisdicciones_nombre').val('ENSENADA');
           }
        else if(obj.jurisdicciones_nombre==='M-J4-VICENTE GUERRERO'){
            $('#jurisdiccion_id option[value=4]').attr('selected','selected');
            $('#jurisdicciones_nombre').val('VICENTE GUERRERO');
           }

        // alert('Estado estado civil:' + obj.estado_civil);
        $('#municipios_nombre').val(obj.municipios_nombre);
        // $('#unidad_nombre').val(obj.unidad_nombre);
        $('#clues').val(obj.clues);

      //datos del paciente
        $('#nombre_paciente').val(obj.nombre_paciente);
        $('#apellido_pat').val(obj.apellido_pat);
        $('#apellido_mat').val(obj.apellido_mat);
        $('#entidad_nacimiento').val(obj.entidad_nacimiento);
        $('#curp').val(obj.curp);
        $('#fecha_nacimiento').val(obj.fecha_nacimiento);
        $('#edad').val(obj.edad);
        // $('#entidad_federativa').val(obj.estado_domicilio);
        // $('#municipio_id').val(obj.municipio_domicilio);
        
        if (obj.municipios_nombre==='MEXICALI'){
            $('#municipio_id option[value=1]').attr('selected','selected');
            }
        else if(obj.municipios_nombre==='TECATE'){
            $('#municipio_id option[value=2]').attr('selected','selected');
            }
        else if(obj.municipios_nombre==='TIJUANA'){
            $('#municipio_id option[value=3]').attr('selected','selected');
            }
        else if(obj.municipios_nombre==='ROSARITO'){
            $('#municipio_id option[value=4]').attr('selected','selected');
           }
        else if(obj.municipios_nombre==='ENSENADA'){
            $('#municipio_id option[value=5]').attr('selected','selected');
           }
        

        if(obj.colonia==='[DESCONOCIDO]'){
            $('#colonia').val('');
           }else {
            $('#colonia').val(obj.colonia);
          }
        $('#calle').val(obj.direccion);
        $('#telefono').val(obj.telefono);
               
        var estado_civil = obj.estado_civil;
        if (estado_civil==='Casado'){
            $('#estado_civil option[value=CASADO]').attr('selected','selected');
            }
        else if(estado_civil==='Soltero'){
            $('#estado_civil option[value=SOLTERO]').attr('selected','selected');
            }
        else if(estado_civil==='Union libre'){
            $('#estado_civil option[value="UNIÓN LIBRE"]').attr('selected','selected');
           }
        else if(estado_civil==='Infante'){
            $('#estado_civil option[value=SOLTERO]').attr('selected','selected');
           }

        $('#ocupacion').val(obj.ocupacion);
        $('#afiliacion').val(obj.afiliacion);
        $('#num_poliza').val(obj.num_poliza);

      
    });

    }); 

    });