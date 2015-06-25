<?php get_header(); ?>

	<main role="main">
	<!-- section -->
        <div class="container">

                    <div class="tituloWrapper">
			<h1 class="descuentos"><?php the_title(); ?></h1>
                    </div>
       </div>
        
        <section class="contenedor">

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>



		<div id="anterior">Anterior</div>

                    <div id="magazine">

                        <?php $hojas = get_post_meta( get_the_ID(), '_cmb2_repeat_group', true );

                            foreach($hojas as $hoja => $val) {
                               echo "<div><img src=".$val['imagen_revista']."></div>";
                               
                            }

                            ?>

                         <?php endwhile; endif; ?>
                            
		    </div>

		<div id="siguiente">Siguiente</div>
	</section>
	<!-- /section -->
	</main>

<link rel="stylesheet" id="bxslider-css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/revista.css" media="all">
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/revista.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/turn.js"></script>
<?php get_footer(); ?>
