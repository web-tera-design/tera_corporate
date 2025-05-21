document.addEventListener("DOMContentLoaded", () => {
  function scaleContent() {
    const minWidth = 375;
    const width = Math.min(window.innerWidth, screen.width); // ✅ innerWidthとscreen幅の小さい方を見る
    if (width < minWidth) {
      const scale = width / minWidth;
      document.body.style.transform = `scale(${scale})`;
      document.body.style.transformOrigin = "top left";
      document.body.style.width = `${minWidth}px`;
    } else {
      document.body.style.transform = "";
      document.body.style.width = "";
    }
  }
  scaleContent();
  window.addEventListener("resize", scaleContent);
});

document.addEventListener("DOMContentLoaded", () => {
  const links = document.querySelectorAll(".l-header__link");
  let currentPath = location.pathname.replace(/\/$/, "");

  // Live Server用に"/"を"/index.html"と見なす
  if (currentPath === "/" || currentPath === "") currentPath = "/index.html";

  links.forEach((link) => {
    let linkPath = link.getAttribute("href")?.replace(/\/$/, "");
    if (linkPath === "/" || linkPath === "") linkPath = "/index.html";

    if (linkPath === currentPath) {
      link.classList.add("is-active");
      link.setAttribute("aria-current", "page");
    }
  });
});

// ドロワー
document.addEventListener("DOMContentLoaded", () => {
  const drawer = document.querySelector(".c-drawer");
  const drawerIcon = document.querySelector(".c-drawer-icon");
  const body = document.body;
  let isMenuOpen = false;

  if (!drawer || !drawerIcon) return;

  // 初期状態（非表示）
  drawer.style.opacity = "0";
  drawer.style.visibility = "hidden";
  drawer.style.transform = "translateX(100%)"; // 上からスライド
  drawer.style.overflow = "hidden";
  drawer.style.transition = "all 0.7s ease-out";

  const openMenu = () => {
    isMenuOpen = true;
    drawer.classList.add("js-show");
    drawerIcon.classList.add("js-show"); // 追加
    drawer.style.opacity = "1";
    drawer.style.visibility = "visible";
    drawer.style.transform = "translateX(0)";
    body.style.overflow = "hidden"; // スクロールを防止
    drawerIcon.setAttribute("aria-expanded", "true"); // アクセシビリティ対応
  };

  const closeMenu = () => {
    isMenuOpen = false;
    drawer.classList.remove("js-show");
    drawerIcon.classList.remove("js-show"); // 追加
    drawer.style.opacity = "0";
    drawer.style.visibility = "hidden";
    drawer.style.transform = "translateX(100%)";
    body.style.overflow = ""; // スクロール解除
    drawerIcon.setAttribute("aria-expanded", "false"); // アクセシビリティ対応
  };

  drawerIcon.addEventListener("click", () => {
    if (isMenuOpen) {
      closeMenu();
    } else {
      openMenu();
    }
  });

  // 画面リサイズ時に開いていたら閉じる
  window.addEventListener("resize", () => {
    if (window.innerWidth > 900 && isMenuOpen) {
      closeMenu();
    }
  });

  // メニュー外クリックで閉じる
  document.addEventListener("click", (event) => {
    if (
      !drawer.contains(event.target) &&
      !drawerIcon.contains(event.target) &&
      isMenuOpen
    ) {
      closeMenu();
    }
  });

  // ESCキーでメニューを閉じる
  document.addEventListener("keydown", (event) => {
    if (event.key === "Escape" && isMenuOpen) {
      closeMenu();
    }
  });

  // ページ内リンククリック時のスクロール処理
  document.querySelectorAll(".c-drawer__item-link").forEach((link) => {
    link.addEventListener("click", (event) => {
      event.preventDefault();
      const target = document.querySelector(link.getAttribute("href"));
      if (target) target.scrollIntoView({ behavior: "smooth", block: "start" });

      closeMenu();
    });
  });
});

const drawerBtn = document.querySelector(".c-drawer-icon");
const bars = drawerBtn.querySelectorAll(".c-drawer-icon__bar");

