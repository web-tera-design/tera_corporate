<aside class="c-sidebar">
  <div class="c-sidebar__inner">
    <div class="c-sidebar__container">
      <div class="c-sidebar__clinic">
        <div class="c-sidebar__heading">
          <img
            src="<?php echo get_template_directory_uri(); ?>/img/blog/sidebaer/pc/blog-sidebaer-pc-07.svg"
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
            'post_type' => 'staff_blog',          // カスタム投稿タイプ 'blog'
            'posts_per_page' => 5,          // 5件表示
            'orderby' => 'date',            // 日付順
            'order' => 'DESC',              // 新しい順に並べる
          ]);
          ?>

          <?php if ($recent_posts->have_posts()) : ?>
            <?php while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
              <?php
              // カテゴリー（タクソノミー: blog_category）を取得
              $terms = get_the_terms(get_the_ID(), 'blog_category');
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
            src="<?php echo get_template_directory_uri(); ?>/img/blog/sidebaer/pc/blog-sidebaer-pc-02.svg"
            alt="" />
          <h2 class="c-sidebar__heading-title">カテゴリー</h2>
        </div>
        <ul class="c-sidebar__category-lists">
          <?php
          // 'blog_category' タクソノミーのカテゴリ一覧を取得
          $terms = get_terms([
            'taxonomy' => 'blog_category', // カスタムタクソノミー名
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