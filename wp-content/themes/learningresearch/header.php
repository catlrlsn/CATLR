<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title> <?php wp_title(' - '); ?> </title>

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,400italic,600,700,700italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css?v=1.0.1">
	    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>">
        <link rel="stylesheet" type="text/css" href="/css/style.css">
        <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/modernizr-2.6.2.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <style>
        </style>
        <?php wp_head(); ?>

        <!--[if lt IE 9]>
          <script src="<?= get_template_directory_uri(); ?>/js/vendor/html5shiv.js"></script>
          <script src="<?= get_template_directory_uri(); ?>/js/vendor/respond.min.js"></script>
        <![endif]-->        
    </head>
	<body <?php body_class(); ?>>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->


        <header class="container" id="header" role="banner">
            <div class="row">
                <div class="col-lg-12">
                    <a id="logo" role="logo" href="<?php echo home_url(); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Northeastern University Logo">
                    </a>

                </div>
            </div>
        </header>
        <!-- /#header -->
        <form class="search-form" role="search" action="<?php echo home_url( '/' ); ?>" method="get">
			
			<fieldset>
				
				<ul class="toolbar clearfix">

                    <li>
                        <button type="submit" href="#">
                            <span class="fa fa-envelope"></span>
                        </button>
                    </li>
					<li><input id="search-input" type="search" placeholder="Search for..." value="<?php echo esc_attr_x( '', 'submit button' ) ?>" name="s"></li>
					<li><button type="submit" id="btn-search" value="<?php echo get_search_query() ?>"><span class="fa fa-search"></span></button></li>

				</ul>

			</fieldset>

		</form>
        <?php get_template_part( 'inc/navigation' ); ?>
	</div> <!-- end container -->