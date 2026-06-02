const fs = require('fs');
const path = require('path');

const OUT = path.join(__dirname, '..', 'assets', 'images');
fs.mkdirSync(OUT, { recursive: true });

// Nepal flag colors (Pantone approximations)
// Red:  Pantone 1795 C  ->  #DC143C (crimson)
// Blue: Pantone 287 C   ->  #003893
const CRIMSON = '#DC143C';
const CRIMSON_DARK = '#A50E2D';
const NEPAL_BLUE = '#003893';
const NEPAL_BLUE_DARK = '#001F5C';

// ============================================================
// 1. ANIMATED NEPAL FLAG - The flagship asset
// Uses SVG feTurbulence + feDisplacementMap for the wave effect
// ============================================================
const nepalFlagAnimated = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 500" preserveAspectRatio="xMidYMid meet" role="img" aria-label="Animated flag of Nepal">
  <defs>
    <!-- Flag wave filter: turbulence + displacement creates the flapping illusion -->
    <filter id="flagWave" x="-5%" y="-5%" width="115%" height="115%">
      <feTurbulence type="fractalNoise" baseFrequency="0.012 0.05" numOctaves="2" seed="3" result="noise">
        <animate attributeName="baseFrequency" values="0.012 0.05; 0.022 0.08; 0.012 0.05" dur="4s" repeatCount="indefinite"/>
        <animate attributeName="seed" values="3; 7; 12; 5; 3" dur="6s" repeatCount="indefinite"/>
      </feTurbulence>
      <feDisplacementMap in="SourceGraphic" in2="noise" scale="18" xChannelSelector="R" yChannelSelector="G"/>
    </filter>

    <!-- Shadow filter for depth -->
    <filter id="flagShadow" x="-10%" y="-10%" width="120%" height="120%">
      <feGaussianBlur in="SourceAlpha" stdDeviation="6"/>
      <feOffset dx="2" dy="4" result="offsetblur"/>
      <feComponentTransfer><feFuncA type="linear" slope="0.4"/></feComponentTransfer>
      <feMerge><feMergeNode/><feMergeNode in="SourceGraphic"/></feMerge>
    </filter>

    <!-- Shine overlay gradient -->
    <linearGradient id="flagShine" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" stop-color="#FFFFFF" stop-opacity="0.18"/>
      <stop offset="40%" stop-color="#FFFFFF" stop-opacity="0"/>
      <stop offset="100%" stop-color="#000000" stop-opacity="0.22"/>
    </linearGradient>

    <!-- Pole gradient -->
    <linearGradient id="poleGrad" x1="0%" y1="0%" x2="100%" y2="0%">
      <stop offset="0%" stop-color="#5A5A5A"/>
      <stop offset="40%" stop-color="#C0C0C0"/>
      <stop offset="50%" stop-color="#E8E8E8"/>
      <stop offset="60%" stop-color="#C0C0C0"/>
      <stop offset="100%" stop-color="#5A5A5A"/>
    </linearGradient>

    <!-- Gold finial gradient -->
    <radialGradient id="finialGrad" cx="40%" cy="40%" r="60%">
      <stop offset="0%" stop-color="#FFE680"/>
      <stop offset="50%" stop-color="#F6B40E"/>
      <stop offset="100%" stop-color="#8C5E04"/>
    </radialGradient>
  </defs>

  <!-- Sky background (transparent — uses page bg) -->
  <rect width="800" height="500" fill="transparent"/>

  <!-- FLAGPOLE -->
  <g id="pole">
    <rect x="20" y="20" width="6" height="460" fill="url(#poleGrad)" stroke="#3A3A3A" stroke-width="0.5"/>
    <!-- Pole top finial -->
    <circle cx="23" cy="18" r="10" fill="url(#finialGrad)" stroke="#5C3D02" stroke-width="0.5">
      <animate attributeName="r" values="10; 11; 10" dur="3s" repeatCount="indefinite"/>
    </circle>
    <!-- Spike on top -->
    <polygon points="23,2 21,10 25,10" fill="url(#finialGrad)" stroke="#5C3D02" stroke-width="0.5"/>
    <!-- Pole base -->
    <rect x="14" y="475" width="18" height="10" fill="#4A4A4A" rx="1"/>
    <rect x="10" y="482" width="26" height="6" fill="#2A2A2A" rx="1"/>
  </g>

  <!-- FLAG with wave filter -->
  <g filter="url(#flagWave)" transform="translate(28 50)">
    <!-- Blue border (outer) - two stacked triangles -->
    <path d="M 0 0 L 720 0 L 720 80 L 360 180 L 720 280 L 720 360 L 0 360 Z" fill="${NEPAL_BLUE}"/>

    <!-- Red inner (slightly inset to show blue border) -->
    <path d="M 12 12 L 708 12 L 708 80 L 360 174 L 708 268 L 708 348 L 12 348 Z" fill="${CRIMSON}"/>

    <!-- Shine overlay -->
    <path d="M 12 12 L 708 12 L 708 80 L 360 174 L 708 268 L 708 348 L 12 348 Z" fill="url(#flagShine)"/>

    <!-- WHITE CRESCENT MOON (upper triangle) -->
    <g transform="translate(150 78)">
      <circle cx="0" cy="0" r="22" fill="#FFFFFF"/>
      <circle cx="-9" cy="0" r="18" fill="${CRIMSON}"/>
      <!-- Moon glow -->
      <circle cx="0" cy="0" r="22" fill="none" stroke="#FFFFFF" stroke-width="1" opacity="0.3"/>
    </g>

    <!-- WHITE SUN (lower triangle) -->
    <g transform="translate(190 252)">
      <!-- Sun rays (8) -->
      <g stroke="#FFFFFF" stroke-width="4" stroke-linecap="round">
        <line x1="0" y1="-32" x2="0" y2="-22"/>
        <line x1="0" y1="22" x2="0" y2="32"/>
        <line x1="-32" y1="0" x2="-22" y2="0"/>
        <line x1="22" y1="0" x2="32" y2="0"/>
        <line x1="-22.6" y1="-22.6" x2="-15.6" y2="-15.6"/>
        <line x1="15.6" y1="15.6" x2="22.6" y2="22.6"/>
        <line x1="-22.6" y1="22.6" x2="-15.6" y2="15.6"/>
        <line x1="15.6" y1="-15.6" x2="22.6" y2="-22.6"/>
      </g>
      <!-- Sun body -->
      <circle cx="0" cy="0" r="18" fill="#FFFFFF"/>
      <circle cx="0" cy="0" r="18" fill="none" stroke="#FFFFFF" stroke-width="0.5" opacity="0.3"/>
    </g>
  </g>
