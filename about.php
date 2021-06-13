<?php

/* Template Name: About */

get_header();  ?>

<main class="about">
    <h1 class="about__heading"><?php the_title(); ?></h1>      
    <section class="template-lr wrapper">
        <?php if(have_rows('about_content')):
            while (have_rows('about_content')) : the_row();
                $heading = get_sub_field('heading');
                $description = get_sub_field('description');
                $image = get_sub_field('image');
                $position = get_sub_field('image_position'); ?>
                <div class="template-lr__container <?php if($position == 'left'): ?>template-lr__container--reverse <?php endif; ?>">
                    <div class="template-lr__inner-container">
                        <h2 class="template-lr__heading"><?php echo $heading ?></h2>
                        <div class="template-lr__description"><?php echo $description ?></div>
                    </div>
                    <div class="template-lr__img">
                        <img class="" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_url($image['alt']); ?>">
                    </div> 
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>
    <section class="goal">
    <?php if(have_rows('goal')):
            while (have_rows('goal')) : the_row();
                $image = get_sub_field('icon');
                $goal_text = get_sub_field('goal_text');
                $goal_sub_text = get_sub_field('goal_sub-text'); ?>
                <div class="goal__container">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_url($image['alt']); ?>">
                    <p class="goal__text"><?php echo $goal_text ?></p>
                    <p class="goal__sub-text"><?php echo $goal_sub_text ?></p>
                </div>
            <?php endwhile;
    endif; ?>
    </section>
    <section class="template-lr wrapper">
        <?php if(have_rows('about_values')):
            while (have_rows('about_values')) : the_row();
                $heading = get_sub_field('heading');
                $description = get_sub_field('description');
                $image = get_sub_field('image');
                $position = get_sub_field('image_position'); ?>
                <div class="template-lr__container <?php if($position == 'left'): ?>template-lr__container--reverse <?php endif; ?>">
                    <div class="template-lr__inner-container">
                        <h2 class="template-lr__heading"><?php echo $heading ?></h2>
                        <div class="template-lr__description"><?php echo $description ?></div>
                    </div>
                    <div class="template-lr__img">
                        <img class="" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_url($image['alt']); ?>">
                    </div> 
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>
    <section class="founders">
    <?php if(have_rows('founders')):
        while (have_rows('founders')) : the_row();
            $heading = get_sub_field('heading'); ?>
            <div class="founders__container wrapper">
                <h2 class="founders__heading"><?php echo $heading ?></h2>
                <div class="founders__inner-container">    
                    <?php if(have_rows('founder')):
                        while (have_rows('founder')) : the_row(); 
                            $image = get_sub_field('headshot');
                            $name = get_sub_field('name');
                            $bio = get_sub_field('bio'); ?>
                            <div class="founders__founder">
                                <img class="" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_url($image['alt']); ?>">
                                <p class="founders__name"><?php echo $name ?></p>
                                <div class="founders__bio"><?php echo $bio ?></div>
                            </div>
                        <?php endwhile;
                    endif; ?>
                </div>
            </div>
        <?php endwhile;
    endif; ?>
</main>
<?php get_footer(); ?>