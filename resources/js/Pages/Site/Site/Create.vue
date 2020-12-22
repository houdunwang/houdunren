<template>
    <layout>
        <el-form :model="form" ref="form" label-width="80px" :inline="false" size="normal">
            <el-card shadow="always" :body-style="{ padding: '20px' }">
                <div slot="header">
                    <span>站点资料</span>
                </div>
                <!-- card body -->
                <el-form-item label="站点名称">
                    <el-input v-model="form.title" />
                </el-form-item>
                <el-form-item label="访问域名">
                    <el-input v-model="form.domain" />
                </el-form-item>
            </el-card>

            <el-card shadow="always" :body-style="{ padding: '20px' }" class="mt-3">
                <div slot="header">默认模块</div>
                <!-- card body -->
            </el-card>
            <div class="mt-3">
                <el-button type="primary" @click="onSubmit">立即创建</el-button>
            </div>
        </el-form>
    </layout>
</template>

<script>
const form = { title: '', domain: '' }
import Layout from './Layout'
export default {
    components: { Layout },
    data() {
        return {
            form
        }
    },
    methods: {
        onSubmit() {
            this.$inertia.post(route('site.site.store'), this.form)
        }
    }
}
</script>

<style></style>
