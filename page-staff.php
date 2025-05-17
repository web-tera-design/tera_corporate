<?php get_header(); ?>

<section class="c-mv">
  <div class="c-mv__inner l-section__inner">
    <div class="c-mv__bg-image p-staff-mv__bg-image">
      <hgroup class="c-mv__bg-text">
        <h2 class="c-mv__bg-text--main">スタッフ紹介</h2>
        <p class="c-mv__bg-text--sub">STAFF</p>
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

<section class="p-staff-message" id="message">
  <div class="p-staff-message__inner l-section__inner">
    <div class="p-staff-message__heading">
      <h2 class="c-heading">院長のあいさつ</h2>
    </div>
    <div class="p-staff-message__container">
      <div class="p-staff-message__content">
        <div class="p-staff-message__heading">
          <h3 class="p-staff-message__heading-text">
            気軽に相談できる 街の歯医者さんでありたい。
          </h3>
          <p class="p-staff-message__text">
            当院は治療はもちろん、予防歯科にも力を入れておりますので、お口に関する相談だけでもお越しいただきたいと考えております。
          </p>
          <p class="p-staff-message__subtext">
            「患部を直すこと」より「未然に防ぐこと」が最も良い歯科医療と言えますので、些細なことでも気軽に話せる街の歯医者さんとして、明るい街づくりに貢献していきたいと考えております。
          </p>
          <p class="p-staff-message__credit">
            みなみ歯科クリニック<br />院長　南 俊雄
          </p>
        </div>
      </div>
      <div class="p-staff-message__image">
        <img src="<?php echo get_template_directory_uri(); ?>/img/staff/message/pc/staff-message-pc-01.webp" alt="" />
      </div>
      <div class="p-staff-message__profile">
        <div class="p-staff-message__profile-content">
          <p class="p-staff-message__profile-heading">経歴</p>
          <div class="p-staff-message__profile-items">
            <div class="p-staff-message__profile-item">
              <p class="p-staff-message__profile-date">2004年</p>
              <p class="p-staff-message__profile-text">
                東京医科歯科大学歯学部 卒業
              </p>
            </div>
            <div class="p-staff-message__profile-item">
              <p class="p-staff-message__profile-date">2008年</p>
              <p class="p-staff-message__profile-text">
                東京歯科大学歯学研究科大学院修了<br />博士(歯学)取得
              </p>
            </div>
            <div class="p-staff-message__profile-item">
              <p class="p-staff-message__profile-date">2012年</p>
              <p class="p-staff-message__profile-text">
                みなみ歯科クリニック 開院
              </p>
            </div>
          </div>
        </div>
        <div class="p-staff-message__profile-content">
          <p
            class="p-staff-message__profile-heading p-staff-message__profile-subheading">
            資格
          </p>
          <div class="p-staff-message__profile-items">
            <div class="p-staff-message__profile-item">
              <p class="p-staff-message__profile-text">
                歯科医師臨床研修指導歯科医
              </p>
            </div>
            <div class="p-staff-message__profile-item">
              <p class="p-staff-message__profile-text">博士(歯学)</p>
            </div>
            <div class="p-staff-message__profile-item">
              <p class="p-staff-message__profile-text">衛生検査技師</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="p-staff-message__swiper">
  <!-- クラス名・ESC・TAB・swiper数字・TABで推移 -->
  <div class="p-staff-message__swiper">
    <div class="p-staff-message__swiper-inner">
      <div class="p-staff-message__swiper-container">
        <div class="swiper p-staff-message__swiper --swiper2">
          <!-- スライド止まらないループはswiper-wrapperにtransition-timing-function: linear; */ -->
          <div class="swiper-wrapper p-staff-message__swiper-wrapper">
            <div class="swiper-slide p-staff-message__swiper-slide">
              <img
                src="<?php echo get_template_directory_uri(); ?>/img/staff/message/pc/staff-message-pc-03.webp"
                alt=""
                width="610"
                height="458" />
            </div>
            <div class="swiper-slide p-staff-message__swiper-slide">
              <img
                src="<?php echo get_template_directory_uri(); ?>/img/staff/message/pc/staff-message-pc-04.webp"
                alt=""
                width="610"
                height="458" />
            </div>
            <div class="swiper-slide p-staff-message__swiper-slide">
              <img
                src="<?php echo get_template_directory_uri(); ?>/img/staff/message/pc/staff-message-pc-05.webp"
                alt=""
                width="610"
                height="458" />
            </div>
            <div class="swiper-slide p-staff-message__swiper-slide">
              <img
                src="<?php echo get_template_directory_uri(); ?>/img/staff/message/pc/staff-message-pc-06.webp"
                alt=""
                width="610"
                height="458" />
            </div>
            <div class="swiper-slide p-staff-message__swiper-slide">
              <img
                src="<?php echo get_template_directory_uri(); ?>/img/staff/message/pc/staff-message-pc-07.webp"
                alt=""
                width="610"
                height="458" />
            </div>
          </div>
        </div>
        <div class="p-staff-message__swiper-bottom">
          <div class="swiper-button-prev --swiper2"></div>
          <div class="swiper-pagination --swiper2"></div>
          <div class="swiper-button-next --swiper2"></div>
        </div>
      </div>
    </div>
  </div>
</section>


<?php
$terms = [
  'dental-hygienist' => '歯科衛生士',
  'dental-assistant' => '歯科助手',
];
?>

<section class="c-staff-group" id="members">
  <div class="c-staff-group__inner l-section__inner">
    <h2 class="c-heading">スタッフ紹介</h2>

    <?php foreach ($terms as $slug => $label) :
      $args = array(
        'post_type' => 'staffs',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'tax_query' => array(
          array(
            'taxonomy' => 'staff_category',
            'field'    => 'slug',
            'terms'    => $slug,
          ),
        ),
      );
      $staff_query = new WP_Query($args);
    ?>

      <?php if ($staff_query->have_posts()) : ?>
        <div class="c-staff-group__container">
          <p class="c-staff-group__heading"><?php echo esc_html($label); ?></p>
          <div class="c-staff-group__items">
            <?php while ($staff_query->have_posts()) : $staff_query->the_post(); ?>
              <div class="c-staff-group__item" itemscope itemtype="https://schema.org/Person">
                <div class="c-staff-group__image">
                  <?php the_post_thumbnail('medium', ['alt' => get_the_title(), 'itemprop' => 'image']); ?>
                </div>
                <p class="c-staff-group__name">
                  <?php echo esc_html($label); ?>
                  <span class="c-staff-group__subname" itemprop="name"><?php the_title(); ?></span>
                </p>
                <div class="c-staff-group__content">
                  <div class="c-p-staff-group__texts">
                    <p class="c-staff-group__text">出身地</p>
                    <p class="c-staff-group__subtext"><?php the_field('hometown'); ?></p>
                  </div>
                  <div class="c-p-staff-group__texts">
                    <p class="c-staff-group__text">趣味</p>
                    <p class="c-staff-group__subtext"><?php the_field('hobby'); ?></p>
                  </div>
                  <div class="c-p-staff-group__texts">
                    <p class="c-staff-group__text">好きな食べ物</p>
                    <p class="c-staff-group__subtext"><?php the_field('favorite_food'); ?></p>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
          </div>
        </div>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>

    <?php endforeach; ?>
  </div>

  <!-- noindex制御は以下をhead内または専用テンプレートで設定 -->
  <?php if (is_singular('staffs')) : ?>
    <meta name="robots" content="noindex, nofollow">
  <?php endif; ?>
</section>

<?php get_footer(); ?>