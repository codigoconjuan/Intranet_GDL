<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section class="container">

    <?php
    
           // se asigna la categoria al evento en caso de existir
        if (class_exists('EM_Events')) {
                if(isset($_GET['event-categories'])) { 
                    $categoria = $_GET['event-categories'];
                }
        } 
    ?>

    <div class="container">
        <div class="proximosEventos">
                <div class="calendario">
                    <?php // se imprime el calendario ?>
                  <?php echo EM_Calendar::output(array('full'=>1, 'long_events'=>1)) ?>                
                    <div class="tipoEvento">
                        <ul class="evento">
                            <li class="cursos">Cursos y talleres</li>
                            <li class="conferencias">Conferencias</li>
                            <li class="diplomados">Diplomados</li>
                            <li class="varios">Varios</li>
                        </ul>
                    </div>
                </div>
                
                <!-- eventos del dia -->
             <div class="eventosDia">
                    <section class="cuadro">
                        <div class="titulos uppercase">
                               <?php
                                    $fecha_hoy = "";
                                    setlocale(LC_ALL,"es_ES");
                                    $dia_hoy = strftime("%A");
                                    $fecha_hoy = strftime("%d de %B del %Y");
                                    $fecha_hoy = utf8_encode($fecha_hoy);
                                    $dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
                                    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                    
                                    $EM_Events = EM_Events::get( array('limit'=>2,'orderby'=>'event_start_date', 'category' => $categoria, 'scope' => 'today' ) );
                                    
                                    ?> 
                                
              
                                    
                                    <?php
                                     
                                    if(isset($_GET['calendar_day']) )    {
                                        $dia_hoy = $_GET['calendar_day'];
                                        $dia_hoy = strftime("%A", strtotime($dia_hoy));
                                        $fecha_hoy = $_GET['calendar_day'];
                                        $fecha_hoy = strftime("%d de %B del %Y", strtotime($fecha_hoy));
                                        $fecha_hoy = utf8_encode($fecha_hoy);
                                        echo '<span>' . $dia_hoy . '</span> ' . $fecha_hoy;
                                    } else if ( empty( $EM_Events ) ) {
                                        // echo '<span>' . $dias[date('w')]." </span> ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
                                        echo "Próximos Eventos";
                                    } else {
                                        echo '<span>' . $dias[date('w')]." </span> ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
                                    }
                                ?>
                        </div>
                        <ul class="eventosDiaCalendario">
                                    <?php
                                        if (class_exists('EM_Events')) {                         
                                            if(isset($_GET['calendar_day'])) {
                                                $fecha = $_GET['calendar_day']; // Cuando presionan una fecha en el calendario esto se ejecuta
                                                $EM_Events = EM_Events::get( array('limit'=>2,'orderby'=>'event_start_date', 'scope' => $fecha, 'category' => $categoria ) );
                                                    foreach ( $EM_Events as $EM_Event ) { ?>
                                                        <li class="evento">
                                                            <div class="eventoSuperior">
                                                                    <?php $contenido =  $EM_Event->post_content; 
                                                                    if($contenido) { ?>
                                                                        <p class="nombreCurso"><?php echo $contenido ?></p>
                                                                    <?php }  ?>
                                                                        
                                                                    <?php $fechaCurso = $EM_Event->output("#l #d de #F de #Y");
                                                                    if($fechaCurso) { ?>
                                                                        <p class="fechaCurso"><?php echo $fechaCurso ?> <span style="background-color:<?php echo $EM_Event->output("#_CATEGORYCOLOR") ?>"><?php echo $EM_Event->event_name; ?></span></p>
                                                                    <?php }  ?>
                                                            </div>
                                                            <div class="eventoSede">
                                                                    <?php $lugar = $EM_Event->output("#_LOCATIONNAME");  
                                                                    if($lugar) { ?>
                                                                           <p class="sedeCurso">Sede: <?php echo $lugar;  ?></p>
                                                                     <?php }  ?>
                                                                           
                                                                    <?php $direccion = $EM_Event->output('#_LOCATIONADDRESS');  
                                                                    if($direccion) { ?>
                                                                        <p class="direccionCurso"><?php echo $direccion; ?></p>
                                                                    <?php }  ?>
                                                            </div>
                                                            <div class="eventoHorario">
                                                                    <?php $horario = $EM_Event->output("#_EVENTTIMES");
                                                                    if($horario) { ?>
                                                                            <p class="horarioCurso">HORARIO: <?php echo $horario ?></p>
                                                                    <?php }  ?>
                                                            </div>
                                                            <div class="eventoExpositor">
                                                                    <?php $imparte = $EM_Event->output("#_ATT{imparte}"); 
                                                                    if($imparte) { ?>
                                                                        <p class="expositorCurso">IMPARTE: <?php echo $imparte; ?></p>
                                                                    <?php }  ?>
                                                            </div>
                                                        </li>
                                                    <?php } //fin foreach
                                            } else { // Esto se ejecuta directameante
                                                $EM_Events = EM_Events::get( array('limit'=>2,'orderby'=>'event_start_date', 'scope' => array('future','today'),  'category' => $categoria) );
                                                foreach ( $EM_Events as $EM_Event ) { ?>
                                                        <li class="evento">
                                                            <div class="eventoSuperior">
                                                                    <?php $contenido =  $EM_Event->post_content; 
                                                                    if($contenido) { ?>
                                                                        <p class="nombreCurso"><?php echo $contenido ?></p>
                                                                    <?php }  ?>
                                                                        
                                                                    <?php $fechaCurso = $EM_Event->output("#l #d de #F de #Y");
                                                                    if($fechaCurso) { ?>
                                                                        <p class="fechaCurso"><?php echo $fechaCurso ?> <span style="background-color:<?php echo $EM_Event->output("#_CATEGORYCOLOR") ?>"><?php echo $EM_Event->event_name; ?></span></p>
                                                                    <?php }  ?>
                                                            </div>
                                                            <div class="eventoSede">
                                                                    <?php $lugar = $EM_Event->output("#_LOCATIONNAME");  
                                                                    if($lugar) { ?>
                                                                           <p class="sedeCurso">Sede: <?php echo $lugar;  ?></p>
                                                                     <?php }  ?>
                                                                           
                                                                    <?php $direccion = $EM_Event->output('#_LOCATIONADDRESS');  
                                                                    if($direccion) { ?>
                                                                        <p class="direccionCurso"><?php echo $direccion; ?></p>
                                                                    <?php }  ?>
                                                            </div>
                                                            <div class="eventoHorario">
                                                                    <?php $horario = $EM_Event->output("#_EVENTTIMES");
                                                                    if($horario) { ?>
                                                                            <p class="horarioCurso">HORARIO: <?php echo $horario ?></p>
                                                                    <?php }  ?>
                                                            </div>
                                                            <div class="eventoExpositor">
                                                                    <?php $imparte = $EM_Event->output("#_ATT{imparte}"); 
                                                                    if($imparte) { ?>
                                                                        <p class="expositorCurso">IMPARTE: <?php echo $imparte; ?></p>
                                                                    <?php }  ?>
                                                                       
                                                                    <?php $informes = $EM_Event->output("#_ATT{informes}"); 
                                                                    if($informes) { ?>
                                                                        <p class="expositorCurso">INFORMES: <?php echo $informes; ?></p>
                                                                    <?php }  ?>
                                                            </div>
                                                        </li>
                                                 <?php  } // fin foreach
                                            } // fin else
                                        } //fin class exist
                                    ?>
                            <div class="clear"></div>
                        </ul> <!--./eventosDiaCalendario-->
                    </section>
                </div> <!--./eventosDia -->
	
				<br class="clear">

				<?php edit_post_link(); ?>
                                

			</article>
			<!-- /article -->
                        


    
                    <section class="listadoCursos">

                                               
                                <?php
                                    // se obtiene la categoria
                                    if (class_exists('EM_Events')) {
                                            $EM_Events = EM_Events::get( array('limit'=>10,'orderby'=>'event_start_date', 'category' => $categoria) );
                                            $i = 0;
                                            foreach ( $EM_Events as $EM_Event ) {
                                                   if($i == 0) {
                                                        echo '<h2 class="cursosLista" style="background-color:' . $EM_Event->output("#_CATEGORYCOLOR") . '">' . $categoria . '</h2>';
                                                   } 
                                                   
                                                    $i++;
                                            }
                                    }

                                ?>
                        <div class="row clear">
                                <?php
                                    if (class_exists('EM_Events')) {
                                            $EM_Events = EM_Events::get( array('limit'=>9,'orderby'=>'event_start_date', 'category' => $categoria) );
                                            foreach ( $EM_Events as $EM_Event ) {
                                                    echo '<div class="cuatroColumnas">';
                                                    echo '<h3 style="background-color: '. $EM_Event->output("#_CATEGORYCOLOR") . '">' . $EM_Event->event_name . '</h3>';
                                                    echo '<div class="info">';
                                                    echo '<p class="listadoMayus"> Sede: ' . $EM_Event->output("#_LOCATIONNAME") . ' </p>';
                                                  //  echo '<p class="listadoMayus"> ' . $EM_Event->event_name . ' </p>';
                                                    echo '</div><!--./info-->';
                                                    echo '<div class="info">';
                                                // echo $fechaCurso = $EM_Event->output("#l #d de #F de #Y");
                                                
                                                // fecha de los eventos
                                                $fechaCurso = $EM_Event->output("#_EVENTDATES");
                                                $fechaCurso = explode(' - ', $fechaCurso);
                                                $fechaInicio = $fechaCurso[0];
                                                $date = DateTime::createFromFormat('d/m/Y', $fechaInicio);
                                                $fechaInicio = $date->format('d-m-Y'); 
                                                $fechaInicio = strftime("%d de %B del %Y", strtotime($fechaInicio));
                                                $fechaInicio = utf8_encode($fechaInicio);
                                                echo "INICIO: " . $fechaInicio;
                                                
                                                echo "<br/>";
                                                
                                                if( !empty( $fechaCurso[1] ) ) {
                                                        $fechaFin = $fechaCurso[1];
                                                        $date = DateTime::createFromFormat('d/m/Y', $fechaFin);
                                                        $fechaFin = $date->format('d-m-Y'); 
                                                        $fechaFin = strftime("%d de %B del %Y", strtotime($fechaFin));
                                                        $fechaFin = utf8_encode($fechaFin);
                                                        echo "CONCLUYE: " . $fechaFin;
                                                }
                                                

                                                    
                                                    
                                                    $categoria = $EM_Event->output('#_CATEGORYNAME');
                                                    
                                         
                                                    if($categoria == 'CONFERENCIAS') {
                                                         echo '<p>' .' Hora inicio: ' . $EM_Event->output("#_12HSTARTTIME") . '</p>';
                                                    } else {
                                                        echo '<p>' .' De ' . $EM_Event->output("#_12HSTARTTIME") . ' a ' . $EM_Event->output("#_12HENDTIME") . '  </p>';
                                                    }
                                                
                                                $imparte = $EM_Event->output("#_ATT{imparte}");
                                                if($imparte != '') {
                                                     echo '<p> IMPARTE:' . $EM_Event->output("#_ATT{imparte}") . ' </p>';
                                                }
                                                $informes = $EM_Event->output("#_ATT{informes}");
                                                if($informes != '') {
                                                     echo '<p> INFORMES:' . $EM_Event->output("#_ATT{informes}") . ' </p>';
                                                }
                                                    echo '</div><!--./info-->';
                                                    echo '<div class="info">';
                                                    echo '<p>' . $EM_Event->post_content. '</p>';
                                                    echo '</div><!--./info-->';
                                                    echo '</div>';
                                            }
                                    }
                                ?>
                       </div>
                    </section>
    
                    </div>

	

		</section>
		<!-- /section -->
	</main>



<script>
    <?php if(isset($_GET['event-categories'])) { ?>
        jQuery(document).ready(function() {
               setTimeout(function() {
                   jQuery('nav.nav li.menu-item-6765').trigger('mouseenter');
               },100);
               jQuery('nav.nav li.menu-item-6765').addClass('activo')
        });
   <?php } ?>
</script>
<?php get_footer(); ?>
