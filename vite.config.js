import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/landing/main.css',
                'resources/landing/animations.css',
                'resources/landing/components.css',
                'resources/landing/main.js',
                'resources/login_f/login.css',
                'resources/login_f/login.js',
                'resources/js/nuevaContrasena/nuevaContrasena.js',
                'resources/js/recuperarContrasena/recuperarContrasena.js',
                'resources/js/registro/registro.js',
                'resources/js/casos/casos.js',
                'resources/js/ia/ia.js',
                'resources/js/finanzas/finanzas.js',
                'resources/js/calendario/calendario.js',
                'resources/js/usuarios/usuarios.js',
                'resources/js/modales/modalHelper.js',
                'resources/js/loader.js',
            ],
            refresh: true,
        }),
    ],
});
