/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './public/**/*.php',
  ],
  theme: {
    extend: {
      keyframes: {
        fadeIn: {
          '0%': { opacity: 0 },
          '100%': { opacity: 1 },
        },
        fadeOut: {
          '0%': { opacity: 1 },
          '100%': { opacity: 0 },
        },
        slideUp: {
          '0%': { transform: 'translateY(100%)' },
          '100%': { transform: 'translateY(0)' },
        },
      },
      animation: {
        fadeIn: 'fadeIn 2s ease-in-out',
        fadeOut: 'fadeOut 0.5s forwards',
        slideUp: 'slideUp 2s ease-in-out forwards',
      },
    },
  },
  plugins: [],
}
