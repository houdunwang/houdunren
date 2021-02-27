<template>
    <div class="mt-10">
        <div class="subscribe">
            <div class="header -mt-10 pt-28 pb-28">
                <h1 class="text-white text-center text-6xl opacity-100 leading-snug">投资学习永远是最聪明的</h1>
                <h2 class="text-3xl font-weight-light mt-10 text-white text-center opacity-60">订阅会员免费观看网站所有视频</h2>
            </div>
            <div class="container-xl">
                <div class="-mt-20 md:w-10/12 m-auto">
                    <div class="row">
                        <div class="col-12 col-md-4 mt-3" v-for="subscribe in subscribes" :key="subscribe.id">
                            <div class="card shadow-lg item">
                                <div class="card-body text-center pb-4 pt-10 shadow">
                                    <i class="fa-5x text-primary fab fa-codepen" :class="subscribe.icon"></i>
                                    <div class="mt-5 mb-2">
                                        <span class="price text-4xl">{{ parseInt(subscribe.price) }}</span> <small class="text-secondary">元</small>
                                    </div>
                                    <div class="title font-weight-bold text-secondary">{{ subscribe.title }}</div>
                                </div>
                                <div class="card-footer text-muted text-center pb-5 pt-4 shadow">
                                    <h5 class="text-center mb-3 mt-2 text-lg font-bold">{{ subscribe.ad }}</h5>
                                    <div role="group" aria-label="Basic example" class="btn-group">
                                        <a target="_blank" :href="`/Edu/pay/subscribe/${subscribe.id}`" class="btn btn-success">
                                            支付宝付款
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container text-secondary instruct text-center mt-10">
                    <a href="https://www.houdunren.com/edu/member/duration" class="mb-3 btn btn-info shadow-sm">
                        <i class="fas fa-info-circle mr-2"></i> 支付成功后无法跳转请点击这里
                    </a>
                    <p>视频属于虚拟物品，购买后不支持退款</p>
                    <p>
                        支付的费用仅用于观看视频，并不包含其他服务（如在线解答），有问题发到网站我们会尽量帮助解决。 祝你学有所成，加油！
                    </p>
                </div>
            </div>
        </div>
        <el-divider class="mt-20 mb-5 block"></el-divider>
    </div>
</template>

<script>
export default {
    route: { meta: { keepAlive: true } },
    data() {
        return {
            subscribes: []
        }
    },
    async created() {
        this.subscribes = await axios.get(`subscribe`)
    }
}
</script>

<style>
.subscribe .header {
    background-image: linear-gradient(150deg, #2d1582, #19a0ff);
}
</style>
