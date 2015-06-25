<?php /* Template Name: Agenda Presidente */ get_header(); ?>

	<main role="main">
		<!-- section -->
		<section class="container">

                    <div class="tituloWrapper">
			<h1 class="descuentos"><?php the_title(); ?></h1>
                    </div>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <?php 
 
                    $json_url = "http://portal.guadalajara.gob.mx/json/agenda-presidente-intranet";
                    $item = file_get_contents($json_url);
                    $item =json_decode($item); 
                    
                   $numero =  count($items);
                    
                   if ($numero != 0) {

                       foreach ($item as $key => $value) {
                             foreach($value as $k => $v) {
  
                                 $fecha = $v->node->nothing;
                                 $contenido =  $v->node->field_coll_agenda;
                                 $contenido = explode("|", $contenido);
                                 
                                 ?>
                                
                                      <div class="agendaItem clear">      
                                          
                                          <?php $cantidad = count($contenido); ?>
                                          
                                                 <?php for($i=0;$i<$cantidad; $i++) { ?>
                                                    
                                                        <div class="contenido">
                                                       <?php if($i == 0) { ?>
                                                            <div class="fecha">
                                                                  <?php echo $fecha; ?>
                                                             </div>
                                                       <?php  }  ?>   
                                                       
                                                       
                                                               <?php $hora = trim($contenido[$i]); ?> 
                                                               
                                                              
                                                       
                                                                <?php //hora ?>
                                                                <p class="hora"> <?php  echo  substr($hora, 20, 22);  ?> hrs.</p>
                                                                
                                                                
                                                                 <?php $evento =  $contenido[$i]; ?>
                                                                
                                                                
                                                               
                                                               <?php $eventos =  explode('Lugar:', $evento);   ?>
                                                               
                                                               
                                                               <?php $desc = substr($eventos[0], 80,3000); ?>
                                                               <p class="descripcion"><?php echo $desc; ?></p>
                                                               
                                                               <p class="lugar"><b>Lugar: </b> <?php echo $eventos[1]; ?></p>
           
                                                        </div>
                                                    
                                                     <?php }?>
                                      
                                    
                                    </div> <!--./agendaItem-->
                        <?php
                             }
                   
                       }

             } else { ?>
                 <img id="logoAgenda" src=" <?php echo get_stylesheet_directory_uri(); ?>/img/escudo200.png">
             <?php } ?>
                

				<br class="clear">

				<?php edit_post_link(); ?>

			</article>
			<!-- /article -->

		<?php endwhile; endif; ?>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>

