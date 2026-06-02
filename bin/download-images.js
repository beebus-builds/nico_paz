const https = require('https');
const fs = require('fs');
const path = require('path');
const sharp = require('sharp');

const OUT = path.join(__dirname, '..', 'assets', 'images');
fs.mkdirSync(OUT, { recursive: true });

function downloadImage(url, redirects = 0) {
  if (redirects > 5) return Promise.reject(new Error('Too many redirects for ' + url));
  return new Promise((resolve, reject) => {
    const req = https.get(url, {
      headers: { 'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36' }
    }, (res) => {
      if ([301, 302, 303, 307, 308].includes(res.statusCode)) {
        resolve(downloadImage(res.headers.location, redirects + 1));
        return;
      }
      if (res.statusCode !== 200) {
        reject(new Error('HTTP ' + res.statusCode + ' for ' + url));
        return;
      }
      const chunks = [];
      res.on('data', (c) => chunks.push(c));
      res.on('end', () => resolve(Buffer.concat(chunks)));
      res.on('error', reject);
    });
    req.on('error', reject);
    req.setTimeout(30000, () => req.destroy(new Error('Timeout')));
  });
}

async function optimizeAndSave(input, outName, width, height, quality = 85) {
  const webpPath = path.join(OUT, outName + '.webp');
  await sharp(input)
    .resize(width, height, { fit: 'cover', position: 'center' })
    .webp({ quality })
    .toFile(webpPath);
  return webpPath;
}

const photos = [
  // Hero - dramatic football action
  { id: 'photo-1551958219-acbc608c6377', name: 'hero-1', w: 1920, h: 1080 },
  { id: 'photo-1574629810360-7efbbe195018', name: 'hero-2', w: 1920, h: 1080 },
  { id: 'photo-1459865264687-595d652de67e', name: 'hero-3', w: 1920, h: 1080 },
  { id: 'photo-1431324155629-1a6deb1dec8d', name: 'hero-4', w: 1920, h: 1080 },

  // About / portrait
  { id: 'photo-1517466787929-bc90951d0974', name: 'about', w: 1200, h: 1500 },

  // Gallery bento - 8 varied sports shots
  { id: 'photo-1431324155629-1a6deb1dec8d', name: 'gallery-1', w: 800, h: 800 },
  { id: 'photo-1551958219-acbc608c6377', name: 'gallery-2', w: 800, h: 800 },
  { id: 'photo-1459865264687-595d652de67e', name: 'gallery-3', w: 800, h: 800 },
  { id: 'photo-1574629810360-7efbbe195018', name: 'gallery-4', w: 800, h: 800 },
  { id: 'photo-1577223625816-7546f13df25d', name: 'gallery-5', w: 1600, h: 800 },
  { id: 'photo-1518604666860-9ed391f76460', name: 'gallery-6', w: 800, h: 800 },
  { id: 'photo-1606925797300-0b35e9d1794e', name: 'gallery-7', w: 800, h: 800 },
  { id: 'photo-1556056504-5c7696c4c28d', name: 'gallery-8', w: 800, h: 800 },

  // Press kit - headshots
  { id: 'photo-1494790108377-be9c29b29330', name: 'press-headshot-1', w: 1200, h: 1200 },
  { id: 'photo-1500648767791-00dcc994a43e', name: 'press-headshot-2', w: 1200, h: 1200 },
  { id: 'photo-1507003211169-0a1dd7228f2d', name: 'press-headshot-3', w: 1200, h: 1200 },
  { id: 'photo-1519085360753-af0119f7cbe7', name: 'press-headshot-4', w: 1200, h: 1200 },

  // Press kit - action
  { id: 'photo-1551958219-acbc608c6377', name: 'press-action-1', w: 1920, h: 1080 },
  { id: 'photo-1459865264687-595d652de67e', name: 'press-action-2', w: 1920, h: 1080 },

  // Training / lifestyle
  { id: 'photo-1571019613454-1cb2f99b2d8b', name: 'training-1', w: 1200, h: 800 },
  { id: 'photo-1530549387789-4c1017266635', name: 'training-2', w: 1200, h: 800 },
];

async function main() {
  console.log('Downloading and optimizing images...\n');
  let success = 0, failed = 0;

  for (const p of photos) {
    const url = `https://images.unsplash.com/${p.id}?auto=format&fit=crop&w=400&q=60`;
    const tmp = path.join(OUT, '_tmp_' + p.name + '.jpg');

    try {
      process.stdout.write(`  ${p.name} (${p.w}x${p.h})... `);
      const buf = await downloadImage(url);
      fs.writeFileSync(tmp, buf);
      await optimizeAndSave(tmp, p.name, p.w, p.h, 88);
      fs.unlinkSync(tmp);
      console.log('OK');
      success++;
    } catch (e) {
      console.log('FAIL: ' + e.message);
      failed++;
      if (fs.existsSync(tmp)) fs.unlinkSync(tmp);
    }
  }

  console.log(`\nDone. ${success} succeeded, ${failed} failed.`);
}

main().catch(e => { console.error('Fatal:', e); process.exit(1); });
