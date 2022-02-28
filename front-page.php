<?php get_header(); ?>

<main>
    <section id="main" class="home_1">
    <h2 class="sr-only">Główny slajder</h2>
        <div class="wrapper">
            <div class="slider_wrapper">
                <div class="slider">
                    
                    <?php if(have_rows('1_slider')) {
                        while (have_rows('1_slider')) { 
                            the_row(); 
                            $image = wp_get_attachment_image_src(get_sub_field('image'), 'banner')[0]; 
                            $image_alt = get_sub_field('image');
                            ?>
                            <div class="slide">
                                <!-- <div class="bg" style="background-image: url(<?php echo $image; ?>)"></div> -->
                                <div class="slide_img">
                                    <img src="<?php echo $image_alt['url']; ?>" alt="<?php echo $image_alt['alt']; ?>"/>
                                </div>
                                <div class="inner">
                                    <div class="txt"><?php the_sub_field("txt"); ?></div>
                                    <?php $l = get_sub_field("link"); ?>
                                    <?php if($l) { ?>
                                        <a href="<?php echo $l["url"]; ?>" class="btn">
                                            <span><?php echo $l["title"]; ?></span>
                                            <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/arrow_next.svg", $i); ?>
                                            <?php echo file_get_contents($i[0]); ?>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php };
                    }; ?>
                </div>
                <div class="arrows">
                    <a href="#" class="arrow prev">
                        <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/arrow_prev.svg", $i); ?>
                        <?php echo file_get_contents($i[0]); ?>
                    </a>                
                    <a href="#" class="arrow next">
                        <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/arrow_next.svg", $i); ?>
                        <?php echo file_get_contents($i[0]); ?>
                    </a>
                </div>
            </div>
        </div>
                </section>
    
    <section class="home_2">
        <div class="wrapper">
            <?php $g = get_field("2_links"); ?>
            <div class="links">
                <h2 class="heading"><?php echo $g["heading"]; ?></h2>
                <ul>
                    <?php foreach ($g["links"] as $i) { 
                    $l = $i["link"]; 
                    $target = $l["target"] ? $l["target"] : "_self"; ?>
                    <li>
                        <a href="<?php echo $l["url"]; ?>" target="<?php echo $target; ?>">
                            <span><?php echo $l["title"]; ?></span>
                            <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/arrow_next.svg", $i); ?>
                            <?php echo file_get_contents($i[0]); ?>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <?php $g = get_field("2_cta_1"); 
            $l = $g["link"]; ?>
            <a href="<?php echo $l["url"]; ?>" class="cta cta_1">
                <div class="icon">
                    <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', $g["icon"], $i); ?>
                    <?php echo file_get_contents($i[0]); ?>
                </div>
                <div class="txt"><?php echo $g["txt"]; ?></div>
                <div class="arrow">
                    <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/arrow_next.svg", $i); ?>
                    <?php echo file_get_contents($i[0]); ?>
                </div>
            </a>        
            <?php $g = get_field("2_cta_2"); 
            $l = $g["link"]; ?>
            <a href="<?php echo $l["url"]; ?>" class="cta cta_2">
                <div class="icon">
                    <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', $g["icon"], $i); ?>
                    <?php echo file_get_contents($i[0]); ?>
                </div>
                <div class="txt"><?php echo $g["txt"]; ?></div>
                <div class="arrow">
                    <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/arrow_next.svg", $i); ?>
                    <?php echo file_get_contents($i[0]); ?>
                </div>
            </a>        
            <?php $g = get_field("2_cta_3"); 
            $l = $g["link"]; ?>
            <a href="<?php echo $l["url"]; ?>" class="cta cta_3">
                <div class="icon">
                    <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', $g["icon"], $i); ?>
                    <?php echo file_get_contents($i[0]); ?>
                </div>
                <div class="txt"><?php echo $g["txt"]; ?></div>
                <div class="arrow">
                    <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/arrow_next.svg", $i); ?>
                    <?php echo file_get_contents($i[0]); ?>
                </div>
            </a>
        </div>
    </section>

    <section class="home_3">
        <div class="wrapper">
            <div class="module">
                <div class="txt"><?php the_field("3_txt_1"); ?></div>
                <ul class="links grid_6">
                    <?php if(have_rows('3_links_1')) {
                        while (have_rows('3_links_1')) { 
                            the_row(); 
                            $l = get_sub_field("link"); ?>
                            <li><a href="<?php echo $l["url"]; ?>"><?php echo $l["title"]; ?></a></li>
                        <?php };
                    }; ?>
                </ul>
            </div>        
            <div class="module">
                <div class="txt"><?php the_field("3_txt_2"); ?></div>
                <ul class="links grid_2">
                    <?php if(have_rows('3_links_2')) {
                        while (have_rows('3_links_2')) { 
                            the_row(); 
                            $l = get_sub_field("link"); ?>
                            <li>
                                <a href="<?php echo $l["url"]; ?>"><?php echo $l["title"]; ?></a>
                            </li>
                        <?php };
                    }; ?>
                </ul>
            </div>
        </div>
    </section>

<?php include'templates/news.php'; ?>
</main>

<?php get_footer(); ?>