/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './composant/*.{php,js}',
    './front/**/*.{php,js,html}',
    './index.php',
  ],
  theme: {
    fontFamily: {
      "sans": ["DM Sans", "sans-serif"],
    },
    extend: {
      color: {
        jaune :'#FFB703',
      },
      fontFamily: {
        logo: ["Caveat", "cursive"],
        Paragraphe: ["DM Sans", "sans-serif"],
        Titre: ["DM Serif Display", "serif"],
      },
    },
  },
  plugins: [],
}

