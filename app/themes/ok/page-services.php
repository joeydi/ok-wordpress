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
                <h2>Custom interfaces for managing everything from marketing websites to editorial content and geodata. All built on battle-tested, open-source software.</h2>
                <p>We build themes and plugins with extensibility and maintainabilty in mind, ensuring that your project will be flexible and powerful enough serve your business well into the future.</p>
                <ul>
                    <li><a href="http://wordpress.org/"><img alt="WordPress" src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/logos/wordpress.png" /></a></li>
                    <li><a href="https://drupal.org/"><img alt="Drupal" src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/logos/drupal.png" /></a></li>
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
                <h2>Need something custom? Building a product or starting an online business?</h2>
                <p>From location-based search APIs to web-based tools for data management and anaylsis, I have experience building software solutions for startups, publicly-traded companies, and government agencies alike.</p>
                <ul>
                    <li><a href="http://www.python.org/"><img alt="Python" src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/logos/python.png" /></a></li>
                    <li><a href="https://www.djangoproject.com/"><img alt="Django" src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/logos/django.png" /></a></li>
                    <li><a href="http://php.net/"><img alt="PHP" src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/logos/php.png" /></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div id="cta">
    <div class="container">
        <h3>Think I've got what you need?
            <br />
            <a class="btn" href="<?php echo home_url( '/work/' ); ?>">View My Work <span class="glyphicon glyphicon-chevron-right"></span></a>
            <span class="or">or</span>
            <a class="btn" href="<?php echo home_url( '/contact/' ); ?>">Get In Touch <span class="glyphicon glyphicon-chevron-right"></span></a>
        </h3>
    </div>
</div>

<?php get_footer(); ?>
