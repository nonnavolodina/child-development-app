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
                    echo '<a class="post post-thumbnail-' . $post_id .'" href="' . get_permalink($post_id) . '">';
                    echo '<figure>' . get_the_post_thumbnail($post_id) . '</figure>';
                    echo '<div class="post-container">';
                    echo '<h3>'. get_the_title($post_id) . '</h3>';
                    echo '<ul class="subjects-ages">';
                    echo '<div class="subjects-ages__subjects">';
                        $subjects = get_the_terms($post_id, 'subject', array('hide_empty' => true));
                        foreach($subjects as $subject) {
                            echo '<button class="subjects__subject subjects__subject--' . $subject->slug . '">' . $subject->name . '</button>';
                        }
                        $ages = get_the_terms( $post_id, 'age', array('hide_empty' => true) );
                    echo '</div>';
                    echo '<div class="subjects-ages__ages">';
                        foreach($ages as $age) {
                            echo '<button class="ages__age">' . $age->name . '</button>';
                        }
                    echo '</div>';
                    echo '</ul>';
                    $skills = get_the_terms( $post_id, 'skills', array('hide_empty' => true) );
                    echo '<ul class="skills">';
                    foreach($skills as $skill) {
                        echo '<li class="skills__skill">' . $skill->name . '</li>';
                    }
                    echo '</ul>';
                    echo '</div>';
                    echo '</a>';
                } 
            ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>