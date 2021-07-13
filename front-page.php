<?php get_header(); ?>
<main class="main homepage">
    <?php if ( !is_user_logged_in() ) { ?>
        <?php if(have_rows('hero_slider')):
            while (have_rows('hero_slider')) : the_row();
                $background_image = get_sub_field('background_image');
                $background_colour = get_sub_field('background_colour');
                $subheading = get_sub_field('subheading');
                $heading = get_sub_field('heading');
                $CTA = get_sub_field('cta');
                $is_slider = get_row_index();
                if($is_slider >= 1): ?>
                    <section class="hero hero--slider" style="<?php if(!empty($background_image)): ?>background-image: url('<?php echo $background_image ?>') <?php else: ?>background-color: <?php echo $background_colour?> <?php endif; ?>;">
                        <div class="wrapper">
                            <p class="hero__subheading"><?php echo $subheading ?></p>
                            <h1 class="hero__heading"><?php echo $heading ?></h1>
                            <button class="btn btn--fill"><?php echo $CTA ?></button>
                        </div>
                    </section>
                <?php else: ?>
                    <section class="hero hero--slider" style="<?php if(!empty($background_image)): ?>background-image: url('<?php echo $background_image ?>') <?php else: ?>background-color: <?php echo $background_colour?> <?php endif; ?>;">
                        <div class="wrapper">
                            <p class="hero__subheading"><?php echo $subheading ?></p>
                            <h1 class="hero__heading"><?php echo $heading ?></h1>
                            <button class="btn btn--fill"><?php echo $CTA ?></button>
                        </div>
                    </section>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    <?php } ?>

    <?php if ( is_user_logged_in() ) { ?>
        <section class="activities-carousel">
            <div class="wrapper">
                <div class="activities">
                    <?php $args = array(  
                        'post_type' => 'activities',
                        'posts_per_page' => 3, 
                        'order' => 'ASC', 
                    );
    
                    $loop = new WP_Query( $args ); 
                        
                    while ( $loop->have_posts() ) : $loop->the_post(); ?>
                        <article class="activity">
                            <figure class="activity__image">
                                <?php the_post_thumbnail('full'); ?>
                            </figure>
                            <div class="activity__content">
                                    <h3 class="h3 activity__heading"><?php the_title(); ?></h3>
                                    <?php get_template_part('templates/subjects-ages'); ?>
                                    <div class="activity__description"><?php the_excerpt(); ?></div>
                                    <?php get_template_part('templates/skills'); ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <button class="btn btn--fill">View activity</button>
                                    </a>
                                </div>
                        </article>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div> 
            </div>
        </section>
    <?php } ?>
    
    <?php if ( is_user_logged_in() ) { ?>
        <?php if(have_rows('activities_by_subject')):
            while (have_rows('activities_by_subject')) : the_row(); 
                $heading = get_sub_field('heading'); ?>
                <section class="activities wrapper">
                    <div class="activities__subject">
                        <h2 class="activities__subject-heading"><?php echo $heading ?></h2>
                        <div class="subjects">
                        <?php if(have_rows('subjects')):
                            while (have_rows('subjects')) : the_row();
                                $icon = get_sub_field('icon');
                                $background = get_sub_field('background_colour');
                                $subject = get_sub_field('subject_title');
                                $link = get_sub_field('link'); ?>
                                <div class="subject" style="background: <?php echo $background ?>;">
                                    <a href="<?php echo $link ?>" target="">
                                        <img src="<?php echo $icon['url'] ?>" alt="<?php echo $icon['alt'] ?>" class="subject__icon">
                                        <p class="subject__title"><?php echo $subject ?></p>
                                    </a>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        </div>
                        <div class="activities__age">
                        <?php if(have_rows('activities_by_age')):
                            while (have_rows('activities_by_age')) : the_row();  
                                $heading = get_sub_field('heading'); 
                                $description = get_sub_field('description');
                                $CTA =  get_sub_field('cta_text');
                                $link = get_sub_field('link'); ?>
                                <h2 class="activities__age-heading"><?php echo $heading ?></h2>
                                <p class="activities__age-description"><?php echo $description ?></p>
                                <div class="ages">
                                    <?php if(have_rows('ages')):
                                        while (have_rows('ages')) : the_row(); 
                                            $age = get_sub_field('age'); 
                                            $link = get_sub_field('link'); ?>
                                            <div class="age">
                                                <a href="<?php echo $link ?>" target="">
                                                    <button><?php echo $age ?></button>
                                                </a>
                                            </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>   
                                </div>
                                <?php if(have_rows('cta')):
                                    while (have_rows('cta')) : the_row();
                                        $CTA =  get_sub_field('cta_text');
                                        $link = get_sub_field('link'); ?>  
                                        <a href="<?php echo $link ?>" target="">
                                            <button class="btn btn--fill"><?php echo $CTA ?></button>
                                        </a>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        </div>
                    </div>
                </section>
            <?php endwhile; ?>
        <?php endif; ?>
    <?php } ?>

    <?php if ( is_user_logged_in() ) { ?>
        <section class="shop">
            <div class="wrapper">
                <?php $shop = get_field('from_the_shop');
                if($shop): ?>
                    <h2><?php echo $shop['heading']; ?></h2>
                <?php endif; ?>
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
            </div>
        </section>
    <?php } ?>

    <?php if ( !is_user_logged_in() ) { ?>
        <?php if(have_rows('information')):
            while (have_rows('information')) : the_row();
                $heading = get_sub_field('heading');
                $description = get_sub_field('description');
                $CTA = get_sub_field('cta_text'); ?>
                <section class="information">
                    <div class="wrapper">
                        <h2 class="information__heading"><?php echo $heading ?></h2>
                        <p class="information__description"><?php echo $description ?></p>
                        <div class="information__details">
                            <?php if(have_rows('information_detail')):
                                while (have_rows('information_detail')) : the_row();
                                    $detail_tagline = get_sub_field('detail_tagline'); ?>
                                    <div class="information__detail">
                                        <span class="blue-circle"></span>
                                        <p class="subheading"><?php echo $detail_tagline ?></p>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                        <button class="btn btn--fill"><?php echo $CTA ?></button>
                    </div>
                </section>
            <?php endwhile; ?>
        <?php endif; ?>
    <?php } ?>
    
    <?php if ( !is_user_logged_in() ) { ?>
        <?php if(have_rows('what_we_cover')):
            while (have_rows('what_we_cover')) : the_row();
                $heading = get_sub_field('heading'); ?>
                <section class="wwc" style="background-image:url('<?php bloginfo('template_url')?>/images/wwc-background.png');">
                    <p class="wwc__subheading"><?php echo $heading ?></p>
                    <div class="wwc__content wrapper">
                    <?php if(have_rows('covered_subjects')):
                        while (have_rows('covered_subjects')) : the_row();
                            $subjects = get_sub_field('subjects'); ?>
                            <p><?php echo $subjects ?></p>
                        <?php endwhile; ?>    
                    <?php endif; ?>
                    </div>
                </section>
            <?php endwhile; ?>
        <?php endif; ?>
    <?php } ?>
    
    <?php if ( !is_user_logged_in() ) { ?>
        <section class="curriculum-expertly template-lr wrapper">
            <?php if(have_rows('curriculum_section')):
                while (have_rows('curriculum_section')) : the_row();
                    $heading = get_sub_field('heading');
                    $description = get_sub_field('description');
                    $image = get_sub_field('image');
                    $position = get_sub_field('image_position'); ?>
                    <div class="template-lr__container <?php if($position == 'left'): ?>template-lr__container--reverse <?php endif; ?>">
                        <div class="template-lr__inner-container">
                            <h2 class="template-lr__heading"><?php echo $heading ?></h2>
                            <div class="template-lr__description"><?php echo $description ?></div>
                        </div>
                        <figure class="template-lr__img">
                            <img class="" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_url($image['alt']); ?>">
                        </figure>    
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </section>
    <?php } ?>
    
    <?php if ( !is_user_logged_in() ) { ?>
        <?php if(have_rows('learning_platform_section')):
            while (have_rows('learning_platform_section')) : the_row();
                $image = get_sub_field('image');
                $heading = get_sub_field('heading');
                $description = get_sub_field('description'); ?>
                <section class="learning-platform">
                    <div class="learning-platform__container wrapper">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_url($image['alt']); ?> class="learning-platform__img">
                        <div class="learning-platform__content">
                            <h2 class="learning-platform__heading"><?php echo $heading ?></h2>
                            <p class="learning-platform__description"><?php echo $description ?></p>
                        </div>
                    </div>
                </section>
            <?php endwhile; ?>
        <?php endif; ?>
    <?php } ?>

    <?php if ( !is_user_logged_in() ) { ?>        
        <section class="play-age template-lr wrapper">
            <?php if(have_rows('learning_section')):
                while (have_rows('learning_section')) : the_row();
                    $heading = get_sub_field('heading');
                    $description = get_sub_field('description');
                    $image = get_sub_field('image');
                    $position = get_sub_field('image_position'); ?>
                    <div class="template-lr__container <?php if($position == 'left'): ?>template-lr__container--reverse <?php endif; ?>">
                        <div class="template-lr__inner-container">
                            <h2 class="template-lr__heading"><?php echo $heading ?></h2>
                            <div class="template-lr__description"><?php echo $description ?></div>
                        </div>
                        <div class="template-lr__img">
                            <img class="" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_url($image['alt']); ?>">
                        </div> 
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </section>
    <?php } ?>

    <?php if ( !is_user_logged_in() ) { ?>
        <section class="sign-up">
            <?php if(have_rows('sign_up_section')):
                while (have_rows('sign_up_section')) : the_row();
                    $heading = get_sub_field('heading'); 
                    $disclaimer = get_sub_field('disclaimer'); ?>
                    <h2 class="sign-up__heading"><?php echo $heading ?></h2> 
                    <div class="sign-up__content wrapper">
                        <div class="sign-up__rates">
                            <div class="sign-up__rate-cards">
                                <?php if(have_rows('rate_cards')):
                                    while (have_rows('rate_cards')) : the_row();
                                        $rate_heading = get_sub_field('heading');
                                        $price = get_sub_field('price'); 
                                        $price_description = get_sub_field('price_description'); 
                                        $CTA = get_sub_field('cta'); 
                                        $discount = get_sub_field('discount'); ?>
                                        <div class="sign-up__rate-card">
                                            <?php if($discount != null): ?>
                                                <span class="sign-up__rate-card-discount"><?php echo $discount ?></span>
                                            <?php endif; ?>
                                            <p class="sign-up__rate-card-heading"><?php echo $rate_heading ?></p>
                                            <p class="sign-up__rate-card-price">$<?php echo $price ?></p>
                                            <small class="sign-up__rate-card-price-desc"><?php echo $price_description ?></small>
                                            <button class="btn btn--fill"><?php echo $CTA ?></button>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>    
                            </div>
                        </div>
                        <div class="sign-up__info">
                            <?php if(have_rows('information')):
                                while (have_rows('information')) : the_row();
                                    $heading = get_sub_field('heading'); ?>
                                    <p class="sign-up__info-heading"><?php echo $heading ?></p>  
                                    <ul class="sign-up__info-list">
                                        <?php if(have_rows('info_list')):
                                            while (have_rows('info_list')) : the_row();
                                                $info_list_item = get_sub_field('info_list_item'); ?>
                                                <li><?php echo $info_list_item ?></li>
                                            <?php endwhile; ?>
                                        <?php endif; ?>   
                                    </ul>
                                <?php endwhile; ?>
                            <?php endif; ?> 
                        </div>
                    </div>
                    <div class="sign-up__disclaimer wrapper"><?php echo $disclaimer ?></div>
                <?php endwhile; ?>
            <?php endif; ?>   
        </section>
    <?php } ?>

    <?php get_template_part('templates/instagram'); ?>
    <?php get_template_part('templates/newsletter'); ?>
</main>
<?php get_footer(); ?>