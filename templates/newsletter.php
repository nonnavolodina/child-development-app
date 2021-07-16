<section class="newsletter">
    <div class="wrapper">
        <?php if(have_rows('newsletter_sign_up', 'option')):
            while (have_rows('newsletter_sign_up', 'option')) : the_row();
                $heading = get_sub_field('heading');
                $description = get_sub_field('description'); ?>
                    <h2><?php echo $heading ?></h2>
                    <p><?php echo $description ?></p>
            <?php endwhile;
        endif; ?>
        <?php echo do_shortcode('[ninja_form id=2]'); ?>                                
    </div>                                    
</section>