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
        customRed: '#dddddd',
        customWhite: '#7e191b',
      },
      fontFamily: {
        oxanium: ['Oxanium']
      },
    },
  },
  plugins: [],
}
