<div class="post">

    <?php if ( has_post_thumbnail() ) : ?>
    <div class="post-image">
        <?php the_post_thumbnail(); ?>
        <?php $post_thumbnail_id = get_post_thumbnail_id(); ?>
        <?php $source_name = get_field( 'source_name', $post_thumbnail_id ); ?>
        <?php $source_url = get_field( 'source_url', $post_thumbnail_id ); ?>

        <?php if ( $source_name ) : ?>
        <div class="image-source">
            <span>Photo:</span>

            <?php if ( $source_url ) : ?>
            <a href="<?php the_field( 'source_url', $post_thumbnail_id ); ?>">
            <?php echo $source_name; ?>
            </a>
            <?php else : ?>
            <span><?php echo $source_name; ?></span>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
    <?php endif; ?>

    <div class="post-content">
        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
        <?php the_content(); ?>
        <?php comments_template(); ?>
    </div>

    <div class="post-meta">
        <div class="date">
            <span class="icon-clock"></span>
            <?php the_time( get_option( 'date_format' ) ); ?>
        </div>

        <?php if ( get_the_tags() ) : ?>
        <div class="tags">
            <span class="icon-tag"></span>
            <?php the_tags( '' ); ?>
        </div>
        <?php endif; ?>
    </div>
</div>
