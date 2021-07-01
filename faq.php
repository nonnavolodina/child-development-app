<?php

/* Template Name: FAQ */

get_header();  ?>

<main class="main faq wrapper">
    <h2 class="faq__heading"><?php echo the_field('page_title'); ?></h2>
    <div class="faq-accordion">
        <?php if(have_rows('faqs')):
            while (have_rows('faqs')) : the_row(); 
                $question = get_sub_field('question'); 
                $answer = get_sub_field('answer'); ?>
                    <p class="faq-accordion__question"><?php echo $question ?></p>
                    <!-- <div class="faq-accordion__answer"><?php echo $answer ?></div> -->
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
    <div class="faq__more-questions">
        <?php echo the_field('more_questions'); ?>
    </div>
</main>
<?php get_footer(); ?>
