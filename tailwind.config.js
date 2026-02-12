import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                coral: {
                    DEFAULT: '#FF6B6B',
                    light: '#FF8787',
                    dark: '#EE5A5A',
                    hover: '#FF5252',
                },
                navy: {
                    DEFAULT: '#1A1F36',
                    light: '#2D3561',
                },
            },
            boxShadow: {
                'coral': '0 10px 30px -5px rgba(255, 107, 107, 0.3)',
                'coral/50': '0 10px 30px -5px rgba(255, 107, 107, 0.5)',
            },
        },
    },

    plugins: [forms],
};