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

<div id="blog-pagination">
    <div class="container">
        <div class="row">
            <div class="previous col-xs-6 col-md-5 col-md-offset-1 col-lg-4 col-lg-offset-2">
                <?php previous_posts_link( '<span class="glyphicon glyphicon-chevron-left"></span> Previous Page' ); ?>
            </div>
            <div class="next col-xs-6 col-md-5 col-lg-4">
                <?php next_posts_link( 'Next Page <span class="glyphicon glyphicon-chevron-right"></span>' ); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
