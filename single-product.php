<?php get_header();

global $woocommerce;
$price = get_post_meta( get_the_ID(), '_regular_price', true); 
global $product; ?>

<main class="main single-product">
    <div class="wrapper">
        <figure class="single-product__image">
            <?php the_post_thumbnail(); ?>
        </figure>
        <div class="single-product__content">
            <p class="subheading">earlybird</p>
            <div class="heading">
                <h2><?php the_title(); ?></h2>
                <p class="price">$<?php echo $price ?></p>
            </div>
            <div class="copy"><?php echo the_content(); ?></div>
            <!-- <?php echo do_shortcode('[add_to_cart id="'.$post->ID.'"]'); ?>  -->
            <div class="add">
                <?php global $product;

                echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                    sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="btn btn--fill button %s product_type_%s">%s - $' . $price . '</a>',
                        esc_url( $product->add_to_cart_url() ),
                        esc_attr( $product->get_id() ),
                        esc_attr( $product->get_sku() ),
                        $product->is_purchasable() ? 'add_to_cart_button' : '',
                        esc_attr( $product->get_type() ),
                        esc_html( $product->add_to_cart_text() )
                    ),
                $product ); ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>