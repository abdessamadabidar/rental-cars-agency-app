import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/styles1.css',
                'resources/css/styles2.css',
                'resources/css/contrat.css' ,
                'resources/js/script.js'
            ],
            refresh: true,
        }),
    ],
});
