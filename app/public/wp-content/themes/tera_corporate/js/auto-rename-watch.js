const fs = require('fs-extra');
const path = require('path');
const sharp = require('sharp');
const chokidar = require('chokidar');

// 📁 パス設定
const inputDir = './img'; // 入力フォルダ
const outputDir = './dist-img'; // 出力フォルダ
const logPath = path.join(__dirname, 'rename-log.json'); // 命名履歴ファイル

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

// 🧼 命名処理（履歴＋連番対応）
const sanitizeWithLog = (originalName, ext) => {
  if (renameLog[originalName]) {
    return renameLog[originalName];
  }

  const nameWithoutExt = originalName.replace(/\.[^/.]+$/, '');
  const base = nameWithoutExt
    .replace(/[（）()]/g, '')             // カッコを除去
    .replace(/[\s_]+/g, '-')              // 空白やアンダーバーをハイフンに
    .replace(/[^a-zA-Z0-9\-]/g, '')       // 記号など除去
    .toLowerCase();                      // 小文字化

  let finalName = base;
  let count = 1;

  // 同名がすでに dist-img にある場合は連番をつける
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
  const ext = path.extname(filePath).toLowerCase();
  const originalName = path.basename(filePath);
  const cleanName = sanitizeWithLog(originalName, ext);
  const outputBase = path.join(outputDir, cleanName);

  try {
    if (ext === '.png') {
      // ✅ PNG → WebP 変換
      await sharp(filePath)
        .webp({ quality: 75 })
        .toFile(`${outputBase}.webp`);
      console.log(`🌟 PNG→WebP変換: ${cleanName}.webp`);

    } else if (ext === '.svg') {
      // ✅ SVG → そのままコピー
      await fs.copy(filePath, `${outputBase}.svg`);
      console.log(`📄 SVGコピー: ${cleanName}.svg`);

    } else if (ext === '.webp') {
      // ✅ WebP → 命名してそのままコピー
      await fs.copy(filePath, `${outputBase}.webp`);
      console.log(`📄 WebPコピー: ${cleanName}.webp`);

    } else {
      // ❌ 未対応形式
      console.log(`⏭️ 未対応形式: ${originalName}`);
    }

  } catch (err) {
    console.error('❌ エラー:', err.message);
  }
};

// 📁 出力フォルダがなければ作成
fs.ensureDirSync(outputDir);

// 👀 img フォルダの監視を開始
console.log('👀 img フォルダを監視中… 画像を入れるだけで変換＆保存されます');

chokidar.watch(inputDir).on('add', (filePath) => {
  console.log(`📥 新しい画像: ${path.basename(filePath)}`);
  processImage(filePath);
});
