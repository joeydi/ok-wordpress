<?php the_post(); ?>

<?php get_header(); ?>

<div id="hero">
    <div class="container">
        <div class="row">

            <?php if ( App::process_contact_form() ) : ?>
            <h1 class="confirmation col-sm-12">Thanks for contacting us! We'll get back to you shortly.</h1>
            <?php endif; ?>

            <div class="col-sm-6">
                <img class="headshot" src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/headshot.jpg" />
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <h1>Available for New Projects</h1>
                    <p>
                        <strong>Joe di Stefano</strong><br />
                        480.459.6720<br />
                        <a href="mailto:joeydi@okaypl.us">joeydi@okaypl.us</a>
                    </p>
                    <footer>
                        <a href="">Download vCard &raquo;</a>
                    </footer>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="map">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-6">
                <div class="card">
                    <h2>Send Mail To:</h2>
                    <p>
                        <strong>Okay Plus</strong><br />
                        77 College St<br />
                        Burlington, VT 05401
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-5 col-md-offset-1 col-lg-4">
                <h2>Get In Touch</h2>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
            </div>
            <div class="col-sm-6 col-md-5 col-lg-offset-1">
                <form role="form" method="post" action="<?php the_permalink(); ?>">
                    <div class="form-group">
                        <label for="fullname">Your Name</label>
                        <input type="text" class="form-control" id="fullname" name="fullname">
                    </div>
                    <div class="form-group">
                        <label for="email">Your Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="message">Your Message</label>
                        <textarea class="form-control" id="message" name="message" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
