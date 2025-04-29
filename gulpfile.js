// ===============================================
// # 動的サイト対応Gulp (require版)
// ver.2.2
// ===============================================

const fs = require("fs");
const path = require("path");
const gulp = require("gulp");
const browserSync = require("browser-sync").create();
const gulpSass = require("gulp-sass")(require("sass"));
const notify = require("gulp-notify");
const plumber = require("gulp-plumber");
const postcss = require("gulp-postcss");
const autoprefixer = require("autoprefixer");
const cssSorter = require("css-declaration-sorter");
const cleanCSS = require("gulp-clean-css");
const uglify = require("gulp-uglify");
const mergeRules = require("postcss-merge-rules");
const replace = require("gulp-replace");
const { deleteAsync } = require("del");
const watch = require("gulp-watch");
const rename = require("gulp-rename");
const scssDirs = ["layout", "component", "project", "utility", "foundation", "global"];
const baseDir = "./src/assets/sass/";
const htmlBeautify = require('gulp-html-beautify'); // ここを上に追加！
const sharp = require("sharp"); // ← これを最初のインポートに追加！
const changed = require('gulp-changed'); // これをインポートに追加！
const isProduction = process.env.NODE_ENV === 'production';
const dartSass = require('sass');  // dartSassをrequireでインポート




//* ===============================================
//# ブラウザSync動的対応
//# ローカルサイトのURLを直接設定
//=============================================== *
const projectUrl = "http://tera__corporate.local/";  // ローカルのPHPサーバーのURL
const browserSyncInstance = browserSync;  // browserSyncのインスタンスを作成
const sass = gulpSass(dartSass); //Sassコンパイルのための設定

// ===============================================
//# SassファイルとJSのコンパイル、ブラウザ同期の設定
// ===============================================
function browserInit(done) {
  browserSync.init({
    proxy: projectUrl,  // PHPのローカル開発環境のURL（例えばWordPressのURL）を設定
    // port: process.env.PORT || 3000,   // ★PORT環境変数あればそれ、なければ3000
    notify: false,
    open: true,          // ブラウザを自動で開く
    // https: process.env.HTTPS === 'true' ? true : false // ★HTTPS環境変数 trueならhttps化
  });
  done();
}


// ===============================================
// # Sassをコンパイル＆圧縮
// ===============================================
function compileSass() {
  return gulp
    .src(path.join(baseDir, "style.scss"), { base: baseDir })
    .pipe(plumber({ errorHandler: notify.onError("Sass Error: <%= error.message %>") }))
    .pipe(gulpSass())
    .pipe(postcss([
      autoprefixer(),
      cssSorter(),
      mergeRules()
    ]))
    // 通常版を出力
    .pipe(gulp.dest("./css/"))
    .pipe(cleanCSS(isProduction ? { level: 2 } : {}))
    // ファイル名を変更してmin版を出力
    .pipe(rename({ suffix: ".min" }))
    .pipe(gulp.dest("./css/"))
    .pipe(browserSync.stream())
    // .pipe(notify({ message: "Sass compile and min.css created." }));

}


// ===============================================
// # JSを圧縮
// ===============================================
function formatJS() {
  return gulp
    .src("./src/assets/js/**/*.js")
    .pipe(plumber({ errorHandler: notify.onError("JS Error: <%= error.message %>") }))
    // まず通常版（そのまま）を出力
    .pipe(gulp.dest("./js/"))
    // 次にmin化する
    .pipe(uglify())
    // ファイル名に .min をつける
    .pipe(rename({ suffix: ".min" }))
    // min版を出力
    .pipe(gulp.dest("./js/"))
    .pipe(browserSync.stream())
    // .pipe(notify({ message: "JS compile and min.js created." }));
}

