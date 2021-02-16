<template>
    <el-form :model="form" ref="form" label-width="80px" :inline="false" size="normal">
        <el-card shadow="never" :body-style="{ padding: '20px' }">
            <div slot="header">
                修改头像
            </div>
            <hd-image v-model="form.avatar" />
        </el-card>
    </el-form>
</template>

<script>
export default {
    route: { meta: { keepAlive: true } },
    data() {
        return {
            form: Object.assign({}, this.$store.state.user)
        }
    },
    watch: {
        async 'form.avatar'(n) {
            await this.axios.put(`user/${this.form.id}`, this.form)
            this.$store.commit('setUser', this.form)
        }
    }
}
</script>

<style></style>
