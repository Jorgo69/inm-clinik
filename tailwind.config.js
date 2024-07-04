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
                poppins: ['Poppins'],
                montserrat: ['Montserrat'],

            },
            fontSize: {
                sm: ['15px', '20px'],
                base: ['16px', '24px'],
                lg: ['20px', '28px'],
                xl: ['24px', '32px'],
              },
              fontWeight: {
                thin: '100',
                hairline: '100',
                extralight: '200',
                light: '300',
                normal: '400',
                medium: '500',
                semibold: '600',
                bold: '700',
                extrabold: '800',
                'extra-bold': '800',
                black: '900',
              },
              colors: {
                primary: ' #1a56db',
                primaryHover: '#1e429f',
                secondary: '#33FF77',
                danger: '#dc3545',
              },
            boxShadow: {
                '3xl': '0 35px 60px -15px rgba(0, 0, 0, 0.3)',
              },
              backgroundImage: {
                'backgroundImg': "url('/assets/background.jpg')",
                'hero-pattern': "url('/img/hero-pattern.svg')",
                'footer-texture': "url('/img/footer-texture.png')",
              },
              
        },
    },
    plugins: [
        forms,
        require('flowbite/plugin')
    ],
    


    // plugins: [forms],
};
