<?php

/* Template Name: Start Here */

get_header();  ?>

<main class="start-here">
    <section class="introduction">
        <div class="wrapper">
        <?php if(have_rows('introduction_section')):
            while (have_rows('introduction_section')) : the_row(); 
                $heading = get_sub_field('heading');
                $description = get_sub_field('description'); ?>
                <h2 class="h2 h2--large introduction__heading"><?php echo $heading ?></h2>
                <p class="introduction__description"><?php echo $description ?></p>
            <?php endwhile; ?>
        <?php endif; ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>