<?php /* Template Name: Noticias */ get_header(); the_post();?>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-52f50abf5aba1fe1" async="async"></script>



	<main role="main">
		<!-- section -->
		<section class="container">

                    <div class="tituloWrapper">
		              	<h1 class="descuentos"><?php the_title(); ?></h1>
                    </div>

        <?php 
            $noticias = json_decode(file_get_contents('http://portal.guadalajara.gob.mx/noticias-json'), TRUE);

            foreach ($noticias['nodes'] as $value) {
                foreach ($value as $key => $val) {
                    $noticias = $val['title'];
                    $arrTodos[$noticias][] = array( 
                            'Ruta' => $val['Ruta'], 
                            'Imagen' => $val['field_imagen_noticia'], 
                            'Contenido' => $val['cuerpo'], 
                            'ImagenColorbox' => $val['imagen_contenido'],
                            'Fecha' => $val['Post date'] );
                }
            }
          
            ?>
                    

           <ul class="noticias clear">       
                <?php foreach($arrTodos as $noticia => $value) {
                                
                                
                                foreach($value as $val)  { ?>
                                    

                                    
                                        <li> 
                                             <a href="#inline_content<?php echo $i; ?>" target="_blank" class="inline">
                                                 <h3><?php echo $noticia ?></h3>
                                                 <img src="<?php echo $val['Imagen']; ?>" alt="<?php echo $noticia ?>">
                                             </a>
                                        </li>
                                        
                                            <div style='display:none'>
                                                <div id='inline_content<?php echo $i; ?>' style='padding:10px; background:#fff;' class="contenido-noticia">
                                                        <h3><?php echo $noticia ?></h3>
                                                        
                                                        <div class="share">
                                                            
                                                                   <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                                                    <div class="addthis_native_toolbox"></div>
                                                        </div>
                                                        <span class="fecha"><?php echo $val['Fecha']; ?> </span>
                                                        
                                                        <div class="clearfix"></div>
                                                        
                                                        
                                                        <img src="<?php echo $val['ImagenColorbox']; ?>">
                                                        
                                                        <div class="text">
                                                            
                                                           <?php echo $val['Contenido']; ?>
                                                            
                                                        </div>
                                                        
                                                </div>
                                            </div>
                                            
                                            <?php  $i++; ?>
                                     <?php } 



                                  
                                     
                    } ?>
            </ul>
            
            <p><a class='inline' href="#inline_content"></a></p>
            
            





		</section>
		<!-- /section -->
	</main>
	
	<script>
	    jQuery(document).ready(function() {
	       $(".inline").colorbox({inline:true, width:"50%"}); 
	    });
	</script>


<style>
    /*
    Colorbox Core Style:
    The following CSS is consistent between example themes and should not be altered.
*/
#colorbox, #cboxOverlay, #cboxWrapper{position:absolute; top:0; left:0; z-index:9999; overflow:hidden;}
#cboxWrapper {max-width:none;}
#cboxOverlay{position:fixed; width:100%; height:100%;}
#cboxMiddleLeft, #cboxBottomLeft{clear:left;}
#cboxContent{position:relative;}
#cboxLoadedContent{overflow:auto; -webkit-overflow-scrolling: touch;}
#cboxTitle{margin:0;}
#cboxLoadingOverlay, #cboxLoadingGraphic{position:absolute; top:0; left:0; width:100%; height:100%;}
#cboxPrevious, #cboxNext, #cboxClose, #cboxSlideshow{cursor:pointer;}
.cboxPhoto{float:left; margin:auto; border:0; display:block; max-width:none; -ms-interpolation-mode:bicubic;}
.cboxIframe{width:100%; height:100%; display:block; border:0; padding:0; margin:0;}
#colorbox, #cboxContent, #cboxLoadedContent{box-sizing:content-box; -moz-box-sizing:content-box; -webkit-box-sizing:content-box;}

