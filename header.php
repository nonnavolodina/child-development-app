<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        window.onUsersnapCXLoad = function(api) {
            api.init();
        }
        var script = document.createElement('script');
        script.async = 1;
        script.src = 'https://widget.usersnap.com/load/56f86d32-2875-43f2-bfe6-2b02ecdd5f92?onload=onUsersnapCXLoad';
        document.getElementsByTagName('head')[0].appendChild(script);
    </script>
    <?php wp_head(); ?>
</head>
<body>
    <header class="header wrapper">
        <nav class="header__nav">
            <a href="<?php echo get_home_url(); ?>">
                <?php 
                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                    $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                    echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
                ?>
            </a>
            <?php if ( is_user_logged_in() ) { ?>
                <div class="header__menu">
                    <?php wp_nav_menu( array('theme_location' => 'primary_logged-in')); ?>
                    <?php if( have_rows('logged_out_header', 'option') ):
                        while (have_rows('logged_out_header', 'option')) : the_row();
                            $primary_button = get_sub_field('primary_button');
                            $secondary_button = get_sub_field('secondary_button'); ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            <?php } else { ?>
                <div class="header__menu">
                    <?php wp_nav_menu( array('theme_location' => 'primary_logged-out')); ?>
                    <?php if( have_rows('logged_out_header', 'option') ):
                        while (have_rows('logged_out_header', 'option')) : the_row();
                            $primary_button = get_sub_field('primary_button');
                            $secondary_button = get_sub_field('secondary_button'); ?>
                            <button class="btn btn--fill"><?php echo $primary_button ?></button>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            <?php } ?>
        </nav>
    </header>

