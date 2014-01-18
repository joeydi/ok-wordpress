<?php get_header(); ?>

<div id="hero">
    <div class="container">
        <div class="row">
            <h1 class="col-sm-12">I partner with brands and agencies, bringing over 10 years of design and development experience to the table.</h1>
        </div>
    </div>
</div>

<div id="content">
    <div class="container">
        <div class="row">
            <?php while( have_posts() ) : the_post(); ?>
            <div class="col-sm-6 col-lg-4">
                <div class="project-excerpt">
                    <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
