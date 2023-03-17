import { App } from 'vue'

export default (app: App) => {
  app.directive('clearError', {
    mounted(el: HTMLElement, binding: any) {
      el.addEventListener('focus', () => {
        useErrorStore().clearError(binding.value)
      })
    },
  })
}
