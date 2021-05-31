<?php get_header(); ?>
<div class="main">
    <div class="container">
        <div class="content">
            <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    <div class="entry-meta"></div>
                    <div class="entry-content">
                        <?php the_content(); ?>
                        <?php wp_link_pages(
                            array(
                                'before' => '<div class="page-link"> Pages: ',
                                'after' => '</div>'
                            )); ?>
                    </div>
                    <div class="entry-utility">
                        <?php edit_post_link( 'Edit', '<span class="edit-link">', '</span>' ); ?>
                    </div>
                </div><!-- #post-## -->

                <div id="nav-below" class="navigation">
                    <p class="nav-previous"><?php previous_post_link('%link', '&larr; %title'); ?></p>
                    <p class="nav-next"><?php next_post_link('%link', '%title &rarr;'); ?></p>
                </div>

            <?php endwhile; // end of the loop. ?>
        </div>

        <?php get_sidebar(); ?>

    </div>
</div>
<?php get_footer(); ?>