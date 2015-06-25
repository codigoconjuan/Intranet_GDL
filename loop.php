<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<!-- article -->
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



		<!-- post title -->
		<h2><?php the_title(); ?></h2>
		<!-- /post title -->



		<?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php ?>


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
