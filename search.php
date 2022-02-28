<?php get_header(); ?>

<div class="banner">
    <div class="wrapper">
        <h2>Wyniki wyszukiwania</h2>
        <div class="breadcrumbs">
            <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/arrow_next.svg", $separator); ?>
            <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/icon_8.svg", $icon); ?>
            <div class="icon"><?php echo file_get_contents($icon[0]); ?></div>
            <p>
                <a href="<?php echo get_home_url(); ?>">Strona główna</a>
                <span class="separator"><?php echo file_get_contents($separator[0]); ?></span>
                <span><?php _e('Wyniki wyszukiwania dla:', 'polishfloors'); ?> <strong><?php echo get_search_query(); ?></strong></span>
            </p>
        </div>
    </div>
</div>

<div id="main" class="subpage">
    <div class="wrapper">
        <div class="inner">
            <?php if (have_posts()) { ?>
                <ul class="search_results">
                    <?php $search = new WP_Query("s=$s&showposts=-1");
                    while ($search->have_posts()) {
                        $search->the_post(); ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php } ?>
                </ul>
            <?php } else { ?>
                <p class="search_none"><?php _e('Brak wyników wyszukiwania', 'polishfloors'); ?></p>
            <?php } ?>
        </div>
    </div>
</div>

<?php include 'templates/news.php'; ?>

<?php get_footer(); ?>