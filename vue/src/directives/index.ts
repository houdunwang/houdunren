import { App } from 'vue'
import clearError from './clearError'

const modules = [clearError]

export default (app: App) => {
  modules.map((module) => module(app))
}
