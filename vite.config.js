import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // Tailwind: Jetstream pages (login, register, profile)
                'resources/css/app.css',
                'resources/js/app.js',
                // Bootstrap: landing page and role areas
                'resources/scss/app.scss',
                'resources/js/main.js',
            ],
            refresh: true,
        }),
    ],
    css: {
        preprocessorOptions: {
            scss: {
                // Bootstrap 5.3 still uses Sass features that Dart Sass deprecates.
                quietDeps: true,
                silenceDeprecations: ['import', 'global-builtin', 'color-functions'],
            },
        },
    },
});
