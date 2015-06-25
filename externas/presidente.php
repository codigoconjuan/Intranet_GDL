<?php
                                $data = json_decode(file_get_contents('http://portal.guadalajara.gob.mx/contentasjson/node/4128/'));
                                 print_r($data->body->und[0]->value);
?>
                            <style type="text/css">
                              @import url("http://transparencia.guadalajara.gob.mx/sites/default/themes/ayuntamiento/css/layout-fixed.css?W");
                              
                              #contenido {
                                  margin: 0 auto;
                              }

                              #iFrame p a img {
                                  display:none;
                              }
                              img.fia {
                                  display: block!important;
                                  margin:0 auto;
                              }
                            </style>
                            
<p>
    <a class="colorbox-inline" href="#videoFia">
        <img class="fia" src="http://portal.guadalajara.gob.mx/sites/all/themes/ayuntamiento/images/fia_ayto.png">
    </a>
</p>

<div style='display:none'>
    <div id="videoFia">
        <video controls="" height="620" width="780"><source src="http://portal.guadalajara.gob.mx/sites/default/files/videos/original/fia_master_redes.mp4" type="video/mp4"></video>
    </div>
</div>

<script>
$(document).ready(function() {
   $(".colorbox-inline").colorbox({inline:true, width:"50%"}); 
});
</script>
