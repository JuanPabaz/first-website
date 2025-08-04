import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js',
                'resources/css/home.css','resources/css/layout.css',
                'resources/css/project-view.css', 'resources/css/projects.css',
                'resources/css/services.css','resources/css/us.css',
                'resources/js/bootstrap.js', 'resources/js/home.js',
                'resources/js/layout.js', 'resources/js/project-view.js'
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