// ===============================================
// # 画像処理タスク
// ===============================================
async function copyImage() {
  const srcDir = "./src/assets/img/";
  const destDir = "./img/";

  const walk = (dir, fileList = []) => {
    const files = fs.readdirSync(dir);
    files.forEach((file) => {
      const filePath = path.join(dir, file);
      if (fs.statSync(filePath).isDirectory()) {
        walk(filePath, fileList);
      } else {
        fileList.push(filePath);
      }
    });
    return fileList;
  };

  const allFiles = walk(srcDir);
  const counters = {};

  for (const inputPath of allFiles) {
    const relPath = path.relative(srcDir, inputPath);
    const ext = path.extname(inputPath).toLowerCase();
    if (![".jpg", ".jpeg", ".png", ".svg"].includes(ext)) continue;

    const parts = relPath.split(path.sep);
    const page = parts[0];
    const section = parts[1];
    const device = parts[2];
    if (!page || !section || !device) continue;

    const key = `${page}/${section}/${device}`;
    counters[key] = (counters[key] || 0) + 1;

    const num = String(counters[key]).padStart(2, "0");
    const outputPath = path.join(destDir, page, section, device);
    const baseName = `${page}-${section}-${device}-${num}`;
    const outputWebp = path.join(outputPath, `${baseName}.webp`);
    const outputAvif = path.join(outputPath, `${baseName}.avif`);
    const outputSvg = path.join(outputPath, `${baseName}.svg`);

    fs.mkdirSync(outputPath, { recursive: true });

    if (ext === ".svg") {
      // SVGだけそのままコピー（差分ビルドなしでOK）
      fs.copyFileSync(inputPath, outputSvg);
    } else {
      const srcStat = fs.statSync(inputPath);

      // 差分チェック（WebP）
      let shouldCreateWebp = true;
      if (fs.existsSync(outputWebp)) {
        const destStat = fs.statSync(outputWebp);
        if (srcStat.mtimeMs <= destStat.mtimeMs) {
          shouldCreateWebp = false;
        }
      }

      // 差分チェック（AVIF）
      let shouldCreateAvif = true;
      if (fs.existsSync(outputAvif)) {
        const destStat = fs.statSync(outputAvif);
        if (srcStat.mtimeMs <= destStat.mtimeMs) {
          shouldCreateAvif = false;
        }
      }

      // それぞれ出力
      if (shouldCreateWebp) {
        await sharp(inputPath)
          .webp({ quality: isProduction ? 70 : 80 })
          .toFile(outputWebp);
      }

      if (shouldCreateAvif) {
        await sharp(inputPath)
          .avif({ quality: isProduction ? 50 : 60 })
          .toFile(outputAvif);
      }
    }
  }
}


// ===============================================
// # ファイル監視
// ===============================================
function watchFiles() {
  watch(
    [baseDir + "**/*.scss", "!" + baseDir + "**/index.scss"],
    { events: ['add', 'change', 'unlink'] }, // ★ファイル追加・変更・削除を全部検知
    gulp.series(generateIndexScss, compileSass)
  );
  watch(
    "./src/assets/js/**/*.js",
    { events: ['add', 'change', 'unlink'] },
    gulp.series(formatJS)
  );
  watch(
    "./src/assets/img/**/*",
    { events: ['add', 'change', 'unlink'] },
    gulp.series(copyImage)
  );
  watch(
    "./**/*.php",
    { events: ['add', 'change', 'unlink'] }
  ).on("change", browserSync.reload);
  watch(
    "./**/*.html",
    { events: ['add', 'change', 'unlink'] }
  ).on("change", browserSync.reload);
}


// ===============================================
// # SCSSパーシャル自動生成
// ===============================================
function generateIndexScss(done) {
  scssDirs.forEach((dir) => {
    const fullPath = path.join(baseDir, dir);
    if (fs.existsSync(fullPath) && fs.lstatSync(fullPath).isDirectory()) {
      let files = fs
        .readdirSync(fullPath)
        .filter(file => file.endsWith(".scss") && file !== "index.scss") // index.scssは完全除外
        .sort(); // ソートするのは純粋な子scssファイルだけ

      const importStatements = files.length > 0
        ? files.map(file => `@use "${file.replace(".scss", "")}";`).join("\n")
        : '';

      fs.writeFileSync(
        path.join(fullPath, "index.scss"),
        `/* Auto-generated index.scss for ${dir} */\n${importStatements}\n`
      );
    }
  });
  done();
}

// ===============================================
// # 共通エラーハンドラ（ブラウザ通知対応版）
// ===============================================
const errorHandler = (title) => {
  return plumber({
    errorHandler: (err) => {
      console.error(`${title}: ${err.message}`); // エラーメッセージをコンソールに出力
    }
  });
};


// // ===============================================
// // # HTML内の画像パスをWebPに置換
// // ===============================================
// function updateHtml() {
//   return gulp
//     .src("./**/*.html")
//     .pipe(plumber({ errorHandler }))
//     .pipe(replace(/\.(png|jpg|jpeg|gif)/g, ".webp"))
//     .pipe(gulp.dest("./"))
//     .pipe(browserSync.stream())
//     // .pipe(notify({ message: "HTML updated." }));
// }

// ===============================================
// # HTML整形タスク
// ===============================================
function beautifyHtml() {
  return gulp
    .src("./**/*.html")
    .pipe(plumber({ errorHandler }))
    .pipe(htmlBeautify({
      indent_size: 2,  // インデント幅（スペース2個）
      indent_char: ' ', // スペースでインデント
      max_preserve_newlines: 1, // 連続改行を最大1行まで許可
      preserve_newlines: true,
      end_with_newline: true // ファイルの最後を改行で終わらせる
    }))
    .pipe(gulp.dest("./"))
}

// ===============================================
// # Gulpタスク登録
// ===============================================
exports.generateIndexScssTask = generateIndexScss;
exports.compileSassTask = compileSass;
exports.formatJSTask = formatJS;
exports.copyImageTask = copyImage;
// exports.updateHtmlTask = updateHtml;
exports.beautifyHtmlTask = beautifyHtml;


exports.dev = gulp.series(
  browserInit,
  watchFiles
);
exports.build = gulp.series(
  gulp.parallel(formatJS, compileSass, copyImage),
  // updateHtml,
  beautifyHtml
);