let isOpen = false;

drawerBtn.addEventListener("click", () => {
  isOpen = !isOpen;

  if (isOpen) {
    // 🌀くるっと回転しながら交差
    gsap.to(bars[0], {
      y: 7,
      rotate: 405, // ← 360 + 45度くるっと！
      transformOrigin: "center",
      duration: 0.6,
      ease: "power3.out",
    });
    gsap.to(bars[1], {
      opacity: 0,
      duration: 0.3,
      ease: "power1.out",
    });
    gsap.to(bars[2], {
      y: -7,
      rotate: -405, // ← マイナス方向にもくるん！
      transformOrigin: "center",
      duration: 0.6,
      ease: "power3.out",
    });
  } else {
    // 元に戻るときもスムーズに回転戻す
    gsap.to(bars[0], {
      y: 0,
      rotate: 0,
      duration: 0.6,
      ease: "power3.inOut",
    });
    gsap.to(bars[1], {
      opacity: 1,
      duration: 0.3,
      ease: "power1.in",
    });
    gsap.to(bars[2], {
      y: 0,
      rotate: 0,
      duration: 0.6,
      ease: "power3.inOut",
    });
  }
});

// // サイト表示までのロゴとswiper=================================
document.addEventListener("DOMContentLoaded", () => {
  const overlay = document.getElementById("overlay");
  const siteContent = document.getElementById("siteContent");
  const hasVisited = localStorage.getItem("visited"); // ✅ 初回アクセス判定用

  // ✅ Swiperスライド内のテキストを取得
  const swiperTexts = document.querySelectorAll(
    ".p-index-mv-swiper-slide__text"
  );

  // ✅ 一文字ずつ出現アニメーション
  function startTypingAnimation(target, delay = 0) {
    const headings = target.querySelectorAll(
      ".p-index-mv-swiper-slide__heading, .p-index-mv-swiper-slide__sub"
    );
    const globalStartDelay = 1.5; // 全体のディレイを追加

    headings.forEach((heading, index) => {
      const text = heading.innerText;
      heading.innerHTML = "";
      text.split("").forEach((char, charIndex) => {
        const span = document.createElement("span");
        span.innerText = char;

        const extraDelay = index === 1 ? 1.5 : 0; // サブテキストにさらに遅延
        span.style.animationDelay = `${charIndex * 0.15 + extraDelay + globalStartDelay}s`;
        heading.appendChild(span);
      });
    });
  }

  // ✅ スライド画像のGSAPアニメーション
  function animateSlideImage() {
    const currentImg = document.querySelector(
      ".swiper-slide-active .p-index-mv-slide-img"
    );
    if (!currentImg) return;

    gsap.set(currentImg, {
      xPercent: -100,
      opacity: 1,
    });

    gsap.to(currentImg, {
      xPercent: 0,
      opacity: 1,
      duration: 3.0,
      ease: "power2.out",
    });
  }

  // ✅ Swiperを初期化（共通処理化）
  function initSwiper() {
    // 初期ロード時にもテキストをタイプさせる
    swiperTexts.forEach((text) => startTypingAnimation(text));

    const cardSwiper = new Swiper(".p-index-mv-card__swiper", {
      speed: 1000,
      effect: "fade",
      loop: true,
      autoplay: {
        delay: 6000,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        prevEl: ".swiper-button-prev",
        nextEl: ".swiper-button-next",
      },
      on: {
        // ✅ 初期化時のテキスト/画像演出
        init: () => {
          const activeSlide = document.querySelector(
            ".swiper-slide-active .p-index-mv-swiper-slide__text"
          );
          if (activeSlide) startTypingAnimation(activeSlide);
          animateSlideImage();
        },
        // ✅ スライド切り替え時の演出
        slideChangeTransitionStart: () => {
          const activeSlide = document.querySelector(
            ".swiper-slide-active .p-index-mv-swiper-slide__text"
          );
          if (activeSlide) startTypingAnimation(activeSlide);
          animateSlideImage();
        },
      },
    });
  }

  // ✅ 初回アクセスの場合（ローディング表示）
  if (!hasVisited) {
    localStorage.setItem("visited", "true"); // 初回アクセスを記録

    setTimeout(() => {
      overlay.style.transition = "opacity 4s ease-in-out";
      overlay.style.opacity = "0";

      // ✅ フェードアウト完了後、overlayを非表示
      overlay.addEventListener("transitionend", () => {
        overlay.style.display = "none";
        console.log("✅ オーバーレイが非表示になりました");

        if (siteContent) {
          siteContent.style.display = "block";
        }

        // ✅ Swiperアニメーション開始
        initSwiper();
      });
    }, 5000); // ローディング演出時間
  } else {
    // ✅ 2回目以降は即表示＆ローディングスキップ
    overlay.style.display = "none";
    if (siteContent) {
      siteContent.style.display = "block";
    }

    // ✅ Swiperアニメーション開始
    initSwiper();
  }
});

