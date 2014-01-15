<?php the_post(); ?>

<?php get_header(); ?>

<div id="content">
    <div class="container">
        <div class="project-heading row">
            <div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
            </div>
        </div>
        <div class="project-images row">
            <?php while( has_sub_field( 'images' ) ) : ?>
            <?php $src = wp_get_attachment_image_src( get_sub_field('id'), 'full' ); ?>
            <div class="col-sm-6 col-lg-4">
                <a href="<?php echo $src[0]; ?>">
                    <?php echo wp_get_attachment_image( get_sub_field('id'), 'full' ); ?>
                </a>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
