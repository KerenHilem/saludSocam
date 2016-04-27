 <body role="document">

    <!-- Fixed navbar <nav class="navbar navbar-inverse navbar-fixed-top">-->
    <nav class="navbar navbar-inverse ">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../index/home.php"><strong>SOCAM</strong></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Inicio</a></li>
            <!-- CREACION DE MENU CAPTURAR -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-plus"></span> Capturar<span class="caret"></span></a>
               <ul class="dropdown-menu"> 
              <?php 
              //nivel 1 = Administrador
              //nivel 2 = Jurisdicción
              //nivel 3 = Laboratorio
              //nivel 4 = Unidad
              
                  // if($_SESSION['nivel']==4 || $_SESSION['nivel']==1){
                  if($_SESSION['nivel']==1){
                    echo '<li class="dropdown-header"><strong>Administrador</strong></li>';
                    echo '<li><a href="../create/fFormatoBase.php"><span class="glyphicon glyphicon-pencil"></span> Estudio Integral</a></li>';
                    echo '<li><a href="../create/fFormatoCitologiaExploracion.php"><span class="glyphicon glyphicon-pencil" ></span> Citología y Exploración</a></li>';
                    echo '<li><a href="../create/fFormatoCitologiaVph.php"><span class="glyphicon glyphicon-pencil" ></span> Citología y VPH</a></li>';
                    echo '<li><a href="../create/fFormatoExploracionVph.php"><span class="glyphicon glyphicon-pencil" ></span> Exploración Clínica y VPH</a></li>';
                    echo "<br>";
                  }

                  // if($_SESSION['nivel']==4 || $_SESSION['nivel']==1){
                  //   echo '<li class="dropdown-header"><strong>Unidad</strong></li>';
                  //   echo '<li><a href="../create/createCitologiaCompleto.php"><span class="glyphicon glyphicon-pencil"></span> Captura de Citología</a></li>';
                  //   echo '<li><a href="../index/citologiaDeteccion.php"><span class="glyphicon glyphicon-search"></span> Detecciones</a></li>';
                  //   echo '<li><a href="../index/citologiaImpresionesAJurisdiccion.php"><span class="glyphicon glyphicon-print"></span> Cola de Impresion</a></li>';
                    
                  //   echo '<!-- <li><a href="../create/createCitologia.php">1 Unidad: Alta</a></li> -->';
                  //   echo '<!-- <li><a href="../index/citologia.php">7 Unidad: Resumen</a></li> -->';
                    
                  //   echo '<li><a href="../index/citologiaResultados.php"><span class="glyphicon glyphicon-list-alt"></span> Resultados Citología</a></li>';
                  //   echo '<li><a href="../index/citologiaEntregadas.php"><span class="glyphicon glyphicon-ok-sign"></span> Citologias Entregadas a Pacientes</a></li>';
                  //   echo '<li><a href="../metas/metaDoctor.php"><span class="glyphicon glyphicon-blackboard"></span> Metas Doctor</a></li>
                  //         <li><a href="../metas/metaUnidad.php"><span class="glyphicon glyphicon-blackboard"></span> Metas Unidad</a></li>
                  //         <li><a href="../index/citologiasRefutadasJurisidccion.php"><span class="glyphicon glyphicon-thumbs-down"></span> Citologías Refutadas de Jurisdicción</a></li>';
                          
                  // }
                ?>

               
               
                </li>
              </ul>
            </li>


            <!-- CREACION DE MENU CITOLOGIAS -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Citologías<span class="caret"></span></a>
               <ul class="dropdown-menu"> 
              <?php 
              //nivel 1 = Administrador
              //nivel 2 = Jurisdicción
              //nivel 3 = Laboratorio
              //nivel 4 = Unidad
              
                  if($_SESSION['nivel']==4 || $_SESSION['nivel']==1){
                    echo '<li class="dropdown-header"><strong>Unidad</strong></li>';
                    echo '<li><a href="../create/fFormatoCitologia.php"><span class="glyphicon glyphicon-pencil"></span> Captura de Citología</a></li>';
                    echo '<li><a href="../index/citologiaDeteccion.php"><span class="glyphicon glyphicon-search"></span> Detecciones</a></li>';
                    echo '<li><a href="../index/citologiaImpresionesAJurisdiccion.php"><span class="glyphicon glyphicon-print"></span> Cola de Impresion</a></li>';
                    
                    echo '<!-- <li><a href="../create/createCitologia.php">1 Unidad: Alta</a></li> -->';
                    echo '<!-- <li><a href="../index/citologia.php">7 Unidad: Resumen</a></li> -->';
                    
                    echo '<li><a href="../index/citologiaResultados.php"><span class="glyphicon glyphicon-list-alt"></span> Resultados Citología</a></li>';
                    echo '<li><a href="../index/citologiaEntregadas.php"><span class="glyphicon glyphicon-ok-sign"></span> Citologias Entregadas a Pacientes</a></li>';
                    echo '<li><a href="../metas/metaDoctor.php"><span class="glyphicon glyphicon-blackboard"></span> Metas Doctor</a></li>
                          <li><a href="../metas/metaUnidad.php"><span class="glyphicon glyphicon-blackboard"></span> Metas Unidad</a></li>
                          <li><a href="../index/citologiasRefutadasJurisidccion.php"><span class="glyphicon glyphicon-thumbs-down"></span> Citologías Refutadas de Jurisdicción</a></li>';
                          
                  }
                ?>

                <?php 
                  if($_SESSION['nivel']==2 || $_SESSION['nivel']==1){
                      // echo '<li role="separator" class="divider"></li>';
                      echo '<li role="separator" class="divider"></li>';
                      echo '<li class="dropdown-header"><strong>Jurisdicción</strong></li>';
                      echo '<li><a href="../jurisdiccion/citologia.php"><span class="glyphicon glyphicon-save-file"></span> Muestras Recibidas de Unidad</a></li>';
                      echo '<li><a href="../jurisdiccion/citologiaRefutadas.php"><span class="glyphicon glyphicon-refresh"></span> Citologias Retornadas Por Unidad</a></li>';
                      echo '<!-- <li><a href="../jurisdiccion/resultadosDeLaboratorio.php">5 Jurisdicción: Resultados de Laboratorio</a></li> -->';
                      // echo '<li role="separator" class="divider"></li>';
                      echo '<li><a href="../jurisdiccion/citologiaImpresionLab.php"><span class="glyphicon glyphicon-print"></span> Lista de Citologias a enviar a laboratorio (imprimir)</a></li>';
                      echo '<li><a href="../index/citologiaResultados.php"><span class="glyphicon glyphicon-list-alt"></span> Resultados Citología de Laboratorio</a></li>';
                  }
                ?>

                <?php 
                  if($_SESSION['nivel']==3 || $_SESSION['nivel']==1){
                      echo '<li role="separator" class="divider"></li>';
                      echo '<li class="dropdown-header"><strong>Laboratorio</strong></li>';
                      echo '<li><a href="../laboratorio/citologia.php"><span class="glyphicon glyphicon-pencil"></span> Captura de Resultados</a>';
                      echo '<li><a href="../laboratorio/citologiaImpresionLab.php">Lista de Resultados a enviar a unidades y jurisdicciones</a></li>';
                      // echo '<li role="separator" class="divider"></li>';
                  }
                ?>
               
                </li>
              </ul>
            </li>

            <!-- creacion de menú Exploración Clínica -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Exploración Clínica<span class="caret"></span></a>
               <ul class="dropdown-menu"> 
              <?php 
              
                  if($_SESSION['nivel']==4 || $_SESSION['nivel']==1){
                    echo '<li class="dropdown-header"><strong>Unidad</strong></li>';
                    echo '<li><a href="../create/fFormatoExploracion.php"><span class="glyphicon glyphicon-pencil"></span> Captura de Exploración Clínica</a></li>';
                    echo '<li><a href="../index/vphDeteccion.php"><span class="glyphicon glyphicon-search"></span> Detecciones</a></li>';
                    echo '<li><a href="../index/vphImpresionesAJurisdiccion.php"><span class="glyphicon glyphicon-print"></span> Cola de Impresion</a></li>';
                    
                    echo '<!-- <li><a href="../create/createVph.php">1 Unidad: Alta</a></li> -->';
                    echo '<!-- <li><a href="../index/vph.php">7 Unidad: Resumen</a></li> -->';
                    
                    echo '<li><a href="../index/vphResultados.php"><span class="glyphicon glyphicon-list-alt"></span> Resultados VPH</a></li>';
                    echo '<li><a href="../index/vphEntregadas.php"><span class="glyphicon glyphicon-ok-sign"></span> VPH  Entregadas a Pacientes</a></li>';
                    echo '<li><a href="../metas/metaDoctor.php"><span class="glyphicon glyphicon-blackboard"></span> Metas Doctor</a></li>
                          <li><a href="../metas/metaUnidad.php"><span class="glyphicon glyphicon-blackboard"></span> Metas Unidad</a></li>
                          <li><a href="../index/vphRefutadasJurisidccion.php"><span class="glyphicon glyphicon-thumbs-down"></span> VPH Refutadas de Jurisdicción</a></li>';
                          
                  }
                ?>

                <?php 
                  if($_SESSION['nivel']==2 || $_SESSION['nivel']==1){
                      // echo '<li role="separator" class="divider"></li>';
                      echo '<li role="separator" class="divider"></li>';
                      echo '<li class="dropdown-header"><strong>Jurisdicción</strong></li>';
                      echo '<li><a href="../jurisdiccion/vph.php"><span class="glyphicon glyphicon-save-file"></span> Muestras Recibidas de Unidad</a></li>';
                      echo '<li><a href="../jurisdiccion/vphRefutadas.php"><span class="glyphicon glyphicon-refresh"></span> VPH Retornadas Por Unidad</a></li>';
                      echo '<!-- <li><a href="../jurisdiccion/resultadosDeLaboratorio.php">5 Jurisdicción: Resultados de Laboratorio</a></li> -->';
                      // echo '<li role="separator" class="divider"></li>';
                      echo '<li><a href="../jurisdiccion/vphImpresionLab.php"><span class="glyphicon glyphicon-print"></span> Lista de VPH a enviar a laboratorio (imprimir)</a></li>';
                      echo '<li><a href="../index/vphResultados.php"><span class="glyphicon glyphicon-list-alt"></span> Resultados VPH de Laboratorio</a></li>';
                  }
                ?>

                <?php 
                  if($_SESSION['nivel']==3 || $_SESSION['nivel']==1){
                      echo '<li role="separator" class="divider"></li>';
                      echo '<li class="dropdown-header"><strong>Laboratorio</strong></li>';
                      echo '<li><a href="../laboratorio/vph.php"><span class="glyphicon glyphicon-pencil"></span> Captura de Resultados</a>';
                      echo '<li><a href="../laboratorio/vphImpresionLab.php">Lista de Resultados a enviar a unidades y jurisdicciones</a></li>';
                      // echo '<li role="separator" class="divider"></li>';
                  }
                ?>
                </li>
              </ul>
            </li>

            <!-- creacion de menú VPH -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">VPH<span class="caret"></span></a>
               <ul class="dropdown-menu"> 
              <?php 
              
                  if($_SESSION['nivel']==4 || $_SESSION['nivel']==1){
                    echo '<li class="dropdown-header"><strong>Unidad</strong></li>';
                    echo '<li><a href="../create/fFormatoVph.php"><span class="glyphicon glyphicon-pencil"></span> Captura de VPH</a></li>';
                    echo '<li><a href="../index/vphDeteccion.php"><span class="glyphicon glyphicon-search"></span> Detecciones</a></li>';
                    echo '<li><a href="../index/vphImpresionesAJurisdiccion.php"><span class="glyphicon glyphicon-print"></span> Cola de Impresion</a></li>';
                    
                    echo '<!-- <li><a href="../create/createVph.php">1 Unidad: Alta</a></li> -->';
                    echo '<!-- <li><a href="../index/vph.php">7 Unidad: Resumen</a></li> -->';
                    
                    echo '<li><a href="../index/vphResultados.php"><span class="glyphicon glyphicon-list-alt"></span> Resultados VPH</a></li>';
                    echo '<li><a href="../index/vphEntregadas.php"><span class="glyphicon glyphicon-ok-sign"></span> VPH  Entregadas a Pacientes</a></li>';
                    echo '<li><a href="../metas/metaDoctor.php"><span class="glyphicon glyphicon-blackboard"></span> Metas Doctor</a></li>
                          <li><a href="../metas/metaUnidad.php"><span class="glyphicon glyphicon-blackboard"></span> Metas Unidad</a></li>
                          <li><a href="../index/vphRefutadasJurisidccion.php"><span class="glyphicon glyphicon-thumbs-down"></span> VPH Refutadas de Jurisdicción</a></li>';
                          
                  }
                ?>

                <?php 
                  if($_SESSION['nivel']==2 || $_SESSION['nivel']==1){
                      // echo '<li role="separator" class="divider"></li>';
                      echo '<li role="separator" class="divider"></li>';
                      echo '<li class="dropdown-header"><strong>Jurisdicción</strong></li>';
                      echo '<li><a href="../jurisdiccion/vph.php"><span class="glyphicon glyphicon-save-file"></span> Muestras Recibidas de Unidad</a></li>';
                      echo '<li><a href="../jurisdiccion/vphRefutadas.php"><span class="glyphicon glyphicon-refresh"></span> VPH Retornadas Por Unidad</a></li>';
                      echo '<!-- <li><a href="../jurisdiccion/resultadosDeLaboratorio.php">5 Jurisdicción: Resultados de Laboratorio</a></li> -->';
                      // echo '<li role="separator" class="divider"></li>';
                      echo '<li><a href="../jurisdiccion/vphImpresionLab.php"><span class="glyphicon glyphicon-print"></span> Lista de VPH a enviar a laboratorio (imprimir)</a></li>';
                      echo '<li><a href="../index/vphResultados.php"><span class="glyphicon glyphicon-list-alt"></span> Resultados VPH de Laboratorio</a></li>';
                  }
                ?>

                <?php 
                  if($_SESSION['nivel']==3 || $_SESSION['nivel']==1){
                      echo '<li role="separator" class="divider"></li>';
                      echo '<li class="dropdown-header"><strong>Laboratorio</strong></li>';
                      echo '<li><a href="../laboratorio/vph.php"><span class="glyphicon glyphicon-pencil"></span> Captura de Resultados</a>';
                      echo '<li><a href="../laboratorio/vphImpresionLab.php">Lista de Resultados a enviar a unidades y jurisdicciones</a></li>';
                      // echo '<li role="separator" class="divider"></li>';
                  }
                ?>
                </li>
              </ul>
            </li>


            <!-- menú Exploración Clínica -->
            <?php 
          if($_SESSION['nivel']==1 || $_SESSION['nivel']==2 || $_SESSION['nivel']==4){
           // echo '<li class="dropdown">
           //               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Exploraciones Clinicas<span class="caret"></span></a>
           //               <ul class="dropdown-menu">
           //                 <li><a href="../create/createExploracionClinicaCompleto.php">Captura de Exploración Clínica.</a></li>
           //                 <li><a href="../index/citologiaDeteccion.php">Detecciones</a></li>
           //                 <li><a href="../index/citologiaDeteccion.php">Cola de Impresión</a></li>
           //                 <li><a href="../index/citologiaResultados.php">Resultados Exploración Clínica.</a></li>
           //                 <li><a href="../index/citologiaEntregadas.php">Exploraciones Entregadas a Pacientes</a></li>
           //                 <li><a href="../metas/metaDoctor.php">Metas Doctor</a></li>
           //                 <li><a href="../metas/metaUnidad.php">Metas Unidad</a></li>
           //                 <li role="separator" class="divider"></li>
           //               </ul>
           //             </li>';
                     }
            ?>
