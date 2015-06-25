<?php get_header(); ?>

	<main role="main">
	<!-- section -->
        <section class="container">

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



                    <div class="tituloWrapper">
		              	<h1 class="descuentos"><?php the_title(); ?></h1>
                    </div>

			<?php the_content(); // Dynamic Content ?>



			<?php edit_post_link(); // Always handy to have Edit Post Links available ?>


		</article>
		<!-- /article -->

	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>

	</section>
	<!-- /section -->
	</main>

	
<script>
    $(document).ready(function() {
            var pagina = $("article p a").attr("href");
           
            if(pagina === undefined) {
                //console
                
            } else {
                window.location.href = pagina;
            }
            
    });
</script>
        
<?php get_footer(); ?>
