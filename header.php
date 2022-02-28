<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset='<?php bloginfo('charset'); ?>'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title><?php echo get_bloginfo('name'); ?> <?php wp_title('|'); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="page-container">
        <ul id="skip-link" class="working">
            <li>
                <a href="#main-menu" class="element-invisible element-focusable">Przejdź do Menu Głównego</a>
            </li>
            <li>
                <a href="#main" class="element-invisible element-focusable">Przejdź do treści</a>
            </li>
            <li>
                <a href="#search_btn" class="element-invisible element-focusable">Przejdź do wyszukiwarki</a>
            </li>
        </ul>

        <header class="header">
            <div class="row_1">
                <div class="wrapper">
                    <div class="block_1">
                        <div class="contact">
                            <?php $phone = preg_replace('/[^0-9+]/', '', get_field("header_phone", "option")); ?>
                            <a href="tel:<?php echo $phone; ?>" class="link">
                                <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/icon_1.svg", $i); ?>
                                <?php echo file_get_contents($i[0]); ?>
                                <span><?php the_field("header_phone", "option"); ?></span>
                            </a>
                            <a href="mailto:<?php the_field("header_email", "option"); ?>" class="link">
                                <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/icon_2.svg", $i); ?>
                                <?php echo file_get_contents($i[0]); ?>
                                <span><?php the_field("header_email", "option"); ?></span>
                            </a>
                        </div>
                    </div>
                    <div class="block_2">
                        <nav aria-label="Górne menu">
                            <?php wp_nav_menu(array(
                                'theme_location' => 'nav_1',
                                'container' => false,
                                'menu_class' => 'menu'
                            )); ?>
                        </nav>
                        <div class="wcag_buttons">
                            <ul style="display:flex;">
                                <li>
                                    <a href="<?php the_field("header_translator", "option") ?>" target="_blank" class="bip">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/dlonie_biale_tlo.jpg" alt="Tłumacz Online - PZG Oddział Mazowiecki" loading="lazy" width="49px">
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php the_field("header_bip", "option"); ?>" target="_blank" class="bip">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/bip.png" alt="Biuletyn Informacji Publicznej" loading="lazy">
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php the_field("header_fb", "option"); ?>" target="_blank" class="fb">
                                        <span class="sr-only">Nasze konto na Facebooku</span>
                                        <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/icon_3.svg", $i); ?>
                                        <?php echo file_get_contents($i[0]); ?>
                                    </a>
                                </li>
                            </ul>

                            <button id="big-letter" class="letter">
                                <img aria-hidden="true" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/letter-a.png" alt="" loading="lazy">
                                <span class="sr-only" id="smallerText">Pomniejsz rozmiar czcionki</span>
                            </button>
                            <button id="small-letter" class="letter">
                                <img aria-hidden="true" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/letter-a.png" alt="" loading="lazy">
                                <span class="sr-only" id="biggerText">Powiększ rozmiar czcionki</span>
                            </button>
                            <button id="contrast">
                                <img aria-hidden="true" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/eye-solid.svg" alt="" loading="lazy">
                                <span class="sr-only" id="contrastText">Przejdź do wersji kontrastowej</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row_2">
                <div class="wrapper">
                    <div class="block_1">
                        <?php if (is_home() || is_front_page()) : ?>
                            <h1 class="logo">
                                <a href="<?php echo get_home_url(); ?>">
                                    <?php $logo = wp_get_attachment_image_src(get_field('header_logo', 'option'), 'medium')[0]; ?>
                                    <img src="<?php echo $logo; ?>" alt="Samodzielny Publiczny Zakład Opieki Zdrowotnej w Skale - Strona główna" loading="lazy">
                                </a>
                            </h1>
                        <?php else : ?>
                            <div class="logo">
                                <a href="<?php echo get_home_url(); ?>">
                                    <?php $logo = wp_get_attachment_image_src(get_field('header_logo', 'option'), 'medium')[0]; ?>
                                    <img src="<?php echo $logo; ?>" alt="Samodzielny Publiczny Zakład Opieki Zdrowotnej w Skale - Strona główna" loading="lazy">
                                </a>
                            </div>
                        <?php endif ?>
                    </div>
                    <div class="block_2">
                        <a href="#" class="search_btn" id="search_btn">
                            <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/icon_4.svg", $i); ?>
                            <?php echo file_get_contents($i[0]); ?>
                            <span class="sr-only">Wyszukaj frazę. Po naciśnięciu klawisza Enter otworzy się wyszukiwarka.</span>
                        </a>
                        <div class="container">
                            <form action="<?php echo get_home_url('/'); ?>" method="get" role="search" class="search">
                                <input type="text" name="s" placeholder="szukaj" value="<?php echo get_search_query() ?>">
                                <button type="submit">
                                    <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/icon_4.svg", $i); ?>
                                    <?php echo file_get_contents($i[0]); ?>
                                </button>
                            </form>
                            <nav class="nav" id="main-menu" aria-label="Główna nawigacja">
                                <?php wp_nav_menu(array(
                                    'theme_location' => 'nav_2',
                                    'container' => false,
                                    'menu_class' => 'menu'
                                )); ?>
                            </nav>
                        </div>
                    </div>
                    <div class="toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="row_3">
                <div class="wrapper">
                    <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/icon_5.svg", $i); ?>
                    <?php echo file_get_contents($i[0]); ?>
                    <ul class="posts" aria-label="Ważne linki">
                        <?php $args = array(
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'posts_per_page' => 3,
                            'orderby' => 'date',
                            'order' => 'DESC'
                        );
                        $q = new WP_Query($args);
                        if ($q->have_posts()) {
                            while ($q->have_posts()) {
                                $q->the_post();
                                $txt = str_word_count(get_the_title()) > 9 ? implode(' ', array_slice(explode(' ', get_the_title()), 0, 9)) . "..." : get_the_title(); ?>
                                <li>
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo $txt; ?></a>
                                </li>
                        <?php };
                        }
                        wp_reset_postdata(); ?>
                    </ul>
                </div>
            </div>
        </header>