import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import vueJsx from '@vitejs/plugin-vue-jsx';
import { resolve } from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        vueJsx()
    ],
    resolve: {
        alias: {
            '@': resolve(__dirname, 'resources/js'),
            '@components': resolve(__dirname, 'resources/js/Components'),
            '@pages': resolve(__dirname, 'resources/js/Pages'),
            '@layouts': resolve(__dirname, 'resources/js/Layouts'),
            '@stores': resolve(__dirname, 'resources/js/stores'),
            '@composables': resolve(__dirname, 'resources/js/Composables'),
            '@utils': resolve(__dirname, 'resources/js/utils'),
            '@services': resolve(__dirname, 'resources/js/services'),
            '@definitions': resolve(__dirname, 'resources/js/definitions'),
        },
    },
});