// /* ===================================================
// ※1 effectについて
// slide：左から次のスライドが流れてくる
// fade：次のスライドがふわっと表示
//   → fadeEffect: { crossFade: true } を加えると滑らか
// cube：スライドが立方体になり、3D回転を繰り返す
// coverFlow：写真やアルバムジャケットをめくるような動き
// flip：平面が回転するような動き
// cards：カードを順番に見ていくような動き
// creative：カスタマイズしたアニメーション

// =======================================================
// ※2 paginationのタイプ
// bullets：ドットで表示
// fraction：分数表示（例：1 / 3）
// progressbar：進捗バー形式で表示
// custom：HTMLやJSで自由にカスタマイズ

// ================header__nav-link
// ✅ SVGパスの長さを自動セット
document.querySelectorAll(".header__nav-link-icon path").forEach((path) => {
  const length = path.getTotalLength(); // パスの長さを取得
  path.style.strokeDasharray = length; // ✅ 線の長さをセット
  path.style.strokeDashoffset = length; // ✅ 初期状態で線を隠す
});

// ✅ ホバー時のアニメーション（パスのみ）
document.querySelectorAll(".header__nav-link").forEach((link) => {
  link.addEventListener("mouseenter", () => {
    const path = link.querySelector(".header__nav-link-icon path");
    path.style.transition = "none"; // ✅ アニメーションなしで初期化
    path.style.strokeDashoffset = path.getTotalLength(); // ✅ 初期状態をリセット

    // ✅ 次のフレームでstroke-dashoffsetを0にしてアニメーション
    requestAnimationFrame(() => {
      path.style.transition = "stroke-dashoffset 1.5s ease-in-out";
      path.style.strokeDashoffset = "0"; // ✅ なぞるアニメーション
    });
  });

  link.addEventListener("mouseleave", () => {
    const path = link.querySelector(".header__nav-link-icon path");
    const length = path.getTotalLength();
    path.style.strokeDashoffset = length; // ✅ ホバー解除時に元に戻す
  });
});
// ================header__nav-link

// =============================================================================
//   const newsElement = document.querySelector('.mv__info-news');

//   // ホバー時に計算してtranslateXを適用
//   newsElement.addEventListener('mouseenter', () => {
//     const parentWidth = newsElement.offsetWidth; // 親要素の幅
//     const childWidth = newsElement.querySelector('.mv__info-news-time').offsetWidth + newsElement.querySelector('.mv__info-news-text').offsetWidth + parseFloat(window.getComputedStyle(newsElement).gap); // 子要素の合計幅

//     // 中央位置を計算
//     const translateXValue = (parentWidth - childWidth) / 2;

//     // transformで位置を動かす
//     newsElement.style.transform = `scale(1.2) translateX(${translateXValue}px)`;
//   });

//   // ホバー解除時にリセット
//   newsElement.addEventListener('mouseleave', () => {
//     newsElement.style.transform = 'scale(1) translateX(0)';
//   });
//==============================================================================

const buttonTop = document.querySelector(".c-button-top");

