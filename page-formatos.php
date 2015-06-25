<?php /* Template Name: Formatos*/ get_header(); ?>

    <main role="main">
        <!-- section -->
        <section class="container">

                    <div class="tituloWrapper">
            <h1 class="descuentos"><?php the_title(); ?></h1>
                    </div>

        <?php if (have_posts()): while (have_posts()) : the_post(); ?>

            <!-- article -->
            <article id="post-<?php the_ID(); ?>" <?php post_class('clear'); ?>>
                
               <ul>
                    <?php $args = array(
                        'post_type' => 'formatos',
                        'orderby' => 'title',
                        'order' => 'ASC',
                        'posts_per_page' => -1
                    ); ?>
                    
                    <?php $formatos = new WP_Query($args); while($formatos->have_posts()): $formatos->the_post(); ?>

                        <li>
                                <div class="izq">
                                    <div class="texto">
                                        <p>Dependencia: <span><?php echo get_post_meta( get_the_ID(), '_cmb2_dependencia', true ); ?></span></p>
                                        <p>Tema: <span><?php echo get_post_meta( get_the_ID(), '_cmb2_tema', true ); ?></span></p>
                                    
                                    </div>
                                    
                                    <div class="descarga">
                                       <a href="<?php echo get_post_meta( get_the_ID(), '_cmb2_archivo', true ); ?>" target="_blank">Descargar Archivo</a>
                                    </div>
                                    
                                </div>
                                
                                
                                <div class="imagen">
                                    <?php $imagen = get_post_meta( get_the_ID(), '_cmb2_imagen_formato', true ); ?>
                                    
                                  <?php    if($imagen) {
                                      echo   "<img src='".$imagen ."'>";
                                    } else {
                                       echo '<img src="http://placehold.it/330x300">';
                                    }
                                    ?>
                                  
                                </div>
                        </li>
                    
                   
                   <?php  endwhile; wp_reset_postdata(); ?>
 <div class="clear"></div>
            </ul>

                <br class="clear">

                <?php edit_post_link(); ?>

            </article>
            <!-- /article -->

        <?php endwhile; ?>

        <?php else: ?>

            <!-- article -->
            <article>

                <h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

            </article>
            <!-- /article -->

        <?php endif; ?>

        </section>
        <!-- /section -->
    </main>

<?php get_footer(); ?>