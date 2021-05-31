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
    <section class="template-lr wrapper">
        <?php if(have_rows('start_here_content')):
            while (have_rows('start_here_content')) : the_row();
            $heading = get_sub_field('heading');
            $description = get_sub_field('description');
            $image = get_sub_field('image');
            $position = get_sub_field('image_position'); ?>
                <div class="template-lr__container <?php if($position == 'left'): ?>template-lr__container--reverse <?php endif; ?>">
                    <div class="template-lr__inner-container">
                        <h2 class="h2 h2--medium template-lr__heading"><?php echo $heading ?></h2>
                        <div class="template-lr__description"><?php echo $description ?></div>
                    </div>
                    <div class="template-lr__img template-lr__img--video">
                        <img class="" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_url($image['alt']); ?>">
                    </div>              
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>
    <hr class="wrapper">
    <?php get_template_part('templates/instagram'); ?>
</main>
<?php get_footer(); ?>