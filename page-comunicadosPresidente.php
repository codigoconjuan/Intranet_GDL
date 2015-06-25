<?php /* Template Name: Comunicados del Presidente*/ get_header(); ?>

	<main role="main">
		<!-- section -->
		<section class="container">

                    <div class="tituloWrapper">
			<h1 class="descuentos"><?php the_title(); ?></h1>
                    </div>

                        <?php $args = array(
                            'category_name' => 'comunicados-del-presidente',
                            'order' => 'DESC',
                            'orderby' => 'date'
                            
                        ); ?>
                    <ul class="comunicadosPresidente">
                            <?php $comunicPres  = new WP_Query($args); while($comunicPres->have_posts()): $comunicPres->the_post(); ?>

                                 <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

                            <?php endwhile; wp_reset_postdata(); ?>
                    </ul>
		</section>
		<!-- /section -->
	</main>º

<?php get_footer(); ?>