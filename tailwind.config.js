/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './composant/*.{php,js}',
    './front/**/*.{php,js,html}',
    './index.php',
  ],
  theme: {
    extend: {
      color: {
        jaune :'#FFB703',
      }
    },
  },
  plugins: [],
}