</svg>`;
fs.writeFileSync(path.join(OUT, 'nepal-flag-animated.svg'), nepalFlagAnimated);

// ============================================================
// 2. STATIC NEPAL FLAG (no animation) - for OG image, print
// ============================================================
const nepalFlagStatic = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 500" role="img" aria-label="Flag of Nepal">
  <defs>
    <linearGradient id="staticShine" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" stop-color="#FFFFFF" stop-opacity="0.1"/>
      <stop offset="100%" stop-color="#000000" stop-opacity="0.1"/>
    </linearGradient>
  </defs>
  <!-- Blue border -->
  <path d="M 0 0 L 720 0 L 720 80 L 360 180 L 720 280 L 720 360 L 0 360 Z" fill="${NEPAL_BLUE}"/>
  <!-- Red inner -->
  <path d="M 12 12 L 708 12 L 708 80 L 360 174 L 708 268 L 708 348 L 12 348 Z" fill="${CRIMSON}"/>
  <!-- Shine -->
  <path d="M 12 12 L 708 12 L 708 80 L 360 174 L 708 268 L 708 348 L 12 348 Z" fill="url(#staticShine)"/>
  <!-- Moon -->
  <g transform="translate(150 78)">
    <circle cx="0" cy="0" r="22" fill="#FFFFFF"/>
    <circle cx="-9" cy="0" r="18" fill="${CRIMSON}"/>
  </g>
  <!-- Sun -->
  <g transform="translate(190 252)">
    <g stroke="#FFFFFF" stroke-width="4" stroke-linecap="round">
      <line x1="0" y1="-32" x2="0" y2="-22"/>
      <line x1="0" y1="22" x2="0" y2="32"/>
      <line x1="-32" y1="0" x2="-22" y2="0"/>
      <line x1="22" y1="0" x2="32" y2="0"/>
      <line x1="-22.6" y1="-22.6" x2="-15.6" y2="-15.6"/>
      <line x1="15.6" y1="15.6" x2="22.6" y2="22.6"/>
      <line x1="-22.6" y1="22.6" x2="-15.6" y2="15.6"/>
      <line x1="15.6" y1="-15.6" x2="22.6" y2="-22.6"/>
    </g>
    <circle cx="0" cy="0" r="18" fill="#FFFFFF"/>
  </g>
</svg>`;
fs.writeFileSync(path.join(OUT, 'nepal-flag.svg'), nepalFlagStatic);

