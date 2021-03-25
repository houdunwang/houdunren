<template>
    <div>
        <hd-tab :tabs="tabs" />
        <el-form :model="form" ref="form" label-width="80px" :inline="false" size="normal">
            <el-card shadow="always" :body-style="{ padding: '20px' }">
                <div slot="header">
                    角色资料
                </div>
                <el-form-item label="角色名称">
                    <el-input v-model="form.title"></el-input>
                    <hd-form-error name="title" />
                </el-form-item>
                <el-form-item label="角色标识">
                    <el-input v-model="form.name"></el-input>
                    <hd-form-error name="name" />
                </el-form-item>
                <el-form-item class="mt-3">
                    <el-button type="primary" @click="onSubmit">保存提交</el-button>
                </el-form-item>
            </el-card>
        </el-form>
    </div>
</template>

<script>
import tabs from './tabs'
const form = { title: '', name: '' }
export default {
    route: false,
    props: ['id'],
    data() {
        return {
            tabs: tabs({ sid: this.$route.params.sid, id: this.$route.params.id }),
            sid: this.$route.params.sid,
            form: Object.assign({}, form)
        }
    },
    async created() {
        if (this.id) this.form = await this.axios.get(`site/${this.sid}/role/${this.id}`)
    },
    methods: {
        async onSubmit() {
            const url = this.id ? `site/${this.sid}/role/${this.id}` : `site/${this.sid}/role`
            await this.axios[this.id ? 'put' : 'post'](url, this.form)
            this.$router.push(`/site/${this.sid}/role`)
        }
    }
}
</script>

<style></style>
