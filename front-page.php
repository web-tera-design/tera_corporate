<?php get_header(); ?>

<section class="p-index-mv">
  <div class="p-index-mv-card">
    <div class="p-index-mv-card__inner">
      <div class="p-index-mv-card__swiper-container">
        <div class="swiper p-index-mv-card__swiper --swiper1">
          <div class="swiper-wrapper p-index-mv-card__swiper-wrapper">
            <div class="swiper-slide p-index-mv-card__swiper-slide">
              <picture>
                <source srcset="<?php echo get_template_directory_uri(); ?>/img/img2.webp" media="(min-width: 768px)">
                <img class="p-index-mv-slide-img" src="<?php echo get_template_directory_uri(); ?>/img/index/mv/sp/index-mv-sp-02.webp" alt="診療チェアの画像" loading="lazy">
              </picture>
              <!-- <img
                src="<?php echo get_template_directory_uri(); ?>/img/img.webp"
                alt=""
                width="670"
                height="894"
                class="p-index-mv-slide-img" /> -->
              <div class="p-index-mv-swiper-slide__text">
                <h2 class="p-index-mv-swiper-slide__heading">
                  街の皆さまの笑顔を守る
                </h2>
                <p class="p-index-mv-swiper-slide__sub">
                  アットホームな歯医者さん
                </p>
              </div>
            </div>
            <div class="swiper-slide p-index-mv-card__swiper-slide">
              <picture>
                <source srcset="<?php echo get_template_directory_uri(); ?>/img/img2.webp" media="(min-width: 768px)">
                <img class="p-index-mv-slide-img" src="<?php echo get_template_directory_uri(); ?>/img/index/mv/sp/index-mv-sp-02.webp" alt="診療チェアの画像" loading="lazy">
              </picture>
              <!-- <img
                src="<?php echo get_template_directory_uri(); ?>/img/img1.webp"
                alt=""
                width="670"
                height="894"
                class="p-index-mv-slide-img" /> -->
              <div class="p-index-mv-swiper-slide__text">
                <h2 class="p-index-mv-swiper-slide__heading">
                  街の皆さまの笑顔を守る
                </h2>
                <p class="p-index-mv-swiper-slide__sub">
                  アットホームな歯医者さん
                </p>
              </div>
            </div>
            <div class="swiper-slide p-index-mv-card__swiper-slide">
              <picture>
                <source srcset="<?php echo get_template_directory_uri(); ?>/img/img2.webp" media="(min-width: 768px)">
                <img class="p-index-mv-slide-img" src="<?php echo get_template_directory_uri(); ?>/img/index/mv/sp/index-mv-sp-02.webp" alt="診療チェアの画像" loading="lazy">
              </picture>

              <!-- <img
                src="<?php echo get_template_directory_uri(); ?>/img/img2.webp"
                alt=""
                width="670"
                height="894"
                class="p-index-mv-slide-img" /> -->
              <div class="p-index-mv-swiper-slide__text">
                <h2 class="p-index-mv-swiper-slide__heading">
                  街の皆さまの笑顔を守る
                </h2>
                <p class="p-index-mv-swiper-slide__sub">
                  アットホームな歯医者さん
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="p-index-mv-card__swiper-bottom">
          <div class="swiper-button-prev --swiper1">
            <img src="<?php echo get_template_directory_uri(); ?>/img/arrow-left.svg" alt="" width="60" height="60" />
          </div>
          <div class="swiper-pagination --swiper1"></div>
          <div class="swiper-button-next --swiper1">
            <img src="<?php echo get_template_directory_uri(); ?>/img/arrow-right.svg" alt="" width="60" height="60" />
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="p-index-mv__info">
    <div class="p-index-mv__info-image">
      <img
        src="<?php echo get_template_directory_uri(); ?>/img/medical-time-pc.png"
        alt="診療時間表"
        width="670"
        height="232" />
    </div>
    <div class="p-index-mv__info-content">
      <div class="p-index-mv__info-header">
        <div class="p-index-mv__info-title-container">
          <h2 class="p-index-mv__info-title">お知らせ</h2>
          <span class="p-index-mv__info-subtitle">NEWS</span>
        </div>
        <div class="p-index-mv__info-link-group">
          <a href="<?php echo get_post_type_archive_link('news'); ?>" class="p-index-mv__info-link">
            過去のお知らせはこちら
          </a>
        </div>
      </div>

      <?php
      $args = array(
        'post_type' => 'news', // ← 投稿タイプを明示
        'posts_per_page' => 1,
        'post_status' => 'publish',
      );
      $news_query = new WP_Query($args);
      if ($news_query->have_posts()) :
        while ($news_query->have_posts()) : $news_query->the_post(); ?>
          <!-- 最新記事の表示 -->
          <a href="<?php the_permalink(); ?>" class="p-index-mv__info-news">
            <time class="p-index-mv__info-news-time" datetime="<?php the_time('Y-m-d'); ?>">
              <?php the_time('Y/m/d'); ?>
            </time>
            <p class="p-index-mv__info-news-text"><?php the_title(); ?></p>
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
              <path d="M1 8H15" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M8.39453 1L15.0001 8L8.39453 15" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </a>
      <?php endwhile;
        wp_reset_postdata();
      endif;
      ?>


    </div>
  </div>
