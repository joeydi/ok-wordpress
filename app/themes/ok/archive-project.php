<?php get_header(); ?>

<div id="hero">
    <div class="container">
        <div class="row">
            <h1 class="col-lg-10">Jack of all trades? Sure.<br />Master of none? You be the judge.</h1>
        </div>
    </div>
</div>

<div id="content">
    <div class="container">
        <div class="row">
            <?php while( have_posts() ) : the_post(); ?>
            <div class="col-sm-6 col-lg-4">
                <a href="<?php the_permalink(); ?>" class="project-excerpt">
                    <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
                    <h2><?php the_title(); ?></h2>
                </a>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
