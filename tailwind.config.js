import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
// import filamentPreset from './vendor/filament/support/tailwind.config.preset'

/** @type {import('tailwindcss').Config} */
export default {
    // presets: [filamentPreset],
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        forms
    ],
    // daisyui: {
    //     themes: true, // false: only light + dark | true: all themes | array: specific themes like this ["light", "dark", "cupcake"]
    //     darkTheme: "dark", // name of one of the included themes for dark mode
    //     base: true, // applies background color and foreground color for root element by default
    //     styled: true, // include daisyUI colors and design decisions for all components
    //     utils: true, // adds responsive and modifier utility classes
    //     prefix: "", // prefix for daisyUI classnames (components, modifiers and responsive class names. Not colors)
    //     logs: true, // Shows info about daisyUI version and used config in the console when building your CSS
    //     themeRoot: ":root", // The element that receives theme color CSS variables
    // },

    darkMode: 'class',
};
