<template>
    <hd-layout :tabs="tabs" home="system.home">
        <el-card shadow="always" :body-style="{ padding: '20px' }">
            <template v-slot:header>套餐资料</template>
            <el-form :model="form" ref="form" label-width="80px" :inline="false" size="normal">
                <el-form-item label="套餐名称">
                    <el-input v-model="form.title"></el-input>
                    <hd-error :message="form.error('title')" />
                </el-form-item>
                <el-form-item label="可用天数">
                    <el-input type="number" v-model="form.days"></el-input>
                    <hd-error :message="form.error('days')" />
                </el-form-item>
                <el-form-item>
                    <el-button type="primary" @click="onSubmit">立即创建</el-button>
                </el-form-item>
            </el-form>
        </el-card>
    </hd-layout>
</template>

<script>
import tabs from './tabs'
const form = { title: '', days: 7 }
export default {
    data() {
        return {
            tabs,
            form: this.$inertia.form(this.$page.package || form)
        }
    },
    methods: {
        onSubmit() {
            if (this.form.id) {
                //更新
                let url = route('system.package.update', {
                    id: this.form.id
                })
                this.$inertia.put(url, this.form)
            } else {
                //添加
                let url = route('system.package.store')
                this.$inertia.post(url, this.form)
            }
        }
    }
}
</script>

<style></style>
