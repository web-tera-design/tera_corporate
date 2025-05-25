<?php get_header(); ?>

<section class="c-mv">
  <div class="c-mv__inner l-section__inner">
    <div class="c-mv__bg-image p-blog-mv__bg-image">
      <hgroup class="c-mv__bg-text">
        <h2 class="c-mv__bg-text--main">スタッフブログ</h2>
        <p class="c-mv__bg-text--sub">STAFF BLOG</p>
      </hgroup>
    </div>
    <div class="l-breadcrumbs" aria-label="パンくずリスト">
      <?php if (function_exists('bcn_display')) {
        bcn_display();
      } ?>
    </div>
  </div>
</section>

<section class="p-blog-detail">
  <div class="p-blog-detail__inner l-section__inner">
    <div class="p-blog-detail__container">
      <div class="p-blog-detail__archive">
        <div class="p-blog-detail__content">
          <div class="p-blog-detail__heading">
            <h2 class="p-blog-detail__heading-title">
              <?php the_title(); ?>
            </h2>
          </div>
          <div class="p-blog-detail__meta">
            <div class="p-blog-detail__meta-date">
              <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
                <path
                  d="M3.73514 3.79509C3.17755 3.95269 2.73412 4.37605 2.55089 4.92575L0 12.5781L0.401678 12.9798L4.50623 8.87526C4.42447 8.70409 4.37498 8.51487 4.37498 8.31253C4.37498 7.58765 4.96259 7.00003 5.68747 7.00003C6.41235 7.00003 6.99997 7.58765 6.99997 8.31253C6.99997 9.03741 6.41235 9.62502 5.68747 9.62502C5.48513 9.62502 5.29591 9.57553 5.12474 9.49377L1.02019 13.5983L1.42187 14L9.07425 11.4491C9.62395 11.2659 10.0473 10.8224 10.2049 10.2649L11.3749 6.12504L7.87496 2.62506L3.73514 3.79509ZM13.6155 2.02814L11.9719 0.38452C11.4592 -0.128173 10.6276 -0.128173 10.115 0.38452L8.56867 1.9308L12.0692 5.43133L13.6155 3.88505C14.1282 3.37236 14.1282 2.54111 13.6155 2.02814H13.6155Z"
                  fill="#1391E6" />
              </svg>
              <time class="p-blog-detail__meta-date-text"><?php echo get_the_time('Y.m.d'); ?></time>
            </div>
            <?php
            // カテゴリ（カスタムタクソノミー）の取得
            $terms = get_the_terms(get_the_ID(), 'blog_category');
            if ($terms && !is_wp_error($terms)) :
              $term = $terms[0]; // 複数カテゴリがある場合は最初の1つを表示
            ?>
              <span class="p-blog-detail__meta-category"><?php echo esc_html($term->name); ?></span>
            <?php endif; ?>
          </div>
          <?php if (get_field('heading_text')) : ?>
            <div class="p-blog-detail__text">
              <?php the_field('heading_text'); ?>
            </div>
          <?php endif; ?>

          <?php if (get_field('heading_subtext')) : ?>
            <p class="p-blog-detail__subtext">
              <?php echo nl2br(esc_html(get_field('heading_subtext'))); ?>
            </p>
          <?php endif; ?>
        </div>
        <?php if (get_field('heading2')) : ?>
          <div class="p-blog-detail__content2">
            <div class="p-blog-detail__content2-heading">
              <h3 class="p-blog-detail__content2-heading-title">
                <?php the_field('heading2'); ?>
              </h3>

              <?php
              $image = get_field('heading2_image');
              if ($image) :
              ?>
                <div class="p-blog-detail__content2-image">
                  <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                </div>
              <?php endif; ?>
            </div>
          </div>
        <?php endif; ?>


        <?php if (get_field('heading3')) : ?>
          <div class="p-blog-detail__content3">
            <div class="p-blog-detail__content3-heading">
              <h3 class="p-blog-detail__content3-heading-title">
                <?php the_field('heading3'); ?>
              </h3>
            </div>
            <?php if (get_field('heading3_text')) : ?>
              <p class="p-blog-detail__content3-text">
                <?php echo nl2br(get_field('heading3_text')); ?>
              </p>
            <?php endif; ?>
          </div>
        <?php endif; ?>

        <?php if (get_field('heading4')) : ?>
          <div class="p-blog-detail__content4">
            <div class="p-blog-detail__content4-heading">
              <h4 class="p-blog-detail__content4-heading-title">
                <?php the_field('heading4'); ?>
              </h4>
            </div>
            <?php if (get_field('heading4_text')) : ?>
              <p class="p-blog-detail__content4-text">
                <?php echo nl2br(get_field('heading4_text')); ?>
              </p>
            <?php endif; ?>
          </div>
        <?php endif; ?>

        <?php
        $list_raw = get_field('list_items');
        if ($list_raw) :
          $list_array = explode("\n", $list_raw); // 改行で分割
        ?>
          <ul class="p-blog-detail__content__items">
            <?php foreach ($list_array as $item) : ?>
              <li class="p-blog-detail__content__item">
                <?php echo esc_html(trim($item)); ?>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
        <div class="p-blog-detail-pagination-container">
          <nav
            class="p-blog-detail-pagination"
            role="navigation"
            aria-label="ページ送り">
            <ul class="p-blog-detail-pagination__list">
              <li class="p-blog-detail-pagination__item">
                <?php
                $prev_post = get_previous_post();
                if ($prev_post):
                  $prev_url = get_permalink($prev_post->ID);
                ?>
                  <a
                    href="<?php echo esc_url($prev_url); ?>"
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
                  <?php endif; ?>'
              </li>

              <li class="p-blog-detail-pagination__item">
                <a href="<?php echo esc_url(get_post_type_archive_link('staff_blog')); ?>" class="p-blog-detail-pagination__link">記事一覧</a>
              </li>

              <li class="p-blog-detail-pagination__item">
                <?php
                $next_post = get_next_post();
                if ($next_post):
                  $next_url = get_permalink($next_post->ID);
                ?>
                  <a
                    href="<?php echo esc_url($next_url); ?>"
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
                  </a>'
                <?php endif; ?>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <?php get_sidebar(); ?>
    </div>
  </div>
</section>
<?php get_footer(); ?>