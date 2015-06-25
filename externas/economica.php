                <?php 
                    $url= "http://transparencia.guadalajara.gob.mx/transparencia/programas-sociales/promocion-economica-14";
                    require_once('phpQuery.php');
                    $html = file_get_contents($url);
                    phpQuery::newDocumentHTML($html);
                    $resultData = pq('div#node-340968');
                    $search = array('/sites/default/themes/ayuntamiento/images/','../../sites/default/files/');
                    $replace =  array('http://transparencia.guadalajara.gob.mx/sites/default/themes/ayuntamiento/images/','http://transparencia.guadalajara.gob.mx/sites/default/files/');
                    echo str_replace($search, $replace, $resultData) ;
                ?>