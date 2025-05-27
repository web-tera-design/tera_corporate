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


// パンくず：記事タイトルを削除（news, staff_blog）
function remove_last_breadcrumb_on_specific_singles($trail)
{
  if (is_singular('news') || is_singular('staff_blog')) {
    array_shift($trail->trail);
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
          location.href = "/thanks/";
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


// functions.php の最後に追加

add_action('wp_footer', 'add_origin_thanks_page');

function add_origin_thanks_page()
{
  $contact = home_url('/contact/thanks');
  $reservation = home_url('/reservation/thanks');
  echo <<<EOC
<script>
  var thanksPage = {
    561: "{$contact}",
    573: "{$reservation}"
  };
  document.addEventListener('wpcf7mailsent', function(event) {
    var formId = event.detail.contactFormId;
    if (thanksPage[formId]) {
      location.href = thanksPage[formId];
    }
  }, false);
</script>
EOC;
}

// // Contact Form 7で自動挿入されるPタグ、brタグを削除
// add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
// // function wpcf7_autop_return_false()
// // {
// //   return false;
// // }
