$(document).ready(function(){   

                $("select[name=id_perfil]").change(function(){
                        var id = $(this).val();
                        $('input[name="perfil_id"]').val(id);
                });
          
                $("select[name=id_jurisdiccion]").change(function(){
                        var id = $(this).val();
                        $('input[name="jurisdiccion_id"]').val(id);
                });

                $("select[name=id_unidad]").change(function(){
                        var id = $(this).val();
                        $('input[name="unidad_id"]').val(id);
                });

                $("select[name=A]").change(function(){
                        var id = $(this).val();
                        $('input[name="diagnostico_citologico"]').val(id);
                });

                $("select[name=B]").change(function(){
                    var id = $(this).val();
                    $('input[name="otros_hallazgos"]').val(id);
                });
                
                $("#unidad_id").change(function(){
                    $.ajax({
                        url:'../unidad.php',
                        type:'POST',
                        dataType:'json',
                        data:{ unidad_id:$('#unidad_id').val()}
                    }).done(function(respuesta){
                        $("#clues").val(respuesta.clues);
                        $("#municipios_nombre").val(respuesta.municipios_nombre);
                        $("#jurisdicciones_nombre").val(respuesta.jurisdicciones_nombre);
                        // $("#institucion").val("SSA");
                        // $("#unidad_entidad_delegacion").val("Baja California");
                    });
                }); 

                $("#paciente_id").change(function(){
                    $.ajax({
                        url:'../paciente.php',
                        type:'POST',
                        dataType:'json',
                        data:{ paciente_id:$('#paciente_id').val()}
                    }).done(function(respuesta){
                        $("#cicam_clave").val(respuesta.cicam_clave);
                        $("#nombre").val(respuesta.nombre);
                        $("#apellido_pat").val(respuesta.apellido_pat);
                        $("#apellido_mat").val(respuesta.apellido_mat);
                        $("#entidad_nacimiento").val(respuesta.entidad_nacimiento);
                        $("#municipio_nacimiento").val(respuesta.municipio_nacimiento);
                        $("#edad").val(respuesta.edad);
                        $("#fecha_nacimiento").val(respuesta.fecha_nacimiento);
                        $("#curp").val(respuesta.curp);
                        $("#calle").val(respuesta.calle);
                        $("#numero").val(respuesta.numero);
                        $("#colonia").val(respuesta.colonia);
                        $("#telefono").val(respuesta.telefono);
                        $("#otro_telefono").val(respuesta.otro_telefono);
                        $("#correo").val(respuesta.correo);
                        $("#localidad").val(respuesta.localidades_nombre);
                        $("#municipio_id").val(respuesta.municipios_nombre);
                        $("#delegacion").val(respuesta.delegacion);
                        $("#cp").val(respuesta.cp);
                        $("#entidad_federativa").val(respuesta.entidad_federativa);
                        $("#jurisdiccion_id").val(respuesta.jurisdicciones_nombre);
                        $("#tiempo_residencia").val(respuesta.tiempo_residencia);
                        $("#estado_civil").val(respuesta.estado_civil);
                        $("#escolaridad").val(respuesta.escolaridad);
                        $("#ocupacion").val(respuesta.ocupacion);
                        $("#afiliacion").val(respuesta.afiliacion);
                        $("#afiliacion_otro").val(respuesta.afiliacion_otro);
                        $("#num_poliza").val(respuesta.num_poliza);
                    });
                }); 
//--------------------------------------- Colonias y localidades auto completar
                $( "#localidad" ).autocomplete({
                    source: "../buscarColoniaLocalidad.php",
                    minLength: 1
                });
                $( "#colonia" ).autocomplete({
                    source: "../buscarColoniaLocalidad.php",
                    minLength: 1
                });
//-------------------------------------------fin de Colonias y localidades autocompletar
                $( "#rfc_responsable" ).autocomplete({
                    source: "../buscarRFC.php",
                    minLength: 1
                });

                $("#rfc_responsable").focusout(function(){
                    $.ajax({
                        url:'../rfc.php',
                        type:'POST',
                        dataType:'json',
                        data:{ rfc_responsable:$('#rfc_responsable').val()}
                    }).done(function(respuesta){
                        $("#rfc_responsable_nombre").val(respuesta.nombre);
                        $("#rfc_responsable_ape_pat").val(respuesta.apellido_pat);
                        $("#rfc_responsable_ape_mat").val(respuesta.apellido_mat);
                        $("#rfc_responsable_puesto").val(respuesta.puesto);
                    });
                }); 

                  $("#rfc_responsable").focusout(function(){
                    $.ajax({
                        url:'../rfc.php',
                        type:'POST',
                        dataType:'json',
                        data:{ rfc_responsable:$('#rfc_responsable').val()}
                    }).done(function(respuesta){
                        $("#cedula_citotecnologo_nombre").val(respuesta.nombre);
                        $("#cedula_citotecnologo_ape_pat").val(respuesta.apellido_pat);
                        $("#cedula_citotecnologo_ape_mat").val(respuesta.apellido_mat);
                    });
                }); 

//-------------------busqueda del rfc del patologo-------------------//
               
                $( "#cedula_patologo" ).autocomplete({
                    source: "../buscarRFCPatologo.php",
                    minLength: 1
                });

                $("#cedula_patologo").focusout(function(){
                    $.ajax({
                        url:'../rfcPatologo.php',
                        type:'POST',
                        dataType:'json',
                        data:{ cedula_patologo:$('#cedula_patologo').val()}
                    }).done(function(respuesta_cedula_patologo){
                        $("#cedula_patologo_nombre").val(respuesta_cedula_patologo.nombre);
                        $("#cedula_patologo_ape_pat").val(respuesta_cedula_patologo.apellido_pat);
                        $("#cedula_patologo_ape_mat").val(respuesta_cedula_patologo.apellido_mat);
                    });
                }); 
                 

});
