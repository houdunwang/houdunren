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
import { mapGetters } from 'vuex'
export default {
    props: ['user'],
    data() {
        return {
            form: { avatar: this.user.icon }
        }
    },
    computed: {
        ...mapGetters(['errors'])
    },
    watch: {
        'form.avatar'(n) {
            this.axios.put(`/api/user/avatar`, this.form)
        }
    },
    methods: {
        onSubmit() {
            this.axios.put(`/api/user/password`, this.form)
        }
    }
}
</script>

<style></style>
