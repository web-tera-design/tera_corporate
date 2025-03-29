
// 画面サイズ375px以下はいい感じに縮小
document.addEventListener("DOMContentLoaded", () => {
  function scaleContent() {
      const minWidth = 375;
      if (window.innerWidth < minWidth) {
          const scale = window.innerWidth / minWidth;
          document.body.style.transform = `scale(${scale})`;
          document.body.style.transformOrigin = "top left";
          document.body.style.width = `${minWidth}px`; // レイアウト維持
      } else {
          document.body.style.transform = ""; // 拡大・縮小を無効化
          document.body.style.width = ""; // デフォルトの幅に戻す
      }
  }
  scaleContent();
  window.addEventListener("resize", scaleContent);
});

/**
 * JavaScript（aria-current="page"も追加バージョン）
 * 現在のページのリンクに自動で is-active クラスと aria-current="page" を付与するスクリプト
 * 
 * - is-active → SCSSで色や下線などをコントロール
 * - aria-current → アクセシビリティ向上（スクリーンリーダーなどが「今いるページ」と認識できる）
 */

// DOMの読み込み完了後に実行
document.addEventListener('DOMContentLoaded', () => {
  const links = document.querySelectorAll('.header__nav-link');
  const currentPath = location.pathname.replace(/\/$/, ''); // 最後のスラッシュを除去

  links.forEach(link => {
    const linkPath = link.getAttribute('href')?.replace(/\/$/, '');
    if (linkPath && linkPath === currentPath) {
      link.classList.add('is-active');
      link.setAttribute('aria-current', 'page'); // ← アクセシビリティのために追加
    }
  });
});


