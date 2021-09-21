<?php

get_header();  

$args = array(  
    'post_type' => 'activities',
    'post_status' => 'publish',
    'posts_per_page' => -1, 
    'orderby' => 'title',
    'order'   => 'ASC'
);
$args['search_filter_id'] = 603;

$query = new WP_Query($args);
?>

<main class="main all-activities">
    <div class="wrapper">
        <div class="all-activities__sidebar">
            <h2 class="sidebar__heading"><span class="number"><?php echo $wp_query->post_count ?></span> Activities</h2>
            <div class="filter-container">
                <p class="sidebar__sub-heading">FILTER:</p>
                <button class="mobile-sidebar-button">Filter</button>
                <?php echo do_shortcode('[searchandfilter id=603]'); ?>
            </div>
        </div>
        <div class="all-activities__content">
            <section id="activities-container" class="activities">
                <?php if($query->have_posts()) : while($query->have_posts()) : $query->the_post(); ?>
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
                    <?php endwhile; ?>
                    <?php endif; wp_reset_postdata(); ?>
                </section>
            <ol id="pagin"></ol>
        </div>
    </div>
    <div id="activity-scroll" class="scroll-top">
        <svg width="68" height="68" viewBox="0 0 68 68" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="34" cy="34" r="34" fill="#BAE8DF"/>
            <path d="M21 39L34 26L47 39" stroke="#4673B2" stroke-width="3" stroke-linecap="square"/>
        </svg>
    </div>
</main>



<?php get_footer(); ?>