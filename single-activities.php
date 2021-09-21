<?php get_header(); ?>
<main class="main single-activity">
    <div class="wrapper">
        <div class="single-activity__heading-info">
            <h2 class="single-activity__heading"><?php echo the_title(); ?></h2>
            <?php get_template_part('templates/subjects-ages'); ?>
        </div>
        <div class="single-activity__info">
            <div class="single-activity__content">
                <?php $video = get_field('vimeo_number'); ?>
                <?php if($video): ?>
                    <iframe loading="lazy" width="770" height="430" src="https://player.vimeo.com/video/<?php echo $video ?>"></iframe>
                <?php else: ?>
                    <div class="single-activity__img">
                        <?php the_post_thumbnail(''); ?>
                    </div>
                <?php endif; ?>
                <div class="single-activity__description">
                    <?php the_content(); ?>
                </div>
            </div>
            <!-- <button class="btn btn--fill mobile-instructions">View Instructions</button> -->
            <aside class="single-activity__sidebar">
                <?php if (have_rows('details')): 
                    while (have_rows('details')) : the_row();
                        $rows = get_sub_field('attachments');
                        if($rows) { ?>
                            <h4 class="h4 single-activity__sidebar-heading">Downloads</h4>
                        <?php } ?>
                    <?php endwhile;
                endif; ?>
                <?php if (have_rows('details')): ?>
                    <ul class="downloads">
                        <?php while (have_rows('details')) : the_row(); ?>
                            <?php if( have_rows('attachments') ):
                                while (have_rows('attachments')) : the_row();
                                    $attachment = get_sub_field('attachment');
                                    $label = get_sub_field('attachment_label'); ?>
                                        <a href="<?php echo $attachment ?>" class="downloads__download">
                                            <li><?php echo $label ?></li>
                                        </a>      
                                <?php endwhile;
                            endif;
                        endwhile; ?>
                    </ul>
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
                        <?php if( have_rows('details') ):
                            while (have_rows('details')) : the_row();
                                $note = get_sub_field('notes'); 
                                if($note): ?>
                                    <h4 class="h4 single-activity__sidebar-heading"><?php echo $notes ?></h4>
                                <?php endif; ?>
                            <?php endwhile;
                        endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php if( have_rows('details') ):
                    while (have_rows('details')) : the_row();
                        $note = get_sub_field('notes'); ?>
                        <?php if($note): ?>
                            <div class="note"><?php echo $note ?></div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php echo do_shortcode('[favorite_button]'); ?>
            </aside>
        </div>
        <div class="single-activity__instructions">
            <?php if( have_rows('activity_custom_fields', 'option') ):
                while (have_rows('activity_custom_fields', 'option')) : the_row(); 
                    $heading = get_sub_field('instructions_label'); ?>
                    <h2 class="single-activity__instructions-heading"><?php echo $heading ?></h2>
                <?php endwhile; ?>
            <?php endif; ?>
            <div class="instructions instructions--desktop">
                <?php if( have_rows('instructions') ):
                    while (have_rows('instructions')) : the_row(); 
                        $description = get_sub_field('description'); 
                        $image = get_sub_field('image'); ?>
                        <div class="instructions__instruction">
                            <?php if($image): ?>
                                <div class="instructions__instruction-content instructions__instruction-content--image">
                                    <h3 class="h3 h3__instructions__instruction-heading">Step <?php echo get_row_index(); ?></h3>
                                    <div class="instructions__instruction-description"><?php echo $description ?></div>
                                </div>
                                <figure>
                                    <img loading="lazy" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_url($image['alt']); ?>">
                                </figure>
                            <?php else: ?>
                                <div class="instructions__instruction-content instructions__instruction-content--no-image">
                                    <h3 class="h3 h3__instructions__instruction-heading">Step <?php echo get_row_index(); ?></h3>
                                    <div class="instructions__instruction-description"><?php echo $description ?></div>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="instructions instructions--mobile">
                <?php if( have_rows('instructions') ): ?>
                    <?php while (have_rows('instructions')) : the_row(); 
                        $description = get_sub_field('description'); 
                        $image = get_sub_field('image'); ?>
                        <div class="instructions-container">
                            <div class="instructions__instruction">
                                <div class="instructions__instruction-content">
                                    <h3 class="h3 h3__instructions__instruction-heading">Step <?php echo get_row_index(); ?></h3>
                                    <div class="instructions__instruction-description"><?php echo $description ?></div>
                                </div>
                                <img loading="lazy" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_url($image['alt']); ?>">
                            </div>
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
                    <h2 class="related__heading"><?php echo $heading ?></h2>
                <?php endwhile; ?>
            <?php endif; ?> 
        </div>
        <div class="related__activities wrapper">
            <ul class="related__activities-container">
                <?php
                    $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 3,'post_type' => 'activities', 'post__not_in' => array($post->ID) ) );
                    if( $related ) foreach( $related as $post ) {
                        setup_postdata($post); ?>
                        <a class="related__activities-activity" href="<?php the_permalink(); ?>">
                            <figure class="related__activities-img">
                                <?php the_post_thumbnail(''); ?>
                            </figure>
                            <div class="related__activities-content">
                                <h3 class="h3 related__activities-heading"><?php the_title(); ?></h3>
                                <?php get_template_part('templates/subjects-ages'); ?>
                                <?php get_template_part('templates/skills'); ?>
                            </div>
                        </a>        
                    <?php }
                    wp_reset_postdata(); 
                ?>
            </ul>
        </div>
    </section>
</main>
<?php get_footer(); ?>