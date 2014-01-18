<?php the_post(); ?>

<?php get_header(); ?>

<div id="rwd" class="service">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-md-7 col-lg-6">
                <h1>Responsive Web Design</h1>
                <h2>Design and development that respond to users’ behavior and environment based on screen size, platform and orientation.</h2>
                <p>Your audience is increasingly going mobile. Make sure you are putting your best foot forward in all situations.</p>
                <ul>
                    <li><a href=""><img alt="HTML5" src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/logos/html5.png" /></a></li>
                    <li><a href=""><img alt="CSS3" src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/logos/css3.png" /></a></li>
                    <li><a href="">Bootstrap</a></li>
                    <li><a href="">Foundation</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div id="cms" class="service">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-6 col-md-5 col-md-offset-7">
                <h1>Content Management Systems</h1>
                <h2>Custom interfaces for managing everything from marketing websites to editorial content and geodata.
All built on battle-tested, open-source software.</h2>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
                <ul>
                    <li><a href=""><img alt="WordPress" src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/logos/wordpress.png" /></a></li>
                    <li><a href=""><img alt="Drupal" src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/logos/drupal.png" /></a></li>
                    <li><a href="">Joomla</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div id="app" class="service">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1>Web Application Development &amp; APIs</h1>
                <h2>Design and development that respond to users’ behavior and environment based on screen size, platform and orientation.</h2>
                <ul>
                    <li><a href=""><img alt="Python" src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/logos/python.png" /></a></li>
                    <li><a href=""><img alt="Django" src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/logos/django.png" /></a></li>
                    <li><a href="">PHP</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
