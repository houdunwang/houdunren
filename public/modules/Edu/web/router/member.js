import Main from '@/views/member/Main'
import Order from '@/views/member/order/Index'
export default {
  path: '/edu/member',
  component: Main,
  children: [{ name: 'order.name', path: 'order', component: Order }]
}
