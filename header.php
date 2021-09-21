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
    <script>
        (function(w, d, t, s, n) {
            w.FlodeskObject = n;
            var fn = function() {
            (w[n].q = w[n].q || []).push(arguments);
            };
            w[n] = w[n] || fn;
            var f = d.getElementsByTagName(t)[0];
            var e = d.createElement(t);
            var h = '?v=' + new Date().getTime();
            e.async = true;
            e.src = s + h;
            f.parentNode.insertBefore(e, f);
        })(window, document, 'script', 'https://assets.flodesk.com/universal.js', 'fd');
    </script>
    <?php wp_head(); ?>
</head>
<body>
    <header class="header">
        <nav class="header__nav header-footer-wrapper">
            <div class="mobile-container">
                <a href="<?php echo get_home_url(); ?>">
                    <?php 
                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                        echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
                    ?>
                </a>
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
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
                <div class="header__menu header__menu--mobile header__menu--mobile-logged-in">
                    <?php wp_nav_menu( array('theme_location' => 'primary_logged-in')); ?>
                </div>
            <?php } else { ?>
                <div class="header__menu">
                    <?php wp_nav_menu( array('theme_location' => 'primary_logged-out')); ?>
                </div>
                <div class="header__menu header__menu--mobile">
                    <?php wp_nav_menu( array('theme_location' => 'primary_logged-out')); ?>
                </div>
            <?php } ?>
        </nav>
    </header>

