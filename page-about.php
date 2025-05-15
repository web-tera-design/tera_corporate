<?php get_header(); ?>

    <section class="c-mv">
      <div class="c-mv__inner l-section__inner">
        <div class="c-mv__bg-image">
          <hgroup class="c-mv__bg-text">
            <h2 class="c-mv__bg-text--main">当院について</h2>
            <p class="c-mv__bg-text--sub">ABOUT OUR CLINIC</p>
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

    <div class="c-concept__heading-content p-concept__heading-content" id="policy">
      <h2 class="c-heading">ポリシーと特徴</h2>
    </div>
    <section class="c-concept p-about-concept">
      <div class="c-concept__inner">
        <div class="c-concept__container p-about-concept__container">
          <div class="c-concept__content">
            <hgroup class="c-concept__heading-group">
              <p class="c-concept__subheading">POLICY</p>
              <h2 class="c-concept__heading">
                コミュニケーションから始まる最適な医療提供
              </h2>
            </hgroup>
            <p class="c-concept__text">
              当院ではまず患者様から詳しくお話を伺います。<br />
              難しい言葉は使わず、実際に感じている小さな違和感からあらゆる可能性を考え、最適な治療方法をご提案いたします。
            </p>
            <p class="c-concept__text">
              「どこよりも本音で話せる歯医者さん」を目指し、スタッフ一同、「人間力の向上」にも勤めております。
            </p>
          </div>
          <div class="c-concept__image">
            <img
              src="<?php echo get_template_directory_uri(); ?>/img/concept_img.webp"
              alt="治療中の画像"
              width="1280"
              height="876"
            />
          </div>
        </div>
        <div class="c-concept__bg-image">
          <img src="<?php echo get_template_directory_uri(); ?>/img/concept-bg.svg" alt="" width="1310" height="726" />
        </div>
      </div>
    </section>

    <section class="c-concept">
      <div class="c-concept__inner">
        <div class="c-concept__container c-concept--row">
          <div class="c-concept__content">
            <hgroup class="c-concept__heading-group">
              <p class="c-concept__subheading">FEATURE</p>
              <h2 class="c-concept__heading">
                「医療技術の追求」と<br />「通いやすさ」
              </h2>
            </hgroup>
            <p class="c-concept__text">
              歯の治療において、小さな違和感は大きなストレスにつながります。私たちは常に快適な歯科医療技術の研究を行っております。
              また、「通いやすさ」も医院選びの重要なポイントと考え、2019年のリニューアルを期に更に駅の近くへ場所を移しました。
            </p>
            <p class="c-concept__text">
              朝から夜までお仕事をされている方のために診療時間を見直し、平日でもご利用いただけるようにいたしました。
            </p>
          </div>
          <div class="c-concept__image c-concept__image--row">
            <img
              src="<?php echo get_template_directory_uri(); ?>/img/concept_img.webp"
              alt="治療中の画像"
              width="1280"
              height="876"
            />
          </div>
        </div>
      </div>
    </section>

    <section class="p-about__medical" id="gallery">
      <div class="p-about-medical__inner l-section__inner">
        <div class="p-about-medical-headnig">
          <h2 class="c-heading">院内の様子</h2>
        </div>
        <div class="p-about-medical__cards">
          <div class="p-about-medical__card">
            <div class="p-about-medical__image">
              <img
                src="<?php echo get_template_directory_uri(); ?>/img/about/medical/pc/about-medical-pc-01.webp"
                alt="院内の様子"
                width="634"
                height="634"
              />
            </div>
          </div>
          <div class="p-about-medical__card">
            <div class="p-about-medical__image">
              <img
                src="<?php echo get_template_directory_uri(); ?>/img/about/medical/pc/about-medical-pc-02.webp"
                alt="院内の様子"
                width="634"
                height="634"
              />
            </div>
          </div>
          <div class="p-about-medical__card">
            <div class="p-about-medical__image">
              <img
                src="<?php echo get_template_directory_uri(); ?>/img/about/medical/pc/about-medical-pc-03.webp"
                alt="院内の様子"
                width="634"
                height="634"
              />
            </div>
          </div>
          <div class="p-about-medical__card">
            <div class="p-about-medical__image">
              <img
                src="<?php echo get_template_directory_uri(); ?>/img/about/medical/pc/about-medical-pc-04.webp"
                alt="院内の様子"
                width="634"
                height="634"
              />
            </div>
          </div>
          <div class="p-about-medical__card">
            <div class="p-about-medical__image">
              <img
                src="<?php echo get_template_directory_uri(); ?>/img/about/medical/pc/about-medical-pc-05.webp"
                alt="院内の様子"
                width="634"
                height="634"
              />
            </div>
          </div>
          <div class="p-about-medical__card">
            <div class="p-about-medical__image">
              <img
                src="<?php echo get_template_directory_uri(); ?>/img/about/medical/pc/about-medical-pc-06.webp"
                alt="院内の様子"
                width="634"
                height="634"
              />
            </div>
          </div>
        </div>
      </div>
    </section>

<?php get_footer(); ?>