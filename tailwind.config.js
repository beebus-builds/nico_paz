/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: [
    './**/*.php',
    './src/**/*.css',
    './assets/js/*.js',
  ],
  safelist: [
    { pattern: /flex|hidden|grid/, variants: ['sm', 'md', 'lg', 'xl'] },
    { pattern: /grid-cols-\d/, variants: ['md', 'lg'] },
    { pattern: /text-(lg|7xl|8xl)/, variants: ['sm', 'md', 'lg'] },
    { pattern: /px-(6|8)/, variants: ['sm', 'lg'] },
    { pattern: /flex-row/, variants: ['md'] },
    'overflow-x-hidden',
    'max-w-7xl',
  ],
  theme: {
    container: {
      center: true,
      padding: {
        DEFAULT: '1rem',
        sm: '1.5rem',
        lg: '2rem',
      },
    },
    extend: {
      colors: {
        'argentina': {
          blue: '#1A1A1A',
          'blue-dark': '#0A0A0A',
          gold: '#FFFFFF',
          white: '#F5F5F5',
        },
        'nico': {
          dark: '#0A0A0A',
          gray: '#6B7280',
          'gray-light': '#F3F4F6',
          accent: '#1A1A1A',
        },
      },
      fontFamily: {
        heading: ['"Space Grotesk"', 'system-ui', 'sans-serif'],
        body: ['"JetBrains Mono"', 'Consolas', 'monospace'],
        cursive: ['"Dancing Script"', 'cursive'],
      },
    },
  },
  plugins: [],
};