// ============================================================
// 3. NEPAL FLAG OUTLINE - For watermarks, subtle backgrounds
// ============================================================
const nepalFlagOutline = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 720 360" fill="none">
  <path d="M 12 12 L 708 12 L 708 80 L 360 174 L 708 268 L 708 348 L 12 348 Z" stroke="currentColor" stroke-width="2"/>
</svg>`;
fs.writeFileSync(path.join(OUT, 'nepal-flag-outline.svg'), nepalFlagOutline);

// ============================================================
// 4. NEPAL SUN/MOON ICON - Standalone celestial motif
// ============================================================
const celestial = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200">
  <defs>
    <linearGradient id="cel-grad" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" stop-color="${CRIMSON}"/>
      <stop offset="100%" stop-color="${CRIMSON_DARK}"/>
    </linearGradient>
  </defs>
  <circle cx="100" cy="100" r="95" fill="url(#cel-grad)"/>
  <!-- Moon -->
  <g transform="translate(70 100)">
    <circle cx="0" cy="0" r="28" fill="#FFFFFF"/>
    <circle cx="-12" cy="0" r="24" fill="url(#cel-grad)"/>
  </g>
  <!-- Sun -->
  <g transform="translate(130 100)">
    <g stroke="#FFFFFF" stroke-width="3" stroke-linecap="round">
      <line x1="0" y1="-38" x2="0" y2="-26"/>
      <line x1="0" y1="26" x2="0" y2="38"/>
      <line x1="-38" y1="0" x2="-26" y2="0"/>
      <line x1="26" y1="0" x2="38" y2="0"/>
      <line x1="-26.9" y1="-26.9" x2="-18.4" y2="-18.4"/>
      <line x1="18.4" y1="18.4" x2="26.9" y2="26.9"/>
      <line x1="-26.9" y1="26.9" x2="-18.4" y2="18.4"/>
      <line x1="18.4" y1="-18.4" x2="26.9" y2="-26.9"/>
    </g>
    <circle cx="0" cy="0" r="22" fill="#FFFFFF"/>
  </g>
</svg>`;
fs.writeFileSync(path.join(OUT, 'celestial-icon.svg'), celestial);

