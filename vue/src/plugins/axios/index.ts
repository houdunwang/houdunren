import Axios from './Axios'

const http = new Axios({
  baseURL: '/api',
  timeout: 10000,
})
const setup = () => {}
export { http, setup }
