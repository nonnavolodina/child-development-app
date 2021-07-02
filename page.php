<?php get_header();  ?>

<main class="main shop">
    <div class="wrapper">
        <section class="intro">
            <h1><?php echo the_field('page_title'); ?></h1>
            <figure class="intro__image">
                <?php $image = get_field('hero_image'); ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
            </figure>
        </section>
        <section class="new-arrivals">
            <h2><?php echo the_field('new_arrivals_label'); ?></h2>
            <ul class="products">
                <?php $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => -1
                );
                $loop = new WP_Query( $args );
                if($loop->have_posts()) {
                    while ($loop->have_posts()) : $loop->the_post();
                    global $woocommerce;
                    $price = get_post_meta( get_the_ID(), '_regular_price', true); ?>
                        <li class="product">
                            <a href="<?php the_permalink(); ?>">
                                <figure class="product__image">
                                    <?php the_post_thumbnail(); ?>
                                </figure>
                                <h4 class="h4"><?php the_title(); ?></h4>
                                <p>$<?php echo $price ?></p>
                            </a>
                        </li>
                    <?php endwhile;
                }
                wp_reset_postdata(); ?>
            </ul>
        </section>
    </div>
</main>

<?php get_footer(); ?>