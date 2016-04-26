<!--  INICIA BLOQUE PARA VPH -->
<div class="panel panel-primary">
  <div class="panel-heading">
    <h1 class="panel-title">VPH</h1>
  </div>
  <div class="panel-body">

<div class="form-group col-md-12">
      <h2><span class="label label-default">VI. Biología molecular para la detección del Virus del Papiloma Humano</span></h2>
    </div>

    <div class="form-group col-md-2">
      <br>
      <button type='button' class='btn btn-primary' name='generar'>Generar código</button>
    </div>

    <div class="form-group col-md-5">
      <label for="codigo">Código de barras:</label>
      <input type="text" name="codigo" class="form-control"></input>
    </div>
    <div class="form-group col-md-5">
      <label for="codigo_barras"><br></label>
      <input type="text" name="codigo_barras" class="form-control"></input>
    </div>

    <!-- Tipo de prueba -->
    <div class="form-group col-md-6">
      <label for="tipo_prueba">Tipo de prueba:</label>
      <select name="tipo_prueba" class="form-control">
      <!--  <option value="NO CAPTURADO">Selecciona Opción</option> -->
        <option value="Captura de híbridos">1. Captura de híbridos</option>
        <!-- <option value="PCR">2. PCR</option>
        <option value="Prueba rápida">3. Prueba rápida</option> -->
      </select>
    </div>
    <!-- Visita -->
    <div class="form-group col-md-6">
      <label for="visita">Visita:</label>
      <select name="visita" id="visita" class="form-control">
        <option value="1era">1. 1era</option>
        <option value="Subsecuente">2. Subsecuente</option>
        <option value="Primera vez después de 5 años">3. Primera vez después de 5 años</option>
      </select>
    </div>
    <!-- Fecha de estudio anterior -->
    <div class="form-group col-md-6">
      <label for="fecha_estudio_anterior">Fecha de estudio anterior:</label>
      <input type="date" name="fecha_estudio_anterior" id="fecha_estudio_anterior" 
      class="form-control" disabled></input>
    </div>
    <!-- Fecha de toma -->
    <div class="form-group col-md-6">
      <label for="fecha_toma">Fecha de toma:</label>
      <input type="date" name="fecha_toma" class="form-control" value="<?php echo date('Y-m-d');?>"></input>
    </div>
    <!-- Motivo de detección -->
    <div class="form-group col-md-12">
      <label for="motivo_deteccion">Motivo de detección</label>
    </div>
    <div class="form-group col-md-6">
      <label for="tamizaje">Tamizaje:</label>
      <select name="tamizaje" id="tamizaje" class="form-control">
        <option value="invitacion_organizada">11. Invitación organizada</option>
        <option value="derivada_personal_salud">12. Derivada por personal de salud</option>
        <option value="espontanea">13. Espontánea (de la mujer)</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="seguimiento">Seguimiento:</label>
      <select name="seguimiento" id="seguimiento" class="form-control" disabled>
        <option value="vph_positivo_previo">14. VPH positivo previo</option>
        <option value="ascus_lei">15. ASCIS o LEI (Lesión precursora)</option>
        <option value="control_cancer">16. Control de Cáncer</option>
      </select>
    </div>

    <!-- Observaciones -->
    <div class="form-group col-md-6">
      <label for="observaciones">Observaciones:</label>
      <input type="text" name="observaciones" class="form-control"></input>
    </div>


    <!-- Seccion Resultados oculto para uso en perfil laboratorio -->
    <div class="page-header col-md-12 hidden">
      <h3>Resultados VPH</h3>
    </div>
    <!-- Muestra adecuada para analisis -->
    <div class="form-group col-md-6 hidden">
      <label for="muestra_adecuada_analisis">Muestra adecuada para análisis:</label>
      <input type="text" name="muestra_adecuada_analisis" class="form-control"></input>
    </div>
    <!-- Resultado -->
    <div class="form-group col-md-6 hidden">
      <label for="resultado">Resultado:</label>
      <select name="resultado" class="form-control">
      <!--  <option value="NO CAPTURADO">Selecciona Opción</option> -->
        <option value="Negativo">1. Negativo</option>
        <option value="Positivo">2. Positivo</option>
        <option value="Inválida por nula presencia de BETA-GLOBINA">3. Inválida por nula presencia de BETA-GLOBINA</option>
      </select>
    </div>
    
    <!-- Fecha de análisis -->
    <div class="form-group col-md-6 hidden">
      <label for="fecha_analisis">Fecha de análisis:</label>
      <input type="date" name="fecha_analisis" class="form-control" value="<?php echo date('Y-m-d');?>"></input>
    </div>
    <!-- Fecha de envio de resultado al SICAM -->
    <div class="form-group col-md-6 hidden">
      <label for="fecha_envio_resultado_sicam">Fecha de envio de resultado al SICAM:</label>
      <input type="date" name="fecha_envio_resultado_sicam" class="form-control" value="<?php echo date('Y-m-d');?>"></input>
    </div>

    <div class="form-group col-md-12">
      <label for="espacio"> </label>
    </div>

    <!-- TERMINA BLOQUE PARA VPH -->


    <!-- COMINEZA BLOQUE CITOLOGIA COMPLEMENTARIA -->
    <!-- <div class="form-group col-md-12">
      <h2><span class="label label-default">VII. Citología complementaria</span></h2>
    </div>
    <div class="form-group col-md-6">
      <label for="tipo_citologia">Tipo de citología:</label>
      <select name="tipo_citologia" class="form-control"> -->
      <!--  <option value="NO CAPTURADO">Selecciona Opción</option> -->
        <!-- <option value="Citología base líquida">1. Citología base líquida</option>
        <option value="Citología convencional (PAP)">2. Citología convencional (PAP)</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="caracteristicas_muestra">Características de la muestra:</label>
      <select name="caracteristicas_muestra" class="form-control"> -->
      <!--  <option value="NO CAPTURADO">Selecciona Opción</option> -->
        <!-- <option value="Adecuada para evaluación">1. Adecuada para evaluación</option>
        <option value="Inadecuada para evaluación y rechazada">2. Inadecuada para evaluación y rechazada</option>
        <option value="Procesada pero insatisfactoria para evaluación">3. Procesada pero insatisfactoria para evaluación</option>
      </select>
    </div>
    <div class="form-group col-md-12">
      <label for="especificar">Especificar:</label>
      <input type="text" name="especificar" class="form-control"></input>
    </div> -->
    <!-- Seccion CITOLOGO -->
    <!-- <div class="page-header col-md-12">
      <h3>Diagnóstico del Citólogo</h3>
    </div>
    
    <div class="form-group col-md-6">
      <label for="diagnostico_citologico">Diagnóstico citológico:</label>
         <select name="diagnostico_citologico" class="form-control" >
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

    <div class="form-group col-md-6 ">
      <label for="otros_hallazgos">Otros hallazgos:</label>
        <select name="otros_hallazgos" class="form-control" >
           <option value="Trichonomas vaginalis">1. Trichonomas vaginalis</option>
          <option value="Microorganismos micóticos morfológicamente compatibles con cándida sp">2. Microorganismos micóticos morfológicamente compatibles con cándida sp</option>
           <option value="Cambio en la ora sugestiva de vaginosis bacteriana">3. Cambio en la ora sugestiva de vaginosis bacteriana</option>
          <option value="Micro- organismos morfológicamente compatibles con actinomyces sp">4. Micro- organismos morfológicamente compatibles con actinomyces sp</option>
          <option value="Cambios celulares compatibles con virus herpes simple">5. Cambios celulares compatibles con virus herpes simple</option>
          <option value="Cambios celulares compatibles con citomegalovirus">6. Cambios celulares compatibles con citomegalovirus</option>
          <option value="Metaplasiaescamosa tubular o cambios queratolíticos">7. Metaplasiaescamosa tubular o cambios queratolíticos</option>
          <option value="Cambios asociados al embarazo">8. Cambios asociados al embarazo</option>
          <option value="Inamación (incluye reparación atípica)">9. Inamación (incluye reparación atípica)</option>
          <option value="Atroa">10. Atrofia</option>
          <option value="Radioterapia">11. Radioterapia</option>
          <option value="Dispositivo intrauterino">12. Dispositivo intrauterino</option>
          <option value="Células glandulares post- histerectomía">13. Células glandulares post- histerectomía</option>
          <option value="Presencia de células endometriales no atípicas en mujeres de 45 años o más">14. Presencia de células endometriales no atípicas en mujeres de 45 años o más</option>
        </select>
    </div>
    <div class="form-group col-md-12 ">
      <label for="cedula_citotecnologo">Cédula profesional del citotecnólogo (a):</label>
      <input type="text"  class="form-control" id="cedula_citotecnologo" name="cedula_citotecnologo" value="NO CAPTURADO" onKeyUp="this.value=this.value.toUpperCase();">
    </div>
 -->
    <!-- Seccion PATOLOGO -->
    <!-- <div class="page-header col-md-12">
      <h3>Diagnóstico del Patólogo</h3>
    </div>
    <div class="form-group col-md-4 ">
      <label for="revisada_patologo">La muestra fue revisada por el patólogo (a):</label>
        <select name="revisada_patologo" class="form-control">  
          <option value="Si">1. Si</option>
          <option value="No">2. No</option>
        </select>
    </div>
    <div class="form-group col-md-8" >
          <label for="cedula_patologo">Cédula profesional del patólogo (a):</label>
          <input type="text"  class="form-control" id="cedula_patologo" name="cedula_patologo" value="NO CAPTURADO">
    </div> 
    <div class="form-group col-md-6">
          <label for="diagnostico_patologo">Diagnóstico del patólogo:</label>
            <select name="diagnostico_patologo" class="form-control" >
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
    <div class="form-group col-md-6 ">
      <label for="otros_hallazgos_patologo">Otros hallazgos:</label>
        <select name="otros_hallazgos_patologo" class="form-control" >
           <option value="Trichonomas vaginalis">1. Trichonomas vaginalis</option>
          <option value="Microorganismos micóticos morfológicamente compatibles con cándida sp">2. Microorganismos micóticos morfológicamente compatibles con cándida sp</option>
           <option value="Cambio en la ora sugestiva de vaginosis bacteriana">3. Cambio en la ora sugestiva de vaginosis bacteriana</option>
          <option value="Micro- organismos morfológicamente compatibles con actinomyces sp">4. Micro- organismos morfológicamente compatibles con actinomyces sp</option>
          <option value="Cambios celulares compatibles con virus herpes simple">5. Cambios celulares compatibles con virus herpes simple</option>
          <option value="Cambios celulares compatibles con citomegalovirus">6. Cambios celulares compatibles con citomegalovirus</option>
          <option value="Metaplasiaescamosa tubular o cambios queratolíticos">7. Metaplasiaescamosa tubular o cambios queratolíticos</option>
          <option value="Cambios asociados al embarazo">8. Cambios asociados al embarazo</option>
          <option value="Inamación (incluye reparación atípica)">9. Inamación (incluye reparación atípica)</option>
          <option value="Atroa">10. Atrofia</option>
          <option value="Radioterapia">11. Radioterapia</option>
          <option value="Dispositivo intrauterino">12. Dispositivo intrauterino</option>
          <option value="Células glandulares post- histerectomía">13. Células glandulares post- histerectomía</option>
          <option value="Presencia de células endometriales no atípicas en mujeres de 45 años o más">14. Presencia de células endometriales no atípicas en mujeres de 45 años o más</option>
        </select>
    </div>
 -->
    <!-- TERMINA BLOQUE CITOLOGIA COMPLEMENTARIA -->

</div>
</div>