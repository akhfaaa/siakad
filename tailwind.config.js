import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                // Menggunakan tipografi standar Apple (San Francisco)
                sans: ['-apple-system', 'BlinkMacSystemFont', '"Segoe UI"', 'Roboto', 'Helvetica', 'Arial', 'sans-serif'], 
            },
            colors: {
                apple: {
                    glass: 'rgba(255, 255, 255, 0.65)',
                    glassDark: 'rgba(30, 30, 30, 0.65)',
                    border: 'rgba(255, 255, 255, 0.4)',
                }
            },
            boxShadow: {
                // Efek bayangan mengambang khas jendela aplikasi macOS
                'macos': '0 20px 40px -15px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.1)',
            },
            backdropBlur: {
                'liquid': '24px',
            }
        },
    },

    plugins: [forms],
};