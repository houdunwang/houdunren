import { user } from './data'
import { Random } from 'mockjs'
import _ from 'lodash'

export function create(num = 1) {
  const data: any[] = []
  for (let i = 1; i <= num; i++) {
    const model = _.cloneDeep(user)
    model.id = i
    model.sex = _.random(1, 2)
    model.avatar = Random.image('200x200')
    model.nickname = Random.cname()
    model.created_at = Random.datetime()
    model.updated_at = Random.datetime()
    data.push(model)
  }
  return data
}

export function image() {
  return '/images/xj.jpg'
}

export function createPaginate(num = 1) {
  const data = create(num)
  return {
    data,
    links: {
      first: '/api/user?page=1',
      last: '/api/user?page=1',
      prev: null,
      next: null,
    },
    meta: {
      current_page: 1,
      from: 1,
      last_page: 1,
      links: [
        {
          url: null,
          label: '&laquo; 上一页',
          active: false,
        },
        {
          url: '/api/user?page=1',
          label: '1',
          active: true,
        },
        {
          url: null,
          label: '下一页 &raquo;',
          active: false,
        },
      ],
      path: '/api/user',
      per_page: 10,
      to: 5,
      total: 50,
    },
  }
}
