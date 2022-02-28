<?php /* Template Name: Aktualności */ ?>
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
            <div class="contents news_contents">
                <div class="posts">
                    <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $args = array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'posts_per_page' => 12,
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'paged' => $paged
                    );
                    $q = new WP_Query($args);
                    if ($q->have_posts()) {
                        while ($q->have_posts()) {
                            $q->the_post();
                            $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium')[0]; ?>
                            <div class="post">
                                <a href="<?php the_permalink(); ?>" style="background-image: url(<?php echo $thumb; ?>)" class="thumb">
                                    <span class="sr-only"><?php the_title(); ?></span>
                                </a>
                                <div class="contents">
                                    <p class="date">
                                        <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/icon_6.svg", $i); ?>
                                        <?php echo file_get_contents($i[0]); ?>
                                        <?php echo get_the_date("d.m.Y"); ?>
                                    </p>
                                    <h3><?php the_title(); ?></h3>
                                    <?php if (has_excerpt()) { ?>
                                        <div class="excerpt"><?php the_excerpt(); ?></div>
                                    <?php } ?>
                                    <a href="<?php the_permalink(); ?>" class="link">
                                        <span>czytaj dalej</span>
                                        <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/arrow_next.svg", $i); ?>
                                        <?php echo file_get_contents($i[0]); ?>
                                    </a>
                                </div>
                            </div>
                    <?php };
                    }
                    wp_reset_postdata(); ?>
                </div>
                <?php if ($q->max_num_pages > 1) { ?>
                    <div class="pagination">
                        <?php echo paginate_links(array(
                            'format' => 'page/%#%',
                            'current' => $paged,
                            'total' => $q->max_num_pages,
                            'mid_size' => 2,
                            'prev_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="9" height="14" fill="#f26724"><path d="M7.367 14L9 12.367 3.633 7 9 1.633 7.367 0l-7 7z"/></svg> poprzednia',
                            'next_text' => 'następna <svg xmlns="http://www.w3.org/2000/svg" width="9" height="14" fill="#f26724"><path d="M1.633 0L0 1.633 5.367 7 0 12.367 1.633 14l7-7z"/></svg>'
                        )); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
</main>


<?php get_footer(); ?>