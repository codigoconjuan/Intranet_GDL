<?php /* Template Name: Planes Parciales*/ get_header(); the_post(); ?>

	<main role="main">
		<!-- section -->
		<section class="container">

                    <div class="tituloWrapper">
			<h1 class="descuentos"><?php the_title(); ?></h1>
                    </div>
                    <div id="planes">
                        
                    </div>
                    
                    <?php the_content(); ?>
                    <br/>
                    <?php edit_post_link(); ?>


                        <script>
                             $(function() {
                                  $.getJSON('<?php echo get_stylesheet_directory_uri(); ?>/externas/planes.php', function(data) {
                                      var template = $('#planTPL').html();
                                      var info = Mustache.to_html(template, data);
                                      $('#planes').html(info);
                                  });
                             });
                         </script>

                          <script id="planTPL" type="text/template">
                              {{#zona<?php echo $_GET['zona'] ?>}}

                                          <h2>{{name}}</h2>
                                           <a href="{{file}}" target="_blank">Ver Documento</a><br><br>

                              {{/zona<?php echo $_GET['zona'] ?>}}
                          </script>


		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>