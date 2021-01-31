<template>
    <div>
        <el-form :model="formBase" ref="form" label-width="80px" :inline="false" size="normal">
            <hd-tab :tabs="tabs" />
            <el-card shadow="always" :body-style="{ padding: '20px' }">
                <div slot="header">
                    <span>基本资料</span>
                </div>
                <el-form-item label="昵称">
                    <el-input v-model="formBase.name"></el-input>
                    <hd-error name="name" />
                </el-form-item>
                <el-form-item label="邮箱">
                    <el-input v-model="formBase.email"></el-input>
                    <hd-error name="email" />
                </el-form-item>
                <el-form-item label="QQ">
                    <el-input v-model="formBase.qq"></el-input>
                    <hd-error name="qq" />
                </el-form-item>
                <el-form-item label="手机号">
                    <el-input v-model="formBase.mobile"></el-input>
                    <hd-error name="mobile" />
                </el-form-item>
                <el-form-item label="github">
                    <el-input v-model="formBase.github"></el-input>
                    <hd-error name="github" />
                </el-form-item>
                <el-form-item label="微博">
                    <el-input v-model="formBase.weibo"></el-input>
                    <hd-error name="weibo" />
                </el-form-item>
                <el-form-item>
                    <el-button type="primary" @click="onSubmitBase">保存提交</el-button>
                </el-form-item>
            </el-card>
        </el-form>
        <el-form class="mt-3" :model="formPassword" ref="formPassword" label-width="80px" :inline="false" size="normal">
            <el-card shadow="always" :body-style="{ padding: '20px' }" class="mt-3">
                <div slot="header">
                    <span>密码修改</span>
                </div>
                <el-form-item label="原密码">
                    <el-input type="password" v-model="formPassword.old_password"></el-input>
                    <hd-error name="old_password" />
                </el-form-item>
                <el-form-item label="新密码">
                    <el-input type="password" v-model="formPassword.password"></el-input>
                    <hd-error name="password" />
                </el-form-item>
                <el-form-item label="确认密码">
                    <el-input type="password" v-model="formPassword.password_confirmation"></el-input>
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
            formBase: this.$store.state.user,
            formPassword: {},
            tabs
        }
    },
    methods: {
        async onSubmitBase() {
            await this.axios.put(`user/${this.Auth.id()}`, this.formBase)
        },
        onSubmitPassword() {
            this.axios.put(`user/password`, this.formPassword)
        }
    }
}
</script>

<style></style>
