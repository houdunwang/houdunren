<template>
  <div>
    <div class="container mt-3 mt-md-5 mb-5">
      <div class="row">
        <div class="col-12 col-sm-9 mt-2">
          <div class="card">
            <div class="card-header bg-white d-flex justify-content-between">
              社区动态
              <a href class="btn btn-outline-secondary btn-sm">发表</a>
            </div>
            <div class="card-body">
              <div class="d-flex dynamic pt-3 pb-4 border-bottom">
                <img
                  src="https://i2.wp.com/wp.laravel-news.com/wp-content/uploads/2019/12/laracon-viii-is-coming.jpg?fit=2220%2C1125&ssl=1?resize=1400%2C709"
                  alt="..."
                  class="rounded mr-3"
                />
                <div class="flex-fill d-flex flex-column">
                  <a href="#" class="mb-3 text-muted">《新人请走进这个小屋来，有点事要和你说》</a>
                  <span class="small font-weight-light text-muted">于 1个月前 . 评论 45 . 点赞 573</span>
                </div>
              </div>
              <div class="d-flex dynamic pt-3 pb-4 border-bottom">
                <img
                  src="https://i2.wp.com/wp.laravel-news.com/wp-content/uploads/2019/12/laracon-viii-is-coming.jpg?fit=2220%2C1125&ssl=1?resize=1400%2C709"
                  alt="..."
                  class="rounded mr-3"
                />
                <div class="flex-fill d-flex flex-column">
                  <a href="#" class="mb-3 text-muted">《新人请走进这个小屋来，有点事要和你说》</a>
                  <span class="small font-weight-light text-muted">于 1个月前 . 评论 45 . 点赞 573</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-3 mt-2 pl-0">
          <tip />
        </div>
      </div>
    </div>
    <footers />
  </div>
</template>

<script>
import Tip from '../components/Tips'
import Footers from '../components/Footer'

export default {
  components: { Tip, Footers }
}
</script>

<style lang="scss" scoped>
.dynamic {
  img {
    width: 50px;
    height: 50px;
  }
}
</style>
