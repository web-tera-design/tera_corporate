<?php get_header(); ?>

<?php
$parent_id = wp_get_post_parent_id(get_the_ID());
$parent_slug = $parent_id ? get_post_field('post_name', $parent_id) : '';
?>

<section class="c-mv">
  <div class="c-mv__inner l-section__inner">
    <div class="c-mv__bg-image p-contact-mv__bg-image">
      <hgroup class="c-mv__bg-text">
        <?php if ($parent_slug === 'reservation') : ?>
          <h2 class="c-mv__bg-text--main">WEB予約</h2>
          <p class="c-mv__bg-text--sub">Reserve</p>
        <?php else : ?>
          <h2 class="c-mv__bg-text--main">Contact</h2>
          <p class="c-mv__bg-text--sub">お問い合わせ</p>
        <?php endif; ?>
      </hgroup>
    </div>
    <nav class="l-breadcrumbs" aria-label="パンくずリスト">
      <ol class="l-breadcrumb__list">
        <?php if (function_exists('bcn_display')) bcn_display(); ?>
      </ol>
    </nav>
  </div>
</section>

<section class="p-contact">
  <div class="p-contact__inner l-section__inner">
    <div class="p-contact__container">
      <div class="p-contact__content">
        <?php if ($parent_slug === 'reservation') : ?>
          <?php if (get_field('reservation_thanks')) : ?>
            <p class="p-contact__message">
              <?php echo nl2br(get_field('reservation_thanks')); ?>
            </p>
          <?php endif; ?>
        <?php else : ?>
          <?php if (get_field('contact_message')) : ?>
            <div class="p-contact__message">
              <?php the_field('contact_message'); ?>
            </div>
          <?php endif; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>