<?php
add_action('after_setup_theme', function () {
    add_theme_support('post-thumbnails');
    add_image_size('tile-5-4', 840, 672, true);
    add_image_size('square', 840, 840, true);
});

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('site-style', get_template_directory_uri() . '/css/site.css', [], filemtime(get_template_directory() . '/css/site.css'));
});

// Load ACF JSON
add_filter('acf/settings/save_json', function( $path ) {
    $path = get_stylesheet_directory() . '/acf-json';
    return $path;
});

add_filter('acf/settings/load_json', function( $paths ) {
    unset($paths[0]);
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
});
