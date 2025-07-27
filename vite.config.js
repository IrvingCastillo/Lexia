import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/lottie/animations.js',
                'resources/login_f/login.css',
                'resources/login_f/login.js',
                'resources/nuevaContrasena/nuevaContrasena.js',
                'resources/recuperarContrasena/recuperarContrasena.js',
                'resources/registro/registro.js',
                'resources/casos/casos.js',
                'resources/ia/ia.js',
            ],
            refresh: true,
        }),
    ],
});
