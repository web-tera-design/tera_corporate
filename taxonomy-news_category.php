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

<section class="c-blog p-blog">
  <div class="c-blog__container p-blog__container">
    <div class="c-blog__archive">
      <div class="c-blog__cards p-blog__cards">
        <?php if (have_posts()) : ?>
          <?php
          $taxonomy = get_queried_object()->taxonomy; // ← 動的にタクソノミーを取得
          ?>
          <?php while (have_posts()) : the_post(); ?>
            <?php
            $date = get_the_date('U');
            $now = current_time('timestamp');
            $is_new = ($now - $date) < 86400 * 3; // 3日以内

            // 投稿に紐づくカテゴリ名（現在のタクソノミー）を取得
            $terms = get_the_terms(get_the_ID(), $taxonomy);
            $category = $terms && !is_wp_error($terms) ? $terms[0]->name : '';
            ?>
            <a href="<?php the_permalink(); ?>" class="c-blog__card p-blog__card">
              <div class="c-blog__image p-blog__image">
                <?php if (has_post_thumbnail()) : ?>
                  <?php the_post_thumbnail('medium', ['width' => 266, 'height' => 202]); ?>
                <?php else : ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/img/blog-image.webp" alt="no image" width="266" height="202">
                <?php endif; ?>
              </div>
              <div class="c-blog__content p-blog__content">
                <span class="c-blog__label"><?php echo esc_html($category); ?></span>
                <p class="c-blog__text p-blog__text"><?php the_title(); ?></p>
                <time class="c-blog__datetime p-blog__datetime entry-date published" datetime="<?php echo get_the_date('Y-m-d'); ?>" itemprop="datePublished">
                  <?php echo get_the_date('Y/m/d'); ?>
                </time>
              </div>
            </a>
          <?php endwhile; ?>
        <?php else : ?>
          <p>記事が見つかりませんでした。</p>
        <?php endif; ?>
      </div>


      <div class="c-pagination-container">
        <nav class="c-pagination" role="navigation" aria-label="ページ送り">
          <ul class="c-pagination__list">

            <?php if (get_previous_posts_link()) : ?>
              <li class="c-pagination__item">
                <a href="<?php echo esc_url(get_previous_posts_page_link()); ?>"
                  class="c-pagination__link c-pagination__link--prev"
                  aria-label="前のページ">
                  <svg class="c-pagination__icon c-pagination__icon--prev" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 14C3.133 14 0 10.867 0 7S3.133 0 7 0s7 3.133 7 7-3.133 7-7 7Zm0.816-4.053L5.685 7.903h5.154a0.677 0.677 0 0 0 0.677-0.677v-0.452a0.677 0.677 0 0 0-0.677-0.677H5.685l2.131-2.044a0.5 0.5 0 0 0-0.288-0.868L6.56 2.777a0.5 0.5 0 0 0-0.707 0L2.814 6.52a0.5 0.5 0 0 0 0 0.957l3.745 3.745a0.5 0.5 0 0 0 0.707 0l0.31-0.308a0.5 0.5 0 0 0-0.06-0.747Z" fill="white" />
                  </svg>
                  前へ
                </a>
              </li>
            <?php endif; ?>

            <?php
            $pagination_links = paginate_links([
              'mid_size' => 2,
              'type' => 'array',
              'prev_next' => false, // ここが大事：前へ／次へを出さない
            ]);

            if ($pagination_links) :
              foreach ($pagination_links as $link) :
                // class名の置き換え
                $link = str_replace('page-numbers current', 'c-pagination__link c-pagination__link--current', $link);
                $link = str_replace('page-numbers dots', 'c-pagination__link c-pagination__link--dots', $link);
                $link = str_replace('page-numbers', 'c-pagination__link', $link);
                echo '<li class="c-pagination__item">' . $link . '</li>';
              endforeach;
            endif;
            ?>

            <?php if (get_next_posts_link()) : ?>
              <li class="c-pagination__item">
                <a href="<?php echo esc_url(get_next_posts_page_link()); ?>"
                  class="c-pagination__link c-pagination__link--next"
                  aria-label="次のページ">
                  次へ
                  <svg class="c-pagination__icon c-pagination__icon--next" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M7 0C10.8669 0 14 3.13306 14 7C14 10.8669 10.8669 14 7 14C3.13306 14 0 10.8669 0 7C0 3.13306 3.13306 0 7 0ZM6.18427 4.05323L8.31532 6.09677H3.16129C2.78589 6.09677 2.48387 6.39879 2.48387 6.77419V7.22581C2.48387 7.60121 2.78589 7.90323 3.16129 7.90323H8.31532L6.18427 9.94677C5.91048 10.2093 5.90484 10.6468 6.17298 10.9149L6.48347 11.2226C6.74879 11.4879 7.17782 11.4879 7.44032 11.2226L11.1859 7.47984C11.4512 7.21452 11.4512 6.78549 11.1859 6.52298L7.44032 2.7746C7.175 2.50927 6.74597 2.50927 6.48347 2.7746L6.17298 3.08226C5.90484 3.35323 5.91048 3.79073 6.18427 4.05323H6.18427Z"
                      fill="white" />
                  </svg>
                </a>
              </li>
            <?php endif; ?>

          </ul>
        </nav>
      </div>


    </div>

    <aside class="c-sidebar">
      <div class="c-sidebar__inner l-section__inner">
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
              <a href="<?php echo home_url('/about/'); ?>" class="c-sidebar__clinic-link">当院について
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
              <?php
              // 最新の blog 投稿を5件取得するクエリを作成
              $recent_posts = new WP_Query([
                'post_type' => 'news',          // カスタム投稿タイプ 'blog'
                'posts_per_page' => 5,          // 5件表示
                'orderby' => 'date',            // 日付順
                'order' => 'DESC',              // 新しい順に並べる
              ]);
              ?>

              <?php if ($recent_posts->have_posts()) : ?>
                <?php while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                  <?php
                  // カテゴリー（タクソノミー: blog_category）を取得
                  $terms = get_the_terms(get_the_ID(), 'news_category');
                  $category = $terms && !is_wp_error($terms) ? $terms[0]->name : '';
                  ?>

                  <a href="<?php the_permalink(); ?>" class="c-sidebar__article-card">
                    <div class="c-sidebar__article-image">
                      <?php if (has_post_thumbnail()) : ?>
                        <!-- アイキャッチ画像を表示（設定されていれば） -->
                        <?php the_post_thumbnail('thumbnail'); ?>
                      <?php else : ?>
                        <!-- アイキャッチがない場合はダミー画像を表示 -->
                        <img src="<?php echo get_template_directory_uri(); ?>/img/blog/sidebaer/pc/blog-sidebaer-pc-01.webp" alt="no image" />
                      <?php endif; ?>
                    </div>

                    <div class="c-sidebar__article-content">
                      <!-- カテゴリー名を表示 -->
                      <span class="c-sidebar__article-category"><?php echo esc_html($category); ?></span>

                      <!-- 記事タイトルを表示 -->
                      <p class="c-sidebar__article-text"><?php the_title(); ?></p>

                      <!-- 投稿日（マークアップ的にも適切に） -->
                      <time datetime="<?php echo get_the_date('Y-m-d'); ?>" class="c-sidebar__article-date">
                        <?php echo get_the_date('Y.m.d'); ?>
                      </time>
                    </div>
                  </a>
                <?php endwhile; ?>

                <?php wp_reset_postdata(); // クエリを初期化（他のループへの影響を防ぐ） 
                ?>
              <?php else : ?>
                <!-- 記事が1件もなかった場合の表示 -->
                <p>新着記事はありません。</p>
              <?php endif; ?>
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
              <?php
              // 'blog_category' タクソノミーのカテゴリ一覧を取得
              $terms = get_terms([
                'taxonomy' => 'news_category', // カスタムタクソノミー名
                'hide_empty' => true,          // 投稿が1件もないカテゴリは表示しない
              ]);
              ?>

              <?php if (!empty($terms) && !is_wp_error($terms)) : ?>
                <?php foreach ($terms as $term) : ?>
                  <li class="c-sidebar__category-list">
                    <a href="<?php echo esc_url(get_term_link($term)); ?>" class="c-sidebar__category-link">
                      <svg width="6" height="12" viewBox="0 0 6 12" fill="none">
                        <path d="M0 0L6 6L0 12V0Z" fill="#1391E6" />
                      </svg>
                      <?php echo esc_html($term->name); ?>
                    </a>
                  </li>
                <?php endforeach; ?>
              <?php else : ?>
                <li>カテゴリはありません。</li>
              <?php endif; ?>
            </ul>

          </div>
        </div>
      </div>
    </aside>
  </div>
</section>
<?php get_footer(); ?>