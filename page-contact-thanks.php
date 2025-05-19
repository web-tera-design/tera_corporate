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
        <p class="p-contact__message">
          お問い合わせありがとうございました。<br />
          3営業日以内に返信いたしますので、しばらくお待ちいただけますと幸いです。<br />
          <span class="p-contact__message--accent">※3営業日以内に当院からの返信がない場合には、お電話(TEL
            03-1234-5678)にてお問い合わせ下さい。</span>
        </p>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>