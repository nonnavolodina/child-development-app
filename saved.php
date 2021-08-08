<?php

/* Template Name: Saved */

get_header();  ?>

<main class="main saved">
    <section class="introduction">
        <div class="wrapper">
            <h2 class="introduction__heading">Saved Activities</h2>
        </div>
    </section>
    <section class="wrapper">
        <div class="favorites-list">
            <?php $array_of_post_ids = get_user_favorites($user_id, $site_id, $include_links, $filters, $include_button); 
                foreach ($array_of_post_ids as $post_id) {
                    echo '<div class="post post-thumbnail-' . $post_id .'">';
                    echo get_the_post_thumbnail($post_id);
                    echo '<div class="post-container">';
                    echo get_the_title($post_id);
                    echo '<div class="buttons">';
                        $subjects = get_the_terms($post_id, 'subject', array('hide_empty' => true));
                        foreach($subjects as $subject) {
                            echo '<button class="subjects__subject subjects__subject--' . $subject->slug . '">' . $subject->name . '</button>';
                        }
                        $ages = get_the_terms( $post_id, 'age', array('hide_empty' => true) );
                        foreach($ages as $age) {
                            echo '<button class="ages__age">' . $age->name . '</button>';
                        }
                    echo '</div>';
                    $skills = get_the_terms( $post_id, 'skills', array('hide_empty' => true) );
                    echo '<div class="skill">';
                    foreach($skills as $skill) {
                        echo '<li class="skills__skill">' . $skill->name . '</li>';
                    }
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                } 
            ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>