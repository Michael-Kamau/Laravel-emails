import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js','Modules/*/Resources/scss/app.scss','Modules/*/Resources/js/app.js'],
            refresh: true,
        }),
    ],
});
