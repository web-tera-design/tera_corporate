<?php get_header(); ?>

<section class="c-mv">
  <div class="c-mv__inner l-section__inner">
    <div class="c-mv__bg-image p-contact-mv__bg-image">
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

<section class="p-contact">
  <div class="p-contact__inner l-section__inner">
    <div class="p-contact__container">
      <div class="p-contact__content">
        <p class="p-contact__message">
          お急ぎの方は、お電話(TEL 03-1234-5678)での連絡がスムーズです。<br />
          以下のフォームからお問い合わせ頂いた場合、ご連絡が2～3日後になる場合がございます。<br />
          また、メールアドレスの入力間違いにより送信できない事が発生しておりますので、メールアドレスは正しくご入力下さい。<br />
          <span class="p-contact__message--accent">※3営業日以内に当院からの返信がない場合には、お電話(TEL
            03-1234-5678)にてお問い合わせ下さい。</span>
        </p>
      </div>
      <div class="p-contact__form-container">
        <h2 class="c-heading">お問い合わせ フォーム</h2>
        <form action="" method="post" class="p-contact__form">
          <!-- 名前 -->
          <div class="p-contact__row">
            <p class="p-contact__head">
              お名前 <span class="p-contact__required">必須</span>
            </p>
            <div class="p-contact__data">
              <input
                type="text"
                name="your-name"
                placeholder="山田 太郎"
                required />
            </div>
          </div>

          <!-- フリガナ -->
          <div class="p-contact__row">
            <p class="p-contact__head">
              フリガナ <span class="p-contact__required">必須</span>
            </p>
            <div class="p-contact__data">
              <input
                type="text"
                name="your-kana"
                placeholder="ヤマダ タロウ"
                required />
            </div>
          </div>

          <!-- 電話番号 -->
          <div class="p-contact__row">
            <p class="p-contact__head">
              電話番号 <span class="p-contact__required">必須</span>
            </p>
            <div class="p-contact__data">
              <input
                type="tel"
                name="your-tel"
                placeholder="000-0000-0000"
                required />
            </div>
          </div>

          <!-- メールアドレス -->
          <div class="p-contact__row">
            <p class="p-contact__head">
              メールアドレス <span class="p-contact__required">必須</span>
            </p>
            <div class="p-contact__data">
              <input
                type="email"
                name="your-email"
                placeholder="xxx@example.com"
                required />
            </div>
          </div>

          <!-- お問い合わせ内容 -->
          <div class="p-contact__row">
            <p class="p-contact__head">
              お問い合わせ内容 <span class="p-contact__required">必須</span>
            </p>
            <div class="p-contact__data">
              <textarea
                name="your-message"
                placeholder="ご自由にご記入ください。"
                required></textarea>
            </div>
          </div>

          <!-- 送信ボタン -->
          <div class="p-contact__submit">
            <button type="submit" class="c-button p-contact__button">
              送信
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>