// ============================================================
// 5. NEPAL FLAG STRIPES PATTERN - For section dividers
// ============================================================
const nepalStripes = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 40" preserveAspectRatio="none">
  <rect width="400" height="40" fill="${NEPAL_BLUE}"/>
  <rect x="0" y="6" width="400" height="28" fill="${CRIMSON}"/>
  <!-- Mini sun + moon -->
  <g transform="translate(40 20)">
    <circle r="6" fill="#FFFFFF"/>
    <circle cx="-3" cy="0" r="4.5" fill="${CRIMSON}"/>
  </g>
  <g transform="translate(360 20)">
    <g stroke="#FFFFFF" stroke-width="1.2" stroke-linecap="round">
      <line x1="0" y1="-8" x2="0" y2="-5"/>
      <line x1="0" y1="5" x2="0" y2="8"/>
      <line x1="-8" y1="0" x2="-5" y2="0"/>
      <line x1="5" y1="0" x2="8" y2="0"/>
    </g>
    <circle r="4" fill="#FFFFFF"/>
  </g>
</svg>`;
fs.writeFileSync(path.join(OUT, 'nepal-stripes.svg'), nepalStripes);

// ============================================================
// 6. NEPAL FLAG TRIANGLE PATTERN - Decorative repeating
// ============================================================
const trianglePattern = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 100" preserveAspectRatio="xMidYMid slice">
  <defs>
    <pattern id="triPattern" x="0" y="0" width="100" height="100" patternUnits="userSpaceOnUse">
      <polygon points="0,0 100,0 50,80" fill="${CRIMSON}" opacity="0.15"/>
      <polygon points="0,0 100,0 50,80" fill="none" stroke="${NEPAL_BLUE}" stroke-width="1" opacity="0.3"/>
    </pattern>
  </defs>
  <rect width="200" height="100" fill="url(#triPattern)"/>
</svg>`;
fs.writeFileSync(path.join(OUT, 'nepal-triangle-pattern.svg'), trianglePattern);

// ============================================================
// 7. NEPAL-STYLE DIVIDER - Triangle-based with center sun/moon
// ============================================================
const divider = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 60" preserveAspectRatio="none">
  <defs>
    <linearGradient id="div-fade-nepal" x1="0%" y1="0%" x2="100%" y2="0%">
      <stop offset="0%" stop-color="${NEPAL_BLUE}" stop-opacity="0"/>
      <stop offset="20%" stop-color="${NEPAL_BLUE}" stop-opacity="1"/>
      <stop offset="50%" stop-color="${CRIMSON}" stop-opacity="1"/>
      <stop offset="80%" stop-color="${NEPAL_BLUE}" stop-opacity="1"/>
      <stop offset="100%" stop-color="${NEPAL_BLUE}" stop-opacity="0"/>
    </linearGradient>
  </defs>
  <path d="M 0 30 Q 300 0 600 30 T 1200 30" stroke="url(#div-fade-nepal)" stroke-width="3" fill="none"/>
  <g transform="translate(600 30)">
    <circle r="8" fill="#FFFFFF" stroke="${NEPAL_BLUE}" stroke-width="1.5"/>
    <circle r="4" fill="${CRIMSON}"/>
  </g>
</svg>`;
fs.writeFileSync(path.join(OUT, 'divider-nepal.svg'), divider);

// ============================================================
// 8. UPDATED LOGO - NP monogram with Nepal color scheme
// ============================================================
const npMonogramNepal = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" fill="none">
  <defs>
    <linearGradient id="ng-nepal" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="${CRIMSON}"/>
      <stop offset="100%" stop-color="${CRIMSON_DARK}"/>
    </linearGradient>
  </defs>
  <circle cx="100" cy="100" r="92" fill="url(#ng-nepal)"/>
  <circle cx="100" cy="100" r="80" fill="none" stroke="#FFFFFF" stroke-width="2" opacity="0.4"/>
  <path d="M 60 60 L 60 140 L 72 140 L 72 84 L 128 140 L 140 140 L 140 60 L 128 60 L 128 116 L 72 60 Z" fill="#FFFFFF"/>
  <text x="100" y="170" font-family="system-ui, sans-serif" font-size="14" font-weight="900" fill="${NEPAL_BLUE}" text-anchor="middle" letter-spacing="2">N° 10</text>
</svg>`;
fs.writeFileSync(path.join(OUT, 'logo-np.svg'), npMonogramNepal);

