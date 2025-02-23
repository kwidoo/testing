import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from 'path';

export default defineConfig({
    server: {
        host: 'localhost',
        port: 3000,
        cors: {
            origin: '*',
        },
        hmr: {
            host: 'localhost',
            port: 3000,
        },
    },
    mode: 'development',
    plugins: [
        vue(),
        laravel({
            input: ['resources/js/app.js'],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '@': path.resolve(__dirname, './resources/js'),
        },
    },

});
