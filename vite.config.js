import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/css/app.css',
        'resources/css/dashboard_project.css',
        'resources/js/app.js',
        'resources/js/project/detail-modal.js',
        'resources/js/project/filters.js'
      ],
      refresh: true,
    }),
    tailwindcss(),
  ],
})
