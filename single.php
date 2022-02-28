<?php get_header(); ?>

<div class="banner">
    <div class="wrapper">
        <h2>Aktualności</h2>
        <div class="breadcrumbs">
            <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/arrow_next.svg", $separator); ?>
            <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/icon_8.svg", $icon); ?>
            <div class="icon"><?php echo file_get_contents($icon[0]); ?></div>
            <p>
                <a href="<?php echo get_home_url(); ?>">Strona główna</a>
                <span class="separator"><?php echo file_get_contents($separator[0]); ?></span>
                <?php $l = get_field("news_link_2", "option"); ?>
                <a href="<?php echo $l["url"]; ?>"><?php echo $l["title"]; ?></a>
                <span class="separator"><?php echo file_get_contents($separator[0]); ?></span>
                <span><?php the_title(); ?></span>
            </p>
        </div>
    </div>
</div>

<div id="main" class="subpage">
    <div class="wrapper">
        <div class="inner">
            <div class="single_contents">
                <?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large')[0]; ?>
                <img src="<?php echo $thumb; ?>" alt="" class="thumb">
                <div class="editor">
                    <p class="date">
                        <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/icon_6.svg", $i); ?>
                        <?php echo file_get_contents($i[0]); ?>
                        <?php echo get_the_date("d.m.Y"); ?>
                    </p>
                    <?php while (have_posts()) {
                        the_post();
                        the_content();
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'templates/news.php'; ?>

<?php get_footer(); ?>