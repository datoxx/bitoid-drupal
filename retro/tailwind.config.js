/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["**/*.html.twig", "../../../modules/custom/**/*.twig"],
  darkMode: 'class',
  theme: {
    extend: {
      colors: {
        white: '#ffffff',
        violet: '#939BF4',
        blue: {
          dark: '#19202D',
          midnight: '#121721',
        },
        gray: {
          norm: '#9DAEC2',
          light: '#F4F6F8',
          dark: '#6E8098',
        },
      },
      fontFamily: {
        body: ['Kumbh Sans']
      },
      borderRadius: {
        big: '100px',
      },
      maxWidth: {
        mainwrapper: '77%',
        smallmainwrapper: '87%',
      },
    },
  },
  plugins: [],
}
