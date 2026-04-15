import { defineConfig, loadEnv } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig(({ mode }) => {
    const env = loadEnv(mode, process.cwd(), '');
    const subPath = (env.VITE_APP_SUBPATH || '').replace(/\/$/, '');
    const base = subPath ? `${subPath}/build/` : '/build/';

    return {
        base,
        server: {
            host: '127.0.0.1',
        },
        plugins: [
            laravel({
                input: ['resources/css/app.css', 'resources/js/app.js'],
                refresh: true,
            }),
        ],
    };
});
