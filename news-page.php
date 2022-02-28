<?php /* Template Name: Aktualności */ ?>
<?php get_header(); ?>

<div class="banner">
    <div class="wrapper">
        <h1><?php the_title(); ?></h1>
        <nav class="breadcrumbs" aria-label="Ścieżka do strony">
            <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/arrow_next.svg", $separator); ?>
            <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/icon_8.svg", $icon); ?>
            <div class="icon"><?php echo file_get_contents($icon[0]); ?></div>
            <ol>
                <li>
                    <a href="<?php echo get_home_url(); ?>">Strona główna</a>
                    <span class="separator"><?php echo file_get_contents($separator[0]); ?></span>
                </li>
                <?php global $post;
                if ($post->post_parent) { ?>
                    <li>
                        <a href="<?php echo get_the_permalink(wp_get_post_parent_id(get_the_ID())); ?>"><?php echo get_the_title(wp_get_post_parent_id(get_the_ID())); ?></a>
                        <span class="separator" aria-hidden="true"><?php echo file_get_contents($separator[0]); ?></span>
                    </li>
                    <?php } ?>
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
                            $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium')[0]; 
                            $thumbnail_id = get_post_thumbnail_id( $post->ID );
                            $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);   
                            ?>
                            <div class="post">
                                <a href="<?php the_permalink(); ?>" style="background-image: url(<?php echo $thumb; ?>)" class="thumb">
                                    <?php the_post_thumbnail('medium', [ 'alt' => $alt ]); ?>
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
                                        <span class="sr-only"> o <?php the_title(); ?></span>
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
                    <nav class="pagination" aria-label="Paginacja">
                        
                        <?php echo paginate_links(array(
                            'format' => 'page/%#%',
                            'current' => $paged,
                            'aria-current' => 'true',
                            'total' => $q->max_num_pages,
                            'type'=> 'list',
                            'mid_size' => 2,   
                            'prev_text' => '<svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" width="12" height="14" fill="#f26724"><path d="M7.367 14L9 12.367 3.633 7 9 1.633 7.367 0l-7 7z"/></svg> poprzednia strona',
                            'next_text' => 'następna strona <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" width="12" height="14" fill="#f26724"><path d="M1.633 0L0 1.633 5.367 7 0 12.367 1.633 14l7-7z"/></svg>'
                        )); ?>
                       
                    </nav>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
</main>


<?php get_footer(); ?>