const npMonogramNepalDark = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" fill="none">
  <circle cx="100" cy="100" r="92" fill="#0A0E1A"/>
  <circle cx="100" cy="100" r="80" fill="none" stroke="${CRIMSON}" stroke-width="2" opacity="0.5"/>
  <path d="M 60 60 L 60 140 L 72 140 L 72 84 L 128 140 L 140 140 L 140 60 L 128 60 L 128 116 L 72 60 Z" fill="${CRIMSON}"/>
  <text x="100" y="170" font-family="system-ui, sans-serif" font-size="14" font-weight="900" fill="${NEPAL_BLUE}" text-anchor="middle" letter-spacing="2">N° 10</text>
</svg>`;
fs.writeFileSync(path.join(OUT, 'logo-np-dark.svg'), npMonogramNepalDark);

// ============================================================
// 9. CREST - Team shield in Nepal colors
// ============================================================
const crestNepal = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 240">
  <defs>
    <linearGradient id="crest-grad-nepal" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" stop-color="${CRIMSON}"/>
      <stop offset="100%" stop-color="${CRIMSON_DARK}"/>
    </linearGradient>
  </defs>
  <path d="M 100 10 L 190 50 L 190 130 Q 190 200 100 230 Q 10 200 10 130 L 10 50 Z" fill="url(#crest-grad-nepal)" stroke="${NEPAL_BLUE}" stroke-width="3"/>
  <path d="M 100 25 L 175 58 L 175 130 Q 175 190 100 215 Q 25 190 25 130 L 25 58 Z" fill="none" stroke="#FFFFFF" stroke-width="2" opacity="0.5"/>
  <text x="100" y="115" font-family="system-ui, sans-serif" font-size="64" font-weight="900" fill="#FFFFFF" text-anchor="middle" letter-spacing="-2">NP</text>
  <text x="100" y="160" font-family="system-ui, sans-serif" font-size="24" font-weight="900" fill="${NEPAL_BLUE}" text-anchor="middle" letter-spacing="3">N° 10</text>
  <!-- Stars replaced with sun/moon motif -->
  <g transform="translate(55 75)">
    <circle r="8" fill="#FFFFFF"/>
    <circle cx="-3" cy="0" r="6" fill="${CRIMSON}"/>
  </g>
  <g transform="translate(145 75)">
    <g stroke="#FFFFFF" stroke-width="1.5" stroke-linecap="round">
      <line x1="0" y1="-9" x2="0" y2="-6"/>
      <line x1="0" y1="6" x2="0" y2="9"/>
      <line x1="-9" y1="0" x2="-6" y2="0"/>
      <line x1="6" y1="0" x2="9" y2="0"/>
    </g>
    <circle r="5" fill="#FFFFFF"/>
  </g>
</svg>`;
fs.writeFileSync(path.join(OUT, 'crest.svg'), crestNepal);

// ============================================================
// 10. FAVICON - Updated to Nepal colors
// ============================================================
const faviconNepal = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
  <rect width="32" height="32" rx="6" fill="${CRIMSON}"/>
  <path d="M 4 6 L 28 6 L 28 12 L 16 18 L 28 24 L 28 28 L 4 28 Z" fill="${NEPAL_BLUE}"/>
  <text x="16" y="22" font-family="system-ui, sans-serif" font-size="11" font-weight="900" fill="#FFFFFF" text-anchor="middle" letter-spacing="-0.5">NP</text>
