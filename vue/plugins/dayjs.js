import dayjs from 'dayjs'
const relativeTime = require('dayjs/plugin/relativeTime')
require('dayjs/locale/zh-cn')

dayjs.extend(relativeTime)
dayjs.locale('zh-cn')
