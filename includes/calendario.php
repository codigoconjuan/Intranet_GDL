    <div class="proximosEventos">
            <div class="calendario">
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

            <div class="eventosDia">
                <section class="cuadro">
                    <div class="titulos uppercase">
                           <?php
                                $fecha_hoy = "";
                                setlocale(LC_ALL,"es_ES");

                                $dia_hoy = strftime("%A");
                                $fecha_hoy = strftime("%d de %B del %Y");
                                $fecha_hoy = utf8_encode($fecha_hoy);
                                echo '<span>' . $dia_hoy . '</span> ' . $fecha_hoy;
                           ?>
                    </div>

                    
                    <ul class="eventosDiaCalendario">
                           
                                
                                <?php
                                            if (class_exists('EM_Events')) {
                                                
                                                
                                                if(isset($_GET['calendar_day'])) {
                                                    $fecha = $_GET['calendar_day']; 
                                                    $EM_Events = EM_Events::get( array('limit'=>2,'orderby'=>'event_start_date', 'scope' => $fecha) );
                                                    foreach ( $EM_Events as $EM_Event ) {

                                                     ?>
                                                        <li class="evento">
                                                            <div class="eventoSuperior">
                                                                    <p class="nombreCurso"><?php echo $EM_Event->post_content; ?></p>
                                                                    <p class="fechaCurso"><?php echo $EM_Event->event_start_date; ?> <span style="background-color:<?php echo $EM_Event->output("#_CATEGORYCOLOR") ?>"><?php echo $EM_Event->event_name; ?></span></p>
                                                            </div>

                                                            <div class="eventoSede">
                                                                    <p class="sedeCurso">Sede: <?php echo $EM_Event->output("#_LOCATIONNAME"); ?></p>
                                                                    <p class="direccionCurso"><?php echo $EM_Event->output('#_LOCATIONADDRESS'); ?></p>
                                                            </div>

                                                            <div class="eventoHorario">
                                                                <p class="horarioCurso">HORARIO: <?php echo $EM_Event->output("#_EVENTTIMES"); ?></p>
                                                            </div>

                                                            <div class="eventoExpositor">
                                                                <p class="expositorCurso">IMPARTE: <?php echo $EM_Event->output("#_ATT{imparte}"); ?></p>
                                                            </div>
                                                        </li>
                                                     <?php
                                                    } //fin foreach
                                                } else {
                                                    $EM_Events = EM_Events::get( array('limit'=>2,'orderby'=>'event_start_date', 'scope' => 'today') );
                                                    foreach ( $EM_Events as $EM_Event ) {

                                                     ?>
                                                        <li class="evento">
                                                            <div class="eventoSuperior">
                                                                    <p class="nombreCurso"><?php echo $EM_Event->post_content; ?></p>
                                                                    <p class="fechaCurso"><?php echo $EM_Event->event_start_date; ?> <span style="background-color:<?php echo $EM_Event->output("#_CATEGORYCOLOR") ?>"><?php echo $EM_Event->event_name; ?></span></p>
                                                            </div>

                                                            <div class="eventoSede">
                                                                    <p class="sedeCurso">Sede: <?php echo $EM_Event->output("#_LOCATIONNAME"); ?></p>
                                                                    <p class="direccionCurso"><?php echo $EM_Event->output('#_LOCATIONADDRESS'); ?></p>
                                                            </div>

                                                            <div class="eventoHorario">
                                                                <p class="horarioCurso">HORARIO: <?php echo $EM_Event->output("#_EVENTTIMES"); ?></p>
                                                            </div>

                                                            <div class="eventoExpositor">
                                                                <p class="expositorCurso">IMPARTE: Lic. Alguien</p>
                                                            </div>
                                                        </li>

                                                     <?php
                                                    } // fin foreach
                                                } // fin else
                                            } //fin class exist

                                
                                ?>

                            
                        
                        <div class="clear"></div>
                    </ul>
                </section>
            </div> <!--./eventosDia -->
        
        <div class="clear"></div>
        
        
    </div>