</section>

<section class="c-concept">
  <div class="c-concept__inner">
    <div class="c-concept__container">
      <div class="c-concept__content">
        <hgroup class="c-concept__heading-group">
          <p class="c-concept__subheading">CONCEPT</p>
          <h2 class="c-concept__heading">
            健康的で素敵な笑顔あふれる街づくりを目指して
          </h2>
        </hgroup>
        <p class="c-concept__text">
          私たちは最新の医療技術を追求すると共に、患者様とのコミュニケーションを大事することで、気軽に通いやすく些細なことでも相談できる「街の掛かり付け医」を目指しております。<br />お子様からご高齢の方まで、快適な空間で治療が受けられる場を作り、地域医療に貢献しきたいと考えております。
        </p>
        <div class="c-concept__link">
          <a href="<?php echo get_permalink(get_page_by_path('about')); ?>" class="c-concept__button c-button">当院について
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
              <path
                d="M1 7H13"
                stroke-width="1.4"
                stroke-linecap="round"
                stroke-linejoin="round" />
              <path
                d="M6.39453 1L13.0001 7L6.39453 13"
                stroke-width="1.4"
                stroke-linecap="round"
                stroke-linejoin="round" />
            </svg>
          </a>
        </div>
      </div>
      <div class="c-concept__image">
        <img
          src="<?php echo get_template_directory_uri(); ?>/img/concept_img.webp"
          alt="治療中の画像"
          width="1280"
          height="876" />
      </div>
    </div>
    <div class="c-concept__bg-image">
      <img src="<?php echo get_template_directory_uri(); ?>/img/concept-bg.svg" alt="" width="1310" height="726" />
    </div>
  </div>
</section>

