<?php

function my_setup()
{
  add_theme_support('post-thumbnails');
  add_theme_support('automatic-feed-links');
  add_theme_support('title-tag');
  add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script'));
}
add_action("after_setup_theme", "my_setup");

function my_script_init()
{
  // Font Awesome
  wp_enqueue_style("font-awesome", "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css", array(), "6.7.2", "all");

  // Swiper
  wp_enqueue_style("swiper", "https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css", array(), "11.0.0", "all");
  wp_enqueue_script("swiper", "https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js", array(), "11.0.0", true);

  // GSAP
  wp_enqueue_script("gsap", "https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/gsap.min.js", array(), "3.12.2", true);
  wp_enqueue_script("scrolltrigger", "https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/ScrollTrigger.min.js", array("gsap"), "3.12.2", true);

  // 自作スタイル・スクリプト
  wp_enqueue_style("my", get_template_directory_uri() . "/css/style.css", array(), filemtime(get_theme_file_path('css/style.css')), "all");
  wp_enqueue_script("my", get_template_directory_uri() . "/js/script.js", array("jquery", "swiper", "gsap", "scrolltrigger"), filemtime(get_theme_file_path('js/script.js')), true);
}
add_action("wp_enqueue_scripts", "my_script_init");



// WebPとAVIFのMIMEタイプを許可
function allow_webp_avif_upload($mime_types)
{
  // WebPとAVIFのMIMEタイプを追加
  $mime_types['webp'] = 'image/webp';
  $mime_types['avif'] = 'image/avif';
  return $mime_types;
}
add_filter('upload_mimes', 'allow_webp_avif_upload');

// // スタッフブログ（カスタム投稿タイプ）の登録
// function register_custom_post_type_blog() {
//     register_post_type('blog', array(
//         'label' => 'スタッフブログ',
//         'public' => true,
//         'has_archive' => true,
//         'menu_position' => 5,
//         'show_in_rest' => true, // ブロックエディタ対応
//         'supports' => array('title', 'editor', 'thumbnail'),
//         'rewrite' => array('slug' => 'blog'),
//     ));
// }
// add_action('init', 'register_custom_post_type_blog');


// blog_category というカスタムタクソノミーを追加
// function register_blog_taxonomy() {
//   register_taxonomy('blog_category', 'blog', array(
//     'label' => 'ブログカテゴリー',
//     'hierarchical' => true,
//     'public' => true,
//     'show_in_rest' => true,
//     'rewrite' => array('slug' => 'blog-category')
//   ));
// }


function remove_last_breadcrumb_on_specific_singles($trail)
{
  // 'news' と 'staff_blog' のシングルページだけ
  if (is_singular('news') || is_singular('staff_blog')) {
    array_shift($trail->trail); // 最後のパンくずを削除
  }
}
add_action('bcn_after_fill', 'remove_last_breadcrumb_on_specific_singles');


// function custom_breadcrumb_trail_items($trail)
// {
//   // 現在のページがお知らせ（投稿）ページかどうかを確認
//   if (is_single() && get_post_type() == 'post') {
//     // 新しいトレイルオブジェクトを作成
//     $new_trail = new bcn_breadcrumb_trail();

//     // お知らせページのブレッドクラムを追加（お知らせを最初に追加）
//     $news_breadcrumb = new bcn_breadcrumb(
//       'お知らせ',
//       null,
//       array('post', 'post-post-archive'),
//       get_permalink(get_option('page_for_posts')),
//       null,
//       true
//     );
//     $new_trail->add($news_breadcrumb);

//     // ホームページのブレッドクラムを追加（HOMEを後に追加）
//     $home_breadcrumb = new bcn_breadcrumb(
//       'HOME',
//       null,
//       array('home'),
//       home_url('/'),
//       null,
//       true
//     );
//     $new_trail->add($home_breadcrumb);

//     // 新しいトレイルで元のトレイルを置き換え
//     $trail->trail = $new_trail->trail;
//   }

//   return $trail;
// }
// add_filter('bcn_after_fill', 'custom_breadcrumb_trail_items', 10, 1);

// function custom_breadcrumb_trail_contact_thanks($trail)
// {
//   // 現在のページが「contact-thanks」かどうかを確認
//   if (is_page('contact-thanks')) {
//     // 「お問い合わせ」を新しいパンくずとして作成
//     $contact_breadcrumb = new bcn_breadcrumb(
//       'お問い合わせ',
//       null,
//       array('page'),
//       home_url('/contact'), // 「お問い合わせ」ページのURLに変更
//       null,
//       true
//     );

//     // 2番目の要素として「お問い合わせ」を追加
//     array_splice($trail->trail, 1, 0, [$contact_breadcrumb]);
//   }
//   return $trail;
// }
// add_filter('bcn_after_fill', 'custom_breadcrumb_trail_contact_thanks', 10, 1);


// サンクスページに移動
function my_cf7_redirect_js()
{
?>
  <script>
    document.addEventListener(
      "wpcf7mailsent",
      function(event) {
        if (event.detail.contactFormId == 573) {
          location.href = "/reservation-thanks/";
        } else if (event.detail.contactFormId == 561) {
          location.href = "/thanks/";
        }
      },
      false
    );
  </script>
<?php
}
add_action('wp_footer', 'my_cf7_redirect_js');

// add_filter('bcn_after_fill', function ($trail) {
//   // 予約完了ページの場合
//   if (is_page('reservation-thanks')) {
//     $reservation_page = get_page_by_path('reservation');
//     if ($reservation_page) {
//       $reservation_breadcrumb = new bcn_breadcrumb(
//         '',
//         null,
//         array('page'),
//         get_permalink($reservation_page->ID),
//         null,
//         true
//       );
//       // HOMEの次（2番目）に挿入
//       array_splice($trail->trail, 1, 0, [$reservation_breadcrumb]);
//     }
//   }
//   // お問い合わせ完了ページの場合
//   if (is_page('contact-thanks')) {
//     $contact_page = get_page_by_path('contact');
//     if ($contact_page) {
//       $contact_breadcrumb = new bcn_breadcrumb(
//         '',
//         null,
//         array('page'),
//         get_permalink($contact_page->ID),
//         null,
//         true
//       );
//       array_splice($trail->trail, 1, 0, [$contact_breadcrumb]);
//     }
//   }
//   return $trail;
// });
