const fs = require('fs-extra');
const path = require('path');
const sharp = require('sharp');
const chokidar = require('chokidar');

// 📁 パス設定
const inputDir = './img'; // 入力フォルダ
const outputDir = './dist-img'; // 出力フォルダ
const logPath = path.join(__dirname, 'rename-log.json'); // 命名履歴ファイル
const mapPath = path.join(__dirname, 'section-map.json'); // セクションマップファイル

// 📘 JSON を読み込む関数（ログにもマップにも使える）
const loadJson = (filePath) => {
  if (fs.existsSync(filePath)) {
    return JSON.parse(fs.readFileSync(filePath, 'utf-8'));
  }
  return {};
};

// 🧠 データを読み込む
const renameLog = loadJson(logPath);
const sectionMap = loadJson(mapPath);

// 💾 ログを保存する関数
const saveRenameLog = (log) => {
  fs.writeFileSync(logPath, JSON.stringify(log, null, 2), 'utf-8');
};

// 🧼 命名処理（履歴＋セクションマップ＋連番）
const sanitizeWithLog = (originalName, ext) => {
  if (renameLog[originalName]) {
    return renameLog[originalName];
  }

  // ✅ セクションマップに命名ルールがあれば、それを優先
  if (sectionMap[originalName]) {
    const { section, name } = sectionMap[originalName];
    const base = name ? `${section}-${name}` : section;
    let finalName = base;
    let count = 1;

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
  }

  // 🔁 通常の命名処理
  const nameWithoutExt = originalName.replace(/\.[^/.]+$/, '');
  const base = nameWithoutExt
    .replace(/[（）()]/g, '')             // カッコ除去
    .replace(/[\s_]+/g, '-')              // 空白・アンダーバー → ハイフン
    .replace(/[^a-zA-Z0-9\-]/g, '')       // 記号除去
    .toLowerCase();                      // 小文字化

  let finalName = base;
  let count = 1;

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

// 📁 dist-img フォルダを作成（なければ）
fs.ensureDirSync(outputDir);

// 👀 img フォルダの監視開始
console.log('👀 img フォルダを監視中… 画像を入れるだけで変換＆保存されます');

chokidar.watch(inputDir).on('add', (filePath) => {
  console.log(`📥 新しい画像: ${path.basename(filePath)}`);
  processImage(filePath);
});
