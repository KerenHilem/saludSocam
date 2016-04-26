<div class="panel panel-primary">
  <div class="panel-heading">
    <h1 class="panel-title">CITOLOGÍA</h1>
  </div>
  <div class="panel-body">
  
<div class="form-group col-md-12">
      <h2><span class="label label-default">III. Antecedentes del Paciente</span></h2>
    </div>
    <!-- COMINEZA SELECT PARA CITOLOGIA -->
    <div class="form-group col-md-3">
      <label for="citologia">Citología:</label>
      <select name="citologia" class="form-control">
      <!--  <option value="NO CAPTURADO">Selecciona Opción</option> -->
        <option value="Primera vez en la vida">1. Primera vez en la vida</option>
        <option value="Primera vez después de 3 años">2. Primera vez después de 3 años</option>
        <option value="Subsecuente">3. Subsecuente</option>
        <option value="Complementaria a resultado positivo de VPH">4. Complementaria a resultado positivo de VPH</option>
      </select>
    </div>
    <!-- FIN DEL SELECT PARA CITOLOGIA -->
   
    <div class="form-group col-md-3">
      <label for="inicio_vida_sexual">Inicio de vida sexual:</label>
      <select name="inicio_vida_sexual" class="form-control">
      <!-- <option value="NO CAPTURADO">Selecciona Opción</option> -->
        <option value="SI">1. Si</option>
        <option value="NO" selected>2. No</option>
      </select>
    </div>

    <div class="form-group col-md-3">
      <label for="edad_inicio_vida_sexual">Edad de inicio de vida sexual:</label>
      <input type="number" min="0" class="form-control" id="edad_inicio_vida_sexual" name="edad_inicio_vida_sexual" value="18">
    </div>

    <!-- COMINEZA SELECT PARA SITUACION GINECOOBSTETRICA --> 
    <div class="form-group col-md-3">
      <label for="situacion_ginecoobstetrica">Situación Ginecoobstétrica:</label>
      <select name="situacion_ginecoobstetrica" class="form-control">
      <!--   <option value="NO CAPTURADO">Selecciona Opción</option> -->
        <option value="Puerperio o Postaborto">1. Puerperio o Postaborto</option>
        <option value="Postmenopausia">2. Postmenopausia</option>
        <option value="Uso hormonales">3. Uso hormonales</option>
        <option value="DIU">4. DIU</option>
        <option value="Histerectomía">5. Histerectomía</option>
        <option value="Tratamiento farmacologico">6. Tratamiento farmacologico</option>
        <option value="Embarazo actual">7. Embarazo actual</option>
        <option value="Tratamiento colposcopico previo">8. Tratamiento colposcopico previo</option>
        <option value="Ninguno de los anteriores">9. Ninguno de los anteriores</option>
      </select>
    </div>
    <!-- FIN DEL SELECT PARA SITUACION GINECOOBSTETRICA -->
    

    

    <div class="form-group col-md-6">
      <label for="antecedentes_vacunacion_vph">Antecedentes de vacunacion VPH:</label>
      <select name="antecedentes_vacunacion_vph" class="form-control" id="antecedentes_vacunacion_vph">
        <option value="SI">1. Si</option>
        <option value="NO" selected>2. No</option>
      </select>
    </div>

    <div class="form-group col-md-3 ">
      <label for="edad_antecedentes_vacunacion_vph">Edad:</label>
      <input type="number" min="0" class="form-control" id="edad_antecedentes_vacunacion_vph" name="edad_antecedentes_vacunacion_vph" value="0" disabled>
    </div>

    <div class="form-group col-md-3 ">
      <label for="dosis">Numero de dosis:</label>
      <select name="dosis" class="form-control" id="dosis" disabled>
        <option value="UNA">1. Una</option>
        <option value="DOS">2. Dos</option>
        <option value="TRES">3. Tres</option>
        <option value="COMPLETO">4. Completo</option>
        <option value="NINGUNA" selected>5. Ninguna</option>
      </select>
    </div>

    <div class="form-group col-md-6">
      <label for="ultima_regla">Fecha de ultima regla:</label>
      <input type="date" class="form-control" id="ultima_regla" name="ultima_regla" value="<?php echo date('Y-m-d');?>" required>
    </div>

    <div class="form-group col-md-6 ">
      <label for="exploracion_observa">A la exploracion se observa:</label>
      <select name="exploracion_observa" class="form-control">
        <option value="Cuello aparentemente sano">1. Cuello aparentemente sano</option>
        <option value="Cuello anormal">2. Cuello anormal</option>
        <option value="Lesion del cuello">3. Lesion del cuello</option>
        <option value="Cervicitis">4. Cervicitis</option>
        <option value="Leucorrea">5. Leucorrea</option>
        <option value="Sangrado anormal">6. Sangrado anormal</option>
        <option value="No se observa cuello">7. No se observa cuello</option>
      </select>
    </div>

    <div class="form-group col-md-4 ">
      <label for="utensilio_muestra">Utensilio con el que se tomo la muestra:</label>
      <select name="utensilio_muestra" class="form-control">
      <!--  <option value="NO CAPTURADO">Selecciona Opción</option> -->
        <option value="Espatula de ayre modificada">1. Espatula de ayre modificada</option>
        <option value="Citobrush">2. Citobrush</option>
        <option value="Hisopo">3. Hisopo</option>
        <option value="Otro especifique">4. Otro especifique</option>
      </select>
    </div>

    <div class="form-group col-md-4">
      <label for="rfc_responsable">RFC Responsable de la toma de citología:</label>
      <input type="text" class="form-control" id="rfc_responsable" name="rfc_responsable" placeholder="Ingresa RFC" required onKeyUp="this.value=this.value.toUpperCase();">
    </div>

    <div class="form-group col-md-4">
      <label for="rfc_responsable_puesto">RFC Puesto:</label>
      <input type="text" class="form-control" id="rfc_responsable_puesto" name="rfc_responsable_puesto" readonly>
    </div>

    <div class="form-group col-md-4">
      <label for="rfc_responsable_nombre">Nombre: </label>
      <input type="text" class="form-control" id="rfc_responsable_nombre" name="rfc_responsable_nombre" placeholder="Ingresa Nombre" readonly="">
    </div>

    <div class="form-group col-md-4">
      <label for="rfc_responsable_ape_pat">Apellido Paterno:</label>
      <input type="text" class="form-control" id="rfc_responsable_ape_pat" name="rfc_responsable_ape_pat" placeholder="Ingresa Apellido Paterno" readonly="">
    </div>

    <div class="form-group col-md-4">
      <label for="rfc_responsable_ape_mat">Apellido Materno:</label>
      <input type="text" class="form-control" id="rfc_responsable_ape_mat" name="rfc_responsable_ape_mat" placeholder="Ingresa Apellido Materno" readonly="">
    </div>

    <div class="form-group col-md-6">
          <label for="factores_riesgo">Factores de riesgo:</label>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="factores_riesgo[]" value="Inicio de relaciones sexuales antes de los 18 años">1. Inicio de relaciones sexuales antes de los 18 años
                  </label>
                </div>

                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="factores_riesgo[]" value="Múltiples parejas sexuales">2. Múltiples parejas sexuales
                  </label>
                </div>

                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="factores_riesgo[]" value="Antecedentes de infecciones de transmisión sexual">3. Antecedentes de infecciones de transmisión sexual
                  </label>

                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="factores_riesgo[]" value="Tabaquismo">4. Tabaquismo
                  </label>
                </div>

                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="factores_riesgo[]" value="Ninguno" checked>5. Ninguno
                  </label>
                </div>
    </div>

    <div class="form-group col-md-6">
      <label for="fecha_toma_muestra">Fecha de toma de la muestra:</label>
      <input type="date" class="form-control" id="fecha_toma_muestra" name="fecha_toma_muestra" value="<?php echo date('Y-m-d');?>">
    </div>

    <div class="form-group col-md-6">
      <label for="tiene_cartilla_salud">Cuenta con Cartilla Nacional de Salud de la Mujer:</label>
      <select name="tiene_cartilla_salud" class="form-control" >
        <option value="SI">1. Si</option>
        <option value="NO">2. No</option>
      </select>
    </div>

    <div class="form-group col-md-6">
      <label for="muestra_repetida">Muestra repetida:</label>
      <select name="muestra_repetida" class="form-control">
        <option value="SI">1. Si</option>
        <option selected value="NO" selected>2. No</option>
      </select>
    </div>

    <div class="form-group col-md-4 hidden">
      <label  for="citologico_anterior">Número citológico anterior:</label>
      <input type="hidden "min="0" class="form-control" id="citologico_anterior" name="citologico_anterior" placeholder="Ingresa Número" >
    </div>
  <!-- EMPIEZA LOS RESLULTADOS -->
    <div class="page-header col-md-12 hidden">
      <h2><span class="label label-default">IV. Resultado de citología cervical</span></h2>
    </div>

    <div class="form-group col-md-6 hidden">
      <label for="fecha_interpretacion">Fecha de interpretación:</label>
      <input type="date" class="form-control" id="fecha_interpretacion" name="fecha_interpretacion">
    </div>

        <div class="form-group col-md-6 hidden">
          <label for="numero_citologico">Número citológico:</label>
          <input type="number" min="0" class="form-control" id="numero_citologico" name="numero_citologico" placeholder="Ingresa Número">
        </div>

        <div class="form-group col-md-6 hidden">
          <label for="laboratorio">Laboratorio:</label>
          <input type="text"  class="form-control" id="laboratorio" name="laboratorio" value="NO CAPTURADO">
        </div>

         <div class="form-group col-md-6 hidden">
          <label for="caracteristicas_muestra">Características de la muestra:</label>
            <select name="caracteristicas_muestra" class="form-control">
              <option value="NO CAPTURADO">Selecciona Opción</option>
              <option value="Adecuada Procesada">1. Adecuada Procesada</option>
              <option value="Inadecuada Procesada">2. Inadecuada Procesada</option>
              <option value="Adecuada No Procesada">3. Adecuada No Procesada</option>
              <option value="Inadecuada No Procesada">4. Inadecuada No Procesada</option>
            </select>
        </div>

        <div class="form-group col-md-6 hidden">
          <label for="diagnostico_citologico">A. Categoría general del diagnóstico citológico (Bethesda):</label>
            <select name="diagnostico_citologico" class="form-control">
              <option value="NO CAPTURADO">Selecciona Opción</option>
              <option value="Negativa para lesión intraepitelial o malignidad">1. Negativa para lesión intraepitelial o malignidad</option>
              <option value="Células escamosas atípicas de signicado indeterminado (ASC-US)">2. Células escamosas atípicas de signicado indeterminado (ASC-US)</option>
              <option value="Células escamosas atípicas, no se puede descartar lesión intraepitelial escamosa de alto grado (ASC-H)">3.  Células escamosas atípicas, no se puede descartar lesión intraepitelial escamosa de alto grado (ASC-H)</option>
              <option value="Lesión escamosa intraepitelial de bajo grado (VPH, displasia leve, NIC 1)">4. Lesión escamosa intraepitelial de bajo grado (VPH, displasia leve, NIC 1)</option>
              <option value="Lesión escamosa intraepitelial de alto grado (displasia moderada, displasia severa, carcicoma in Situ, NIC 2, NIC 3)">5. Lesión escamosa intraepitelial de alto grado (displasia moderada, displasia severa, carcicoma in Situ, NIC 2, NIC 3)</option>
              <option value="Carcicoma epidermoide">6. Carcicoma epidermoide</option>
              <option value="Células glandulares endocervicales atípicas (AGC)">7. Células glandulares endocervicales atípicas (AGC)</option>
              <option value="Células glandulares endometriales atípicas (AGC)">8. Células glandulares endometriales atípicas (AGC)</option>
              <option value="Células glandulares atípicas (AGC)">9. Células glandulares atípicas (AGC)</option>
              <option value="Adenocarcicoma">10. Adenocarcicoma</option>
              <option value="Adenocarcicoma (endocervical, endometrial o extrauterino)">11. Adenocarcicoma (endocervical, endometrial o extrauterino)</option>
            </select>
        </div>

        <div class="form-group col-md-6 hidden">
          <label for="otros_hallazgos_citologicos">B. Otros hallazgos:</label>
            <select name="otros_hallazgos_citologicos" class="form-control">
              <option value="NO CAPTURADO">Selecciona Opción</option>
              <option value="Trichonomas vaginalis">1. Trichonomas vaginalis</option>
              <option value="Microorganismos micóticos morfológicamente compatibles con cándida sp">2. Microorganismos micóticos morfológicamente compatibles con cándida sp</option>
              <option value="Cambio en la ora sugestiva de vaginosis bacteriana">3. Cambio en la ora sugestiva de vaginosis bacteriana</option>
              <option value="Micro- organismos morfológicamente compatibles con actinomyces sp">4. Micro- organismos morfológicamente compatibles con actinomyces sp</option>
              <option value="Cambios celulares compatibles con virus herpes simple">5. Cambios celulares compatibles con virus herpes simple</option>
              <option value="Cambios celulares compatibles con citomegalovirus">6. Cambios celulares compatibles con citomegalovirus</option>
              <option value="Metaplasiaescamosa tubular o cambios queratolíticos">7. Metaplasiaescamosa tubular o cambios queratolíticos</option>
              <option value="Cambios asociados al embarazo">8. Cambios asociados al embarazo</option>
              <option value="Inamación (incluye reparación atípica)">9. Inamación (incluye reparación atípica)</option>
              <option value="Atroa">10. Atroa</option>
              <option value="Radioterapia">11. Radioterapia</option>
              <option value="Dispositivo intrauterino">12. Dispositivo intrauterino</option>
              <option value="Células glandulares post- histerectomía">13. Células glandulares post- histerectomía</option>
              <option value="Presencia de células endometriales no atípicas en mujeres de 45 años o más">14. Presencia de células endometriales no atípicas en mujeres de 45 años o más</option>
            </select>
        </div>

        <div class="form-group col-md-3 hidden">
          <label for="repetir_estudio">Repetir estudio:</label>
            <select name="repetir_estudio" class="form-control">
              <option value="NO CAPTURADO">Selecciona Opción</option>
              <option value="Si">1. Si</option>
              <option value="No">2. No</option>
            </select>
        </div>

         <div class="form-group col-md-9 hidden">
          <label for="motivo_repeticion">Motivo:</label>
            <select name="motivo_repeticion" class="form-control">
              <option value="NO CAPTURADO">Selecciona Opción</option>
              <option value="EArticios, hemorragia, inamación y/o">1. Articios, hemorragia, inamación y/o</option>
              <option value="Laminilla rota">2. Laminilla rota</option>
              <option value="Frotis grueso">3. Frotis grueso</option>
              <option value="Muestra mal fijada">3. Muestra mal fijada</option>
              <option value="Otro especifique">4. Otro especifique</option>
            </select>
        </div>

        <div class="form-group col-md-12 hidden">
          <label for="cedula_citotecnologo">Cédula profesional del citotecnólogo (a):</label>
          <input type="text"  class="form-control" id="cedula_citotecnologo" name="cedula_citotecnologo" value="NO CAPTURADO" onKeyUp="this.value=this.value.toUpperCase();">
        </div>

         <div class="form-group col-md-4 hidden">
          <label for="revisada_patologo">La muestra fue revisada por el patólogo (a):</label>
            <select name="revisada_patologo" class="form-control">
              <option value="NO CAPTURADO">Selecciona Opción</option>
              <option value="Si">1. Si</option>
              <option value="No">2. No</option>
            </select>
        </div>

         <div class="form-group col-md-8 hidden" >
          <label for="diagnostico_patologo">Diagnóstico del patólogo (a) (De acuerdo a la nomenclatura del reactivo 31):</label>
          <input type="text"  class="form-control" id="diagnostico_patologo" name="diagnostico_patologo" value="NO CAPTURADO" onKeyUp="this.value=this.value.toUpperCase();">
        </div>

        <div class="form-group col-md-12 hidden" >
          <label for="cedula_patologo">Cédula profesional del patólogo (a):</label>
          <input type="text"  class="form-control" id="cedula_patologo" name="cedula_patologo" value="NO CAPTURADO">
        </div>
</div>
</div>