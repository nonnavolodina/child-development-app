<?php get_header(); ?>
<main class="single-activity">
    <div class="wrapper">
        <div class="single-activity__heading-info">
            <h2 class="h2 h2--large single-activity__heading"><?php echo the_title(); ?></h2>
            <?php get_template_part('templates/subjects-ages'); ?>
        </div>
        <div class="single-activity__info">
            <div class="single-activity__content">
                <div class="single-activity__img">
                    <?php the_post_thumbnail(''); ?>
                </div>
                <div class="single-activity__description">
                    <?php the_content(); ?>
                </div>
            </div>
            <aside class="single-activity__sidebar">
                <?php if( have_rows('activity_custom_fields', 'option') ):
                    while (have_rows('activity_custom_fields', 'option')) : the_row();
                        $downloads = get_sub_field('downloads_label'); ?>
                        <h4 class="h4 single-activity__sidebar-heading"><?php echo $downloads ?></h4>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php if( have_rows('details') ):
                    while (have_rows('details')) : the_row(); ?>
                    <ul class="downloads">
                        <?php if( have_rows('attachments') ):
                            while (have_rows('attachments')) : the_row();
                                $attachment = get_sub_field('attachment');
                                $label = get_sub_field('attachment_label'); ?>
                                    <a href="<?php echo $attachment ?>" class="downloads__download">
                                        <li><?php echo $label ?></li>
                                    </a>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </ul>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php if( have_rows('activity_custom_fields', 'option') ):
                    while (have_rows('activity_custom_fields', 'option')) : the_row();
                        $downloads = get_sub_field('materials_label'); ?>
                        <h4 class="h4 single-activity__sidebar-heading"><?php echo $downloads ?></h4>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php if( have_rows('details') ):
                    while (have_rows('details')) : the_row(); ?>
                        <ul class="materials">
                            <?php if( have_rows('materials') ):
                                while (have_rows('materials')) : the_row();
                                    $material = get_sub_field('material'); ?>
                                        <li class="materials__material"><?php echo $material ?></li>
                                <?php endwhile; ?>
                        </ul>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php if( have_rows('activity_custom_fields', 'option') ):
                    while (have_rows('activity_custom_fields', 'option')) : the_row();
                        $notes = get_sub_field('notes_label'); ?>
                        <h4 class="h4 single-activity__sidebar-heading"><?php echo $notes ?></h4>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php if( have_rows('details') ):
                    while (have_rows('details')) : the_row();
                        $note = get_sub_field('notes'); ?>
                        <div class="note"><?php echo $note ?></div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </aside>
        </div>
        <div class="single-activity__instructions">
            <?php if( have_rows('activity_custom_fields', 'option') ):
                while (have_rows('activity_custom_fields', 'option')) : the_row(); 
                    $heading = get_sub_field('instructions_label'); ?>
                    <h2 class="h2 h2--medium single-activity__instructions-heading"><?php echo $heading ?></h2>
                <?php endwhile; ?>
            <?php endif; ?>
            <div class="instructions">
                <?php if( have_rows('instructions') ):
                    while (have_rows('instructions')) : the_row(); 
                        $description = get_sub_field('description'); 
                        $image = get_sub_field('image'); ?>
                        <div class="instructions__instruction">
                            <div class="instructions__instruction-content">
                                <h3 class="h3 h3__instructions__instruction-heading">Step <?php echo get_row_index(); ?></h3>
                                <div class="instructions__instruction-description"><?php echo $description ?></div>
                            </div>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_url($image['alt']); ?>">
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <section class="related">
        <div class="wrapper">
            <?php if( have_rows('activity_custom_fields', 'option') ):
                while (have_rows('activity_custom_fields', 'option')) : the_row(); 
                    $heading = get_sub_field('related_label'); ?>
                    <h2 class="h2 h2--medium related__heading"><?php echo $heading ?></h2>
                <?php endwhile; ?>
            <?php endif; ?> 
        </div>
        <div class="related__activities">
            
        </div>
    </section>
</main>
<?php get_footer(); ?>