<?php /* Template Name: Formación Básica
 * 
 */ get_header(); ?>

    <main role="main">
        <!-- section -->
        <section class="container">

        <?php if (have_posts()): while (have_posts()) : the_post(); ?>

            <!-- article -->
            <article id="post-<?php the_ID(); ?>" <?php post_class('clear'); ?>>
                
                <ul id="formacionBasica">
                
                
                <?php $args = array(
                       'post_type' => 'fbasica',
                       'posts_per_page' => -1,
                       'order' => 'ASC',
                       'orderby' => 'title',
                ); ?>
                
                <?php $fbasica = new WP_Query($args); while($fbasica->have_posts()): $fbasica->the_post(); ?>
                    
                    <li>
                        
                        
                                                <div class="tituloWrapper">
                                                              <h1><?php the_title(); ?></h1>
                                                   
                                                </div>
                        
                              <?php the_content(); ?>
                        
          
                     
                     </li>
                
                <hr>
                
                
                
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