import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/bootstrap_themes/default.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ], server: {
        host: '0.0.0.0',
        headers: {
            'Access-Control-Allow-Origin': '*',
        },
    }
});