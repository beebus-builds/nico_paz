const fs = require('fs');
const path = require('path');

const OUT = path.join(__dirname, '..', 'assets', 'images');
fs.mkdirSync(OUT, { recursive: true });

// ============================================================
// 1. NP MONOGRAM - Primary brand mark
// ============================================================
const npMonogram = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" fill="none">
  <defs>
    <linearGradient id="ng" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#75AADB"/>
      <stop offset="100%" stop-color="#3672B0"/>
    </linearGradient>
  </defs>
  <!-- Outer ring -->
  <circle cx="100" cy="100" r="92" fill="url(#ng)"/>
  <circle cx="100" cy="100" r="80" fill="none" stroke="#FFFFFF" stroke-width="2" opacity="0.4"/>
  <!-- N letter -->
  <path d="M 60 60 L 60 140 L 72 140 L 72 84 L 128 140 L 140 140 L 140 60 L 128 60 L 128 116 L 72 60 Z" fill="#FFFFFF"/>
  <!-- Number 10 below -->
  <text x="100" y="170" font-family="system-ui, sans-serif" font-size="14" font-weight="900" fill="#F6B40E" text-anchor="middle" letter-spacing="2">N° 10</text>
</svg>`;
fs.writeFileSync(path.join(OUT, 'logo-np.svg'), npMonogram);

// ============================================================
// 2. NP MONOGRAM - Dark variant (for light backgrounds)
// ============================================================
const npMonogramDark = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" fill="none">
  <circle cx="100" cy="100" r="92" fill="#0A0E1A"/>
  <circle cx="100" cy="100" r="80" fill="none" stroke="#75AADB" stroke-width="2" opacity="0.4"/>
  <path d="M 60 60 L 60 140 L 72 140 L 72 84 L 128 140 L 140 140 L 140 60 L 128 60 L 128 116 L 72 60 Z" fill="#75AADB"/>
  <text x="100" y="170" font-family="system-ui, sans-serif" font-size="14" font-weight="900" fill="#F6B40E" text-anchor="middle" letter-spacing="2">N° 10</text>
</svg>`;
fs.writeFileSync(path.join(OUT, 'logo-np-dark.svg'), npMonogramDark);

// ============================================================
// 3. ARGENTINA FLAG RIBBON - Used as section accent
// ============================================================
const argFlag = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 120 80">
  <rect x="0" y="0" width="40" height="80" fill="#75AADB"/>
  <rect x="40" y="0" width="40" height="80" fill="#FFFFFF"/>
  <rect x="80" y="0" width="40" height="80" fill="#75AADB"/>
  <!-- Sun -->
  <circle cx="60" cy="40" r="10" fill="#F6B40E"/>
  <g stroke="#F6B40E" stroke-width="1.5" stroke-linecap="round">
    <line x1="60" y1="22" x2="60" y2="26"/>
    <line x1="60" y1="54" x2="60" y2="58"/>
    <line x1="42" y1="40" x2="46" y2="40"/>
    <line x1="74" y1="40" x2="78" y2="40"/>
    <line x1="47.5" y1="27.5" x2="50" y2="30"/>
    <line x1="70" y1="50" x2="72.5" y2="52.5"/>
    <line x1="47.5" y1="52.5" x2="50" y2="50"/>
    <line x1="70" y1="30" x2="72.5" y2="27.5"/>
  </g>
</svg>`;
fs.writeFileSync(path.join(OUT, 'argentina-flag.svg'), argFlag);

// ============================================================
// 4. ARGENTINA STRIPE PATTERN - For section dividers
// ============================================================
const argStripes = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 20" preserveAspectRatio="none">
  <rect x="0" y="0" width="400" height="20" fill="#75AADB"/>
  <rect x="0" y="6" width="400" height="8" fill="#FFFFFF"/>
  <rect x="0" y="14" width="400" height="6" fill="#75AADB"/>
</svg>`;
fs.writeFileSync(path.join(OUT, 'argentina-stripes.svg'), argStripes);

