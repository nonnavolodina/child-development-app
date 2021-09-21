<?php get_header(); ?>

<main class="main blog">
    <section class="blog__top">
        <div class="wrapper">
            <div class="featured-post">
            <?php if( have_rows('featured_blog', 'option') ): ?>
                <?php while( have_rows('featured_blog', 'option') ): the_row(); 
                    $featured_post = get_sub_field('featured_blog_post'); ?>
                    <figure class="featured-post__image">
                        <?php echo get_the_post_thumbnail( $featured_post, 'large' ); ?>
                    </figure>
                        <div class="blog__content featured-post__content">
                            <?php
                                $categories = get_the_terms( $featured_post->ID, 'category', array('hide_empty' => true) );
                                foreach($categories as $category) {
                                    echo '<li class="categories__category">' . $category->name . '</li>';
                                }
                            ?>
                            <h2 class="blog__heading"><?php echo esc_html( $featured_post->post_title ); ?></h2>
                            <div class="blog__excerpt">
                            <?php echo esc_html( $featured_post->post_excerpt ); ?>
                            </div>
                            <?php if( have_rows('blog_cust_fields', 'option') ):
                                while (have_rows('blog_cust_fields', 'option')) : the_row();
                                    $link_text = get_sub_field('read_more_label');  ?>
                                    <a class="blog__link" href="<?php echo get_permalink( $featured_post->ID ); ?>"><?php echo $link_text ?></a>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                <?php endwhile;
            endif; ?>
            </div>
            <div class="posts">
            <?php if( have_rows('extra_posts', 'option') ): ?>
                <?php while( have_rows('extra_posts', 'option') ): the_row();
                    $posts = get_sub_field('posts'); ?>
                    <?php foreach($posts as $post): ?>
                        <a href="<?php echo get_permalink( $post->ID ); ?>">
                            <div class="post">
                                <?php
                                    $categories = get_the_terms( $post->ID, 'category', array('hide_empty' => true) );
                                    foreach($categories as $category) {
                                        echo '<li class="categories__category">' . $category->name . '</li>';
                                    }
                                ?>
                                <h2 class="post__heading"><?php echo esc_html( $post->post_title ); ?></h2>
                            </div>
                        </a>
                    <?php endforeach; ?>
                <?php endwhile; 
            endif;?>
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
                        <?php echo do_shortcode('[ajax_load_more_filters id="category" target="earlybird"]'); ?>
                        <?php echo do_shortcode('[ajax_load_more_filters id="search" target="earlybird"]'); ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="post-filters__right">
                <?php if( have_rows('blog_cust_fields', 'option') ):
                    while (have_rows('blog_cust_fields', 'option')) : the_row();
                        $image = get_sub_field('photo');  ?>
                        <img loading="lazy" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_url($image['alt']); ?>">
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <section class="archive">
        <div class="wrapper">
            <?php echo do_shortcode('[ajax_load_more scroll="false" id="earlybird" container_type="div" filters="true" filters_url="false" filters_paging="false" filters_scroll="true" filters_analytics="false" post_type="post" posts_per_page="5" no_results_text="Sorry, no results found."]'); ?>
        </div>
    </section>
    <div id="blog-scroll" class="scroll-top">
        <svg width="68" height="68" viewBox="0 0 68 68" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="34" cy="34" r="34" fill="#BAE8DF"/>
            <path d="M21 39L34 26L47 39" stroke="#4673B2" stroke-width="3" stroke-linecap="square"/>
        </svg>
    </div>
</main>
<?php if ( !is_user_logged_in() ) { ?>
    <?php get_template_part('templates/newsletter'); ?>
<?php } ?>
<?php get_footer(); ?>