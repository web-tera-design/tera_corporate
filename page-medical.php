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
            <li class="l-breadcrumb__item">
              <a class="l-breadcrumb__link" href="">ホーム</a>
            </li>
            <li class="l-breadcrumb__item">
              <span class="l-breadcrumb__current">当院について</span>
            </li>
          </ol>
        </nav>
      </div>
    </section>

    <section class="p-medical">
      <div class="p-medical__inner l-section__inner">
        <div class="p-medical-link__container">
          <div class="p-medical-link__wrapper">
            <div class="p-medical-link__menu">
              <h2 class="p-medical-link__text">一般診療</h2>
              <span class="p-medical-link__label">保険対象</span>
            </div>
            <div class="p-medical-link__items">
              <div class="p-medical-link__item">
                <a href="" class="p-medical-link">一般歯科</a>
              </div>
              <div class="p-medical-link__item">
                <a href="" class="p-medical-link">小児歯科</a>
              </div>
              <div class="p-medical-link__item">
                <a href="" class="p-medical-link">予防歯科</a>
              </div>
            </div>
          </div>
          <div class="p-medical-link__wrapper p-medical-link__wrapper__rower">
            <div class="p-medical-link__menu">
              <h2 class="p-medical-link__text">特殊診療</h2>
              <span class="p-medical-link__label p-medical-link_label--red"
                >実費</span
              >
            </div>
            <div class="p-medical-link__items">
              <div class="p-medical-link__item">
                <a href="" class="p-medical-link">入れ歯</a>
              </div>
              <div class="p-medical-link__item">
                <a href="" class="p-medical-link">矯正歯科</a>
              </div>
              <div class="p-medical-link__item">
                <a href="" class="p-medical-link">ホワイトニング</a>
              </div>
              <div class="p-medical-link__item">
                <a href="" class="p-medical-link">口腔外科</a>
              </div>
              <div class="p-medical-link__item">
                <a href="" class="p-medical-link">レーザー治療</a>
              </div>
            </div>
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
                    <div class="<?php echo $config['class']; ?>__item">
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
              <div class="c-medical__bg-bottom-main"></div>
              <div class="c-medical__bg-bottom-sub"></div>
            </section>
            <?php endif; wp_reset_postdata(); endforeach; ?>
        </div>
      </div>
    </section>

<?php get_footer(); ?>