<div class="quote">
    <blockquote>
        <?php echo apply_filters( 'the_content', get_field( 'quote' ) ); ?>
    </blockquote>

    <p class="quote-source">
        <?php if ( $source = get_field( 'source' ) ) : ?>
        &mdash; <a href="<?php echo $source ?>"><?php the_title(); ?></a>
        <?php else : ?>
        &mdash; <?php the_field( 'author' ); ?>
        <?php endif; ?>
    </p>

    <?php the_content(); ?>

    <a href="<?php the_permalink(); ?>" class="permalink"><span>Permalink</span></a>
</div>
