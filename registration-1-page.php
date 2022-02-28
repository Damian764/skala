<?php /* Template Name: Rejestracja OSOBISTA */ ?>
<?php get_header(); ?>

<div class="banner">
    <div class="wrapper">
        <h1>Rejestracja</h1>
        <div class="breadcrumbs">
            <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/arrow_next.svg", $separator); ?>
            <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/icon_8.svg", $icon); ?>
            <div class="icon"><?php echo file_get_contents($icon[0]); ?></div>
            <p>
                <a href="<?php echo get_home_url(); ?>">Strona główna</a>
                <span class="separator"><?php echo file_get_contents($separator[0]); ?></span>
                <span>Rejestracja</span>
                <span class="separator"><?php echo file_get_contents($separator[0]); ?></span>
                <span><?php the_title(); ?></span>
            </p>
        </div>
    </div>
</div>
<main>
<div id="main" class="subpage">
    <div class="wrapper">
        <div class="inner">
            <div class="registration_contents">
                <div class="nav">
                    <h2 class="title">Dla naszych Pacjentów umożliwiamy następujące sposoby rejestracji:</h2>
                    <?php wp_nav_menu(array(
                        'theme_location' => 'registration',
                        'container' => false,
                        'menu_class' => 'menu',
                        'link_after' => '<span><svg xmlns="http://www.w3.org/2000/svg" width="9" height="14" fill="#f26724"><path d="M1.633 0L0 1.633 5.367 7 0 12.367 1.633 14l7-7z"/></svg></span>'
                    )); ?>
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