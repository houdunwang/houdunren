//请求响应结构
interface ApiData<T> {
  message?: string
  code: number
  status?: 'success' | 'error'
  data: T
}

//分页请求响应结构
interface ApiPage<T> {
  data: T[]
  links: { url?: string; label: string; active: boolean }
  meta: {
    current_page: number
    from: number
    last_page: number
    links: { first: string; last: string; prev?: any; next?: any }[]
    path: string
    per_page: number
    to: number
    total: number
  }
}
