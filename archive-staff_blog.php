<?php get_header(); ?>

<section class="c-mv">
  <div class="c-mv__inner l-section__inner">
    <div class="c-mv__bg-image p-blog-mv__bg-image">
      <hgroup class="c-mv__bg-text">
        <h2 class="c-mv__bg-text--main">スタッフブログ</h2>
        <p class="c-mv__bg-text--sub">STAFF BLOG</p>
      </hgroup>
    </div>
    <nav class="l-breadcrumbs c-breadcrumbs" aria-label="パンくずリスト">
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
    <div class="c-blog__archive p-blob__archive">
      <div class="c-blog__cards p-blog__cards">
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>
            <?php
            $date = get_the_date('U');
            $now = current_time('timestamp');
            $is_new = ($now - $date) < 86400 * 3; // 3日以内
            $terms = get_the_terms(get_the_ID(), 'blog_category');
            $category = $terms && !is_wp_error($terms) ? $terms[0]->name : '';
            ?>
            <a href="<?php the_permalink(); ?>" class="c-blog__card p-blog__card">
              <?php if ($is_new) : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/img/blog/archive/pc/blog-archive-pc-02.svg" class="c-blog__card-new-badge" alt="NEW">
              <?php endif; ?>
              <div class="c-blog__image p-blog__image">
                <?php if (has_post_thumbnail()) : ?>
                  <?php the_post_thumbnail('medium', ['width' => 266, 'height' => 202]); ?>
                <?php else : ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/img/blog-image.webp" alt="no image" width="266" height="202">
                <?php endif; ?>
              </div>
              <div class="c-blog__content p-blog__content">
                <span class="c-blog__label p-blog__label"><?php echo esc_html($category); ?></span>
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
          <ul class="c-pagination__list c-pagination__list--pc">
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
            global $wp_query;
            $total = $wp_query->max_num_pages;
            $current = max(1, get_query_var('paged'));
            $pages = [];
            // 1～6ページ
            for ($i = 1; $i <= min(6, $total); $i++) {
              $pages[] = $i;
            }
            // ドット
            if ($total > 7) {
              $pages[] = '...';
              $pages[] = $total;
            }
            // 出力
            foreach ($pages as $p) {
              if ($p === '...') {
                echo '<li class="c-pagination__item"><span class="c-pagination__link c-pagination__link--dots">…</span></li>';
              } else {
                $class = 'c-pagination__link';
                if ($p == $current) $class .= ' c-pagination__link--current';
                echo '<li class="c-pagination__item"><a href="' . esc_url(get_pagenum_link($p)) . '" class="' . $class . '">' . $p . '</a></li>';
              }
            }
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

          <ul class="c-pagination__list c-pagination__list--sp">
            <?php if (get_previous_posts_link()) : ?>
              <li class="c-pagination__item">
                <a href="<?php echo esc_url(get_previous_posts_page_link()); ?>"
                  class="c-pagination__link c-pagination__link--prev"
                  aria-label="前のページ">
                  <!-- SVG省略 -->
                  前へ
                </a>
              </li>
            <?php endif; ?>
            <?php
            // 1, 2, 3, ..., total
            $sp_pages = [];
            for ($i = 1; $i <= min(3, $total); $i++) $sp_pages[] = $i;
            if ($total > 4) {
              $sp_pages[] = '...';
              $sp_pages[] = $total;
            } elseif ($total == 4) {
              $sp_pages[] = 4;
            }
            foreach ($sp_pages as $p) {
              if ($p === '...') {
                echo '<li class="c-pagination__item"><span class="c-pagination__link c-pagination__link--dots">…</span></li>';
              } else {
                $class = 'c-pagination__link';
                if ($p == $current) $class .= ' c-pagination__link--current';
                echo '<li class="c-pagination__item"><a href="' . esc_url(get_pagenum_link($p)) . '" class="' . $class . '">' . $p . '</a></li>';
              }
            }
            ?>
            <?php if (get_next_posts_link()) : ?>
              <li class="c-pagination__item">
                <a href="<?php echo esc_url(get_next_posts_page_link()); ?>"
                  class="c-pagination__link c-pagination__link--next"
                  aria-label="次のページ">
                  次へ
                  <!-- SVG省略 -->
                </a>
              </li>
            <?php endif; ?>
          </ul>

        </nav>
      </div>


    </div>

    <?php get_sidebar(); ?>
  </div>
</section>
<?php get_footer(); ?>