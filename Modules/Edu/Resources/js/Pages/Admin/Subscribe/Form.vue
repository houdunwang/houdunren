<template>
    <hd-layout :tabs="tabs" home="Edu.admin.index">
        <el-form :model="form" ref="form" label-width="100px" label-position="right" :inline="false" size="normal">
            <el-card shadow="always" :body-style="{ padding: '20px' }">
                <div slot="header">
                    基本资料
                </div>
                <el-form-item label="套餐标题">
                    <el-input v-model="form.title"></el-input>
                    <hd-error :message="form.errors.title" />
                </el-form-item>
                <el-form-item label="广告语">
                    <el-input v-model="form.ad"></el-input>
                    <hd-error :message="form.errors.ad" />
                </el-form-item>
                <el-form-item label="图标">
                    <el-input v-model="form.icon"></el-input>
                    <hd-error :message="form.errors.icon" />
                </el-form-item>
                <el-form-item label="价格">
                    <el-input v-model="form.price"></el-input>
                    <hd-error :message="form.errors.price" />
                </el-form-item>
                <el-form-item label="套餐月数">
                    <el-input v-model="form.month"></el-input>
                    <hd-error :message="form.errors.month" />
                </el-form-item>
            </el-card>
            <el-button type="primary" @click="onSubmit" class="block mt-3">保存提交</el-button>
        </el-form>
    </hd-layout>
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
    props: ['subscribe'],
    data() {
        return {
            tabs,
            form: this.$inertia.form(this.subscribe || form)
        }
    },
    methods: {
        //提交表单
        onSubmit() {
            if (this.subscribe) {
                this.form.put(route('Edu.admin.subscribe.update', this.subscribe))
            } else {
                this.form.post(route('Edu.admin.subscribe.store'))
            }
        }
    }
}
</script>

<style></style>
