(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		$('.menu li:last').addClass('ultimo');
		
		
			jQuery('li#menu-item-7846 a').each(function() {
				jQuery(this).attr({'data-lightbox': 'lightbox'});
			});
			
			jQuery('a.ligthbox').each(function() {
				jQuery(this).attr({'data-lightbox': 'lightbox'});
			});
  
  			$('ul.politicas').easyPaginate({
  				step:5
  			});

			
               
                /*
                $('td.eventful span').each(function() {
                    var aumento = 0
                    var izquierda = 10;
                    $(this).css({left: (0 + izquierda)+ 'px'  });
                });
                */
                
                
                /*
                var obj = $('td.eventful span');
                var izquierda = obj.position();
                var arr = $.makeArray( obj );
                for ( var i = 0; i < arr.length; i++ ) {
                    var cero = 0;
                    var aumento = 5;
                    $.each(arr, function() {
                       $(this).css({left: (cero+= aumento) + 'px'  });
                    });
                }
            
            */
           
                jQuery('li#menu-item-6766 > a').removeAttr('href');
                jQuery('li#menu-item-6764 > a').removeAttr('href');
                jQuery('li#menu-item-6770 > a').removeAttr('href');
                jQuery('li#menu-item-6769 > a').removeAttr('href');
                jQuery('li#menu-item-6767 > a').removeAttr('href');
                
                
                
                
                
				$('input.search-input').removeAttr('placeholder');

           


                $('header nav li').on('click', function() {
                	$('header nav li').removeClass('activo');
                	$(this).addClass('activo');
                    var submenu = $(this).find('.sub-menu').html();
                    $('#submenu').html('');
                    $('#submenu').append(submenu);
                    //hoverSub();
                });
                

                setTimeout(function() {
                      $(".current-menu-ancestor").trigger('click');
                },400);
                

                      
                  setTimeout(function() {
                      $('body.capacitacion nav.nav li.current-menu-item').trigger('click');
                  },400);
                  
                  setTimeout(function() {
                      $('body.tax-dempresariales nav.nav li.current_page_ancestor').trigger('click');
                      $('body.tax-dempresariales nav.nav li.current_page_ancestor').addClass('activo');
                  },400);
                  
                  setTimeout(function() {
                      $('body.gobierno nav.nav li.current_page_ancestor').trigger('click');
                      $('body.gobierno nav.nav li.current_page_ancestor').addClass('activo');
                  },400);
                  
                  setTimeout(function() {
                      $('body.single-revista nav.nav li.menu-item-6766').trigger('click');
                      $('body.single-revista nav.nav li.menu-item-6766').addClass('activo');
                      
                  },400);
                  
                  setTimeout(function() {
                      $('body.page-template-page-cursos-php nav.nav li.menu-item-6765').trigger('click');
                      $('body.page-template-page-cursos-php nav.nav li.menu-item-6765').addClass('activo');
                      
                  },400);
                      
                
                $('ul.slider').bxSlider({
                    pager:false,
                    auto:true
                });
                
                
                $('#efemerides').bxSlider({
                    pager:false,
                    auto:true,
                    controls:false
                });
                
                $('#pcursos .cursosWrapper').bxSlider({
                    pager:false,
                    auto:true,
                    controls:false
                });
                $('#pconferencias .conferenciasWrapper').bxSlider({
                    pager:false,
                    auto:true,
                    controls:false
                });
                
                
                
                
                jQuery('.descuentos:odd').addClass('zebra');       
                 jQuery('.itemComunicado:odd').addClass('zebra');  
                jQuery('.comisiones tbody tr:even').addClass('even');    
                jQuery('.agendaItem .contenido:odd').addClass('odd');
                jQuery('.post-472 table tbody tr:odd').addClass('zebra');
                
  
           
                
                
	});
	
})(jQuery, this);

/*
function hoverSub() {
        jQuery('nav.submenu a').on('mouseenter', function() {
                jQuery(this).next().addClass('block');
        });
        jQuery('nav.submenu a').on('mouseleave', function() {
                jQuery(this).next().removeClass('block');
        }); 
}
*/