</svg>`;
fs.writeFileSync(path.join(OUT, 'favicon.svg'), faviconNepal);

// ============================================================
// 11. OG IMAGE - Updated to Nepal colors
// ============================================================
const ogImageNepal = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 630">
  <defs>
    <linearGradient id="og-bg-nepal" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#0A0E1A"/>
      <stop offset="100%" stop-color="#1A0207"/>
    </linearGradient>
    <linearGradient id="og-crimson" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" stop-color="${CRIMSON}"/>
      <stop offset="100%" stop-color="${CRIMSON_DARK}"/>
    </linearGradient>
  </defs>
  <rect width="1200" height="630" fill="url(#og-bg-nepal)"/>
  <!-- Grid pattern -->
  <g opacity="0.05">
    ${Array.from({length: 20}, (_, i) => `<line x1="${i*60}" y1="0" x2="${i*60}" y2="630" stroke="${CRIMSON}" stroke-width="1"/>`).join('')}
    ${Array.from({length: 11}, (_, i) => `<line x1="0" y1="${i*60}" x2="1200" y2="${i*60}" stroke="${CRIMSON}" stroke-width="1"/>`).join('')}
  </g>
  <!-- Nepal flag accent (left side) -->
  <g transform="translate(0 100) scale(0.5)">
    <path d="M 0 0 L 720 0 L 720 80 L 360 180 L 720 280 L 720 360 L 0 360 Z" fill="${NEPAL_BLUE}"/>
    <path d="M 12 12 L 708 12 L 708 80 L 360 174 L 708 268 L 708 348 L 12 348 Z" fill="url(#og-crimson)"/>
    <g transform="translate(150 78)">
      <circle r="22" fill="#FFFFFF"/>
      <circle cx="-9" cy="0" r="18" fill="url(#og-crimson)"/>
    </g>
    <g transform="translate(190 252)">
      <g stroke="#FFFFFF" stroke-width="4" stroke-linecap="round">
        <line x1="0" y1="-32" x2="0" y2="-22"/><line x1="0" y1="22" x2="0" y2="32"/>
        <line x1="-32" y1="0" x2="-22" y2="0"/><line x1="22" y1="0" x2="32" y2="0"/>
        <line x1="-22.6" y1="-22.6" x2="-15.6" y2="-15.6"/><line x1="15.6" y1="15.6" x2="22.6" y2="22.6"/>
        <line x1="-22.6" y1="22.6" x2="-15.6" y2="15.6"/><line x1="15.6" y1="-15.6" x2="22.6" y2="-22.6"/>
      </g>
      <circle r="18" fill="#FFFFFF"/>
    </g>
  </g>
  <!-- Gold sun accent (top right) -->
  <g transform="translate(1080 120)">
    <circle r="60" fill="${NEPAL_BLUE}" opacity="0.9"/>
    <circle r="40" fill="none" stroke="${NEPAL_BLUE}" stroke-width="2" opacity="0.5"/>
  </g>
  <!-- Title -->
  <text x="80" y="280" font-family="system-ui, sans-serif" font-size="160" font-weight="900" fill="#FFFFFF" letter-spacing="-6">NICO</text>
  <text x="80" y="430" font-family="system-ui, sans-serif" font-size="160" font-weight="900" fill="${CRIMSON}" letter-spacing="-6">PAZ</text>
  <!-- Tagline -->
  <text x="80" y="490" font-family="system-ui, sans-serif" font-size="32" font-weight="500" fill="${NEPAL_BLUE}" letter-spacing="4">N° 10 · NICO PAZ</text>
  <text x="80" y="560" font-family="system-ui, sans-serif" font-size="24" font-weight="500" fill="#FFFFFF" opacity="0.6" letter-spacing="2">OFFICIAL · NICOPAZ.COM</text>
</svg>`;
fs.writeFileSync(path.join(OUT, 'og-image.svg'), ogImageNepal);

