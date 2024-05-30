/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'green-base':'#001e2b',
        'green-light':'#006749',
        'green-dark':'#023430',
        'green-yellow':'#e9ff99',
        'green-contrast':'#00ed64',
        'green-hover':'rgba(6,194,81)',
      },
      keyframes: {
        'appear': {
          '0%':{ opacity: 0 },
          '100%':{ opacity: 1 },
        },
        'disappear': {
          '0%':{ opacity: 1 },
          '100%':{ opacity: 0 },
        },
        'scale-appear': {
          '0%':{ transform: 'scale(0.9)',opacity: 0 },
          '100%':{ transform: 'scale(1)',opacity: 1 },
        },
        'scale-disappear': {
          '0%':{ transform: 'scale(1)',opacity: 1 },
          '100%':{ transform: 'scale(0.9)',opacity: 0 }
        }
      },
      animation: {
        'scale-appear': 'scale-appear .5s ease-in-out forwards',
        'appear': 'appear .5s ease-in-out forwards',
        'scale-disappear': 'scale-disappear .5s ease-in-out forwards',
        'disappear': 'disappear .5s ease-in-out forwards',
      }
    },
  },
  plugins: [],
}

