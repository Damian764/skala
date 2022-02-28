<?php /* Template Name: Lokalizacja: SKAŁA */ ?>
<?php get_header(); ?>

<div class="banner">
    <div class="wrapper">
        <h1>Poradnie</h1>
        <div class="breadcrumbs">
            <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/arrow_next.svg", $separator); ?>
            <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/icon_8.svg", $icon); ?>
            <div class="icon"><?php echo file_get_contents($icon[0]); ?></div>
            <p>
                <a href="<?php echo get_home_url(); ?>">Strona główna</a>
                <span class="separator"><?php echo file_get_contents($separator[0]); ?></span>
                <span>Poradnie</span>
                <span class="separator"><?php echo file_get_contents($separator[0]); ?></span>
                <span><?php the_title(); ?></span>
            </p>
        </div>
        <nav class="nav" aria-label="Nasze poradnie">
            <?php wp_nav_menu(array(
                'theme_location' => 'locations',
                'container' => false,
                'menu_class' => 'menu',
                'link_after' => '<span></span>'
            )); ?>
        </nav>
    </div>
</div>
<main>
    <div id="main" class="subpage">
        <div class="wrapper">
            <div class="inner">
                <div class="cols">
                    <aside class="sidebar">
                        <div class="block">
                            <h2 class="title">Podstawowa Opieka Zdrowotna:</h2>
                            <?php wp_nav_menu(array(
                                'theme_location' => 'location_1_1',
                                'container' => 'nav',
                                'container_aria_label' => 'Menu boczne',
                                'menu_class' => 'menu'
                            )); ?>
                        </div>
                        <div class="block">
                            <h2 class="title">Poradnie specjalistyczne - NFZ:</h2>
                            <?php wp_nav_menu(array(
                                'theme_location' => 'location_1_2',
                                'container' => 'nav',
                                'container_aria_label' => 'Menu boczne',
                                'menu_class' => 'menu'
                            )); ?>
                        </div>
                        <div class="block">
                            <h2 class="title">Poradnie specjalistyczne – płatne:<h2>
                            <?php wp_nav_menu(array(
                                'theme_location' => 'location_1_3',
                                'container' => 'nav',
                                'container_aria_label' => 'Menu boczne',
                                'menu_class' => 'menu'
                            )); ?>
                        </div>
                    </aside>
                    <div class="contents">
                        <div class="editor">
                            <?php while (have_posts()) {
                                the_post();
                                the_content();
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'templates/news.php'; ?>
</main>
<?php get_footer(); ?>