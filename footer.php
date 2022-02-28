<footer class="footer">
    <h2 class="sr-only">Stopka</h2>
    <div class="wrapper">
        <div class="col col_1">
            <a href="<?php echo get_home_url(); ?>" class="logo">
                <?php $logo = wp_get_attachment_image_src(get_field('footer_logo', 'option'), 'medium')[0]; ?>
                <img src="<?php echo $logo; ?>" alt="logo" loading="lazy">
            </a>
            <div class="copyright"><?php the_field("footer_copyright", "option"); ?></div>
            <div class="links">
                <a href="<?php the_field("footer_bip", "option"); ?>" target="_blank" class="bip">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/bip.png" alt="BIP" loading="lazy">
                </a>
                <a href="<?php the_field("header_fb", "option"); ?>" target="_blank" class="fb">
                    <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/icon_3.svg", $i); ?>
                    <?php echo file_get_contents($i[0]); ?>
                </a>
            </div>
        </div>
        <div class="col col_2">
            <h3 class="title"><?php the_field("footer_heading_1", "option"); ?></h3>
            <div class="icons">
                <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/icon_7.svg", $i); ?>
                <?php echo file_get_contents($i[0]); ?>
                <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/icon_1.svg", $i); ?>
                <?php echo file_get_contents($i[0]); ?>                
                <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/icon_2.svg", $i); ?>
                <?php echo file_get_contents($i[0]); ?>
            </div>
            <div class="txt"><?php the_field("footer_txt_1", "option"); ?></div>
        </div>        
        <div class="col col_3">
            <h3 class="title"><?php the_field("footer_heading_2", "option"); ?></h3>
            <div class="icons">
                <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/icon_7.svg", $i); ?>
                <?php echo file_get_contents($i[0]); ?>
                <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/icon_1.svg", $i); ?>
                <?php echo file_get_contents($i[0]); ?>
            </div>
            <div class="txt"><?php the_field("footer_txt_2", "option"); ?></div>
        </div>        
        <div class="col col_4">
            <h3 class="title"><?php the_field("footer_heading_3", "option"); ?></h3>
            <div class="icons">
                <span></span>
            </div>
            <nav aria-label="Menu w stopce">
                <?php wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'container' => 'false',
                    'menu_class' => 'menu'
                )); ?>
            </nav>
        </div>
    </div>
    <?php wp_footer(); ?>
</footer>

</div>

</body>
</html>


