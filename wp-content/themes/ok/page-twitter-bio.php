<?php the_post(); ?>

<?php get_header(); ?>

<div id="hero">
    <div class="container">
            <h1><?php the_title(); ?></h1>
        </div>
    </div>
</div>

<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                <h2><?php $tb = new TwitterBio; echo $tb->get_bio(); ?></h2>
                <hr />
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
