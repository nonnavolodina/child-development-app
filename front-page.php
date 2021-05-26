<?php get_header(); ?>
<main class="homepage">
    <?php if(have_rows('hero_slider')):
        while (have_rows('hero_slider')) : the_row();
            $background_image = get_sub_field('background_image');
            $background_colour = get_sub_field('background_colour');
            $subheading = get_sub_field('subheading');
            $heading = get_sub_field('heading');
            $CTA = get_sub_field('cta');
            $is_slider = get_row_index();
            if($is_slider >= 1): ?>
                <section class="hero hero--slider" style="<?php if(!empty($background_image)): ?>background-image: url('<?php echo $background_image ?>') <?php else: ?>background-image: <?php echo $background_colour?> <?php endif; ?>;">
                    <div class="wrapper">
                        <p class="hero__subheading"><?php echo $subheading ?></p>
                        <h1 class="hero__heading"><?php echo $heading ?></h1>
                        <button class="btn btn--fill"><?php echo $CTA ?></button>
                    </div>
                </section>
            <?php else: ?>
                <section class="hero hero--slider" style="<?php if(!empty($background_image)): ?>background-image: url('<?php echo $background_image ?>') <?php else: ?>background-image: <?php echo $background_colour?> <?php endif; ?>;">
                    <div class="wrapper">
                        <p class="hero__subheading"><?php echo $subheading ?></p>
                        <h1 class="hero__heading"><?php echo $heading ?></h1>
                        <button class="btn btn--fill"><?php echo $CTA ?></button>
                    </div>
                </section>
            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>
    
    <?php if(have_rows('information')):
        while (have_rows('information')) : the_row();
            $heading = get_sub_field('heading');
            $description = get_sub_field('description');
            $CTA = get_sub_field('cta_text'); ?>
            <section class="information">
                <h2 class="h2 h2--medium information__heading"><?php echo $heading ?></h2>
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
            </section>
        <?php endwhile; ?>
    <?php endif; ?>

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

    <section class="template-lr wrapper">
        <?php if(have_rows('curriculum_section')):
            while (have_rows('curriculum_section')) : the_row();
                $heading = get_sub_field('heading');
                $description = get_sub_field('description');
                $image = get_sub_field('image');
                $position = get_sub_field('image_position'); ?>
                <div class="template-lr__container <?php if($position == 'left'): ?>template-lr__container--reverse <?php endif; ?>">
                    <div class="template-lr__inner-container">
                        <h2 class="h2 h2--medium template-lr__heading"><?php echo $heading ?></h2>
                        <div class="template-lr__description"><?php echo $description ?></div>
                    </div>
                    <img class="template-lr__img" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_url($image['alt']); ?>">
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>
    
    <?php if(have_rows('learning_platform_section')):
            while (have_rows('learning_platform_section')) : the_row();
                $image = get_sub_field('image');
                $heading = get_sub_field('heading');
                $description = get_sub_field('description'); ?>
                <section class="learning-platform">
                    <div class="learning-platform__container inner-wrapper">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_url($image['alt']); ?> class="learning-platform__img">
                        <div class="learning-platform__content">
                            <h2 class="h2 h2--medium learning-platform__heading"><?php echo $heading ?></h2>
                            <p class="learning-platform__description"><?php echo $description ?></p>
                        </div>
                    </div>
                </section>
        <?php endwhile; ?>
    <?php endif; ?>

    <section class="template-lr wrapper">
        <?php if(have_rows('learning_section')):
            while (have_rows('learning_section')) : the_row();
                $heading = get_sub_field('heading');
                $description = get_sub_field('description');
                $image = get_sub_field('image');
                $position = get_sub_field('image_position'); ?>
                <div class="template-lr__container <?php if($position == 'left'): ?>template-lr__container--reverse <?php endif; ?>">
                    <div class="template-lr__inner-container">
                        <h2 class="h2 h2--medium template-lr__heading"><?php echo $heading ?></h2>
                        <div class="template-lr__description"><?php echo $description ?></div>
                    </div>
                    <img class="template-lr__img" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_url($image['alt']); ?>">
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>

    <section class="sign-up">
        <h2 class="h2 h2--large sign-up__heading">Sign up for Earlybird</h2>
        <div class="sign-up__content wrapper">
            <div class="sign-up__rates">
                <div class="sign-up__rate-cards">
                    <div class="sign-up__rate-card sign-up__rate-card--extra">
                        <p class="sign-up__rate-card-heading">Annual</p>
                        <p class="sign-up__rate-card-price">$72</p>
                        <small class="sign-up__rate-card-price-desc">$6 USD / month</small>
                        <button class="btn btn--fill">Join us</button>
                    </div>
                    <div class="sign-up__rate-card">
                        <p class="sign-up__rate-card-heading">Monthly</p>
                        <p class="sign-up__rate-card-price">$8</p>
                        <small class="sign-up__rate-card-price-desc">USD / month</small>
                        <button class="btn btn--fill">Join us</button>
                    </div>
                </div>
            </div>
            <div class="sign-up__info">
                <p class="sign-up__info-heading">Get unlimited access to:</p>
                <ul class="sign-up__info-list">
                    <li>Over 100 low prep video and printable activities.</li>
                    <li>1-2 new activities uploaded each week.</li>
                    <li>Members only newsletter with tips, resources, and bonus activities.</li>
                    <li>Livestream activities with Renee.</li>
                </ul>
            </div>
        </div>
        <p class="sign-up__disclaimer">Can't afford a subscription? <a href="/contact">Contact us.</a></p>
    </section>
    <?php get_template_part('templates/instagram'); ?>
</main>
<?php get_footer(); ?>