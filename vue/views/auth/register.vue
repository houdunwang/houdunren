<template>
    <el-form :model="form" ref="form" label-width="80px" :inline="false" size="normal" label-position="top">
        <div class="min-w-screen min-h-screen bg-gray-900 flex items-center justify-center px-5 py-5 auth">
            <div class="bg-gray-100 text-gray-500 rounded-3xl shadow-xl w-full overflow-hidden" style="max-width:1000px">
                <div class="md:flex w-full">
                    <div class="hidden md:block w-1/2 bg-indigo-500 py-10 px-10 bg-cover" style="background-image:url('/images/register.jpeg')"></div>
                    <div class="w-full md:w-1/2 py-10 px-5 md:px-10">
                        <div class="text-center mb-10">
                            <h1 class="text-gray-900 text-4xl text-center font-thin">注册</h1>
                            <!-- <p>为了美好的生活，一起努力</p> -->
                        </div>
                        <div>
                            <div class="flex">
                                <div class="w-full">
                                    <el-form-item label="帐号" class="flex-1">
                                        <hd-validate-code v-model="form.account" type="mobile" :timeout="3" placeholder="请输入手机号" action="register/code" />
                                    </el-form-item>
                                </div>
                            </div>
                            <div class="flex">
                                <div class="w-full">
                                    <el-form-item label="验证码" class="flex-1">
                                        <el-input placeholder="请输入收到的手机验证码" class="mr-1" v-model="form.code"> </el-input>
                                        <hd-error name="code" />
                                    </el-form-item>
                                </div>
                            </div>
                            <el-divider><i class="el-icon-mobile-phone"></i></el-divider>
                            <div class="grid grid-cols-2 gap-3">
                                <el-form-item label="密码" class="flex-1">
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
                                        注册
                                    </button>
                                </div>
                            </div>
                            <hd-footer> </hd-footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </el-form>
</template>

<script>
import HdFooter from './Footer'
export default {
    route: { path: '/register', meta: { guest: true } },
    components: {
        HdFooter
    },
    data() {
        return {
            form: { account: '', code: '', password: '', password_confirmation: '', captcha: {} }
        }
    },
    methods: {
        async onSubmit() {
            this.$store.commit('setErrors')
            await this.axios.post(`register`, this.form).then(_ => this.$router.push({ name: 'auth.login' }))
        }
    }
}
</script>

<style lang="scss">
.auth {
    .el-form-item__label {
        padding: 0 !important;
    }
    .el-divider__text {
        background-color: #f1f2f5;
    }
}
</style>
