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
        <?php the_user_favorites_list($user_id = null, $site_id = null, $include_links = true, $filters = true, $include_button = false, $include_thumbnails = true, $thumbnail_size = 'large', $include_excerpt = true); ?>
    </section>
</main>
<?php get_footer(); ?>