import vue from '@vitejs/plugin-vue'
import { viteMockServe } from 'vite-plugin-mock'
import path from 'path'
import { defineConfig, loadEnv } from 'vite'
import prismjs from 'vite-plugin-prismjs'
import autoImport from './vite/auto-import'
import { parseEnv } from './vite/util'

export default defineConfig(({ command, mode }) => {
  const isBuild = command == 'build'
  const env = parseEnv(loadEnv(mode, process.cwd()))

  return {
    plugins: [
      ...autoImport,
      vue(),
      viteMockServe({
        mockPath: 'mock',
        localEnabled: !isBuild && !env.VITE_API_URL,
      }),
      prismjs({
        languages: 'all',
      }),
    ],
    base: isBuild ? '/vue/dist' : '/',
    resolve: {
      alias: {
        '@': path.resolve(__dirname, 'src'),
        '#': path.resolve(__dirname, 'types'),
      },
    },
    build: {
      emptyOutDir: true,
      rollupOptions: {
        output: {
          manualChunks(id: string) {
            if (id.includes('node_modules')) {
              return id.split('/node_modules/').pop()?.split('/')[0]
            }
          },
        },
      },
    },
    server: {
      host: true,
      proxy: {
        '/api': {
          target: env.VITE_API_URL,
          changeOrigin: true,
        },
        '/captcha': {
          target: env.VITE_API_URL,
          changeOrigin: true,
        },
      },
    },
  }
})