/* 
    User Style:
    Change the following styles to modify the appearance of Colorbox.  They are
    ordered & tabbed in a way that represents the nesting of the generated HTML.
*/
#cboxOverlay{background:#fff; opacity: 0.9; filter: alpha(opacity = 90);}
#colorbox{outline:0;}
    #cboxTopLeft{width:25px; height:25px; background:url(<?php echo get_stylesheet_directory_uri(); ?>/img/border1.png) no-repeat 0 0;}
    #cboxTopCenter{height:25px; background:url(<?php echo get_stylesheet_directory_uri(); ?>/img/border1.png) repeat-x 0 -50px;}
    #cboxTopRight{width:25px; height:25px; background:url(<?php echo get_stylesheet_directory_uri(); ?>/img/border1.png) no-repeat -25px 0;}
    #cboxBottomLeft{width:25px; height:25px; background:url(<?php echo get_stylesheet_directory_uri(); ?>/img/border1.png) no-repeat 0 -25px;}
    #cboxBottomCenter{height:25px; background:url(<?php echo get_stylesheet_directory_uri(); ?>/img/border1.png) repeat-x 0 -75px;}
    #cboxBottomRight{width:25px; height:25px; background:url(<?php echo get_stylesheet_directory_uri(); ?>/img/border1.png) no-repeat -25px -25px;}
    #cboxMiddleLeft{width:25px; background:url(<?php echo get_stylesheet_directory_uri(); ?>/img/border2.png) repeat-y 0 0;}
    #cboxMiddleRight{width:25px; background:url(<?php echo get_stylesheet_directory_uri(); ?>/img/border2.png) repeat-y -25px 0;}
    #cboxContent{background:#fff; overflow:hidden;}
        .cboxIframe{background:#fff;}
        #cboxError{padding:50px; border:1px solid #ccc;}
        #cboxLoadedContent{margin-bottom:20px;}
        #cboxTitle{position:absolute; bottom:0px; left:0; text-align:center; width:100%; color:#999;}
        #cboxCurrent{position:absolute; bottom:0px; left:100px; color:#999;}
        #cboxLoadingOverlay{background:#fff url(<?php echo get_stylesheet_directory_uri(); ?>/img/loading.gif) no-repeat 5px 5px;}

        /* these elements are buttons, and may need to have additional styles reset to avoid unwanted base styles */
        #cboxPrevious, #cboxNext, #cboxSlideshow, #cboxClose {border:0; padding:0; margin:0; overflow:visible; width:auto; background:none; }
        
        /* avoid outlines on :active (mouseclick), but preserve outlines on :focus (tabbed navigating) */
        #cboxPrevious:active, #cboxNext:active, #cboxSlideshow:active, #cboxClose:active {outline:0;}

        #cboxSlideshow{position:absolute; bottom:0px; right:42px; color:#444;}
        #cboxPrevious{position:absolute; bottom:0px; left:0; color:#444;}
        #cboxNext{position:absolute; bottom:0px; left:63px; color:#444;}
        #cboxClose{position:absolute; bottom:0; right:0; display:block; color:#444;}

/*
  The following fixes a problem where IE7 and IE8 replace a PNG's alpha transparency with a black fill
  when an alpha filter (opacity change) is set on the element or ancestor element.  This style is not applied to or needed in IE9.
  See: http://jacklmoore.com/notes/ie-transparency-problems/
*/
.cboxIE #cboxTopLeft,
.cboxIE #cboxTopCenter,
.cboxIE #cboxTopRight,
.cboxIE #cboxBottomLeft,
.cboxIE #cboxBottomCenter,
.cboxIE #cboxBottomRight,
.cboxIE #cboxMiddleLeft,
.cboxIE #cboxMiddleRight {
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#00FFFFFF,endColorstr=#00FFFFFF);
}
    
    
    div.contenido-noticia {
       
    }
    div.contenido-noticia  h3 {
        color:#90201c;
        font-size: 22px;
        font-weight:bold;
        margin-bottom:15px;
    }
       div.contenido-noticia  img {
           margin-bottom:10px;
           width:100%;
       }
       div.contenido-noticia  div.text {
           margin-top:20px;
           text-align:justify;
       }
       div.contenido-noticia span.fecha {
           text-align: right;
           display:block;
           margin-bottom:20px;
           float:right;
           width:40%;
       }
       div.contenido-noticia div.share {
           float:left;
           width:40%;
           
       }
</style>
<?php get_footer(); ?>