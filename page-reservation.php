<?php get_header(); ?>
<section class="c-mv">
  <div class="c-mv__inner l-section__inner">
    <div class="c-mv__bg-image p-contact-mv__bg-image">
      <hgroup class="c-mv__bg-text">
        <h2 class="c-mv__bg-text--main">WEB予約</h2>
        <p class="c-mv__bg-text--sub">RESERVE</p>
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

<section class="p-reservation">
  <div class="p-reservation__inner l-section__inner">
    <div class="p-reservation__container">
      <div class="p-reservation__content">
        <div class="p-reservation__tel">
          <h2 class="p-reservation__tel-heading">
            <?php the_field('heading'); ?>
          </h2>
          <div class="p-reservation__tel-link">
            <a class="p-reservation__tel-text" href="tel:<?php the_field('tel_number'); ?>">
              <svg width="28" height="29" viewBox="0 0 28 29" fill="none">
                <path
                  d="M27.2013 20.3527L21.0763 17.7277C20.5388 17.4986 19.9145 17.6524 19.545 18.105L16.8325 21.4191C12.5754 19.412 9.14944 15.986 7.14227 11.729L10.4564 9.01641C10.91 8.6475 11.064 8.02257 10.8337 7.48515L8.20869 1.36007C7.95498 0.778401 7.32358 0.459255 6.70477 0.599907L1.0172 1.91242C0.421652 2.04995 -0.000136913 2.58036 3.33381e-08 3.19158C3.33381e-08 17.2191 11.3697 28.5669 25.3753 28.5669C25.9867 28.5673 26.5174 28.1454 26.655 27.5497L27.9675 21.8621C28.1073 21.2403 27.7857 20.6069 27.2013 20.3527Z"
                  fill="#1391E6" />
              </svg>
              <?php the_field('tel_number'); ?>
            </a>
            <p class="reservation__tel-info"><?php the_field('tel_info'); ?></p>
          </div>
          <p class="p-reservation__tel-message">
            <?php echo nl2br(get_field('tel_message')); ?>
          </p>
        </div>
        <div class="p-reservation__mail">
          <h2 class="p-reservation__mail-heading">
            <?php the_field('mail_heading'); ?>
          </h2>
          <p class="p-reservation__mail-message">
            <?php echo nl2br(get_field('mail_info')); ?>
          </p>
        </div>
      </div>

      <div class="p-reservation__form-container">
        <h2 class="c-heading">お問い合わせ フォーム</h2>
        <div class="p-reservation__form">
          <?php echo do_shortcode('[contact-form-7 id="399be11" title="Web予約"]'); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>