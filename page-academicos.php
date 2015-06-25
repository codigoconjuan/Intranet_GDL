<?php
/*
 * Template Name: Academicos
 */

get_header(); ?>

	<main role="main">
		<!-- section -->
		<section class="container">

                    <div class="tituloWrapper">
			<h1 class="descuentos"><?php the_title(); ?></h1>
                    </div>

                        
                        <div class="descuentos headerDescuentos">
                            <div class="columna institucion">Institución</div>
                            <div class="columna oferta">Descuento a servidores públicos</div>
                            <div class="columna costo">Descuento a familiares directos (cónyuges e hijos) </div>
                            <div class="columna descuento">Teléfono</div>
                            <div class="clear"></div>
                        </div>

                         <?php $args = array(
                             'post_type' => 'descuentos',
                             'orderby' => 'title',
                             'order' => 'ASC',
                             'posts_per_page' => -1
                         ); ?>
                        
                        <?php $posgrados = new WP_Query($args); while($posgrados->have_posts()): $posgrados->the_post(); ?>
                        
                        <div class="descuentos">
                            <div class="columna institucion"><a href="<?php the_field('pagina_web'); ?>" target="_blank"><?php the_field('escuela');?></a></div>
                            <div class="columna oferta"><?php the_field('descuento_sp'); ?></div>
                            <div class="columna costo"><?php the_field('descuento_f'); ?> </div>
                            <div class="columna descuento text-center"><?php the_field('telefonos'); ?></div>
                            <div class="clear"></div>
                        </div>
                        
                        <?php endwhile; wp_reset_postdata(); ?>
                        
                        
                        <?php if (have_posts()): while (have_posts()) : the_post(); ?>

				<?php the_content(); ?>
				<?php edit_post_link(); ?>

                    	<?php endwhile; endif; ?>

		</section>
		<!-- /section -->
	</main>


<?php get_footer(); ?>
