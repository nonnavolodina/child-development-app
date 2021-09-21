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
        <div id="fd-form-60960b3e75b15241b6ddce52"></div>
        <script>
        window.fd('form', {
            formId: '60960b3e75b15241b6ddce52',
            containerEl: '#fd-form-60960b3e75b15241b6ddce52'
        });
</script>                          
    </div>                                    
</section>