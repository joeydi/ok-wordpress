<div class="post video">
    <?php the_field( 'video' ); ?>

    <div class="post-content">
        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
        <?php the_content(); ?>
    </div>

    <div class="post-meta">
        <div class="date"><span class="icon-clock"></span> <?php the_date(); ?></div>
        <div class="tags"><span class="icon-tag"></span> <?php the_tags(); ?></div>
    </div>
</div>
