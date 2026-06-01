const sharp = require('sharp');
const fs = require('fs');
const path = require('path');

const IMAGES_DIR = path.resolve(__dirname, '..', 'assets', 'images');
const TEMP_DIR = path.resolve(__dirname, '..', 'tmp');

const configs = [
  { name: 'hero-1.webp', width: 1920, height: 1080, quality: 85, fit: 'cover', position: 'centre' },
  { name: 'hero-2.webp', width: 1920, height: 1080, quality: 85, fit: 'cover', position: 'centre' },
  { name: 'about.webp',  width: 1200, height: 1500, quality: 90, fit: 'cover', position: 'north' },
];

async function optimize() {
  if (!fs.existsSync(TEMP_DIR)) fs.mkdirSync(TEMP_DIR, { recursive: true });

  for (const cfg of configs) {
    const inputPath = path.join(IMAGES_DIR, cfg.name);
    if (!fs.existsSync(inputPath)) {
      console.log(`Skipping ${cfg.name} — not found`);
      continue;
    }

    try {
      const oldSize = fs.statSync(inputPath).size;
      const tmpPath = path.join(TEMP_DIR, cfg.name);

      await sharp(inputPath)
        .resize(cfg.width, cfg.height, { fit: cfg.fit || 'cover', position: cfg.position || 'centre' })
        .webp({ quality: cfg.quality, effort: 6 })
        .toFile(tmpPath);

      const newSize = fs.statSync(tmpPath).size;
      const pct = oldSize > newSize ? `${Math.round((1 - newSize / oldSize) * 100)}% smaller` : `${Math.round((newSize / oldSize - 1) * 100)}% larger (upscaled)`;
      console.log(`${cfg.name}: ${oldSize}B → ${newSize}B (${pct}) [${cfg.width}×${cfg.height}]`);
      console.log(`  tmp: ${tmpPath}`);
    } catch (err) {
      console.error(`Error: ${cfg.name}: ${err.message}`);
    }
  }

  console.log('\nDone. Copy from tmp/ to assets/images/ and delete tmp/');
}

optimize();
