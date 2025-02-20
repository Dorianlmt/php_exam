/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
  ],
  theme: {
    extend: {
      borderWidth: {
        '3': '3px',
      },
      screens: {
        'xs': '500px'
      },
      colors: {
        bodyColor: '#353535',
        customRed: '#7e191b',
        customWhite: '#dddddd',
      },
      fontFamily: {
        oxanium: ['Oxanium']
      },
      boxShadow: {
        'glow': '0px 0px 5px rgba(255, 255, 255, 0.9)',
      },
    },
  },
  plugins: [],
}
