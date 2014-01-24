<?php get_header(); ?>

<?php if ( !is_single() ) : ?>
    <div id="hero">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <?php get_search_form(); ?>
                </div>
                <div class="col-sm-8">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            Archives <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <?php wp_get_archives( array( 'type' => 'monthly', 'limit' => 12 ) ); ?>
                        </ul>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            Tags <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <?php wp_list_categories( array( 'title_li' => '', 'taxonomy' => 'post_tag', 'orderby' => 'count', 'order' => 'DESC', 'number' => 12 ) ); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<div id="content">
    <div class="container">
        <?php while ( have_posts() ) : the_post(); ?>
            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                    <?php $format = get_post_format(); ?>
                    <?php get_template_part( 'post', $format ); ?>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php if ( is_single() ) : ?>

<div id="blog-pagination">
    <div class="container">
        <div class="row">
            <div class="previous col-xs-6 col-md-5 col-md-offset-1 col-lg-4 col-lg-offset-2">
                <?php next_post_link( '%link', '<span class="glyphicon glyphicon-chevron-left"></span> %title' ); ?>
            </div>
            <div class="next col-xs-6 col-md-5 col-lg-4">
                <?php previous_post_link( '%link', '%title <span class="glyphicon glyphicon-chevron-right"></span>' ); ?>
            </div>
        </div>
    </div>
</div>

<?php elseif ( get_next_posts_link() || get_previous_posts_link() ) : ?>

<div id="blog-pagination">
    <div class="container">
        <div class="row">
            <div class="previous col-xs-6 col-md-5 col-md-offset-1 col-lg-4 col-lg-offset-2">
                <?php previous_posts_link( '<span class="glyphicon glyphicon-chevron-left"></span> Previous Page' ); ?>
            </div>
            <div class="next col-xs-6 col-md-5 col-lg-4">
                <?php next_posts_link( 'Next Page <span class="glyphicon glyphicon-chevron-right"></span>' ); ?>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>

<?php get_footer(); ?>
