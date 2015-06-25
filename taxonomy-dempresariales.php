<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section class="container">
		    
		    <?php $cat = single_cat_title("", false); ?>
                    <div class="tituloTax">
		              	<h1 class="descuentos"><?php echo $cat; ?></h1>
		              	
		              	<?php $cat =  strtolower($cat); ?>
		              	<?php $cat = str_replace(' ', '', $cat); ?>
		                <?php $cat = substr($cat,0,4) ?>
		              	<span class="<?php echo $cat; ?>"></span>
                     </div>
                        <?php if (have_posts()): while (have_posts()) : the_post(); ?>

                                <!-- article -->
                                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


                                        <!-- post title -->
                        
                                                <div class="tituloWrapper">
                                                              <h2><?php the_title(); ?></h2>
                                                              
                                                              
                                                   
                                                </div>
                        
                                        <!-- /post title -->



                                        <?php the_content(); // Build your custom callback length in functions.php ?>

                                        <?php edit_post_link(); ?>

                                </article>
                                <!-- /article -->
                                
                                <hr>
                 

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
