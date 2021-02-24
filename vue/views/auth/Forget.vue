<template>
    <el-form :model="form" ref="form" label-width="80px" :inline="false" size="normal" label-position="top" class="auth">
        <div class="min-w-screen min-h-screen bg-gray-900 flex items-center justify-center px-5 py-5">
            <div class="bg-gray-100 text-gray-500 rounded-3xl shadow-xl w-full overflow-hidden" style="max-width:1000px">
                <div class="md:flex w-full">
                    <div class="hidden md:block w-1/2 bg-indigo-500 py-10 px-10 bg-cover bg-center" style="background-image:url('/images/forget.jpeg')"></div>
                    <div class="w-full md:w-1/2 py-10 px-5 md:px-10">
                        <div class="text-center mb-10">
                            <h1 class="text-gray-900 text-4xl text-center font-thin">找回密码</h1>
                        </div>
                        <div>
                            <div class="flex">
                                <div class="w-full">
                                    <el-form-item label="帐号" size="normal">
                                        <hd-validate-code v-model="form.account" placeholder="请输入手机号或邮箱" :action="`site/${site.id}/code/exist`" />
                                    </el-form-item>
                                </div>
                            </div>
                            <div class="flex">
                                <div class="w-full">
                                    <el-form-item label="验证码" size="normal">
                                        <el-input placeholder="请输入收到的验证码" class="mr-1" v-model="form.code"> </el-input>
                                        <hd-error name="code" />
                                    </el-form-item>
                                </div>
                            </div>
                            <el-divider><i class="el-icon-mobile-phone"></i></el-divider>
                            <div class="grid grid-cols-2 gap-3">
                                <el-form-item label="新密码" class="flex-1">
                                    <el-input type="password" v-model="form.password" placeholder="请输入新密码"></el-input>
                                    <hd-error name="password" />
                                </el-form-item>
                                <el-form-item label="确认密码" class="flex-1">
                                    <el-input type="password" v-model="form.password_confirmation" placeholder="请再输一次密码"></el-input>
                                </el-form-item>
                            </div>
                            <div class="flex mt-5">
                                <div class="w-full">
                                    <button
                                        class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg py-3 font-semibold"
                                        @click.prevent="onSubmit"
                                    >
                                        提交
                                    </button>
                                </div>
                            </div>
                            <hd-footer />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </el-form>
</template>

<script>
import HdFooter from './Footer'
import { mapState } from 'vuex'
export default {
    route: { path: '/forget' },
    components: {
        HdFooter
    },
    data() {
        return {
            form: { account: '', code: '', password: '', captcha: {} }
        }
    },
    computed: {
        ...mapState(['site'])
    },
    methods: {
        async onSubmit() {
            this.$store.commit('errors')
            await this.axios.post(`site/${this.site.id}/forget`, this.form)
            this.$router.push(`/login`)
        }
    }
}
</script>

<style lang="scss">
.auth {
    .el-input-group__append {
        padding: 0 !important;
    }
    .el-form--label-top .el-form-item__label {
        padding: 0 !important;
    }
    .el-form-item {
        margin-bottom: 0 !important;
    }
    .el-divider--horizontal {
        margin: 10px 0 !important;
    }
}
</style>
