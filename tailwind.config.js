/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "*./index.php",
    "./src/**/*.{php, js, html}",
    "./public/**/*.{php,html}",
    "./src/**/*.{php,html}",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
  corePlugins: {
    backgroundGradient: true,
  },
};
