<template>
    <el-form :model="form" ref="form" label-width="80px" :inline="false" size="normal" v-loading="loading">
        <hd-tab :tabs="tabs" />
        <el-card shadow="always" :body-style="{ padding: '20px' }">
            <div slot="header">
                <span>站点资料</span>
            </div>
            <el-form-item label="站点名称">
                <el-input v-model="form.title" />
                <hd-form-error name="title" />
            </el-form-item>
            <el-form-item label="访问域名">
                <el-input v-model="form.domain" />
                <hd-form-error name="domain" />
            </el-form-item>
        </el-card>
        <el-card shadow="always" :body-style="{ padding: '20px' }" class="mt-3">
            <div slot="header">默认模块</div>
            <hd-module-list :modules="modules" #default="{module}">
                <el-button :type="form.module_id == module.id ? 'primary' : 'default'" size="mini" @click="form.module_id = module.id">选择模块</el-button>
            </hd-module-list>
        </el-card>
        <div class="mt-3">
            <el-button type="primary" @click="onSubmit">保存提交</el-button>
        </div>
    </el-form>
</template>

<script>
import tabs from './tabs'
const form = { title: '', domain: '', module_id: 0 }
export default {
    route: false,
    props: ['id'],
    data() {
        return {
            tabs,
            form: Object.assign({}, form),
            modules: [],
            loading: true
        }
    },
    async created() {
        if (this.id) this.form = await this.axios.get(`site/${this.id}`)
        this.modules = await this.axios.get(`module/user`)
        this.loading = false
    },
    methods: {
        async onSubmit() {
            const url = this.id ? `site/${this.id}` : 'site'
            await this.axios[this.id ? 'put' : 'post'](url, this.form)
            this.$router.push({ name: 'site.site.index' })
        }
    }
}
</script>

<style></style>
