import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    darkMode: "false", // or 'media' or 'class'
    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: (theme) => ({
                "gradient-to-r":
                    "linear-gradient(to right, var(--tw-gradient-stops))",
                "gradient-to-l":
                    "linear-gradient(to left, var(--tw-gradient-stops))",
                "gradient-to-t":
                    "linear-gradient(to top, var(--tw-gradient-stops))",
                "gradient-to-b":
                    "linear-gradient(to bottom, var(--tw-gradient-stops))",
                "gradient-to-tr":
                    "linear-gradient(to top right, var(--tw-gradient-stops))",
                "gradient-to-tl":
                    "linear-gradient(to top left, var(--tw-gradient-stops))",
                "gradient-to-br":
                    "linear-gradient(to bottom right, var(--tw-gradient-stops))",
                "gradient-to-bl":
                    "linear-gradient(to bottom left, var(--tw-gradient-stops))",
            }),
            gradientColorStops: (theme) => ({
                primary: "#ff7e5f",
                secondary: "#feb47b",
            }),
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
};
