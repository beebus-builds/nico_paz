const fs = require('fs');
const path = require('path');

const REPLACEMENTS = [
  // argentina-blue (primary) -> crimson
  { from: /\bargentina-blue\b/g, to: 'crimson' },
  { from: /\bargentina\.blue\b/g, to: 'crimson' },
  { from: /#75AADB/g, to: '#DC143C' },
  { from: /#4A8FCC/g, to: '#B51030' },
  { from: /#3672B0/g, to: '#8E0C26' },
  { from: /rgba\(117,170,219/g, to: 'rgba(220,20,60' },

  // celeste -> crimson
  { from: /\bceleste\b/g, to: 'crimson' },
  { from: /#8FC5F0/g, to: '#F36E7C' },
  { from: /#BBDFF7/g, to: '#F89FAB' },
  { from: /#DDEEFB/g, to: '#FCD0D9' },
  { from: /#F0F7FD/g, to: '#FEE7EC' },

  // argentina-gold -> nepal-blue
  { from: /\bargentina-gold\b/g, to: 'nepal-blue' },
  { from: /\bargentina\.gold\b/g, to: 'nepal-blue' },
  { from: /#F6B40E/g, to: '#003893' },
  { from: /#D4990B/g, to: '#002D75' },
  { from: /#F6CA47/g, to: '#456FCD' },
  { from: /rgba\(246,180,14/g, to: 'rgba(0,56,147' },

  // gradient names
  { from: /text-gradient-celeste/g, to: 'text-gradient-crimson' },
  { from: /text-gradient-argentina/g, to: 'text-gradient-nepal' },
  { from: /border-gradient-celeste/g, to: 'border-gradient-crimson' },
  { from: /stripes-argentina/g, to: 'stripes-nepal' },

  // background image names
  { from: /bg-argentina-stripes/g, to: 'bg-nepal-stripes' },
  { from: /gradient-radial-celeste/g, to: 'gradient-radial-crimson' },
  { from: /gradient-radial-gold/g, to: 'gradient-radial-blue' },
  { from: /bg-gradient-radial-celeste/g, to: 'bg-gradient-radial-crimson' },
  { from: /bg-gradient-radial-gold/g, to: 'bg-gradient-radial-blue' },

  // shadow names
  { from: /shadow-celeste/g, to: 'shadow-crimson' },
  { from: /shadow-celeste-lg/g, to: 'shadow-crimson-lg' },
  { from: /shadow-gold/g, to: 'shadow-nepal-blue' },
  { from: /shadow-glow-celeste/g, to: 'shadow-glow-crimson' },
  { from: /shadow-glow-gold/g, to: 'shadow-glow-blue' },

  // animation names
  { from: /animate-pulse-celeste/g, to: 'animate-pulse-crimson' },
  { from: /pulse-celeste\b/g, to: 'pulse-crimson' },

  // pill / glow component classes
  { from: /pill-celeste/g, to: 'pill-crimson' },
  { from: /glow-celeste/g, to: 'glow-crimson' },

  // Yellow text references (used for gold) -> nepal-blue
  { from: /text-yellow-400/g, to: 'text-nepal-blue' },
  { from: /hover:bg-yellow-400/g, to: 'hover:bg-nepal-blue' },
];

const FILES = [
  'src/input.css',
  'front-page.php',
  'header.php',
  'footer.php',
  'functions.php',
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

console.log(`\nDone. ${totalChanged} replacements in ${filesChanged} files.`);
