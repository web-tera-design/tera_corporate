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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <!-- ファビコン -->
    <link rel="icon" href="favicon.ico">

    <!-- 本番環境では削除 -->
    <meta name="robots" content="noindex, nofollow">

    <!-- Google Fonts（必要なら追加） -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- jQuery & Swiperのスクリプト -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- 自作スクリプト（deferでHTML解析後に実行） -->
    <script src="js/script.js" defer></script>

</body>
</html>