// ドロワー
document.addEventListener('DOMContentLoaded', () => {
  const drawer = document.querySelector('.drawer');
  const drawerIcon = document.querySelector('.drawer-icon');
  const body = document.body;
  let isMenuOpen = false;

  if (!drawer || !drawerIcon) return;

  // 初期状態（非表示）
  drawer.style.opacity = '0';
  drawer.style.visibility = 'hidden';
  drawer.style.transform = 'translateY(-100%)'; // 上からスライド
  drawer.style.overflow = 'hidden';
  drawer.style.transition = 'transform 0.3s ease-in-out, opacity 0.3s ease-in-out, visibility 0.3s ease-in-out';

  const openMenu = () => {
    isMenuOpen = true;
    drawer.classList.add("js-show");
    drawerIcon.classList.add("js-show"); // 追加
    drawer.style.opacity = "1";
    drawer.style.visibility = "visible";
    drawer.style.transform = "translateY(0)";
    body.style.overflow = "hidden"; // スクロールを防止
    drawerIcon.setAttribute("aria-expanded", "true"); // アクセシビリティ対応
  };

  const closeMenu = () => {
    isMenuOpen = false;
    drawer.classList.remove("js-show");
    drawerIcon.classList.remove("js-show"); // 追加
    drawer.style.opacity = "0";
    drawer.style.visibility = "hidden";
    drawer.style.transform = "translateY(-100%)";
    body.style.overflow = ""; // スクロール解除
    drawerIcon.setAttribute("aria-expanded", "false"); // アクセシビリティ対応
  };

  drawerIcon.addEventListener('click', () => {
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
    if (!drawer.contains(event.target) && !drawerIcon.contains(event.target) && isMenuOpen) {
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
  document.querySelectorAll('.drawer__item-link').forEach(link => {
    link.addEventListener('click', (event) => {
      event.preventDefault();
      const target = document.querySelector(link.getAttribute('href'));
      if (target) target.scrollIntoView({ behavior: "smooth", block: "start" });

      closeMenu();
    });
  });
});

const cardSwiper = new Swiper('.card__swiper', { //swiperの名前
  //切り替えのモーション
  speed: 500, //表示切り替えのスピード
  effect: "fade", //切り替えのmotion (※1)
  allowTouchMove: true, // スワイプで表示の切り替えを有効に

  //最後→最初に戻るループ再生を有効に
  loop: true,
  //自動スライドについて
  autoplay: { 
    delay: 2000, //何秒ごとにスライドを動かすか
    stopOnLastSlide: false, //最後のスライドで自動再生を終了させるか
    disableOnInteraction: true, //ユーザーの操作時に止める
    reverseDirection: false, //自動再生を逆向きにする
  },

  //表示について
  centeredSlides: true, //中央寄せにする
  slidesPerView: 1,
  spaceBetween: 0,

  //ページネーション
  pagination: {
    el: ".swiper-pagination", //paginationのclass
    clickable: true, //クリックでの切り替えを有効に
    type: "bullets" //paginationのタイプ (※2)
  },
  //ナビゲーション
  navigation: {
    prevEl: ".swiper-button-prev", //戻るボタンのclass
    nextEl: ".swiper-button-next" //進むボタンのclass
  },
  //スクロールバー
  scrollbar: { //スクロールバーを表示したいとき
    el: ".swiper-scrollbar", //スクロールバーのclass
    hide: true, //操作時のときのみ表示
    draggable: true //スクロールバーを直接表示できるようにする
  },

  //ブレイクポイントによって変える
  // breakpoints: { 
  //   768: {
  //     slidesPerView: 1.2,
  //     spaceBetween: 15,
  //   },
  //   1500: {
  //     slidesPerView: 3,
  //     spaceBetween: 40,
  //   },
  // }
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
coverFlow：写真やアルバムジャケットをめくるようなアニメーション
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


//swiper
const sampleSwiper2 = new Swiper('.sample__swiper.--swiper2', { //swiperの名前 変数末尾にも.--swiperと同等の数字
  //切り替えのモーション
  speed: 10000, //表示切り替えのスピード
  effect: "slide", //切り替えのmotion (※1)
  allowTouchMove: true, // スワイプで表示の切り替えを有効に

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
  centeredSlides: true, //中央寄せにする
  slidesPerView: "auto",//スライド枚数指定
  spaceBetween: 0,//スライドの右側に余白px

  //ページネーション
  pagination: {
    el: ".swiper-pagination.--swiper1", //paginationのclass
    clickable: true, //クリックでの切り替えを有効に
    type: "bullets" //paginationのタイプ (※2)
  },
  //ナビゲーション
  navigation: {
    prevEl: ".swiper-button-prev.--swiper1", //戻るボタンのclass
    nextEl: ".swiper-button-next.--swiper1" //進むボタンのclass
  },
  //スクロールバー
  scrollbar: { //スクロールバーを表示したいとき
    el: ".swiper-scrollbar", //スクロールバーのclass
    hide: true, //操作時のときのみ表示
    draggable: true //スクロールバーを直接表示できるようにする
  },

  //ブレイクポイントによって変える
  // breakpoints: { 
  //   768: {
  //     slidesPerView: 1.2,
  //     spaceBetween: 15,
  //   },
  //   1500: {
  //     slidesPerView: 3,
  //     spaceBetween: 40,
  //   },
  // }
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



//swiper
const samplesSwiper3 = new Swiper('.samples__swiper.--swiper3', { //swiperの名前 変数末尾にも.--swiperと同等の数字
  //切り替えのモーション
  speed: 20000, //表示切り替えのスピード
  effect: "slide", //切り替えのmotion (※1)
  allowTouchMove: true, // スワイプで表示の切り替えを有効に

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
  centeredSlides: true, //中央寄せにする
  slidesPerView: "auto",//スライド枚数指定
  spaceBetween: 0,//スライドの右側に余白px

  //ページネーション
  pagination: {
    el: ".swiper-pagination.--swiper1", //paginationのclass
    clickable: true, //クリックでの切り替えを有効に
    type: "bullets" //paginationのタイプ (※2)
  },
  //ナビゲーション
  navigation: {
    prevEl: ".swiper-button-prev.--swiper1", //戻るボタンのclass
    nextEl: ".swiper-button-next.--swiper1" //進むボタンのclass
  },
  //スクロールバー
  scrollbar: { //スクロールバーを表示したいとき
    el: ".swiper-scrollbar", //スクロールバーのclass
    hide: true, //操作時のときのみ表示
    draggable: true //スクロールバーを直接表示できるようにする
  },

  //ブレイクポイントによって変える
  // breakpoints: { 
  //   768: {
  //     slidesPerView: 1.2,
  //     spaceBetween: 15,
  //   },
  //   1500: {
  //     slidesPerView: 3,
  //     spaceBetween: 40,
  //   },
  // }
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