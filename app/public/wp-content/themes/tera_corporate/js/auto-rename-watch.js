const fs = require('fs-extra');
const path = require('path');
const sharp = require('sharp');
const chokidar = require('chokidar');

// 📁 パス設定
const inputDir = './img'; // 画像を入れる場所（imgフォルダ）
const outputDir = './dist-img'; // 画像を出力する場所（dist-imgフォルダ）
const logPath = path.join(__dirname, 'rename-log.json'); // ログファイル（jsフォルダ内）

// 📘 ログを読み込む関数
const loadRenameLog = () => {
  if (fs.existsSync(logPath)) {
    return JSON.parse(fs.readFileSync(logPath, 'utf-8'));
  }
  return {};
};

// 💾 ログを保存する関数
const saveRenameLog = (log) => {
  fs.writeFileSync(logPath, JSON.stringify(log, null, 2), 'utf-8');
};

// 🧠 ログを読み込む
const renameLog = loadRenameLog();

// 🧼 命名処理（履歴＋連番つき）
const sanitizeWithLog = (originalName, ext) => {
  if (renameLog[originalName]) {
    return renameLog[originalName];
  }

  const nameWithoutExt = originalName.replace(/\.[^/.]+$/, '');
  const base = nameWithoutExt
    .replace(/[（）()]/g, '')
    .replace(/[\s_]+/g, '-')
    .replace(/[^a-zA-Z0-9\-]/g, '')
    .toLowerCase();

  let finalName = base;
  let count = 1;

  // 同名ファイルがあったら連番をつける
  while (
    fs.existsSync(path.join(outputDir, `${finalName}${ext}`)) ||
    fs.existsSync(path.join(outputDir, `${finalName}.webp`)) ||
    fs.existsSync(path.join(outputDir, `${finalName}.svg`))
  ) {
    finalName = `${base}-${String(count).padStart(2, '0')}`;
    count++;
  }

  renameLog[originalName] = finalName;
  saveRenameLog(renameLog);
  return finalName;
};

// 🔧 画像を処理する関数
const processImage = async (filePath) => {
  const ext = path.extname(filePath).toLowerCase(); // 例: .png
  const originalName = path.basename(filePath);     // 例: Main Visual.png
  const cleanName = sanitizeWithLog(originalName, ext);
  const outputBase = path.join(outputDir, cleanName);

  try {
    if (ext === '.png') {
      // ✅ PNG → WebP のみ出力
      await sharp(filePath)
        .webp({ quality: 75 })
        .toFile(`${outputBase}.webp`);
      console.log(`🌟 PNG→WebP変換: ${cleanName}.webp`);

    } else if (ext === '.svg') {
      // ✅ SVG → 変換なしでそのまま保存
      await fs.copy(filePath, `${outputBase}.svg`);
      console.log(`📄 SVGコピー: ${cleanName}.svg`);

    } else if (ext === '.webp') {
      // ✅ WebPファイルもそのままコピー
      await fs.copy(filePath, `${outputBase}.webp`);
      console.log(`📄 WebPコピー: ${cleanName}.webp`);

    } else {
      console.log(`⏭️ 未対応形式: ${originalName}`);
    }

  } catch (err) {
    console.error('❌ エラー:', err.message);
  }
};

// 📁 dist-img フォルダがなければ作る
fs.ensureDirSync(outputDir);

// 👀 フォルダを監視スタート！
console.log('👀 img フォルダを監視中… 画像を入れるだけで変換＆保存されます');

chokidar.watch(inputDir).on('add', (filePath) => {
  console.log(`📥 新しい画像: ${path.basename(filePath)}`);
  processImage(filePath);
});
