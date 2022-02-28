<section class="news_module">
    <div class="wrapper">
        <header>
            <h2><?php the_field("news_heading", "option"); ?></h2>
            <?php $l = get_field("news_link_1", "option"); ?>
            <a href="<?php echo $l["url"]; ?>">
                <span><?php echo $l["title"]; ?></span>
                <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/arrow_next.svg", $i); ?>
                <?php echo file_get_contents($i[0]); ?>
            </a>
        </header>
        <div class="posts">
            <?php $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 4,
                'orderby' => 'date',
                'order' => 'DESC'
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
                            <div class="excerpt"><?php the_excerpt(); ?></div>
                            <a href="<?php the_permalink(); ?>" class="link">
                                <span>czytaj dalej <span class="sr-only">o <?php the_title(); ?></span></span>
                                <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/arrow_next.svg", $i); ?>
                                <?php echo file_get_contents($i[0]); ?>
                            </a>
                        </div>
                    </div>
                <?php };
            }
            wp_reset_postdata(); ?>
        </div>
    </div>
        </section>