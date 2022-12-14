<?php

the_post();

$roles = wp_get_post_terms( $post->ID, 'role', array( 'fields' => 'names' ) );

$clients = wp_get_post_terms( $post->ID, 'client' );

get_header();

?>

<div id="hero">
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <h1><?php the_title(); ?></h1>

                <?php if ( $roles || $clients ) : ?>
                <div class="project-meta">
                    <?php if ( $roles ) : ?>
                    <p>
                        <span class="glyphicon glyphicon-user"></span>
                        <strong>Role: </strong><?php echo implode( ', ', $roles ); ?>
                    </p>
                    <?php endif; ?>

                    <?php if ( $clients ) : ?>
                    <p>
                        <span class="glyphicon glyphicon-briefcase"></span>
                        <strong>Agency: </strong>
                        <?php foreach ($clients as $client) : if ( $url = get_field( 'url', 'client_' . $client->term_id ) ) : ?>
                        <a href="<?php echo $url; ?>"><?php echo $client->name; ?></a>
                        <?php else : ?>
                        <?php echo $client->name; ?>
                        <?php endif; endforeach; ?>
                    </p>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-sm-3">
                <?php if ( $url = get_field( 'url' ) ) : ?>
                <a href="<?php echo $url; ?>" class="btn">View Website <span class="glyphicon glyphicon-chevron-right"></span></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<div id="content">
    <div class="container">
        <div class="project-heading row">
            <div class="col-md-10">
                <?php the_content(); ?>
            </div>
        </div>
        <div class="project-images row">
            <?php
                $images = get_field( 'images' );
                $col_class = count( $images ) < 3 ? 'col-sm-6' : 'col-sm-6 col-lg-4';
                foreach( $images as $image ) : ?>
            <?php $src = wp_get_attachment_image_src( $image['ID'], 'full' ); ?>
            <div class="<?php echo $col_class; ?>">
                <a href="<?php echo $src[0]; ?>">
                    <?php echo wp_get_attachment_image( $image['ID'], 'project-thumbnail' ); ?>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div id="project-pagination">
    <div class="container">
        <div class="row">
            <div class="previous col-xs-6">
                <?php if ( $previous = get_next_post() ) : ?>
                <a href="<?php echo get_permalink( $previous->ID ); ?>">
                    <?php $roles = wp_get_post_terms( $previous->ID, 'role', array( 'fields' => 'names' ) ); ?>
                    <?php echo get_the_post_thumbnail( $previous->ID, 'medium' ); ?>
                    <h3 class="btn"><span class="glyphicon glyphicon-chevron-left"></span> Previous Project</h3>
                    <strong><?php echo get_the_title( $previous->ID ); ?></strong>
                    <p><?php echo implode( ', ', $roles ); ?></p>
                </a>
                <?php endif; ?>
            </div>
            <div class="next col-xs-6">
                <?php if ( $next = get_previous_post() ) : ?>
                <a href="<?php echo get_permalink( $next->ID ); ?>">
                    <?php $roles = wp_get_post_terms( $next->ID, 'role', array( 'fields' => 'names' ) ); ?>
                    <?php echo get_the_post_thumbnail( $next->ID, 'medium' ); ?>
                    <h3 class="btn">Next Project <span class="glyphicon glyphicon-chevron-right"></span></h3>
                    <strong><?php echo get_the_title( $next->ID ); ?></strong>
                    <p><?php echo implode( ', ', $roles ); ?></p>
                </a>
                <?php else : ?>
                    <h3>That's all She Wrote!</h3>
                    <p>Thanks for exploring my portfolio of recent<br />web design &amp; development projects.</p>
                    <a class="btn" href="/contact/"><span class="glyphicon glyphicon-phone-alt"></span> Get In Touch</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
