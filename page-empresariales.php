<?php
/*
 * Template Name: D Empresariales
 */
get_header(); ?>

	<main role="main">
		<!-- section -->
		<section class="container">

                    <div class="tituloWrapper">
			             <h1 class="descuentos"><?php the_title(); ?></h1>
                    </div>

                    <?php 
                        $args = array(
                            'post_type' => 'empresariales',
                            'posts_per_page' => -1,
                            'order' => 'ASC',
                            'orderby' => 'title'
                        );
                    ?>
                    
                    <?php $empresariales = new WP_Query($args); while($empresariales->have_posts()): $empresariales->the_post(); ?>
                    
                    <ul class="descuentosEmpresariales">
                        <li>
                            <h2><?php the_title(); ?></h2>
                            <p class="categoria"> <?php echo get_the_term_list( $post->ID, 'dempresariales', 'Categoría: ', ', ', ''); ?> </p>
                            <?php the_content(); ?>
                            
                        </li>
                    </ul>
                    
                   	
                    
                    
                    <?php endwhile; wp_reset_postdata(); ?>

		</section>
		<!-- /section -->
	</main>


<?php get_footer(); ?>
