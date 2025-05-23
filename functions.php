<?php

function my_setup() {
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ));
  }
  add_action("after_setup_theme", "my_setup");

function my_script_init() {
    wp_enqueue_style("fot-awesome", "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css", array(), "6.7.2", "all");
    wp_enqueue_style("my", get_template_directory_uri() . "/css/style.css", array(), filemtime(get_theme_file_path('css/style.css')), "all");
    wp_enqueue_script("my", get_template_directory_uri() . "/js/script.js", array("jquery"), filemtime(get_theme_file_path('js/script.js')), true);
}
add_action("wp_enqueue_scripts", "my_script_init");

// WebPとAVIFのMIMEタイプを許可
function allow_webp_avif_upload( $mime_types ) {
    // WebPとAVIFのMIMEタイプを追加
    $mime_types['webp'] = 'image/webp';
    $mime_types['avif'] = 'image/avif';
    return $mime_types;
}
add_filter( 'upload_mimes', 'allow_webp_avif_upload' );

/**
* 画像タイトルを自動的にALTに入れる
*/
// function custom_auto_alt($response, $attachment) {
// 	// 代替テキストを自動入力
// 	if (empty($response['alt'])) {
// 		$response['alt'] = $response['title'];
// 	}
// 	$response['caption'] = '';
// 	return $response;
// }
// add_filter('wp_prepare_attachment_for_js', 'custom_auto_alt', 10, 2);

?>

