<?php get_header(); ?>
<section class="c-mv">
  <div class="c-mv__inner l-section__inner">
    <div class="c-mv__bg-image p-contact-mv__bg-image">
      <hgroup class="c-mv__bg-text">
        <h2 class="c-mv__bg-text--main">お問い合わせ</h2>
        <p class="c-mv__bg-text--sub">contact</p>
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

<section class="p-contact">
  <div class="p-contact__inner l-section__inner">
    <div class="p-contact__container">
      <div class="p-contact__content">
        <?php if (get_field('contact_message')) : ?>
          <div class="p-contact__message">
            <?php the_field('contact_message'); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>