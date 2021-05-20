<?php get_header(); ?>

<div class="main">
    <div class="container">
        <div class="content">
            <?php
                if ( have_posts() )
                    the_post();
            ?>

            <h1>Author Archives:
                <a class="name" href="<?php echo get_author_posts_url( get_the_author_meta('ID') ); ?>">
                <?php the_author(); ?>
                </a>
            </h1>

            <?php
      	        if ( get_the_author_meta('description') ) : ?>

                    <h2>About <?php the_author(); ?> </h2>
      		        <?php echo get_avatar( get_the_author_meta('user_email'), 60); ?>
      		        <?php the_author_meta('description'); ?>

                <?php endif; ?>

            <?php
                rewind_posts();
                get_template_part('loop', 'author');
            ?>
        </div>

        <?php get_sidebar(); ?>

    </div>
</div>

<?php get_footer(); ?>