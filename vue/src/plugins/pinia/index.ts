import { App } from 'vue'
import { createPinia } from 'pinia'

const setup = (app: App) => {
  app.use(createPinia())
}

export { setup }
