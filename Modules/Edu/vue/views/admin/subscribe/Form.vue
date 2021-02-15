<template>
    <div>
        <hd-tab :tabs="tabs" />
        <el-form :model="form" ref="form" label-width="100px" label-position="right" :inline="false" size="normal">
            <el-card shadow="always" :body-style="{ padding: '20px' }">
                <div slot="header">
                    基本资料
                </div>
                <el-form-item label="套餐标题">
                    <el-input v-model="form.title"></el-input>
                    <hd-error name="title" />
                </el-form-item>
                <el-form-item label="广告语">
                    <el-input v-model="form.ad"></el-input>
                    <hd-error name="ad" />
                </el-form-item>
                <el-form-item label="图标">
                    <el-input v-model="form.icon"></el-input>
                    <hd-error name="icon" />
                </el-form-item>
                <el-form-item label="价格">
                    <el-input v-model="form.price"></el-input>
                    <hd-error name="price" />
                </el-form-item>
                <el-form-item label="套餐月数">
                    <el-input v-model="form.month"></el-input>
                    <hd-error name="month" />
                </el-form-item>
            </el-card>
            <el-button type="primary" @click="onSubmit" class="block mt-3">保存提交</el-button>
        </el-form>
    </div>
</template>

<script>
import tabs from './tabs'
const form = {
    title: '',
    ad: '',
    icon: '',
    price: 0,
    month: 3
}
export default {
    props: ['id'],
    data() {
        return {
            tabs,
            form
        }
    },
    async created() {
        if (this.id) this.form = await this.axios.get(`admin/subscribe/${this.id}`)
    },
    methods: {
        //提交表单
        async onSubmit() {
            const url = this.id ? `admin/subscribe/${this.id}` : 'admin/subscribe'
            await this.axios[this.id ? 'put' : 'post'](url, this.form)
            this.$router.push({ name: 'admin.subscribe.index' })
        }
    }
}
</script>

<style></style>