// ============================================================
// 5. SHIELD / CREST - Team emblem
// ============================================================
const crest = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 240">
  <defs>
    <linearGradient id="crest-grad" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" stop-color="#75AADB"/>
      <stop offset="100%" stop-color="#3672B0"/>
    </linearGradient>
  </defs>
  <!-- Shield shape -->
  <path d="M 100 10 L 190 50 L 190 130 Q 190 200 100 230 Q 10 200 10 130 L 10 50 Z" fill="url(#crest-grad)" stroke="#0A0E1A" stroke-width="3"/>
  <!-- Inner border -->
  <path d="M 100 25 L 175 58 L 175 130 Q 175 190 100 215 Q 25 190 25 130 L 25 58 Z" fill="none" stroke="#FFFFFF" stroke-width="2" opacity="0.5"/>
  <!-- NP letters -->
  <text x="100" y="115" font-family="system-ui, sans-serif" font-size="64" font-weight="900" fill="#FFFFFF" text-anchor="middle" letter-spacing="-2">NP</text>
  <!-- Number 10 -->
  <text x="100" y="160" font-family="system-ui, sans-serif" font-size="24" font-weight="900" fill="#F6B40E" text-anchor="middle" letter-spacing="3">N° 10</text>
  <!-- Stars -->
  <text x="60" y="80" font-size="20" fill="#F6B40E">★</text>
  <text x="140" y="80" font-size="20" fill="#F6B40E">★</text>
</svg>`;
fs.writeFileSync(path.join(OUT, 'crest.svg'), crest);

// ============================================================
// 6. FAVICON - 32x32 simplified NP
// ============================================================
const favicon = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
  <rect width="32" height="32" rx="6" fill="#75AADB"/>
  <text x="16" y="22" font-family="system-ui, sans-serif" font-size="16" font-weight="900" fill="#FFFFFF" text-anchor="middle" letter-spacing="-1">NP</text>
</svg>`;
fs.writeFileSync(path.join(OUT, 'favicon.svg'), favicon);

// ============================================================
// 7. OG IMAGE / SOCIAL CARD - 1200x630
// ============================================================
const ogImage = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 630">
  <defs>
    <linearGradient id="og-bg" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#0A0E1A"/>
      <stop offset="100%" stop-color="#1A1E27"/>
    </linearGradient>
    <linearGradient id="og-celeste" x1="0%" y1="0%" x2="100%" y2="0%">
      <stop offset="0%" stop-color="#75AADB"/>
      <stop offset="100%" stop-color="#4A8FCC"/>
    </linearGradient>
  </defs>
  <!-- Background -->
  <rect width="1200" height="630" fill="url(#og-bg)"/>
  <!-- Grid pattern -->
  <g opacity="0.05">
    ${Array.from({length: 20}, (_, i) => `<line x1="${i*60}" y1="0" x2="${i*60}" y2="630" stroke="#75AADB" stroke-width="1"/>`).join('')}
    ${Array.from({length: 11}, (_, i) => `<line x1="0" y1="${i*60}" x2="1200" y2="${i*60}" stroke="#75AADB" stroke-width="1"/>`).join('')}
  </g>
  <!-- Argentina stripe accent (left) -->
  <rect x="0" y="0" width="20" height="630" fill="url(#og-celeste)"/>
  <rect x="0" y="0" width="20" height="210" fill="#75AADB"/>
  <rect x="0" y="210" width="20" height="210" fill="#FFFFFF"/>
  <rect x="0" y="420" width="20" height="210" fill="#75AADB"/>
  <!-- Gold sun accent -->
  <circle cx="1080" cy="120" r="60" fill="#F6B40E" opacity="0.9"/>
  <circle cx="1080" cy="120" r="40" fill="none" stroke="#F6B40E" stroke-width="2" opacity="0.5"/>
  <!-- Title -->
  <text x="80" y="280" font-family="system-ui, sans-serif" font-size="160" font-weight="900" fill="#FFFFFF" letter-spacing="-6">NICO</text>
  <text x="80" y="430" font-family="system-ui, sans-serif" font-size="160" font-weight="900" fill="#75AADB" letter-spacing="-6">PAZ</text>
  <!-- Tagline -->
  <text x="80" y="490" font-family="system-ui, sans-serif" font-size="32" font-weight="500" fill="#75AADB" letter-spacing="4">N° 10 · ARGENTINA</text>
  <!-- Bottom info -->
  <text x="80" y="560" font-family="system-ui, sans-serif" font-size="24" font-weight="500" fill="#FFFFFF" opacity="0.6" letter-spacing="2">OFFICIAL · NICOPAZ.COM</text>
