
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: '0.0.0.0', // Allow connections from the network
        port: 5173, // Default Vite port
        strictPort: true,
        hmr: {
            host: 'http://127.0.0.1:8000/', // Your local IP address
            protocol: 'ws', // WebSocket for HMR
        }
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
