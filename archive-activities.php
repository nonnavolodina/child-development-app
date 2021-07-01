<?php

get_header();  

?>

<main class="main all-activities">
    <div class="wrapper">
        <div class="all-activities__sidebar">
            <h2 class="sidebar__heading"><span class="number"><?php echo $wp_query->post_count ?></span> Activities</h2>
            <?php get_sidebar(); ?>
        </div>
        <div class="all-activities__content">
            <section class="activities">
                <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
                    <a href="<?php the_permalink(); ?>">
                        <article class="activity">
                            <figure class="activity__image">
                                <?php the_post_thumbnail(''); ?>
                            </figure>
                            <div class="activity__content">
                                <h3 class="h3 activity__heading"><?php the_title(); ?></h3>
                                <div class="activity__description"><?php the_excerpt(); ?></div>
                                <?php get_template_part('templates/skills'); ?>
                                <?php get_template_part('templates/subjects-ages'); ?>
                            </div>
                        </article>
                    </a>
                <?php endwhile; endif; ?>
            </section>
        </div>
    </div>
</main>



<?php get_footer(); ?>