</svg>`;
fs.writeFileSync(path.join(OUT, 'og-image.svg'), ogImage);

// ============================================================
// 8. BANNER / COVER - Wide hero pattern
// ============================================================
const coverPattern = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 400" preserveAspectRatio="xMidYMid slice">
  <defs>
    <linearGradient id="cov-bg" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#0A0E1A"/>
      <stop offset="50%" stop-color="#152D45"/>
      <stop offset="100%" stop-color="#0A0E1A"/>
    </linearGradient>
  </defs>
  <rect width="1200" height="400" fill="url(#cov-bg)"/>
  <!-- Diagonal stripes pattern -->
  ${Array.from({length: 20}, (_, i) => `<line x1="${-200 + i*100}" y1="0" x2="${i*100}" y2="400" stroke="#75AADB" stroke-width="1" opacity="0.1"/>`).join('')}
  <!-- Big NP -->
  <text x="600" y="240" font-family="system-ui, sans-serif" font-size="280" font-weight="900" fill="#75AADB" text-anchor="middle" opacity="0.15" letter-spacing="-10">NP</text>
</svg>`;
fs.writeFileSync(path.join(OUT, 'cover-pattern.svg'), coverPattern);

// ============================================================
// 9. JERSEY MOCKUP - Front view of an Argentina-style jersey
// ============================================================
const jerseyMockup = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 500">
  <defs>
    <linearGradient id="jersey-grad" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" stop-color="#8FC5F0"/>
      <stop offset="100%" stop-color="#75AADB"/>
    </linearGradient>
    <linearGradient id="jersey-stripe" x1="0%" y1="0%" x2="100%" y2="0%">
      <stop offset="0%" stop-color="#FFFFFF" stop-opacity="0"/>
      <stop offset="50%" stop-color="#FFFFFF" stop-opacity="0.95"/>
      <stop offset="100%" stop-color="#FFFFFF" stop-opacity="0"/>
    </linearGradient>
  </defs>
  <!-- Jersey body -->
  <path d="M 100 80 L 60 110 L 80 160 L 110 145 L 110 460 L 290 460 L 290 145 L 320 160 L 340 110 L 300 80 L 250 70 Q 200 100 150 70 Z" fill="url(#jersey-grad)" stroke="#0A0E1A" stroke-width="2"/>
  <!-- Center stripe (white) -->
  <path d="M 180 70 L 180 460 L 220 460 L 220 70 Q 200 90 180 70 Z" fill="#FFFFFF"/>
  <!-- V-neck -->
  <path d="M 170 70 L 200 120 L 230 70 Q 200 90 170 70 Z" fill="#0A0E1A" opacity="0.3"/>
  <!-- Number 10 -->
  <text x="200" y="290" font-family="system-ui, sans-serif" font-size="100" font-weight="900" fill="#0A0E1A" text-anchor="middle" letter-spacing="-3">10</text>
  <!-- Name -->
  <text x="200" y="225" font-family="system-ui, sans-serif" font-size="28" font-weight="900" fill="#0A0E1A" text-anchor="middle" letter-spacing="3">PAZ</text>
  <!-- Logo placeholder (crest) -->
  <circle cx="150" cy="200" r="14" fill="#75AADB" stroke="#0A0E1A" stroke-width="1.5"/>
  <text x="150" y="205" font-family="system-ui, sans-serif" font-size="14" font-weight="900" fill="#FFFFFF" text-anchor="middle">A</text>
  <!-- Stripes on sleeves -->
  <path d="M 60 110 L 80 160 L 75 160 L 55 115 Z" fill="#FFFFFF"/>
  <path d="M 340 110 L 320 160 L 325 160 L 345 115 Z" fill="#FFFFFF"/>
  <!-- Subtle shadow -->
  <path d="M 100 80 L 60 110 L 80 160 L 110 145 L 110 460 L 290 460 L 290 145 L 320 160 L 340 110 L 300 80 L 250 70 Q 200 100 150 70 Z" fill="black" opacity="0.05" transform="translate(2 2)"/>
