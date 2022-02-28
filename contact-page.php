<?php /* Template Name: Kontakt */ ?>
<?php get_header(); ?>

<div class="banner">
    <div class="wrapper">
        <h1>Kontakt</h1>
        <div class="breadcrumbs">
            <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/arrow_next.svg", $separator); ?>
            <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', get_stylesheet_directory_uri() . "/dist/images/icon_8.svg", $icon); ?>
            <div class="icon"><?php echo file_get_contents($icon[0]); ?></div>
            <p>
                <a href="<?php echo get_home_url(); ?>">Strona główna</a>
                <span class="separator"><?php echo file_get_contents($separator[0]); ?></span>
                <span>Kontakt</span>
                <span class="separator"><?php echo file_get_contents($separator[0]); ?></span>
                <span><?php the_field("name"); ?></span>
            </p>
        </div>
    </div>
</div>
<main>
<div id="main" class="subpage">
    <div class="wrapper">
        <div class="inner">
            <div class="cols">
                <aside class="sidebar">
                    <h2 class="title">Przychodnie:</h2>
                    <?php wp_nav_menu(array(
                        'theme_location' => 'contact',
                        'container' => 'nav',
                        'container_aria_label' => 'Menu boczne',
                        'menu_class' => 'menu'
                    )); ?>
                </aside>
                <div class="contents contact_contents">
                    <div class="module module_1">
                        <div class="col_1">
                            <h3><?php the_field("name"); ?></h3>
                            <div class="contact">
                                <?php if (have_rows('contact')) {
                                    while (have_rows('contact')) {
                                        the_row();
                                        $icon = wp_get_attachment_image_src(get_sub_field('icon'), 'thumbnail')[0]; ?>
                                        <?php preg_match('/(wp-content\/)[\d\w\!-_]+/', $icon, $i); ?>
                                        <div class="item">
                                            <div class="block_1"><?php echo file_get_contents($i[0]); ?></div>
                                            <div class="block_2"><?php the_sub_field("txt"); ?></div>
                                        </div>
                                <?php };
                                }; ?>
                            </div>
                        </div>
                        <div class="col_2">
                            <div class="cf"><?php the_field("cf"); ?></div>
                        </div>
                    </div>
                    <div class="module module_2">
                        <h3>Mapa dojazdu:</h3>
                        <div class="map"><?php the_field("map"); ?></div>
                    </div>
                    <div class="module module_3">
                        <h3>Klauzula informacyjna:</h3>
                        <div class="editor"><?php the_field("clause"); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'templates/news.php'; ?>
</main>
<script>
    (function($) {

        var validateEmail = function(element) {
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,20}$/;
            return emailPattern.test(element);
        }

        var validatePhone = function(element) {
            var numberPattern = /^(\+?)\d+$/;
            return numberPattern.test(element);
        }

        $(".cf form").on('submit', function(e) {
            if ($(".cf input[name='cf_name']").val().length <= 2) {
                $(".cf input[name='cf_name']").addClass('not-valid');
            }
            var phone = $(".cf input[name='cf_phone']").val();
            phone = phone.replace(/\s+/g, '');
            phone = phone.replace('+', '');
            var valid = validatePhone(phone);
            if (!valid || phone.length < 7) {
                $(".cf input[name='cf_phone']").addClass('not-valid');
            }
            var email = $(".cf input[name='cf_email']").val();
            var valid = validateEmail(email);
            if (!valid) {
                $(".cf input[name='cf_email']").addClass('not-valid');
            }
            if ($(".cf textarea[name='cf_message']").val().length <= 10) {
                $(".cf textarea[name='cf_message']").addClass('not-valid');
            }
            if (!$(".cf .accept_1 input").is(':checked')) {
                $('.cf .accept_1').addClass('not-valid');
            }
            if (!$(".cf .accept_2 input").is(':checked')) {
                $('.cf .accept_2').addClass('not-valid');
            }
            if ($('.cf form .not-valid').length > 0) {
                $(".cf form button[type='submit']").attr('disabled', 'disabled');
            }
        });

        $(".cf input[name='cf_name']").on('input', function(e) {
            var code = e.keyCode || e.which;
            if (code != '9') {
                if ($(this).val().length > 2) {
                    $(this).removeClass('not-valid');
                } else if ($(this).val().length <= 2) {
                    $(this).addClass('not-valid');
                    $(".cf button[type='submit']").attr('disabled', 'disabled');
                }
                if ($('.cf .not-valid').length === 0) {
                    $(".cf button[type='submit']").removeAttr('disabled', 'false');
                    $(".cf div.wpcf7-response-output").fadeOut(100);
                }
            }
        });

        $(".cf input[name='cf_email']").on('input', function(e) {
            var code = e.keyCode || e.which;
            if (code != '9') {
                var email = $(this).val();
                var valid = validateEmail(email);
                if (valid) {
                    $(this).removeClass('not-valid');
                } else if (!valid) {
                    $(this).addClass('not-valid');
                    $(".cf form button[type='submit']").attr('disabled', 'disabled');
                }
                if ($('.cf .not-valid').length === 0) {
                    $(".cf button[button='submit']").removeAttr('disabled', 'false');
                    $(".cf div.wpcf7-response-output").fadeOut(100);
                }
            }
        });

        $(".cf input[name='phone']").on('input', function(e) {
            var code = e.keyCode || e.which;
            if (code != '9') {
                var phone = $(this).val();
                phone = phone.replace(/\s+/g, '');
                phone = phone.replace('+', '');
                var valid = validatePhone(phone);
                if (valid && phone.length >= 7) {
                    $(this).removeClass('not-valid');
                } else if (!valid || valid && phone.length < 7) {
                    $(this).addClass('not-valid');
                    $(".cf button[type='submit']").attr('disabled', 'disabled');
                }
                if ($('.cf .not-valid').length === 0) {
                    $(".cf button[type='submit']").removeAttr('disabled', 'false');
                    $(".cf div.wpcf7-response-output").fadeOut(100);
                }
            }
        });

        $(".cf textarea[name='cf_message']").on('input', function(e) {
            var code = e.keyCode || e.which;
            if (code != '9') {
                if ($(this).val().length > 10) {
                    $(this).removeClass('not-valid');
                } else if ($(this).val().length <= 2) {
                    $(this).addClass('not-valid');
                    $(".cf form button[type='submit']").attr('disabled', 'disabled');
                }
                if ($('.cf .not-valid').length === 0) {
                    $(".cf button[type='submit']").removeAttr('disabled', 'false');
                    $(".cf div.wpcf7-response-output").fadeOut(100);
                }
            }
        });

        $(".cf .accept_1 input").on('input', function(e) {
            if (!$(this).is(':checked')) {
                $('.cf .accept_1').addClass('not-valid');
            } else {
                $('.cf .accept_1').removeClass('not-valid');
            }
            if ($('.cf .not-valid').length === 0) {
                $(".cf button[type='submit']").removeAttr('disabled', 'false');
                $(".cf div.wpcf7-response-output").fadeOut(100);
            }
        });

        $(".cf .accept_2 input").on('input', function(e) {
            if (!$(this).is(':checked')) {
                $('.cf .accept_2').addClass('not-valid');
            } else {
                $('.cf .accept_2').removeClass('not-valid');
            }
            if ($('.cf .not-valid').length === 0) {
                $(".cf button[type='submit']").removeAttr('disabled', 'false');
                $(".cf div.wpcf7-response-output").fadeOut(100);
            }
        });

    })(jQuery);
</script>

<?php get_footer(); ?>