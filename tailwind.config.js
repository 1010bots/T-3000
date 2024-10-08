import aspectRatio from '@tailwindcss/aspect-ratio';
import forms from '@tailwindcss/forms';
import highlightjs from 'tailwind-highlightjs';
import safeArea from 'tailwindcss-safe-area';
import typography from '@tailwindcss/typography';

const colorEmojiFontStack = ['Apple Color Emoji', 'Segoe UI Emoji', 'SamsungColorEmoji', 'Noto Color Emoji Flags', 'Noto Color Emoji'];
const outlinedEmojiFontStack = ['Segoe UI Symbol', 'Noto Emoji', 'Symbola'];
const emojiFontStack = colorEmojiFontStack.concat(outlinedEmojiFontStack);

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    safelist: [
        { pattern: /hljs+/ },
        // A. Standard containers for cards
        { pattern: /^bg-rc-\S+-50(\/25){0,1}$/gi },
        {
            pattern: /^bg-rc-\S+-900(\/25){0,1}$/gi,
            variants: ["dark"],
        },
        {
            pattern: /^bg-dm-\S+-800$/gi,
            variants: ["dark:hover"]
        },
        // B. Active indicators and accent colors
        { pattern: /^((accent)|(bg))-gr-\S+-500$/gi },
        {
            pattern: /^((accent)|(bg))-dm-\S+-400$/gi,
            variants: ["dark"]
        },
        {
            pattern: /^((accent)|(bg))-dm-\S+-600$/gi,
            variants: ["hover"],
        },
        // C. Standard card borders
        { pattern: /^border-dm-\S+-300$/gi },
        // D. Navbar inactive borders
        {
            pattern: /^border-rc-\S+-500$/gi,
            variants: ["focus"],
        },
        // E. Text selection colors
        // None
        // F. Hyperlink colors
        { pattern: /^text-gr-\S+-500$/gi },
        {
            pattern: /^text-gr-\S+-200$/gi,
            variants: ["dark"]
        },
        {
            pattern: /^text-gr-\S+-700$/gi,
            variants: ["hover"]
        },
        {
            pattern: /^text-gr-\S+-400$/gi,
            variants: ["dark:hover"]
        },
        // G. Chip colors
        {
            pattern: /^bg-gr-\S+-500\/50$/gi,
        },
    ],
    theme: {
        extend: {
            colors: {
                "dm-red": {
                    "50": "#ff9d91",
                    "100": "#ff8b80",
                    "200": "#ff7970",
                    "300": "#ff6760",
                    "400": "#dd5750",
                    "500": "#b94641",
                    "600": "#963632",
                    "700": "#752724",
                    "800": "#551916",
                    "900": "#370b0a",
                    "950": "#1c0202"
                },
                "dm-orange": {
                    "50": "#ffb700",
                    "100": "#ffa200",
                    "200": "#ff8e00",
                    "300": "#f77a00",
                    "400": "#d36700",
                    "500": "#b15400",
                    "600": "#8f4200",
                    "700": "#6f3100",
                    "800": "#512000",
                    "900": "#341100",
                    "950": "#1a0400"
                },
                "dm-yellow": {
                    "50": "#ffdd00",
                    "100": "#ffc400",
                    "200": "#f5ac00",
                    "300": "#d59500",
                    "400": "#b67e00",
                    "500": "#986800",
                    "600": "#7b5300",
                    "700": "#5f3e00",
                    "800": "#442b00",
                    "900": "#2b1900",
                    "950": "#140800"
                },
                "dm-lime": {
                    "50": "#e8ff00",
                    "100": "#cfe400",
                    "200": "#b6c900",
                    "300": "#9dae00",
                    "400": "#859400",
                    "500": "#6e7b00",
                    "600": "#586200",
                    "700": "#434b00",
                    "800": "#2f3500",
                    "900": "#1c2000",
                    "950": "#0b0d00"
                },
                "dm-green": {
                    "50": "#5eff7d",
                    "100": "#52fa6e",
                    "200": "#45dc5f",
                    "300": "#3abf51",
                    "400": "#2ea343",
                    "500": "#238735",
                    "600": "#186d28",
                    "700": "#0e541c",
                    "800": "#053c10",
                    "900": "#002506",
                    "950": "#001001"
                },
                "dm-seafoam": {
                    "50": "#00ffe8",
                    "100": "#00ffce",
                    "200": "#00e3b5",
                    "300": "#00c59d",
                    "400": "#00a885",
                    "500": "#008c6e",
                    "600": "#007158",
                    "700": "#005743",
                    "800": "#003e2f",
                    "900": "#00271c",
                    "950": "#00110a"
                },
                "dm-cyan": {
                    "50": "#00ffff",
                    "100": "#00faff",
                    "200": "#00ddfc",
                    "300": "#00bfdb",
                    "400": "#00a3bb",
                    "500": "#00889c",
                    "600": "#006d7e",
                    "700": "#005462",
                    "800": "#003c46",
                    "900": "#00252d",
                    "950": "#001015"
                },
                "dm-blue": {
                    "50": "#00ffff",
                    "100": "#00e6ff",
                    "200": "#00caff",
                    "300": "#00afff",
                    "400": "#0095e1",
                    "500": "#007bbc",
                    "600": "#006399",
                    "700": "#004b77",
                    "800": "#003557",
                    "900": "#002039",
                    "950": "#000d1d"
                },
                "dm-indigo": {
                    "50": "#9fe3ff",
                    "100": "#8dcaff",
                    "200": "#7bb1ff",
                    "300": "#6999ff",
                    "400": "#5882ef",
                    "500": "#486bc8",
                    "600": "#3855a3",
                    "700": "#29407f",
                    "800": "#1b2d5d",
                    "900": "#0d1a3d",
                    "950": "#030920"
                },
                "dm-violet": {
                    "50": "#ffc4ff",
                    "100": "#e4aeff",
                    "200": "#c998ff",
                    "300": "#ae83ff",
                    "400": "#946fe3",
                    "500": "#7b5bbe",
                    "600": "#63489a",
                    "700": "#4b3578",
                    "800": "#352458",
                    "900": "#201439",
                    "950": "#0e061d"
                },
                "dm-purple": {
                    "50": "#ffaaff",
                    "100": "#ff96ff",
                    "200": "#fd83ff",
                    "300": "#dc71e0",
                    "400": "#bc5fbf",
                    "500": "#9d4da0",
                    "600": "#7f3c81",
                    "700": "#622c64",
                    "800": "#471d48",
                    "900": "#2d0f2e",
                    "950": "#150316"
                },
                "dm-fuchsia": {
                    "50": "#ff9af4",
                    "100": "#ff88d9",
                    "200": "#ff76bf",
                    "300": "#f965a5",
                    "400": "#d5558c",
                    "500": "#b24574",
                    "600": "#90355d",
                    "700": "#702647",
                    "800": "#511832",
                    "900": "#350b1e",
                    "950": "#1a020c"
                },
                "gr-red": {
                    "50": "#ffe2dd",
                    "100": "#ffc3bc",
                    "200": "#efa49c",
                    "300": "#de867d",
                    "400": "#cc675f",
                    "500": "#b94641",
                    "600": "#a51e21",
                    "700": "#900000",
                    "800": "#7a0000",
                    "900": "#630000",
                    "950": "#4a0000"
                },
                "gr-orange": {
                    "50": "#ffe7cf",
                    "100": "#f9c9a8",
                    "200": "#e8ac82",
                    "300": "#d68f5b",
                    "400": "#c3722f",
                    "500": "#b15400",
                    "600": "#9d3400",
                    "700": "#890200",
                    "800": "#730000",
                    "900": "#5c0000",
                    "950": "#440000"
                },
                "gr-yellow": {
                    "50": "#feedc9",
                    "100": "#e9d2a0",
                    "200": "#d4b776",
                    "300": "#c09c49",
                    "400": "#ac8200",
                    "500": "#986800",
                    "600": "#844e00",
                    "700": "#703300",
                    "800": "#5c1500",
                    "900": "#470000",
                    "950": "#300000"
                },
                "gr-lime": {
                    "50": "#ecf3ce",
                    "100": "#d1dba6",
                    "200": "#b7c27f",
                    "300": "#9eaa56",
                    "400": "#869225",
                    "500": "#6e7b00",
                    "600": "#586300",
                    "700": "#444c00",
                    "800": "#313600",
                    "900": "#1f2000",
                    "950": "#0d0e00"
                },
                "gr-green": {
                    "50": "#daf8db",
                    "100": "#b7e1b9",
                    "200": "#95cb98",
                    "300": "#73b477",
                    "400": "#4f9e57",
                    "500": "#238735",
                    "600": "#007107",
                    "700": "#005b00",
                    "800": "#004600",
                    "900": "#003000",
                    "950": "#001a00"
                },
                "gr-seafoam": {
                    "50": "#ccfaed",
                    "100": "#a3e4d2",
                    "200": "#77ceb8",
                    "300": "#44b89f",
                    "400": "#00a286",
                    "500": "#008c6e",
                    "600": "#007657",
                    "700": "#006041",
                    "800": "#004a2c",
                    "900": "#003418",
                    "950": "#001e06"
                },
                "gr-cyan": {
                    "50": "#c8f9ff",
                    "100": "#9de2eb",
                    "200": "#6ecbd7",
                    "300": "#32b5c3",
                    "400": "#009eaf",
                    "500": "#00889c",
                    "600": "#007189",
                    "700": "#005a76",
                    "800": "#004363",
                    "900": "#002b50",
                    "950": "#00103e"
                },
                "gr-blue": {
                    "50": "#d0f5ff",
                    "100": "#a8dcfd",
                    "200": "#80c4ed",
                    "300": "#55acdd",
                    "400": "#1894cd",
                    "500": "#007bbc",
                    "600": "#0063ab",
                    "700": "#00499a",
                    "800": "#002e89",
                    "900": "#000278",
                    "950": "#010066"
                },
                "gr-indigo": {
                    "50": "#dfefff",
                    "100": "#bfd4ff",
                    "200": "#9fbaf5",
                    "300": "#81a0e7",
                    "400": "#6485d8",
                    "500": "#486bc8",
                    "600": "#2d50b8",
                    "700": "#1632a8",
                    "800": "#090198",
                    "900": "#120087",
                    "950": "#1c0075"
                },
                "gr-violet": {
                    "50": "#f1e8ff",
                    "100": "#d8ccfe",
                    "200": "#bfafee",
                    "300": "#a893de",
                    "400": "#9177ce",
                    "500": "#7b5bbe",
                    "600": "#663dad",
                    "700": "#53189c",
                    "800": "#41008a",
                    "900": "#320078",
                    "950": "#260066"
                },
                "gr-purple": {
                    "50": "#ffe4ff",
                    "100": "#edc5ed",
                    "200": "#d9a7da",
                    "300": "#c589c6",
                    "400": "#b16bb3",
                    "500": "#9d4da0",
                    "600": "#882c8c",
                    "700": "#730079",
                    "800": "#5e0066",
                    "900": "#480053",
                    "950": "#32003f"
                },
                "gr-fuchsia": {
                    "50": "#ffe1ef",
                    "100": "#fbc2d6",
                    "200": "#eaa3bc",
                    "300": "#d884a4",
                    "400": "#c5658c",
                    "500": "#b24574",
                    "600": "#9e1e5e",
                    "700": "#880048",
                    "800": "#720034",
                    "900": "#5b0020",
                    "950": "#42000e"
                },
                "rc-red": {
                    "50": "#ffe2dd",
                    "100": "#f5c8c2",
                    "200": "#dcaea8",
                    "300": "#c3948f",
                    "400": "#ab7b76",
                    "500": "#93635e",
                    "600": "#794e49",
                    "700": "#603935",
                    "800": "#482521",
                    "900": "#32120f",
                    "950": "#1c0202"
                },
                "rc-orange": {
                    "50": "#ffe7cf",
                    "100": "#f0ccb4",
                    "200": "#d7b299",
                    "300": "#be997f",
                    "400": "#a68066",
                    "500": "#8e684e",
                    "600": "#755239",
                    "700": "#5d3d25",
                    "800": "#452812",
                    "900": "#2f1502",
                    "950": "#1a0400"
                },
                "rc-yellow": {
                    "50": "#feedc9",
                    "100": "#e4d2ae",
                    "200": "#cab993",
                    "300": "#b29f78",
                    "400": "#99875f",
                    "500": "#826f46",
                    "600": "#6a5832",
                    "700": "#53431e",
                    "800": "#3d2e0a",
                    "900": "#281a00",
                    "950": "#140800"
                },
                "rc-lime": {
                    "50": "#ecf3ce",
                    "100": "#d2d9b2",
                    "200": "#b8bf97",
                    "300": "#9fa67d",
                    "400": "#878e64",
                    "500": "#6f764c",
                    "600": "#595f37",
                    "700": "#434923",
                    "800": "#2f3410",
                    "900": "#1c2000",
                    "950": "#0b0d00"
                },
                "rc-green": {
                    "50": "#daf8db",
                    "100": "#bfdec0",
                    "200": "#a5c5a6",
                    "300": "#8bac8c",
                    "400": "#729374",
                    "500": "#5a7c5c",
                    "600": "#456446",
                    "700": "#304d32",
                    "800": "#1d381f",
                    "900": "#0a230d",
                    "950": "#001001"
                },
                "rc-seafoam": {
                    "50": "#ccfaed",
                    "100": "#b1e0d3",
                    "200": "#96c7b9",
                    "300": "#7baea0",
                    "400": "#619588",
                    "500": "#477e70",
                    "600": "#326659",
                    "700": "#1d4f44",
                    "800": "#05392f",
                    "900": "#00251c",
                    "950": "#00110a"
                },
                "rc-cyan": {
                    "50": "#c8f9ff",
                    "100": "#acdfe5",
                    "200": "#91c5cc",
                    "300": "#76acb3",
                    "400": "#5c949b",
                    "500": "#417c83",
                    "600": "#2c646b",
                    "700": "#154e54",
                    "800": "#00383e",
                    "900": "#002329",
                    "950": "#001015"
                },
                "rc-blue": {
                    "50": "#d0f5ff",
                    "100": "#b4daf3",
                    "200": "#99c1da",
                    "300": "#7fa8c1",
                    "400": "#668fa9",
                    "500": "#4d7791",
                    "600": "#386078",
                    "700": "#234a60",
                    "800": "#0f3448",
                    "900": "#002032",
                    "950": "#000d1d"
                },
                "rc-indigo": {
                    "50": "#dfefff",
                    "100": "#c4d4f8",
                    "200": "#aabadf",
                    "300": "#91a1c6",
                    "400": "#7889ae",
                    "500": "#607197",
                    "600": "#4b5a7d",
                    "700": "#364464",
                    "800": "#232f4c",
                    "900": "#111c35",
                    "950": "#030920"
                },
                "rc-violet": {
                    "50": "#f1e8ff",
                    "100": "#d7cef4",
                    "200": "#bdb4db",
                    "300": "#a49bc2",
                    "400": "#8c82aa",
                    "500": "#756a92",
                    "600": "#5e5479",
                    "700": "#483f60",
                    "800": "#332a49",
                    "900": "#1f1732",
                    "950": "#0e061d"
                },
                "rc-purple": {
                    "50": "#ffe4ff",
                    "100": "#e7c9e7",
                    "200": "#ceafce",
                    "300": "#b595b5",
                    "400": "#9d7d9d",
                    "500": "#856585",
                    "600": "#6d4f6d",
                    "700": "#553a56",
                    "800": "#3f263f",
                    "900": "#29132a",
                    "950": "#150316"
                },
                "rc-fuchsia": {
                    "50": "#ffe1ef",
                    "100": "#f2c7d5",
                    "200": "#d9acbc",
                    "300": "#c093a3",
                    "400": "#a77a8a",
                    "500": "#906273",
                    "600": "#764d5c",
                    "700": "#5e3846",
                    "800": "#462431",
                    "900": "#2f111e",
                    "950": "#1a020c",
                }
            },
            fontFamily: {
                bls: ['Bumi Laras Selatan', 'sans-serif'],
                sans: ['Bumi Laras Selatan', 'Segoe UI Variable Text', '-apple-system', 'BlinkMacSystemFont', 'Inter', 'Segoe UI', 'Cantarell', 'Open Sans', 'Noto Sans', 'Piboto', 'HarmonyOS Sans', 'One UI Sans APP VF', 'Ubuntu', 'Roboto Flex', 'Roboto', 'Helvetica Neue', 'FreeSans', 'Arial', 'sans-serif'].concat(emojiFontStack),
                'sans-display': ['Bumi Laras Selatan', 'Segoe UI Variable Display', '-apple-system', 'BlinkMacSystemFont', 'Inter', 'Segoe UI', 'Cantarell', 'Open Sans', 'Noto Sans', 'Piboto', 'HarmonyOS Sans', 'One UI Sans APP VF', 'Ubuntu', 'Roboto Flex', 'Roboto', 'Helvetica Neue', 'FreeSans', 'Arial', 'sans-serif'].concat(emojiFontStack),
                'sans-small': ['Bumi Laras Selatan', 'Segoe UI Variable Small', '-apple-system', 'BlinkMacSystemFont', 'Inter', 'Segoe UI', 'Cantarell', 'Open Sans', 'Noto Sans', 'Piboto', 'HarmonyOS Sans', 'One UI Sans APP VF', 'Ubuntu', 'Roboto Flex', 'Roboto', 'Helvetica Neue', 'FreeSans', 'Arial', 'sans-serif'].concat(emojiFontStack),
                serif: ['ui-serif', 'Aptos Serif', 'Constantia', 'Publico Text', 'Charter', 'STIX Two Text', 'Libertinus Serif', 'Linux Libertine O', 'Linux Libertine G', 'Linux Libertine', 'DejaVu Serif', 'Bitstream Vera Serif', 'Roboto Serif', 'Noto Serif', 'Times New Roman', 'serif'].concat(emojiFontStack),
            },
        },
        hljs: {
            theme: 'night-owl',
        }
    },
    darkMode: 'selector',
    plugins: [aspectRatio, forms, highlightjs, safeArea, typography],
};
