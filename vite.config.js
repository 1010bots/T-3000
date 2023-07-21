import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/dialog-polyfill.css',
                'resources/js/app.js',
                'resources/js/dialog-polyfill.js',
                'resources/js/highlight.min.js',
                'resources/js/modernizr.js',
            ],
            refresh: [
                ...refreshPaths,
                'app/Http/Livewire/**',
            ],
        }),
    ],
});