buttonTop.addEventListener("click", (e) => {
  e.preventDefault();
  window.scrollTo({
    top: 0,
    behavior: "smooth", // ブラウザのスムーススクロール機能を使う（時間は調整できない）
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const topButton = document.querySelector(".c-button-top");

  window.addEventListener("scroll", () => {
    const scrollY = window.scrollY || document.documentElement.scrollTop;
    if (scrollY > 300) {
      topButton.classList.add("is-visible");
    } else {
      topButton.classList.remove("is-visible");
    }
  });

  topButton.addEventListener("click", () => {
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const buttonTop = document.querySelector(".c-button-top");

  if (!buttonTop) return;

  let rotateTl;

  buttonTop.addEventListener("mouseenter", () => {
    // 回転 + スケール演出
    rotateTl = gsap.timeline();

    rotateTl.to(buttonTop, {
      rotate: 1080,
      scale: 1.15,
      duration: 0.5,
      ease: "power3.out",
    });

    // 追いかけるように「ポン！」と跳ねる
    gsap.fromTo(
      buttonTop,
      { scale: 1 },
      {
        scale: 1.2,
        duration: 0.2,
        ease: "power1.out",
        yoyo: true,
        repeat: 1,
        delay: 0.1, // 少し遅らせて重ねると気持ちいい
      }
    );
  });

  buttonTop.addEventListener("mouseleave", () => {
    if (rotateTl) rotateTl.kill(); // 回転止める

    gsap.to(buttonTop, {
      rotate: 0,
      scale: 1,
      boxShadow: "none",
      duration: 0.4,
      ease: "power3.inOut",
    });
  });
});

document.addEventListener("DOMContentLoaded", () => {
  gsap.registerPlugin(ScrollTrigger);

  const items = document.querySelectorAll(".recommend__item");

  items.forEach((item, i) => {
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: ".recommend",
        start: "top 40%",
        toggleActions: "play none none none",
        markers: false, // 必要なら true
      },
      delay: i * 0.3, // 順番に出したい場合
    });

    tl.fromTo(
      item,
      { scale: 0.5, opacity: 0 },
      {
        scale: 1.2,
        opacity: 1,
        duration: 0.8,
        ease: "power3.out",
      }
    ).to(item, {
      scale: 1.0,
      duration: 0.3,
      ease: "power2.inOut",
    });
  });
});

document.addEventListener("DOMContentLoaded", () => {
  gsap.registerPlugin(ScrollTrigger);

  const services = document.querySelectorAll(".medical__service");

  services.forEach((el, i) => {
    // ① スクロールでscaleYとopacityをアニメ（1回だけ）
    gsap.fromTo(
      el,
      {
        scaleY: 0.8,
        opacity: 0,
        transformOrigin: "center bottom",
        y: 30,
      },
      {
        scaleY: 1,
        opacity: 1,
        y: 0,
        duration: 0.6,
        ease: "power2.out",
        delay: i * 0.2,
        scrollTrigger: {
          trigger: el,
          start: "top 80%",
          toggleActions: "play none none none",
        },
        // onComplete: () => {
        //   // ② scaleXでピクピクをループ（ずっと）
        //   gsap.to(el, {
        //     scaleX: 1.05,
        //     duration: 0.8,
        //     yoyo: true,
        //     repeat: -1,
        //     ease: "power1.inOut"
        //   });
        // }
      }
    );
  });
});

document.addEventListener("DOMContentLoaded", () => {
  gsap.registerPlugin(ScrollTrigger);

  const cards = Array.from(document.querySelectorAll(".blog__card"));

  // offsetTopでグループ化
  const cardGroups = [];
  let lastTop = null;
  let currentGroup = [];

  cards.forEach((card) => {
    const top = card.offsetTop;

    if (lastTop === null || top === lastTop) {
      currentGroup.push(card);
    } else {
      cardGroups.push(currentGroup);
      currentGroup = [card];
    }

    lastTop = top;
  });
  if (currentGroup.length > 0) {
    cardGroups.push(currentGroup);
  }

  // グループごとにアニメーション（交互に方向変える）
  cardGroups.forEach((group, index) => {
    const fromX = index % 2 === 0 ? "-300px" : "300px";

    // 1つのグループに対してアニメーションを適用
    group.forEach((card) => {
      gsap.fromTo(
        card,
        { x: fromX, opacity: 0 },
        {
          scrollTrigger: {
            trigger: card,
            start: "top 85%",
            toggleActions: "play none none none",
          },
          x: 0,
          opacity: 1,
          duration: 0.3,
          ease: "power1.out",
        }
      );
    });
  });
});

//swiper
const staffMessageSwiper2 = new Swiper(".p-staff-message__swiper.--swiper2", {
  //swiperの名前 変数末尾にも.--swiperと同等の数字
  //切り替えのモーション
  speed: 5000, //表示切り替えのスピード
  effect: "slide", //切り替えのmotion (※1)
  allowTouchMove: false, // スワイプで表示の切り替えを有効に

  //最後→最初に戻るループ再生を有効に
  loop: true,
  //自動スライドについて
  autoplay: {
    delay: 0, //何秒ごとにスライドを動かすか
    stopOnLastSlide: false, //最後のスライドで自動再生を終了させるか
    disableOnInteraction: false, //ユーザーの操作時に止める
    reverseDirection: false, //自動再生を逆向きにする
  },

  //表示について
  centeredSlides: false, //中央寄せにする
  slidesPerView: "2", //スライド枚数指定
  spaceBetween: 30, //スライドの右側に余白px

  //ページネーション
  pagination: {
    el: ".swiper-pagination.--swiper2", //paginationのclass
    clickable: true, //クリックでの切り替えを有効に
    type: "bullets", //paginationのタイプ (※2)
  },
  //ナビゲーション
  navigation: {
    prevEl: ".swiper-button-prev.--swiper2", //戻るボタンのclass
    nextEl: ".swiper-button-next.--swiper2", //進むボタンのclass
  },
  //スクロールバー
  scrollbar: {
    //スクロールバーを表示したいとき
    el: ".swiper-scrollbar", //スクロールバーのclass
    hide: true, //操作時のときのみ表示
    draggable: true, //スクロールバーを直接表示できるようにする
  },

  // ブレイクポイントによって変える
  breakpoints: {
    768: {
      slidesPerView: 4,
      spaceBetween: 15,
    },
  },
});

/* =================================================== 
※1 effectについて
slide：左から次のスライドが流れてくる
fade：次のスライドがふわっと表示
■ fadeの場合は下記を記述
  fadeEffect: {
    crossFade: true
  },
cube：スライドが立方体になり、3D回転を繰り返す
coverflow：写真やアルバムジャケットをめくるようなアニメーション
flip：平面が回転するようなアニメーション
cards：カードを順番にみていくようなアニメーション
creative：カスタマイズしたアニメーションを使うときに使用します

=======================================================
※2 paginationのタイプ
bullets：スライド枚数と同じ数のドットが表示
fraction：分数で表示（例：1 / 3）
progressbar：スライドの進捗に応じてプログレスバーが伸びる
custom：自由にカスタマイズ

=====================================================*/

document.addEventListener("DOMContentLoaded", function () {
  const hash = window.location.hash;
  if (hash) {
    const target = document.querySelector(hash);
    if (target) {
      setTimeout(() => {
        target.scrollIntoView({ behavior: "smooth" });
      }, 300); // アニメーション後にスクロール
    }
  }
});

//ContactForm7を使った時の、Thanks.phpへの遷移設定
document.addEventListener(
  "wpcf7mailsent",
  function (event) {
    if (event.detail.contactFormId == 573) {
      // 123 ← 予約フォームのID（数字）に置き換える
      location.href = "/reservation-thanks/";
    } else if (event.detail.contactFormId == 561) {
      // 456 ← お問い合わせフォームのID（数字）に置き換える
      location.href = "/contact-thanks/";
    }
  },
  false
);
