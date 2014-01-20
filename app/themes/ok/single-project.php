<?php

the_post();

$roles = wp_get_post_terms( $post->ID, 'role', array( 'fields' => 'names' ) );

$clients = wp_get_post_terms( $post->ID, 'client', array( 'fields' => 'names' ) );

get_header();

?>

<div id="hero">
    <div class="container">
        <h1><?php the_title(); ?></h1>

        <?php if ( $roles || $clients ) : ?>
        <p class="project-meta">
            <?php if ( $roles ) : ?>
            <span class="glyphicon glyphicon-user"></span>
            <strong>Role: </strong><?php echo implode( ', ', $roles ); ?>
            <?php endif; ?>
            
            <?php if ( $clients ) : ?>
            <span class="meta-spacer">&bull;</span>
            <span class="glyphicon glyphicon-briefcase"></span>
            <strong>Agency: </strong><?php echo implode( ', ', $clients ); ?>
            <?php endif; ?>
        </p>
        <?php endif; ?>
    </div>
</div>

<div id="content">
    <div class="container">
        <div class="project-heading row">
            <div class="col-md-10 col-lg-8">
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
