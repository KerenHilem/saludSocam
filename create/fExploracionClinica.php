<div class="panel panel-primary">
  <div class="panel-heading">
    <h1 class="panel-title">EXPLORACIÓN CLÍNICA</h1>
  </div>
  <div class="panel-body">

        <div class="form-group col-md-12">
          <h2><span class="label label-default">IV. Factores de Riesgo</span></h2>

            <div class="form-group col-md-4">
              <label for="presento_menarca"><br>Presentó Menarca:</label>
                <select name="presento_menarca" class="form-control" >
                  <option value="NO">1. No</option>
                  <option value="SI">2. Si</option>
                </select>
            </div>

            <div class="form-group col-md-4">
              <label for="edad_presentacion_menarca"><br>Edad de presentación de la menarca:</label>
              <input type="number" max="99" min="0" class="form-control" id="edad_presentacion_menarca" name="edad_presentacion_menarca" placeholder="Ingresa edad en años" disabled>
            </div>

            <div class="form-group col-md-4">
              <label for="presento_menopausia"><br>Presentó Menopausia:</label>
                <select name="presento_menopausia" class="form-control" >
                  <option value="NO">1. No</option>
                  <option value="SI">2. Si</option>
                </select>
            </div>

            <div class="form-group col-md-4">
              <label for="edad_presentacion_menopausia">Edad de presentación de la menopausia:</label>
              <input type="number" max="99" min="0" class="form-control" id="edad_presentacion_menopausia" name="edad_presentacion_menopausia" placeholder="Ingresa edad en años" disabled>
            </div>

            <div class="form-group col-md-4">
              <label for="utiliza_terapia">Utiliza alguna terapia de reemplazo hormonal:</label>
                <select name="utiliza_terapia" class="form-control" >
                  <option value="NO">1. No</option>
                  <option value="SI">2. Si</option>
                </select>
            </div>

            <div class="form-group col-md-4">
              <label for="tiempo_utilizacion">Tiempo de utilización:</label>
              <input type="number" max="99" min="0" class="form-control" id="tiempo_utilizacion" name="tiempo_utilizacion" placeholder="Ingresa tiempo en años" disabled>
            </div>

            <div class="form-group col-md-4">
              <label for="nuligesta">Nuligesta:</label>
                <select name="nuligesta" class="form-control">
                  <option value="NO">1. No</option>
                  <option value="SI" selected>2. Si</option>
                </select>
            </div>

            <div class="form-group col-md-4">
              <label for="fecha_primer_embarazo">Fecha de primer embarazo de término:</label>
              <input type="date" class="form-control" id="fecha_primer_embarazo" name="fecha_primer_embarazo" placeholder="Ingresa Fecha" disabled="true">
            </div>

            <div class="form-group col-md-4">
              <label for="amamanto_hijos">Amamantó a sus hijos:</label>
                <select id="amamanto_hijos" name="amamanto_hijos" class="form-control" disabled="true">
                  <option value="NO">1. No</option>
                  <option value="SI">2. Si</option>
                </select>
            </div>

            <div class="form-group col-md-6">
              <label for="antecedentes_familiares">En qué familiares tiene antecedentes de cáncer mamario:</label>
                <select name="antecedentes_familiares" class="form-control" >
                  <option value="Madre">1. Madre</option>
                  <option value="Hermana">2. Hermana</option>
                  <option value="Hija">3. Hija</option>
                  <option value="Madre y Hermana">4. Madre y Hermana</option>
                  <option value="Madre e Hija">5. Madre e Hija</option>
                  <option value="Hermana e Hija">6. Hermana e Hija</option>
                  <option value="Otro">7. Otro</option>
                  <option value="Ninguno" selected>8. Ninguno</option>
                </select>
            </div>

            <div class="form-group col-md-6">
              <label for="edad_familiar">Edad que tenía el familiar cuando le fue diagnosticado el cáncer:</label>
              <input type="number" max="99" min="0" class="form-control" id="edad_familiar" name="edad_familiar" placeholder="Ingresa edad en años" disabled>
            </div>

            <div class="form-group col-md-4">
              <label for="antecedente_personal">Antecedente personal de cáncer mamario:</label>
                <select name="antecedente_personal" class="form-control" >
                  <option value="NO">1. No</option>
                  <option value="SI">2. Si</option>
                </select>
            </div>

            <div class="form-group col-md-2">
              <label for="ano_diagnostico">Año de diagnóstico:</label>
              <input type="number" max="99" min="0" class="form-control" id="ano_diagnostico" name="ano_diagnostico" placeholder="Ingresa año" disabled>
            </div>

            <div class="form-group col-md-6">
              <label for="enfermedad_benigna">Le han diagnosticado alguna enfermedad benigna en la mama:</label>
                <select name="enfermedad_benigna" class="form-control" >
                  <option value="NO">1. No</option>
                  <option value="SI">2. Si</option>
                </select>
            </div>

            <div class="form-group col-md-4">
              <label for="especifique">Especifique:</label>
              <input type="text" class="form-control" id="especifique" name="especifique" placeholder="" disabled>
            </div>

            <div class="form-group col-md-4">
              <label for="cirugia_mama">Le han realizado alguna cirugía en la mama:</label>
                <select name="cirugia_mama" class="form-control" >
                  <option value="NO">1. No</option>
                  <option value="SI">2. Si</option>
                </select>
            </div>

            <div class="form-group col-md-4">
              <label for="tipo_cirugia">Tipo de cirugía:</label>
                <select name="tipo_cirugia" id="tipo_cirugia" class="form-control" disabled>
                  <option value="Biopsia">1. Biopsia</option>
                  <option value="Implante">2. Implante</option>
                  <option value="Otro">2. Otro</option>
                </select>
            </div>

            <div class="form-group col-md-4">
              <label for="ano_cirugia">Año de la cirugía:</label>
              <input type="number" max="99" min="0" class="form-control" name="ano_cirugia" id="ano_cirugia" placeholder="Ingresa año" disabled>
            </div>

            <div class="form-group col-md-4">
              <label for="otro_especifique">Otro especifique:</label>
              <input type="text" class="form-control" id="otro_especifique" name="otro_especifique" placeholder="" disabled>
            </div>

            <div class="form-group col-md-4">
              <label for="antecedente_hiperplasia">Antecedentes Personales de hiperplasia atípica:</label>
                <select name="antecedente_hiperplasia" class="form-control" >
                  <option value="NO">1. No</option>
                  <option value="SI">2. Si</option>
                </select>
            </div>

            <div class="form-group col-md-4">
              <label for="otros_factores_cancer">Otros factores para Cáncer de mama:</label>
                <select name="otros_factores_cancer" id="otros_factores_cancer" class="form-control" >
                  <option value="NO">1. No</option>
                  <option value="SI">2. Si</option>
                </select>
            </div>

            <div class="form-group col-md-8">
              <label for="otros_factores">Otros factores especifique:</label>
              <input type="text" class="form-control" name="otros_factores" id="otros_factores" placeholder="" disabled>
            </div>

            <div class="page-header col-md-12">
              <h3>Exploración Clínica de mama</h3>
            </div><!-- Exploracion clinica de mama -->

            <div class="form-group col-md-4">
              <label for="antecedentes_deteccion">Antecedentes de detección:</label>
                <select name="antecedentes_deteccion" class="form-control" >
                  <option value="Autoexploración">1. Autoexploración</option>
                  <option value="Examen Clínico previo">2. Examen Clínico previo</option>
                  <option value="Mamografía">3. Mamografía</option>
                  <option value="USG">4. USG</option>
                  <option value="Ninguno" selected>5. Ninguno</option>
                </select>
            </div>

            <div class="form-group col-md-4">
              <label for="fecha_ultimo_estudio">Fecha de último estudio:</label>
              <input type="date" class="form-control" name="fecha_ultimo_estudio" id="fecha_ultimo_estudio" placeholder="Ingresa Fecha" disabled>
            </div>

            <div class="form-group col-md-4">
              <label for="resultado_ultimo_estudio">Resultado en BIRADS:</label>
                <select name="resultado_ultimo_estudio" id="resultado_ultimo_estudio" class="form-control" disabled>
                  <option value="Negativo">1. Negativo</option>
                  <option value="Benigno">2. Benigno</option>
                  <option value="Probablemente benigno">3. Probablemente benigno</option>
                  <option value="Anormalidad sospechosa">4. Anormalidad sospechosa</option>
                  <option value="Baja sospecha de malignidad">4A. Baja sospecha de malignidad</option>
                  <option value="Riesgo intermedio de malignindad">4B. Riesgo intermedio de malignindad</option>
                  <option value="Riesgo moderado de malignindad">4C. Riesgo moderado de malignindad</option>
                  <option value="Altamente sugestiva de malignidad">5. Altamente sugestiva de malignidad</option>
                </select>
            </div>

            <div class="form-group col-md-12">
              <h2><span class="label label-default">V. Datos Clínicos<br></span></h2>
            </div><!-- Datos clinicos -->

             <div class="form-group col-md-12">
              <label for="signos_clinicos">Signos clínicos:</label>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="Nódulos sólidos, irregulares de consistencia dura jo a planos profundos">1. Nódulos sólidos, irregulares de consistencia dura fijo a planos profundos
                  </label>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="Cambios cutáneos evidentes (piel de naranja, retracción de la piel, lesión areolar que no cicatriza a pesar del tratamiento)">2. Cambios cutáneos evidentes (piel de naranja, retracción de la piel, lesión areolar que no cicatriza a pesar del tratamiento)
                  </label>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="Zona de sistematización en el tejido glandular focalizado a una sola mama y región">3. Zona de sistematización en el tejido glandular focalizado a una sola mama y región
                  </label>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="Secreción serosanguinolenta">4. Secreción serosanguinolenta
                  </label>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="Crecimiento ganglionar axilar o supreclavicular">5. Crecimiento ganglionar axilar o supreclavicular
                  </label>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="Ninguno">6. Ninguno
                  </label>
                </div>
            </div>

           <div class="form-group col-md-4">
              <label for="fecha_inicio_primer_signo">Fecha de inicio del primer síntoma o signo:</label>
              <input type="date" class="form-control" id="fecha_inicio_primer_signo" name="fecha_inicio_primer_signo" placeholder="Ingresa Fecha">
            </div>

            <div class="form-group col-md-12">
              <label for="espacio"></label>
            </div>

            <div class="form-group col-md-3 col-xl-3 col-xs-3">
              <label for="localizacion">Localización:</label>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="1">1. 1
                  </label>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="2">1. 2
                  </label>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="3">1. 3
                  </label>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="4">1. 4
                  </label>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="5">1. 5
                  </label>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="Axila)">6. Axila
                  </label>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="Hueco supra clavicular">7. Hueco supra clavicular
                  </label>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="Mama derecha">8. Mama derecha
                  </label>
                </div>
              
            </div>

            <div class="form-group col-md-7 col-xl-7 col-xs-7">
              <img src="../plantilla/images/diagrama_exploracion_clinica.PNG">
            </div>
            
            <div class="form-group col-md-2 col-xl-2 col-xs-2">
              <div class="checkbox">
                  <label>
                    <input type="checkbox" value="9">9. 9
                  </label>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="10">10. 10
                  </label>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="11">11. 11
                  </label>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="12">12. 12
                  </label>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="13">13. 13
                  </label>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="Axila">14. Axila
                  </label>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="Hueco supra clavicular">15. Hueco supra clavicular
                  </label>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="Mama izquierda">16. Mama izquierda
                  </label>
                </div>
              </div>

              <div class="form-group col-md-12">
              <label for="espacio"> </label>
              </div>

            <div class="form-group col-md-6">
              <label for="cedula_realizo_estudio">Cédula profesional de quién realizó el estudio:</label>
              <input type="text"  class="form-control" id="cedula_realizo_estudio" name="cedula_realizo_estudio" placeholder="Ingresa Cédula" required>
            </div>

             <div class="form-group col-md-6">
              <label for="conducta_seguir">Conducta a seguir:</label>
                <select name="conducta_seguir" class="form-control" >
                  <option value="Cita en seis meses">1. Cita en seis meses</option>
                  <option value="Detección de rutina en un año">2. Detección de rutina en un año</option>
                  <option value="Mastografía de tamizaje">3. Mastografía de tamizaje</option>
                  <option value="Referencia a evaluación con imagen complementaria ( Masto. diagnóstica o USG)">4. Referencia a evaluación con imagen complementaria ( Masto. diagnóstica o USG)</option>
                </select>
            </div>

            <div class="form-group col-md-6">
              <label for="motivo_referencia">Motivo de la referencia:</label>
                <select name="motivo_referencia" class="form-control" >
                  <option value="Tumoración palpable">1. Tumoración palpable</option>
                  <option value="Signos sugestivos">2. Signos sugestivos</option>
                  <option value="Mamografía anormal">3. Mamografía anormal</option>
                  <option value="Factores de riesgo">4. Factores de riesgo</option>
                </select>
            </div>        

            <div class="form-group col-md-6">
              <label for="fecha_referencia">Fecha de referencia:</label>
              <input type="date" class="form-control" id="fecha_referencia" name="fecha_referencia" placeholder="Ingresa Fecha" value="<?php echo date('Y-m-d');?>">
            </div>
          </div>

</div>
</div>
