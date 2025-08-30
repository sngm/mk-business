import { defineConfig } from 'vite';
import { resolve } from 'path';

export default defineConfig({
  build: {
    outDir: 'assets/dist',
    emptyOutDir: true,
    rollupOptions: {
      input: {
        theme: resolve(__dirname, 'assets/js/src/main.js'),
        styles: resolve(__dirname, 'assets/scss/main.scss')
      },
      output: {
        entryFileNames: 'js/[name].js',
        chunkFileNames: 'js/chunks/[name].[hash].js',
        assetFileNames: ({ name }) => {
          if (/\.css$/.test(name ?? '')) {
            return 'css/[name][extname]';
          }
          
          // Handle font files
          if (/\.(woff|woff2|eot|ttf|otf)$/.test(name ?? '')) {
            return 'fonts/[name][extname]';
          }
          
          return 'assets/[name][extname]';
        }
      }
    },
    minify: true,
    sourcemap: process.env.NODE_ENV === 'development'
  },
  css: {
    devSourcemap: true
  },
  server: {
    hmr: {
      overlay: true,
    },
  }
});
