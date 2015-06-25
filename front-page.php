<?php get_header(); ?>

        <div class="container topfront">
            <section class="slider">
                    <ul class="slider">
                        <?php $args = array(
                            'post_type' => 'slider',
                            'posts_per_page' => -1,
                            'orderby'   => 'menu_order',
                            'order'     => 'ASC'
                        ); ?>
                        <?php $slider = new WP_Query($args); while($slider->have_posts() ): $slider->the_post();  ?>

                        
                                <?php  if(get_field('enlace')) { ?>
                                   
                                      <?php  $path_parts = pathinfo(get_field('enlace'));?> 
                                      <?php if( ($path_parts['extension'] == 'jpg')  || ($path_parts['extension'] == 'png')  ) { ?>
                                           <li><a href="<?php the_field('enlace'); ?>" class="ligthbox"><img src="<?php the_field('imagen_banner'); ?>" ></a></li>
                                       <?php   } else { ?>
                                           <li><a href="<?php the_field('enlace'); ?>" target="_blank"><img src="<?php the_field('imagen_banner'); ?>" ></a></li>
                                       <?php  }?>
       
                                <?php }  else { ?>
                                     <li><img src="<?php the_field('imagen_banner');?>"></li>
                                <?php } ?>
                        
                         <?php endwhile;  wp_reset_postdata(); ?>
                      
                    </ul>
            </section> <!--/.slider -->
            
                <section class="efemerides">
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
                                echo '<span>' . $dias[date('w')]." </span> ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
                            ?>
                          
                        </div>
                        <ul id="efemerides">
                           
                                    <?php $args = array(
                                        'post_type' => 'efemerides',
                                        'order' => 'DESC',
                                        'orderby'  => 'date',
                                        'posts_per_page' => 1
                                    ); ?>
            
                                    <?php $efemerides = new WP_Query($args); while($efemerides->have_posts()): $efemerides->the_post(); ?>
                                    <?php $descuentos =  get_post_meta( get_the_ID(), '_cmb2_repeat_group', true ); ?>
                                    <?php $diaMundial =  get_post_meta( get_the_ID(), '_cmb2_diamundial', true ); ?>
                                    <?php foreach($descuentos as $descuento) { ?>
                                        <li class="itemCuadro">
                                            <p class="titulo"><?php echo $descuento['efemeride_anio']; ?></p>
                                            <p><?php echo $descuento['desc_efemeride']; ?></p>
                                        </li>  
                                        
                                      
                                    <?php } ?>
                                    <?php endwhile; wp_reset_postdata(); ?>
                           
                        </ul>
                        <?php  if($diaMundial) {
                            echo ' <div class="diaMundial">'.$diaMundial.'</div>';
                        }?>
                       
                    </section>
                </section> <!--/.efemerides -->
            <div class="clear"></div>
        </div>

        <section class="servicios gris clearfix">
            <div class="container">
                <nav>
                    <a href="http://ayuntamiento.guadalajara.gob.mx/Sintesis/SintesisInformativa.pdf" target="_blank">
                        <img class="noticas" src="<?php echo get_stylesheet_directory_uri(); ?>/img/icono_noticias.png">
                        <p><span>entérate</span> <br/>De las noticias<br/>más relevantes</p>
                    </a>
                    <a href="https://correo.guadalajara.gob.mx/owa/" target="_blank">
                        <img class="correo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/icono_correo.png">
                        <p><span>accede</span> <br/>A tu cuenta<br/>de correo</p>
                    </a>
                    <a href="http://enlinea.guadalajara.gob.mx/extensiones/index.asp?lyt=1" target="_blank">
                        <img class="directorio" src="<?php echo get_stylesheet_directory_uri(); ?>/img/icono_directorio.png">
                         <p><span>entra</span> <br/>Al directorio<br/>telefónico</p>
                    </a>
                    <a href="http://transparencia.guadalajara.gob.mx" target="_blank">
                        <img class="transparencia" src="<?php echo get_stylesheet_directory_uri(); ?>/img/icono_transparencia.png">
                        <p><span>transparencia</span> <br/>Guadalajara</p>
                    </a>
                    <a href="http://pim.guadalajara.gob.mx/admin" target="_blank" style="padding-top:25px;">
                        <img class="pim" src="<?php echo get_stylesheet_directory_uri(); ?>/img/icono_pim.png">
                    </a>
                </nav>
            </div>
        </section>


    <section  class="proximos">
        <div class="container">
                <section class="contacto">
                    <h2>Contacto Ciudadano</h2>
                    
                    <div class="setenta cciudadano">
                        <a href="http://192.168.6.28/" class="acceder" target="_blank">Acceder</a>
                        <a href="http://srv-crm/" class="acceder nuevo" target="_blank">Prueba 070</a>
                    </div>
                    <div class="lunes cciudadano">
                        <a href="http://enlinea.guadalajara.gob.mx/lunesContigo/" target="_blank" class="acceder">Acceder</a>
                    </div>
                    <div class="viernes cciudadano">
                        <a href="http://enlinea.guadalajara.gob.mx/viernesdeaudiencias/" target="_blank" class="acceder">Acceder</a>
                    </div>
                   
                </section>

                <section id="pcursos" class="pcursos proximas">
                        <section class="cuadro">
                            <div class="titulos uppercase">
                                Próximos <span> Cursos </span>
                            </div>
                            
                                <div class="cursosWrapper">
                                    <?php if (class_exists('EM_Events')) {
                                                    $EM_Events = EM_Events::get( array('orderby'=>'event_start_date','category' => 'cursos-y-talleres','scope' =>'future') );
                
                                                    foreach ( $EM_Events as $EM_Event ) { ?>
                                                            
                                                            <div class="itemCuadro">
                                                                <p class="titulo uppercase"><?php echo $EM_Event->event_name ?></p>
                                                                <p>SEDE: <?php echo $EM_Event->output("#_LOCATIONNAME"); ?></p>
                                                                <p><?php echo $EM_Event->output("#_LOCATIONADDRESS"); ?></p>
                                                                <p>HORARIO: <?php echo $EM_Event->output("#_12HSTARTTIME"); ?></p>
                                                                <p>FECHA: <?php echo $fechaCurso = $EM_Event->output("#l #d de #F de #Y"); ?></p>
                                                                <p><?php echo $EM_Event->post_content; ?> </p>
                                                            </div>
                                                            
                                               <?php     } // fin foreach
                                            } // fin class_exists
                                    ?>
                               </div>

                        </section>
                    
                    
                    <div class="cuadropeque solicita">
                        <p>solicita tu <span> Ticket</span> de servicio <span>aquí</span>
                            <a class="acceder" href="http://soporte.guadalajara.gob.mx" target="_blank">Acceder</a>
                    </div>
                    
                    
                </section>

                <section id="pconferencias" class="pconferencias proximas">

                        <section class="cuadro">
                            <div class="titulos uppercase">
                                <p>Próximas <span> Conferencias </span>
                            </div>

                            <div class="conferenciasWrapper">
                                <?php if (class_exists('EM_Events')) {
                                                $EM_Events = EM_Events::get( array('orderby'=>'event_start_date','category' => 'conferencias','scope' =>'future') );
            
                                                foreach ( $EM_Events as $EM_Event ) { ?>
            
                                                        
                                                        <div class="itemCuadro">
                                                            <p class="titulo uppercase"><?php echo $EM_Event->event_name ?></p>
                                                            <p>SEDE: <?php echo $EM_Event->output("#_LOCATIONNAME"); ?></p>
                                                            <p><?php echo $EM_Event->output("#_LOCATIONADDRESS"); ?></p>
                                                            <p>HORARIO: <?php echo $EM_Event->output("#_12HSTARTTIME"); ?></p>
                                                            <p>FECHA: <?php echo $fechaCurso = $EM_Event->output("#l #d de #F de #Y"); ?></p>
                                                            <p><?php echo $EM_Event->post_content; ?> </p>
                                                        </div>
                                                        
                                           <?php     } // fin foreach
                                        } // fin class_exists
                                ?>
                           </div>
                        </section>
                    
                    <div class="cuadropeque revistaInterna">
                        

     
                        <p>conoce la<span>  agenda cultural</span>
                        <a href=" http://issuu.com/culturagdl/docs/cultura_aqui_2014_junio_paginas/1?e=8850757/13225015" target="_blank" class="acceder">Acceder</a>
                    </div>
                </section>
            
            <div class="clear"></div>
            
            
            
            <section class="frase">
                <div class="fraseWrap">
                    <p class="titulo">Frase del dia:</p>
                    <?php $args = array(
                         'post_type' => 'frasedia',
                        'posts_per_page' => 1,
                        'order' => 'DESC',
                        'orderby'  => 'date'
                    ); ?>
                    
                    <?php $frases = new WP_Query($args); while ($frases->have_posts() ): $frases->the_post(); ?>

                    <p><?php the_field('frase') ?></p>
                    <em class="autor"><?php the_field('autor') ?></em>
                    
                    <?php endwhile; wp_reset_postdata(); ?>
                    
                    
                </div>
            </section>
            
            <div class="clear"></div>
        
        </div>
        
    </section>  
 



<?php get_footer(); ?>
