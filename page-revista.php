<?php /* Template Name: Revista Interna */ get_header(); ?>

	<main role="main">
		<!-- section -->
		<section class="container">

                    <div class="tituloWrapper">
			<h1 class="descuentos"><?php the_title(); ?></h1>
                    </div>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                            <ul id="ediciones" class="ediciones clear ">
                                <?php $args = array(
                                    'post_type' => 'revista',
                                    'orderby' => 'date',
                                    'order' =>'DESC',
                                    'posts_per_page' => -1
                                ); ?>
                            
                                <?php $revista = new WP_Query($args); while($revista->have_posts()): $revista->the_post(); ?> 

                            
                                    <li>
                                        <a href="<?php the_permalink(); ?>">
                                            <h3 class="revista"><?php the_title(); ?></h3>
                                            <?php the_post_thumbnail('revistaSmall'); ?>
                                        </a>
                                    </li>    


                                <?php endwhile; wp_reset_postdata(); ?>
     
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