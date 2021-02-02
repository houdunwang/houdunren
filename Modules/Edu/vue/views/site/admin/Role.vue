<template>
    <div v-loading="loading">
        <hd-tab :tabs="tabs" />
        <el-alert type="info" effect="light" closable> 设置管理员【{{ user.name }}】的角色 </el-alert>

        <el-card shadow="always" :body-style="{ padding: '20px' }" class="mt-3">
            <div slot="header">
                角色设置
            </div>
            <el-radio-group v-model="form.role">
                <el-radio :label="role.name" v-for="(role, index) in roles" :key="index">
                    {{ role.title }}
                </el-radio>
            </el-radio-group>
        </el-card>
        <el-button :disabled="!form.role" type="primary" size="default" @click="onSubmit" class="mt-3">保存提交</el-button>
    </div>
</template>

<script>
import tabs from './tabs'
export default {
    route: { path: `:sid/admin/:id/role` },
    data() {
        return {
            user: {},
            tabs: tabs({ sid: this.$route.params.sid }),
            sid: this.$route.params.sid,
            id: this.$route.params.id,
            roles: [],
            form: { role: '' },
            loading: true
        }
    },
    async created() {
        this.user = await this.axios.get(`user/${this.id}`)
        this.roles = await this.axios.get(`${this.sid}/role`)
        this.loading = false
    },
    methods: {
        async onSubmit() {
            await this.axios.put(`${this.sid}/admin_role/${this.id}`, this.form)
            this.$router.push({ name: 'site.admin.index', params: { sid: this.sid } })
        }
    }
}
</script>

<style></style>
