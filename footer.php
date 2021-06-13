        <?php if( have_rows('footer', 'option') ):
            while (have_rows('footer', 'option')) : the_row(); ?>
                <footer class="footer">
                    <div class="footer-top">
                        <div class="footer-top__container header-footer-wrapper">
                            <?php if( have_rows('top_footer') ):
                                while (have_rows('top_footer')) : the_row(); 
                                    $logo = get_sub_field('logo'); 
                                    $description = get_sub_field('description');
                                    $menu_1 = get_sub_field('menu_title_1');
                                    $menu_2 = get_sub_field('menu_title_2'); ?>
                                    <div class="footer-top__left">
                                        <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_url($logo['alt']); ?>">
                                        <p class="footer-top__text"><?php echo $description ?></p>
                                    </div>
                                    <div class="footer-top__menus">
                                        <div class="footer-top__menu">
                                            <p class="footer-top__menu-heading"><?php echo $menu_1 ?></p>
                                            <?php wp_nav_menu( array('theme_location' => 'footer_earlybird')); ?>
                                        </div>
                                        <div class="footer-top__menu">
                                            <p class="footer-top__menu-heading"><?php echo $menu_2 ?></p>
                                            <?php wp_nav_menu( array('theme_location' => 'footer_support')); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <div class="footer-bottom">
                        <div class="footer-bottom__container header-footer-wrapper">
                            <?php if( have_rows('top_footer') ):
                                while (have_rows('top_footer')) : the_row();
                                    $instagram = get_sub_field('instagram_link'); 
                                    $pinterest = get_sub_field('pinterest_link'); 
                                    $facebook = get_sub_field('facebook_link'); ?>
                                    <p class="footer-bottom__copyright">&copy; <?php echo date('Y'); ?> Earlybird Learning. All Rights Reserved.</p>
                                    <div class="footer-bottom__social-icons">
                                        <a href="<?php echo $instagram ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                                        <a href="<?php echo $pinterest?>" target="_blank"><i class="fab fa-pinterest-p"></i></a>
                                        <a href="<?php echo $facebook ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>     
                </footer>
                <?php endwhile; ?>
            <?php endif; ?>
        <?php wp_footer(); ?>
    </body>
</html>