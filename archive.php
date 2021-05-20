<?php get_header(); ?>

<div class="main">
    <div class="container">
        <div class="content">

            <?php if ( have_posts() ) the_post(); ?>

                <h1>
                    <?php if ( is_day() ) : ?>
                    Daily Archives: <?php the_date(); ?>
                    <?php elseif ( is_month() ) : ?>
                    Monthly Archives: <?php the_date('F Y'); ?>
                    <?php elseif ( is_year() ) : ?>
                    Yearly Archives: <?php the_date('Y'); ?>
                    <?php else : ?>
                    Blog Archives
                    <?php endif; ?>
                </h1>

            <?php
    	
    	        rewind_posts();

                get_template_part( 'loop', 'archive' );
            ?>

        </div>

        <?php get_sidebar(); ?>

    </div>
</div>

<?php get_footer(); ?>