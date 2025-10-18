import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    50: '#f0f9f9',
                    100: '#e0f2f2',
                    200: '#c1e5e5',
                    300: '#92d1d1',
                    400: '#63bcbc',
                    500: '#1D5762', // Main primary color
                    600: '#1a4d55',
                    700: '#163f46',
                    800: '#132f35',
                    900: '#0f1f23',
                },
                secondary: {
                    50: '#ffffff',
                    100: '#ffffff',
                    200: '#ffffff',
                    300: '#ffffff',
                    400: '#ffffff',
                    500: '#ffffff', // White as secondary
                    600: '#f5f5f5',
                    700: '#e5e5e5',
                    800: '#d4d4d4',
                    900: '#bfbfbf',
                },
            },
        },
    },

    plugins: [
        forms,
        require('flowbite/plugin')
    ],
};
