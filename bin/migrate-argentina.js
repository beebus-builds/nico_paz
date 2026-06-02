const fs = require('fs');
const path = require('path');

const REPLACEMENTS = [
  // crimson (was argentina-blue) -> celeste (light blue, primary)
  { from: /\bcrimson\b/g, to: 'celeste' },
  { from: /#DC143C/g, to: '#75AADB' },
  { from: /#B51030/g, to: '#4A8FCC' },
  { from: /#8E0C26/g, to: '#3672B0' },
  { from: /#A50E2D/g, to: '#5A99D2' },
  { from: /#FEE7EC/g, to: '#F0F7FD' },
  { from: /#FCD0D9/g, to: '#DDEEFB' },
  { from: /#F89FAB/g, to: '#BBDFF7' },
  { from: /#F36E7C/g, to: '#8FC5F0' },
  { from: /#E73D4E/g, to: '#A6CFE8' },
  { from: /#67081B/g, to: '#1F5A8C' },
  { from: /#400411/g, to: '#0F3D63' },
  { from: /rgba\(220,20,60/g, to: 'rgba(117,170,219' },

  // nepal-blue (was argentina-gold) -> gold (sun of May, accent)
  { from: /\bnepal-blue\b/g, to: 'gold' },
  { from: /#003893/g, to: '#F6B40E' },
  { from: /#002D75/g, to: '#D4990B' },
  { from: /#001F5C/g, to: '#B58408' },
  { from: /#456FCD/g, to: '#F6CA47' },
  { from: /#1A4AB8/g, to: '#E5A528' },
  { from: /#002257/g, to: '#9C7107' },
  { from: /#00173A/g, to: '#724F05' },
  { from: /#000C1D/g, to: '#4A3203' },
  { from: /#E0E7F5/g, to: '#FEF7E0' },
  { from: /#C1CFEB/g, to: '#FDEEC0' },
  { from: /#839FE0/g, to: '#FBD87D' },
  { from: /rgba\(0,56,147/g, to: 'rgba(246,180,14' },

  // gradient names
  { from: /text-gradient-crimson/g, to: 'text-gradient-celeste' },
  { from: /text-gradient-nepal/g, to: 'text-gradient-gold' },
  { from: /border-gradient-crimson/g, to: 'border-gradient-celeste' },
  { from: /stripes-nepal/g, to: 'stripes-argentina' },

  // background image names
  { from: /bg-nepal-stripes/g, to: 'bg-argentina-stripes' },
  { from: /gradient-radial-crimson/g, to: 'gradient-radial-celeste' },
  { from: /gradient-radial-blue\b/g, to: 'gradient-radial-gold' },
  { from: /bg-gradient-radial-crimson/g, to: 'bg-gradient-radial-celeste' },
  { from: /bg-gradient-radial-blue/g, to: 'bg-gradient-radial-gold' },

  // shadow names
  { from: /shadow-crimson/g, to: 'shadow-celeste' },
  { from: /shadow-crimson-lg/g, to: 'shadow-celeste-lg' },
  { from: /shadow-nepal-blue/g, to: 'shadow-gold' },
  { from: /shadow-glow-crimson/g, to: 'shadow-glow-celeste' },
  { from: /shadow-glow-blue/g, to: 'shadow-glow-gold' },

  // animation names
  { from: /animate-pulse-crimson/g, to: 'animate-pulse-celeste' },
  { from: /pulse-crimson\b/g, to: 'pulse-celeste' },

  // pill / glow component classes
  { from: /pill-crimson/g, to: 'pill-celeste' },
  { from: /glow-crimson/g, to: 'glow-celeste' },

  // nepal file references
  { from: /nepal-flag-animated/g, to: 'argentina-flag' },
  { from: /nepal-flag-outline/g, to: 'argentina-flag-outline' },
  { from: /nepal-flag\.svg/g, to: 'argentina-flag.svg' },
  { from: /nepal-stripes/g, to: 'argentina-stripes' },
  { from: /nepal-triangle-pattern/g, to: 'argentina-triangle-pattern' },
  { from: /divider-nepal/g, to: 'divider-argentina' },
  { from: /celestial-icon/g, to: 'sun-icon' },

  // yellow text references (originally gold) -> gold token
  { from: /text-yellow-400/g, to: 'text-gold' },
  { from: /hover:bg-yellow-400/g, to: 'hover:bg-gold' },
];

const FILES = [
  'src/input.css',
  'tailwind.config.js',
  'front-page.php',
  'header.php',
  'footer.php',
  'functions.php',
  'inc/nav-walker.php',
  'template-press.php',
  'template-training.php',
  'template-gallery.php',
  'template-behind-the-scenes.php',
  'template-fan-zone.php',
  'template-merchandise.php',
  'template-about.php',
  'template-career.php',
  'template-community.php',
  'template-contact.php',
  'template-events.php',
  'template-faq.php',
  'template-news.php',
  'template-player-profile.php',
  'template-privacy.php',
  'template-schedule.php',
  'template-sponsors.php',
  'template-stats.php',
  'template-terms.php',
  'template-videos.php',
  'page.php',
  'index.php',
  'single.php',
  'archive.php',
  'search.php',
  '404.php',
  'sidebar.php',
  'woocommerce/loop/content-product.php',
  'woocommerce/single-product/add-to-cart/simple.php',
];

let totalChanged = 0;
let filesChanged = 0;

for (const f of FILES) {
  if (!fs.existsSync(f)) continue;
  let content = fs.readFileSync(f, 'utf8');
  let original = content;
  let fileChanges = 0;
  for (const r of REPLACEMENTS) {
    const before = content;
    content = content.replace(r.from, r.to);
    if (content !== before) {
      const matches = before.match(r.from);
      if (matches) fileChanges += matches.length;
    }
  }
  if (content !== original) {
    fs.writeFileSync(f, content, 'utf8');
    filesChanged++;
    totalChanged += fileChanges;
    console.log(`  ${f}: ${fileChanges} replacements`);
  }
}

// Delete nepal SVG assets
const npFiles = [
  'assets/images/celestial-icon.svg',
  'assets/images/divider-nepal.svg',
  'assets/images/nepal-flag-animated.svg',
  'assets/images/nepal-flag-outline.svg',
  'assets/images/nepal-flag.svg',
  'assets/images/nepal-stripes.svg',
  'assets/images/nepal-triangle-pattern.svg',
];
for (const f of npFiles) {
  if (fs.existsSync(f)) {
    fs.unlinkSync(f);
    console.log(`  deleted: ${f}`);
  }
}

console.log(`\nDone. ${totalChanged} replacements in ${filesChanged} files.`);
