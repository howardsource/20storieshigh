<?php
add_action('after_setup_theme', function () {
    add_theme_support('post-thumbnails');
    add_image_size('tile-5-4', 840, 672, true);
    add_image_size('tiles', 656, 396, true);
    add_image_size('square', 840, 840, true);
    add_image_size('square-sml', 360, 360, true);
    add_image_size('carousel', 1920, 1080, true);
    add_image_size('half-width', 1000, 800, true);
});

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('site-style', get_template_directory_uri() . '/css/site.css', [], filemtime(get_template_directory() . '/css/site.css'));
});

add_filter('acf/settings/save_json', function( $path ) {
    $path = get_stylesheet_directory() . '/acf-json';
    return $path;
});

add_filter('acf/settings/load_json', function( $paths ) {
    unset($paths[0]);
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
});

add_action('pre_get_posts', function ($query) {
    if (is_admin() || !$query->is_main_query()) {
        return;
    }
    if (!$query->is_post_type_archive('projects')) {
        return;
    }
    if (!function_exists('get_field')) {
        return;
    }
    $highlighted_show = get_field('highlighted_show', 'options');
    $highlighted_show_id = $highlighted_show instanceof WP_Post
        ? $highlighted_show->ID
        : (is_numeric($highlighted_show) ? (int) $highlighted_show : 0);
    if ($highlighted_show_id <= 0) {
        return;
    }
    $post__not_in = $query->get('post__not_in');
    if (!is_array($post__not_in)) {
        $post__not_in = [];
    }
    $post__not_in[] = $highlighted_show_id;
    $query->set('post__not_in', array_values(array_unique($post__not_in)));
});
