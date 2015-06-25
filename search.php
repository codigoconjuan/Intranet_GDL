<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section class="container busqueda">
	

			<h3><?php echo sprintf( __( 'Resultados de la búsqueda' ), $wp_query->found_posts ); ?></h3>

                <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                
                    <!-- article -->
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                        <?php global $post; ?>
                        
                      
                
                        <!-- post title -->
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        <!-- /post title -->
                

                    </article>
                    <!-- /article -->
                
                <?php endwhile; ?>
                
                <?php else: ?>
                
                    <!-- article -->
                    <article>
                        <h2>Su búsqueda no produjo resultados</h2>
                        <li>Verifique que las palabras estén bien escritas.</li>
                        <li>No encierre la frase entre comillas si desea buscar por cada palabra individualmente. fabulosa búsqueda generalmente devolverá más resultados que "fabulosa búsqueda".</li>
                        <li>Considere relajar su búsqueda con OR. fabulosa OR búsqueda generalmente devolverá más resultados que fabulosa búsqueda.</li>
                    </article>
                    <!-- /article -->
                
                <?php endif; ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>


<?php get_footer(); ?>