</svg>`;
fs.writeFileSync(path.join(OUT, 'jersey-mockup.svg'), jerseyMockup);

// ============================================================
// 10. SECTION DIVIDER - Argentina stripes wavy
// ============================================================
const divider = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 60" preserveAspectRatio="none">
  <defs>
    <linearGradient id="div-fade" x1="0%" y1="0%" x2="100%" y2="0%">
      <stop offset="0%" stop-color="#75AADB" stop-opacity="0"/>
      <stop offset="20%" stop-color="#75AADB" stop-opacity="1"/>
      <stop offset="50%" stop-color="#FFFFFF" stop-opacity="1"/>
      <stop offset="80%" stop-color="#75AADB" stop-opacity="1"/>
      <stop offset="100%" stop-color="#75AADB" stop-opacity="0"/>
    </linearGradient>
  </defs>
  <path d="M 0 30 Q 300 0 600 30 T 1200 30" stroke="url(#div-fade)" stroke-width="3" fill="none"/>
  <circle cx="600" cy="30" r="6" fill="#F6B40E"/>
</svg>`;
fs.writeFileSync(path.join(OUT, 'divider-argentina.svg'), divider);

// ============================================================
// 11. BOOT / CLEAT ICON - Decorative
// ============================================================
const boot = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
  <defs>
    <linearGradient id="boot-grad" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" stop-color="#FFFFFF"/>
      <stop offset="100%" stop-color="#A0C8E8"/>
    </linearGradient>
  </defs>
  <path d="M 15 60 L 15 75 Q 15 85 25 85 L 75 85 Q 85 85 85 75 L 85 55 Q 85 45 75 45 L 65 45 Q 60 30 45 25 L 35 25 Q 25 30 20 45 L 15 45 Q 10 45 10 55 Z" fill="url(#boot-grad)" stroke="#0A0E1A" stroke-width="2"/>
  <!-- Nike-style swoosh -->
  <path d="M 25 60 Q 50 50 75 60" stroke="#0A0E1A" stroke-width="2.5" fill="none"/>
  <!-- Studs -->
  <circle cx="20" cy="85" r="2" fill="#0A0E1A"/>
  <circle cx="35" cy="85" r="2" fill="#0A0E1A"/>
  <circle cx="50" cy="85" r="2" fill="#0A0E1A"/>
  <circle cx="65" cy="85" r="2" fill="#0A0E1A"/>
  <circle cx="80" cy="85" r="2" fill="#0A0E1A"/>
</svg>`;
fs.writeFileSync(path.join(OUT, 'boot-icon.svg'), boot);

// ============================================================
// 12. TROPHY ICON - Achievement badge
// ============================================================
const trophy = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
  <defs>
    <linearGradient id="trophy-grad" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" stop-color="#F6CA47"/>
      <stop offset="100%" stop-color="#F6B40E"/>
    </linearGradient>
  </defs>
  <!-- Cup body -->
  <path d="M 30 20 L 30 50 Q 30 70 50 75 Q 70 70 70 50 L 70 20 Z" fill="url(#trophy-grad)" stroke="#0A0E1A" stroke-width="2"/>
  <!-- Handles -->
  <path d="M 30 25 Q 15 25 15 40 Q 15 50 30 50" fill="none" stroke="#F6B40E" stroke-width="3"/>
  <path d="M 70 25 Q 85 25 85 40 Q 85 50 70 50" fill="none" stroke="#F6B40E" stroke-width="3"/>
  <!-- Star -->
  <text x="50" y="50" font-family="system-ui, sans-serif" font-size="24" font-weight="900" fill="#0A0E1A" text-anchor="middle">★</text>
  <!-- Base -->
  <rect x="42" y="75" width="16" height="6" fill="#F6B40E" stroke="#0A0E1A" stroke-width="1"/>
  <rect x="35" y="81" width="30" height="8" fill="#F6B40E" stroke="#0A0E1A" stroke-width="1" rx="1"/>
</svg>`;
fs.writeFileSync(path.join(OUT, 'trophy-icon.svg'), trophy);

