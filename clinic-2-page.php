<?php /* Template Name: Poradnia: CIANOWICE */ ?>
<?php get_header(); ?>

<div class="banner">
    <div class="wrapper">
        <h1>Poradnie</h1>
        <nav class="breadcrumbs" aria-label="Ścieżka do strony">
            <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/arrow_next.svg", $separator); ?>
            <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/icon_8.svg", $icon); ?>
            <div class="icon"><?php echo file_get_contents($icon[0]); ?></div>
            <ol>
                <li>
                    <a href="<?php echo get_home_url(); ?>">Strona główna</a> 
                    <span aria-hidden="true" class="separator"><?php echo file_get_contents($separator[0]); ?></span>
                </li>
                <li>
                    <span>Poradnie</span>
                    <span aria-hidden="true" class="separator"><?php echo file_get_contents($separator[0]); ?></span>
                </li>
               <?php global $post;
                if ($post->post_parent) { ?>
                    <li>
                        <a href="<?php echo get_the_permalink(wp_get_post_parent_id(get_the_ID())); ?>"><?php echo get_the_title(wp_get_post_parent_id(get_the_ID())); ?></a>
                        <span aria-hidden="true" class="separator"><?php echo file_get_contents($separator[0]); ?></span>
                    </li>
                <?php } ?>
                    <li>
                        <span aria-current="page"><?php the_title(); ?></span>
                    </li>
            </ol>
        </nav>
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
                                'theme_location' => 'location_2_1',
                                'container' => 'nav',
                                'container_aria_label' => 'Menu boczne',
                                'menu_class' => 'menu'
                            )); ?>
                        </div>
                        <div class="block">
                            <h2 class="title">Poradnie specjalistyczne - NFZ:</h2>
                            <?php wp_nav_menu(array(
                                'theme_location' => 'location_2_2',
                                'container' => 'nav',
                                'container_aria_label' => 'Menu boczne',
                                'menu_class' => 'menu'
                            )); ?>
                        </div>
                        </aside>
                    <div class="contents clinic_contents">
                        <div class="intro">
                            <div class="editor"><?php the_field("intro"); ?></div>
                        </div>
                        <div class="team">
                        <h2 class="sr-only">Lista lekarzy</h2>
                            <?php if (have_rows('team')) {
                                while (have_rows('team')) {
                                    the_row(); ?>
                                    <div class="item">
                                        <p class="name"><?php the_sub_field("name"); ?></p>
                                        <p class="position"><?php the_sub_field("position"); ?></p>
                                        <?php if (get_sub_field("info")) { ?>
                                            <p class="more"><?php the_sub_field("info"); ?></p>
                                        <?php } ?>
                                    </div>
                            <?php };
                            }; ?>
                        </div>
                        <div class="editor"><h2 class="sr-only">Rejestracja i lokalizacja</h2><?php the_field("contents"); ?></div>
                        <?php if (get_field("info")) { ?>
                            <div class="info">
                                <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/icon_9.svg", $i); ?>
                                <?php echo file_get_contents($i[0]); ?>
                                <p><?php the_field("info"); ?></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'templates/news.php'; ?>
</main>
<?php get_footer(); ?>