<section class="p-index-recommend">
  <div class="p-index-recommend__heading-content">
    <h2 class="p-index-recommend__heading-title c-heading">
      当院の3つのおすすめ
    </h2>
  </div>
  <div class="p-index-recommend__inner">
    <div class="p-index-recommend__heading">
      <div class="p-index-recommend__items">
        <div class="p-index-recommend__item">
          <img src="<?php echo get_template_directory_uri(); ?>/img/recommend-1.svg" alt="" width="177" height="33" />
          <img
            src="<?php echo get_template_directory_uri(); ?>/img/recommend-img-01.svg"
            alt=""
            width="276"
            height="258" />
          <p class="p-index-recommend__text">
            歯の治療において、小さな違和感は大きなストレスにつながります。<br />私たちは常に快適な歯科医療技術の研究を行っております。
          </p>
        </div>
        <div class="p-index-recommend__item">
          <img src="<?php echo get_template_directory_uri(); ?>/img/recommend-2.svg" alt="" width="182" height="33" />
          <img
            src="<?php echo get_template_directory_uri(); ?>/img/recommend-img-02.svg"
            alt=""
            width="276"
            height="258" />
          <p class="p-index-recommend__text">
            「通いやすさ」も医院選びの重要なポイントと考え、2019年のリニューアルを期に更に駅の近くへ場所を移しました。
          </p>
        </div>
        <div class="p-index-recommend__item">
          <img src="<?php echo get_template_directory_uri(); ?>/img/recommend-3.svg" alt="" width="182" height="33" />
          <img
            src="<?php echo get_template_directory_uri(); ?>/img/recommend-img-03.svg"
            alt=""
            width="276"
            height="258" />
          <p class="p-index-recommend__text">
            朝から夜までお仕事をされている方のために、診療時間を見直しました。<br /><span
              class="p-index-recommend__text__accent">※駆け込みでも対応可能ですが、事前にご連絡いただけるとスムーズです。</span>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="p-index-medical">
  <div class="c-medical__bg-top"></div>
  <div class="p-index-medical__inner">
    <div class="p-index-medical__container">
      <div class="p-index-medical__heading">
        <h2 class="p-index-medical__heading-title c-heading">診療案内</h2>
      </div>
      <div class="p-index-medical__services">
        <a href="<?php echo home_url('/medical/#general'); ?>" class="p-index-medical__service p-index-medical--service1">
          <div class="p-index-medical__service-link-line">
            <div class="p-index-medical__link-container">
              <h3 class="p-index-medical__service-title">一般診療</h3>
              <p class="p-index-medical__service-description">
                虫歯・入れ歯・小児歯科
              </p>
            </div>
          </div>
        </a>
        <a href="<?php echo home_url('medical/#specialized'); ?>" class="p-index-medical__service p-index-medical--service2">
          <div class="p-index-medical__service-link-line">
            <div class="p-index-medical__link-container">
              <h3 class="p-index-medical__service-title">特殊診療</h3>
              <p class="p-index-medical__service-description">
                インプラント・ホワイトニング<br />予防歯科・口腔外科・審美歯科
              </p>
            </div>
          </div>
        </a>
      </div>
      <p class="p-index-medical__text">
        当院では、患者さんの歯の健康状態や治療方針を丁寧にカウンセリングし、十分ご理解していただいた上で治療いたします。<br />
        痛みに配慮することと、可能な限り削らない・抜かない治療に努めております。<br />
        <span
          class="p-index-medical-text__accent p-index-medical-text__accent--medical">※特殊性の高い矯正治療などは保険の適応外となります。
          これらの治療を行う際は事前に詳細と費用のご説明いたします。</span>
      </p>
    </div>
  </div>
  <div class="c-medical__bg-bottom-main"></div>
  <div class="c-medical__bg-bottom-sub"></div>
</section>

<section class="c-blog p-index-blog">
  <h2 class="c-heading">スタッフブログ</h2>
  <div class="c-blog__container p-index-blog__container">
    <div class="c-blog__cards p-index-blog__cards">

      <?php
      $args = array(
        'post_type' => 'staff_blog',         // カスタム投稿タイプ「blog」
        'posts_per_page' => 6          // 最新6件を取得
      );
      $blog_query = new WP_Query($args);
      ?>

      <?php if ($blog_query->have_posts()) : ?>
        <?php while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
          <a href="<?php the_permalink(); ?>" class="c-blog__card p-index-blog__card">
            <div class="c-blog__image p-index-blog__image">
              <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('medium'); ?>
              <?php else : ?>
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/blog-image.webp" alt="記事画像" width="266" height="202" />
              <?php endif; ?>
            </div>
            <div class="c-blog__content">
              <span class="c-blog__label p-index-blog__label">
                <?php
                $terms = get_the_terms(get_the_ID(), 'blog_category');
                if ($terms && !is_wp_error($terms)) {
                  echo esc_html($terms[0]->name);
                } else {
                  echo 'お知らせ';
                }
                ?>
              </span>
              <p class="c-blog__text p-index-blog__text"><?php the_title(); ?></p>
              <time class="c-blog__datetime p-index-blog__datetime entry-date published" datetime="<?php the_time('Y-m-d'); ?>" itemprop="datePublished">
                <?php the_time('Y/m/d'); ?>
              </time>
            </div>
          </a>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php else : ?>
        <p>スタッフブログはまだ投稿がありません。</p>
      <?php endif; ?>

    </div>
  </div>
  <div class="c-blog__link">
    <a href="<?php echo get_post_type_archive_link('blog'); ?>" class="c-blog__button c-button">
      スタッフブログ一覧はこちら
      <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
        <path d="M1 7H13" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" />
        <path d="M6.39453 1L13.0001 7L6.39453 13" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" />
      </svg>
    </a>
  </div>
</section>


<?php get_footer(); ?>