<template>
    <el-form :model="form" ref="form" label-width="80px" :inline="false" size="normal" label-position="top">
        <div class="bg-blue-400 h-screen w-screen" v-show="finish">
            <div class="flex flex-col items-center flex-1 h-full justify-center px-4 sm:px-0">
                <div class="flex rounded-lg shadow-lg w-full sm:w-3/4 lg:w-1/2 bg-white sm:mx-0" style="height: 500px">
                    <div class="flex flex-col w-full md:w-1/2 p-4">
                        <div class="flex flex-col flex-1 justify-center mb-10">
                            <h1 class="text-4xl text-center font-thin">登录后台</h1>
                            <div class="w-full mt-4">
                                <form class="form-horizontal w-3/4 mx-auto" method="POST" action="#">
                                    <div class="flex flex-col mt-4">
                                        <el-input v-model="form.account" placeholder="邮箱或手机号"></el-input>
                                        <hd-error name="account" />
                                    </div>
                                    <div class="flex flex-col mt-4">
                                        <el-input v-model="form.password" placeholder="请输入登录密码" type="password"></el-input>
                                        <hd-error name="password" />
                                    </div>
                                    <div class="flex flex-col mt-4">
                                        <hd-captcha v-model="form.captcha" ref="captcha" />
                                    </div>
                                    <div class="flex flex-col mt-8">
                                        <el-button
                                            type="primary"
                                            size="default"
                                            class="bg-blue-500 hover:bg-blue-700 text-white text-sm font-semibold py-2 px-4 rounded"
                                            @click="onSubmit"
                                        >
                                            登录
                                        </el-button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div
                        class="hidden md:block md:w-1/2 rounded-r-lg"
                        style="background: url('https://images.unsplash.com/photo-1604632254231-004e0f122067?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=376&q=80'); background-size: cover; background-position: center center;"
                    ></div>
                </div>
            </div>
        </div>
    </el-form>
</template>

<script>
import HdFooter from './Footer'
export default {
    route: { path: '/system' },
    components: {
        HdFooter
    },
    data() {
        return { finish: false, form: { account: '', password: '', captcha: {}, remember: false } }
    },
    created() {
        if (this.isLogin) {
            this.$router.push({ name: 'site.site.index' })
        } else {
            this.finish = true
        }
    },
    methods: {
        async onSubmit() {
            this.$store.commit('setErrors', {})
            this.axios
                .post(`login`, this.form)
                .then(({ token }) => {
                    localStorage.setItem('token', token)
                    location.href = '/admin'
                })
                .finally(() => {
                    this.$refs.captcha.get()
                })
        }
    }
}
</script>

<style>
.auth .el-input-group__append {
    padding: 0 !important;
}
</style>
