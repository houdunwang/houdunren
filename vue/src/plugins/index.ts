import { App } from 'vue'
import animate from './animate'
import axios from './axios'
import dayjs from './dayjs'
import elementui from './elementui'
import iconpark from './iconpark'
import markdown from './markdown'
import tailwindcss from './tailwindcss'
import validate from './validate'

const modules = [animate, axios, dayjs, elementui, iconpark, markdown, tailwindcss, validate]

export default function register(app: App) {
  modules.map((module) => module(app))
}
