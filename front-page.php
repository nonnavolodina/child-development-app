<?php get_header(); ?>
<main class="homepage">
    <section class="hero">
        <div class="wrapper">
            <p class="hero__tagline">Learn with us</p>
            <h1 class="hero__heading">Easy, low prep activities for early childhood development.</h1>
            <button class="btn btn--fill">Join us</button>
        </div>
    </section>
    <section class="information">
        <h2 class="information__heading">Playful learning with purpose</h2>
        <p class="information__description">All of our activities are designed to build children’s foundational literacy and numeracy knowledge and develop motor, social-emotional and creative thinking skills. Activities require little preparation and use everyday items making them easy for busy parents and caregivers to get kids engaged and learning. Each activity is developmentally appropriate for a range of ages 6m to 5 years.</p>
        <div class="information__details">
            <div class="information__detail">
                <span class="blue-circle"></span>
                <p class="tagline">ZERO OR LOW PREP</p>
            </div>
            <div class="information__detail">
                <span class="blue-circle"></span>
                <p class="tagline">AGES 6M - 5Y</p>
            </div>
            <div class="information__detail">
                <span class="blue-circle"></span>
                <p class="tagline">CURRICULUM BASED</p>
            </div>
        </div>
        <button class="btn btn--fill">Join us</button>
    </section>
    <section class="wwc" style="background-image:url('<?php bloginfo('template_url')?>/images/wwc-background.png');">
        <p class="wwc__tagline">WHAT WE COVER</p>
        <div class="wwc__content wrapper">
            <p>Literacy</p>
            <p>Numeracy</p>
            <p>Art</p>
            <p>Motor</p>
            <p>Social + Emotional</p>
        </div>
    </section>
    <section class="curriculum wrapper">
        <div class="curriculum__container">
            <div class="curriculum__inner-container">
                <h2 class="curriculum__heading">Our curriculum</h2>
                <p class="curriculum__description">Yes, children need to develop the pre-academic skills that will make them readers, writers and strong communicators (literacy). They also need to build a foundation that enables them to solve math problems, conduct experiments, and understand time, money and shapes (numeracy).</p>
                <p class="curriculum__description">But successful learners need to master more than content. A child’s motor (eg. physical development), social-emotional (eg. self-regulation, empathy and theory of mind), and creative (eg. imagination and self expression) development is of equal, and at times greater, importance.</p>
                <p class="curriculum__description">When children develop the ability to explore their environment, be resourceful about the materials that they engage with, and think flexibly, they are better equipped to tackle any new content they’re exposed to.</p>
            </div>
            <img class="curriculum__img" src="<?php bloginfo('template_url')?>/images/boy_learning.png" alt="">
        </div>
        <div class="curriculum__container">
            <img class="curriculum__img" src="<?php bloginfo('template_url')?>/images/woman.png" alt="">
            <div class="curriculum__inner-container">
                <h2 class="curriculum__heading">Expertly designed</h2>
                <p class="curriculum__description">Our activities are designed by Renee, a teacher, curriculum designer and mother of two. She has degrees in education, child development and instructional design from the University of Victoria and Columbia University. She has worked with children and families in Canada and the United States to conduct learning assessments, devise learning plans and create resources to target key skills. </p>
            </div>
        </div>
    </section>
    <section class="learning-platform">
        <div class="learning-platform__container inner-wrapper">
            <img src="<?php bloginfo('template_url')?>/images/placeholder.png" alt="" class="learning-platform__img">
            <div class="learning-platform__content">
                <h2 class="learning-platform__heading">The learning platform</h2>
                <p class="learning-platform__description">We have designed an online space for you to easily find activities to engage your child. Filter resource by subject, skills, and ages. Save your favourite activities. Engaging in activities again and again will build your child’s ability to attend to tasks for longer and longer intervals. You’ll also be surprised at how their engagement with that activity changes over time.</p>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>