$(document).ready(function(){   


	$('select[name="antecedentes_vacunacion_vph"]').on('click', function() {
        if ($(this).val() === 'SI') {
            $('#edad_antecedentes_vacunacion_vph,#dosis').prop("disabled", false);
        }else{
           $('#edad_antecedentes_vacunacion_vph,#dosis').prop("disabled", true);
        }
    }); 

    $('select[name="repetir_estudio"]').on('click', function() {
        if ($(this).val() === 'SI') {
            $('#motivo_repeticion').prop("disabled", false);
        }else{
           $('#motivo_repeticion').prop("disabled", true);
        }
    }); 

     $('select[name="caracteristicas_muestra"]').on('click', function() {
        if ($(this).val() === 'Inadecuada Procesada' || $(this).val() === 'Inadecuada No Procesada') {
            $('#motivo_repeticion').prop("disabled", false);
            // $('#repetir_estudio option:eq(0)').prop('selected', 'selected');
            $("#repetir_estudio").val('SI');
            

        }else{
           $('#motivo_repeticion').prop("disabled", true);
           // $('#repetir_estudio option:eq(1)').prop('selected', 'selected');
           $("#repetir_estudio").val('NO');
        }
    });

     //EXPLORACIÓN CLÍNICA
     $('select[name="presento_menarca"]').on('change', function() {
        if ($(this).val() === 'SI') {
            $('#edad_presentacion_menarca').prop("disabled", false);
        }else{
           $('#edad_presentacion_menarca').prop("disabled", true);
        }
    }); 

    $('select[name="presento_menopausia"]').on('change', function() {
        if ($(this).val() === 'SI') {
            $('#edad_presentacion_menopausia').prop("disabled", false);
        }else{
           $('#edad_presentacion_menopausia').prop("disabled", true);
        }
    });

    $('select[name="utiliza_terapia"]').on('change', function() {
        if ($(this).val() === 'SI') {
            $('#tiempo_utilizacion').prop("disabled", false);
        }else{
           $('#tiempo_utilizacion').prop("disabled", true);
        }
    });

    $('select[name="nuligesta"]').on('change', function() {
        if ($(this).val() === 'SI') {
            $('#fecha_primer_embarazo, #amamanto_hijos').prop("disabled", true);
        }else{
           $('#fecha_primer_embarazo, #amamanto_hijos').prop("disabled", false);
        }
    });

    $('select[name="antecedentes_familiares"]').on('change', function() {
        if ($(this).val() === 'Ninguno') {
            $('#edad_familiar').prop("disabled", true);
        }else{
           $('#edad_familiar').prop("disabled", false);
        }
    });

    $('select[name="antecedente_personal"]').on('change', function() {
        if ($(this).val() === 'NO') {
            $('#ano_diagnostico').prop("disabled", true);
        }else{
           $('#ano_diagnostico').prop("disabled", false);
        }
    });

    $('select[name="enfermedad_benigna"]').on('change', function() {
        if ($(this).val() === 'NO') {
            $('#especifique').prop("disabled", true);
        }else{
           $('#especifique').prop("disabled", false);
        }
    });
    
    $('select[name="cirugia_mama"]').on('change', function() {
        if ($(this).val() === 'NO') {
            $('#tipo_cirugia, #ano_cirugia').prop("disabled", true);
        }else{
           $('#tipo_cirugia, #ano_cirugia').prop("disabled", false);
        }
    });

    $('select[name="tipo_cirugia"]').on('change', function() {
        if ($(this).val() === "Otro") {
            $('#otro_especifique').prop("disabled", false);
        }else{
           $('#otro_especifique').prop("disabled", true);
        }
    });

    $('select[name="otros_factores_cancer"]').on('change', function() {
        if ($(this).val() === "NO") {
            $('#otros_factores').prop("disabled", true);
        }else{
           $('#otros_factores').prop("disabled", false);
        }
    });
    
    $('select[name="antecedentes_deteccion"]').on('change', function() {
        if ($(this).val() === "Ninguno") {
            $('#fecha_ultimo_estudio, #resultado_ultimo_estudio').prop("disabled", true);
        }else{
           $('#fecha_ultimo_estudio, #resultado_ultimo_estudio').prop("disabled", false);
        }
    });

    $('select[name="inicio_vida_sexual"]').on('change', function() {
        if ($(this).val() === "NO") {
            $('#edad_inicio_vida_sexual, #resultado_ultimo_estudio').prop("disabled", true);
        }else{
           $('#edad_inicio_vida_sexual, #resultado_ultimo_estudio').prop("disabled", false);
        }
    });
    //TERMINA EXPLORACIÓN CLÍNICA

    //VPH
    $('select[name="visita"]').on('change', function() {
        if ($(this).val() === "1era") {
            $('#fecha_estudio_anterior, #seguimiento').prop("disabled", true);
        }else{
           $('#fecha_estudio_anterior, #seguimiento').prop("disabled", false);
        }
    });
    //TERMINA VPH

    //update laboratorio/citologia
    $('select[name="caracteristicas_muestra"]').on('click', function() {
        if ($(this).val() === 'Inadecuada Procesada' || $(this).val() === 'Inadecuada No Procesada') {
            $('#motivo_repeticion').prop("disabled", false);
            // $('#repetir_estudio option:eq(0)').prop('selected', 'selected');
            $("#repetir_estudio").val('SI');
        }else{
           $('#motivo_repeticion').prop("disabled", true);
           // $('#repetir_estudio option:eq(1)').prop('selected', 'selected');
           $("#repetir_estudio").val('NO');
           $('#motivo_repeticion_otro_hidden').removeClass('form-group col-md-12').addClass('form-group col-md-12 hidden');
        }
    }); 
    //termina update laboratorio/citilogia



                 

});
