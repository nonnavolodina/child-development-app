<?php

/* Template Name: All Activities */

get_header();  ?>

<?php 
    $args = array(  
        'post_type' => 'activities',
        'posts_per_page' => -1,
    );

    $activities = new WP_Query( $args ); 

    wp_reset_postdata(); 
?>
    <main class="all-activities">
        <div class="wrapper">
            <div class="all-activities__sidebar">
                <?php if ( $activities->have_posts() ) : $activities->the_post(); ?>
                    <h2 class="h2 h2--large sidebar__heading"><span class="number"><?php echo $activities->found_posts; ?></span> Activities</h2>
                <?php endif; ?>
                <?php get_sidebar(); ?>
            </div>
            <div class="all-activities__content">
                <section class="activities">
                <?php if ( $activities->have_posts() ) :
                    while ( $activities->have_posts() ) : $activities->the_post(); ?>
                        <a href="<?php the_permalink(); ?>">
                            <article class="activity">
                                <div class="activity__image">
                                    <?php the_post_thumbnail(''); ?>
                                </div>
                                <div class="activity__content">
                                    <h3 class="h3 activity__heading"><?php the_title(); ?></h3>
                                    <div class="activity__description"><?php the_content(); ?></div>
                                    <ul class="skills">
                                        <?php
                                            $skills = get_terms( 'skills', array('hide_empty' => true) );
                                            foreach($skills as $skill) {
                                                echo '<li class="skills__skill">' . $skill->name . '</li>';
                                            }
                                        ?>
                                    </ul>
                                    <?php get_template_part('templates/subjects-ages'); ?>
                                </div>
                            </article>
                        </a>
                    <?php endwhile;
                endif; ?>
                </section>
            </div>
        </div>
    </main>
<?php wp_reset_postdata(); ?>



<?php get_footer(); ?>