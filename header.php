<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
            <!--[if lt IE 9]>
                <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/html5shiv.js"></script>
            <![endif]-->


	</head>
	<body <?php body_class(); ?>>


            <!-- header -->
            <header class="container header clear" role="banner">

                            <!-- nav -->
                            <nav id="nav" class="nav" role="navigation">
                                <div class="menu">
                                    <?php html5blank_nav(); ?>
                                   </div>
                            </nav>
                            <!-- /nav -->
                            
                            <nav id="submenu" class="submenu"></nav>
                            
                            <div id="barra" class="barra clear">

                                    <a href="<?php echo home_url(); ?>">
                                            <div class="logoBCO"></div>
                                    </a>
     
                               
                                <h2>Intranet</h2>
                                <div class="buscador">
                                    <?php get_search_form(); ?>
                                </div>
                            </div>
            </header>
            <!-- /header -->

      