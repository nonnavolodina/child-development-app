<?php get_header(); ?>

<main class="blog">
    <section class="blog__top">
        <div class="wrapper">
            <div class="featured-post">
                <?php if(have_posts()) :  the_post(); ?>
                    <figure class="featured-post__image">
                        <?php the_post_thumbnail('full'); ?>
                    </figure>
                    <div class="blog__content featured-post__content">
                        <?php get_template_part('templates/categories'); ?>
                        <h2 class="blog__heading"><?php the_title(); ?></h2>
                        <div class="blog__excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                        <?php if( have_rows('blog_cust_fields', 'option') ):
                            while (have_rows('blog_cust_fields', 'option')) : the_row();
                                $link_text = get_sub_field('read_more_label');  ?>
                                <a class="blog__link" href="<?php the_permalink(); ?>"><?php echo $link_text ?></a>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="posts">
                <?php query_posts(array('post_type' => 'post', 'posts_per_page' => 3, 'offset' => 1)) ?>
                <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
                    <div class="post">
                        <?php get_template_part('templates/categories'); ?>
                        <h2 class="post__heading"><?php the_title(); ?></h2>
                    </div>
                <?php endwhile; endif; wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
    <section class="post-filters">
        <div class="wrapper">
            <div class="post-filters__left">
                <?php if( have_rows('blog_cust_fields', 'option') ):
                    while (have_rows('blog_cust_fields', 'option')) : the_row();
                        $text = get_sub_field('browse_by_category_label');  ?>
                        <h2 class="post-filters__heading"><?php echo $text ?></h2>
                        <ul class="post-filters__categories">
                            <?php
                                $categories = get_categories(array('hide_empty' => true) );
                                foreach($categories as $category) {
                                    echo '<a class="post-filters__category" href="' . get_category_link( $category->term_id ) . '"><li>' . $category->name . '</li></a>';
                                }
                            ?>
                        </ul>
                        <form class="post-filters__search" action="/" method="get">
                            <input type="text" placeholder="Search by Keyword" name="s" id="search" value="<?php the_search_query(); ?>" />
                            <button type="submit" class="post-filters__submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="post-filters__right">
                <?php if( have_rows('blog_cust_fields', 'option') ):
                    while (have_rows('blog_cust_fields', 'option')) : the_row();
                        $image = get_sub_field('photo');  ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_url($image['alt']); ?>">
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <section class="archive">
        <div class="wrapper">
            <?php echo do_shortcode('[ajax_load_more id="earlybird" container_type="div" post_type="post" offset="1" scroll="false"]'); ?>
        </div>
    </section>
    <section class="blog-newsletter">
        <div class="wrapper">
        <?php if( have_rows('blog_cust_fields', 'option') ):
            while (have_rows('blog_cust_fields', 'option')) : the_row();
                $text = get_sub_field('newsletter_sign_up_text');  ?>
                    <p class="blog-newsletter__heading"><?php echo $text ?></p>
            <?php endwhile; ?>
        <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>