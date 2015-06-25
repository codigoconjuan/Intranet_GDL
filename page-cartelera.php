<?php
/*
 * Template Name: Cartelera
 */

 get_header(); ?>

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

<script>
    

    $(window).ready(function() {
        $('#magazine').turn({
            display: 'single',
            acceleration: true,
            gradients: true,
            autoCenter: true,
            elevation: 50,
            when: {
                turned: function(e, page) {
                    /*console.log('Current view: ', $(this).turn('view'));*/
                }
            }
        });

        $('#siguiente').click(function() {
            $("#magazine").turn("next");
        });

        $('#anterior').click(function() {
            $("#magazine").turn("previous");
        });

    });

            document.querySelector( '.magazine-viewport' ).addEventListener( 'click', function( event ) {
                event.preventDefault();
                zoom.to({ element: event.target });
            } );

</script>

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/turn.js"></script>

<style>
    .contenedor {
    height: 420px!important;
    margin: 0 auto;
    position: relative;
    width: 700px!important;
    margin-bottom: 30px;
}
#magazine{
    width:700px;
    height:420px;
    margin: 0 auto;
}
#magazine .turn-page{
    background-color:#ccc;
    background-size:100% 100%;
}
#magazine div img {
    width:100%;
    height:100%
}
#anterior {
        position: absolute;
        top: 0;
        left: -30px;
        width: 30px;
        height: 100%;
        display: block;
        background-color: #e1e1e1;
        background-image: url(arrows.png);
        background-repeat: no-repeat;
        background-position: 2px 50%;
        text-indent: -9999px;
        border-top-left-radius: 42px;
        border-bottom-left-radius: 42px;
}
#anterior:hover {
        background-color: #999;
        cursor: pointer;
}
#siguiente {
        position: absolute;
        top: 0;
        right:-30px;
        width:30px;
        height:100%;
        display:block;
        background-color: #e1e1e1;
        background-image: url(arrows.png);
        background-repeat: no-repeat;
        background-position: -33px 50%;
        text-indent: -9999px;
        border-top-right-radius: 42px;
        border-bottom-right-radius: 42px;
}
#siguiente:hover {
        background-color: #999;
        cursor: pointer;
}
</style>
<?php get_footer(); ?>
