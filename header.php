<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>
</head>
<body>
    <header class="header wrapper">
        <nav class="header__nav">
            <a href="<?php echo get_home_url(); ?>">
                <img src="<?php bloginfo('template_url')?>/images/logo.png" alt="">
            </a>
            <div class="header__menu">
                <?php wp_nav_menu( array('theme_location' => 'primary')); ?>
                <button class="btn btn--outline">Login</button>
                <button class="btn btn--fill">Join us</button>
            </div>
        </nav>
    </header>

