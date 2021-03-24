<template>
    <div>
        <el-form :model="form" ref="form" label-width="80px" :inline="false" size="normal">
            <hd-tab :tabs="tabs" />
            <el-card shadow="always" :body-style="{ padding: '20px' }">
                <div slot="header">
                    <span>基本资料</span>
                </div>
                <el-form-item label="昵称">
                    <el-input v-model="form.name"></el-input>
                    <hd-error name="name" />
                </el-form-item>
                <el-form-item label="邮箱">
                    <el-input v-model="form.email"></el-input>
                    <hd-error name="email" />
                </el-form-item>
                <el-form-item label="QQ">
                    <el-input v-model="form.qq"></el-input>
                    <hd-error name="qq" />
                </el-form-item>
                <el-form-item label="手机号">
                    <el-input v-model="form.mobile"></el-input>
                    <hd-error name="mobile" />
                </el-form-item>
                <el-form-item label="github">
                    <el-input v-model="form.github"></el-input>
                    <hd-error name="github" />
                </el-form-item>
                <el-form-item label="微博">
                    <el-input v-model="form.weibo"></el-input>
                    <hd-error name="weibo" />
                </el-form-item>
                <el-form-item>
                    <el-button type="primary" @click="onSubmitBase">保存提交</el-button>
                </el-form-item>
            </el-card>
        </el-form>
        <el-form class="mt-3" :model="form" ref="form" label-width="80px" :inline="false" size="normal">
            <el-card shadow="always" :body-style="{ padding: '20px' }" class="mt-3">
                <div slot="header">
                    <span>密码修改</span>
                </div>
                <el-form-item label="原密码">
                    <el-input type="password" v-model="form.old_password"></el-input>
                    <hd-error name="old_password" />
                </el-form-item>
                <el-form-item label="新密码">
                    <el-input type="password" v-model="form.password"></el-input>
                    <hd-error name="password" />
                </el-form-item>
                <el-form-item label="确认密码">
                    <el-input type="password" v-model="form.password_confirmation"></el-input>
                </el-form-item>
                <el-form-item>
                    <el-button type="primary" @click="onSubmitPassword">修改密码</el-button>
                </el-form-item>
            </el-card>
        </el-form>
    </div>
</template>

<script>
import tabs from './tabs'
export default {
    data() {
        return {
            form: {},
            tabs
        }
    },
    async created() {
        this.form = this.$store.state.user
    },
    methods: {
        async onSubmitBase() {
            await this.axios.put(`user/${this.form.id}`, this.form)
        },
        onSubmitPassword() {
            this.axios.put(`user/password`, this.form)
        }
    }
}
</script>

<style></style>
