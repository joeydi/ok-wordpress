<div class="quote">
    <blockquote>
        <?php the_field( 'quote' ); ?>
    </blockquote>

    <div class="quote-source">
        <?php if ( $source = get_field( 'source' ) ) : ?>
        &mdash; <a href="<?php echo $source ?>"><?php the_title(); ?></a>
        <?php else : ?>
        &mdash; <?php the_field( 'author' ); ?>
        <?php endif; ?>
    </div>

    <?php the_content(); ?>

    <a href="<?php the_permalink(); ?>" class="permalink"><span>Permalink</span></a>
</div>
