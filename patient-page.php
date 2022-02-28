<?php /* Template Name: Dla pacjenta */ ?>
<?php get_header(); ?>

<div class="banner">
    <div class="wrapper">
        <h1><?php the_title(); ?></h1>
        <div class="breadcrumbs">
            <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/arrow_next.svg", $separator); ?>
            <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/icon_8.svg", $icon); ?>
            <div class="icon"><?php echo file_get_contents($icon[0]); ?></div>
            <p>
                <a href="<?php echo get_home_url(); ?>">Strona główna</a>
                <span class="separator"><?php echo file_get_contents($separator[0]); ?></span>
                <?php global $post;
                if ($post->post_parent) { ?>
                    <a href="<?php echo get_the_permalink(wp_get_post_parent_id(get_the_ID())); ?>"><?php echo get_the_title(wp_get_post_parent_id(get_the_ID())); ?></a>
                    <span class="separator"><?php echo file_get_contents($separator[0]); ?></span>
                <?php } ?>
                <span><?php the_title(); ?></span>
            </p>
        </div>
    </div>
</div>
<main>
<div id="main" class="subpage">
    <div class="wrapper">
        <div class="inner">
            <div class="cols">
                <aside class="sidebar">
                    <h2 class="title">Na skróty:</h2>
                    <?php wp_nav_menu(array(
                        'theme_location' => 'patient',
                        'container' => 'nav',
                        'container_aria_label' => 'Menu boczne',
                        'menu_class' => 'menu'
                    )); ?>
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