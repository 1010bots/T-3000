import defaultTheme from 'tailwindcss/defaultTheme';
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
    safelist: [{
      pattern: /hljs+/,
    }],
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
                    "100": "#ffc2bb",
                    "200": "#f4a199",
                    "300": "#e58178",
                    "400": "#d55f57",
                    "500": "#c33936",
                    "600": "#b0000f",
                    "700": "#9b0000",
                    "800": "#860000",
                    "900": "#6e0000",
                    "950": "#550000"
                },
                "gr-orange": {
                    "50": "#ffe7cf",
                    "100": "#fbc8a5",
                    "200": "#ecaa7b",
                    "300": "#dc8b4e",
                    "400": "#cb6c0f",
                    "500": "#ba4c00",
                    "600": "#a72400",
                    "700": "#930000",
                    "800": "#7e0000",
                    "900": "#660000",
                    "950": "#4d0000"
                },
                "gr-yellow": {
                    "50": "#feedc9",
                    "100": "#ead19c",
                    "200": "#d7b66d",
                    "300": "#c49b36",
                    "400": "#b18000",
                    "500": "#9e6500",
                    "600": "#8b4900",
                    "700": "#772c00",
                    "800": "#630200",
                    "900": "#4e0000",
                    "950": "#340000"
                },
                "gr-lime": {
                    "50": "#ecf3ce",
                    "100": "#d1dba3",
                    "200": "#b7c377",
                    "300": "#9eab48",
                    "400": "#859300",
                    "500": "#6e7b00",
                    "600": "#596400",
                    "700": "#444c00",
                    "800": "#323500",
                    "900": "#202000",
                    "950": "#0c1100"
                },
                "gr-green": {
                    "50": "#daf8db",
                    "100": "#b5e2b7",
                    "200": "#90cc94",
                    "300": "#6bb671",
                    "400": "#41a04d",
                    "500": "#008a25",
                    "600": "#007400",
                    "700": "#005e00",
                    "800": "#004800",
                    "900": "#003200",
                    "950": "#001b00"
                },
                "gr-seafoam": {
                    "50": "#ccfaed",
                    "100": "#9fe5d2",
                    "200": "#6dd0b8",
                    "300": "#26ba9e",
                    "400": "#00a586",
                    "500": "#00906e",
                    "600": "#007a56",
                    "700": "#006440",
                    "800": "#004e2b",
                    "900": "#003717",
                    "950": "#002005"
                },
                "gr-cyan": {
                    "50": "#c8f9ff",
                    "100": "#98e3ec",
                    "200": "#62cdda",
                    "300": "#00b7c8",
                    "400": "#00a1b5",
                    "500": "#008aa3",
                    "600": "#007391",
                    "700": "#005c7f",
                    "800": "#00446c",
                    "900": "#002a5a",
                    "950": "#000a48"
                },
                "gr-blue": {
                    "50": "#d0f5ff",
                    "100": "#a5ddff",
                    "200": "#78c5f2",
                    "300": "#44ade5",
                    "400": "#0094d7",
                    "500": "#007cc8",
                    "600": "#0062b9",
                    "700": "#0047aa",
                    "800": "#00259a",
                    "900": "#00008a",
                    "950": "#120079"
                },
                "gr-indigo": {
                    "50": "#dfefff",
                    "100": "#bdd4ff",
                    "200": "#9cb9fc",
                    "300": "#7d9ff0",
                    "400": "#5e84e3",
                    "500": "#4168d6",
                    "600": "#264ac9",
                    "700": "#1125ba",
                    "800": "#1100ab",
                    "900": "#1e009c",
                    "950": "#28008c"
                },
                "gr-violet": {
                    "50": "#f1e8ff",
                    "100": "#d8cbff",
                    "200": "#c0aef4",
                    "300": "#a990e6",
                    "400": "#9273d8",
                    "500": "#7d55ca",
                    "600": "#6932bb",
                    "700": "#5700ab",
                    "800": "#46009b",
                    "900": "#39008b",
                    "950": "#2e007a"
                },
                "gr-purple": {
                    "50": "#ffe4ff",
                    "100": "#efc4ef",
                    "200": "#dca4dd",
                    "300": "#ca85cb",
                    "400": "#b665b9",
                    "500": "#a344a7",
                    "600": "#8f1995",
                    "700": "#7a0082",
                    "800": "#650070",
                    "900": "#4f005d",
                    "950": "#39004a"
                },
                "gr-fuchsia": {
                    "50": "#ffe1ef",
                    "100": "#fec0d6",
                    "200": "#efa0bd",
                    "300": "#de7fa4",
                    "400": "#cd5d8c",
                    "500": "#bb3875",
                    "600": "#a7005e",
                    "700": "#920049",
                    "800": "#7c0034",
                    "900": "#640021",
                    "950": "#4b000e"
                }
            },
            fontFamily: {
                sans: ['Segoe UI Variable Text', '-apple-system', 'BlinkMacSystemFont', 'Inter', 'Segoe UI', 'Cantarell', 'Open Sans', 'Noto Sans', 'Piboto', 'HarmonyOS Sans', 'Ubuntu', 'Roboto Flex', 'Roboto', 'Helvetica Neue', 'FreeSans', 'Arial', 'sans-serif'].concat(emojiFontStack),
                'sans-classic': ['Tahoma', 'DejaVu Sans Condensed', 'Bitstream Vera Sans Condensed', 'Verdana', 'DejaVu Sans', 'Bitstream Vera Sans', 'Noto Sans'],
                sansDisplay: ['Segoe UI Variable Display', '-apple-system', 'BlinkMacSystemFont', 'Inter', 'Segoe UI', 'Cantarell', 'Open Sans', 'Noto Sans', 'Piboto', 'HarmonyOS Sans', 'Ubuntu', 'Roboto Flex', 'Roboto', 'Helvetica Neue', 'FreeSans', 'Arial', 'sans-serif'].concat(emojiFontStack),
                sansSmall: ['Segoe UI Variable Small', '-apple-system', 'BlinkMacSystemFont', 'Inter', 'Segoe UI', 'Cantarell', 'Open Sans', 'Noto Sans', 'Piboto', 'HarmonyOS Sans', 'Ubuntu', 'Roboto Flex', 'Roboto', 'Helvetica Neue', 'FreeSans', 'Arial', 'sans-serif'].concat(emojiFontStack),
                serif: ['ui-serif', 'Aptos Serif', 'Constantia', 'Charter', 'STIX Two Text', 'Libertinus Serif', 'Linux Libertine O', 'Linux Libertine G', 'Linux Libertine', 'DejaVu Serif', 'Bitstream Vera Serif', 'Roboto Serif', 'Noto Serif', 'Times New Roman', 'serif'].concat(emojiFontStack),
            },
        },
        hljs: {
            theme: 'night-owl',
        }
    },

    plugins: [forms, highlightjs, safeArea, typography],
};
