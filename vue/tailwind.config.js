const { default: plugin } = require('tailwindcss')

module.exports = {
  content: ['./index.html', './src/**/*.{vue,js,ts,jsx,tsx}'],
  theme: {
    extend: {
      width: {
        page: '1450px',
      },
      colors: {
        'hd-blue': '#62569F',
        'hd-origin': '#F33A2F',
      },
      screens: {},
    },
  },
  plugins: [
    function ({ addBase, theme }) {
      addBase({
        '.el-button': {
          'background-color': 'var(--el-button-bg-color,val(--el-color-white))',
        },
      })
    },
  ],
  variants: {
    lineClamp: ['responsive', 'hover'],
  },
}
