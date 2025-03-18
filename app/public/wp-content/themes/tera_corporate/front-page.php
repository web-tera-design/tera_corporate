<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ページタイトル</title>
    <meta name="description" content="このページの説明を入力">

    <!-- OGP設定（最低限） -->
    <meta property="og:title" content="ページタイトル">
    <meta property="og:description" content="このページの説明を入力">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://example.com">
    <meta property="og:image" content="https://example.com/og-image.jpg">

    <!-- SwiperのCSS -->

    <!-- ファビコン -->
    <link rel="icon" href="favicon.ico">

    <!-- 本番環境では削除 -->
    <meta name="robots" content="noindex, nofollow">

    <!-- Google Fonts（必要なら追加） -->
  
    
    
    <?php wp_head(); ?>
</head>
<body>
    <header class="header">
      <div class="header__inner">
        <h1 class="header__logo">
          <a href="" class="header__logo-link"></a>
        </h1>
        <nav class="header__nav">
          <ul class="header__nav-list">
            <li><a href="" class="header__nav-link"></a><span class="header__nav-item-text"></span></li>
            <li><a href="" class="header__nav-link"></a><span class="header__nav-item-text"></span></li>
            <li><a href="" class="header__nav-link"></a><span class="header__nav-item-text"></span></li>
            <li><a href="" class="header__nav-link"></a><span class="header__nav-item-text"></span></li>
            <li><a href="" class="header__nav-link"></a><span class="header__nav-item-text"></span></li>
            <li><a href="" class="header__nav-link"></a><span class="header__nav-item-text"></span></li>
          </ul>
          <button href="" class="header__nav-button"></button>
        </nav>
      </div>
    </header>
    
    <!-- ハンバーガーメニューのアイコンを header 外に移動 -->
    <button class="drawer-icon">
      <div class="drawer-icon__bar"></div>
      <div class="drawer-icon__bar"></div>
      <div class="drawer-icon__bar"></div>
    </button>
    
    <!-- ハンバーガーメニューの本体 -->
    <div class="drawer">
      <div class="drawer__content">
        <ul class="drawer__nav-list">
          <li><a href="" class="drawer__item-link"></a><span class="drawer__item-text"></span></li>
          <li><a href="" class="drawer__item-link"></a><span class="drawer__item-text"></span></li>
          <li><a href="" class="drawer__item-link"></a><span class="drawer__item-text"></span></li>
          <li><a href="" class="drawer__item-link"></a><span class="drawer__item-text"></span></li>
          <li><a href="" class="drawer__item-link"></a><span class="drawer__item-text"></span></li>
          <li><a href="" class="drawer__item-link"></a><span class="drawer__item-text"></span></li>
        </ul>
        <button href="" class="drawer__toggle-button"></button>
      </div>
    </div>
    <!-- jQuery & Swiperのスクリプト -->

    <!-- 自作スクリプト（deferでHTML解析後に実行） -->
    <?php wp_footer(); ?>
</body>
</html>