// ============================================================
// 13. PITCH / FIELD ICON
// ============================================================
const pitch = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120">
  <rect width="200" height="120" fill="#3672B0" rx="4"/>
  <rect x="2" y="2" width="196" height="116" fill="none" stroke="#FFFFFF" stroke-width="1" opacity="0.8"/>
  <line x1="100" y1="2" x2="100" y2="118" stroke="#FFFFFF" stroke-width="1" opacity="0.8"/>
  <circle cx="100" cy="60" r="14" fill="none" stroke="#FFFFFF" stroke-width="1" opacity="0.8"/>
  <rect x="2" y="35" width="20" height="50" fill="none" stroke="#FFFFFF" stroke-width="1" opacity="0.8"/>
  <rect x="178" y="35" width="20" height="50" fill="none" stroke="#FFFFFF" stroke-width="1" opacity="0.8"/>
  <rect x="2" y="50" width="8" height="20" fill="none" stroke="#FFFFFF" stroke-width="1" opacity="0.8"/>
  <rect x="190" y="50" width="8" height="20" fill="none" stroke="#FFFFFF" stroke-width="1" opacity="0.8"/>
  <circle cx="14" cy="60" r="1.5" fill="#FFFFFF" opacity="0.8"/>
  <circle cx="186" cy="60" r="1.5" fill="#FFFFFF" opacity="0.8"/>
</svg>`;
fs.writeFileSync(path.join(OUT, 'pitch-icon.svg'), pitch);

// ============================================================
// 14. BALL ICON - Decorative
// ============================================================
const ball = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
  <circle cx="50" cy="50" r="45" fill="#FFFFFF" stroke="#0A0E1A" stroke-width="2"/>
  <polygon points="50,25 65,40 58,55 42,55 35,40" fill="#0A0E1A"/>
  <polygon points="50,25 65,40 75,30 65,15 50,15" fill="#0A0E1A"/>
  <polygon points="50,25 35,40 25,30 35,15 50,15" fill="#0A0E1A"/>
  <polygon points="42,55 35,40 25,30 18,45 25,65 35,65" fill="#0A0E1A"/>
  <polygon points="58,55 65,40 75,30 82,45 75,65 65,65" fill="#0A0E1A"/>
  <polygon points="42,55 50,75 58,55" fill="#0A0E1A"/>
  <polygon points="25,65 35,65 50,75 42,85 30,82" fill="#0A0E1A"/>
  <polygon points="75,65 65,65 50,75 58,85 70,82" fill="#0A0E1A"/>
  <polygon points="50,75 42,85 50,95 58,85" fill="#0A0E1A"/>
</svg>`;
fs.writeFileSync(path.join(OUT, 'ball-icon.svg'), ball);

// ============================================================
// 15. NOISE / GRAIN TEXTURE (for backgrounds)
// ============================================================
const noise = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200">
  <filter id="noise-filter">
    <feTurbulence type="fractalNoise" baseFrequency="0.85" numOctaves="3" stitchTiles="stitch"/>
    <feColorMatrix type="saturate" values="0"/>
  </filter>
  <rect width="100%" height="100%" filter="url(#noise-filter)" opacity="0.4"/>
</svg>`;
fs.writeFileSync(path.join(OUT, 'noise.svg'), noise);

// ============================================================
// Done
// ============================================================
console.log('SVG assets generated:');
const files = fs.readdirSync(OUT).filter(f => f.endsWith('.svg'));
files.forEach(f => {
  const stat = fs.statSync(path.join(OUT, f));
  console.log(`  ${f} - ${(stat.size/1024).toFixed(1)}KB`);
});
