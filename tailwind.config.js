import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */

function extractColors() {
    const colorNames = [
        "pink",
        "indigo",
        "green",
        "orange",
        "violet",
        "lime",
        "sky",
        "cyan",
        "amber",
        "fuchsia",
        "rose",
        "emerald",
        "blue",
        "teal",
        "red",
        "yellow",
        "purple",
        "slate",
        "gray",
        "zinc",
        "neutral",
        "stone",
    ];

    const levels = [
        "50",
        "100",
        "200",
        "300",
        "400",
        "500",
        "600",
        "700",
        "800",
        "900",
        "950",
    ];

    const opacities = ["5", "10", "20", "30", "50", "80", "90"];

    const safelist = [
        "bg-linear-to-r",
        "bg-linear-to-br",
        "bg-linear-to-tr",
        "bg-linear-to-l",
        "bg-linear-to-t",
        "bg-gradient-to-r",
        "bg-gradient-to-br",
        // Dynamic logo width/spacing classes from jblbConf.php (not scannable by Tailwind)
        "w-8", "w-12", "w-16", "w-20", "w-24", "w-28", "w-32",
        "w-48", "w-56", "w-60", "w-64",
        "sm:w-64", "sm:w-56", "sm:w-48",
        "p-1", "p-2", "p-3", "p-4",
        "mb-4", "mb-6",
    ];

    colorNames.forEach((color) => {
        levels.forEach((lvl) => {
            safelist.push(
                `bg-${color}-${lvl}`,
                `text-${color}-${lvl}`,
                `border-${color}-${lvl}`,
                `from-${color}-${lvl}`,
                `to-${color}-${lvl}`,
                `hover:bg-${color}-${lvl}`,
                `hover:text-${color}-${lvl}`,
                `hover:border-${color}-${lvl}`,
            );

            // Add opacity variants for backgrounds and borders
            opacities.forEach((op) => {
                safelist.push(
                    `bg-${color}-${lvl}/${op}`,
                    `border-${color}-${lvl}/${op}`,
                    `text-${color}-${lvl}/${op}`,
                );
            });
        });
    });

    return safelist;
}

export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/**/*.js",
        "./vendor/masmerise/livewire-toaster/resources/views/*.blade.php",
    ],

    darkMode: "class",

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    safelist: extractColors(),

    plugins: [forms],
};
