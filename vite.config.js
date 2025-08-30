import { defineConfig } from 'vite';
import { resolve } from 'path';

export default defineConfig({
  build: {
    outDir: 'assets/dist',
    emptyOutDir: true,
    rollupOptions: {
      input: {
        theme: resolve(__dirname, 'assets/js/src/main.js'),
      },
      output: {
        entryFileNames: 'js/[name].js',
        chunkFileNames: 'js/chunks/[name].[hash].js',
        assetFileNames: 'css/[name].[ext]'
      }
    },
    minify: true,
    sourcemap: process.env.NODE_ENV === 'development'
  },
  server: {
    hmr: {
      overlay: true,
    },
  }
});
