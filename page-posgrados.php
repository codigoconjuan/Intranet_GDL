<?php
/*
 * Template Name: Posgrados
 */

get_header(); ?>

	<main role="main">
		<!-- section -->
		<section class="container">

                    <div class="tituloWrapper">
			<h1 class="descuentos"><?php the_title(); ?></h1>
                    </div>
                        
                        <div class="descuentos headerDescuentos">
                            <div class="columna institucion">institución</div>
                            <div class="columna oferta">oferta académica</div>
                            <div class="columna costo">costo</div>
                            <div class="columna descuento">descuento</div>
                            <div class="columna plan">requisitos y plan de estudios</div>
                            <div class="clear"></div>
                        </div>

                         <?php $args = array(
                                'post_type' => 'posgrados',
                                'orderby' => 'title',
                                'order' => 'ASC',
                                'posts_per_page' => -1
                         ); ?>
                        
                        <?php $posgrados = new WP_Query($args); while($posgrados->have_posts()): $posgrados->the_post(); ?>
                        
                        <?php $descuentos =  get_post_meta( get_the_ID(), '_cmb2_repeat_group', true ); ?>
                        
                         <?php $enlace =  get_post_meta( get_the_ID(), '_cmb2_enlaceWeb', true ); ?>
                    

                                            <?php $contador = 0; ?>

                                                <?php foreach($descuentos as $descuento) { ?>
                                                     <div class="descuentos">
                                                        <?php if($contador==0) { ?>
                                                             <div class="columna institucion"><a href="<?php echo $enlace ?>" target="_blank"><?php the_title(); ?></a></div>
                                                       <?php } else { ?>
                                                          <div class="columna institucion"></div>
                                                      <?php } ?>

                                                        <div class="columna oferta"><?php echo $descuento['oferta_a'];?></div>
                                                        <div class="columna costo"><?php echo $descuento['costo'];?></div>
                                                        <div class="columna descuento"><?php echo $descuento['descuento'];?></div>
                                                        <div class="columna plan">
                                                                <?php if($descuento['requisitos']) { ?>
                                                                  <a href="<?php echo $descuento['requisitos']; ?>" target="_blank">Más Información</a>  
                                                               <?php } ?>
                                                            
                                                                 
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                     <?php $contador++; ?>
                                                <?php }  ?>

                               
                    

                        <?php endwhile; wp_reset_postdata(); ?>
                        
                        

		</section>
		<!-- /section -->
	</main>


<?php get_footer(); ?>
