<?php get_header(); ?>

<section class="c-mv">
  <div class="c-mv__inner l-section__inner">
    <div class="c-mv__bg-image p-blog-mv__bg-image">
      <hgroup class="c-mv__bg-text">
        <h2 class="c-mv__bg-text--main">スタッフブログ</h2>
        <p class="c-mv__bg-text--sub">STAFF BLOG</p>
      </hgroup>
    </div>
    <nav class="l-breadcrumbs" aria-label="パンくずリスト">
      <ol class="l-breadcrumb__list">
        <?php if (function_exists('bcn_display')) {
          bcn_display();
        } ?>
      </ol>
    </nav>
  </div>
</section>

<section class="p-blog-detail">
  <div class="p-blog-detail__inner l-section__inner">
    <div class="p-blog-detail__container">
      <div class="p-blog-detail__archive">
        <div class="p-blog-detail__content">
          <div class="p-blog-detail__heading">
            <h2 class="p-blog-detail__heading-title">
              [見出し1]下層ページのタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトル
            </h2>
          </div>
          <div class="p-blog-detail__meta">
            <div class="p-blog-detail__meta-date">
              <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
                <path
                  d="M3.73514 3.79509C3.17755 3.95269 2.73412 4.37605 2.55089 4.92575L0 12.5781L0.401678 12.9798L4.50623 8.87526C4.42447 8.70409 4.37498 8.51487 4.37498 8.31253C4.37498 7.58765 4.96259 7.00003 5.68747 7.00003C6.41235 7.00003 6.99997 7.58765 6.99997 8.31253C6.99997 9.03741 6.41235 9.62502 5.68747 9.62502C5.48513 9.62502 5.29591 9.57553 5.12474 9.49377L1.02019 13.5983L1.42187 14L9.07425 11.4491C9.62395 11.2659 10.0473 10.8224 10.2049 10.2649L11.3749 6.12504L7.87496 2.62506L3.73514 3.79509ZM13.6155 2.02814L11.9719 0.38452C11.4592 -0.128173 10.6276 -0.128173 10.115 0.38452L8.56867 1.9308L12.0692 5.43133L13.6155 3.88505C14.1282 3.37236 14.1282 2.54111 13.6155 2.02814H13.6155Z"
                  fill="#1391E6" />
              </svg>
              <time class="p-blog-detail__meta-date-text">2021.01.01</time>
            </div>
            <span class="p-blog-detail__meta-category">カテゴリ1</span>
          </div>
          <p class="p-blog-detail__text">
            テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。<a
              class="p-blog-detail__text-link">リンクが入ります。</a>
            リンクが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
          </p>
          <p class="p-blog-detail__subtext">
            テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
          </p>
        </div>
        <div class="p-blog-detail__content2">
          <div class="p-blog-detail__content2-heading">
            <h3 class="p-blog-detail__content2-haading-title">
              見出し2見出し2見出し2見出し2
            </h3>
            <div class="p-blog-detail__content2-image">
              <img
                src="<?php echo get_template_directory_uri(); ?>/img/blog/sidebaer/pc/blog-sidebaer-pc-02.webp"
                alt="" />
            </div>
          </div>
        </div>
        <div class="p-blog-detail__content3">
          <div class="p-blog-detail__content3-heading">
            <h3 class="p-blog-detail__content3-heading-title">
              見出し3見出し3見出し3見出し3
            </h3>
          </div>
          <p class="p-blog-detail__content3-text">
            テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
          </p>
        </div>
        <div class="p-blog-detail__content4">
          <div class="p-blog-detail__content4-heading">
            <h4 class="p-blog-detail__content4-heading-title">
              見出し4見出し4見出し4見出し4
            </h4>
          </div>
          <p class="p-blog-detail__content4-text">
            テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
          </p>
        </div>
        <ul class="p-blog-detail__content__items">
          <li class="p-blog-detail___content__item">リスト1</li>
          <li class="p-blog-detail___content__item">リスト1</li>
          <li class="p-blog-detail___content__item">リスト1</li>
        </ul>
        <div class="p-blog-detail-pagination-container">
          <nav
            class="p-blog-detail-pagination"
            role="navigation"
            aria-label="ページ送り">
            <ul class="p-blog-detail-pagination__list">
              <li class="p-blog-detail-pagination__item">
                <a
                  href="#"
                  class="p-blog-detail-pagination__link p-blog-detail-pagination__link--prev"
                  aria-label="前のページ">
                  <svg
                    class="p-blog-detail-pagination__icon p-blog-detail-pagination__icon--prev"
                    width="14"
                    height="14"
                    viewBox="0 0 14 14"
                    fill="none">
                    <path
                      d="M7 14C3.13306 14 0 10.8669 0 7C0 3.13306 3.13306 0 7 0C10.8669 0 14 3.13306 14 7C14 10.8669 10.8669 14 7 14ZM7.81573 9.94677L5.68468 7.90323H10.8387C11.2141 7.90323 11.5161 7.60121 11.5161 7.22581V6.77419C11.5161 6.39879 11.2141 6.09677 10.8387 6.09677H5.68468L7.81573 4.05323C8.08952 3.79073 8.09516 3.35323 7.82702 3.08508L7.51653 2.77742C7.25121 2.5121 6.82218 2.5121 6.55968 2.77742L2.81411 6.52016C2.54879 6.78549 2.54879 7.21452 2.81411 7.47702L6.55968 11.2226C6.825 11.4879 7.25403 11.4879 7.51653 11.2226L7.82702 10.9149C8.09516 10.6468 8.08952 10.2093 7.81573 9.94677Z"
                      fill="white" />
                  </svg>
                  前の記事
                </a>
              </li>

              <li class="p-blog-detail-pagination__item">
                <a href="#" class="p-blog-detail-pagination__link">記事一覧</a>
              </li>

              <li class="p-blog-detail-pagination__item">
                <a
                  href="#"
                  class="p-blog-detail-pagination__link p-blog-detail-pagination__link--next"
                  aria-label="次のページ">
                  次の記事
                  <svg
                    class="p-blog-detail-pagination__icon p-blog-detail-pagination__icon--next"
                    width="14"
                    height="14"
                    viewBox="0 0 14 14"
                    fill="none">
                    <path
                      d="M7 0C10.8669 0 14 3.13306 14 7C14 10.8669 10.8669 14 7 14C3.13306 14 0 10.8669 0 7C0 3.13306 3.13306 0 7 0ZM6.18427 4.05323L8.31532 6.09677H3.16129C2.78589 6.09677 2.48387 6.39879 2.48387 6.77419V7.22581C2.48387 7.60121 2.78589 7.90323 3.16129 7.90323H8.31532L6.18427 9.94677C5.91048 10.2093 5.90484 10.6468 6.17298 10.9149L6.48347 11.2226C6.74879 11.4879 7.17782 11.4879 7.44032 11.2226L11.1859 7.47984C11.4512 7.21452 11.4512 6.78549 11.1859 6.52298L7.44032 2.7746C7.175 2.50927 6.74597 2.50927 6.48347 2.7746L6.17298 3.08226C5.90484 3.35323 5.91048 3.79073 6.18427 4.05323H6.18427Z"
                      fill="white" />
                  </svg>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>

      <aside class="c-sidebar">
        <div class="c-sidebar__inner">
          <div class="c-sidebar__container">
            <div class="c-sidebar__clinic">
              <div class="c-sidebar__heading">
                <img
                  src="<?php echo get_template_directory_uri(); ?>/img/blog/sidebaer/pc/blog-sidebaer-pc-03.svg"
                  alt="" />
                <h2 class="c-sidebar__heading-title">クリニックの紹介</h2>
              </div>
              <div class="c-sidebar__clinic-image">
                <img
                  src="<?php echo get_template_directory_uri(); ?>/img/blog/sidebaer/pc/blog-sidebaer-pc-02.webp"
                  alt=""
                  width="670"
                  height="420" />
              </div>
              <div class="c-sidebar__clinic-text-items">
                <h3 class="c-sidebar__clinic-subtitle">
                  みなみ歯科クリニック
                </h3>
                <p class="c-sidebar__clinic-subtext">
                  お子様からご高齢の方まで、快適な空間で治療が受けられる場を作り、地域医療に貢献しきたいと考えております。
                </p>
                <a href="" class="c-sidebar__clinic-link">当院について
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="18"
                    height="18"
                    viewBox="0 0 18 18"
                    fill="none">
                    <path
                      d="M7.47002 14.3553C7.29126 14.3557 7.11803 14.2934 6.98038 14.1794C6.82392 14.0497 6.7255 13.863 6.70685 13.6606C6.68819 13.4583 6.75082 13.2568 6.88092 13.1006L10.3084 8.99995L7.00333 4.8916C6.87498 4.73355 6.81492 4.53085 6.83646 4.32838C6.858 4.12592 6.95936 3.94039 7.11809 3.81288C7.27812 3.67208 7.48962 3.60442 7.70166 3.6262C7.91369 3.64799 8.10702 3.75724 8.23507 3.92763L11.9303 8.51797C12.1623 8.80028 12.1623 9.20728 11.9303 9.48959L8.10501 14.0799C7.94935 14.2677 7.71348 14.37 7.47002 14.3553Z"
                      fill="#1391E6" />
                  </svg>
                </a>
              </div>
            </div>

            <div class="c-sidebar__article">
              <div class="c-sidebar__heading">
                <img
                  src="<?php echo get_template_directory_uri(); ?>/img/blog/sidebaer/pc/blog-sidebaer-pc-04.svg"
                  alt="" />
                <h2 class="c-sidebar__heading-title">新着記事</h2>
              </div>
              <div class="c-sidebar__article-cards">
                <a href="" class="c-sidebar__article-card">
                  <div class="c-sidebar__article-image">
                    <img
                      src="<?php echo get_template_directory_uri(); ?>/img/blog/sidebaer/pc/blog-sidebaer-pc-01.webp"
                      alt="" />
                  </div>
                  <div class="c-sidebar__article-content">
                    <span class="c-sidebar__article-category">お知らせ</span>
                    <p class="c-sidebar__article-text">
                      記事のタイトルが入ります。記事のタイトルが入ります。記事のタイトルが入ります。
                    </p>
                    <time
                      datetime="2020-02-14"
                      class="c-sidebar__article-date">2020.02.14</time>
                  </div>
                </a>
                <a href="" class="c-sidebar__article-card">
                  <div class="c-sidebar__article-image">
                    <img
                      src="<?php echo get_template_directory_uri(); ?>/img/blog/sidebaer/pc/blog-sidebaer-pc-01.webp"
                      alt="" />
                  </div>
                  <div class="c-sidebar__article-content">
                    <span class="c-sidebar__article-category">お知らせ</span>
                    <p class="c-sidebar__article-text">
                      記事のタイトルが入ります。記事のタイトルが入ります。記事のタイトルが入ります。
                    </p>
                    <time
                      datetime="2020-02-14"
                      class="c-sidebar__article-date">2020.02.14</time>
                  </div>
                </a>
                <a href="" class="c-sidebar__article-card">
                  <div class="c-sidebar__article-image">
                    <img
                      src="<?php echo get_template_directory_uri(); ?>/img/blog/sidebaer/pc/blog-sidebaer-pc-01.webp"
                      alt="" />
                  </div>
                  <div class="c-sidebar__article-content">
                    <span class="c-sidebar__article-category">お知らせ</span>
                    <p class="c-sidebar__article-text">
                      記事のタイトルが入ります。記事のタイトルが入ります。記事のタイトルが入ります。
                    </p>
                    <time
                      datetime="2020-02-14"
                      class="c-sidebar__article-date">2020.02.14</time>
                  </div>
                </a>
                <a href="" class="c-sidebar__article-card">
                  <div class="c-sidebar__article-image">
                    <img
                      src="<?php echo get_template_directory_uri(); ?>/img/blog/sidebaer/pc/blog-sidebaer-pc-01.webp"
                      alt="" />
                  </div>
                  <div class="c-sidebar__article-content">
                    <span class="c-sidebar__article-category">お知らせ</span>
                    <p class="c-sidebar__article-text">
                      記事のタイトルが入ります。記事のタイトルが入ります。記事のタイトルが入ります。
                    </p>
                    <time
                      datetime="2020-02-14"
                      class="c-sidebar__article-date">2020.02.14</time>
                  </div>
                </a>
                <a href="" class="c-sidebar__article-card">
                  <div class="c-sidebar__article-image">
                    <img
                      src="<?php echo get_template_directory_uri(); ?>/img/blog/sidebaer/pc/blog-sidebaer-pc-01.webp"
                      alt="" />
                  </div>
                  <div class="c-sidebar__article-content">
                    <span class="c-sidebar__article-category">お知らせ</span>
                    <p class="c-sidebar__article-text">
                      記事のタイトルが入ります。記事のタイトルが入ります。記事のタイトルが入ります。
                    </p>
                    <time
                      datetime="2020-02-14"
                      class="c-sidebar__article-date">2020.02.14</time>
                  </div>
                </a>
              </div>
            </div>
            <div class="c-sidebar__category">
              <div class="c-sidebar__heading">
                <img
                  src="<?php echo get_template_directory_uri(); ?>/img/blog/sidebaer/pc/blog-sidebaer-pc-05.svg"
                  alt="" />
                <h2 class="c-sidebar__heading-title">カテゴリー</h2>
              </div>
              <ul class="c-sidebar__category-lists">
                <li class="c-sidebar__category-list">
                  <a href="" class="c-sidebar__category-link"><svg
                      width="6"
                      height="12"
                      viewBox="0 0 6 12"
                      fill="none">
                      <path d="M0 0L6 6L0 12V0Z" fill="#1391E6" />
                    </svg>テキストテキスト</a>
                </li>
                <li class="c-sidebar__category-list">
                  <a href="" class="c-sidebar__category-link"><svg
                      width="6"
                      height="12"
                      viewBox="0 0 6 12"
                      fill="none">
                      <path d="M0 0L6 6L0 12V0Z" fill="#1391E6" />
                    </svg>テキストテキスト</a>
                </li>
                <li class="c-sidebar__category-list">
                  <a href="" class="c-sidebar__category-link"><svg
                      width="6"
                      height="12"
                      viewBox="0 0 6 12"
                      fill="none">
                      <path d="M0 0L6 6L0 12V0Z" fill="#1391E6" />
                    </svg>テキストテキスト</a>
                </li>
                <li class="c-sidebar__category-list">
                  <a href="" class="c-sidebar__category-link"><svg
                      width="6"
                      height="12"
                      viewBox="0 0 6 12"
                      fill="none">
                      <path d="M0 0L6 6L0 12V0Z" fill="#1391E6" />
                    </svg>テキストテキスト</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </aside>
    </div>
  </div>
</section>
<?php get_footer(); ?>