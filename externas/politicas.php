
                
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>


<?php $noticias = json_decode(file_get_contents('http://portal.guadalajara.gob.mx/json/politicas-publicas'), TRUE);
    echo "<ul class='politicas'>";
    
    
        foreach($noticias['nodes'] as $noticia) {
            foreach ($noticia as $n) { ?>
                
                <li>
                    
                    <div class="titulo">
                        <a href="<?php echo $n['ruta']; ?>" target="_blank">
                                <h2><?php echo $n['title']; ?></h2>
                         </a>
                    </div>
                    
                    <div class="contenido">
                        <?php echo $n['desc']; ?>
                    </div>
                    
                    <div class="imagen">
                        <a href="<?php echo $n['ruta']; ?>" target="_blank">
                            <img src="<?php echo $n['logo'] ?>">
                         </a>
                    </div>
                   
                    
                    
                    
                </li>
                
          <?php  }
        }
    echo "</ul>";
?>

<style type="text/css">
    ul.politicas {
      margin: 0 0 0.75em 0;
      padding: 0;
      margin-left:170px;
    }
    ul.politicas li {
        display: inline-block;
      margin-bottom: 35px;
    }  
    ul.politicas li div.titulo {
    
      margin: 5px 0;
    }
    
    ul.politicas li div.titulo h2 {
      color: #AD1017;
      font-family: 'Open Sans', sans-serif;
      font-size: 18px;
    
    }
    
    ul.politicas li div.contenido {
      border-right: 10px solid #D1D1D1;
      width: 475px;
      float: left;
      min-height: 141px;
      line-height: 16px;
      padding-right: 15px;
      text-align: justify;
    }
    
    ul.politicas li div.imagen {
      float: left;
      margin-left: 20px;
      width: 180px;
    }
    
    ul.politicas li div.imagen img {
      height: auto;
      width: 180px; 
    }
    
    ol#pagination {
      background: #4d4d4f;
      border: none;
      padding: 0!important;
      overflow: hidden;
        height: 43px;
      line-height: 35px;
      width:400px;
      margin:0 auto;
      text-align:left;
    }
    ol#pagination li {
        font-size: 11px!important;
        display: inline-block;
        color: white;
        line-height: 31px;
        height:100%;
    }
    
    ol#pagination li.current {
      background: #ad1017!important;
      color: #FFFFFF !important;
    }
    ol#pagination li.next{
        background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/paginador-politicas.png);
      float: right;
      margin-right: 90px;
      padding: 0 23px;
    }
    
    ol#pagination li.prev {
        background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/paginador-politicas.png);
      float: left;
      margin-left: 30px;
      padding: 0 23px;
    }

    
    
    
</style>