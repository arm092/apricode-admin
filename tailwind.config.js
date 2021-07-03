const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  purge: {
    layers: ['utilities'],
    content: [
      './src/**/*.php',
      './resources/views/**/*.php',
      './resources/views/components/**/*.php',
      './resources/js/**/*.js',
      './packages/forms/src/**/*.php',
      './packages/forms/resources/views/**/*.php',
      './packages/tables/src/**/*.php',
      './packages/tables/resources/views/**/*.php',
    ],
  },
  theme: {
    extend: {
      fontFamily: {
        sans: ['Noto Sans', ...defaultTheme.fontFamily.sans],
        mono: ['JetBrains Mono', ...defaultTheme.fontFamily.mono],
        display: ['Montserrat', ...defaultTheme.fontFamily.sans],
      },
      colors: {
          primary: {
              "50" : "#ffc951",
              "100": "#ffbf47",
              "200": "#ffb53d",
              "300": "#ffab33",
              "400": "#ffa129",
              "500": "#fd971f",
              "600": "#f38d15",
              "700": "#e9830b",
              "800": "#df7901",
              "900": "#B55E00"
          },
          secondary: {
              "50": "#a7a390",
              "100": "#9d9986",
              "200": "#938f7c",
              "300": "#898572",
              "400": "#7f7b68",
              "500": "#75715e",
              "600": "#6b6754",
              "700": "#615d4a",
              "800": "#575340",
              "900": "#4d4936"
          },
          success: {
              "50" : "#d8ff60",
              "100": "#ceff56",
              "200": "#c4ff4c",
              "300": "#baf642",
              "400": "#b0ec38",
              "500": "#a6e22e",
              "600": "#9cd824",
              "700": "#92ce1a",
              "800": "#88c410",
              "900": "#588203"
          },
          danger: {
              "50": "#ff58a4",
              "100": "#ff4e9a",
              "200": "#ff4490",
              "300": "#ff3a86",
              "400": "#ff307c",
              "500": "#ff2672",
              "600": "#f51c68",
              "700": "#eb125e",
              "800": "#e10854",
              "900": "#d7004a"
          },
          gray: {
              "50" : "#81827c",
              "100": "#777872",
              "200": "#6d6e68",
              "300": "#63645e",
              "400": "#595a54",
              "500": "#4f504a",
              "600": "#454640",
              "700": "#3b3c36",
              "800": "#31322c",
              "900": "#272822"
          },
          blue: {
              "50" : "#98ffff",
              "100": "#8effff",
              "200": "#84f7ff",
              "300": "#7aedff",
              "400": "#70e3f9",
              "500": "#66d9ef",
              "600": "#5ccfe5",
              "700": "#52c5db",
              "800": "#48bbd1",
              "900": "#2C8091"
          },
          white: '#ffffff',
          black: '#000000',
          light: '#f8f8f2'
      },
      keyframes: {
        shake: {
          '10%, 90%': {
            transform: 'translate3d(-1px, 0, 0)',
          },
          '20%, 80%': {
            transform: 'translate3d(2px, 0, 0)',
          },
          '30%, 50%, 70%': {
            transform: 'translate3d(-4px, 0, 0)',
          },
          '40%, 60%': {
            transform: 'translate3d(4px, 0, 0)',
          },
        },
      },
      typography: (theme) => ({
        DEFAULT: {
          css: {
            a: {
              color: theme('colors.blue.500'),
              '&:hover': {
                color: theme('colors.blue.700'),
              },
            },
          },
        },
      }),
    },
  },
  variants: {
    extend: {
      padding: ['direction'],
      translate: ['direction'],
      space: ['direction'],
    }
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
    require('tailwindcss-dir'),
  ],
}
