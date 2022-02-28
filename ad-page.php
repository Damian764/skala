<?php /* Template Name: Ogłoszenia */ ?>
<?php get_header(); ?>

<div class="banner">
    <div class="wrapper">
        <h2><?php the_title(); ?></h2>
        <div class="breadcrumbs">
            <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/arrow_next.svg", $separator); ?>            
            <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/icon_8.svg", $icon); ?>
            <div class="icon"><?php echo file_get_contents($icon[0]); ?></div>
            <p>
                <a href="<?php echo get_home_url(); ?>">Strona główna</a> 
                <span class="separator"><?php echo file_get_contents($separator[0]); ?></span>
                <span><?php the_title(); ?></span>
            </p>
        </div>
    </div>
</div>

<div class="subpage">
    <div class="wrapper">
        <div class="inner">
            <div class="cpt_contents">
                <div class="cpt_posts">
                    <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
                    $args = array(
                        'post_type' => 'ogloszenie',
                        'post_status' => 'publish',
                        'posts_per_page' => 6,
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'paged' => $paged
                    );
                    $q = new WP_Query($args);
                    if ($q->have_posts()) {
                        while ($q->have_posts()) { 
                            $q->the_post(); ?>
                            <div class="post">
                                <div class="div">
                                    <h3><?php the_title(); ?></h3>
                                    <?php if(has_excerpt()) { ?>
                                        <div class="excerpt"><?php the_excerpt(); ?></div>
                                    <?php } ?>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="btn">
                                    <span>szczegóły</span>
                                    <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/arrow_next.svg", $i); ?>
                                    <?php echo file_get_contents($i[0]); ?>
                                </a>
                            </div>
                        <?php };
                    }
                    wp_reset_postdata(); ?>
                </div>
                <?php if($q->max_num_pages > 1) { ?>
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

<?php get_footer(); ?>