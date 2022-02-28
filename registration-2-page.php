<?php /* Template Name: Rejestracja TELEFONICZNA */ ?>
<?php get_header(); ?>

<div class="banner">
    <div class="wrapper">
        <h2>Rejestracja</h2>
        <div class="breadcrumbs">
            <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/arrow_next.svg", $separator); ?>
            <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/icon_8.svg", $icon); ?>
            <div class="icon"><?php echo file_get_contents($icon[0]); ?></div>
            <p>
                <a href="<?php echo get_home_url(); ?>">Strona główna</a>
                <span class="separator"><?php echo file_get_contents($separator[0]); ?></span>
                <span>Rejestracja</span>
                <span class="separator"><?php echo file_get_contents($separator[0]); ?></span>
                <span><?php the_title(); ?></span>
            </p>
        </div>
    </div>
</div>

<div id="main" class="subpage">
    <div class="wrapper">
        <div class="inner">
            <div class="registration_contents">
                <div class="nav">
                    <p class="title">Dla naszych Pacjentów umożliwiamy następujące sposoby rejestracji:</p>
                    <?php wp_nav_menu(array(
                        'theme_location' => 'registration',
                        'container' => false,
                        'menu_class' => 'menu',
                        'link_after' => '<span><svg xmlns="http://www.w3.org/2000/svg" width="9" height="14" fill="#f26724"><path d="M1.633 0L0 1.633 5.367 7 0 12.367 1.633 14l7-7z"/></svg></span>'
                    )); ?>
                </div>
                <div class="editor">
                    <?php while (have_posts()) {
                        the_post();
                        the_content();
                    } ?>
                </div>
                <div class="phones_module">
                    <?php if (have_rows('phones_module')) {
                        while (have_rows('phones_module')) {
                            the_row(); ?>
                            <div class="section">
                                <p class="name"><?php the_sub_field("section"); ?></p>
                                <div class="phones">
                                    <?php if (have_rows('phones')) {
                                        $i = 1;
                                        while (have_rows('phones')) {
                                            the_row(); ?>
                                            <div class="item">
                                                <p class="num"><?php echo $i; ?></p>
                                                <div class="txt_1"><?php the_sub_field("txt_1"); ?></div>
                                                <div class="txt_2"><?php the_sub_field("txt_2"); ?></div>
                                            </div>
                                    <?php $i++;
                                        };
                                    }; ?>
                                </div>
                            </div>
                    <?php };
                    }; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>