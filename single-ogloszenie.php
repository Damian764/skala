<?php get_header(); ?>

<div class="banner">
    <div class="wrapper">
        <h1>Ogłoszenia</h1>
        <nav class="breadcrumbs" aria-label="Ścieżka do strony">
            <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/arrow_next.svg", $separator); ?>
            <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/icon_8.svg", $icon); ?>
            <div class="icon"><?php echo file_get_contents($icon[0]); ?></div>
            <ol>
                <li>
                    <a href="<?php echo get_home_url(); ?>">Strona główna</a>
                    <span aria-hidden="true" class="separator"><?php echo file_get_contents($separator[0]); ?></span>
                </li>

                <?php $l = get_field("ad_link", "option"); ?>
                <li>
                    <a href="<?php echo $l["url"]; ?>"><?php echo $l["title"]; ?></a>
                    <span aria-hidden="true" class="separator"><?php echo file_get_contents($separator[0]); ?></span>
                <li>
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
                <div class="editor">
                    <?php while (have_posts()) {
                        the_post();
                        the_content();
                    } ?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include 'templates/news.php'; ?>

<?php get_footer(); ?>