<?php
add_action('after_setup_theme', function () {
    add_theme_support('post-thumbnails');
    add_image_size('tile-5-4', 840, 672, true);
    add_image_size('square', 840, 840, true);
});
