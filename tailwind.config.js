/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './components/**/*.{php,js}',
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

