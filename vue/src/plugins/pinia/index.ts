import { App } from 'vue'
import { createPinia } from 'pinia'
import piniaPluginPersistedstate from 'pinia-plugin-persistedstate'

const setup = (app: App) => {
  const pinia = createPinia()
  app.use(pinia)
  pinia.use(piniaPluginPersistedstate)
}

export { setup }
