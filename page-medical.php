<?php get_header(); ?>

<section class="c-mv">
  <div class="c-mv__inner l-section__inner">
    <div class="c-mv__bg-image p-medical-mv__bg-image">
      <hgroup class="c-mv__bg-text">
        <h2 class="c-mv__bg-text--main">診療案内</h2>
        <p class="c-mv__bg-text--sub">MEDICAL</p>
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

<section class="p-medical">
  <div class="p-medical__inner l-section__inner">
    <div class="p-medical-link__container">
      <div class="p-medical-link__container">
        <?php
        // 診療区分（親カテゴリ）を定義
        $parents = [
          'general' => [ // スラッグ（カテゴリ識別子）
            'title' => '一般診療',         // 見出しタイトル
            'label' => '保険対象',         // 小ラベル
            'class' => ''                  // 特別なclassなし
          ],
          'special' => [
            'title' => '特殊診療',
            'label' => '実費',
            'class' => 'p-medical-link__wrapper__rower' // 特殊診療だけ見た目用クラスを追加
          ]
        ];

        // 各診療区分（general / special）をループ
        foreach ($parents as $parent_slug => $info) :

          // 親ターム（診療区分）の情報を取得（タクソノミー：plan_category）
          $parent_term = get_term_by('slug', $parent_slug, 'plan_category');

          // 親タームが存在しない場合はスキップ
          if (!$parent_term) continue;

          // 子ターム（一般歯科、小児歯科など）を取得
          $children = get_terms([
            'taxonomy' => 'plan_category',            // 対象のタクソノミー
            'parent' => $parent_term->term_id,        // 親タームIDで絞る
            'hide_empty' => false                     // 投稿がなくても出力（trueにすると投稿があるカテゴリのみ）
          ]);
        ?>

          <!-- ラッパー：一般診療／特殊診療ごとに分かれる -->
          <div class="p-medical-link__wrapper <?php echo $info['class']; ?>">
            <div class="p-medical-link__menu">
              <!-- 見出し（例：一般診療） -->
              <h2 class="p-medical-link__text"><?php echo esc_html($info['title']); ?></h2>

              <!-- ラベル（例：保険対象／実費） -->
              <span class="p-medical-link__label<?php echo ($parent_slug === 'special') ? ' p-medical-link_label--red' : ''; ?>">
                <?php echo esc_html($info['label']); ?>
              </span>
            </div>

            <div class="p-medical-link__items">
              <?php foreach ($children as $child) : ?>
                <div class="p-medical-link__item">
                  <!-- /medical ページ内のセクションID（子カテゴリのスラッグ）にリンク -->
                  <a href="<?php echo esc_url(home_url('/medical/#' . $child->slug)); ?>" class="p-medical-link">
                    <?php echo esc_html($child->name); ?> <!-- 表示名（例：小児歯科） -->
                  </a>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<section class="p-medical-detail">
  <div class="p-medical-detail__inner">
    <div class="p-medical-detail__container">
      <?php
      $terms = [
        'general' => ['title' => '一般診療', 'class' => 'p-medical-general', 'bg' => 'medical-general-pc-11.svg'],
        'special' => ['title' => '特殊診療', 'class' => 'p-medical-specialized', 'bg' => 'medical-general-pc-09.svg'],
      ];

      foreach ($terms as $slug => $config) :
        $args = [
          'post_type' => 'plan',
          'posts_per_page' => -1,
          'tax_query' => [[
            'taxonomy' => 'plan_category',
            'field' => 'slug',
            'terms' => $slug
          ]]
        ];
        $query = new WP_Query($args);
        if ($query->have_posts()) :
      ?>
          <section class="<?php echo $config['class']; ?>" id="<?php echo $slug; ?>">
            <div class="c-medical__bg-top"></div>
            <div class="<?php echo $config['class']; ?>__inner">
              <div class="<?php echo $config['class']; ?>__container">
                <div class="p-index-medical__heading">
                  <h2 class="c-heading"><?php echo $config['title']; ?></h2>
                </div>
                <div class="<?php echo $config['class']; ?>__items">
                  <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="<?php echo $config['class']; ?>__item" id="<?php echo esc_attr(get_post_field('post_name', get_the_ID())); ?>">
                      <hgroup class="<?php echo $config['class']; ?>__heading">
                        <h2 class="<?php echo $config['class']; ?>__main"><?php the_title(); ?></h2>
                        <p class="<?php echo $config['class']; ?>__sub"><?php the_field('trouble'); ?></p>
                      </hgroup>
                      <div class="<?php echo $config['class']; ?>__content">
                        <div class="<?php echo $config['class']; ?>__text">
                          <p class="<?php echo str_replace('p-', '', $config['class']); ?>__text--main">
                            <?php the_field('description'); ?>
                          </p>
                          <p class="<?php echo str_replace('p-', '', $config['class']); ?>__text--sub">
                            <?php the_field('description_sub'); ?>
                          </p>
                        </div>

                        <div class="<?php echo $config['class']; ?>__image">
                          <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('full', ['width' => 840, 'height' => 630]); ?>
                          <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/img/common/noimg.jpg" alt="代替画像" width="840" height="630" />
                          <?php endif; ?>
                        </div>
                        <img class="<?php echo $config['class']; ?>__bg-image"
                          src="<?php echo get_template_directory_uri(); ?>/img/medical/general/pc/<?php echo $config['bg']; ?>" alt=""
                          width="100" height="80" />
                      </div>
                    </div>
                  <?php endwhile; ?>
                </div>
              </div>
            </div>
            <div class="c-medical__bg-bottom-main p-medical__bg-bottom-main"></div>
            <div class="c-medical__bg-bottom-sub p-medical__bg-bottom-sub"></div>
          </section>
      <?php endif;
        wp_reset_postdata();
      endforeach; ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>