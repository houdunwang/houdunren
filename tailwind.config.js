const defaultTheme = require('tailwindcss/defaultTheme')
module.exports = {
    important: true,
    purge: ['./vendor/laravel/jetstream/**/*.blade.php', './storage/framework/views/*.php', './resources/views/**/*.blade.php', './resources/js/**/*.vue'],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans]
            },
            colors: {
                'dark-green': '#3aa5a2'
            },
            width: {
                '1280': '1280px'
            }
        }
    },

    variants: {
        extend: {
            opacity: ['disabled']
        }
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')]
}