// ============================================================
// 12. COVER PATTERN - Nepal themed
// ============================================================
const coverPatternNepal = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 400" preserveAspectRatio="xMidYMid slice">
  <defs>
    <linearGradient id="cov-bg-nepal" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#0A0E1A"/>
      <stop offset="50%" stop-color="#2A0810"/>
      <stop offset="100%" stop-color="#0A0E1A"/>
    </linearGradient>
  </defs>
  <rect width="1200" height="400" fill="url(#cov-bg-nepal)"/>
  ${Array.from({length: 20}, (_, i) => `<line x1="${-200 + i*100}" y1="0" x2="${i*100}" y2="400" stroke="${CRIMSON}" stroke-width="1" opacity="0.1"/>`).join('')}
  <text x="600" y="240" font-family="system-ui, sans-serif" font-size="280" font-weight="900" fill="${CRIMSON}" text-anchor="middle" opacity="0.15" letter-spacing="-10">NP</text>
</svg>`;
fs.writeFileSync(path.join(OUT, 'cover-pattern.svg'), coverPatternNepal);

// ============================================================
// 13. JERSEY MOCKUP - Updated to Nepal colors
// ============================================================
const jerseyMockupNepal = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 500">
  <defs>
    <linearGradient id="jersey-grad-nepal" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" stop-color="#ED2E4D"/>
      <stop offset="100%" stop-color="${CRIMSON}"/>
    </linearGradient>
  </defs>
  <path d="M 100 80 L 60 110 L 80 160 L 110 145 L 110 460 L 290 460 L 290 145 L 320 160 L 340 110 L 300 80 L 250 70 Q 200 100 150 70 Z" fill="url(#jersey-grad-nepal)" stroke="#0A0E1A" stroke-width="2"/>
  <!-- Center stripe (white) -->
  <path d="M 180 70 L 180 460 L 220 460 L 220 70 Q 200 90 180 70 Z" fill="#FFFFFF"/>
  <!-- V-neck -->
  <path d="M 170 70 L 200 120 L 230 70 Q 200 90 170 70 Z" fill="#0A0E1A" opacity="0.3"/>
  <!-- Number 10 -->
  <text x="200" y="290" font-family="system-ui, sans-serif" font-size="100" font-weight="900" fill="#0A0E1A" text-anchor="middle" letter-spacing="-3">10</text>
  <text x="200" y="225" font-family="system-ui, sans-serif" font-size="28" font-weight="900" fill="#0A0E1A" text-anchor="middle" letter-spacing="3">PAZ</text>
  <!-- Logo placeholder (celestial) -->
  <circle cx="150" cy="200" r="14" fill="${CRIMSON}" stroke="${NEPAL_BLUE}" stroke-width="1.5"/>
  <text x="150" y="205" font-family="system-ui, sans-serif" font-size="12" font-weight="900" fill="#FFFFFF" text-anchor="middle">A</text>
  <path d="M 60 110 L 80 160 L 75 160 L 55 115 Z" fill="#FFFFFF"/>
  <path d="M 340 110 L 320 160 L 325 160 L 345 115 Z" fill="#FFFFFF"/>
</svg>`;
fs.writeFileSync(path.join(OUT, 'jersey-mockup.svg'), jerseyMockupNepal);

// ============================================================
// 14. BALL, BOOT, TROPHY, PITCH - Updated to Nepal colors
// ============================================================
const ball = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
  <circle cx="50" cy="50" r="45" fill="#FFFFFF" stroke="#0A0E1A" stroke-width="2"/>
  <polygon points="50,25 65,40 58,55 42,55 35,40" fill="${CRIMSON}"/>
  <polygon points="50,25 65,40 75,30 65,15 50,15" fill="${CRIMSON}"/>
  <polygon points="50,25 35,40 25,30 35,15 50,15" fill="${CRIMSON}"/>
  <polygon points="42,55 35,40 25,30 18,45 25,65 35,65" fill="${CRIMSON}"/>
  <polygon points="58,55 65,40 75,30 82,45 75,65 65,65" fill="${CRIMSON}"/>
  <polygon points="42,55 50,75 58,55" fill="${CRIMSON}"/>
  <polygon points="25,65 35,65 50,75 42,85 30,82" fill="${CRIMSON}"/>
  <polygon points="75,65 65,65 50,75 58,85 70,82" fill="${CRIMSON}"/>
  <polygon points="50,75 42,85 50,95 58,85" fill="${CRIMSON}"/>
