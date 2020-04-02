<template>
  <div class="subscribe">
    <div class="header">
      <h1 class="text-white text-center">
        投资学习会得到加倍的回报
      </h1>
      <h2 class="">
        订阅会员免费观看网站所有视频
      </h2>
    </div>
    <div class="container ">
      <div class="row">
        <div class="col-12 col-md-4">
          <div class="card shadow-lg item">
            <div class="card-body text-center pb-4 pt-5 shadow">
              <i class="fa fa-adn fa-4x text-primary" aria-hidden="true"></i>
              <div class="price mt-2 mb-2 price">
                <span>499</span>
                <small class="text-secondary">元</small>
              </div>
              <div class="title font-weight-bold text-secondary">
                半年付
              </div>
            </div>
            <div class="card-footer text-muted text-center pb-5 pt-4 shadow">
              <h5 class="text-center mb-3 mt-2">小试牛刀</h5>
              <button class="btn btn-success">去支付宝付款</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container text-secondary instruct">
      <p>
        1. 视频属于虚拟物品，购买后不支持退款
      </p>
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
export default {
  components: { Footers }
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
  height: 380px;
  padding: 20px;
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
.item {
  margin-top: -3rem;
  i {
    font-size: 6rem;
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
</style>
