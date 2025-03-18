

<?php
function my_script_init() {
    // Google Fonts
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@100;300;400;500;700;800;900&display=swap',
        array(),
        null
    );

    // Swiper CSS
    wp_enqueue_style(
        'swiper-css',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
        array(),
        null
    );

  

    // Main Style
    wp_enqueue_style(
        'main-style',
        get_template_directory_uri() . '/css/style.css',
        array(),
        filemtime(get_theme_file_path('css/style.css'))
    );

    // Swiper JS
    wp_enqueue_script(
        'swiper-js',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
        array(),
        null,
        true
    );

    // Main Script
    wp_enqueue_script(
        'my-script',
        get_template_directory_uri() . '/js/script.js',
        array('jquery'),
        filemtime(get_theme_file_path('js/script.js')),
        true
    );
}
add_action('wp_enqueue_scripts', 'my_script_init');

function my_setup() {
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ));
  }
  add_action("after_setup_theme", "my_setup");
  ?>

