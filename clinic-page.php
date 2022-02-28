<?php /* Template Name: Poradnie */ ?>
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
                <div class="contents clinic_contents">
                    <div class="editor"><?php the_field("contents"); ?></div>
                </div>
            </div>
        </div>
    </div>

<?php include 'templates/news.php'; ?>
</main>
<?php get_footer(); ?>