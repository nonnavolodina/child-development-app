<?php get_header(); ?>
<main class="main">
    <section class="single">
        <div class="wrapper">
            <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="single__top">
                        <figure class="single__image">
                            <?php the_post_thumbnail('large'); ?>
                        </figure>
                        <div class="single__top-content">
                            <?php get_template_part('templates/categories'); ?>
                            <h2><?php the_title(); ?></h2>
                            <p class="date"><?php the_date(); ?></p>
                        </div>
                    </div>
                    <div class="single__content">
                        <div><?php the_content(); ?></div>
                    </div>
                    <hr>
                </div>
                <div id="nav-below" class="navigation">
                    <div class="navigation__prev">
                    <?php if( have_rows('blog_cust_fields', 'option') ):
                        while (have_rows('blog_cust_fields', 'option')) : the_row();
                            $link_text = get_sub_field('previous_post_label');  ?>
                            <span class="navigation__heading"><?php echo $link_text ?></span>
                        <?php endwhile; ?>
                    <?php endif; ?>
                        <p class="nav-previous navigation__title"><?php previous_post_link('%link', ' %title'); ?></p>
                    </div>
                    <div class="navigation__next">
                        <?php if( have_rows('blog_cust_fields', 'option') ):
                            while (have_rows('blog_cust_fields', 'option')) : the_row();
                                $link_text = get_sub_field('next_post_label');  ?>
                                <span class="navigation__heading"><?php echo $link_text ?></span>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <p class="nav-next navigation__title"><?php next_post_link('%link', '%title'); ?></p>
                    </div>
                </div>

            <?php endwhile; // end of the loop. ?>
        </div>
    </section>
    <section class="single-related">
        <div class="wrapper">
            <?php if( have_rows('blog_cust_fields', 'option') ):
                while (have_rows('blog_cust_fields', 'option')) : the_row(); 
                    $heading = get_sub_field('related_posts_label'); ?>
                    <h2 class="related__heading"><?php echo $heading ?></h2>
                <?php endwhile; ?>
            <?php endif; ?> 
        </div>
        <div class="single-related__posts wrapper">
            <ul class="single-related__posts-container">
                <?php
                    $related = get_posts( array( 'numberposts' => 3,'post_type' => 'post', 'post__not_in' => array($post->ID) ) );
                    if( $related ) foreach( $related as $post ) {
                        setup_postdata($post); ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                            <article>
                                <figure style="background-image: url('<?php echo $url ?>');"></figure>
                                <div class="blog__copy">
                                    <?php get_template_part('templates/categories'); ?>
                                    <h2><?php the_title(); ?></h2>
                                </div>
                            </article>
                        </a>
                    <?php }
                    wp_reset_postdata(); 
                ?>
            </ul>
        </div>
    </section>
</main>
<?php get_footer(); ?>