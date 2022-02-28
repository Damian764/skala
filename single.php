<?php get_header(); ?>

<div class="banner">
    <div class="wrapper">
        <h2>Aktualności</h2>
        <nav class="breadcrumbs" aria-label="Ścieżka do strony">
            <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/arrow_next.svg", $separator); ?>
            <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/icon_8.svg", $icon); ?>
            <div class="icon"><?php echo file_get_contents($icon[0]); ?></div>
            <ol>
                <li>
                    <a href="<?php echo get_home_url(); ?>">Strona główna</a>
                    <span aria-hidden="true" class="separator"><?php echo file_get_contents($separator[0]); ?></span>
                </li>
                <?php $l = get_field("news_link_2", "option"); ?>
                <li>
                    <a href="<?php echo $l["url"]; ?>"><?php echo $l["title"]; ?></a>
                    <span aria-hidden="true" class="separator"><?php echo file_get_contents($separator[0]); ?></span>
                </li>
                <li>
                    <span aria-current="page"><?php the_title(); ?></span>
                </li>
            </ol>
        </nav>
    </div>
</div>

<main id="main" class="subpage">
    <div class="wrapper">
        <div class="inner">
            <div class="single_contents">
                <?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large')[0]; 
                    $thumbnail_id = get_post_thumbnail_id( $post->ID );
                    $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);   
                ?>
                <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" class="thumb">
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
</main>

<?php include 'templates/news.php'; ?>

<?php get_footer(); ?>