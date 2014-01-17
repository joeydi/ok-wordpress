<div class="post">

    <?php if ( has_post_thumbnail() ) : ?>
    <div class="post-image">
        <?php the_post_thumbnail(); ?>
    </div>
    <?php endif; ?>

    <div class="post-content">
        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
        <?php the_content(); ?>
    </div>

    <div class="post-meta">
        <div class="date"><span class="glyphicon glyphicon-time"></span> <?php the_date(); ?></div>
        <div class="tags"><span class="glyphicon glyphicon-tag"></span><?php the_tags(); ?></div>
    </div>
</div>