</svg>`;
fs.writeFileSync(path.join(OUT, 'ball-icon.svg'), ball);

const boot = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
  <defs>
    <linearGradient id="boot-grad-nepal" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" stop-color="#FFFFFF"/>
      <stop offset="100%" stop-color="#E8B0BB"/>
    </linearGradient>
  </defs>
  <path d="M 15 60 L 15 75 Q 15 85 25 85 L 75 85 Q 85 85 85 75 L 85 55 Q 85 45 75 45 L 65 45 Q 60 30 45 25 L 35 25 Q 25 30 20 45 L 15 45 Q 10 45 10 55 Z" fill="url(#boot-grad-nepal)" stroke="#0A0E1A" stroke-width="2"/>
  <path d="M 25 60 Q 50 50 75 60" stroke="${CRIMSON}" stroke-width="2.5" fill="none"/>
  <circle cx="20" cy="85" r="2" fill="#0A0E1A"/><circle cx="35" cy="85" r="2" fill="#0A0E1A"/>
  <circle cx="50" cy="85" r="2" fill="#0A0E1A"/><circle cx="65" cy="85" r="2" fill="#0A0E1A"/>
  <circle cx="80" cy="85" r="2" fill="#0A0E1A"/>
</svg>`;
fs.writeFileSync(path.join(OUT, 'boot-icon.svg'), boot);

const trophy = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
  <defs>
    <linearGradient id="trophy-grad-nepal" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" stop-color="#FFE680"/>
      <stop offset="100%" stop-color="${NEPAL_BLUE}"/>
    </linearGradient>
  </defs>
  <path d="M 30 20 L 30 50 Q 30 70 50 75 Q 70 70 70 50 L 70 20 Z" fill="url(#trophy-grad-nepal)" stroke="#0A0E1A" stroke-width="2"/>
  <path d="M 30 25 Q 15 25 15 40 Q 15 50 30 50" fill="none" stroke="${NEPAL_BLUE}" stroke-width="3"/>
  <path d="M 70 25 Q 85 25 85 40 Q 85 50 70 50" fill="none" stroke="${NEPAL_BLUE}" stroke-width="3"/>
  <text x="50" y="50" font-family="system-ui, sans-serif" font-size="24" font-weight="900" fill="#0A0E1A" text-anchor="middle">★</text>
  <rect x="42" y="75" width="16" height="6" fill="${NEPAL_BLUE}" stroke="#0A0E1A" stroke-width="1"/>
  <rect x="35" y="81" width="30" height="8" fill="${NEPAL_BLUE}" stroke="#0A0E1A" stroke-width="1" rx="1"/>
</svg>`;
fs.writeFileSync(path.join(OUT, 'trophy-icon.svg'), trophy);

const pitch = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120">
  <rect width="200" height="120" fill="${NEPAL_BLUE}" rx="4"/>
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
// 15. NOISE TEXTURE (unchanged)
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
console.log('Nepal flag assets generated:');
const files = fs.readdirSync(OUT).filter(f => f.endsWith('.svg')).sort();
files.forEach(f => {
  const stat = fs.statSync(path.join(OUT, f));
  console.log(`  ${f} - ${(stat.size/1024).toFixed(1)}KB`);
});
console.log('\nKey files:');
console.log('  nepal-flag-animated.svg - main animated flag with wave effect');
console.log('  nepal-flag.svg          - static version for OG/print');
console.log('  celestial-icon.svg      - sun + moon standalone');
console.log('  nepal-stripes.svg       - section divider pattern');
