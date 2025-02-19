/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
  ],
  theme: {
    extend: {
      colors: {
        bodyColor: '#353535',
        customRed: '#7e191b',
        customWhite: '#dddddd',
      },
      fontFamily: {
        oxanium: ['Oxanium']
      },
    },
  },
  plugins: [],
}
