<template>
    <el-form :model="form" ref="form" label-width="80px" :inline="false" size="normal">
        <el-card shadow="never" :body-style="{ padding: '20px' }">
            <div slot="header">
                修改头像
            </div>
            <hd-image v-model="form.avatar" :action="`upload/site/${site.id}`" />
        </el-card>
    </el-form>
</template>

<script>
export default {
    route: { meta: { keepAlive: true } },
    data() {
        return {
            form: this.$store.state.user
        }
    },
    watch: {
        async 'form.avatar'() {
            await this.axios.put(`user/${this.user.id}`, this.form)
            this.$store.dispatch('user')
        }
    }
}
</script>

<style></style>
