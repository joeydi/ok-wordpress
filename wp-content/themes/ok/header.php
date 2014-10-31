<!doctype html>
<!--[if lt IE 7 ]> <html lang="en-us" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en-us" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-us" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-us" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-us" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <link rel='shortcut icon' type='image/x-icon' href='<?php echo get_bloginfo( 'stylesheet_directory' ) . '/assets/images/favicon.png'; ?>' />
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <?php get_template_part( 'analytics' ); ?>
        <header>
            <div class="container">
                <div class="row">
                    <a id="logo" class="col-xs-6 col-sm-3" href="/">
                        <img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/images/logo.svg" alt="Okay Plus / Design &amp; Technology" />
                    </a>
                    <a id="menu-trigger" class="col-xs-6 visible-xs"><i class="icon-list"></i></a>
                    <nav class="col-xs-12 col-sm-9">
                        <ul id="menu">
                            <li><a href="/services/">Services</a></li>
                            <li><a href="/work/">Work</a></li>
                            <li><a href="/blog/">Blog</a></li>
                            <li><a href="/contact/">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>

