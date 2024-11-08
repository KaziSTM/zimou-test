import tailwindForms from "@tailwindcss/forms";

import tailwindTypography from "@tailwindcss/typography";

import tailwindAspectRatio from "@tailwindcss/aspect-ratio";

import tailwindScrollbar from "tailwind-scrollbar";

import colors from "tailwindcss/colors";

import defaultTheme from "tailwindcss/defaultTheme";

export default {
    darkMode: "class",
    theme: {
        extend: {
            keyframes: {
                typing: {
                    "0%": {
                        width: "0%",
                        visibility: "hidden"
                    },
                    "100%": {
                        width: "100%"
                    }
                },
                blink: {
                    "50%": {
                        borderColor: "transparent"
                    },
                    "100%": {
                        borderColor: "white"
                    }
                }
            },
            animation: {
                typing: "typing 2s steps(20) alternate, blink .7s"
            },
            fontFamily: {
                sans: ["Inter var", ...defaultTheme.fontFamily.sans],
            },
            maxWidth: {
                "8xl": "82rem",
            },
            zIndex: {
                '60': '60',
                '100': '100',
            },
            colors: {
                primary: colors.red,
                secondary: colors.slate,
                positive: colors.lime,
                negative: colors.red,
                warning: colors.amber,
                info: colors.cyan,
            },
        },
    },
    corePlugins: {
        aspectRatio: false,
    },
    variants: {
        extend: {
            backgroundColor: ["active"],
        },
    },
    content: [
        "./app/**/*.php",
        "./resources/**/*.html",
        "./resources/**/*.js",
        "./resources/**/*.jsx",
        "./resources/**/*.ts",
        "./resources/**/*.tsx",
        "./resources/**/*.php",
        "./resources/**/*.vue",
        "./resources/**/*.twig",
        './vendor/rappasoft/laravel-livewire-tables/resources/views/*.blade.php',
        './vendor/rappasoft/laravel-livewire-tables/resources/views/**/*.blade.php',
        './vendor/tallstackui/tallstackui/src/**/*.php',
    ],
    safelist: [
        'md:grid-cols-1',
        'md:grid-cols-2',
        'md:grid-cols-3',
        'md:grid-cols-4',
        'max-w-xs',
        'max-w-sm',
        'max-w-md',
        'max-w-lg',
        'max-w-xl',
        'max-w-2xl',
        'max-w-3xl',
        'max-w-4xl',
        'max-w-5xl',
        'max-w-6xl',
        'max-w-7xl',
        'sm:max-w-md',
        'md:max-w-xl',
        'lg:max-w-3xl',
        'xl:max-w-5xl',
        '2xl:max-w-7xl',
        'bg-red-100',
        'bg-yellow-100',
        'bg-blue-100',
        'bg-green-100',
        'bg-indigo-100',
        'bg-purple-100',
        'bg-pink-100',
        'bg-primary-600'
    ],
    plugins: [
        tailwindAspectRatio,
        tailwindForms,
        tailwindTypography,
        tailwindScrollbar,
    ],
    presets: [
        require('./vendor/tallstackui/tallstackui/tailwind.config.js')
    ],
};
