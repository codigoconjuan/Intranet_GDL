
                                    
                <?php 
                    $url= "http://transparencia.guadalajara.gob.mx/transparencia/reglamentos";
                    require_once('phpQuery.php');
                    $html = file_get_contents($url);
                    phpQuery::newDocumentHTML($html);
                    $resultData = pq('div#content-area');
                    $search = array('/sites/default/themes/ayuntamiento/images/','../../sites/default/files/');
                    $replace =  array('http://transparencia.guadalajara.gob.mx/sites/default/themes/ayuntamiento/images/','http://transparencia.guadalajara.gob.mx/sites/default/files/');
                    echo str_replace($search, $replace, $resultData) ;
                    
                    
                  
                ?>
        
                    <style type="text/css">
                      @import url("http://transparencia.guadalajara.gob.mx/sites/default/themes/ayuntamiento/css/layout-fixed.css?W");
                      
                      th.views-field.views-field-title {
                                width: 800px!important;
                       }
                       div.views-exposed-form, .breadcrumb {
                           display:none!Important;
                       }
                       #reglamentos .listado .item .all .listP li {
                           font-family:arial;
                       }
                    </style>
                    

<script>
 
    jQuery(document).ready(function($) {
       jQuery('form.search').removeAttr('action');
       $('input.search-input').quicksearch('table.views-table tbody tr'); 
       
                    
        $('#reglamentos .item .titulo').click(function(){
        $('#reglamentos .listado .item .all').hide().removeClass('live');
        $(this).next('.all').show().addClass('live');
        $('#reglamentos .listado .item .all .listP').jScrollPane();
       });
       $('#reglamentos .listado .item .all .close').click(function(){
        $(this).parent().parent().find('.all').hide();
       });
                                  
                 
                             
    });
</script>