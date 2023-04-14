import { App } from 'vue'
import { setup as animate } from './animate'
import { setup as axios } from './axios'
import { setup as dayjs } from './dayjs'
import { setup as elementui } from './elementui'
import { setup as iconpark } from './iconpark'
import { setup as markdown } from './markdown'
import { setup as tailwindcss } from './tailwindcss'
import { setup as validate } from './validate'
import { setup as router } from './router'
import { setup as pinia } from './pinia'

const modules = [animate, axios, dayjs, elementui, iconpark, markdown, tailwindcss, validate, router, pinia]

export default function register(app: App) {
  modules.map((setup) => setup(app))
}
