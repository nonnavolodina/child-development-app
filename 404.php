<?php get_header(); ?>

<div class="main error">
    <?php if(have_rows('404_page', 'option')):
        while (have_rows('404_page', 'option')) : the_row();
            $heading = get_sub_field('heading');
            $description = get_sub_field('description');
            $image = get_sub_field('image');
            $cta = get_sub_field('cta_text'); ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="">
                <h1><?php echo $heading ?></h1>
                <p><?php echo $description ?></p>
                <a class="btn btn--fill" href="javascript:history.go(-1)"><?php echo $cta ?></a>
        <?php endwhile;
    endif; ?>
</div>

<?php get_footer(); ?>