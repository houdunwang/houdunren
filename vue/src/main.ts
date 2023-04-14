import directive from '@/directives'
import plugin from '@/plugins'
import { createApp } from 'vue'
import App from './App.vue'
import '@/assets/global.scss'

function bootstrap() {
  const app = createApp(App)
  plugin(app)
  directive(app)
  app.mount('#app')
}

bootstrap()
