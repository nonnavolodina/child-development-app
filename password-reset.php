<?php /* Template Name: Password Reset */   ?>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Earlybird - Password Reset</title>
    <link rel="stylesheet" href="https://use.typekit.net/pkr2svi.css" />
    <style>
        body {
            margin: 0;
        }
        .login {
            display: flex;
        }

        @media only screen and (max-width: 1024px) {
            .login {
                flex-direction: column;
                justify-content: center;
                height: 100%;
            }
        }

        .login__form {
            width: 40%;
            padding: 82px 82px 0 82px;
        }

        @media only screen and (max-width: 1024px) {
            .login__form {
                width: 85%;
                padding: 0 45px;
            }
        }

        .form {
            display: flex;
            flex-direction: column;
            height: calc(100% - 82px);
            justify-content: center;
        }

        #user_login {
            background-image: url('https://earlybird.local/wp-content/uploads/2021/07/User.png');
            background-repeat: no-repeat;
            background-position: left 15px center;
            
        }

        #user_pass {
            background-image: url('https://earlybird.local/wp-content/uploads/2021/07/Key.png');
            background-repeat: no-repeat;
            background-position: left 15px center;
        }

        .login-username,
        .login-password,
        .login-submit {
            display: flex;
            flex-direction: column;
            width: 100%;
            font-family: 'Navigo', sans-serif;
            font-weight: 400;
            font-style: normal;
            font-size: 18px;
            line-height: 27.63px;
            letter-spacing: 0.04%;
            color: #1a3870;
        }

        .login-password {
            margin-top: 28px;
        }

        .input[type="text"],
        .input[type="password"] {
            height: 56px;
            border-radius: 4px;
            border: 2px solid #b1d1e4;
            margin-top: 8px;
            font-family: 'Navigo', sans-serif;
            font-weight: 400;
            font-style: normal;
            font-size: 18px;
            line-height: 27.63px;
            letter-spacing: 0.04%;
            color: #1a3870;
            padding-left: 50px;
        }

        .input[type="text"]:focus,
        .input[type="password"]:focus {
            border: 2px solid #3b73b6;
            outline: none !important;
            padding-left: 50px;
        }

        .login-remember label {
            font-family: 'Navigo', sans-serif;
            font-weight: 400;
            font-style: normal;
            font-size: 14px;
            line-height: 21.49px;
            color: #1a3870;
        }

        #rememberme {
            border: 1px solid #D9D4E7;
        }

        #wp-submit {
            color: white;
            border-radius: 4px;
            background: #3b73b6;
            height: 56px;
            border: none;  
            font-family: 'Navigo', sans-serif;
            font-weight: 400;
            font-style: normal;
            font-size: 18px;
        }

        .login__background {
            width: 60%;
        }

        @media only screen and (max-width: 1024px) {
            .login__background{
                display: none;
            }
        }

        .login__background-container {
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh;
        }

        .links {
            display: flex;
            justify-content: space-between;
        }

        .links a {
            color: #3b73b6;
            font-family: 'Navigo', sans-serif;
            font-weight: 400;
            font-style: normal;
            font-size: 14px;
            line-height: 21.49px;
            letter-spacing: 0.04%;
            text-decoration: none;
        }

        #lostpasswordform p {
            display: flex;
            flex-direction: column;
            font-family: 'Navigo', sans-serif;
            font-weight: 400;
            font-style: normal;
            font-size: 18px;
            line-height: 27.63px;
            letter-spacing: 0.04%;
            color: #1a3870;
        }
    }
    </style>
</head>
<main class="main login">
    <div class="login__form header-footer-wrapper">
        <?php 
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
            echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
        ?>
        <div class="form">
            <form name="lostpasswordform" id="lostpasswordform" action="<?php echo esc_url( network_site_url( 'wp-login.php?action=lostpassword', 'login_post' ) ); ?>" method="post">
                <p>
                    <label for="user_login"><?php _e( 'Username or Email Address' ); ?></label>
                    <input type="text" name="user_login" id="user_login" class="input" value="<?php echo esc_attr( $user_login ); ?>" size="20" autocapitalize="off" />
                </p>
                <?php

                /**
                 * Fires inside the lostpassword form tags, before the hidden fields.
                 *
                 * @since 2.1.0
                 */
                do_action( 'lostpassword_form' );

                ?>
                <input type="hidden" name="redirect_to" value="<?php echo esc_attr( 'check-email' ); ?>" />
                <p class="submit">
                    <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="<?php esc_attr_e( 'Get New Password' ); ?>" />
                </p>
            </form>
        </div>
    </div>
    <?php if( have_rows('login_page', 'option') ):
        while (have_rows('login_page', 'option')) : the_row();
        $image = get_sub_field('background'); ?>
            <div class="login__background">
                <div class="login__background-container" style="background-image: url('<?php echo esc_url($image['url']); ?>"></div>
            </div>
        <?php endwhile;
    endif; ?>

</main>


