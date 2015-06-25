<?php /* Template Name: iFrame */ get_header(); ?>

	<main role="main">
		<!-- section -->
		<section class="container">

                    <div class="tituloWrapper">
			<h1 class="descuentos"><?php the_title(); ?></h1>
                    </div>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<div id="iFrame" <?php post_class(); ?>>
                            
                         <?php if(is_page('presidente')) { 
                                 get_template_part('externas/presidente');
                          }?>
                            
                         <?php if(is_page('comisiones-edilicias-2012-2015')) { 
                                 get_template_part('externas/comisiones');
                          }?>

                         <?php if(is_page('reglamentos-municipales')) {
                                get_template_part('externas/reglamentos');
                          }?>
                          
                             <?php if(is_page('politicas-publicas')) {
                                get_template_part('externas/politicas');
                          }?>
                  
   
				<br class="clear">

				<?php edit_post_link(); ?>

			</div>
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


<script type="text/javascript">
jQuery(document).ready(function() {
   window.setTimeout('trimSRC()',1000);
   
});

function trimSRC(){
    jQuery('#iFrame img').each(function(i){
          var imgSrc = jQuery(this).attr('src');
          var siteURL = "http://portal.guadalajara.gob.mx";
          if(imgSrc.indexOf(siteURL) === 0){
          imgSrc = siteURL + imgSrc;
            } else {
                    console.log(this);
                    var enlace = imgSrc.split("..");
                    var enlaceCompleto = siteURL + enlace[1];
                    jQuery(this).attr('src',enlaceCompleto);   
            }
    }); 
}
    
    
</script>




<?php get_footer(); ?>
