<template>
    <el-card shadow="never" :body-style="{ padding: '20px' }">
        <div slot="header">
            绑定微信
        </div>
        <div v-loading="loading">
            <div v-if="wechat.id">
                <div class="pb-5 mb-5 border-b text-base text-gray-800 font-light">微信已绑定</div>
                <a href="/wechat/unbind" class="btn btn-warning hover:text-white" @click.prevent="unbind">
                    解除绑定
                </a>
            </div>
            <a href="/wechat/bind" class="btn btn-info hover:text-white" v-else>
                开始绑定
            </a>
        </div>
    </el-card>
</template>

<script>
export default {
    route: { meta: { keepAlive: true } },
    inject: ['site'],
    data() {
        return {
            wechat: {},
            loading: true
        }
    },
    async created() {
        this.wechat = await this.axios.get(`/api/site/${this.site.id}}/user/wechat`)
        this.loading = false
    },
    methods: {
        //解除绑定
        async unbind() {
            this.$confirm('确定解除微信绑定吗？', '温馨提示').then(async _ => {
                await axios.delete(`/api/site/${this.site.id}/user/wechat/unbind`)
                this.wechat = await this.axios.get(`/api/site/${this.site.id}}/user/wechat`)
            })
        }
    }
}
</script>

<style></style>
