<?php

function theme_scripts() {
    $ctime = filemtime(get_template_directory() . '/dist/css/style.css');
    $ctimewcag = filemtime(get_template_directory() . '/dist/css/wcag.css');
    wp_enqueue_style('style_css', get_template_directory_uri() . '/dist/css/style.css', array(), $ctime);
    wp_enqueue_style('wcag_css', get_template_directory_uri() . '/dist/css/wcag.css', array(), $ctimewcag);

    wp_enqueue_script('jquery');
    wp_enqueue_script('slick_js', get_stylesheet_directory_uri() . '/dist/js/slick.min.js', array());
    wp_enqueue_script('aos_js', get_stylesheet_directory_uri() . '/dist/js/aos.min.js', array());
    $ctime = filemtime(get_template_directory() . '/dist/js/scripts.js');
    wp_enqueue_script('scripts_js', get_template_directory_uri() . '/dist/js/scripts.js', array(), $ctime);
    wp_enqueue_script('wcag_js', get_stylesheet_directory_uri() . '/dist/js/wcag.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'theme_scripts');

function theme_setup() {
	register_nav_menus(array(
		'nav_1' => 'nav #1',
		'nav_2' => 'nav #2',
		'footer' => 'footer',
		'about' => 'o nas',
		'locations' => 'lokalizacje',
		'location_1_1' => 'Skała #1',
		'location_1_2' => 'Skała #2',
		'location_1_3' => 'Skała #3',
		'location_2_1' => 'Cianowice #1',
		'location_2_2' => 'Cianowice #2',
		'location_3_1' => 'Minoga #1',
		'diagnostics' => 'diagnostyka',
		'registration' => 'rejestracja',
		'patient' => 'dla pacjenta',
		'rodo' => 'rodo',
		'contact' => 'kontakt'
	));
}
add_action('after_setup_theme', 'theme_setup');

add_theme_support('post-thumbnails');

add_image_size('banner', 1920, 0);

if(function_exists('acf_add_options_page')) {
	acf_add_options_page();
}
if(function_exists('acf_set_options_page_title')) {
    acf_set_options_page_title('Konfiguracja');
}

function filter_plugin_updates($value) {
    unset($value->response['advanced-custom-fields-pro/acf.php']);
    return $value;
}
add_filter('site_transient_update_plugins', 'filter_plugin_updates');

show_admin_bar(false);

function job_cpt() {
    $labels = array(
        'name' => 'Oferty pracy'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'menu_position' => 4,
		'supports' => array('title', 'excerpt', 'editor')
    );
    register_post_type('oferta-pracy', $args);
}
add_action('init', 'job_cpt');

function ad_cpt() {
    $labels = array(
        'name' => 'Ogłoszenia'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'menu_position' => 4,
		'supports' => array('title', 'excerpt', 'editor')
    );
    register_post_type('ogloszenie', $args);
}
add_action('init', 'ad_cpt');