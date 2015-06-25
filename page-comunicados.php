<?php
/*
 * Template Name: Comunicados
 */
get_header(); ?>

	<main role="main">
		<!-- section -->
		<section class="container">
                            
                    <div class="tituloWrapper">
			<h1 class="descuentos"><?php the_title(); ?></h1>
                    </div>
                    
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			    
			    
                        <div class="comunicados headerDescuentos">
                            <div class="columna tema">Tema</div>
                            <div class="columna dependencia">Dependencia</div>
                            <div class="columna circular">No. de Circular</div>
                            <div class="columna fecha">Fecha</div>
                            <div class="clear"></div>
                        </div>
                        
                        <ul id="cumunicados">

                                            <?php query_posts('cat=195&posts_per_page=-1&orderby=date&order=DESC');  if (have_posts()): while (have_posts()) : the_post(); ?>
                                                        <li class="itemComunicado clear">
                                                                <div><?php echo get_post_meta($post->ID, 'temaCircular', true); ?></div>
                                                                <div><?php echo get_post_meta($post->ID, 'dependenciaCircular', true); ?><br></div>
                                                                <div><a target="_blank" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                                                                <div><?php echo get_post_meta($post->ID, 'fechaCircular', true); ?><br></div>
                                                        </li>
                                        <?php endwhile; endif; ?>
                                        <?php wp_reset_query(); ?>

                                        <?php // the_content(); ?>

                       </ul>
                       
                       

                        </article>
                    
                    </section>
    
                    </div>

		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

			</article>
			<!-- /article -->

		<?php endif; ?>
                        
                
                <?php edit_post_link(); ?>
	</main>

<script>
    $(document).ready(function() {
      $('ul#cumunicados').easyPaginate({
            step:20
      });
    });
</script>

<?php get_footer(); ?>