<?php 
   if($_SESSION['nivel']==1 || $_SESSION['nivel']==2){
            echo '<li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Oficina Central<span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="../metas/citologia_tablas_enero.php">J2 Citologias Enero</a></li>
                            <li><a href="../metas/exploraciones_tablas_enero.php">J2 Exploraciones Enero</a></li>
                            <li><a tabindex="-1" href="../metas/metasMexicali.php">Metas Mexicali</a></li>
                          </ul>
                        </li>';
          }
            ?>


            <li class="dropdown">
              <a id="dLabel" role="button" data-toggle="dropdown" class="dropdown-toggle" data-target="#" href="/page.html">Administracion<span class="caret"></span>
            </a>
              <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
              
        
                    <li class="dropdown-submenu">
                            <a tabindex="-1" href="../index/usuario.php"><span class="glyphicon glyphicon-user"></span>Usuarios</a>
                            <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="../create/createUsuario.php">Alta</a></li>
                            <li><a href="../index/usuario.php">Resumen</a></li>
                            <li><a href="#">Busqueda</a></li>
                            </ul>
                    </li>
              
                     <li class="dropdown-submenu">
                      <a tabindex="-1" href="../index/unidad.php"><span class="glyphicon glyphicon-home"></span> Unidades</a>
                      <ul class="dropdown-menu">
                        <li><a tabindex="-1" href="../create/createUnidad.php">Alta</a></li>
                        <li><a href="../index/unidad.php">Resumen</a></li>
                        <li><a href="#">Busqueda</a></li>
                      </ul>
                    </li>

      
                          <li class="dropdown-submenu">
                              <a tabindex="-1" href="../index/hojaResumenCitologia.php"><span class="glyphicon glyphicon-list-alt"></span> Hoja De Resumen (Citología, Exploración)</a>
                             <ul class="dropdown-menu">
                              <li class="dropdown-header"><strong>Captura de Hoja</strong></li>
                                <li><a tabindex="-1" href="../create/createHojaResumenCitologiaExploracion.php">Captura Ambas Citología y Exploración</a></li>
                                <li><a href="../create/createHojaResumenCitologia.php">Captura hoja de resumen solo Citología</a></li>
                                <li role="separator" class="divider"></li>
                                <li class="dropdown-header"><strong>Resumen</strong></li>
                                <li><a href="../index/hojaResumenCitologia.php">Resumen de Citología</a></li>
                                <li><a href="../index/hojaResumenExploracion.php">Resumen de Exploración</a></li>
                                <li><a href="#">Busqueda</a></li>
                              </ul>
                            </li>
                            </li>
            

             <?php 
              if($_SESSION['nivel']==4 || $_SESSION['nivel']==1){
                echo '<li class="dropdown-submenu">';
                echo '<a tabindex="-1" href="../index/personal.php"><span class="glyphicon glyphicon-user"></span> Personal</a>';
                echo '<ul class="dropdown-menu">';
                echo '<li><a tabindex="-1" href="../create/createPersonal.php">Alta</a></li>';
                echo '<li><a href="../index/personal.php">Resumen</a></li>';
                echo '<li><a href="#">Busqueda</a></li>';
                echo '</ul>';
                echo '</li>';
              }
              ?>
               <li class="divider"></li>
              <li class="dropdown-submenu">
                <a tabindex="-1" href="../index/paciente.php"><span class="glyphicon glyphicon-user"></span> Pacientes</a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="../create/createPaciente.php">Alta</a></li>
                  <li><a href="../index/paciente.php">Resumen</a></li>
                  <li><a href="#">Busqueda</a></li>
                </ul>
              </li>
               <li class="divider"></li>
               <?php 
                if($_SESSION['nivel']==1 || $_SESSION['nivel']==1){
                echo '<li class="dropdown-submenu">';
                echo '<a tabindex="-1" href="../index/laboratorio.php"><span class="glyphicon glyphicon-home"></span> Laboratorios</a>';
                echo '<ul class="dropdown-menu">';
                echo '<li><a tabindex="-1" href="../create/createLaboratorio.php">Alta</a></li>';
                echo '<li><a href="../index/laboratorio.php">Resumen</a></li>';
                echo '<li><a href="#">Busqueda</a></li>';
                echo '</ul>';
                echo '</li>';
              }
              ?>
              <?php 
                if($_SESSION['nivel']==2 || $_SESSION['nivel']==1){
              echo '<li class="dropdown-submenu">
                              <a tabindex="-1" href="../index/jurisdiccion.php"><span class="glyphicon glyphicon-minus"></span> Jurisdicciones</a>
                              <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="../create/createJurisdiccion.php">Alta</a></li>
                                <li><a href="../index/jurisdiccion.php">Resumen</a></li>
                                <li><a href="#">Busqueda</a></li>
                              </ul>
                            </li>
                            <li class="dropdown-submenu">
                              <a tabindex="-1" href="../index/jurisdiccion.php"><span class="glyphicon glyphicon-minus"></span> Municipios</a>
                              <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="../create/createMunicipio.php">Alta</a></li>
                                <li><a href="../index/municipio.php">Resumen</a></li>
                                <li><a href="#">Busqueda</a></li>
                              </ul>
                            </li>';
                            }
              ?>
              <?php 
                if($_SESSION['nivel']==4 || $_SESSION['nivel']==1){
                  echo '<li class="dropdown-submenu">
                              <a tabindex="-1" href="../index/localidad.php"><span class="glyphicon glyphicon-minus"></span> Localidades</a>
                              <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="../create/createLocalidad.php">Alta</a></li>
                                <li><a href="../index/localidad.php">Resumen</a></li>
                                <li><a href="#">Busqueda</a></li>
                              </ul>
                            </li>';
            }
            ?>

       <!--        <li class="divider"></li>
              <li class="dropdown-submenu">
                <a tabindex="-1" href="#">Hover me for more options</a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="#">Second level</a></li>
                  <li class="dropdown-submenu">
                    <a href="#">Even More..</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">3rd level</a></li>
                      <li><a href="#">3rd level</a></li>
                    </ul>
                  </li>
                  <li><a href="#">Second level</a></li>
                  <li><a href="#">Second level</a></li>
                </ul>
              </li> -->
            </ul>
            </li>
             <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Perfil<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#"><span class="glyphicon glyphicon-pencil"></span> Modificar </a></li>
                <li><a href="#"><span class="glyphicon glyphicon-cog"></span> Configuración </a></li>
                <li><a href="../salir.php"><span class="glyphicon glyphicon-off"></span> Salir </a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    