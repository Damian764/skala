<?php /* Template Name: Rejestracja OSOBISTA */ ?>
<?php get_header(); ?>

<div class="banner">
    <div class="wrapper">
        <h1>Rejestracja</h1>
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
                    <span>Rejestracja</span>
                    <span aria-hidden="true" class="separator"><?php echo file_get_contents($separator[0]); ?></span>
                </li>
                <li>
                    <span aria-current="page"><?php the_title(); ?></span>
                </li>
            </ol>
        </nav>
    </div>
</div>
<main>
<div id="main" class="subpage">
    <div class="wrapper">
        <div class="inner">
            <div class="registration_contents">
                <div class="nav">
                    <h2 class="title">Dla naszych Pacjentów umożliwiamy następujące sposoby rejestracji:</h2>
                    <nav aria-label="Menu Rejestracja">
                    <?php wp_nav_menu(array(
                        'theme_location' => 'registration',
                        'container' => false,
                        'menu_class' => 'menu',
                        'link_after' => '<span><svg xmlns="http://www.w3.org/2000/svg" width="9" height="14" fill="#f26724"><path d="M1.633 0L0 1.633 5.367 7 0 12.367 1.633 14l7-7z"/></svg></span>'
                    )); ?>
                    </nav>
                </div>
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
</main>
<?php get_footer(); ?>