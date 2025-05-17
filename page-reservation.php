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

<section class="p-reservation">
  <div class="p-reservation__inner l-section__inner">
    <div class="p-reservation__container">
      <div class="p-reservation__content">
        <div class="p-reservation__tel">
          <h2 class="p-reservation__tel-heading">
            お電話でのご予約/ご相談
          </h2>
          <div class="p-reservation__tel-link">
            <a class="p-reservation__tel-text">
              <svg width="28" height="29" viewBox="0 0 28 29" fill="none">
                <path
                  d="M27.2013 20.3527L21.0763 17.7277C20.5388 17.4986 19.9145 17.6524 19.545 18.105L16.8325 21.4191C12.5754 19.412 9.14944 15.986 7.14227 11.729L10.4564 9.01641C10.91 8.6475 11.064 8.02257 10.8337 7.48515L8.20869 1.36007C7.95498 0.778401 7.32358 0.459255 6.70477 0.599907L1.0172 1.91242C0.421652 2.04995 -0.000136913 2.58036 3.33381e-08 3.19158C3.33381e-08 17.2191 11.3697 28.5669 25.3753 28.5669C25.9867 28.5673 26.5174 28.1454 26.655 27.5497L27.9675 21.8621C28.1073 21.2403 27.7857 20.6069 27.2013 20.3527Z"
                  fill="#1391E6" />
              </svg>

              03-1234-5678</a>
            <p class="reservation__tel-info">(年中無休 AM9:00〜PM22:00)</p>
          </div>
          <p class="p-reservation__tel-message">
            お急ぎの方は電話での連絡がスムーズです。<br />
            混雑状況によっては当日受診をご利用いただけない場合がございます。<br />
            あらかじめご了承ください。
          </p>
        </div>
        <div class="p-reservation__mail">
          <h2 class="p-reservation__mail-heading">
            メールでのご予約/ご相談
          </h2>
          <p class="p-reservation__mail-message">
            【ご予約に関しての注意点】<br />
            メールアドレスの入力間違いにより送信できない事が発生しておりますので、メールアドレスは正しくご入力下さい。<br />
            ※24時間以内に当院からの返信がない場合には、お電話(TEL
            03-1234-5678)にてお問い合わせ下さい。
          </p>
        </div>
      </div>
      <div class="p-reservation__form-container">
        <h2 class="c-heading">お問い合わせ フォーム</h2>
        <form action="" method="post" class="p-reservation__form">
          <!-- お名前 -->
          <div class="p-reservation__row">
            <p class="p-reservation__head">
              お名前 <span class="p-reservation__required">必須</span>
            </p>
            <div class="p-reservation__data">
              <input
                type="text"
                name="your-name"
                placeholder="山田 太郎"
                required />
            </div>
          </div>

          <!-- フリガナ -->
          <div class="p-reservation__row">
            <p class="p-reservation__head">
              フリガナ <span class="p-reservation__required">必須</span>
            </p>
            <div class="p-reservation__data">
              <input
                type="text"
                name="your-kana"
                placeholder="ヤマダ タロウ"
                required />
            </div>
          </div>

          <!-- 電話番号 -->
          <div class="p-reservation__row">
            <p class="p-reservation__head">
              電話番号 <span class="p-reservation__required">必須</span>
            </p>
            <div class="p-reservation__data">
              <input
                type="tel"
                name="your-tel"
                placeholder="000-0000-0000"
                required />
            </div>
          </div>

          <!-- メールアドレス -->
          <div class="p-reservation__row">
            <p class="p-reservation__head">
              メールアドレス
              <span class="p-reservation__required">必須</span>
            </p>
            <div class="p-reservation__data">
              <input
                type="email"
                name="your-email"
                placeholder="xxx@example.com"
                required />
            </div>
          </div>

          <!-- 初診／再診 -->
          <div class="p-reservation__row">
            <p class="p-reservation__head">
              初診／再診 <span class="p-reservation__required">必須</span>
            </p>
            <div class="p-reservation__data p-reservation__data--radio">
              <label><input
                  type="radio"
                  name="visit-type"
                  value="初診"
                  required />
                初診</label>
              <label><input type="radio" name="visit-type" value="再診" />
                再診</label>
            </div>
          </div>

          <!-- 診療内容 -->
          <div class="p-reservation__row">
            <p class="p-reservation__head">
              診療内容 <span class="p-reservation__required">必須</span><br /><small>※複数選択可</small>
            </p>
            <div class="p-reservation__data p-reservation__data--checkbox">
              <label><input type="checkbox" name="menu[]" value="虫歯" />
                虫歯</label>
              <label><input
                  type="checkbox"
                  name="menu[]"
                  value="詰め物外れた" />
                詰め物外れた</label>
              <label><input type="checkbox" name="menu[]" value="矯正相談" />
                矯正相談</label>
              <label><input type="checkbox" name="menu[]" value="飲み合わせ" />
                飲み合わせ</label>
              <label><input type="checkbox" name="menu[]" value="歯の痛み" />
                歯の痛み</label>
              <label><input type="checkbox" name="menu[]" value="歯茎の腫れ" />
                歯茎の腫れ</label>
              <label><input type="checkbox" name="menu[]" value="入れ歯" />
                入れ歯</label>
              <label><input
                  type="checkbox"
                  name="menu[]"
                  value="インプラント" />
                インプラント</label>
              <label><input type="checkbox" name="menu[]" value="その他" />
                その他</label>
            </div>
          </div>

          <!-- ご連絡方法 -->
          <div class="p-reservation__row">
            <label for="contact-method" class="p-reservation__head">
              ご連絡方法 <span class="p-reservation__required">必須</span>
            </label>
            <div class="p-reservation__data p-reservation__data--select">
              <select id="contact-method" name="contact-method" required>
                <option value="" disabled selected>選択してください</option>
                <option value="メール">メール</option>
                <option value="電話">電話</option>
              </select>
            </div>
          </div>

          <!-- 希望日 -->
          <div class="p-reservation__row">
            <p class="p-reservation__head">希望日</p>
            <div class="p-reservation__data p-reservation__data--date">
              <div class="p-reservation__date-item">
                <input type="date" name="preferred-date1" />
              </div>
              <div class="p-reservation__date-item">
                <input type="date" name="preferred-date2" />
              </div>
              <div class="p-reservation__date-item">
                <input type="date" name="preferred-date3" />
              </div>
            </div>
          </div>

          <!-- お問い合わせ内容 -->
          <div class="p-reservation__row">
            <label for="your-message" class="p-reservation__head">
              お問い合わせ内容
            </label>
            <div class="p-reservation__data">
              <textarea
                id="your-message"
                name="your-message"
                placeholder="ご自由にご記入ください。"></textarea>
            </div>
          </div>

          <!-- 送信ボタン -->
          <div class="p-reservation__submit">
            <button type="submit" class="c-button p-reservation__button">
              送信
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>