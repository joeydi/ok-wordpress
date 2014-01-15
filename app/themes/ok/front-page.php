<?php the_post(); ?>

<?php get_header(); ?>

<div id="hero">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h1>Okay Plus is the web design studio of Joe di Stefano</h1>
                <p>Critical thinking, clean code and responsive design. These are the tools I use to bring digital experiences to life online.</p>
                <a class="btn">View My Work »</a>
                <a class="btn">Get In Touch »</a>
            </div>
            <div class="col-md-7">
                <img id="phone" src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/phone.png" alt="" />
            </div>
        </div>
    </div>
</div>

<div id="content">
    <div class="container">
        <h2>I partner with brands and agencies, bringing over 10 years of design and development experience to the table.</h2>

        <div class="testimonials">
            <?php while ( has_sub_field( 'testimonials' ) ) : ?>
            <div class="testimonial">
                <header>
                    <?php echo wp_get_attachment_image( get_sub_field( 'photo' ), 'headshot' ); ?>
                    <div class="name"><?php the_sub_field( 'name' ); ?></div>
                    <div class="title"><?php the_sub_field( 'title' ); ?></div>
                </header>
                <blockquote>
                    <p><?php the_sub_field( 'testimonial' ); ?></p>
                </blockquote>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
