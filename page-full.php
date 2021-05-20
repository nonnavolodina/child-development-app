<?php

/*
	Template Name: Full Page, No Sidebar
*/

get_header();  ?>
<div class="main">
    <div class="container">
        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

            <h2><?php the_title(); ?></h2>
            <?php the_content(); ?>

        <?php endwhile; ?>
    </div>
</div>
<?php get_footer(); ?>
