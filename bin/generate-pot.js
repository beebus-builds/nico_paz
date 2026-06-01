const fs = require('fs');
const path = require('path');

const THEME_DIR = path.resolve(__dirname, '..');
const LANGUAGES_DIR = path.join(THEME_DIR, 'languages');
const TEXT_DOMAIN = 'nicopaz';
const PACKAGE_NAME = 'Nico Paz Theme';
const PACKAGE_VERSION = '1.0.0';

// Patterns for WordPress i18n functions
const PATTERNS = [
  /__(?:\s*\(|\s+)(['"])(.+?)\1\s*,\s*(['"])((?:''|""|' + '|" + "|.)*?)\3\s*[\),]/gs,
  /_e(?:\s*\(|\s+)(['"])(.+?)\1\s*,\s*(['"])((?:''|""|' + '|" + "|.)*?)\3\s*[\),]/gs,
  /esc_html__(?:\s*\(|\s+)(['"])(.+?)\1\s*,\s*(['"])((?:''|""|' + '|" + "|.)*?)\3\s*[\),]/gs,
  /esc_attr__(?:\s*\(|\s+)(['"])(.+?)\1\s*,\s*(['"])((?:''|""|' + '|" + "|.)*?)\3\s*[\),]/gs,
  /_x(?:\s*\(|\s+)(['"])(.+?)\1\s*,\s*(['"])(.+?)\3\s*,\s*(['"])((?:''|""|' + '|" + "|.)*?)\5\s*[\),]/gs,
  /esc_html_x(?:\s*\(|\s+)(['"])(.+?)\1\s*,\s*(['"])(.+?)\3\s*,\s*(['"])((?:''|""|' + '|" + "|.)*?)\5\s*[\),]/gs,
  /esc_attr_x(?:\s*\(|\s+)(['"])(.+?)\1\s*,\s*(['"])(.+?)\3\s*,\s*(['"])((?:''|""|' + '|" + "|.)*?)\5\s*[\),]/gs,
  /_n(?:\s*\(|\s+)(['"])(.+?)\1\s*,\s*(['"])(.+?)\3\s*,\s*\$.+?\s*,\s*(['"])((?:''|""|' + '|" + "|.)*?)\5\s*[\),]/gs,
  /_n_noop(?:\s*\(|\s+)(['"])(.+?)\1\s*,\s*(['"])(.+?)\3\s*,\s*(['"])((?:''|""|' + '|" + "|.)*?)\5\s*[\),]/gs,
  /_nx(?:\s*\(|\s+)(['"])(.+?)\1\s*,\s*(['"])(.+?)\3\s*,\s*\$.+?\s*,\s*(['"])(.+?)\5\s*,\s*(['"])((?:''|""|' + '|" + "|.)*?)\7\s*[\),]/gs,
];

function extractStrings(filePath) {
  const content = fs.readFileSync(filePath, 'utf-8');
  const relativePath = path.relative(THEME_DIR, filePath).replace(/\\/g, '/');
  const strings = [];
  const visited = new Set();

  for (const pattern of PATTERNS) {
    pattern.lastIndex = 0;
    let match;
    while ((match = pattern.exec(content)) !== null) {
      const msgid = match[2];
      const domain = match[4] || match[3] || '';
      const domainClean = domain.replace(/['"+\s]/g, '');

      if (domainClean !== TEXT_DOMAIN) continue;

      const lineNumber = content.substring(0, match.index).split('\n').length;
      const key = `${msgid}|${domainClean}`;
      if (visited.has(key)) continue;
      visited.add(key);

      strings.push({
        msgid: msgid,
        line: lineNumber,
        file: relativePath,
        msgctxt: null,
        msgidPlural: null,
      });
    }
  }

  return strings;
}

function main() {
  if (!fs.existsSync(LANGUAGES_DIR)) {
    fs.mkdirSync(LANGUAGES_DIR, { recursive: true });
  }

  function findPhpFiles(dir) {
    const results = [];
    const entries = fs.readdirSync(dir, { withFileTypes: true });
    for (const entry of entries) {
      const fullPath = path.join(dir, entry.name);
      const relativePath = path.relative(THEME_DIR, fullPath);
      if (relativePath.startsWith('node_modules') || relativePath.startsWith('vendor') || relativePath.startsWith('languages')) continue;
      if (entry.isDirectory()) {
        results.push(...findPhpFiles(fullPath));
      } else if (entry.isFile() && entry.name.endsWith('.php')) {
        results.push(relativePath);
      }
    }
    return results;
  }

  const phpFiles = findPhpFiles(THEME_DIR);

  const allStrings = [];
  const seen = new Set();

  for (const file of phpFiles) {
    const absPath = path.join(THEME_DIR, file);
    const strings = extractStrings(absPath);
    for (const s of strings) {
      const key = s.msgid + (s.msgctxt || '');
      if (seen.has(key)) {
        const existing = allStrings.find(x => x.msgid === s.msgid && x.msgctxt === s.msgctxt);
        if (existing) {
          existing.line += `,${s.file}:${s.line}`;
        }
        continue;
      }
      seen.add(key);
      s.line = `${s.file}:${s.line}`;
      allStrings.push(s);
    }
  }

  const now = new Date();
  const dateStr = now.toISOString().replace(/[TZ]/g, ' ').trim().split(' ')[0];
  const timeStr = now.toISOString().replace(/[TZ]/g, ' ').trim().split(' ')[1].split('.')[0];
  const year = now.getFullYear();

  let pot = `# Copyright (C) ${year} ${PACKAGE_NAME}
# This file is distributed under the same license as the ${PACKAGE_NAME} package.
msgid ""
msgstr ""
"Project-Id-Version: ${PACKAGE_NAME} ${PACKAGE_VERSION}\\n"
"Report-Msgid-Bugs-To: \\n"
"POT-Creation-Date: ${dateStr} ${timeStr}\\n"
"MIME-Version: 1.0\\n"
"Content-Type: text/plain; charset=UTF-8\\n"
"Content-Transfer-Encoding: 8bit\\n"
"PO-Revision-Date: ${year}-MO-DA HO:MI+ZONE\\n"
"Language-Team: \\n"
"X-Generator: nicopaz-build\\n"
"Plural-Forms: nplurals=2; plural=(n != 1);\\n"
"Language: en_US\\n"

`;

  for (const s of allStrings) {
    pot += `#: ${s.line}\n`;
    if (s.msgctxt) {
      pot += `msgctxt "${s.msgctxt}"\n`;
    }
    pot += `msgid "${s.msgid.replace(/"/g, '\\"')}"\n`;
    pot += `msgstr ""\n\n`;
  }

  const potPath = path.join(LANGUAGES_DIR, `${TEXT_DOMAIN}.pot`);
  fs.writeFileSync(potPath, pot, 'utf-8');
  console.log(`Generated ${potPath}`);
  console.log(`Total translatable strings found: ${allStrings.length}`);
}

main();
