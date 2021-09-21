<?php get_header();  ?>

<main class="main default">
    <div class="wrapper">
        <h1><?php the_title(); ?></h1>
        <figure><?php the_post_thumbnail(); ?></figure>
        <div class="content"><?php the_content(); ?></div>
    </div>
</main>

<?php get_footer(); ?>