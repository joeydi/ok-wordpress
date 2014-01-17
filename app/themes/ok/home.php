<?php get_header(); ?>

<div id="content">
    <div class="container">
        <?php while ( have_posts() ) : the_post(); ?>
            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                    <?php $format = get_post_format(); ?>
                    <?php get_template_part( 'post', $format ); ?>
                </div>
            </div>
        <?php endwhile; ?>

    </div>
</div>

<?php get_footer(); ?>
