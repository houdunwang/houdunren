<template>
  <div class="subscribe" v-if="subscribes.length">
    <div class="header">
      <h1 class="text-white text-center">投资学习会得到加倍的回报</h1>
      <h2 class>订阅会员免费观看网站所有视频</h2>
    </div>
    <div class="container items">
      <div class="row">
        <div class="col-12 col-md-4 mt-3" v-for="subscribe in subscribes" :key="subscribe.id">
          <div class="card shadow-lg item">
            <div class="card-body text-center pb-4 pt-5 shadow">
              <i class="fa-3x text-primary" :class="subscribe.icon" aria-hidden="true"></i>
              <div class="price mt-2 mb-2 price">
                <span>{{ parseInt(subscribe.price) }}</span>
                <small class="text-secondary">元</small>
              </div>
              <div class="title font-weight-bold text-secondary">{{ subscribe.title }}</div>
            </div>
            <div class="card-footer text-muted text-center pb-5 pt-4 shadow">
              <h5 class="text-center mb-3 mt-2">{{ subscribe.ad }}</h5>
              <button type="button" class="btn btn-success" @click.prevent="pay(subscribe)">去支付宝付款</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container text-secondary instruct">
      <p>1. 视频属于虚拟物品，购买后不支持退款</p>
      <p>
        2. 支付的费用仅用于观看视频，并不包含其他服务（如在线解答），有问题发到网站我们会尽量帮助解决。
        祝你学有所成，加油！
      </p>
    </div>
    <footers />
  </div>
</template>
<script>
import Footers from '../components/Footer'
import { mapGetters } from 'vuex'
export default {
  components: { Footers },
  data() {
    return {
      subscribes: []
    }
  },
  computed: {
    ...mapGetters('user', ['isLogin'])
  },
  async created() {
    let response = await this.axios.get(`edu/front/subscribe`)
    this.$set(this, 'subscribes', response.data)
  },
  methods: {
    pay(subscribe) {
      let url = this.isLogin ? `/edu/subscribe/alipay/${subscribe.id}` : `/login?redirect=${this.$route.path}`
      location.href = url
    }
  }
}
</script>

<style lang="scss" scoped>
.subscribe {
  background: #f1f1ed;
  padding-bottom: 10rem;
}
.header {
  background-image: linear-gradient(150deg, #2d1582 0%, #19a0ff 100%);
  background-repeat: repeat-x;
  padding: 20px 20px 120px;
  h1 {
    font-size: 4rem;
    margin-top: 6rem;
  }
  h2 {
    font-weight: 200;
    opacity: 0.6;
    margin-top: 2rem;
    color: #fff;
    text-align: center;
  }
}
.items {
  margin-top: -5rem;
  padding-bottom: 3rem;
  .item {
    i {
      font-size: 5rem;
    }
    .price {
      span {
        font-weight: normal;
        font-size: 3rem;
        text-shadow: 0 0 3px #aaa;
      }
    }
    .card-footer {
      background: #f1f2ec;
    }
  }
  .instruct {
    margin-top: 3rem;
  }
}
</style>
