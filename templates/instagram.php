<section class="instagram wrapper">
    <?php if( have_rows('instagram', 'option') ):
        while (have_rows('instagram', 'option')) : the_row();
            $subheading = get_sub_field('subheading');
            $heading = get_sub_field('heading'); ?>
            <p class="instagram__subheading"><?php echo $subheading ?></p>
            <h2 class="instagram__heading"><?php echo $heading ?></h2>
            <div class="instagram__posts"><?php echo do_shortcode('[instagram-feed]'); ?></div>
        <?php endwhile; ?>
    <?php endif; ?>
</section>